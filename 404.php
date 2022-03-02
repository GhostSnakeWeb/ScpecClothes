<?php
get_header();
?>
<main style="margin-bottom: 60px;">
    <div class="container container--col">
        <img class="image404" src="<?=get_template_directory_uri()."/assets/img/404.png" ?>" alt="404">
        <div class="heading404">Страница не найдена</div>
        <a href="<?=get_home_url(); ?>" class="link404">На главную</a>
    </div>
</main>
<?php
get_footer();