<?php
/**
 * Template part for popup-calls
 *
 *
 * @package spec-clothes
 */

?>

<div class="popup-wrapper call-request-popup">
    <div class="popup">
        <div class="popup__heading">Заказать звонок</div>
        <div class="popup__desription">Оставьте нам свои данные и наши операторы свяжутся с вами в ближайшее время
        </div>
        <?php echo do_shortcode('[ninja_form id=3]')?>
        <div class="popup__close-button"></div>
    </div>
</div>
