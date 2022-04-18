<?php
require_once dirname(__FILE__) . "/managers_function.php";
require_once dirname(__FILE__) . "/manager_cart/manager_cart.php";

?>
<section class="managers">
    <div class="container">
        <h2 class="managers_title"><?php get_manager_main_title() ?></h2>
        <div class="manager_list">
<?php
    $managers_count = 6;
    for($i = 1; $i <= $managers_count; $i++){
        $manager = new ManagerCart($i);
        $manager->show();
    }
?>
        </div>
    </div>
</section>