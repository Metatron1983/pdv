<?php
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
    return print($value);
}
function get_delivery_stages_stage_2_title() {
    $value = get_delivery_stages_tbl_field_content('stage_2_title');
    return print($value);
}

function get_delivery_stages_stage_2_text() {
    $value = get_delivery_stages_tbl_field_content('stage_2_text');
    return print($value);
}
function get_delivery_stages_stage_3_title() {
    $value = get_delivery_stages_tbl_field_content('stage_3_title');
    return print($value);
}

function get_delivery_stages_stage_3_text() {
    $value = get_delivery_stages_tbl_field_content('stage_3_text');
    return print($value);
}
?>