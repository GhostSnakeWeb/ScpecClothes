<?php
/**
 * Template part for popups message
 *
 *
 * @package spec-clothes
 */
?>

<div class="popup-wrapper send-request-popup">
    <div class="popup">
        <div class="popup__heading">Отправить заявку</div>
        <div class="popup__desription">Подобрали товар, или есть вопросы? Оставьте нам свою заявку и мы свяжемся с
            вами в ближайшее время
        </div>
        <?php echo do_shortcode('[ninja_form id=2]')?>
        <div class="popup__close-button"></div>
    </div>
</div>