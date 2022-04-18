<?php

create_quiz_table_DB();
function create_quiz_table_DB() {
    require_once ABSPATH . 'wp-admin/includes/upgrade.php';
    global $wpdb;

    $table_name = $wpdb->prefix .'quiz';
    $charset_collate = $wpdb->get_charset_collate();
    
    if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") !== $table_name) {
        $sql = "CREATE TABLE {$table_name} (
            id  bigint(20) unsigned NOT NULL auto_increment,
            field_name varchar(100) NOT NULL default '',
            field_content varchar(1000) NOT NULL default '',
            PRIMARY KEY  (id),
            UNIQUE field_name (field_name)
            )
            {$charset_collate};";
        
        dbDelta($sql);
        
        $wpdb->insert($table_name,['field_name'=>'title']);
        $wpdb->insert($table_name,['field_name'=>'text']);
        $wpdb->insert($table_name,['field_name'=>'title_question_1']);
        $wpdb->insert($table_name,['field_name'=>'text_question_1']);
        $wpdb->insert($table_name,['field_name'=>'title_question_2']);
        $wpdb->insert($table_name,['field_name'=>'text_question_2']);
        $wpdb->insert($table_name,['field_name'=>'title_question_3']);
        $wpdb->insert($table_name,['field_name'=>'text_question_3']);
        $wpdb->insert($table_name,['field_name'=>'quize_vote_sum','field_content'=>'0']);
    }
    
}

function update_quiz_tbl_field_content(string $field_name, string $post_content) {
    global $wpdb;
    $field_content = get_quiz_tbl_field_content($field_name); 
    $table_name = $wpdb->prefix . 'quiz';

    if($field_content === $post_content) return;
    $wpdb->update($table_name, ['field_content'=>"$post_content"], ['field_name'=>"$field_name"]);
}

function get_quiz_tbl_field_content(string $field_name) : string {
    global $wpdb;
    $table_name = $wpdb->prefix . 'quiz';

    $field_content = $wpdb->get_var("SELECT field_content FROM $table_name WHERE field_name = '$field_name'");
    $field_content = wp_unslash($field_content);
    if ($field_content === null) $field_content = '';
    return $field_content;
}

if(isset($_POST['quiz_text_section_title'])) update_quiz_tbl_field_content('title', $_POST['quiz_text_section_title']);
if(isset($_POST['quiz_text_section_text'])) update_quiz_tbl_field_content('text', $_POST['quiz_text_section_text']);
if(isset($_POST['quiz_question_1_title'])) update_quiz_tbl_field_content('title_question_1', $_POST['quiz_question_1_title']);
if(isset($_POST['quiz_question_1_text'])) update_quiz_tbl_field_content('text_question_1', $_POST['quiz_question_1_text']);
if(isset($_POST['quiz_question_2_title'])) update_quiz_tbl_field_content('title_question_2', $_POST['quiz_question_2_title']);
if(isset($_POST['quiz_question_2_text'])) update_quiz_tbl_field_content('text_question_2', $_POST['quiz_question_2_text']);
if(isset($_POST['quiz_question_3_title'])) update_quiz_tbl_field_content('title_question_3', $_POST['quiz_question_3_title']);
if(isset($_POST['quiz_question_3_text'])) update_quiz_tbl_field_content('text_question_3', $_POST['quiz_question_3_text']);


function get_quiz_title() {
    $field_content = get_quiz_tbl_field_content('title');
    $field_content = esc_attr($field_content);
    return print($field_content);
}


function get_quiz_text() {
    $field_content = get_quiz_tbl_field_content('text');
    return print($field_content);
}

function get_title_question_1_quiz() {
    $field_content = get_quiz_tbl_field_content('title_question_1');
    $field_content = esc_attr($field_content);
    return print($field_content);
}

function get_text_question_1_quiz() {
    $field_content = get_quiz_tbl_field_content('text_question_1');
    return print($field_content);
}
function get_title_question_2_quiz() {
    $field_content = get_quiz_tbl_field_content('title_question_2');
    $field_content = esc_attr($field_content);
    return print($field_content);
}

function get_text_question_2_quiz() {
    $field_content = get_quiz_tbl_field_content('text_question_2');
    return print($field_content);
}
function get_title_question_3_quiz() {
    $field_content = get_quiz_tbl_field_content('title_question_3');
    $field_content = esc_attr($field_content);
    return print($field_content);
}

function get_text_question_3_quiz() {
    $field_content = get_quiz_tbl_field_content('text_question_3');
    return print($field_content);
}

function get_qize_vote_sum() {
    $field_content = get_quiz_tbl_field_content('quize_vote_sum');
    return print($field_content);
}

?>