<?php

create_clients_tables_db();

function create_clients_tables_db() {
    global $wpdb;
    $table_name = $wpdb->prefix . "clients";
    $has_table_name = $wpdb->get_var("SHOW TABLES LIKE '$table_name'");
    
    if($table_name !== $has_table_name) {
        require_once ABSPATH . 'wp-admin/includes/upgrade.php';

        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE {$table_name} (
            id  bigint(20) unsigned NOT NULL auto_increment,
            field_name varchar(100) NOT NULL default '',
            field_content varchar(1000) NOT NULL default '',
            PRIMARY KEY  (id),
            UNIQUE field_name (field_name)
            )
            {$charset_collate};";

            dbDelta($sql);
        $wpdb->insert($table_name,['field_name' => 'main_title']);

        $wpdb->insert($table_name,['field_name' => 'cart_1_img_name']);
        $wpdb->insert($table_name,['field_name' => 'cart_1_title']);
        $wpdb->insert($table_name,['field_name' => 'cart_1_text']);

        $wpdb->insert($table_name,['field_name' => 'cart_2_img_name']);
        $wpdb->insert($table_name,['field_name' => 'cart_2_title']);
        $wpdb->insert($table_name,['field_name' => 'cart_2_text']);

        $wpdb->insert($table_name,['field_name' => 'cart_3_img_name']);
        $wpdb->insert($table_name,['field_name' => 'cart_3_title']);
        $wpdb->insert($table_name,['field_name' => 'cart_3_text']);

        $wpdb->insert($table_name,['field_name' => 'cart_4_img_name']);
        $wpdb->insert($table_name,['field_name' => 'cart_4_title']);
        $wpdb->insert($table_name,['field_name' => 'cart_4_text']);

        $wpdb->insert($table_name,['field_name' => 'cart_5_img_name']);
        $wpdb->insert($table_name,['field_name' => 'cart_5_title']);
        $wpdb->insert($table_name,['field_name' => 'cart_5_text']);

        $wpdb->insert($table_name,['field_name' => 'cart_6_img_name']);
        $wpdb->insert($table_name,['field_name' => 'cart_6_title']);
        $wpdb->insert($table_name,['field_name' => 'cart_6_text']);

        $wpdb->insert($table_name,['field_name' => 'cart_7_img_name']);
        $wpdb->insert($table_name,['field_name' => 'cart_7_title']);
        $wpdb->insert($table_name,['field_name' => 'cart_7_text']);

        $wpdb->insert($table_name,['field_name' => 'cart_8_img_name']);
        $wpdb->insert($table_name,['field_name' => 'cart_8_title']);
        $wpdb->insert($table_name,['field_name' => 'cart_8_text']);
    };
}

function update_filed_name_clients_tbl_text($field_name, $post_file_content) {
    global $wpdb;
    $table_name = $wpdb->prefix . "clients";
    $current_value = get_filed_name_clients_tbl($field_name);
    
    if($current_value === $post_file_content) return;
    $wpdb->update($table_name, ['field_content' => "$post_file_content"], ['field_name' => "$field_name"]);
}

function update_filed_name_clients_tbl_img($field_name, $post_file, $cart_name) {
    
    $current_value = get_filed_name_clients_tbl($field_name);
    $field_content = $post_file['name'][$cart_name]['logo'];
    
    if($current_value === $field_content) return;
    update_filed_name_clients_tbl_text($field_name, $field_content);

    $path_upload_to = dirname(__FILE__, 5) . "/uploads/site_img/clients/" . $field_content;
    $path_upload_from = $post_file['tmp_name'][$cart_name]['logo'];
    $path_curr_file = dirname(__FILE__, 5) . "/uploads/site_img/clients/" . $current_value;

    if(file_exists($path_curr_file)) unlink($path_curr_file);

    move_uploaded_file($path_upload_from, $path_upload_to);
}

if(isset($_FILES['clients']["name"]['cart1']['logo'])) {
    if(is_uploaded_file($_FILES['clients']["tmp_name"]['cart1']['logo'])) update_filed_name_clients_tbl_img('cart_1_img_name', $_FILES['clients'],'cart1');
};
if(isset($_FILES['clients']["name"]['cart2']['logo'])) {
    if(is_uploaded_file($_FILES['clients']["tmp_name"]['cart2']['logo'])) update_filed_name_clients_tbl_img('cart_2_img_name', $_FILES['clients'],'cart2');
};
if(isset($_FILES['clients']["name"]['cart3']['logo'])) {
    if(is_uploaded_file($_FILES['clients']["tmp_name"]['cart3']['logo'])) update_filed_name_clients_tbl_img('cart_3_img_name', $_FILES['clients'],'cart3');
};

