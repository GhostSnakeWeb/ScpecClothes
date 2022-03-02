<?php
/*
Template Name: Контакты и сервис
*/
get_header('tpl');
?>

<?php if (is_page('Контакты')) { ?>
    <div class="container container--with-paddings contacts-container">
        <div class="map-wrapper">
            <div class="map-wrapper__heading">Мы находимся</div>
            <div class="map-wrapper__cards">
                <div class="contact-card contact-card--map">
                    <div class="contact-card__title">с. Южный Урал, Пушкина 5</div>
                </div>
                <div class="contact-card contact-card--phone">
                    <a class="contact-card__title phone-number" href="tel:89228639820">8&nbsp;(922)&nbsp;863-98-20</a>
                </div>
            </div>
            <div class="map-wrapper__map">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <? the_content(); ?>
                <?php endwhile; endif; ?>
            </div>
        </div>
        <?php get_template_part('template-parts/content-contacts');?>
    </div>
<?php } else { ?>
    <section class="container container--with-paddings">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <? the_content(); ?>
        <?php endwhile; endif; ?>
    </section>
    </main>
<?php } ?>
<?php
get_footer();