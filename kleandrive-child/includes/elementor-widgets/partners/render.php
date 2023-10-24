<?php
$style = $settings['style'];
$args = array(
    'numberposts' => -1,
    'post_type'   => 'partners'
);

$partners = get_posts($args);
?>
<div class="partner-slider <?= $style ?>">
    <div class="swiper">
        <div class="swiper-wrapper">
            <?php foreach ($partners as $partner) { ?>
                <div class="swiper-slide">
                    <div class="inner">
                        <div class="description-box">
                            <?= $partner->post_content ?>
                        </div>
                    </div>
                </div>
            <?php }  ?>
        </div>
    </div>
</div>
<?