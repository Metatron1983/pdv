<?php
require_once dirname(__FILE__, 2) . "/managers_function.php";

class ManagerCart {
    private $name;
    private $position;
    private $instagram_link;
    private $instagram_img;
    private $VK_link;
    private $VK_img;
    private $linkedin_link;
    private $linkedin_img;
    private $manager_img_src;

    
    public function __construct($manager_num) {
        $name_tbl_field_name = "manager_{$manager_num}_name";
        $position_tbl_field_name = "manager_{$manager_num}_position";
        $instagram_tbl_field_name = "manager_{$manager_num}_instagram";
        $VK_tbl_field_name = "manager_{$manager_num}_VK";
        $linkedin_tbl_field_name = "manager_{$manager_num}_linkedin";
        $img_tbl_field_name = "manager_{$manager_num}_img";
        
        $this->name = get_manager_field_content($name_tbl_field_name);
        $this->position = get_manager_field_content($position_tbl_field_name);
        $this->instagram_link = get_manager_field_content($instagram_tbl_field_name);
        $this->instagram_img = esc_attr(content_url() . "/uploads/site_img/managers/instagram.svg");
        $this->VK_link = get_manager_field_content($VK_tbl_field_name);
        $this->VK_img = esc_attr(content_url() . "/uploads/site_img/managers/VK.svg");
        $this->linkedin_link = get_manager_field_content($linkedin_tbl_field_name);
        $this->linkedin_img = esc_attr(content_url() . "/uploads/site_img/managers/linkedin.svg");
        $this->manager_img_src = esc_attr(content_url() . "/uploads/site_img/managers/" . get_manager_field_content($img_tbl_field_name));
    }

    private function show_prop($prop_name) {
        return print($prop_name);
    }

    public function show() {
?>
<div class="manager_cart">
    <img src="<?php $this->show_prop($this->manager_img_src) ?>" alt="Фото сотрудника" class="manager_img">
    <div class="manager_contentbox-wrapper">
        <div class="manager_contentbox">
            <div class="manager_textbox">
                <p class="manager_name"><?php $this->show_prop($this->name)?></p>
                <p class="manager_position"><?php $this->show_prop($this->position)?></p>
            </div>
            <div class="manager_social">
                <a href="<?php $this->show_prop($this->instagram_link) ?>" class="manager_instagram-link"><img src="<?php $this->show_prop($this->instagram_img) ?>" alt="instagram-logo" class="manager_instagram-img"></a>
                <a href="<?php $this->show_prop($this->VK_link) ?>" class="manager_VK-link"><img src="<?php $this->show_prop($this->VK_img) ?>" alt="VK-logo" class="manager_VK-img"></a>
                <a href="<?php $this->show_prop($this->linkedin_link) ?>" class="manager_linkedin-link"><img src="<?php $this->show_prop($this->linkedin_img) ?>" alt="linkedin-logo" class="manager_linkedin-img"></a>
            </div>
        </div>
    </div>
</div>

<?php
    }
}
?>