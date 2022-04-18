<?php
require_once dirname(__FILE__) . '/quiz_functions.php';
$_POST['user_scope_work'] = array();
?>

<section class="quiz_section">
    <div class="container">
        <div class="quiz_inner">
            <div class="quiz_left">
                <div class="quiz_text-box">
                    <h2 class="quiz_title"><?php get_quiz_title() ?></h2>
                    <p class="quiz_text"><?php get_quiz_text() ?></p>
                </div>
                <form method="POST" class="quiz_form">

                    <div class="quiz_radio-inner">
                        <input type="radio" name="user_scope_work" value="question_1" class="quiz_form-input" <?php set_disabled() ?> id="question_1" checked>
                        <label class="quiz_item-textbox" for='question_1'>
                            <span class="quiz_item-title"><?php get_title_question_1_quiz() ?></span>
                            <span class="quiz_item-description"><?php get_text_question_1_quiz() ?></span>
                        </label>
                    </div>
                    <div class="quiz_radio-inner">
                        <input type="radio" name="user_scope_work" value="question_2" class="quiz_form-input" <?php set_disabled() ?> id="question_2">
                        <label class="quiz_item-textbox" for='question_2'>
                            <span class="quiz_item-title"><?php get_title_question_2_quiz() ?></span>
                            <span class="quiz_item-description"><?php get_text_question_2_quiz() ?></span>
                        </label>
                    </div>
                    <div class="quiz_radio-inner">
                        <input type="radio" name="user_scope_work" value="question_3" class="quiz_form-input" <?php set_disabled() ?> id="question_3">
                        <label class="quiz_item-textbox" for="question_3">
                            <span class="quiz_item-title"><?php get_title_question_3_quiz() ?></span>
                            <span class="quiz_item-description"><?php get_text_question_3_quiz() ?></span>
                        </label>
                    </div>
                    <input class="quiz_btn" type="submit" value="" hidden>
                </form>
            </div>
            <div class="quiz_right">
                <div class="quiz_right-text-box">
                    <p class="quiz_vote-title">Проголосовало:</p>
                    <p class="quiz_vote-text-box"> <span class="quiz_vote-count"><?php get_qize_vote_sum() ?></span><span class="quiz_vote-count-text"> пользователей</span></p>
                </div>
            </div>
        </div>

    </div>
</section>