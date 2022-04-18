<?php
    require_once ABSPATH . 'wp-admin/includes/upgrade.php';

    create_main_banner_DB_table();

    function create_main_banner_DB_table () {
        global $wpdb;

        $table_name = $wpdb->get_blog_prefix() . 'main_banner';
	    $charset_collate = $wpdb->get_charset_collate();
        if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name){
            $sql = "CREATE TABLE {$table_name} (
                id  bigint(20) unsigned NOT NULL auto_increment,
                field_name varchar(100) NOT NULL default '',
                field_content varchar(1000) NOT NULL default '',
                PRIMARY KEY  (id),
                UNIQUE field_name (field_name)
                )
                {$charset_collate};";
            
            dbDelta($sql);
            $wpdb->insert($table_name,["field_name"=>"title"]);
            $wpdb->insert($table_name,["field_name"=>"text"]);
            $wpdb->insert($table_name,["field_name"=>"text_mobile"]);
            $wpdb->insert($table_name,["field_name"=>"link"]);
            $wpdb->insert($table_name,["field_name"=>"image_desktop"]);
            $wpdb->insert($table_name,["field_name"=>"image_tablet"]);
            $wpdb->insert($table_name,["field_name"=>"image_mobile"]);

        }
    }

    
    function updateTitle() {
        $title_content = get_main_banner_title();

        if($title_content === $_POST['main_banner_title']) {
           return;
        }
        global $wpdb;
       
        $table_name = $wpdb->get_blog_prefix() . 'main_banner';
        $wpdb->update("$table_name", ['field_content' => "{$_POST['main_banner_title']}"], ["field_name"=>'title']);
    }

    if (isset($_POST['main_banner_title'])) {
        updateTitle();
    }

    function get_main_banner_title() {
        global $wpdb;
        $table_name = $wpdb->get_blog_prefix() . 'main_banner';
        $query = "SELECT field_content FROM  $table_name WHERE field_name='title'";
        $result = $wpdb->get_var($query);
        
        $result = wp_unslash($result);
        return $result;
    }

    function updateText() {
        $text_content = get_main_banner_text();

        if($text_content === $_POST['main_banner_text']) {
           return;
        }
        global $wpdb;
       
        $table_name = $wpdb->get_blog_prefix() . 'main_banner';
        $wpdb->update("$table_name", ['field_content' => "{$_POST['main_banner_text']}"], ["field_name"=>'text']);
    }

    if (isset($_POST['main_banner_text'])) {
        updateText();
    }

    function get_main_banner_text() {
        global $wpdb;
        $table_name = $wpdb->get_blog_prefix() . 'main_banner';
        $query = "SELECT field_content FROM  $table_name WHERE field_name='text'";
        $result = $wpdb->get_var($query);
        
        $result = wp_unslash($result);
        return $result;
    }

    function update_text_mobile() {
        $text_content = get_main_banner_text_mobile();

        if($text_content === $_POST['main_banner_text_mobile']) {
           return;
        }
        global $wpdb;
       
        $table_name = $wpdb->get_blog_prefix() . 'main_banner';
        $wpdb->update("$table_name", ['field_content' => "{$_POST['main_banner_text_mobile']}"], ["field_name"=>'text_mobile']);
    }

    if (isset($_POST['main_banner_text_mobile'])) {
        update_text_mobile();
    }

    function get_main_banner_text_mobile() {
        global $wpdb;
        $table_name = $wpdb->get_blog_prefix() . 'main_banner';
        $query = "SELECT field_content FROM  $table_name WHERE field_name='text_mobile'";
        $result = $wpdb->get_var($query);
        
        $result = wp_unslash($result);
        return $result;
    }


    function updateLink() {
        $link_content = get_main_banner_link();

        if($link_content === $_POST['main_banner_link']) {
           return;
        }
        global $wpdb;
       
        $table_name = $wpdb->get_blog_prefix() . 'main_banner';
        $wpdb->update("$table_name", ['field_content' => "{$_POST['main_banner_link']}"], ["field_name"=>'link']);
    }

    if (isset($_POST['main_banner_link'])) {
        updateLink();
    }

    function get_main_banner_Link() {
        global $wpdb;
        $table_name = $wpdb->get_blog_prefix() . 'main_banner';
        $query = "SELECT field_content FROM  $table_name WHERE field_name='link'";
        $result = $wpdb->get_var($query);
        
        $result = wp_unslash($result);
        return $result;
    }

    function update_image_desktop() {
        $dirPath = dirname(__FILE__, 5) . "/uploads/site_img/main_banner"; //путь до папки сохранения

        //удаление текущей фотографии из папки проекта
        $filename_current = get_main_banner_img_desktop();
        $filename_path_current = "$dirPath/$filename_current";
        if (file_exists($filename_path_current)) unlink($filename_path_current);

        //сохранение изображения  в папке проекта
        $filePathFrom = $_FILES["main_banner_image_desktop_btn"]["tmp_name"];
        $filename = basename($_FILES["main_banner_image_desktop_btn"]["name"]);
        $dir_path_to = "$dirPath/$filename";
        move_uploaded_file($filePathFrom,$dir_path_to);

        // сохранение имени файла в БД
        global $wpdb;
        $table_name = $wpdb->get_blog_prefix() . 'main_banner';
        $wpdb->update("$table_name", ['field_content' => "{$filename}"], ["field_name"=>'image_desktop']);
    }
    
    
    if(isset($_FILES['main_banner_image_desktop_btn']["name"])) {
        if (is_uploaded_file($_FILES['main_banner_image_desktop_btn']['tmp_name'])) {
            update_image_desktop();
        }
    };

    function get_main_banner_img_desktop() {
        global $wpdb;
        $table_name = $wpdb->get_blog_prefix() . 'main_banner';
        $query = "SELECT field_content FROM  $table_name WHERE field_name='image_desktop'";
        $result = $wpdb->get_var($query);
        
        $result = wp_unslash($result);
        return $result;
    }

    function update_image_tablet() {
        $dirPath = dirname(__FILE__, 5) . "/uploads/site_img/main_banner"; //путь до папки сохранения

        //удаление текущей фотографии из папки проекта
        $filename_current = get_main_banner_img_tablet();
        $filename_path_current = "$dirPath/$filename_current";
        if (file_exists($filename_path_current)) unlink($filename_path_current);

        //сохранение изображения  в папке проекта
        $filePathFrom = $_FILES["main_banner_image_tablet_btn"]["tmp_name"];
        $filename = basename($_FILES["main_banner_image_tablet_btn"]["name"]);
        $dir_path_to = "$dirPath/$filename";
        move_uploaded_file($filePathFrom,$dir_path_to);

        // сохранение имени файла в БД
        global $wpdb;
        $table_name = $wpdb->get_blog_prefix() . 'main_banner';
        $wpdb->update("$table_name", ['field_content' => "{$filename}"], ["field_name"=>'image_tablet']);
    }
    
    if(isset($_FILES['main_banner_image_tablet_btn']["name"])) {
        if (is_uploaded_file($_FILES['main_banner_image_tablet_btn']['tmp_name'])) {
            update_image_tablet();
        }
    };

    function get_main_banner_img_tablet() {
        global $wpdb;
        $table_name = $wpdb->get_blog_prefix() . 'main_banner';
        $query = "SELECT field_content FROM  $table_name WHERE field_name='image_tablet'";
        $result = $wpdb->get_var($query);
        
        $result = wp_unslash($result);
        return $result;
    }

    function update_image_mobile() {
        $dirPath = dirname(__FILE__, 5) . "/uploads/site_img/main_banner"; //путь до папки сохранения

        //удаление текущей фотографии из папки проекта
        $filename_current = get_main_banner_img_mobile();
        $filename_path_current = "$dirPath/$filename_current";
        if (file_exists($filename_path_current)) unlink($filename_path_current);

        //сохранение изображения  в папке проекта
        $filePathFrom = $_FILES["main_banner_image_mobile_btn"]["tmp_name"];
        $filename = basename($_FILES["main_banner_image_mobile_btn"]["name"]);
        $dir_path_to = "$dirPath/$filename";
        move_uploaded_file($filePathFrom,$dir_path_to);

        // сохранение имени файла в БД
        global $wpdb;
        $table_name = $wpdb->get_blog_prefix() . 'main_banner';
        $wpdb->update("$table_name", ['field_content' => "{$filename}"], ["field_name"=>'image_mobile']);
    }
    
    if(isset($_FILES['main_banner_image_mobile_btn']["name"])) {
        if (is_uploaded_file($_FILES['main_banner_image_mobile_btn']['tmp_name'])) {
            update_image_mobile();
        }
    }

    function get_main_banner_img_mobile() {
        global $wpdb;
        $table_name = $wpdb->get_blog_prefix() . 'main_banner';
        $query = "SELECT field_content FROM  $table_name WHERE field_name='image_mobile'";
        $result = $wpdb->get_var($query);
        
        $result = wp_unslash($result);
        return $result;
    }


?>