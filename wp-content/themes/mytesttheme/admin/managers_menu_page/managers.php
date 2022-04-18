<?php

add_action( 'admin_enqueue_scripts', 'register_manager_styles' );

// регистрируем файл стилей и добавляем его в очередь
function register_manager_styles() {
	wp_register_style("manager_style", content_url() . "/themes/mytesttheme/admin/managers_menu_page/managers.css" );
	wp_enqueue_style( 'manager_style' );
	wp_register_script("manager_js", content_url() . "/themes/mytesttheme/admin/managers_menu_page/managers.js", "" , false, true );
	wp_enqueue_script( 'manager_js' );
}

add_menu_page("Сотрудники компании", "Сотрудники компании", "edit_others_pages", "managers_slug", "menu_admin_page_output", "dashicons-id");


function menu_admin_page_output() {
    require_once dirname(__FILE__) . "/managers_function.php";
?>
<div class="wrap">

<h2 class="managers_title">Страница настройки секции "Сотрудники компании"</h2>

<form class="managers_admin_form" method="POST" enctype="multipart/form-data">
        <?php
            settings_fields( 'managers_group' );     // скрытые защитные поля
            do_settings_sections( 'managers_slug' ); // секции с настройками (опциями). У нас она всего одна 'section_id'
            submit_button();
        ?>
    </form>
</div>
<?php
}

add_action('admin_init', 'managers_admin_page_settings');

