<?php

add_action( 'admin_enqueue_scripts', 'register_delivery_styles' );

function register_delivery_styles() {
	wp_register_style( 'delivery_stages_style', get_template_directory_uri() .  '/admin/delivery_stages_menu_page/delivery_stages.css'  );
	wp_enqueue_style( 'delivery_stages_style' );
}


add_menu_page( 'Этапы доставки', 'Этапы доставки', 'edit_others_pages', 'delivery_stages_slug', 'add_delivery_stages_page_output',  'dashicons-editor-ol');

function add_delivery_stages_page_output(){
    require_once dirname(__FILE__) . "/delivery_stages_function.php";
	?>
	<div class="wrap">
		<h2 class="delivery-stage-admin_title">Страница настройки секции "Этапы доставки"</h2>

		<form class="delivery_stages_form" method="POST">
			<?php
				settings_fields( 'delivery_stages_group' );
				do_settings_sections( 'delivery_stages_slug' );
				submit_button();
			?>
		</form>
	</div>
	<?php
}

add_action('admin_init', 'add_settings_page');
function add_settings_page(){
    add_settings_section( 'delivery_stages_title_id', '', '', 'delivery_stages_slug' );
	
    add_settings_field('delivery_stages_title_name_id', 'Введите заголовок секции', 'delivery_stages_title_name_clb', 'delivery_stages_slug', 'delivery_stages_title_id' );
    
    register_setting( 'delivery_stages_group', 'delivery_stages_title_name_id');
	

    add_settings_section( 'delivery_stages_stage_1_id', 'Выполните настройку этапа № 1', '', 'delivery_stages_slug' );
	
	add_settings_field('delivery_stages_stage_1_title_id', 'Введите название этапа', 'delivery_stages_stage_1_title_clb', 'delivery_stages_slug', 'delivery_stages_stage_1_id');
	add_settings_field('delivery_stages_stage_1_text_id', 'Введите описание этапа', 'delivery_stages_stage_1_text_clb', 'delivery_stages_slug', 'delivery_stages_stage_1_id');
	
    register_setting( 'delivery_stages_group', 'delivery_stages_stage_1_title_id');
    register_setting( 'delivery_stages_group', 'delivery_stages_stage_1_text_id');
    
    add_settings_section( 'delivery_stages_stage_2_id', 'Выполните настройку этапа № 2', '', 'delivery_stages_slug' );
	
	add_settings_field('delivery_stages_stage_2_title_id', 'Введите название этапа', 'delivery_stages_stage_2_title_clb', 'delivery_stages_slug', 'delivery_stages_stage_2_id');
	add_settings_field('delivery_stages_stage_2_text_id', 'Введите описание этапа', 'delivery_stages_stage_2_text_clb', 'delivery_stages_slug', 'delivery_stages_stage_2_id');
	
    register_setting( 'delivery_stages_group', 'delivery_stages_stage_2_title_id');
    register_setting( 'delivery_stages_group', 'delivery_stages_stage_2_text_id');
    
    add_settings_section( 'delivery_stages_stage_3_id', 'Выполните настройку этапа № 3', '', 'delivery_stages_slug' );
	
	add_settings_field('delivery_stages_stage_3_title_id', 'Введите название этапа', 'delivery_stages_stage_3_title_clb', 'delivery_stages_slug', 'delivery_stages_stage_3_id');
	add_settings_field('delivery_stages_stage_3_text_id', 'Введите описание этапа', 'delivery_stages_stage_3_text_clb', 'delivery_stages_slug', 'delivery_stages_stage_3_id');
	
    register_setting( 'delivery_stages_group', 'delivery_stages_stage_3_title_id');
    register_setting( 'delivery_stages_group', 'delivery_stages_stage_3_text_id');
}

function delivery_stages_title_name_clb() {
?>
    <input class="delivery_stages_title" type="text" name="delivery_stages[main][title]" maxlength="100" value="<?php get_delivery_stages_main_title()?>">
<?php
}

function delivery_stages_stage_1_title_clb() {
?>
    <input class="delivery_stages_title" type="text" name="delivery_stages[stage1][title]" maxlength="100" value="<?php get_delivery_stages_stage_1_title()?>">
<?php
}

function delivery_stages_stage_1_text_clb() {
?>
    <textarea class="delivery-stages_text" name="delivery_stages[stage1][text]" rows="3" maxlength="1000"><?php get_delivery_stages_stage_1_text()?></textarea>
<?php
}

function delivery_stages_stage_2_title_clb() {
?>
    <input class="delivery_stages_title" type="text" name="delivery_stages[stage2][title]" maxlength="100" value="<?php get_delivery_stages_stage_2_title()?>">
<?php
}

function delivery_stages_stage_2_text_clb() {
?>
    <textarea class="delivery-stages_text" name="delivery_stages[stage2][text]" rows="3" maxlength="1000"><?php get_delivery_stages_stage_2_text()?></textarea>
<?php
}

function delivery_stages_stage_3_title_clb() {
?>
    <input class="delivery_stages_title" type="text" name="delivery_stages[stage3][title]" maxlength="100" value="<?php get_delivery_stages_stage_3_title()?>">
<?php
}

function delivery_stages_stage_3_text_clb() {
?>
    <textarea class="delivery-stages_text" name="delivery_stages[stage3][text]" rows="3" maxlength="1000"><?php get_delivery_stages_stage_3_text()?></textarea>
<?php
}
?>