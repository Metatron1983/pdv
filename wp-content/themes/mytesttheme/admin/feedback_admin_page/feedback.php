<?php

add_action( 'admin_enqueue_scripts', 'add_feedback_style' );
function add_feedback_style() {
	wp_register_style( 'feedback-css', content_url() . '/themes/mytesttheme/admin/feedback_admin_page/feedback.css' );
	wp_enqueue_style( 'feedback-css' );
	wp_register_script( 'feedback-js', content_url() . '/themes/mytesttheme/admin/feedback_admin_page/feedback.js', "", false, true );
	wp_enqueue_script( 'feedback-js' );
}

add_menu_page( 'Свяжитесь с нами', 'Свяжитесь с нами', "edit_others_pages", "feedback_slug", "feedback_page_output", "dashicons-edit");

function feedback_page_output(){
require_once dirname(__FILE__) . "/feedback_function.php";
?>
<div class="wrap feedback">
	<h2 class="feedback_title">Страница настройки секции "Свяжитесь с нами"</h2>

	<form class="feedback_form" method="POST" enctype="multipart/form-data">
		<?php
			settings_fields( 'feedback_group' );     
			do_settings_sections( 'feedback_slug' ); 
			submit_button();
		?>
	</form>
</div>
<?php
}

add_action('admin_init', 'feedback_settings');
function feedback_settings(){
	add_settings_section( 'feedback_section_id', '', '', 'feedback_slug' );
    
	add_settings_field('feedback_title_name_id', 'Введите название секции', 'add_feedback_title_name_clb', 'feedback_slug', 'feedback_section_id' );
	add_settings_field('feedback_img_id', 'Фотография баннера', 'add_feedback_img_clb', 'feedback_slug', 'feedback_section_id' );
	add_settings_field('feedback_description_section_id', 'Введите плейсхолдер для описания', 'add_feedback_description_section_clb', 'feedback_slug', 'feedback_section_id' );
	add_settings_field('feedback_description_btn_add_file_id', 'Введите плейсхолдер для добавления файла', 'add_feedback_description_btn_add_file_clb', 'feedback_slug', 'feedback_section_id' );
	add_settings_field('feedback_description_btn_add_foto_id', 'Введите плейсхолдер для добавления фото', 'add_feedback_description_btn_add_foto_clb', 'feedback_slug', 'feedback_section_id' );
	add_settings_field('feedback_description_btn_submit_id', 'Введите плейсхолдер для описания кнопки отправить', 'add_feedback_description_btn_submit_clb', 'feedback_slug', 'feedback_section_id' );
    
    register_setting( 'feedback_group', 'feedback_title_name_id');
    register_setting( 'feedback_group', 'feedback_img_id');
    register_setting( 'feedback_group', 'feedback_description_section_id');
    register_setting( 'feedback_group', 'feedback_description_btn_add_file_id');
    register_setting( 'feedback_group', 'feedback_description_btn_add_foto_id');
    register_setting( 'feedback_group', 'feedback_description_btn_submit_id');
}

function add_feedback_title_name_clb() {
?>
<input class="feedback_title-field" type="text" name="feedback[title]" maxlength="100" value="<?php get_feedback_title_name_clb()?>">
<?php
}

function add_feedback_img_clb() {
?>
<img src="<?php get_feedback_img()?>" alt="Изображение баннера" class="feedback_img">
<div class="feedback_img-btn-wrapper">
	<label for="feedback_img-btn-id" class="feedback_img-btn">Выбрать фото</label>
	<input type="hidden" name="MAX_FILE_SIZE" value="5242880">
    <input class="feedback_img-file" id="feedback_img-btn-id" name="feedback[img]" type="file" style="display: none;" accept=".png, .jpg, .jpeg, .svg, .webp">
</div>
<?php
}

function add_feedback_description_section_clb() {
?>
<input type="text" name="feedback[textbox-descr]" class="feedback_description-textbox" maxlength="100" value="<?php get_feedback_description_section_clb()?>">
<?php
}

function add_feedback_description_btn_add_file_clb() {
?>
<input type="text" name="feedback[addfile-descr]" class="feedback_description-add-file" maxlength="100" value="<?php get_feedback_description_btn_add_file_clb()?>">
<?php
}

function add_feedback_description_btn_add_foto_clb() {
?>
<input type="text" name="feedback[addfoto-descr]" class="feedback_description-add-foto" maxlength="100" value="<?php get_feedback_description_btn_add_foto_clb()?>">
<?php
}

function add_feedback_description_btn_submit_clb () {
?>
<input type="text" name="feedback[btn-submit-descr]" class="feedback_description-btn-submit" maxlength="100" value="<?php get_feedback_description_btn_submit_clb()?>">
<?php
}
?>