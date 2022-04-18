<?php
// правильный способ подключить стили и скрипты
add_action( 'admin_enqueue_scripts', 'add_service_style_scripts' );
// add_action('wp_print_styles', 'theme_name_scripts'); // можно использовать этот хук он более поздний
function add_service_style_scripts() {
    wp_register_style('services_css', content_url() . '/themes/mytesttheme/admin/services_menu_page/services.css');
    wp_enqueue_style( 'services_css');
    wp_register_script('services_js', content_url() . '/themes/mytesttheme/admin/services_menu_page/services.js','',false,true);
    wp_enqueue_script( 'services_js');	
}

//добавление пункта основного меню
add_menu_page('Наши услуги', 'Услуги', 'edit_others_pages', 'services_slug', 'services_build', 'dashicons-store');

function services_build() {
    require_once dirname(__FILE__) . './services_functions.php';
?>
    <div class="wrap">
        <h1 class="services_main_title">Страница настройки сейкции "Наши услуги"</h1>
        <form method="POST" class="services_form" enctype="multipart/form-data">
<?php
        settings_fields('services');
        do_settings_sections('services_slug');
        submit_button();
?>
        </form>
    </div>
<?php
}

add_action('admin_init', 'add_service_section_field');

function add_service_section_field() {
    add_settings_section('service_text_section_1', "Услуга 1", '', 'services_slug');
    add_settings_field('service_1_title', 'Заголовок', 'service_1_title_clb', 'services_slug', 'service_text_section_1');
    add_settings_field('service_1_text', 'Текст', 'service_1_text_clb', 'services_slug', 'service_text_section_1');
    add_settings_field('service_1_img', 'Пиктограмма', 'service_1_img_clb', 'services_slug', 'service_text_section_1');

    register_setting('services', 'service_1_title');
    register_setting('services', 'service_1_text');
    register_setting('services', 'service_1_img');

    add_settings_section('service_text_section_2', 'Услуга 2', '', 'services_slug');
    add_settings_field('service_2_title', 'Заголовок', 'service_2_title_clb', 'services_slug', 'service_text_section_2');
    add_settings_field('service_2_text', 'Текст', 'service_2_text_clb', 'services_slug', 'service_text_section_2');
    add_settings_field('service_2_img', 'Пиктограмма', 'service_2_img_clb', 'services_slug', 'service_text_section_2');

    register_setting('services', 'service_2_title');
    register_setting('services', 'service_2_text');
    register_setting('services', 'service_2_img');

    add_settings_section('service_text_section_3', 'Услуга 3', '', 'services_slug');
    add_settings_field('service_3_title', 'Заголовок', 'service_3_title_clb', 'services_slug', 'service_text_section_3');
    add_settings_field('service_3_text', 'Текст', 'service_3_text_clb', 'services_slug', 'service_text_section_3');
    add_settings_field('service_3_img', 'Пиктограмма', 'service_3_img_clb', 'services_slug', 'service_text_section_3');

    register_setting('services', 'service_3_title');
    register_setting('services', 'service_3_text');
    register_setting('services', 'service_3_img');
}

function service_1_title_clb() {
    $value = esc_attr(get_service_title('title_1'));
?>
    <input class="services_title" type="text" name="services_1_title" maxlength="100" value="<?php echo $value ?>">
<?php
}

function service_1_text_clb() {
    $value = get_service_text('text_1');
?>
    <textarea class="services_text" name="services_1_text" rows="5"><?php echo $value; ?> </textarea>
<?php
}

function service_1_img_clb() {
    $value = content_url() . "/uploads/site_img/service/" . esc_attr(get_image('img_1'));
?>
    <img class="services_image services_image_1_js" src="<?php echo $value ?>" alt="Выбранный файл">
    <div class="services_select_img_wrapper">
        <label class="services_img_btn" for="services_1_img_file">Выбрать изображение</label>
        <input type="hidden" name="MAX_FILE_SIZE" value="6000000">
        <input type="file" data-class="services_1_img" name="services_1_img" id="services_1_img_file" style="display: none;" accept=".jpg, .jpeg, .png, .svg, .webp">
    </div>
<?php
}

function service_2_title_clb() {
    $value = esc_attr(get_service_title('title_2'));
?>
    <input class="services_title" type="text" name="services_2_title" maxlength="100" value="<?php echo $value ?>">
<?php
}

function service_2_text_clb() {
    $value = get_service_text('text_2');
?>
    <textarea name="services_2_text" class="services_text" rows="5"><?php echo $value ?></textarea>
<?php
}

function service_2_img_clb() {
    $value = content_url() . '/uploads/site_img/service/' . esc_attr(get_image('img_2'));
?>
    <img class="services_image services_image_2_js" src="<?php echo $value ?>" alt="Выбранное изображение">
    <div class="services_select_img_wrapper">
        <label class="services_img_btn" for="services_2_img_file">Выбрать изображение</label>
        <input type="hidden" name="MAX_FILE_SIZE" value='6000000'>
        <input type="file" data-class="services_2_img" name="services_2_img" id="services_2_img_file" style="display: none;" accept=".jpg, .jpeg, .svg, .png, .webp">
    </div>
<?php
}

function service_3_title_clb() {
    $value = esc_attr(get_service_title('title_3'));
?>
    <input class="services_title" type="text" name="services_3_title" value="<?php echo $value ?>">
<?php
}

function service_3_text_clb() {
    $value = get_service_text('text_3');
?>
    <textarea class="services_title" name="services_3_text" rows="5"><?php echo $value ?></textarea>
<?php
}

function service_3_img_clb() {
    $value = content_url() . '/uploads/site_img/service/' . esc_attr(get_image('img_3'));
?>
    <img class="services_image services_image_3_js" src="<?php echo $value ?>" alt="Выбранное изображение">
    <div class="services_select_img_wrapper">
        <label class="services_img_btn" for="services_3_img_file">Выбрать изображение</label>
        <input type="hidden" name="MAX_FILE_SIZE" value="6000000">
        <input type="file" data-class="services_3_img" name="services_3_img" id="services_3_img_file" style="display: none;" accept=".jpg, .jpeg, .png, .svg, .webp">
    </div>
<?php
}
?>