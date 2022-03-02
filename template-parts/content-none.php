<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package spec-clothes
 */

?>

<main>
    <div class="container container--with-paddings products">
        <div class="block-heading">
            <div class="block-heading__heading"><?php esc_html_e( 'Не удалось ничего найти', 'spec-clothes' ); ?></div>
        </div>
        <div class="page-content">
            <?php
            if ( is_home() && current_user_can( 'publish_posts' ) ) :

                printf(
                    '<p>' . wp_kses(
                    /* translators: 1: link to WP admin new post page. */
                        __( 'Опубликуем свой первый пост? <a href="%1$s">Начать</a>.', 'spec-clothes' ),
                        array(
                            'a' => array(
                                'href' => array(),
                            ),
                        )
                    ) . '</p>',
                    esc_url( admin_url( 'post-new.php' ) )
                );

            elseif ( is_search() ) :
                ?>

                <p><?php esc_html_e( 'К сожалению по запросу не удалось ничего найти. Возможно данного товара еше нет на нашем сайте. Напишите или позвоните нам, чтобы уточнить информацию о товаре.', 'spec-clothes' ); ?></p>
                <?php
                get_template_part('template-parts/content-contacts');
            else :
                ?>

                <p><?php esc_html_e( 'Похоже мы не смогли ничего найти. Напишите или позваоните нам.', 'spec-clothes' ); ?></p>
                <?php
                get_template_part('template-parts/content-contacts');
            endif;
            ?>
        </div><!-- .page-content -->
    </div>
</main>
