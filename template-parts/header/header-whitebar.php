<?php
/**
 * Template part for header_whitebar
 *
 *
 * @package spec-clothes
 */
?>
<div class="header_whitebar">
    <div class="container">
        <a href="<?=get_home_url(); ?>">
            <?php
            $logo_img = '';
            if ($custom_logo_id = get_theme_mod('custom_logo')) {
                $logo_img = wp_get_attachment_image($custom_logo_id, 'full', false,
                    array(
                        'class' => 'logo',
                    ));
            }
            echo $logo_img;
            ?>
        </a>
        <div class="contact-card contact-card--map">
            <div class="contact-card__title"><?echo get_theme_mod('address');?></div>
            <div class="contact-card__info contact-card__info--no-underline"><?echo get_theme_mod('delivery_info');?></div>
            <a href="<?echo get_theme_mod('map_link');?>" target="_blank" class="contact-card__info">
                Показать на карте
            </a>
        </div>
        <div class="contact-card contact-card--phone">
            <a class="contact-card__title phone-number" href="tel:<?echo get_theme_mod('phone');?>"><?echo get_theme_mod('phone');?></a>
            <div data-popup="popupCall" class="contact-card__info call-request">Заказать звонок</div>
            <div data-popup="popupSend" class="contact-card__info send-request">Отправить заявку</div>
        </div>
    </div>
</div>