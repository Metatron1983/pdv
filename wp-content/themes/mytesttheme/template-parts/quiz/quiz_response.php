<?php
    add_action( 'wp_ajax_get_quiz_vote', 'get_quiz_vote_count_clb' );
    add_action( 'wp_ajax_nopriv_get_quiz_vote', 'get_quiz_vote_count_clb' );
    function get_quiz_vote_count_clb() {
        $user_scope_work = $_POST['user_scope_work'];

        if ($user_scope_work) {
            global $wpdb;

            $table_name = $wpdb->prefix . 'quiz';

            $sql = "SELECT field_content FROM $table_name WHERE field_name = 'quize_vote_sum'";
            $new_result = $wpdb->get_var($sql);
            $new_result = (int)($new_result) + 1;
            $new_result = (string)($new_result);

            $wpdb->update("$table_name", ['field_content' => "$new_result"], ["field_name"=>'quize_vote_sum']);

            echo $new_result;
        };
        wp_die();
    }

?>