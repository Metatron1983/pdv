<?php
    add_action('wp_enqueue_scripts', 'add_head_style');

    function add_head_style () {
        $theme_uri = get_template_directory_uri();
        wp_register_style('style', $theme_uri.'/style.css', false, '0.1');
        wp_register_style('mainbanner_style', $theme_uri.'/template-parts/main_banner/main_banner.css', false, '0.1');
        wp_register_style('services_style', $theme_uri.'/template-parts/services/services.css', false, '0.1');
        wp_register_style('quiz_style', $theme_uri.'/template-parts/quiz/quiz.css', false, '0.1');
        wp_register_script('quiz_js', $theme_uri.'/template-parts/quiz/quiz.js', false, '0.1', true);
        wp_register_style('advantages_style', $theme_uri.'/template-parts/advantages/advantages.css', false, '0.1');
        wp_register_style('delivery_stages_style', $theme_uri.'/template-parts/delivery_stages/delivery_stages.css', false, '0.1');
        wp_register_style('clients_style', $theme_uri.'/template-parts/clients/clients.css', false, '0.1');
        wp_register_style('manager_cart_style', $theme_uri.'/template-parts/managers/manager_cart/manager_cart.css', false, '0.1');
        wp_register_style('manager_style', $theme_uri.'/template-parts/managers/managers.css', false, '0.1');
        wp_register_style('contacts_style', $theme_uri.'/template-parts/contacts/contacts.css', false, '0.1');
        wp_register_style('feedback_style', $theme_uri.'/template-parts/feedback/feedback.css', false, '0.1');
        wp_register_script('feedback_script', $theme_uri.'/template-parts/feedback/feedback.js', false, '0.1', true);
        
        
        wp_enqueue_script( 'jquery');
        wp_enqueue_style('style');
        wp_enqueue_style('mainbanner_style');
        wp_enqueue_style('services_style');
        wp_enqueue_style('quiz_style');
        wp_enqueue_script('quiz_js');
        wp_enqueue_style('advantages_style');
        wp_enqueue_style('delivery_stages_style');
        wp_enqueue_style('clients_style');
        wp_enqueue_style('manager_cart_style');
        wp_enqueue_style('manager_style');
        wp_enqueue_style('contacts_style');
        wp_enqueue_style('feedback_style');
        wp_enqueue_script('feedback_script');
        

        wp_localize_script( 'quiz_js', 'MyAjax',
            array( 'ajaxurl' => admin_url('admin-ajax.php')));
    };

?>