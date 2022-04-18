<?php
    function get_main_banner_title(){
        global $wpdb;
        $table_name = $wpdb->get_blog_prefix() . 'main_banner';
        $query = "SELECT field_content FROM  $table_name WHERE field_name='title'";
        $result = $wpdb->get_var($query);
        $result = wp_unslash($result);
        return print($result);
    }
    function get_main_banner_text(){
        global $wpdb;
        $table_name = $wpdb->get_blog_prefix() . 'main_banner';
        $query = "SELECT field_content FROM  $table_name WHERE field_name='text'";
        $result = $wpdb->get_var($query);
        $result = wp_unslash($result);
        return print($result);
    }
    function get_main_banner_text_mobile(){
        global $wpdb;
        $table_name = $wpdb->get_blog_prefix() . 'main_banner';
        $query = "SELECT field_content FROM  $table_name WHERE field_name='text_mobile'";
        $result = $wpdb->get_var($query);
        $result = wp_unslash($result);
        return print($result);
    }
    function get_main_banner_link(){
        global $wpdb;
        $table_name = $wpdb->get_blog_prefix() . 'main_banner';
        $query = "SELECT field_content FROM  $table_name WHERE field_name='link'";
        $result = $wpdb->get_var($query);
        $result = wp_unslash($result);
        return print($result);
    }
    function get_main_banner_img_desktop(){
        global $wpdb;
        $table_name = $wpdb->get_blog_prefix() . 'main_banner';
        $query = "SELECT field_content FROM  $table_name WHERE field_name='image_desktop'";
        $result = $wpdb->get_var($query);
        $result = wp_unslash($result);
        $result = esc_attr($result);
        $result = content_url() . "/uploads/site_img/main_banner/" . esc_attr($result);
        
        return print($result);
    }
    function get_main_banner_img_tablet(){
        global $wpdb;
        $table_name = $wpdb->get_blog_prefix() . 'main_banner';
        $query = "SELECT field_content FROM  $table_name WHERE field_name='image_tablet'";
        $result = $wpdb->get_var($query);
        $result = wp_unslash($result);
        $result = esc_attr($result);
        $result = content_url() . "/uploads/site_img/main_banner/" . esc_attr($result);
        return print($result);
    }
    function get_main_banner_img_mobile(){
        global $wpdb;
        $table_name = $wpdb->get_blog_prefix() . 'main_banner';
        $query = "SELECT field_content FROM  $table_name WHERE field_name='image_mobile'";
        $result = $wpdb->get_var($query);
        $result = wp_unslash($result);
        $result = content_url() . "/uploads/site_img/main_banner/" . esc_attr($result);
        return print($result);
    }
?>