function managers_admin_page_settings() {
    add_settings_section( 'page_title_section_id', 'Выполните настройки секции "Название секции"', '', 'managers_slug' );

	add_settings_field('manager_main_title_field', 'Введите название секции', 'manager_main_title_clb', 'managers_slug', 'page_title_section_id' );
    register_setting('managers_group', 'manager_main_title_field');
    
    add_settings_section( 'manager_1_id', 'Сотрудник 1', '', 'managers_slug' );

	add_settings_field('manager_1_img_field', 'Фото сотрудника', 'manager_1_img_clb', 'managers_slug', 'manager_1_id');
	add_settings_field('manager_1_name_field', 'Введите фамилию и имя сотрудника', 'manager_1_name_clb', 'managers_slug', 'manager_1_id');
	add_settings_field('manager_1_position_field', 'Введите должность', 'manager_1_position_clb', 'managers_slug', 'manager_1_id');
	add_settings_field('manager_1_instagram_field', 'Введите страницу инстаграм', 'manager_1_instagram_clb', 'managers_slug', 'manager_1_id');
	add_settings_field('manager_1_VK_field', 'Введите страницу ВК', 'manager_1_VK_clb', 'managers_slug', 'manager_1_id');
	add_settings_field('manager_1_linkedin_field', 'Введите страницу Linkedin', 'manager_1_linkedin_clb', 'managers_slug', 'manager_1_id');
	
    register_setting('managers_group', 'manager_1_img_field');
    register_setting('managers_group', 'manager_1_name_field');
    register_setting('managers_group', 'manager_1_position_field');
    register_setting('managers_group', 'manager_1_instagram_field');
    register_setting('managers_group', 'manager_1_VK_field');
    register_setting('managers_group', 'manager_1_linkedin_field');
    
    add_settings_section( 'manager_2_id', 'Сотрудник 2', '', 'managers_slug' );

	add_settings_field('manager_2_img_field', 'Фото сотрудника', 'manager_2_img_clb', 'managers_slug', 'manager_2_id');
	add_settings_field('manager_2_name_field', 'Введите фамилию и имя сотрудника', 'manager_2_name_clb', 'managers_slug', 'manager_2_id');
	add_settings_field('manager_2_position_field', 'Введите должность', 'manager_2_position_clb', 'managers_slug', 'manager_2_id');
	add_settings_field('manager_2_instagram_field', 'Введите страницу инстаграм', 'manager_2_instagram_clb', 'managers_slug', 'manager_2_id');
	add_settings_field('manager_2_VK_field', 'Введите страницу ВК', 'manager_2_VK_clb', 'managers_slug', 'manager_2_id');
	add_settings_field('manager_2_linkedin_field', 'Введите страницу Linkedin', 'manager_2_linkedin_clb', 'managers_slug', 'manager_2_id');
	
    register_setting('managers_group', 'manager_2_img_field');
    register_setting('managers_group', 'manager_2_name_field');
    register_setting('managers_group', 'manager_2_position_field');
    register_setting('managers_group', 'manager_2_instagram_field');
    register_setting('managers_group', 'manager_2_VK_field');
    register_setting('managers_group', 'manager_2_linkedin_field');
    
    add_settings_section( 'manager_3_id', 'Сотрудник 3', '', 'managers_slug' );

	add_settings_field('manager_3_img_field', 'Фото сотрудника', 'manager_3_img_clb', 'managers_slug', 'manager_3_id');
	add_settings_field('manager_3_name_field', 'Введите фамилию и имя сотрудника', 'manager_3_name_clb', 'managers_slug', 'manager_3_id');
	add_settings_field('manager_3_position_field', 'Введите должность', 'manager_3_position_clb', 'managers_slug', 'manager_3_id');
	add_settings_field('manager_3_instagram_field', 'Введите страницу инстаграм', 'manager_3_instagram_clb', 'managers_slug', 'manager_3_id');
	add_settings_field('manager_3_VK_field', 'Введите страницу ВК', 'manager_3_VK_clb', 'managers_slug', 'manager_3_id');
	add_settings_field('manager_3_linkedin_field', 'Введите страницу Linkedin', 'manager_3_linkedin_clb', 'managers_slug', 'manager_3_id');
	
    register_setting('managers_group', 'manager_3_img_field');
    register_setting('managers_group', 'manager_3_name_field');
    register_setting('managers_group', 'manager_3_position_field');
    register_setting('managers_group', 'manager_3_instagram_field');
    register_setting('managers_group', 'manager_3_VK_field');
    register_setting('managers_group', 'manager_3_linkedin_field');
    
    add_settings_section( 'manager_4_id', 'Сотрудник 4', '', 'managers_slug' );

	add_settings_field('manager_4_img_field', 'Фото сотрудника', 'manager_4_img_clb', 'managers_slug', 'manager_4_id');
	add_settings_field('manager_4_name_field', 'Введите фамилию и имя сотрудника', 'manager_4_name_clb', 'managers_slug', 'manager_4_id');
	add_settings_field('manager_4_position_field', 'Введите должность', 'manager_4_position_clb', 'managers_slug', 'manager_4_id');
	add_settings_field('manager_4_instagram_field', 'Введите страницу инстаграм', 'manager_4_instagram_clb', 'managers_slug', 'manager_4_id');
	add_settings_field('manager_4_VK_field', 'Введите страницу ВК', 'manager_4_VK_clb', 'managers_slug', 'manager_4_id');
	add_settings_field('manager_4_linkedin_field', 'Введите страницу Linkedin', 'manager_4_linkedin_clb', 'managers_slug', 'manager_4_id');
	
    register_setting('managers_group', 'manager_4_img_field');
    register_setting('managers_group', 'manager_4_name_field');
    register_setting('managers_group', 'manager_4_position_field');
    register_setting('managers_group', 'manager_4_instagram_field');
    register_setting('managers_group', 'manager_4_VK_field');
    register_setting('managers_group', 'manager_4_linkedin_field');
    
    add_settings_section( 'manager_5_id', 'Сотрудник 5', '', 'managers_slug' );

	add_settings_field('manager_5_img_field', 'Фото сотрудника', 'manager_5_img_clb', 'managers_slug', 'manager_5_id');
	add_settings_field('manager_5_name_field', 'Введите фамилию и имя сотрудника', 'manager_5_name_clb', 'managers_slug', 'manager_5_id');
	add_settings_field('manager_5_position_field', 'Введите должность', 'manager_5_position_clb', 'managers_slug', 'manager_5_id');
	add_settings_field('manager_5_instagram_field', 'Введите страницу инстаграм', 'manager_5_instagram_clb', 'managers_slug', 'manager_5_id');
	add_settings_field('manager_5_VK_field', 'Введите страницу ВК', 'manager_5_VK_clb', 'managers_slug', 'manager_5_id');
	add_settings_field('manager_5_linkedin_field', 'Введите страницу Linkedin', 'manager_5_linkedin_clb', 'managers_slug', 'manager_5_id');
	
    register_setting('managers_group', 'manager_5_img_field');
    register_setting('managers_group', 'manager_5_name_field');
    register_setting('managers_group', 'manager_5_position_field');
    register_setting('managers_group', 'manager_5_instagram_field');
    register_setting('managers_group', 'manager_5_VK_field');
    register_setting('managers_group', 'manager_5_linkedin_field');
    
    add_settings_section( 'manager_6_id', 'Сотрудник 6', '', 'managers_slug' );

	add_settings_field('manager_6_img_field', 'Фото сотрудника', 'manager_6_img_clb', 'managers_slug', 'manager_6_id');
	add_settings_field('manager_6_name_field', 'Введите фамилию и имя сотрудника', 'manager_6_name_clb', 'managers_slug', 'manager_6_id');
	add_settings_field('manager_6_position_field', 'Введите должность', 'manager_6_position_clb', 'managers_slug', 'manager_6_id');
	add_settings_field('manager_6_instagram_field', 'Введите страницу инстаграм', 'manager_6_instagram_clb', 'managers_slug', 'manager_6_id');
	add_settings_field('manager_6_VK_field', 'Введите страницу ВК', 'manager_6_VK_clb', 'managers_slug', 'manager_6_id');
	add_settings_field('manager_6_linkedin_field', 'Введите страницу Linkedin', 'manager_6_linkedin_clb', 'managers_slug', 'manager_6_id');
	
    register_setting('managers_group', 'manager_6_img_field');
    register_setting('managers_group', 'manager_6_name_field');
    register_setting('managers_group', 'manager_6_position_field');
    register_setting('managers_group', 'manager_6_instagram_field');
    register_setting('managers_group', 'manager_6_VK_field');
    register_setting('managers_group', 'manager_6_linkedin_field');
}

