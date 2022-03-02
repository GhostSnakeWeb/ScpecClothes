<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <title><?php wp_title(' | ', 'echo', 'right'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php wp_head(); ?>

</head>
<body>
<header>
    <?php get_template_part('template-parts/header/header-blackbar');?>
    <?php get_template_part('template-parts/header/header-whitebar');?>
    <?php get_template_part('template-parts/header/header-whitebar-mobile');?>
    <?php get_template_part('template-parts/header/catalog-sidebar');?>
</header>
<main>
    <div class="category-banner"
        <?php if ($banner = get_field("template_page_banner")) { ?>
            style="background-image: url('<?= $banner ?>');"
        <?php } ?>>
        <div class="container">
            <h1 class="category-banner__heading">
                <?php if (is_search()) {
                    printf(esc_html__('Резултаты по запросу: %s', 'spec-clothes'), get_search_query());
                } else {
                    the_title();
                }
                ?>
            </h1>
        </div>
    </div>
    <div class="container breadcrumbs-container">
        <? get_breadcrumb(); ?>
    </div>