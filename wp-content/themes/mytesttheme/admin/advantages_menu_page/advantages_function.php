<?php

create_advantages_table_db();

function create_advantages_table_db() {
    global $wpdb;        
    $table_name = $wpdb->prefix . 'advantages';
    
    if($table_name !== $wpdb->get_var("SHOW TABLES LIKE '$table_name'")) {
        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        $charset_collate = $wpdb->get_charset_collate();

        $request = "CREATE TABLE {$table_name} (
            id bigint(20) unsigned NOT NULL auto_increment,
            field_name varchar(100) NOT NULL default '',
            field_content varchar(1000) NOT NULL default '',
            PRIMARY KEY (id),
            UNIQUE field_name (field_name))
            {$charset_collate};";

        dbDelta($request);

        $wpdb->insert($table_name,['field_name'=>'title']);
        $wpdb->insert($table_name,['field_name'=>'image']);
        $wpdb->insert($table_name,['field_name'=>'image_tablet']);
        $wpdb->insert($table_name,['field_name'=>'advantage_1_image']);
        $wpdb->insert($table_name,['field_name'=>'advantage_1_title']);
        $wpdb->insert($table_name,['field_name'=>'advantage_1_text']);
        $wpdb->insert($table_name,['field_name'=>'advantage_2_image']);
        $wpdb->insert($table_name,['field_name'=>'advantage_2_title']);
        $wpdb->insert($table_name,['field_name'=>'advantage_2_text']);
        $wpdb->insert($table_name,['field_name'=>'advantage_3_image']);
        $wpdb->insert($table_name,['field_name'=>'advantage_3_title']);
        $wpdb->insert($table_name,['field_name'=>'advantage_3_text']);
        $wpdb->insert($table_name,['field_name'=>'advantage_4_image']);
        $wpdb->insert($table_name,['field_name'=>'advantage_4_title']);
        $wpdb->insert($table_name,['field_name'=>'advantage_4_text']);
    }
}
 

if(isset($_POST['advantages_admin_banner']['title'])) update_table_field_content('title', $_POST['advantages_admin_banner']['title']);
if(isset($_FILES['advantages_admin_banner']['name']['image_PC'])) {
    if(is_uploaded_file($_FILES['advantages_admin_banner']['tmp_name']['image_PC'])) update_table_field_content_image('image', $_FILES['advantages_admin_banner'], 'image_PC');
};
if(isset($_FILES['advantages_admin_banner']['name']['image_tablet'])) {
    if(is_uploaded_file($_FILES['advantages_admin_banner']['tmp_name']['image_tablet'])) update_table_field_content_image('image_tablet', $_FILES['advantages_admin_banner'], 'image_tablet');
};

if(isset($_FILES['advantages-admin-advantage-1']['name']['image'])) {
    if(is_uploaded_file($_FILES['advantages-admin-advantage-1']['tmp_name']['image'])) update_table_field_content_image('advantage_1_image', $_FILES['advantages-admin-advantage-1'], 'image');
};
if(isset($_POST['advantages-admin-advantage-1']['title'])) update_table_field_content('advantage_1_title', $_POST['advantages-admin-advantage-1']['title']);
if(isset($_POST['advantages-admin-advantage-1']['text'])) update_table_field_content('advantage_1_text', $_POST['advantages-admin-advantage-1']['text']);

if(isset($_FILES['advantages-admin-advantage-2']['name']['image'])) {
    if(is_uploaded_file($_FILES['advantages-admin-advantage-2']['tmp_name']['image'])) update_table_field_content_image('advantage_2_image', $_FILES['advantages-admin-advantage-2'], 'image');
};
if(isset($_POST['advantages-admin-advantage-2']['title'])) update_table_field_content('advantage_2_title', $_POST['advantages-admin-advantage-2']['title']);
if(isset($_POST['advantages-admin-advantage-2']['text'])) update_table_field_content('advantage_2_text', $_POST['advantages-admin-advantage-2']['text']);

if(isset($_FILES['advantages-admin-advantage-3']['name']['image'])) {
    if(is_uploaded_file($_FILES['advantages-admin-advantage-3']['tmp_name']['image'])) update_table_field_content_image('advantage_3_image', $_FILES['advantages-admin-advantage-3'], 'image');
};
if(isset($_POST['advantages-admin-advantage-3']['title'])) update_table_field_content('advantage_3_title', $_POST['advantages-admin-advantage-3']['title']);
if(isset($_POST['advantages-admin-advantage-3']['text'])) update_table_field_content('advantage_3_text', $_POST['advantages-admin-advantage-3']['text']);

