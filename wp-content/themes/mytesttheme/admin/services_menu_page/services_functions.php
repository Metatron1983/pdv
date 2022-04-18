<?php

// создание базы данных
require_once ABSPATH . 'wp-admin/includes/upgrade.php';

create_services_DB_table();
function create_services_DB_table(){
    global $wpdb;

    $table_name = $wpdb->get_blog_prefix().'services';
    $charset_collate = $wpdb->get_charset_collate();

    if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
        $sql = "CREATE TABLE {$table_name} (
                id bigint(20) unsigned NOT NULL auto_increment,
                field_name varchar(100) NOT NULL default '',
                field_content varchar(1000) NOT NULL default '',
                PRIMARY KEY (id),
                UNIQUE field_name (field_name)
                )
                {$charset_collate};";
        dbDelta($sql);

        $wpdb->insert($table_name, ['field_name'=>'title_1']);
        $wpdb->insert($table_name, ['field_name'=>'title_2']);
        $wpdb->insert($table_name, ['field_name'=>'title_3']);
        $wpdb->insert($table_name, ['field_name'=>'text_1']);
        $wpdb->insert($table_name, ['field_name'=>'text_2']);
        $wpdb->insert($table_name, ['field_name'=>'text_3']);
        $wpdb->insert($table_name, ['field_name'=>'img_1']);
        $wpdb->insert($table_name, ['field_name'=>'img_2']);
        $wpdb->insert($table_name, ['field_name'=>'img_3']);
    }
}

if(isset($_POST['services_1_title'])) update_table_services_title('services_1_title', 'title_1');
if(isset($_POST['services_2_title'])) update_table_services_title('services_2_title', 'title_2');
if(isset($_POST['services_3_title'])) update_table_services_title('services_3_title', 'title_3');

function update_table_services_title($post_name, $service_table_field_name) {  
    $title_content = get_service_title($service_table_field_name);

    if($title_content === $_POST[$post_name]) return;
    
    global $wpdb;
    $table_name = $wpdb->get_blog_prefix().'services';

    $wpdb->update("$table_name", ["field_content"=>"{$_POST[$post_name]}"], ['field_name'=>"$service_table_field_name"]);
}

function get_service_title($service_table_field_name) {
    global $wpdb;
    $table_name = $wpdb->get_blog_prefix().'services';

    $request = "SELECT field_content FROM $table_name WHERE field_name='$service_table_field_name'";
    $response = $wpdb->get_var($request);
    $response = wp_unslash($response);
    return $response;
}


if(isset($_POST['services_1_text'])) update_service_table_text('text_1', 'services_1_text');
if(isset($_POST['services_2_text'])) update_service_table_text('text_2', 'services_2_text');
if(isset($_POST['services_3_text'])) update_service_table_text('text_3', 'services_3_text');

function update_service_table_text($service_table_field_name, $post_name) {
    $text_content = get_service_text($service_table_field_name);

    if($text_content === $_POST[$post_name]) return;

    global $wpdb;
    $table_name = $wpdb->get_blog_prefix() . 'services';
    $wpdb->update($table_name, ['field_content' => "{$_POST[$post_name]}"], ['field_name'=>"$service_table_field_name"]); 
}

function get_service_text($service_table_field_name) {
    global $wpdb;
    $table_name = $wpdb->get_blog_prefix() . 'services';
    
    $request = "SELECT field_content FROM $table_name WHERE field_name='$service_table_field_name'";
    $response = $wpdb->get_var($request);
    $response = wp_unslash($response);
    return $response;
}

if(isset($_FILES['services_1_img'])) {
    if(is_uploaded_file($_FILES['services_1_img']['tmp_name'])) update_service_table_image('img_1', 'services_1_img');
}
if(isset($_FILES['services_2_img'])) {
    if(is_uploaded_file($_FILES['services_2_img']['tmp_name'])) update_service_table_image('img_2', 'services_2_img');
}
if(isset($_FILES['services_3_img'])) {
    if(is_uploaded_file($_FILES['services_3_img']['tmp_name'])) update_service_table_image('img_3', 'services_3_img');
}


function update_service_table_image($service_table_image_name, $post_name) {
    //получение текущего имени файла 
    $current_img_name = get_image($service_table_image_name);
    
    $file_name = basename($_FILES[$post_name]['name']); 
    if($current_img_name === $file_name) return;
    
    // пути загрузки
    $path_upload_to = dirname(__DIR__,4) . '/uploads/site_img/service/' . $file_name;
    $path_upload_from = $_FILES[$post_name]['tmp_name'];
    $path_current_img = dirname(__DIR__,4) . '/uploads/site_img/service/' . $current_img_name; 
    //удаление файла из дирректироии
    if(file_exists($path_current_img)) unlink($path_current_img);

    //переместить загружаемый файл 
    move_uploaded_file($path_upload_from, $path_upload_to);

    //сохранить имя загруженного файла в БД
    global $wpdb;
    $table_name = $wpdb->prefix . 'services';
    $wpdb->update($table_name,['field_content'=>$file_name],['field_name'=>$service_table_image_name]);
}

function get_image($service_table_image_name) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'services';
    $request = "SELECT field_content FROM $table_name WHERE field_name = '$service_table_image_name'";
    
    $response = $wpdb->get_var($request);
    $response = wp_unslash($response);
    
    return $response;
}
?>