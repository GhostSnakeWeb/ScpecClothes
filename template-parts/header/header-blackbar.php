<?php
/**
 * Template part for header-blackbar
 *
 *
 * @package spec-clothes
 */
?>
<div class="header_blackbar">
    <div class="container">
        <div class="nav-wrap">
            <button class="catalog-open" data-sidebar="catalogOpen" aria-label="Открыть каталог">Каталог</button>
            <nav class="menu">
                <?php wp_nav_menu(array(
                    'theme_location' => 'top',
                    'container' => false,
                )); ?>
            </nav>
        </div>
        <?php get_search_form(); ?>
    </div>
</div>