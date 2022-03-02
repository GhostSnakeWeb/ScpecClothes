<?php
/**
 * Template part for displaying cards
 *
 *
 * @package spec-clothes
 */

?>

    <img src="<?=get_the_post_thumbnail_url( get_the_ID(), 'preview_product_slider' );?>" class="product-card__image">
    <div class="product-card__name"><?php trim_title_chars(33, '...'); ?></div>
    <div class="product-card__art">Артикул: <?=get_field("articule")?></div>
    <a href="<?=get_permalink();?>" class="product-card__link">Подробнее</a>
</li>
