<?php
require_once 'services_functions.php'
?>


<section class="services page_section">
    <div class="container">
        <div class="section_wrapper">
            <div class="services_inner">
                <div class="services_content-box">
                    <div class="services_img-wrapper">
                        <img class="services_img" src="<?php get_services_img_src(1) ?>" alt="Пиктограмма поиска производителей по товару">
                    </div>
                    <div class="services_text-wrapper">
                        <h3 class="services_title"> <?php get_services_title(1) ?></h3>
                        <p class="services_text"><?php get_services_text(1) ?></p>
                    </div>
                </div>
            </div>
            <div class="services_inner">
                <div class="services_content-box">
                    <div class="services_img-wrapper">
                        <img class="services_img" src="<?php get_services_img_src(2) ?>" alt="Пиктограмма поиска конкретного производителя">
                    </div>
                    <div class="services_text-wrapper">
                        <h3 class="services_title"><?php get_services_title(2) ?></h3>
                        <p class="services_text"><?php get_services_text(2) ?></p>
                    </div>
                </div>
            </div>
            <div class="services_inner">
                <div class="services_content-box">
                    <div class="services_img-wrapper">
                        <img class="services_img" src="<?php get_services_img_src(3) ?>" alt="Пиктограмма доставки образцов товаров">
                    </div>
                    <div class="services_text-wrapper">
                        <h3 class="services_title"><?php get_services_title(3) ?></h3>
                        <p class="services_text"><?php get_services_text(3) ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>