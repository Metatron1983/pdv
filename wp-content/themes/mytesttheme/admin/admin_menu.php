<?php

// удаление не используемых пунктов меню верхнего уровня;
add_action( 'admin_menu', 'remove_menus' );

function remove_menus(){
	remove_menu_page( 'index.php' );                  // Консоль
	remove_menu_page( 'edit.php' );                   // Записи
	remove_menu_page( 'upload.php' );                 // Медиафайлы
	remove_menu_page( 'edit.php?post_type=page' );    // Страницы
	remove_menu_page( 'edit-comments.php' );          // Комментарии
	remove_menu_page( 'themes.php' );                 // Внешний вид
	remove_menu_page( 'plugins.php' );                // Плагины
	remove_menu_page( 'users.php' );                  // Пользователи
	remove_menu_page( 'tools.php' );                  // Инструменты
	remove_menu_page( 'options-general.php' );        // Параметры
}




// добавление пунктов меню верхнего уровня
add_action( 'admin_menu', 'register_my_pages' );

function register_my_pages(){
	require_once dirname(__FILE__) . './main_banner_menu_page/main_banner.php';
	require_once dirname(__FILE__) . './services_menu_page/services.php';
	require_once dirname(__FILE__) . './quiz_menu_page/quiz.php';
	require_once dirname(__FILE__) . './advantages_menu_page/advantages.php';
	require_once dirname(__FILE__) . './delivery_stages_menu_page/delivery_stages.php';
	require_once dirname(__FILE__) . './clients_menu_page/clients.php';
	require_once dirname(__FILE__) . './managers_menu_page/managers.php';
	require_once dirname(__FILE__) . './contacts_admin_page/contacts.php';
	require_once dirname(__FILE__) . './feedback_admin_page/feedback.php';

}

?>