function manager_main_title_clb() {
    $test = "test";
?>
<input type="text" name="manager[main][title]" class="manager_main-title" maxlength="100" value="<?php get_manager_main_title()?>">
<?php
}

function manager_1_img_clb() {
?>
<img class="manager-1_img" src="<?php get_manager_1_img() ?>" alt="Фото сотрудника">
<div class="manager-1_img-wrapper">
    <label for="manager-1_img-btn-input-id" class="manager-1_img-btn">Выбрать фото</label>
    <input type="hidden" name="MAX_FILE_SIZE" value="5242880">
    <input type="file" name="manager[1][image]" id="manager-1_img-btn-input-id" class="manager-1_img-btn-input" accept=".png, .jpg, .jpeg, .webp, .svg" style="display: none;">
</div>

<?php
}
function manager_1_name_clb() {
?>
<input type="text" name="manager[1][name]" class="manager-1_name" maxlength="100" value="<?php get_manager_1_name()?>">
<?php
}
function manager_1_position_clb() {
?>
<input type="text" name="manager[1][position]" class="manager-1_position" maxlength="100" value="<?php get_manager_1_position()?>">
<?php
}
function manager_1_instagram_clb() {
?>
<input type="text" name="manager[1][instagram]" class="manager-1_instagram" maxlength="100" value="<?php get_manager_1_instagram()?>">
<?php
}
function manager_1_VK_clb() {
?>
<input type="text" name="manager[1][VK]" class="manager-1_VK" maxlength="100" value="<?php get_manager_1_VK()?>">
<?php
}
function manager_1_linkedin_clb() {
?>
<input type="text" name="manager[1][linkedin]" class="manager-1_lonkedin" maxlength="100" value="<?php get_manager_1_linkedin()?>">
<?php
}


