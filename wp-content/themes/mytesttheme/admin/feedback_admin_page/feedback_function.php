<?php

create_table_feedback();

function create_table_feedback() {
	global $wpdb;
	
	require_once ABSPATH . 'wp-admin/includes/upgrade.php';

	$table_name = $wpdb->get_blog_prefix() . 'feedback';
	$charset_collate = $wpdb->get_charset_collate();

    if($table_name === $wpdb->get_var("SHOW TABLES LIKE '$table_name'")) return;
	$sql = "CREATE TABLE {$table_name} (
	id  bigint(20) unsigned NOT NULL auto_increment,
	field_name varchar(100) NOT NULL default '',
	field_content varchar(100) NOT NULL default '',
	PRIMARY KEY (id),
	UNIQUE field_name (field_name)
	)
	{$charset_collate};";

	dbDelta($sql);

	$wpdb->insert($table_name,["field_name"=>"title_name"]);
	$wpdb->insert($table_name,["field_name"=>"img"]);
	$wpdb->insert($table_name,["field_name"=>"textbox-descr"]);
	$wpdb->insert($table_name,["field_name"=>"addfile-descr"]);
	$wpdb->insert($table_name,["field_name"=>"addfoto-descr"]);
	$wpdb->insert($table_name,["field_name"=>"btn-submit-descr"]);
}

function update_field_name_from_feedback_tbl($post_content, $field_name) {
	global $wpdb;
	$current_field_name = get_field_name_from_feedback_tbl($field_name);
	$table_name = $wpdb->prefix . "feedback";

	if($current_field_name === $post_content) return;

	$wpdb->update($table_name,["field_content"=>"$post_content"],["field_name"=>"$field_name"]);
}
function update_img_from_feedback_tbl($file_content, $field_name, $file_name) {

	$current_field_name = get_field_name_from_feedback_tbl($field_name);
	$file_name_new = $file_content["name"][$file_name];

	if($current_field_name === $file_name_new) return;
	update_field_name_from_feedback_tbl($file_name_new, $field_name);
	
	$path_to_current_file = dirname(__FILE__, 5) . "/uploads/site_img/feedback/" . $current_field_name;
	if(file_exists($path_to_current_file)) unlink($path_to_current_file);

	$path_move_uploaded_file_from = $file_content['tmp_name'][$file_name];
	$path_move_uploaded_file_to = dirname(__FILE__, 5) . "/uploads/site_img/feedback/" . $file_name_new;

	move_uploaded_file($path_move_uploaded_file_from, $path_move_uploaded_file_to);
}

if(isset($_POST["feedback"]["title"])) update_field_name_from_feedback_tbl($_POST["feedback"]["title"], "title_name");
if(isset($_POST["feedback"]["textbox-descr"])) update_field_name_from_feedback_tbl($_POST["feedback"]["textbox-descr"], "textbox-descr");
if(isset($_POST["feedback"]["addfile-descr"])) update_field_name_from_feedback_tbl($_POST["feedback"]["addfile-descr"], "addfile-descr");
if(isset($_POST["feedback"]["addfoto-descr"])) update_field_name_from_feedback_tbl($_POST["feedback"]["addfoto-descr"], "addfoto-descr");
if(isset($_POST["feedback"]["btn-submit-descr"])) update_field_name_from_feedback_tbl($_POST["feedback"]["btn-submit-descr"], "btn-submit-descr");


if(isset($_FILES["feedback"]['name']['img'])) {
	if(is_uploaded_file($_FILES["feedback"]["tmp_name"]["img"])) update_img_from_feedback_tbl($_FILES["feedback"], "img", 'img');

} 

function get_field_name_from_feedback_tbl($field_name) {
	global $wpdb;
	$table_name = $wpdb->prefix . "feedback";
	$request = "SELECT field_content FROM $table_name WHERE field_name='$field_name'";
	$field_content = $wpdb->get_var($request);
	$field_content = wp_unslash($field_content);
	return $field_content;
}

function get_feedback_title_name_clb() {
	$field_content = get_field_name_from_feedback_tbl("title_name");
	$field_content = esc_attr($field_content);
	return print($field_content);
}

function get_feedback_img() {
	$field_content = get_field_name_from_feedback_tbl("img");
	$field_content = esc_attr($field_content);
	$field_content = content_url() . "/uploads/site_img/feedback/" . $field_content;
	return print($field_content);
}

function get_feedback_description_section_clb() {
	$field_content = get_field_name_from_feedback_tbl("textbox-descr");
	$field_content = esc_attr($field_content);
	return print($field_content);
}

function get_feedback_description_btn_add_file_clb() {
	$field_content = get_field_name_from_feedback_tbl("addfile-descr");
	$field_content = esc_attr($field_content);
	return print($field_content);
}

function get_feedback_description_btn_add_foto_clb() {
	$field_content = get_field_name_from_feedback_tbl("addfoto-descr");
	$field_content = esc_attr($field_content);
	return print($field_content);
}

function get_feedback_description_btn_submit_clb() {
	$field_content = get_field_name_from_feedback_tbl("btn-submit-descr");
	$field_content = esc_attr($field_content);
	return print($field_content);
}

?>