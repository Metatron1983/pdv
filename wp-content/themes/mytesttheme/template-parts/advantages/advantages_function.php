<?php
 
 function read_table_field_content($field_name){
    global $wpdb;
    $table_name = $wpdb->prefix . 'advantages';
    
    $request = "SELECT field_content FROM $table_name WHERE field_name = '$field_name'";
    $response = $wpdb->get_var($request);
    $response = wp_unslash($response);
    
    if($response === NULL) $response = '';
    
    return $response;
}

function get_advantages_banner_title() {
    $result = read_table_field_content('title');
    $result = esc_attr($result);
    return print($result);
}

function get_advantages_banner_image_src() {
    $result = read_table_field_content('image');
    $result = esc_attr($result);
    $img_path = content_url() . "/uploads/site_img/advantages/{$result}";
    return print($img_path);
}

function get_advantages_banner_image_tablet_src() {
    $result = read_table_field_content('image_tablet');
    $result = esc_attr($result);
    $img_path = content_url() . "/uploads/site_img/advantages/{$result}";
    return print($img_path);
}

function get_advantages_advantage_1_image() {
    $result = read_table_field_content('advantage_1_image');
    $result = esc_attr($result);
    $img_path = content_url() . "/uploads/site_img/advantages/{$result}";
    return print($img_path);
}

function get_advantages_advantage_1_title() {
    $result = read_table_field_content('advantage_1_title');
    $result = esc_attr($result);
    return print($result);
}

function get_advantages_advantage_1_text() {
    $result = read_table_field_content('advantage_1_text');
    return print($result);
}

function get_advantages_advantage_2_image() {
    $result = read_table_field_content('advantage_2_image');
    $result = esc_attr($result);
    $img_path = content_url() . "/uploads/site_img/advantages/{$result}";
    return print($img_path);
}

function get_advantages_advantage_2_title() {
    $result = read_table_field_content('advantage_2_title');
    $result = esc_attr($result);
    return print($result);
}

function get_advantages_advantage_2_text() {
    $result = read_table_field_content('advantage_2_text');
    return print($result);
}

function get_advantages_advantage_3_image() {
    $result = read_table_field_content('advantage_3_image');
    $result = esc_attr($result);
    $img_path = content_url() . "/uploads/site_img/advantages/{$result}";
    return print($img_path);
}

function get_advantages_advantage_3_title() {
    $result = read_table_field_content('advantage_3_title');
    $result = esc_attr($result);
    return print($result);
}

function get_advantages_advantage_3_text() {
    $result = read_table_field_content('advantage_3_text');
    return print($result);
}

function get_advantages_advantage_4_image() {
    $result = read_table_field_content('advantage_4_image');
    $result = esc_attr($result);
    $img_path = content_url() . "/uploads/site_img/advantages/{$result}";
    return print($img_path);
}

function get_advantages_advantage_4_title() {
    $result = read_table_field_content('advantage_4_title');
    $result = esc_attr($result);
    return print($result);
}

function get_advantages_advantage_4_text() {
    $result = read_table_field_content('advantage_4_text');
    return print($result);
}

?>