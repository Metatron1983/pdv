<?php
    
// подключение стилей
    function change_plugin_styles() {
        wp_register_style('main_banner_css', get_template_directory_uri() . "/admin/main_banner_menu_page/main_banner.css");
        wp_enqueue_style('main_banner_css');

        wp_register_script('changeDeskTopImage', get_template_directory_uri() . "/admin/main_banner_menu_page/main_banners.js",'',false,true);
        wp_enqueue_script( 'changeDeskTopImage');
    }
    add_action('admin_enqueue_scripts', 'change_plugin_styles');


// подключение страницы главный баннер
    add_menu_page( 'Main_banner', 'Главный баннер', 'edit_others_pages', 'main_banner_slug', 'main_banner', 'dashicons-clipboard');

    function main_banner () {
        require_once dirname(__FILE__) . './main_banner_func.php';
?>
        <div class="wrap">
            <h2 class="main-banner_heading">Настройка главного баннера</h2>
            <form class="main-banner_text-field-form" method="POST" enctype="multipart/form-data">
<?php
				settings_fields( 'main_banner' );     // скрытые защитные поля
				do_settings_sections( 'main_banner_slug' ); // секции с настройками (опциями). У нас она всего одна 'section_id'
				submit_button();
?>
            </form>
        </div>
<?php
    }  

    add_action('admin_init', 'add_my_setting_field');

    function add_my_setting_field() {
        //подключение секции Изменить текстовое поле
        add_settings_section( 'text_section', 'Изменить текстовые поля', '', 'main_banner_slug' );
        add_settings_field ('main_banner_title', 'Заголовок', 'main_banner_title_setting_clb', 'main_banner_slug', 'text_section');
        add_settings_field ('main_banner_text', 'Текст для PC и планшетов', 'main_banner_text_setting_clb', 'main_banner_slug', 'text_section');
        add_settings_field ('main_banner_text_mobile', 'Текст для телефона', 'main_banner_text_mobile_setting_clb', 'main_banner_slug', 'text_section');
        add_settings_field ('main_banner_link', 'Ссылка', 'main_banner_link_setting_clb', 'main_banner_slug', 'text_section');
        
        register_setting('main_banner', 'main_banner_title');
        register_setting('main_banner', 'main_banner_text');
        register_setting('main_banner', 'main_banner_text_mobile');
        register_setting('main_banner', 'main_banner_link');

        // подключить секцию изображения
        add_settings_section( 'image_section', 'Изменить фото', '', 'main_banner_slug' );
        add_settings_field ('main_banner_img_desctop', 'Изображение для PC:635x505(px)', 'main_banner_img_desktop_setting_clb', 'main_banner_slug', 'image_section');
        add_settings_field ('main_banner_img_tablet', 'Изображение для планшета:690x314(px)', 'main_banner_img_tablet_setting_clb', 'main_banner_slug', 'image_section');
        add_settings_field ('main_banner_img_mobile', 'Изображение для телефона:345x253(px)', 'main_banner_img_mobile_setting_clb', 'main_banner_slug', 'image_section');
        register_setting('main_banner', 'main_banner_img_desctop');
        register_setting('main_banner', 'main_banner_img_tablet');
        register_setting('main_banner', 'main_banner_img_mobile');
    }

    function main_banner_title_setting_clb() {
        $value = esc_attr(get_main_banner_title());
        echo "<input
            class = 'main_banner_title' 
            name='main_banner_title'
            type='text' 
            value='$value'    
        />";
    }

    function main_banner_text_setting_clb() {
        $value = esc_attr(get_main_banner_text());
        echo "<textarea
            class = 'main_banner_text' 
            name='main_banner_text'
            rows='5'
            />$value</textarea>";
    }

    function main_banner_text_mobile_setting_clb() {
        $value = esc_attr(get_main_banner_text_mobile());
        echo "<textarea
            class = 'main_banner_text' 
            name='main_banner_text_mobile'
            rows='5'
            />$value</textarea>";
    }

    function main_banner_link_setting_clb() {
        $value = esc_attr(get_main_banner_link());
        echo "<input
            class = 'main_banner_link' 
            name='main_banner_link'
            type='text' 
            value='$value'    
        />";
    }

    function main_banner_img_desktop_setting_clb() {
        $value = content_url() . "/uploads/site_img/main_banner/" . esc_attr(get_main_banner_img_desktop());
        echo "<img class='main_banner_image' src='$value' alt='Изображение для компьютера'>
            <div class='main-banner-image-btn__wrapper'> 
            <label class = 'main_banner_image_btn' for='main_banner_image'>
            Выбирете изображение</label>
            <input type='hidden' name='MAX_FILE_SIZE' value='100000000'/>
            <input
            class = 'main_banner_image_input'
            id='main_banner_image' 
            name='main_banner_image_desktop_btn'
            type='file' 
            accept ='.jpg, .jpeg, .png, .svg, .webp'
            style='display:none;'    
            /></div>
            ";
    }

    function main_banner_img_tablet_setting_clb() {
        $value = content_url() . "/uploads/site_img/main_banner/" . esc_attr(get_main_banner_img_tablet());
        echo "<img class='main_banner_image--tablet' src='$value' alt='Изображение для планшета'>
            <div class='main-banner-image-btn__wrapper'> 
            <label class = 'main_banner_image_btn' for='main_banner_image_tablet'>
            Выбирете изображение</label>
            <input type='hidden' name='MAX_FILE_SIZE' value='100000000'/>
            <input
            class = 'main_banner_image_tablet_input'
            id='main_banner_image_tablet' 
            name='main_banner_image_tablet_btn'
            type='file' 
            accept ='.jpg, .jpeg, .png, .svg, .webp'
            style='display:none;'    
            /></div>
            ";
    }

    function main_banner_img_mobile_setting_clb() {
        $value = content_url() . "/uploads/site_img/main_banner/" . esc_attr(get_main_banner_img_mobile());
        echo "<img class='main_banner_image--mobile' src='$value' alt='Изображение для планшета'>
            <div class='main-banner-image-btn__wrapper'> 
            <label class = 'main_banner_image_btn' for='main_banner_image_mobile'>
            Выбирете изображение</label>
            <input type='hidden' name='MAX_FILE_SIZE' value='100000000'/>
            <input
            class = 'main_banner_image_mobile_input'
            id='main_banner_image_mobile' 
            name='main_banner_image_mobile_btn'
            type='file' 
            accept ='.jpg, .jpeg .png .svg .webp'
            style='display:none;'    
            /></div>
            ";
    }

?> 

