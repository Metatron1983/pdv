<?php
create_manager_tbl();

function create_manager_tbl() {
	global $wpdb;
    $table_name = $wpdb->get_blog_prefix() . 'managers';
	
	if ($table_name === $wpdb->get_var("SHOW TABLES LIKE '$table_name'")) return;
    require_once ABSPATH . 'wp-admin/includes/upgrade.php';
	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE {$table_name} (
	id  bigint(20) unsigned NOT NULL auto_increment,
	field_name varchar(100) NOT NULL default '',
	field_content varchar(1000) NOT NULL default '',
	PRIMARY KEY (id),
	UNIQUE field_name (field_name)
	)
	{$charset_collate};";

	dbDelta($sql);

	$wpdb->insert($table_name,["field_name"=>"main_title"]);
	
	$wpdb->insert($table_name,["field_name"=>"manager_1_img"]);
	$wpdb->insert($table_name,["field_name"=>"manager_1_name"]);
	$wpdb->insert($table_name,["field_name"=>"manager_1_position"]);
	$wpdb->insert($table_name,["field_name"=>"manager_1_instagram"]);
	$wpdb->insert($table_name,["field_name"=>"manager_1_VK"]);
	$wpdb->insert($table_name,["field_name"=>"manager_1_linkedin"]);
	
	$wpdb->insert($table_name,["field_name"=>"manager_2_img"]);
	$wpdb->insert($table_name,["field_name"=>"manager_2_name"]);
	$wpdb->insert($table_name,["field_name"=>"manager_2_position"]);
	$wpdb->insert($table_name,["field_name"=>"manager_2_instagram"]);
	$wpdb->insert($table_name,["field_name"=>"manager_2_VK"]);
	$wpdb->insert($table_name,["field_name"=>"manager_2_linkedin"]);
	
	$wpdb->insert($table_name,["field_name"=>"manager_3_img"]);
	$wpdb->insert($table_name,["field_name"=>"manager_3_name"]);
	$wpdb->insert($table_name,["field_name"=>"manager_3_position"]);
	$wpdb->insert($table_name,["field_name"=>"manager_3_instagram"]);
	$wpdb->insert($table_name,["field_name"=>"manager_3_VK"]);
	$wpdb->insert($table_name,["field_name"=>"manager_3_linkedin"]);
	
	$wpdb->insert($table_name,["field_name"=>"manager_4_img"]);
	$wpdb->insert($table_name,["field_name"=>"manager_4_name"]);
	$wpdb->insert($table_name,["field_name"=>"manager_4_position"]);
	$wpdb->insert($table_name,["field_name"=>"manager_4_instagram"]);
	$wpdb->insert($table_name,["field_name"=>"manager_4_VK"]);
	$wpdb->insert($table_name,["field_name"=>"manager_4_linkedin"]);
	
	$wpdb->insert($table_name,["field_name"=>"manager_5_img"]);
	$wpdb->insert($table_name,["field_name"=>"manager_5_name"]);
	$wpdb->insert($table_name,["field_name"=>"manager_5_position"]);
	$wpdb->insert($table_name,["field_name"=>"manager_5_instagram"]);
	$wpdb->insert($table_name,["field_name"=>"manager_5_VK"]);
	$wpdb->insert($table_name,["field_name"=>"manager_5_linkedin"]);
	
	$wpdb->insert($table_name,["field_name"=>"manager_6_img"]);
	$wpdb->insert($table_name,["field_name"=>"manager_6_name"]);
	$wpdb->insert($table_name,["field_name"=>"manager_6_position"]);
	$wpdb->insert($table_name,["field_name"=>"manager_6_instagram"]);
	$wpdb->insert($table_name,["field_name"=>"manager_6_VK"]);
	$wpdb->insert($table_name,["field_name"=>"manager_6_linkedin"]);
}

function update_filed_name_managers_tbl_txt($field_name, $post_file_content) {
    global $wpdb;
    $table_name = $wpdb->prefix . "managers";
    $current_value = get_field_content_from_tbl($field_name);
    
    if($current_value === $post_file_content) return;
    $wpdb->update($table_name, ['field_content' => "$post_file_content"], ['field_name' => "$field_name"]);
}

