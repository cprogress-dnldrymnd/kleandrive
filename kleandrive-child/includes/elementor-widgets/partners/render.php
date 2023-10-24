<?php
$style = $settings['style'];
$args = array(
    'numberposts' => -1,
    'post_type'   => 'partners'
);

$partners = get_posts($args);
?>
<div class="partner-slider <?= $style ?>">
    <div class="partner-wrapper">


        <div class="swiper mySwiperPartner <?= $style == 'partner-style-2' ? 'mySwiperPartnerThumb' : 'mySwiperPartnernoThumb' ?>">
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

                                    <div class="title-holder">
                                        <div class="title"><?= $partner->post_title ?></div>
                                        <?php if ($website) { ?>
                                            <a target="_blank" href="<?= $website ?>" class="website"><?= $website ?></a>
                                        <?php } ?>

                                    </div>
                                </div>
                            <?php } else { ?>
                                <?php if ($website) { ?>
                                    <div class="sc_item_button sc_button_wrap">
                                        <a target="_blank" href="<?= $website ?>" class="apply-button sc_button sc_button_bordered sc_button_size_normal sc_button_icon_left color_style_link3">
                                            <span class="sc_button_text"><span class="sc_button_title">Visit Website</span></span>
                                        </a>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                <?php }  ?>
            </div>
        </div>
        <?php if ($style == 'partner-style-2') { ?>
            <div thumbsSlider="" class="swiper mySwiperPartnerThumbImages">
                <div class="swiper-wrapper">
                    <?php foreach ($partners as $partner) { ?>
                        <?php
                        $logo = carbon_get_post_meta($partner->ID, 'logo');
                        $alt_logo = carbon_get_post_meta($partner->ID, 'alt_logo');

                        $logo_val = $alt_logo ? $alt_logo : $logo;
                        ?>
                        <div class="swiper-slide">
                            <?php if ($logo) { ?>
                                <div class="image-box">
                                    <img src="<?= wp_get_attachment_image_url($logo_val, 'medium') ?>" alt="<?= $partner->post_title ?>">
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="swiper-pagination swiper-pagination-style"></div>
</div>
<?
