<?php
/**
 * Template part for header_whitebar--mobile
 *
 *
 * @package spec-clothes
 */
?>
<div class="header_whitebar--mobile">
    <div class="container">
        <a href="<?= get_home_url(); ?>">
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
        <div class="header-info-wrapper">
            <div class="mobile-buttons-wrapper">
                <button class="send-request" data-popup="popupSend">Отправить заявку</button>
                <button class="call-request" data-popup="popupCall">Заказать звонок</button>
            </div>
            <div class="info-wrapper">
                <div class="info-wrapper__info"><?echo get_theme_mod('address');?></div>
                <a class="info-wrapper__info phone-number" href="tel:<?echo get_theme_mod('phone');?>"><?echo get_theme_mod('phone');?></a>
            </div>
        </div>
    </div>
</div>