function update_filed_name_managers_tbl_img($field_name, $post_file, $manager_num) {
    
    $current_value = get_field_content_from_tbl($field_name);
    $field_content = $post_file['name'][$manager_num]['image'];
    
    if($current_value === $field_content) return;
    update_filed_name_managers_tbl_txt($field_name, $field_content);

    $path_upload_to = dirname(__FILE__, 5) . "/uploads/site_img/managers/" . $field_content;
    $path_upload_from = $post_file['tmp_name'][$manager_num]['image'];
    $path_curr_file = dirname(__FILE__, 5) . "/uploads/site_img/managers/" . $current_value;

    if(file_exists($path_curr_file)) unlink($path_curr_file);

    move_uploaded_file($path_upload_from, $path_upload_to);
}

if(isset($_POST['manager']['main']['title'])) update_filed_name_managers_tbl_txt("main_title", $_POST['manager']['main']['title']);

if(isset($_FILES['manager']["name"]['1']['image'])) {
    if(is_uploaded_file($_FILES['manager']["tmp_name"]['1']['image'])) update_filed_name_managers_tbl_img('manager_1_img', $_FILES['manager'],'1');
};
if(isset($_POST['manager']['1']['name'])) update_filed_name_managers_tbl_txt("manager_1_name", $_POST['manager']['1']['name']);
if(isset($_POST['manager']['1']['position'])) update_filed_name_managers_tbl_txt("manager_1_position", $_POST['manager']['1']['position']);
if(isset($_POST['manager']['1']['instagram'])) update_filed_name_managers_tbl_txt("manager_1_instagram", $_POST['manager']['1']['instagram']);
if(isset($_POST['manager']['1']['VK'])) update_filed_name_managers_tbl_txt("manager_1_VK", $_POST['manager']['1']['VK']);
if(isset($_POST['manager']['1']['linkedin'])) update_filed_name_managers_tbl_txt("manager_1_linkedin", $_POST['manager']['1']['linkedin']);

if(isset($_FILES['manager']["name"]['2']['image'])) {
    if(is_uploaded_file($_FILES['manager']["tmp_name"]['2']['image'])) update_filed_name_managers_tbl_img('manager_2_img', $_FILES['manager'],'2');
};
if(isset($_POST['manager']['2']['name'])) update_filed_name_managers_tbl_txt("manager_2_name", $_POST['manager']['2']['name']);
if(isset($_POST['manager']['2']['position'])) update_filed_name_managers_tbl_txt("manager_2_position", $_POST['manager']['2']['position']);
if(isset($_POST['manager']['2']['instagram'])) update_filed_name_managers_tbl_txt("manager_2_instagram", $_POST['manager']['2']['instagram']);
if(isset($_POST['manager']['2']['VK'])) update_filed_name_managers_tbl_txt("manager_2_VK", $_POST['manager']['2']['VK']);
if(isset($_POST['manager']['2']['linkedin'])) update_filed_name_managers_tbl_txt("manager_2_linkedin", $_POST['manager']['2']['linkedin']);

if(isset($_FILES['manager']["name"]['3']['image'])) {
    if(is_uploaded_file($_FILES['manager']["tmp_name"]['3']['image'])) update_filed_name_managers_tbl_img('manager_3_img', $_FILES['manager'],'3');
};
if(isset($_POST['manager']['3']['name'])) update_filed_name_managers_tbl_txt("manager_3_name", $_POST['manager']['3']['name']);
if(isset($_POST['manager']['3']['position'])) update_filed_name_managers_tbl_txt("manager_3_position", $_POST['manager']['3']['position']);
if(isset($_POST['manager']['3']['instagram'])) update_filed_name_managers_tbl_txt("manager_3_instagram", $_POST['manager']['3']['instagram']);
if(isset($_POST['manager']['3']['VK'])) update_filed_name_managers_tbl_txt("manager_3_VK", $_POST['manager']['3']['VK']);
if(isset($_POST['manager']['3']['linkedin'])) update_filed_name_managers_tbl_txt("manager_3_linkedin", $_POST['manager']['3']['linkedin']);

if(isset($_FILES['manager']["name"]['4']['image'])) {
    if(is_uploaded_file($_FILES['manager']["tmp_name"]['4']['image'])) update_filed_name_managers_tbl_img('manager_4_img', $_FILES['manager'],'4');
};
if(isset($_POST['manager']['4']['name'])) update_filed_name_managers_tbl_txt("manager_4_name", $_POST['manager']['4']['name']);
if(isset($_POST['manager']['4']['position'])) update_filed_name_managers_tbl_txt("manager_4_position", $_POST['manager']['4']['position']);
if(isset($_POST['manager']['4']['instagram'])) update_filed_name_managers_tbl_txt("manager_4_instagram", $_POST['manager']['4']['instagram']);
if(isset($_POST['manager']['4']['VK'])) update_filed_name_managers_tbl_txt("manager_4_VK", $_POST['manager']['4']['VK']);
if(isset($_POST['manager']['4']['linkedin'])) update_filed_name_managers_tbl_txt("manager_4_linkedin", $_POST['manager']['4']['linkedin']);

