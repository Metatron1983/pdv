<?php

// изменение админ панели
if (is_admin()) load_template(dirname( __FILE__ ) . './admin/admin_menu.php', true);


//операции со страницей
if(!is_admin()) {
    load_template(dirname( __FILE__ ) . './template-parts/head/head_functions.php', true);
}

//Ajax request
require_once dirname(__FILE__) . '/template-parts/quiz/quiz_response.php';


?>


