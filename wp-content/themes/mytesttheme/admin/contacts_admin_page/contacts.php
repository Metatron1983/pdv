<?php

add_action( 'admin_enqueue_scripts', 'add_contacts_styles' );

function add_contacts_styles() {
	wp_register_style( 'contacts_style', content_url() . '/themes/mytesttheme/admin/contacts_admin_page/contact.css', "", "0.1");
	wp_enqueue_style( 'contacts_style' );
}


add_menu_page( 'Наши контакты', 'Наши контакты', 'edit_others_pages', 'contacts_slug', 'contacts_admin_page_output', "dashicons-phone");


function contacts_admin_page_output() {
    require_once dirname(__FILE__) . "/contacts_function.php";
?>
<div class="wrap contacts">
    <h2 class="contacts_title">Настройка секции "Наши контакты"</h2>

    <form class="contacts_form" method="POST" enctype="multipart/form-data">
        <?php
            settings_fields( 'contacts_group' );     // скрытые защитные поля
            do_settings_sections( 'contacts_slug' ); // секции с настройками (опциями). У нас она всего одна 'section_id'
            submit_button();
        ?>
    </form>
</div>
<?php   
}

add_action('admin_init', 'contacts_admin_page_settings');

function contacts_admin_page_settings() {
	add_settings_section( 'contacts_id', '', '', 'contacts_slug' );
    
	add_settings_field('contacts_id_title', 'Введите название секции', 'contacts_clb_title', 'contacts_slug', 'contacts_id' );
	add_settings_field('contacts_id_phone', 'Введите телефон', 'contacts_clb_phone', 'contacts_slug', 'contacts_id' );
	add_settings_field('contacts_id_email', 'Введите e-mail', 'contacts_clb_email', 'contacts_slug', 'contacts_id' );
	add_settings_field('contacts_id_whatsapp', 'Введите Whatsapp', 'contacts_clb_whatsapp', 'contacts_slug', 'contacts_id' );
	add_settings_field('contacts_id_skype', 'Введите Skype', 'contacts_clb_skype', 'contacts_slug', 'contacts_id' );
	add_settings_field('contacts_id_full_name', 'Введите "Полное наименование"', 'contacts_clb_full_name', 'contacts_slug', 'contacts_id' );
	add_settings_field('contacts_id_TIN', 'Введите ИНН', 'contacts_clb_TIN', 'contacts_slug', 'contacts_id' );
	add_settings_field('contacts_id_IEC', 'Введите КПП', 'contacts_clb_IEC', 'contacts_slug', 'contacts_id' );
	add_settings_field('contacts_id_PSRN', 'Введите ОГРН', 'contacts_clb_PSRN', 'contacts_slug', 'contacts_id' );
	add_settings_field('contacts_id_address', 'Введите Адрес', 'contacts_clb_address', 'contacts_slug', 'contacts_id' );
	

    register_setting( 'contacts_group', 'contacts_id_title');
    register_setting( 'contacts_group', 'contacts_id_phone');
    register_setting( 'contacts_group', 'contacts_id_email');
    register_setting( 'contacts_group', 'contacts_id_whatsapp');
    register_setting( 'contacts_group', 'contacts_id_skype');
    register_setting( 'contacts_group', 'contacts_id_full_name');
    register_setting( 'contacts_group', 'contacts_id_TIN');
    register_setting( 'contacts_group', 'contacts_id_IEC');
    register_setting( 'contacts_group', 'contacts_id_PSRN');
    register_setting( 'contacts_group', 'contacts_id_address');
}



function contacts_clb_title() {
?>
    <input class="contacts_input" type="text" name="contacts[title]" maxlength="100" value="<?php get_contacts_clb_title()?>">
<?php
}

function contacts_clb_phone() {
?>
    <input class="contacts_input" type="text" name="contacts[phone]" maxlength="100" value="<?php get_contacts_clb_phone()?>">
<?php
}

function contacts_clb_email() {
?>
    <input class="contacts_input" type="text" name="contacts[email]" maxlength="100" value="<?php get_contacts_clb_email()?>">
<?php
}
function contacts_clb_whatsapp() {
?>
    <input class="contacts_input" type="text" name="contacts[whatsapp]" maxlength="100" value="<?php get_contacts_clb_whatsapp()?>">
<?php
}
function contacts_clb_skype() {
?>
    <input class="contacts_input" type="text" name="contacts[skype]" maxlength="100" value="<?php get_contacts_clb_skype()?>">
<?php
}
function contacts_clb_full_name() {
?>
    <input class="contacts_input" type="text" name="contacts[name]" maxlength="100" value="<?php get_contacts_clb_full_name()?>">
<?php
}
function contacts_clb_TIN() {
?>
    <input class="contacts_input" type="text" name="contacts[TIN]" maxlength="100" value="<?php get_contacts_clb_TIN()?>">
<?php
}
function contacts_clb_IEC() {
?>
    <input class="contacts_input" type="text" name="contacts[IEC]" maxlength="100" value="<?php get_contacts_clb_IEC() ?>">
<?php
}
function contacts_clb_PSRN() {
?>
    <input class="contacts_input" type="text" name="contacts[PSRN]" maxlength="100" value="<?php get_contacts_clb_PSRN() ?>">
<?php
}
function contacts_clb_address() {
?>
    <textarea class="contacts_input" name="contacts[address]" rows="3" maxlength="1000"><?php get_contacts_clb_address()?></textarea>
<?php
}
?>