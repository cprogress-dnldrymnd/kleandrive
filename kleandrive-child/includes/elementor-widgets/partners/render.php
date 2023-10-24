<?php
$style = $settings['style'];
$args = array(
    'numberposts' => -1,
    'post_type'   => 'partners'
);

$partners = get_posts($args);
?>
<div class="partner-slider <?= $style ?>">
    <div class="swiper mySwiperPartner">
        <div class="swiper-wrapper">
            <?php foreach ($partners as $partner) { ?>
                <?php
                $logo = carbon_get_post_meta($partner->ID, 'logo');
                $alt_logo = carbon_get_post_meta($partner->ID, 'alt_logo');
                $website = carbon_get_post_meta($partner->ID, 'website');
                ?>
                <div class="swiper-slide">
                    <div class="inner">
                        <div class="description-box">
                            <?= $partner->post_content ?>
                        </div>

                        <?php if ($style == 'partner-style-1') { ?>
                            <div class="logo-box">
                                <?php if ($logo) { ?>
                                    <div class="image">
                                        <img src="<?= wp_get_attachment_image_url($logo, 'medium') ?>" alt="<?= $partner->post_title ?>">
                                    </div>
                                <?php } ?>

                                <div class="title">
                                    <div class="title"><?= $partner->post_title ?></div>
                                    <?php if ($website) { ?>
                                        <a href="<?= $website ?>"><?= $website ?></a>
                                    <?php } ?>

                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php }  ?>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>
<?