function manager_2_img_clb() {
?>
<img class="manager-2_img" src="<?php get_manager_2_img() ?>" alt="Фото сотрудника">
<div class="manager-2_img-wrapper">
    <label for="manager-2_img-btn-input-id" class="manager-2_img-btn">Выбрать фото</label>
    <input type="hidden" name="MAX_FILE_SIZE" value="5242880">
    <input type="file" name="manager[2][image]" id="manager-2_img-btn-input-id" class="manager-2_img-btn-input" accept=".png, .jpg, .jpeg, .webp, .svg" style="display:none">
</div>
<?php
}
function manager_2_name_clb() {
?>
<input type="text" name="manager[2][name]" class="manager-2_name" maxlength="100" value="<?php get_manager_2_name()?>">
<?php
}
function manager_2_position_clb() {
?>
<input type="text" name="manager[2][position]" class="manager-2_position" maxlength="100" value="<?php get_manager_2_position()?>">
<?php
}
function manager_2_instagram_clb() {
?>
<input type="text" name="manager[2][instagram]" class="manager-2_instagram" maxlength="100" value="<?php get_manager_2_instagram()?>">
<?php
}
function manager_2_VK_clb() {
?>
<input type="text" name="manager[2][VK]" class="manager-2_VK" maxlength="100" value="<?php get_manager_2_VK()?>">
<?php
}
function manager_2_linkedin_clb() {
?>
<input type="text" name="manager[2][linkedin]" class="manager-2_lonkedin" maxlength="100" value="<?php get_manager_2_linkedin()?>">
<?php
}


function manager_3_img_clb() {
?>
<img class="manager-3_img" src="<?php get_manager_3_img() ?>" alt="Фото сотрудника">
<div class="manager-3_img-wrapper">
    <label for="manager-3_img-btn-input-id" class="manager-3_img-btn">Выбрать фото</label>
    <input type="hidden" name="MAX_FILE_SIZE" value="5242880">
    <input type="file" name="manager[3][image]" id="manager-3_img-btn-input-id" class="manager-3_img-btn-input" accept=".png, .jpg, .jpeg, .webp, .svg" style="display:none">
</div>
<?php
}
function manager_3_name_clb() {
?>
<input type="text" name="manager[3][name]" class="manager-3_name" maxlength="100" value="<?php get_manager_3_name()?>">
<?php
}
function manager_3_position_clb() {
?>
<input type="text" name="manager[3][position]" class="manager-3_position" maxlength="100" value="<?php get_manager_3_position()?>">
<?php
}
function manager_3_instagram_clb() {
?>
<input type="text" name="manager[3][instagram]" class="manager-3_instagram" maxlength="100" value="<?php get_manager_3_instagram()?>">
<?php
}
function manager_3_VK_clb() {
?>
<input type="text" name="manager[3][VK]" class="manager-3_VK" maxlength="100" value="<?php get_manager_3_VK()?>">
<?php
}
function manager_3_linkedin_clb() {
?>
<input type="text" name="manager[3][linkedin]" class="manager-3_lonkedin" maxlength="100" value="<?php get_manager_3_linkedin()?>">
<?php
}


