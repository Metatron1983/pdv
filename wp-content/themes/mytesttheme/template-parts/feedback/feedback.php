<?php 
require_once dirname(__FILE__) . "/feedback_function.php"; 
?>
<section class="feedback">
    <div class="feedback_wrapper container">
        <div class="feedback_left">
            <h2 class="feedback_title"><?php get_feedback_title_name_clb()?></h2>
            <form class="feedback_form" method="post" enctype="multipart/form-data">
                <textarea class="feedback_description" name="feedback[description]" rows="5" maxlength="215" placeholder="<?php get_feedback_description_section_clb()?>"></textarea>
                <div class="feedback_clip-file">
                    <div class="feedback_img-wrpper">
                        <a href="" class="feedback_brief-file" style="display: none;"><img class="feedback_brief-file-img" src="<?php get_feedback_doc_picto()  ?>" alt="doc picto"> <span class="feedback_brief-file-text"></span></a>
                        <label for="feedback_img-btn-id" class="feedback_img-btn"><?php get_feedback_description_btn_add_file_clb()?></label>
                        <input type="hidden" name="MAX_FILE_SIZE" value="5242880">
                        <input class="feedback_img-file" id="feedback_img-btn-id" name="feedback[brief]" type="file" style="display: none;" accept=".pdf, .docx, .doc">
                    </div>
                </div>
                <div class="feedback_clip-img">
                    <div class="feedback_img-gallery" style="display: none;"></div>
                    <div class="feedback_img-btn-wrapper">
                        <label for="feedback_img-btn-id2" class="feedback_img-btn"><?php get_feedback_description_btn_add_foto_clb()?></label>
                        <input type="hidden" name="MAX_FILE_SIZE" value="5242880">
                        <input class="feedback_img-file" id="feedback_img-btn-id2" name="feedback[img][]" type="file" style="display: none;" accept=".png, .jpg, .jpeg, .svg, .webp" multiple>
                    </div>
                </div>
                <input type="submit" class="feedback_btn" value="<?php get_feedback_description_btn_submit_clb()?>">
            </form>
        </div>
        <div class="feedback_right">
            <img class="feedback_background" src="<?php get_feedback_img()?>" alt="Foto background">
        </div>

    </div>


</section>