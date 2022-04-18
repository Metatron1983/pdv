<?php

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



function get_feedback_img() {
	$field_content = get_field_name_from_feedback_tbl("img");
	$field_content = esc_attr($field_content);
	$field_content = content_url() . "/uploads/site_img/feedback/" . $field_content;
	return print($field_content);
}

function get_feedback_doc_picto() {
	$field_content = content_url() . "/uploads/site_img/feedback/docpicto.svg";
	return print($field_content);
}
?>