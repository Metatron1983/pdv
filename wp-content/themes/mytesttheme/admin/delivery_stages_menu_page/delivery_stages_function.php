<?php

create_delivery_stages_DB_table();

function create_delivery_stages_DB_table() {
    global $wpdb;

	require_once ABSPATH . 'wp-admin/includes/upgrade.php';

	$table_name = $wpdb->get_blog_prefix() . 'delivery_stages';
	$charset_collate = $wpdb->get_charset_collate();

    if ($table_name !== $wpdb->get_var("SHOW TABLES LIKE '$table_name'")) {
        $sql = "CREATE TABLE {$table_name} (
        id  bigint(20) unsigned NOT NULL auto_increment,
        field_name varchar (100) NOT NULL default '',
        field_content varchar(1000) NOT NULL default '',
        PRIMARY KEY (id),
        UNIQUE field_name (field_name)
        )
        {$charset_collate};";
    
        dbDelta($sql);
    
        $wpdb->insert($table_name,['field_name' => 'main_title']);
        $wpdb->insert($table_name,['field_name' => 'stage_1_title']);
        $wpdb->insert($table_name,['field_name' => 'stage_1_text']);
        $wpdb->insert($table_name,['field_name' => 'stage_2_title']);
        $wpdb->insert($table_name,['field_name' => 'stage_2_text']);
        $wpdb->insert($table_name,['field_name' => 'stage_3_title']);
        $wpdb->insert($table_name,['field_name' => 'stage_3_text']);
    }
}

function update_delivery_stages_tbl_field_content($field_name, $post_value) {
    global $wpdb;
    $table_name = $wpdb->prefix . "delivery_stages";
    $current_value = get_delivery_stages_tbl_field_content($field_name);

    if($current_value === $post_value) return;
    $wpdb->update($table_name,['field_content' => $post_value], ['field_name' => $field_name]);;
}

if(isset($_POST['delivery_stages']['main']['title'])) update_delivery_stages_tbl_field_content('main_title', $_POST['delivery_stages']['main']['title']);
if(isset($_POST['delivery_stages']['stage1']['title'])) update_delivery_stages_tbl_field_content('stage_1_title', $_POST['delivery_stages']['stage1']['title']);
if(isset($_POST['delivery_stages']['stage1']['text'])) update_delivery_stages_tbl_field_content('stage_1_text', $_POST['delivery_stages']['stage1']['text']);
if(isset($_POST['delivery_stages']['stage2']['title'])) update_delivery_stages_tbl_field_content('stage_2_title', $_POST['delivery_stages']['stage2']['title']);
if(isset($_POST['delivery_stages']['stage2']['text'])) update_delivery_stages_tbl_field_content('stage_2_text', $_POST['delivery_stages']['stage2']['text']);
if(isset($_POST['delivery_stages']['stage3']['title'])) update_delivery_stages_tbl_field_content('stage_3_title', $_POST['delivery_stages']['stage3']['title']);
if(isset($_POST['delivery_stages']['stage3']['text'])) update_delivery_stages_tbl_field_content('stage_3_text', $_POST['delivery_stages']['stage3']['text']);


function get_delivery_stages_tbl_field_content($field_name) {
    global $wpdb;
    $table_name = $wpdb->get_blog_prefix() . 'delivery_stages';
    $request = "SELECT field_content FROM $table_name WHERE field_name = '$field_name'";
    $response = $wpdb->get_var($request);
    $response = wp_unslash($response);

    return $response;
}

function get_delivery_stages_main_title() {
    $value = get_delivery_stages_tbl_field_content('main_title');
    return print($value);
}

function get_delivery_stages_stage_1_title() {
    $value = get_delivery_stages_tbl_field_content('stage_1_title');
    return print($value);
}

function get_delivery_stages_stage_1_text() {
    $value = get_delivery_stages_tbl_field_content('stage_1_text');
    $value = esc_attr($value);
    return print($value);
}
function get_delivery_stages_stage_2_title() {
    $value = get_delivery_stages_tbl_field_content('stage_2_title');
    return print($value);
}

function get_delivery_stages_stage_2_text() {
    $value = get_delivery_stages_tbl_field_content('stage_2_text');
    $value = esc_attr($value);
    return print($value);
}
function get_delivery_stages_stage_3_title() {
    $value = get_delivery_stages_tbl_field_content('stage_3_title');
    return print($value);
}

function get_delivery_stages_stage_3_text() {
    $value = get_delivery_stages_tbl_field_content('stage_3_text');
    $value = esc_attr($value);
    return print($value);
}


?>