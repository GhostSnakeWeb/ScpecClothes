<?php
get_header();
?>

<?php
// Получаем ID категории
$category = get_queried_object();
$category_id = $category->term_id;

$sub_categories = get_categories(array(
    'orderby' => 'name',
    'parent' => $category->term_id,
    'hide_empty' => true
));

?>

    <main>
        <div class="category-banner"
            <?php if ($banner = get_field("header_banner", get_category($category_id))) { ?>
                style="background-image: url('<?= $banner ?>');"
            <?php } ?>
        >
            <div class="container">
                <h1 class="category-banner__heading"><?= $category->name ?></h1>
            </div>
        </div>
        <div class="container breadcrumbs-container">
            <? get_breadcrumb(); ?>
        </div>
        <div class="container container--with-paddings">
            <div class="block-heading">
                <div class="block-heading__heading">Разделы</div>
            </div>
            <select name="section" id="section-select">
                <option value="all">Все разделы</option>
                <?php
                foreach ($sub_categories as $sub_category) { ?>
                    <option
                            value=".<?php echo $sub_category->slug; ?>"
                        <?php if (isset($_COOKIE['sub_category_after_redirect'])) {
                            if ($sub_category->slug == $_COOKIE['sub_category_after_redirect']) { ?>
                                selected
                            <?php }
                        } ?>
                    ><?php echo $sub_category->name; ?>
                    </option>
                <?php }
                ?>
            </select>

        </div>
        <div class="container container--with-paddings products">
            <div class="block-heading">
                <div class="block-heading__heading">Товары</div>
            </div>
            <ul class="products-list">
                <?php

                global $wp_query;
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                $args = array(
                    'post_type' => 'products',
                    'cat' => $category_id,
                    'posts_per_page' => 12,
                    'paged' => $paged
                );

                $wp_query = new WP_Query($args);

                if ($wp_query->have_posts()) {
                while ($wp_query->have_posts()) {
                    $wp_query->the_post();
                    $post_ID = get_the_ID();
                    $cat = get_the_category($post_ID);
                    $termchildren = get_term_children($cat[0]->term_id, 'category');
                    $subcat_slugs = '';
                    $subcat_names = '';
                    foreach ($termchildren as $child) {
                        $term = get_term_by('id', $child, 'category');
                        if (in_category($term->term_id, $post_ID)) {
                            $subcat_slugs .= $term->slug . " ";
                            $subcat_names .= $term->name . " ";
                        }
                    }?>
                    <li class="products-list__item product-card mix <?= $subcat_slugs ?>"
                    data-groups='["<?= $subcat_names ?>"]'>
                <?php
                    get_template_part( 'template-parts/product', 'card' );
                } ?>
            </ul>
            <?php
            the_posts_pagination(array(
                'prev_text' => __(''),
                'next_text' => __(''),
            ));
            wp_reset_postdata();
            } ?>

        </div>
    </main>
<?php
get_footer();