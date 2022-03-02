<?php
/**
 * Template part for displaying contacts block
 *
 * @package spec-clothes
 */
?>
<div class="contacts-wrapper">
    <div class="contact-card contact-card--socials">
        <a href="<?echo get_theme_mod('insta_link');?>" class="instagram"></a>
        <a href="<?echo get_theme_mod('vk_link');?>" class="vk"></a>
    </div>
    <button data-popup="popupSend" class="send-request">Отправить заявку</button>
    <button data-popup="popupCall" class="call-request">Заказать звонок</button>
</div>