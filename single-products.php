<?php
get_header();
?>

<?php

$my_post = get_post();
$postID = $my_post->ID;
$cat = get_the_category($postID);

?>

    <main>
        <div class="category-banner"
            <?php if ($banner = get_field("header_banner", get_category($cat[0]->cat_ID))) { ?>
                style="background-image: url('<?= $banner ?>');"
            <?php } ?>
        >
            <div class="container">
                <h1 class="category-banner__heading"><?= $cat[0]->name ?></h1>
            </div>
        </div>
        <div class="container breadcrumbs-container">
            <? get_breadcrumb(); ?>
        </div>
        <div class="container container--with-paddings single-product-block">
            <h2 class="single-product__name single-product__name--mobile"><?=$my_post->post_title ?></h2>
            <div class="single-product-sliders-wrapper">
                <?php
                //Get the images ids from the post_metadata
                $images = acf_photo_gallery('product_gallery', $postID);
                ?>
                <div class="slider-single">
                    <?php
                    //Check if return array has anything in it
                    if (count($images)):
                        foreach ($images as $image):
                            $full_image_url = $image['full_image_url']; //Full size image url
                            ?>

                            <div class="fancybox-slide">
                                <img src="<?php if (!empty($full_image_url)) {
                                    echo $full_image_url;
                                } ?>" alt="">
                            </div>
                        <?php endforeach; endif; ?>
                </div>
                <div class="slider-single-nav">
                    <?php
                    //Check if return array has anything in it
                    if (count($images)):
                        foreach ($images as $image):
                            $thumbnail_image_url = $image['thumbnail_image_url']; //Get the thumbnail size image url 150px by 150px
                            ?>

                            <img src="<?php if (!empty($thumbnail_image_url)) {
                                echo $thumbnail_image_url;
                            } ?>" alt="">
                        <?php endforeach; endif; ?>
                </div>
            </div>
            <div class="single-product">
                <h2 class="single-product__name"><?=$my_post->post_title;?></h2>
                <?php if ($availableSizes = get_field("available_sizes")) { ?>
                    <div class="single-product__sizes">
                        <span>Доступные размеры:
                        <?=htmlentities($availableSizes)?>
                        </span>
                    </div>
                <?php } ?>
                <button data-popup="popupSend" class="single-product__button send-request">Отправить заявку</button>
                <span>О товаре</span>
                <ul class="single-product__consist">
                    <?php
                        $meta_values = get_post_meta( $postID, '', false );
                        foreach ($meta_values as $key => $value) {
                            $metaField = get_field_object($key, false, true, true);
                            if ($metaField && ($metaField["name"] !== "articule" && $metaField["name"] !== "available_sizes")) { ?>
                                <li>
                                    <span><?=$metaField["label"]?>:</span>
                                    <?=$metaField["value"]?>
                                </li>
                    <?php } } ?>
                </ul>
                <?php if (!empty($my_post->post_content)) { ?>
                        <button class="single-product__more">Подробнее</button>
                        <div class="single-product__description"><?php echo $my_post->post_content?></div>
                <?php } ?>
            </div>
        </div>
    </main>
<?php
get_footer();