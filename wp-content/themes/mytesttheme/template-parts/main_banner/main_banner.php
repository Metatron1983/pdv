<?php 
require_once 'main_banner_func.php'; 
?>

<section class="main-banner page-section">
    <div class="main-banner_bg">
        <div class="main-banner__bg__left"></div>
        <div class="main-banner__bg__right"></div>
    </div>
    <div class="container">
    <div class="main-banner__content">
        <div class="main-banner__textbox">
            <h1 class="main-banner__title"> <?php get_main_banner_title();?></h1>
            <p class="main-banner__text"><?php get_main_banner_text();?></p>
            <p class="main-banner__text_mobile"><?php get_main_banner_text_mobile();?></p>
            <a href="#" class="main-banner__link"><?php get_main_banner_link();?></a>
        </div>
        <picture class="main-banner__picture"> 
            <source class="main-banner__image" media="(max-width: 425px)" srcset="<?php get_main_banner_img_mobile();?>">
            <source class="main-banner__image" media="(max-width: 960px)" srcset="<?php get_main_banner_img_tablet();?>">
            <img class="main-banner__image" src="<?php get_main_banner_img_desktop();?>" alt="main banner">
        </picture>
    </div>
    </div>
 
</section> 