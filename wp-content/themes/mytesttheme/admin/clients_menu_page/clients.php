<?php

add_action( 'admin_enqueue_scripts', 'register_client_styles' );

// регистрируем файл стилей и добавляем его в очередь
function register_client_styles() {
	wp_register_style( 'clients_style', content_url() . "/themes/mytesttheme/admin/clients_menu_page/clients.css" );
	wp_enqueue_style( 'clients_style' );
	wp_register_script('clients_js', content_url() . "/themes/mytesttheme/admin/clients_menu_page/clients.js","", "0.1", true);
	wp_enqueue_script('clients_js');
}


add_menu_page("Нам доверяют", "Нам доверяют", 'edit_others_posts', "clients_slug", 'add_clients_page', 'dashicons-buddicons-buddypress-logo');

function add_clients_page() {
    require_once dirname(__FILE__) . "/clients_function.php";
?>
<div class="wrap">
    <h2 class="clients-admin_main-title">Страница настройки секции "Нам доверяют"</h2>

    <form class="clients_admin_form" method="POST" enctype="multipart/form-data">
        <?php
            settings_fields( 'clients_group' );     
            do_settings_sections( 'clients_slug' ); 
            submit_button();
        ?>
    </form>
</div>
<?php
}

add_action('admin_init', 'clients_settings');
function clients_settings(){
	add_settings_section( 'clients_title_id', '', '', 'clients_slug' );
	add_settings_field('clients_title_name_id', 'Введите название секции', 'add_clients_title_settings_clb', 'clients_slug', 'clients_title_id' );
	register_setting('clients_group', 'clients_title_name_id');
	
    add_settings_section( 'clients_cart_1_id', 'Нстройки карточки клиента 1', '', 'clients_slug' );
	
    add_settings_field('clients_cart_1_logo_id', 'Выберите логотип', 'add_clients_cart_1_logo_clb', 'clients_slug', 'clients_cart_1_id' );
	add_settings_field('clients_cart_1_title_id', 'Введите название компании', 'add_clients_cart_1_title_clb', 'clients_slug', 'clients_cart_1_id' );
	add_settings_field('clients_cart_1_description_id', 'Введите описание компании', 'clients_cart_1_description_clb', 'clients_slug', 'clients_cart_1_id' );
	
    register_setting('clients_group', 'clients_cart_1_logo_id');
    register_setting('clients_group', 'clients_cart_1_title_id');
    register_setting('clients_group', 'clients_cart_1_description_id');
    
    add_settings_section( 'clients_cart_2_id', 'Нстройки карточки клиента 2', '', 'clients_slug' );
	
    add_settings_field('clients_cart_2_logo_id', 'Выберите логотип', 'add_clients_cart_2_logo_clb', 'clients_slug', 'clients_cart_2_id' );
	add_settings_field('clients_cart_2_title_id', 'Введите название компании', 'add_clients_cart_2_title_clb', 'clients_slug', 'clients_cart_2_id' );
	add_settings_field('clients_cart_2_description_id', 'Введите описание компании', 'clients_cart_2_description_clb', 'clients_slug', 'clients_cart_2_id' );
	
    register_setting('clients_group', 'clients_cart_2_logo_id');
    register_setting('clients_group', 'clients_cart_2_title_id');
    register_setting('clients_group', 'clients_cart_2_description_id');
    
    add_settings_section( 'clients_cart_3_id', 'Нстройки карточки клиента 3', '', 'clients_slug' );
	
    add_settings_field('clients_cart_3_logo_id', 'Выберите логотип', 'add_clients_cart_3_logo_clb', 'clients_slug', 'clients_cart_3_id' );
	add_settings_field('clients_cart_3_title_id', 'Введите название компании', 'add_clients_cart_3_title_clb', 'clients_slug', 'clients_cart_3_id' );
	add_settings_field('clients_cart_3_description_id', 'Введите описание компании', 'clients_cart_3_description_clb', 'clients_slug', 'clients_cart_3_id' );
	
    register_setting('clients_group', 'clients_cart_3_logo_id');
    register_setting('clients_group', 'clients_cart_3_title_id');
    register_setting('clients_group', 'clients_cart_3_description_id');
    
    add_settings_section( 'clients_cart_4_id', 'Нстройки карточки клиента 4', '', 'clients_slug' );
	
    add_settings_field('clients_cart_4_logo_id', 'Выберите логотип', 'add_clients_cart_4_logo_clb', 'clients_slug', 'clients_cart_4_id' );
	add_settings_field('clients_cart_4_title_id', 'Введите название компании', 'add_clients_cart_4_title_clb', 'clients_slug', 'clients_cart_4_id' );
	add_settings_field('clients_cart_4_description_id', 'Введите описание компании', 'clients_cart_4_description_clb', 'clients_slug', 'clients_cart_4_id' );
	
    register_setting('clients_group', 'clients_cart_4_logo_id');
    register_setting('clients_group', 'clients_cart_4_title_id');
    register_setting('clients_group', 'clients_cart_4_description_id');
    
    add_settings_section( 'clients_cart_5_id', 'Нстройки карточки клиента 5', '', 'clients_slug' );
	
    add_settings_field('clients_cart_5_logo_id', 'Выберите логотип', 'add_clients_cart_5_logo_clb', 'clients_slug', 'clients_cart_5_id' );
	add_settings_field('clients_cart_5_title_id', 'Введите название компании', 'add_clients_cart_5_title_clb', 'clients_slug', 'clients_cart_5_id' );
	add_settings_field('clients_cart_5_description_id', 'Введите описание компании', 'clients_cart_5_description_clb', 'clients_slug', 'clients_cart_5_id' );
	
    register_setting('clients_group', 'clients_cart_5_logo_id');
    register_setting('clients_group', 'clients_cart_5_title_id');
    register_setting('clients_group', 'clients_cart_5_description_id');
    
    add_settings_section( 'clients_cart_6_id', 'Нстройки карточки клиента 6', '', 'clients_slug' );
	
    add_settings_field('clients_cart_6_logo_id', 'Выберите логотип', 'add_clients_cart_6_logo_clb', 'clients_slug', 'clients_cart_6_id' );
	add_settings_field('clients_cart_6_title_id', 'Введите название компании', 'add_clients_cart_6_title_clb', 'clients_slug', 'clients_cart_6_id' );
	add_settings_field('clients_cart_6_description_id', 'Введите описание компании', 'clients_cart_6_description_clb', 'clients_slug', 'clients_cart_6_id' );
	
    register_setting('clients_group', 'clients_cart_6_logo_id');
    register_setting('clients_group', 'clients_cart_6_title_id');
    register_setting('clients_group', 'clients_cart_6_description_id');
    
    add_settings_section( 'clients_cart_7_id', 'Нстройки карточки клиента 7', '', 'clients_slug' );
	
    add_settings_field('clients_cart_7_logo_id', 'Выберите логотип', 'add_clients_cart_7_logo_clb', 'clients_slug', 'clients_cart_7_id' );
	add_settings_field('clients_cart_7_title_id', 'Введите название компании', 'add_clients_cart_7_title_clb', 'clients_slug', 'clients_cart_7_id' );
	add_settings_field('clients_cart_7_description_id', 'Введите описание компании', 'clients_cart_7_description_clb', 'clients_slug', 'clients_cart_7_id' );
	
    register_setting('clients_group', 'clients_cart_7_logo_id');
    register_setting('clients_group', 'clients_cart_7_title_id');
    register_setting('clients_group', 'clients_cart_7_description_id');
    
    add_settings_section( 'clients_cart_8_id', 'Нстройки карточки клиента 8', '', 'clients_slug' );
	
    add_settings_field('clients_cart_8_logo_id', 'Выберите логотип', 'add_clients_cart_8_logo_clb', 'clients_slug', 'clients_cart_8_id' );
	add_settings_field('clients_cart_8_title_id', 'Введите название компании', 'add_clients_cart_8_title_clb', 'clients_slug', 'clients_cart_8_id' );
	add_settings_field('clients_cart_8_description_id', 'Введите описание компании', 'clients_cart_8_description_clb', 'clients_slug', 'clients_cart_8_id' );
	
    register_setting('clients_group', 'clients_cart_8_logo_id');
    register_setting('clients_group', 'clients_cart_8_title_id');
    register_setting('clients_group', 'clients_cart_8_description_id');
}


