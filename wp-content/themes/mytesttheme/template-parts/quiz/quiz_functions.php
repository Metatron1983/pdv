<?php
    function get_quiz_tbl_field_content(string $field_name) : string {
        global $wpdb;
        $table_name = $wpdb->prefix . 'quiz';
    
        $field_content = $wpdb->get_var("SELECT field_content FROM $table_name WHERE field_name = '$field_name'");
        $field_content = wp_unslash($field_content);
        if ($field_content === null) $field_content = '';
        return $field_content;
    }

    function get_quiz_title() {
        $field_content = get_quiz_tbl_field_content('title');
        return print($field_content);
    }
    
    
    function get_quiz_text() {
        $field_content = get_quiz_tbl_field_content('text');
        return print($field_content);
    }
    
    function get_title_question_1_quiz() {
        $field_content = get_quiz_tbl_field_content('title_question_1');
        return print($field_content);
    }
    
    function get_text_question_1_quiz() {
        $field_content = get_quiz_tbl_field_content('text_question_1');
        return print($field_content);
    }
    function get_title_question_2_quiz() {
        $field_content = get_quiz_tbl_field_content('title_question_2');
        return print($field_content);
    }
    
    function get_text_question_2_quiz() {
        $field_content = get_quiz_tbl_field_content('text_question_2');
        return print($field_content);
    }
    function get_title_question_3_quiz() {
        $field_content = get_quiz_tbl_field_content('title_question_3');
        return print($field_content);
    }
    
    function get_text_question_3_quiz() {
        $field_content = get_quiz_tbl_field_content('text_question_3');
        return print($field_content);
    }
    
    function get_qize_vote_sum() {
        $field_content = get_quiz_tbl_field_content('quize_vote_sum');
        $field_content = (int)($field_content);
        $field_content = number_format($field_content, 0, '',' ');
        $field_content = (string)$field_content;
        return print($field_content);
    }

    function set_disabled() {
        if (isset($_COOKIE['isVote'])) return print('disabled');
    }


   

?>