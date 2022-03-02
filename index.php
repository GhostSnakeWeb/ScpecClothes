<?php
get_header();
?>
    <main>
        <div class="carousel">
            <?
            $posts = get_posts(array(
                'numberposts' => 3, // количество постов
                'post_type' => 'slider',
                'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
            ));
            foreach ($posts as $post) {
                setup_postdata($post); ?>
                <div class="carousel__item slide"
                     style="background: url(<?= get_field("slide_image") ?>) no-repeat center center;">
                    <div class="container">
                        <div class="slide__title"><? the_title() ?></div>
                        <div class="slide__subtitle"><? the_excerpt(); ?></div>
                        <?php if (get_field("link_catalog")): ?>
                            <a class="slide__link" href="<?php the_field('link_catalog'); ?>">В каталог</a>
                        <?php endif; ?>
                    </div>
                </div>
            <? }
            wp_reset_postdata(); // сброс ?>
        </div>
        <div class="container advantages-container">
            <?
            $posts = get_posts(array(
                'numberposts' => 6, // количество постов
                'post_type' => 'services',
                'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
            ));
            foreach ($posts as $post) {
                setup_postdata($post); ?>
                <div
                        class="advantages"
                        style="--icon-image: url('<?= get_field("service_icon") ?>')">
                    <div class="advantages__heading"><? the_title(); ?></div>
                    <div class="advanteges__text"><? the_excerpt(); ?></div>
                </div>
            <? }
            wp_reset_postdata(); // сброс ?>
        </div>

        <div class="container categories-block container--with-paddings">
            <div class="block-heading">
                <div class="block-heading__heading">Категории товаров</div>
                <a class="block-heading__link" data-sidebar="catalogOpen" href="#!">Перейти в каталог</a>
            </div>

            <ul class="categories">
                <?php

                foreach ($GLOBALS["parent_categories"] as $term) {
                    // Ссылка на страницу категории
                    $term_link = get_category_link(get_cat_ID($term->name));

                    // получаем ID термина на странице термина
                    $term_id = $term->term_id;

                    // получим ID картинки из метаполя термина
                    $image_id = get_term_meta($term_id, '_thumbnail_id', 1);

                    // ссылка на полный размер картинки по ID вложения
                    $image_url = wp_get_attachment_image_url($image_id, 'full');
                    ?>

                    <li class="categories__item category-card">
                        <img class="category-card__image" src="<?= $image_url ?>" alt="Зимняя спецодежда">
                        <div class="category-card__name"><?= $term->name ?></div>
                        <a href="<?= $term_link ?>" class="category-card__link"></a>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <div class="popular-block">
            <div class="container container--with-paddings">
                <div class="block-heading">
                    <div class="block-heading__heading">Популярные товары</div>
                </div>
                <ul class="popular-products">
                    <?php
                    $args = array(
                        'post_type' => 'products',
//                        'meta_key' => 'post_views_count',
//                        'orderby' => 'meta_value_num',
//                        'order'   => 'DESC',
                    );
                    $query = new WP_Query($args);
                    while ($query->have_posts()) {
                    $query->the_post(); ?>
                    <li class="popular-products__item product-card">
                        <?php
                        get_template_part('template-parts/product', 'card');
                        }
                        ?>
                </ul>
            </div>
        </div>
    </main>
<?php
get_footer();