if(isset($_FILES['manager']["name"]['5']['image'])) {
    if(is_uploaded_file($_FILES['manager']["tmp_name"]['5']['image'])) update_filed_name_managers_tbl_img('manager_5_img', $_FILES['manager'],'5');
};
if(isset($_POST['manager']['5']['name'])) update_filed_name_managers_tbl_txt("manager_5_name", $_POST['manager']['5']['name']);
if(isset($_POST['manager']['5']['position'])) update_filed_name_managers_tbl_txt("manager_5_position", $_POST['manager']['5']['position']);
if(isset($_POST['manager']['5']['instagram'])) update_filed_name_managers_tbl_txt("manager_5_instagram", $_POST['manager']['5']['instagram']);
if(isset($_POST['manager']['5']['VK'])) update_filed_name_managers_tbl_txt("manager_5_VK", $_POST['manager']['5']['VK']);
if(isset($_POST['manager']['5']['linkedin'])) update_filed_name_managers_tbl_txt("manager_5_linkedin", $_POST['manager']['5']['linkedin']);

if(isset($_FILES['manager']["name"]['6']['image'])) {
    if(is_uploaded_file($_FILES['manager']["tmp_name"]['6']['image'])) update_filed_name_managers_tbl_img('manager_6_img', $_FILES['manager'],'6');
};
if(isset($_POST['manager']['6']['name'])) update_filed_name_managers_tbl_txt("manager_6_name", $_POST['manager']['6']['name']);
if(isset($_POST['manager']['6']['position'])) update_filed_name_managers_tbl_txt("manager_6_position", $_POST['manager']['6']['position']);
if(isset($_POST['manager']['6']['instagram'])) update_filed_name_managers_tbl_txt("manager_6_instagram", $_POST['manager']['6']['instagram']);
if(isset($_POST['manager']['6']['VK'])) update_filed_name_managers_tbl_txt("manager_6_VK", $_POST['manager']['6']['VK']);
if(isset($_POST['manager']['6']['linkedin'])) update_filed_name_managers_tbl_txt("manager_6_linkedin", $_POST['manager']['6']['linkedin']);

function get_field_content_from_tbl($field_name) {
	global $wpdb;
	$table_name = $wpdb->prefix . "managers";
	$request = "SELECT field_content FROM $table_name WHERE field_name='$field_name'";
	$response = $wpdb->get_var($request);
	$response = wp_unslash($response);
	return $response;
}

function get_manager_main_title() {
	$value = get_field_content_from_tbl("main_title");
	$value = esc_attr($value);
    return print($value);
}

function get_manager_1_img() {
	$value = get_field_content_from_tbl("manager_1_img");
	$value = esc_attr($value);
	$value = content_url() . "/uploads/site_img/managers/" . $value;
	return print($value);
}

function get_manager_1_name() {
	$value = get_field_content_from_tbl("manager_1_name");
	$value = esc_attr($value);
    return print($value);
}

function get_manager_1_position() {
	$value = get_field_content_from_tbl("manager_1_position");
	$value = esc_attr($value);
    return print($value);
}

function get_manager_1_instagram() {
	$value = get_field_content_from_tbl("manager_1_instagram");
	$value = esc_attr($value);
    return print($value);
}

function get_manager_1_VK() {
	$value = get_field_content_from_tbl("manager_1_VK");
	$value = esc_attr($value);
    return print($value);
}

function get_manager_1_linkedin() {
	$value = get_field_content_from_tbl("manager_1_linkedin");
	$value = esc_attr($value);
    return print($value);
}



function get_manager_2_img() {
	$value = get_field_content_from_tbl("manager_2_img");
	$value = esc_attr($value);
	$value = content_url() . "/uploads/site_img/managers/" . $value;
	return print($value);
}

function get_manager_2_name() {
	$value = get_field_content_from_tbl("manager_2_name");
	$value = esc_attr($value);
    return print($value);
}

function get_manager_2_position() {
	$value = get_field_content_from_tbl("manager_2_position");
	$value = esc_attr($value);
    return print($value);
}