if(isset($_FILES['clients']["name"]['cart4']['logo'])) {
    if(is_uploaded_file($_FILES['clients']["tmp_name"]['cart4']['logo'])) update_filed_name_clients_tbl_img('cart_4_img_name', $_FILES['clients'],'cart4');
};
if(isset($_FILES['clients']["name"]['cart5']['logo'])) {
    if(is_uploaded_file($_FILES['clients']["tmp_name"]['cart5']['logo'])) update_filed_name_clients_tbl_img('cart_5_img_name', $_FILES['clients'],'cart5');
};
if(isset($_FILES['clients']["name"]['cart6']['logo'])) {
    if(is_uploaded_file($_FILES['clients']["tmp_name"]['cart6']['logo'])) update_filed_name_clients_tbl_img('cart_6_img_name', $_FILES['clients'],'cart6');
};
if(isset($_FILES['clients']["name"]['cart7']['logo'])) {
    if(is_uploaded_file($_FILES['clients']["tmp_name"]['cart7']['logo'])) update_filed_name_clients_tbl_img('cart_7_img_name', $_FILES['clients'],'cart7');
};
if(isset($_FILES['clients']["name"]['cart8']['logo'])) {
    if(is_uploaded_file($_FILES['clients']["tmp_name"]['cart8']['logo'])) update_filed_name_clients_tbl_img('cart_8_img_name', $_FILES['clients'],'cart8');
};
if(isset($_POST['clients']['main']['title'])) update_filed_name_clients_tbl_text('main_title', $_POST['clients']['main']['title']);

if(isset($_POST['clients']['cart1']['title'])) update_filed_name_clients_tbl_text('cart_1_title', $_POST['clients']['cart1']['title']);
if(isset($_POST['clients']['cart1']['description'])) update_filed_name_clients_tbl_text('cart_1_text', $_POST['clients']['cart1']['description']);

if(isset($_POST['clients']['cart2']['title'])) update_filed_name_clients_tbl_text('cart_2_title', $_POST['clients']['cart2']['title']);
if(isset($_POST['clients']['cart2']['description'])) update_filed_name_clients_tbl_text('cart_2_text', $_POST['clients']['cart2']['description']);

if(isset($_POST['clients']['cart3']['title'])) update_filed_name_clients_tbl_text('cart_3_title', $_POST['clients']['cart3']['title']);
if(isset($_POST['clients']['cart3']['description'])) update_filed_name_clients_tbl_text('cart_3_text', $_POST['clients']['cart3']['description']);

if(isset($_POST['clients']['cart4']['title'])) update_filed_name_clients_tbl_text('cart_4_title', $_POST['clients']['cart4']['title']);
if(isset($_POST['clients']['cart4']['description'])) update_filed_name_clients_tbl_text('cart_4_text', $_POST['clients']['cart4']['description']);

if(isset($_POST['clients']['cart5']['title'])) update_filed_name_clients_tbl_text('cart_5_title', $_POST['clients']['cart5']['title']);
if(isset($_POST['clients']['cart5']['description'])) update_filed_name_clients_tbl_text('cart_5_text', $_POST['clients']['cart5']['description']);

if(isset($_POST['clients']['cart6']['title'])) update_filed_name_clients_tbl_text('cart_6_title', $_POST['clients']['cart6']['title']);
if(isset($_POST['clients']['cart6']['description'])) update_filed_name_clients_tbl_text('cart_6_text', $_POST['clients']['cart6']['description']);

if(isset($_POST['clients']['cart7']['title'])) update_filed_name_clients_tbl_text('cart_7_title', $_POST['clients']['cart7']['title']);
if(isset($_POST['clients']['cart7']['description'])) update_filed_name_clients_tbl_text('cart_7_text', $_POST['clients']['cart7']['description']);

if(isset($_POST['clients']['cart8']['title'])) update_filed_name_clients_tbl_text('cart_8_title', $_POST['clients']['cart8']['title']);
if(isset($_POST['clients']['cart8']['description'])) update_filed_name_clients_tbl_text('cart_8_text', $_POST['clients']['cart8']['description']);