if(isset($_FILES['advantages-admin-advantage-4']['name']['image'])) {
    if(is_uploaded_file($_FILES['advantages-admin-advantage-4']['tmp_name']['image'])) update_table_field_content_image('advantage_4_image', $_FILES['advantages-admin-advantage-4'], 'image');
};
if(isset($_POST['advantages-admin-advantage-4']['title'])) update_table_field_content('advantage_4_title', $_POST['advantages-admin-advantage-4']['title']);
if(isset($_POST['advantages-admin-advantage-4']['text'])) update_table_field_content('advantage_4_text', $_POST['advantages-admin-advantage-4']['text']);


function update_table_field_content($field_name, $field_content) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'advantages';

    $current_value = read_table_field_content($field_name);
    if($current_value !== $field_content) {
        $wpdb->update($table_name,['field_content' => "$field_content"], ['field_name' => "$field_name"]);
    } 
}

function update_table_field_content_image($field_name, $post_file, $post_name) {
    $current_img_name = read_table_field_content($field_name);
    $field_content = $post_file['name'][$post_name];
    
    if($current_img_name === $field_content) return; 
    update_table_field_content($field_name, $field_content);

    $path_upload_to = dirname(__FILE__, 5) . "/uploads/site_img/advantages/" . $field_content;
    $path_upload_from = $post_file['tmp_name'][$post_name];
    $path_curr_file = dirname(__FILE__, 5) . "/uploads/site_img/advantages/" . $current_img_name;

    if(file_exists($path_curr_file)) unlink($path_curr_file);

    move_uploaded_file($path_upload_from, $path_upload_to);
}

function read_table_field_content($field_name){
    global $wpdb;
    $table_name = $wpdb->prefix . 'advantages';
    
    $request = "SELECT field_content FROM $table_name WHERE field_name = '$field_name'";
    $response = $wpdb->get_var($request);
    $response = wp_unslash($response);
    
    if($response === NULL) $response = '';
    
    return $response;
}

function get_advantages_admin_banner_title() {
    $result = read_table_field_content('title');
    $result = esc_attr($result);
    return print($result);
}

function get_advantages_admin_banner_image_src() {
    $result = read_table_field_content('image');
    $result = esc_attr($result);
    $img_path = content_url() . "/uploads/site_img/advantages/{$result}";
    return print($img_path);
}

function get_advantages_admin_banner_image_tablet_src() {
    $result = read_table_field_content('image_tablet');
    $result = esc_attr($result);
    $img_path = content_url() . "/uploads/site_img/advantages/{$result}";
    return print($img_path);
}

function get_advantages_admin_advantage_1_image() {
    $result = read_table_field_content('advantage_1_image');
    $result = esc_attr($result);
    $img_path = content_url() . "/uploads/site_img/advantages/{$result}";
    return print($img_path);
}

function get_advantages_admin_advantage_1_title() {
    $result = read_table_field_content('advantage_1_title');
    $result = esc_attr($result);
    return print($result);
}

function get_advantages_admin_advantage_1_text() {
    $result = read_table_field_content('advantage_1_text');
    return print($result);
}

function get_advantages_admin_advantage_2_image() {
    $result = read_table_field_content('advantage_2_image');
    $result = esc_attr($result);
    $img_path = content_url() . "/uploads/site_img/advantages/{$result}";
    return print($img_path);
}

function get_advantages_admin_advantage_2_title() {
    $result = read_table_field_content('advantage_2_title');
    $result = esc_attr($result);
    return print($result);
}

function get_advantages_admin_advantage_2_text() {
    $result = read_table_field_content('advantage_2_text');
    return print($result);
}

function get_advantages_admin_advantage_3_image() {
    $result = read_table_field_content('advantage_3_image');
    $result = esc_attr($result);
    $img_path = content_url() . "/uploads/site_img/advantages/{$result}";
    return print($img_path);
}

function get_advantages_admin_advantage_3_title() {
    $result = read_table_field_content('advantage_3_title');
    $result = esc_attr($result);
    return print($result);
}

function get_advantages_admin_advantage_3_text() {
    $result = read_table_field_content('advantage_3_text');
    return print($result);
}

function get_advantages_admin_advantage_4_image() {
    $result = read_table_field_content('advantage_4_image');
    $result = esc_attr($result);
    $img_path = content_url() . "/uploads/site_img/advantages/{$result}";
    return print($img_path);
}

function get_advantages_admin_advantage_4_title() {
    $result = read_table_field_content('advantage_4_title');
    $result = esc_attr($result);
    return print($result);
}

function get_advantages_admin_advantage_4_text() {
    $result = read_table_field_content('advantage_4_text');
    return print($result);
}


?>