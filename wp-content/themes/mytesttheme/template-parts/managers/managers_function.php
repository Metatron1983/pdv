<?php

function get_manager_field_content($field_name) {
    global $wpdb;
    $table_name = $wpdb->prefix . "managers";

    $request = "SELECT field_content FROM $table_name WHERE field_name = '$field_name'";
    $field_content = $wpdb->get_var($request);
    $field_content = wp_unslash($field_content);
    return $field_content;
}

function get_manager_main_title() {
    $main_title = get_manager_field_content('main_title');
    return print($main_title);
}


?>