function get_filed_name_clients_tbl($field_name) {
    global $wpdb;
    $table_name = $wpdb->prefix . "clients";
    $request = "SELECT field_content FROM $table_name WHERE field_name = '{$field_name}'";
    $field_content = $wpdb->get_var($request);
    $field_content = wp_unslash($field_content);
    return $field_content;
}

function get_clients_title_settings() {
    $value = get_filed_name_clients_tbl("main_title");
    return print($value);
}

function get_clients_cart_1_logo_img_name() {
    $value = get_filed_name_clients_tbl("cart_1_img_name");
    $value = esc_attr($value);
    $value = content_url() . "/uploads/site_img/clients/" . $value;
    return print($value);
}
    
function get_clients_cart_1_title() {
    $value = get_filed_name_clients_tbl("cart_1_title");
    return print($value);
}
    
function get_clients_cart_1_description() {
    $value = get_filed_name_clients_tbl("cart_1_text");
    return print($value);
}



function get_clients_cart_2_logo_img_name() {
    $value = get_filed_name_clients_tbl("cart_2_img_name");
    $value = esc_attr($value);
    $value = content_url() . "/uploads/site_img/clients/" . $value;
    return print($value);
}
    
function get_clients_cart_2_title() {
    $value = get_filed_name_clients_tbl("cart_2_title");
    return print($value);
}
    
function get_clients_cart_2_description() {
    $value = get_filed_name_clients_tbl("cart_2_text");
    return print($value);
}



function get_clients_cart_3_logo_img_name() {
    $value = get_filed_name_clients_tbl("cart_3_img_name");
    $value = esc_attr($value);
    $value = content_url() . "/uploads/site_img/clients/" . $value;
    return print($value);
}
    
function get_clients_cart_3_title() {
    $value = get_filed_name_clients_tbl("cart_3_title");
    return print($value);
}
    
function get_clients_cart_3_description() {
    $value = get_filed_name_clients_tbl("cart_3_text");
    return print($value);
}



function get_clients_cart_4_logo_img_name() {
    $value = get_filed_name_clients_tbl("cart_4_img_name");
    $value = esc_attr($value);
    $value = content_url() . "/uploads/site_img/clients/" . $value;
    return print($value);
}
    
function get_clients_cart_4_title() {
    $value = get_filed_name_clients_tbl("cart_4_title");
    return print($value);
}
    
function get_clients_cart_4_description() {
    $value = get_filed_name_clients_tbl("cart_4_text");
    return print($value);
}



function get_clients_cart_5_logo_img_name() {
    $value = get_filed_name_clients_tbl("cart_5_img_name");
    $value = esc_attr($value);
    $value = content_url() . "/uploads/site_img/clients/" . $value;
    return print($value);
}
    
function get_clients_cart_5_title() {
    $value = get_filed_name_clients_tbl("cart_5_title");
    return print($value);
}
    
function get_clients_cart_5_description() {
    $value = get_filed_name_clients_tbl("cart_5_text");
    return print($value);
}



function get_clients_cart_6_logo_img_name() {
    $value = get_filed_name_clients_tbl("cart_6_img_name");
    $value = esc_attr($value);
    $value = content_url() . "/uploads/site_img/clients/" . $value;
    return print($value);
}
    
function get_clients_cart_6_title() {
    $value = get_filed_name_clients_tbl("cart_6_title");
    return print($value);
}
    
function get_clients_cart_6_description() {
    $value = get_filed_name_clients_tbl("cart_6_text");
    return print($value);
}



function get_clients_cart_7_logo_img_name() {
    $value = get_filed_name_clients_tbl("cart_7_img_name");
    $value = esc_attr($value);
    $value = content_url() . "/uploads/site_img/clients/" . $value;
    return print($value);
}
    
function get_clients_cart_7_title() {
    $value = get_filed_name_clients_tbl("cart_7_title");
    return print($value);
}
    
function get_clients_cart_7_description() {
    $value = get_filed_name_clients_tbl("cart_7_text");
    return print($value);
}



function get_clients_cart_8_logo_img_name() {
    $value = get_filed_name_clients_tbl("cart_8_img_name");
    $value = esc_attr($value);
    $value = content_url() . "/uploads/site_img/clients/" . $value;
    return print($value);
}
    
function get_clients_cart_8_title() {
    $value = get_filed_name_clients_tbl("cart_8_title");
    return print($value);
}
    
function get_clients_cart_8_description() {
    $value = get_filed_name_clients_tbl("cart_8_text");
    return print($value);
}

?>