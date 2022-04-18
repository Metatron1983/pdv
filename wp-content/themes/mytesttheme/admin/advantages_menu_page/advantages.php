<?php

add_action('admin_enqueue_scripts', 'add_advantages_scripts_styles');

function add_advantages_scripts_styles() {
    wp_register_style('advantages_menu_style', content_url() . '/themes/mytesttheme/admin/advantages_menu_page/advantages.css');
    wp_enqueue_style('advantages_menu_style');
    wp_register_script('advantages_js', content_url() . '/themes/mytesttheme/admin/advantages_menu_page/advantages.js','',false,true);
    wp_enqueue_script( 'advantages_js');
}

add_menu_page('Преимущества', 'Преимущества', 'edit_others_pages', 'advantages_admin_slug', 'show_advantages_admin_page', 'dashicons-money-alt');

function show_advantages_admin_page() {
    require_once dirname(__FILE__) .'/advantages_function.php'
    ?>
	<div class="wrap">
		<h2 class="advantages-admin_title">Cтраница настроек секции "Наши преимущества" </h2>

		<form class="advantages-admin_form" method="POST" enctype="multipart/form-data">
			<?php
				settings_fields( 'advantages_admin_group' );
				do_settings_sections( 'advantages_admin_slug' ); 
				submit_button();
			?>
		</form>
	</div>
	<?php
}

add_action('admin_init', 'add_advantages_setting_section');

function add_advantages_setting_section () {
	add_settings_section( 'advantages_admin_banner_id', 'Выполните настройки секции "Баннер"', '',  'advantages_admin_slug');
    
	add_settings_field('advantages_admin_banner_title_id', 'Введите текст баннера', 'advantages_admin_banner_title_clb', 'advantages_admin_slug', 'advantages_admin_banner_id');
	add_settings_field('advantages_admin_banner_image_PC_id', 'Выбирете изображение для PC', 'advantages_admin_banner_image_PC_clb', 'advantages_admin_slug', 'advantages_admin_banner_id');
	add_settings_field('advantages_admin_banner_image_tablet_id', 'Выбирете изображение для планшета', 'advantages_admin_banner_image_tablet_clb', 'advantages_admin_slug', 'advantages_admin_banner_id');

    register_setting( 'advantages_admin_group', 'advantages_admin_banner_title_id');
    register_setting( 'advantages_admin_group', 'advantages_admin_banner_image_PC_id');
    register_setting( 'advantages_admin_group', 'advantages_admin_banner_image_tablet_id');
    
    add_settings_section('advantages_admin_advantage_1_slug', 'Выполните настройку преимущества № 1', '', 'advantages_admin_slug');

    add_settings_field('advantages_admin_advantage_1_image_slug', 'Выбирете пиктограмму', 'advantages_admin_advantage_1_image_clb', 'advantages_admin_slug', 'advantages_admin_advantage_1_slug');
    add_settings_field('advantages_admin_advantage_1_title_slug', 'Введите название преимущества', 'advantages_admin_advantage_1_title_clb', 'advantages_admin_slug', 'advantages_admin_advantage_1_slug');
    add_settings_field('advantages_admin_advantage_1_text_slug', 'Введите описание преимущества', 'advantages_admin_advantage_1_text_clb', 'advantages_admin_slug', 'advantages_admin_advantage_1_slug');

    register_setting('advantages_admin_group', 'advantages_admin_advantage_1_image_slug');
    register_setting('advantages_admin_group', 'advantages_admin_advantage_1_title_slug');
    register_setting('advantages_admin_group', 'advantages_admin_advantage_1_text_slug');
    
    add_settings_section('advantages_admin_advantage_2_slug', 'Выполните настройку преимущества № 2', '', 'advantages_admin_slug');

    add_settings_field('advantages_admin_advantage_2_image_slug', 'Выбирете пиктограмму', 'advantages_admin_advantage_2_image_clb', 'advantages_admin_slug', 'advantages_admin_advantage_2_slug');
    add_settings_field('advantages_admin_advantage_2_title_slug', 'Введите название преимущества', 'advantages_admin_advantage_2_title_clb', 'advantages_admin_slug', 'advantages_admin_advantage_2_slug');
    add_settings_field('advantages_admin_advantage_2_text_slug', 'Введите описание преимущества', 'advantages_admin_advantage_2_text_clb', 'advantages_admin_slug', 'advantages_admin_advantage_2_slug');

    register_setting('advantages_admin_group', 'advantages_admin_advantage_2_image_slug');
    register_setting('advantages_admin_group', 'advantages_admin_advantage_2_title_slug');
    register_setting('advantages_admin_group', 'advantages_admin_advantage_2_text_slug');
    
    add_settings_section('advantages_admin_advantage_3_slug', 'Выполните настройку преимущества № 3', '', 'advantages_admin_slug');

    add_settings_field('advantages_admin_advantage_3_image_slug', 'Выбирете пиктограмму', 'advantages_admin_advantage_3_image_clb', 'advantages_admin_slug', 'advantages_admin_advantage_3_slug');
    add_settings_field('advantages_admin_advantage_3_title_slug', 'Введите название преимущества', 'advantages_admin_advantage_3_title_clb', 'advantages_admin_slug', 'advantages_admin_advantage_3_slug');
    add_settings_field('advantages_admin_advantage_3_text_slug', 'Введите описание преимущества', 'advantages_admin_advantage_3_text_clb', 'advantages_admin_slug', 'advantages_admin_advantage_3_slug');

    register_setting('advantages_admin_group', 'advantages_admin_advantage_3_image_slug');
    register_setting('advantages_admin_group', 'advantages_admin_advantage_3_title_slug');
    register_setting('advantages_admin_group', 'advantages_admin_advantage_3_text_slug');
    
    add_settings_section('advantages_admin_advantage_4_slug', 'Выполните настройку преимущества № 4', '', 'advantages_admin_slug');

    add_settings_field('advantages_admin_advantage_4_image_slug', 'Выбирете пиктограмму', 'advantages_admin_advantage_4_image_clb', 'advantages_admin_slug', 'advantages_admin_advantage_4_slug');
    add_settings_field('advantages_admin_advantage_4_title_slug', 'Введите название преимущества', 'advantages_admin_advantage_4_title_clb', 'advantages_admin_slug', 'advantages_admin_advantage_4_slug');
    add_settings_field('advantages_admin_advantage_4_text_slug', 'Введите описание преимущества', 'advantages_admin_advantage_4_text_clb', 'advantages_admin_slug', 'advantages_admin_advantage_4_slug');

    register_setting('advantages_admin_group', 'advantages_admin_advantage_4_image_slug');
    register_setting('advantages_admin_group', 'advantages_admin_advantage_4_title_slug');
    register_setting('advantages_admin_group', 'advantages_admin_advantage_4_text_slug');
}

