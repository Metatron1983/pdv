 <?php include_once dirname(__FILE__) . "/advantages_function.php" ?>

 <section class="advantages">
     <div class="advantages_banner container">
         <div class="advantages_banner-left">
             <h2 class="advantages_banner-title"><?php get_advantages_banner_title() ?></h2>
             <div class="advantages_background-left"></div>
         </div>
         <picture class="admantages_banner-right">
             <source class="admantages_banner-right-img" media="(max-width: 920px)" srcset="<?php get_advantages_banner_image_tablet_src() ?>">
             <img class="admantages_banner-right-img" src="<?php get_advantages_banner_image_src() ?>" alt="Баннер Секции">
         </picture>
     </div>
     <div class="advantages_content container">
         <div class="advantages_content-left">
             <div class="advantages_cart">
                 <div class="advantages_cart-img-wrapper">
                     <img class="advantages_cart-img" src="<?php get_advantages_advantage_1_image() ?>" alt="Пикто">
                 </div>
                 <div class="advantages_cart-textbox">
                     <h3 class="advantages_cart-title"><?php get_advantages_advantage_1_title() ?></h3>
                     <p class="advantages_cart-text"><?php get_advantages_advantage_1_text() ?></p>
                 </div>
             </div>
             <div class="advantages_cart">
                 <div class="advantages_cart-img-wrapper">
                     <img src="<?php get_advantages_advantage_2_image() ?>" alt="Пикто" class="advantages_cart-img">
                 </div>
                 <div class="advantages_cart-textbox">
                     <h3 class="advantages_cart-title"><?php get_advantages_advantage_2_title() ?></h3>
                     <p class="advantages_cart-text"><?php get_advantages_advantage_2_text() ?></p>
                 </div>
             </div>
         </div>
         <div class="advantages_content-right">
             <div class="advantages_cart">
                 <div class="advantages_cart-img-wrapper">
                     <img src="<?php get_advantages_advantage_3_image() ?>" alt="Пикто" class="advantages_cart-img">
                 </div>
                 <div class="advantages_cart-textbox">
                     <h3 class="advantages_cart-title"><?php get_advantages_advantage_3_title() ?></h3>
                     <p class="advantages_cart-text"><?php get_advantages_advantage_3_text() ?></p>
                 </div>
             </div>
             <div class="advantages_cart">
                 <div class="advantages_cart-img-wrapper">
                     <img src="<?php get_advantages_advantage_4_image() ?>" alt="Пикто" class="advantages_cart-img">
                 </div>
                 <div class="advantages_cart-textbox">
                     <h3 class="advantages_cart-title"><?php get_advantages_advantage_4_title() ?></h3>
                     <p class="advantages_cart-text"><?php get_advantages_advantage_4_text() ?></p>
                 </div>
             </div>
         </div>
     </div>
 </section>