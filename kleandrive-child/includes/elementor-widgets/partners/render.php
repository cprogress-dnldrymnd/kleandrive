<?php
$style = $settings['style'];
$group = $settings['group'];

$args = array(
    'numberposts' => -1,
    'post_type'   => 'cpt_testimonials',
);

if ($group) {
    $args['tax_query'] = array(
        array(
            'taxonomy' => 'cpt_testimonials_group',
            'field'    => 'term_id',
            'terms'    => $group
        )
    );
}
$partners = get_posts($args);
?>
<div class="partner-slider <?= $style ?>">
    <div class="partner-wrapper">


        <div
            class="swiper mySwiperPartner <?= $style == 'partner-style-2' ? 'mySwiperPartnerThumb' : 'mySwiperPartnernoThumb' ?>">
            <div class="swiper-wrapper">
                <?php foreach ($partners as $partner) { ?>
                    <?php
                    $logo = get_post_thumbnail_id($partner->ID);
                    $alt_logo = carbon_get_post_meta($partner->ID, 'alt_logo');
                    $website = carbon_get_post_meta($partner->ID, 'website');
                    $logo_val = $alt_logo ? $alt_logo : $logo;

                    ?>
                    <div class="swiper-slide">
                        <div class="inner">
                            <?php
                            echo '<pre>';
                            var_dump(get_post_meta($partner->ID, 'trx_addons_options', true));
                            echo '</pre>';
                            ?>
                            <?php if ($style == 'partner-style-2') { ?>
                                <?php if ($logo_val) { ?>
                                    <div class="image image-mobile-only">
                                        <img src="<?= wp_get_attachment_image_url($logo_val, 'medium') ?>"
                                            alt="<?= $partner->post_title ?>">
                                    </div>
                                <?php } ?>
                            <?php } ?>
                            <div class="description-box">
                                <?= $partner->post_content ?>
                            </div>

                            <?php if ($style == 'partner-style-1') { ?>
                                <div class="logo-box">
                                    <?php if ($logo) { ?>
                                        <div class="image">
                                            <img src="<?= wp_get_attachment_image_url($logo, 'medium') ?>"
                                                alt="<?= $partner->post_title ?>">
                                        </div>
                                    <?php } ?>

                                    <div class="title-holder">
                                        <div class="title"><?= $partner->post_title ?></div>
                                        <?php if ($website) { ?>
                                            <a target="_blank" href="<?= $website ?>" class="website"><?= $website ?></a>
                                        <?php } ?>

                                    </div>
                                </div>
                            <?php }
                            else { ?>
                                <?php if ($website) { ?>
                                    <div class="sc_item_button sc_button_wrap">
                                        <a target="_blank" href="<?= $website ?>"
                                            class="apply-button sc_button sc_button_bordered sc_button_size_normal sc_button_icon_left color_style_link3">
                                            <span class="sc_button_text"><span class="sc_button_title">Visit Website</span></span>
                                        </a>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php if ($style == 'partner-style-2') { ?>
            <div class="mySwiperPartnerThumbImages-Holder">
                <div thumbsSlider="" class="swiper mySwiperPartnerThumbImages">
                    <div class="swiper-wrapper">
                        <?php foreach ($partners as $partner) { ?>
                            <?php
                            $logo = get_post_thumbnail_id($partner->ID);
                            $alt_logo = carbon_get_post_meta($partner->ID, 'alt_logo');

                            $logo_val = $alt_logo ? $alt_logo : $logo;
                            ?>
                            <div class="swiper-slide">
                                <?php if ($logo) { ?>
                                    <div class="image-box">
                                        <img src="<?= wp_get_attachment_image_url($logo_val, 'medium') ?>"
                                            alt="<?= $partner->post_title ?>">
                                    </div>
                                <?php }
                                else { ?>
                                    <?php $title = get_post_meta($partner->ID, 'trx_addons_options_field_subtitle', true); ?>
                                    <div class="name-box">
                                        <div class="name"><?= $partner->post_title ?></div>
                                        <div class="title"><?= $title ?></div>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="swiper-pagination swiper-pagination-style"></div>
</div>
<?