function advantages_admin_banner_title_clb() {
?>
    <input type="text" name="advantages_admin_banner[title]" class="advantages-admin_banner-title" maxlength="100" value="<?php get_advantages_admin_banner_title()?>">
<?php
}

function advantages_admin_banner_image_PC_clb() {
?>
    <img class="advantages-admin_banner-image" src="<?php get_advantages_admin_banner_image_src() ?>" alt="Текущее изображение">
    <div class="advantages-admin_banner-image-wrapper">
        <label class="advantages-admin_banner-image-btn" for="advantages-admin_banner-image-id">Выбрать изображение</label>
        <input type="hidden" name="MAX_FILE_SIZE" value="5242880">
        <input class="advantages-admin_banner-image-input" type="file" name="advantages_admin_banner[image_PC]" id="advantages-admin_banner-image-id" accept=".png, .jpg, .jpeg, .webp, .svg" style="display: none;">
    </div>
<?php
}

function advantages_admin_banner_image_tablet_clb() {
?>
    <img class="advantages-admin_banner-image_tablet" src="<?php get_advantages_admin_banner_image_tablet_src()?>" alt="Текущее изображение">
    <div class="advantages-admin_banner-image-wrapper">
        <label class="advantages-admin_banner-image-btn" for="advantages-admin_banner-image-tablet-id">Выбрать изображение</label>
        <input type="hidden" name="MAX_FILE_SIZE" value="5242880">
        <input class="advantages-admin_banner-image-tiblet-input" type="file" name="advantages_admin_banner[image_tablet]" id="advantages-admin_banner-image-tablet-id" accept=".png, .jpg, .jpeg, .webp, .svg" style="display: none;">
    </div>
<?php
}

function advantages_admin_advantage_1_image_clb() {
?>
    <img class="advantages-admin-advantage-1_image" src="<?php get_advantages_admin_advantage_1_image() ?>" alt="Текущее изображение">
    <div class="advantages-admin-advantage-1_image-wrapper">
        <label for="advantages-admin-advantage-1_image-id" class="advantages-admin_banner-image-btn">Выбрать изображение</label>
        <input type="hidden" name="MAX_FILE_SIZE" value="5242880">
        <input class="advantages-admin-advantage-1_image-input" type="file" name="advantages-admin-advantage-1[image]" id="advantages-admin-advantage-1_image-id" accept=".png, .jpg, .jpeg, .webp, .svg" style="display: none;">
    </div>
<?php
}