function get_manager_2_instagram() {
	$value = get_field_content_from_tbl("manager_2_instagram");
	$value = esc_attr($value);
    return print($value);
}

function get_manager_2_VK() {
	$value = get_field_content_from_tbl("manager_2_VK");
	$value = esc_attr($value);
    return print($value);
}

function get_manager_2_linkedin() {
	$value = get_field_content_from_tbl("manager_2_linkedin");
	$value = esc_attr($value);
    return print($value);
}


function get_manager_3_img() {
	$value = get_field_content_from_tbl("manager_3_img");
	$value = esc_attr($value);
	$value = content_url() . "/uploads/site_img/managers/" . $value;
	return print($value);
}

function get_manager_3_name() {
	$value = get_field_content_from_tbl("manager_3_name");
	$value = esc_attr($value);
    return print($value);
}

function get_manager_3_position() {
	$value = get_field_content_from_tbl("manager_3_position");
	$value = esc_attr($value);
    return print($value);
}

function get_manager_3_instagram() {
	$value = get_field_content_from_tbl("manager_3_instagram");
	$value = esc_attr($value);
    return print($value);
}

function get_manager_3_VK() {
	$value = get_field_content_from_tbl("manager_3_VK");
	$value = esc_attr($value);
    return print($value);
}

function get_manager_3_linkedin() {
	$value = get_field_content_from_tbl("manager_3_linkedin");
	$value = esc_attr($value);
    return print($value);
}


function get_manager_4_img() {
	$value = get_field_content_from_tbl("manager_4_img");
	$value = esc_attr($value);
	$value = content_url() . "/uploads/site_img/managers/" . $value;
	return print($value);
}

function get_manager_4_name() {
	$value = get_field_content_from_tbl("manager_4_name");
	$value = esc_attr($value);
    return print($value);
}

function get_manager_4_position() {
	$value = get_field_content_from_tbl("manager_4_position");
	$value = esc_attr($value);
    return print($value);
}

function get_manager_4_instagram() {
	$value = get_field_content_from_tbl("manager_4_instagram");
	$value = esc_attr($value);
    return print($value);
}

function get_manager_4_VK() {
	$value = get_field_content_from_tbl("manager_4_VK");
	$value = esc_attr($value);
    return print($value);
}

function get_manager_4_linkedin() {
	$value = get_field_content_from_tbl("manager_4_linkedin");
	$value = esc_attr($value);
    return print($value);
}

function get_manager_5_img() {
	$value = get_field_content_from_tbl("manager_5_img");
	$value = esc_attr($value);
	$value = content_url() . "/uploads/site_img/managers/" . $value;
	return print($value);
}

function get_manager_5_name() {
	$value = get_field_content_from_tbl("manager_5_name");
	$value = esc_attr($value);
    return print($value);
}

function get_manager_5_position() {
	$value = get_field_content_from_tbl("manager_5_position");
	$value = esc_attr($value);
    return print($value);
}

function get_manager_5_instagram() {
	$value = get_field_content_from_tbl("manager_5_instagram");
	$value = esc_attr($value);
    return print($value);
}

function get_manager_5_VK() {
	$value = get_field_content_from_tbl("manager_5_VK");
	$value = esc_attr($value);
    return print($value);
}

function get_manager_5_linkedin() {
	$value = get_field_content_from_tbl("manager_5_linkedin");
	$value = esc_attr($value);
    return print($value);
}

function get_manager_6_img() {
	$value = get_field_content_from_tbl("manager_6_img");
	$value = esc_attr($value);
	$value = content_url() . "/uploads/site_img/managers/" . $value;
	return print($value);
}

function get_manager_6_name() {
	$value = get_field_content_from_tbl("manager_6_name");
	$value = esc_attr($value);
    return print($value);
}

function get_manager_6_position() {
	$value = get_field_content_from_tbl("manager_6_position");
	$value = esc_attr($value);
    return print($value);
}

function get_manager_6_instagram() {
	$value = get_field_content_from_tbl("manager_6_instagram");
	$value = esc_attr($value);
    return print($value);
}

function get_manager_6_VK() {
	$value = get_field_content_from_tbl("manager_6_VK");
	$value = esc_attr($value);
    return print($value);
}

function get_manager_6_linkedin() {
	$value = get_field_content_from_tbl("manager_6_linkedin");
	$value = esc_attr($value);
    return print($value);
}
?>