<?php 
    require_once dirname(__FILE__) . "/clients_function.php"; 
    require_once dirname(__FILE__) . "/clients_cart_item.php";
?>

<section class="clients">
    <div class="container">
        <h2 class="clients_title"><?php get_clients_title()?></h2>
        <div class="clients_wrapper">
<?php 
    $cart_items = 8;
    for($i = 0; $i < $cart_items; $i++) {
        clients_cart_item($i + 1);
    }

?>
        </div>
    </div>
</section>