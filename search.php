<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package spec-clothes
 */

get_header('tpl');
?>

<?php if (have_posts()) : ?>
    <main>
    <div class="container container--with-paddings products">
    <div class="block-heading">
        <div class="block-heading__heading"><?php printf(esc_html__('Резултаты по запросу: %s', 'spec-clothes'), get_search_query()); ?></div>
    </div>
    <ul class="products-list">
        <?php
        /* Start the Loop */
        while (have_posts()) :
        the_post();

        /**
         * Run the loop for the search to output the results.
         * If you want to overload this in a child theme then include a file
         * called content-search.php and that will be used instead.
         */
        ?>

        <li class="popular-products__item product-card">
            <?php
            get_template_part('template-parts/product', 'card');

            endwhile;
            ?>
    </ul>
    <?php

    the_posts_pagination(array(
        'prev_text' => __(''),
        'next_text' => __(''),
    ));
    wp_reset_postdata();
else :

    get_template_part('template-parts/content', 'none');

endif;
?>
    </div>
    </main>
<?php
get_footer();
