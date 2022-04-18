<?php

add_action('admin_enqueue_scripts', 'add_quiz_stile_scripts');

function add_quiz_stile_scripts() {
    wp_register_style('quiz_style',  get_template_directory_uri() . '/admin/quiz_menu_page/quiz.css');
    wp_enqueue_style('quiz_style');
}


add_menu_page("Опрос", 'Опрос', 'edit_others_pages', 'quiz_slug', 'quiz_build', 'dashicons-edit-page');

function quiz_build() {
    require_once dirname(__FILE__) .'/quiz_function.php'
    ?>
	<div class="wrap">
		<h2 class="quiz_main_title">Страница настроек секции "Опрос"</h2>

		<form class="quiz_form" method="POST" enctype="multipart/form-data">
			<?php
				settings_fields( 'quiz_group' );     
				do_settings_sections( 'quiz_slug' ); 
				submit_button();
			?>
		</form>
        <p class="quiz_vote-title quiz_form_block">Проголосовало всего: <span class="quiz_vote-sum"><?php get_qize_vote_sum() ?></span></p>
	</div>
	<?php
}

add_action('admin_init', 'add_quiz_setting_section');

function add_quiz_setting_section() {
    add_settings_section('quiz_text_section_id', 'Редактирование текстовых полей', '', 'quiz_slug');
    add_settings_field('title_quiz_id', 'Введите заголовок', 'quiz_title_clb', 'quiz_slug', 'quiz_text_section_id');
    add_settings_field('text_quiz_id', 'Введите текст', 'quiz_text_clb', 'quiz_slug', 'quiz_text_section_id');
    
    register_setting('quiz_group','title_quiz_id');
    register_setting('quiz_group','text_quiz_id');

    add_settings_section('quiz_question_section_id', 'Редактирование секции вопросов', '', 'quiz_slug');
    add_settings_field('title_question_1_quiz_id', 'Введите первый вопрос', 'title_question_1_quiz_clb','quiz_slug', 'quiz_question_section_id');
    add_settings_field('text_question_1_quiz_id', 'Введите описание первого вопроса', 'text_question_1_quiz_clb','quiz_slug', 'quiz_question_section_id');
    add_settings_field('title_question_2_quiz_id', 'Введите второй вопрос', 'title_question_2_quiz_clb','quiz_slug', 'quiz_question_section_id');
    add_settings_field('text_question_2_quiz_id', 'Введите описание второго вопроса', 'text_question_2_quiz_clb','quiz_slug', 'quiz_question_section_id');
    add_settings_field('title_question_3_quiz_id', 'Введите третий вопрос', 'title_question_3_quiz_clb','quiz_slug', 'quiz_question_section_id');
    add_settings_field('text_question_3_quiz_id', 'Введите описание третьего вопроса', 'text_question_3_quiz_clb','quiz_slug', 'quiz_question_section_id');

    register_setting('quiz_group', 'title_question_1_quiz_id');
    register_setting('quiz_group', 'text_question_1_quiz_id');
    register_setting('quiz_group', 'title_question_2_quiz_id');
    register_setting('quiz_group', 'text_question_2_quiz_id');
    register_setting('quiz_group', 'title_question_3_quiz_id');
    register_setting('quiz_group', 'text_question_3_quiz_id');
}

function quiz_title_clb() {
?>
<input class="quize_title quiz_form_block" type="text" name="quiz_text_section_title" maxlength="100" value="<?php get_quiz_title()?>">
<?php
}

function quiz_text_clb() {
?> 
<textarea class="quiz_text quiz_form_block" name="quiz_text_section_text" rows="3"><?php get_quiz_text()?></textarea>
<?php
}

function title_question_1_quiz_clb() {
?>
    <input class="quiz_question-1-title quiz_form_block" type="text" name="quiz_question_1_title" maxlength="100" value="<?php get_title_question_1_quiz() ?>">
<?php
}

function text_question_1_quiz_clb() {
?>
    <textarea class="quiz_question-1-text quiz_form_block" name="quiz_question_1_text" rows="3"><?php get_text_question_1_quiz() ?> </textarea>
<?php
}

function title_question_2_quiz_clb() {
?>
    <input class="quiz_question-2-title quiz_form_block" type="text" name="quiz_question_2_title" maxlength="100" value="<?php get_title_question_2_quiz() ?>">
<?php
}

function text_question_2_quiz_clb() {
?>
    <textarea class="quiz_question-2-text quiz_form_block" name="quiz_question_2_text" rows="3"><?php get_text_question_2_quiz() ?> </textarea>
<?php
}

function title_question_3_quiz_clb() {
?>
    <input class="quiz_question-3-title quiz_form_block" type="text" name="quiz_question_3_title" maxlength="100" value="<?php get_title_question_3_quiz() ?>">
<?php
}

function text_question_3_quiz_clb() {
?>
    <textarea class="quiz_question-3-text quiz_form_block" name="quiz_question_3_text" rows="3"><?php get_text_question_3_quiz() ?> </textarea>
<?php
}

?>