function add_clients_title_settings_clb() {
?>
<input class="clients_main-title" type="text" name="clients[main][title]" maxlength="100" value="<?php get_clients_title_settings()?>">
<?php
}

function add_clients_cart_1_logo_clb() {
?>
<img class="clients-cart-1_logo-img" src="<?php get_clients_cart_1_logo_img_name()?>" alt="Лого">
<div class="clients-cart-1_logo-img-btn-wrapper">
    <label for="clients-cart-1_logo-img-input-id" class="clients-cart-1_logo-img-btn">Ввыбрать изображение</label>
    <input type="hidden" name="MAX_FILE_SIZE" value="5242880">
    <input type="file" name="clients[cart1][logo]" id="clients-cart-1_logo-img-input-id" class="clients-cart-1_logo-img-input" accept=".png, .jpg, .jpeg, .webp, .svg" style="display: none;">
</div>
<?php
}

function add_clients_cart_1_title_clb() {
?>
<input class="clients-cart-1_title" type="text" name="clients[cart1][title]" maxlength="100" value="<?php get_clients_cart_1_title()?>">
<?php
}

function clients_cart_1_description_clb() {
?>
<input class="clients-cart-1_description" type="text" name="clients[cart1][description]" maxlength="100" value="<?php get_clients_cart_1_description()?>">
<?php
}

