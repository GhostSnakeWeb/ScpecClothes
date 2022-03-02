<footer>
    <!--Попапы-->
    <?php get_template_part('template-parts/popups/hook-popup'); ?>
    <div class="container">
        <div class="catalog">
            <div class="catalog__heading">Каталог</div>
            <ul class="catalog__list catalog-list">
                <?php
                    foreach( $GLOBALS["parent_categories"] as $term ) {
                        // Ссылка на страницу категории
                        $term_link = get_category_link(get_cat_ID($term->name)); ?>
                        <li class="catalog-list__item">
                            <a href="<?=$term_link?>"><?=$term->name?></a>
                        </li>
                <?php } ?>
            </ul>
        </div>
        <nav class="menu menu--footer">
            <?php wp_nav_menu(array(
                'theme_location' => 'top',
                'container' => false,
                'menu_class' => ''
            )); ?>
        </nav>
        <div class="contact-block">
            <div class="contact-card">
                <a class="contact-card__title phone-number" href="tel:<?echo get_theme_mod('phone');?>"><?echo get_theme_mod('phone');?></a>
                <div class="contact-card__info contact-card__info--no-underline"><?echo get_theme_mod('work_time');?></div>
                <div data-popup="popupCall" class="contact-card__info call-request">Заказать звонок</div>
            </div>
            <div class="contact-card contact-card--map">
                <div class="contact-card__title"><?echo get_theme_mod('address');?></div>
                <div class="contact-card__info contact-card__info--no-underline"><?echo get_theme_mod('delivery_info');?></div>
                <a href="<?echo get_theme_mod('map_link');?>" target="_blank" class="contact-card__info">
                    Показать на карте
                </a>
            </div>
            <div class="contact-card contact-card--socials">
                <div class="contact-card__title">Мы в соцсетях</div>
                <a href="<?echo get_theme_mod('insta_link');?>" class="instagram"></a>
                <a href="<?echo get_theme_mod('vk_link');?>" class="vk"></a>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
