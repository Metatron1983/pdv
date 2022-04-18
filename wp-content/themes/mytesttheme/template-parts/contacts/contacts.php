<?php
require_once dirname(__FILE__) . "/contacts_function.php";
$path_img = content_url() . "/uploads/site_img/contacts/";

?>

<section class="contacts">
    <div class="container">
        <h2 class="contacts_title"><?php get_field_content_contacts_tbl("title") ?></h2>
        <div class="contacts_inner">
            <address class="contacts_contentbox-left">
                <div class="contacts_content-wrapper">
                    <div class="contacts_img-wrapper">
                        <img src="<?php print($path_img . "phone.svg") ?>" alt="logo" class="contacts_img">
                    </div>
                    <div class="contacts_textbox">
                        <p class="contacts_textbox-title">Телефон</p>
                        <a class="contacts_link" href="tel:<?php get_field_content_contacts_tbl("phone") ?>"><?php get_field_content_contacts_tbl("phone") ?></a>
                    </div>
                </div>
                <div class="contacts_content-wrapper">
                    <div class="contacts_img-wrapper">
                        <img src="<?php print($path_img . "mail.svg") ?>" alt="logo" class="contacts_img">
                    </div>
                    <div class="contacts_textbox">
                        <p class="contacts_textbox-title">E-mail</p>
                        <a class="contacts_link" href="mailto:<?php get_field_content_contacts_tbl("email") ?>"><?php get_field_content_contacts_tbl("email") ?></a>
                    </div>
                </div>
                <div class="contacts_content-wrapper">
                    <div class="contacts_img-wrapper">
                        <img src="<?php print($path_img . "whatsapp.svg") ?>" alt="logo" class="contacts_img">
                    </div>
                    <div class="contacts_textbox">
                        <p class="contacts_textbox-title">Whatsapp</p>
                        <a class="contacts_link" href="https://wa.me/<?php get_field_content_contacts_tbl("whatsapp") ?>"><?php get_field_content_contacts_tbl("whatsapp") ?></a>
                    </div>
                </div>
                <div class="contacts_content-wrapper">
                    <div class="contacts_img-wrapper">
                        <img src="<?php print($path_img . "skype.svg") ?>" alt="logo" class="contacts_img">
                    </div>
                    <div class="contacts_textbox">
                        <p class="contacts_textbox-title">Skype</p>
                        <a class="contacts_link" href="skype:<?php get_field_content_contacts_tbl("skype") ?>?call"><?php get_field_content_contacts_tbl("skype") ?></a>
                    </div>
                </div>
            </address>
            <table class="contacts_contentbox-right">
                <tbody>
                    <tr>
                        <th class="contacts_requisites-thead" scope="row">Полное наименование:</th>
                        <td class="contacts_requisites-tdatacell"><?php get_field_content_contacts_tbl("full_name") ?></td>
                    </tr>
                    <tr>
                        <th class="contacts_requisites-thead" scope="row">ИНН:</th>
                        <td class="contacts_requisites-tdatacell"><?php get_field_content_contacts_tbl("TIN") ?></td>
                    </tr>
                    <tr>
                        <th class="contacts_requisites-thead" scope="row">КПП:</th>
                        <td class="contacts_requisites-tdatacell"><?php get_field_content_contacts_tbl("IEC") ?></td>
                    </tr>
                    <tr>
                        <th class="contacts_requisites-thead" scope="row">ОГРН:</th>
                        <td class="contacts_requisites-tdatacell"><?php get_field_content_contacts_tbl("PSRN") ?></td>
                    </tr>
                    <tr>
                        <th class="contacts_requisites-thead" scope="row">Адрес:</th>
                        <td class="contacts_requisites-tdatacell"><?php get_field_content_contacts_tbl("address") ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>