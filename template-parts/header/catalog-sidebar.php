<?php
/**
 * Template part for catalog-sidebar
 *
 *
 * @package spec-clothes
 */
?>
<ul class="catalog-sidebar">
    <button class="catalog-sidebar__close-button"></button>
    <?php
    $terms = get_terms(array(
        'taxonomy' => array('category'), // название таксономии с WP 4.5
        'orderby' => 'none',
        'hide_empty' => true,
        'object_ids' => null,
        'number' => '6',
        'fields' => 'all',
        'count' => false,
        'parent' => 0, // Если указать 0, то будут получены все родительские термы без потомков
        'hierarchical' => true,
        'child_of' => 0,
        'pad_counts' => false,
        'cache_domain' => 'core',
        'update_term_meta_cache' => true, // подгружать метаданные в кэш
    ));

    $GLOBALS["parent_categories"] = $terms;

    if (isset($GLOBALS["parent_categories"])) {
        foreach ($GLOBALS["parent_categories"] as $term) {
            $sub_categories = get_categories(array(
                'orderby' => 'name',
                'parent' => $term->term_id,
                'hide_empty' => true
            ));
            $sub_categories_count = count($sub_categories); ?>
            <li class="catalog-sidebar__item">
                <div class="item-wrapper">
                    <a href="<?= get_category_link(get_cat_ID($term->name)) ?>"><?= $term->name ?></a>
                    <button class="sub-menu-toggler"></button>
                </div>
                <ul class="sub-menu">
                    <?php wp_list_categories('title_li&child_of=' . $term->term_id); ?>
                </ul>
            </li>
        <?php } ?>
    <?php } ?>
</ul>