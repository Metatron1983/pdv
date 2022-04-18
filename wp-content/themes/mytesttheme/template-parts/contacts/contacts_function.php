<?php

function get_field_content_contacts_tbl($field_name) {
    global $wpdb;
    $table_name = $wpdb->prefix . "contacts";
    $request = "SELECT field_content FROM $table_name WHERE field_name = '$field_name'";
    $field_content = $wpdb->get_var($request);
    $field_content = wp_unslash($field_content);
    $field_content = esc_attr($field_content);
    return print($field_content);
}
?>