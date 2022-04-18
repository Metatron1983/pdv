<?php

function get_data_from_clients_tbl($field_name) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'clients';

    $request = "SELECT field_content FROM $table_name WHERE field_name ='$field_name'";
    $response = $wpdb->get_var($request);
    $response = wp_unslash($response);
    return $response;
}

function get_clients_img($cart_num) {
    $field_name = "cart_{$cart_num}_img_name";
    $field_content = get_data_from_clients_tbl($field_name);
    $field_content = esc_attr($field_content);
    $img_src = content_url() . "/uploads/site_img/clients/" . $field_content;
    return print($img_src);
};

function get_company_name($cart_num) {
    $field_name = "cart_{$cart_num}_title";
    $company_name = get_data_from_clients_tbl($field_name);
    return print($company_name);
}

function get_company_description($cart_num) {
    $field_name = "cart_{$cart_num}_text";
    $company_descr = get_data_from_clients_tbl($field_name);
    return print($company_descr);
}

function get_clients_title(){
    $title = get_data_from_clients_tbl('main_title');
    return print($title);
}
?>