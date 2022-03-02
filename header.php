<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <title>
        <?php if (is_archive()) {
            the_archive_title();
            echo " - ";
            bloginfo('name');
        } else {
            wp_title(' | ', 'echo', 'right');
        }?>
    </title>
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