function manager_4_img_clb() {
?>
<img class="manager-4_img" src="<?php get_manager_4_img() ?>" alt="Фото сотрудника">
<div class="manager-4_img-wrapper">
    <label for="manager-4_img-btn-input-id" class="manager-4_img-btn">Выбрать фото</label>
    <input type="hidden" name="MAX_FILE_SIZE" value="5242880">
    <input type="file" name="manager[4][image]" id="manager-4_img-btn-input-id" class="manager-4_img-btn-input" accept=".png, .jpg, .jpeg, .webp, .svg" style="display:none">
</div>
<?php
}
function manager_4_name_clb() {
?>
<input type="text" name="manager[4][name]" class="manager-4_name" maxlength="100" value="<?php get_manager_4_name()?>">
<?php
}
function manager_4_position_clb() {
?>
<input type="text" name="manager[4][position]" class="manager-4_position" maxlength="100" value="<?php get_manager_4_position()?>">
<?php
}
function manager_4_instagram_clb() {
?>
<input type="text" name="manager[4][instagram]" class="manager-4_instagram" maxlength="100" value="<?php get_manager_4_instagram()?>">
<?php
}
function manager_4_VK_clb() {
?>
<input type="text" name="manager[4][VK]" class="manager-4_VK" maxlength="100" value="<?php get_manager_4_VK()?>">
<?php
}
function manager_4_linkedin_clb() {
?>
<input type="text" name="manager[4][linkedin]" class="manager-4_lonkedin" maxlength="100" value="<?php get_manager_4_linkedin()?>">
<?php
}


function manager_5_img_clb() {
?>
<img class="manager-5_img" src="<?php get_manager_5_img() ?>" alt="Фото сотрудника">
<div class="manager-5_img-wrapper">
    <label for="manager-5_img-btn-input-id" class="manager-5_img-btn">Выбрать фото</label>
    <input type="hidden" name="MAX_FILE_SIZE" value="5242880">
    <input type="file" name="manager[5][image]" id="manager-5_img-btn-input-id" class="manager-5_img-btn-input" accept=".png, .jpg, .jpeg, .webp, .svg" style="display:none">
</div>
<?php
}
function manager_5_name_clb() {
?>
<input type="text" name="manager[5][name]" class="manager-5_name" maxlength="100" value="<?php get_manager_5_name()?>">
<?php
}
function manager_5_position_clb() {
?>
<input type="text" name="manager[5][position]" class="manager-5_position" maxlength="100" value="<?php get_manager_5_position()?>">
<?php
}
function manager_5_instagram_clb() {
?>
<input type="text" name="manager[5][instagram]" class="manager-5_instagram" maxlength="100" value="<?php get_manager_5_instagram()?>">
<?php
}
function manager_5_VK_clb() {
?>
<input type="text" name="manager[5][VK]" class="manager-5_VK" maxlength="100" value="<?php get_manager_5_VK()?>">
<?php
}
function manager_5_linkedin_clb() {
?>
<input type="text" name="manager[5][linkedin]" class="manager-5_lonkedin" maxlength="100" value="<?php get_manager_5_linkedin()?>">
<?php
}


function manager_6_img_clb() {
?>
<img class="manager-6_img" src="<?php get_manager_6_img() ?>" alt="Фото сотрудника">
<div class="manager-6_img-wrapper">
    <label for="manager-6_img-btn-input-id" class="manager-6_img-btn">Выбрать фото</label>
    <input type="hidden" name="MAX_FILE_SIZE" value="5242880">
    <input type="file" name="manager[6][image]" id="manager-6_img-btn-input-id" class="manager-6_img-btn-input" accept=".png, .jpg, .jpeg, .webp, .svg" style="display:none">
</div>
<?php
}
function manager_6_name_clb() {
?>
<input type="text" name="manager[6][name]" class="manager-6_name" maxlength="100" value="<?php get_manager_6_name()?>">
<?php
}
function manager_6_position_clb() {
?>
<input type="text" name="manager[6][position]" class="manager-6_position" maxlength="100" value="<?php get_manager_6_position()?>">
<?php
}
function manager_6_instagram_clb() {
?>
<input type="text" name="manager[6][instagram]" class="manager-6_instagram" maxlength="100" value="<?php get_manager_6_instagram()?>">
<?php
}
function manager_6_VK_clb() {
?>
<input type="text" name="manager[6][VK]" class="manager-6_VK" maxlength="100" value="<?php get_manager_6_VK()?>">
<?php
}
function manager_6_linkedin_clb() {
?>
<input type="text" name="manager[6][linkedin]" class="manager-6_lonkedin" maxlength="100" value="<?php get_manager_6_linkedin()?>">
<?php
}
?>