function add_clients_cart_2_logo_clb() {
?>
<img class="clients-cart-2_logo-img" src="<?php get_clients_cart_2_logo_img_name()?>" alt="Logo2">
<div class="clients_cart_2_logo-wrapper">
    <label class="clients_cart_2_logo-btn" for="clients_cart_2_logo-btn-input-id">Выбрать изображение</label>
    <input type="hidden" name="MAX_FILE_SIZE" value="5242880">
    <input class="clients_cart_2_logo-btn-input" type="file" name="clients[cart2][logo]" id="clients_cart_2_logo-btn-input-id" accept=".jpg, .jpeg, .svg, .png, .webp" style="display:none;">
</div>
<?php
}

function add_clients_cart_2_title_clb() {
?>
<input class="clients-cart-2_title" type="text" name="clients[cart2][title]" maxlength="100" value="<?php get_clients_cart_2_title()?>">
<?php
}

function clients_cart_2_description_clb() {
?>
<input class="clients-cart-2_description" type="text" name="clients[cart2][description]" maxlength="100" value="<?php get_clients_cart_2_description()?>">
<?php
}

function add_clients_cart_3_logo_clb() {
?>
<img class="clients-cart-3_logo-img" src="<?php get_clients_cart_3_logo_img_name()?>" alt="Logo3">
<div class="clients_cart_3_logo-wrapper">
    <label class="clients_cart_3_logo-btn" for="clients_cart_3_logo-btn-input-id">Выбрать изображение</label>
    <input type="hidden" name="MAX_FILE_SIZE" value="5242880">
    <input class="clients_cart_3_logo-btn-input" type="file" name="clients[cart3][logo]" id="clients_cart_3_logo-btn-input-id" accept=".jpg, .jpeg, .svg, .png, .webp" style="display:none;">
</div>
<?php
}

function add_clients_cart_3_title_clb() {
?>
<input class="clients-cart-3_title" type="text" name="clients[cart3][title]" maxlength="100" value="<?php get_clients_cart_3_title()?>">
<?php
}

function clients_cart_3_description_clb() {
?>
<input class="clients-cart-3_description" type="text" name="clients[cart3][description]" maxlength="100" value="<?php get_clients_cart_3_description()?>">
<?php
}

function add_clients_cart_4_logo_clb() {
?>
<img class="clients-cart-4_logo-img" src="<?php get_clients_cart_4_logo_img_name()?>" alt="Logo4">
<div class="clients_cart_4_logo-wrapper">
    <label class="clients_cart_4_logo-btn" for="clients_cart_4_logo-btn-input-id">Выбрать изображение</label>
    <input type="hidden" name="MAX_FILE_SIZE" value="5242880">
    <input class="clients_cart_4_logo-btn-input" type="file" name="clients[cart4][logo]" id="clients_cart_4_logo-btn-input-id" accept=".jpg, .jpeg, .svg, .png, .webp" style="display:none;">
</div>
<?php
}

function add_clients_cart_4_title_clb() {
?>
<input class="clients-cart-4_title" type="text" name="clients[cart4][title]" maxlength="100" value="<?php get_clients_cart_4_title()?>">
<?php
}

function clients_cart_4_description_clb() {
?>
<input class="clients-cart-4_description" type="text" name="clients[cart4][description]" maxlength="100" value="<?php get_clients_cart_4_description()?>">
<?php
}

