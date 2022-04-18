<?php

function get_field_name_from_services_table(string $field_name) : string {
    global $wpdb;

    $table_name = $wpdb->prefix . 'services';
    $request = "SELECT field_content FROM $table_name WHERE field_name = '$field_name'";
    
    $response = $wpdb->get_var($request);
    $response = wp_unslash($response);
    
    return $response;    
}

function get_services_img_src(int $img_num) : string {
    $field_name = 'img_'.(string)$img_num;
    $img_name = get_field_name_from_services_table($field_name);
    $img_name = esc_attr($img_name);
    $src = content_url() . "/uploads/site_img/service/" . $img_name;

    return print($src);
}

function get_services_title (int $title_num) : string {
    $field_name = 'title_' . (string)$title_num;
    $title_content = get_field_name_from_services_table($field_name);
    $title_content = wp_unslash($title_content);
    
    return print($title_content);
}

function get_services_text (int $text_num) : string {
    $field_name = 'text_' . (string)$text_num;
    $text_content = get_field_name_from_services_table($field_name);
    $text_content = wp_unslash($text_content);
    
    return print($text_content);
}
?>