function advantages_admin_advantage_1_title_clb() {
?>
    <input class="advantages-admin-advantage-1_title" type="text" name="advantages-admin-advantage-1[title]" maxlength="100" value="<?php get_advantages_admin_advantage_1_title()?>">
<?php
}

function advantages_admin_advantage_1_text_clb() {
?>
    <textarea class="advantages-admin-advantage-1_text" name="advantages-admin-advantage-1[text]" rows="3"><?php get_advantages_admin_advantage_1_text()?></textarea>
<?php
}

function advantages_admin_advantage_2_image_clb() {
?>
    <img class="advantages-admin-advantage-2_image" src="<?php get_advantages_admin_advantage_2_image() ?>" alt="Текущее изображение">
    <div class="advantages-admin-advantage-2_image-wrapper">
        <label for="advantages-admin-advantage-2_image-id" class="advantages-admin_banner-image-btn">Выбрать изображение</label>
        <input type="hidden" name="MAX_FILE_SIZE" value="5242880">
        <input class="advantages-admin-advantage-2_image-input" type="file" name="advantages-admin-advantage-2[image]" id="advantages-admin-advantage-2_image-id" accept=".png, .jpg, .jpeg, .webp, .svg" style="display: none;">
    </div>
<?php
}

function advantages_admin_advantage_2_title_clb() {
?>
    <input class="advantages-admin-advantage-2_title" type="text" name="advantages-admin-advantage-2[title]" maxlength="100" value="<?php get_advantages_admin_advantage_2_title()?>">
<?php
}

function advantages_admin_advantage_2_text_clb() {
?>
    <textarea class="advantages-admin-advantage-2_text" name="advantages-admin-advantage-2[text]" rows="3"><?php get_advantages_admin_advantage_2_text()?></textarea>
<?php
}


function advantages_admin_advantage_3_image_clb() {
?>
    <img class="advantages-admin-advantage-3_image" src="<?php get_advantages_admin_advantage_3_image() ?>" alt="Текущее изображение">
    <div class="advantages-admin-advantage-3_image-wrapper">
        <label for="advantages-admin-advantage-3_image-id" class="advantages-admin_banner-image-btn">Выбрать изображение</label>
        <input type="hidden" name="MAX_FILE_SIZE" value="5242880">
        <input class="advantages-admin-advantage-3_image-input" type="file" name="advantages-admin-advantage-3[image]" id="advantages-admin-advantage-3_image-id" accept=".png, .jpg, .jpeg, .webp, .svg" style="display: none;">
    </div>
<?php
}

function advantages_admin_advantage_3_title_clb() {
?>
    <input class="advantages-admin-advantage-3_title" type="text" name="advantages-admin-advantage-3[title]" maxlength="100" value="<?php get_advantages_admin_advantage_3_title()?>">
<?php
}

function advantages_admin_advantage_3_text_clb() {
?>
    <textarea class="advantages-admin-advantage-3_text" name="advantages-admin-advantage-3[text]" rows="3"><?php get_advantages_admin_advantage_3_text()?></textarea>
<?php
}

function advantages_admin_advantage_4_image_clb() {
?>
    <img class="advantages-admin-advantage-4_image" src="<?php get_advantages_admin_advantage_4_image() ?>" alt="Текущее изображение">
    <div class="advantages-admin-advantage-4_image-wrapper">
        <label for="advantages-admin-advantage-4_image-id" class="advantages-admin_banner-image-btn">Выбрать изображение</label>
        <input type="hidden" name="MAX_FILE_SIZE" value="5242880">
        <input class="advantages-admin-advantage-4_image-input" type="file" name="advantages-admin-advantage-4[image]" id="advantages-admin-advantage-4_image-id" accept=".png, .jpg, .jpeg, .webp, .svg" style="display: none;">
    </div>
<?php
}

function advantages_admin_advantage_4_title_clb() {
?>
    <input class="advantages-admin-advantage-4_title" type="text" name="advantages-admin-advantage-4[title]" maxlength="100" value="<?php get_advantages_admin_advantage_4_title()?>">
<?php
}

function advantages_admin_advantage_4_text_clb() {
?>
    <textarea class="advantages-admin-advantage-4_text" name="advantages-admin-advantage-4[text]" rows="3"><?php get_advantages_admin_advantage_4_text()?></textarea>
<?php
}



?>