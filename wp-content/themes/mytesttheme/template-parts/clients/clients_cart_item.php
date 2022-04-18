<?php
require_once dirname(__FILE__) ."/clients_function.php";
function clients_cart_item($cart_num) {
?>
    <div class="clients-cart_item">
        <div class="clients-cart_item-img-wrapper">
            <img src="<?php get_clients_img($cart_num)?>" alt="Карточка товара" class="clients-cart_item-img">
        </div>
        <div class="clients-cart_item-content">
            <p class="clients-cart_item-name"><?php get_company_name($cart_num)?></p>
            <p class="clients-cart_item-description"><?php get_company_description($cart_num)?></p>
        </div>
    </div>
<?php
}
?>

