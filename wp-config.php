<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'test' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'root' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', '' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'rr3}u!?hEfMg5E^T:vdw8&-yDDuSp|zh5=>%/8I`84?u`C>7-SuV<i#G)ckKW)+y' );
define( 'SECURE_AUTH_KEY',  's}pN=n@<M[S=r/tVS,f1*hk|}`Q.]w$LrfDr-)1jO,_P+zP>zfW7ax7Ei~fAYRLQ' );
define( 'LOGGED_IN_KEY',    'n{ Ho$S`IK^phyBPKazs$V#g#Khv7Ch.`MO:$Cy!<}7T`ayVoa,x/1kj LF#U?>k' );
define( 'NONCE_KEY',        '$bWHz&xz7v7@*h[r_#HQq%25Bh)u!BpO(2|w5:|3H>j;Ge[w MjTalBmTV{xc>Z&' );
define( 'AUTH_SALT',        'k@-t/*P=)L#AoGbY/58R`~N)VZ2j58Cpwvox29lp,jqnJe0R+3F$>$^mWW,DGlFh' );
define( 'SECURE_AUTH_SALT', 'M#[#.76Hm?E6>wH I)zvI2VUd(Xd&Ks: ^@6(MPY3^]7:NS,x~<WbCb?$I?P>QFy' );
define( 'LOGGED_IN_SALT',   '-upEr4W)IIquB?>2=u9sSpuAM%w7~fy,_[Nu%O:L=GE;/o5*@>oS8 +H>4L<VkS;' );
define( 'NONCE_SALT',       '_y~R0cH,Ctv0>kCKArQih*HGO|R@c3t5Ai#c8ki~3I)@+>HkdtNeOG<:E;|[oyIT' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_pdv_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