function add_clients_cart_5_logo_clb() {
?>
<img class="clients-cart-5_logo-img" src="<?php get_clients_cart_5_logo_img_name()?>" alt="Logo5">
<div class="clients_cart_5_logo-wrapper">
    <label class="clients_cart_5_logo-btn" for="clients_cart_5_logo-btn-input-id">Выбрать изображение</label>
    <input type="hidden" name="MAX_FILE_SIZE" value="5242880">
    <input class="clients_cart_5_logo-btn-input" type="file" name="clients[cart5][logo]" id="clients_cart_5_logo-btn-input-id" accept=".jpg, .jpeg, .svg, .png, .webp" style="display:none;">
</div>
<?php
}

function add_clients_cart_5_title_clb() {
?>
<input class="clients-cart-5_title" type="text" name="clients[cart5][title]" maxlength="100" value="<?php get_clients_cart_5_title()?>">
<?php
}

function clients_cart_5_description_clb() {
?>
<input class="clients-cart-5_description" type="text" name="clients[cart5][description]" maxlength="100" value="<?php get_clients_cart_5_description()?>">
<?php
}

function add_clients_cart_6_logo_clb() {
?>
<img class="clients-cart-6_logo-img" src="<?php get_clients_cart_6_logo_img_name()?>" alt="Logo6">
<div class="clients_cart_6_logo-wrapper">
    <label class="clients_cart_6_logo-btn" for="clients_cart_6_logo-btn-input-id">Выбрать изображение</label>
    <input type="hidden" name="MAX_FILE_SIZE" value="5242880">
    <input class="clients_cart_6_logo-btn-input" type="file" name="clients[cart6][logo]" id="clients_cart_6_logo-btn-input-id" accept=".jpg, .jpeg, .svg, .png, .webp" style="display:none;">
</div>
<?php
}

function add_clients_cart_6_title_clb() {
?>
<input class="clients-cart-6_title" type="text" name="clients[cart6][title]" maxlength="100" value="<?php get_clients_cart_6_title()?>">
<?php
}

function clients_cart_6_description_clb() {
?>
<input class="clients-cart-6_description" type="text" name="clients[cart6][description]" maxlength="100" value="<?php get_clients_cart_6_description()?>">
<?php
}

function add_clients_cart_7_logo_clb() {
?>
<img class="clients-cart-7_logo-img" src="<?php get_clients_cart_7_logo_img_name()?>" alt="Logo7">
<div class="clients_cart_7_logo-wrapper">
    <label class="clients_cart_7_logo-btn" for="clients_cart_7_logo-btn-input-id">Выбрать изображение</label>
    <input type="hidden" name="MAX_FILE_SIZE" value="5242880">
    <input class="clients_cart_7_logo-btn-input" type="file" name="clients[cart7][logo]" id="clients_cart_7_logo-btn-input-id" accept=".jpg, .jpeg, .svg, .png, .webp" style="display:none;">
</div>
<?php
}

function add_clients_cart_7_title_clb() {
?>
<input class="clients-cart-7_title" type="text" name="clients[cart7][title]" maxlength="100" value="<?php get_clients_cart_7_title()?>">
<?php
}

function clients_cart_7_description_clb() {
?>
<input class="clients-cart-7_description" type="text" name="clients[cart7][description]" maxlength="100" value="<?php get_clients_cart_7_description()?>">
<?php
}

function add_clients_cart_8_logo_clb() {
?>
<img class="clients-cart-8_logo-img" src="<?php get_clients_cart_8_logo_img_name()?>" alt="Logo8">
<div class="clients_cart_8_logo-wrapper">
    <label class="clients_cart_8_logo-btn" for="clients_cart_8_logo-btn-input-id">Выбрать изображение</label>
    <input type="hidden" name="MAX_FILE_SIZE" value="5242880">
    <input class="clients_cart_8_logo-btn-input" type="file" name="clients[cart8][logo]" id="clients_cart_8_logo-btn-input-id" accept=".jpg, .jpeg, .svg, .png, .webp" style="display:none;">
</div>
<?php
}

function add_clients_cart_8_title_clb() {
?>
<input class="clients-cart-8_title" type="text" name="clients[cart8][title]" maxlength="100" value="<?php get_clients_cart_8_title()?>">
<?php
}

function clients_cart_8_description_clb() {
?>
<input class="clients-cart-8_description" type="text" name="clients[cart8][description]" maxlength="100" value="<?php get_clients_cart_8_description()?>">
<?php
}
?>