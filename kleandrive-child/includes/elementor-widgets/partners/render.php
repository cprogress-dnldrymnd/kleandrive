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
    <?php if ($style != 'partner-style-3') { ?>
        <div class="partner-wrapper">
            <div class="swiper mySwiperPartner mySwiperPartnernoThumb">
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

                                    <?php if ($logo_val) { ?>
                                        <div class="image-box">
                                            <img src="<?= wp_get_attachment_image_url($logo_val, 'medium') ?>" alt="<?= $partner->post_title ?>">
                                        </div>
                                    <?php } ?>
                                    <?php $title = get_post_meta($partner->ID, 'trx_addons_options', true)['subtitle'] ?>
                                    <div class="name-box">
                                        <div class="name"><?= $partner->post_title ?></div>
                                        <div class="title"><?= $title ?></div>
                                    </div>

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
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="swiper-pagination swiper-pagination-style"></div>
    <?php } else { ?>
        <div class="partner-wrapper partner-wrapper-grid">
            <div class="swiper mySwiperPartnerGrid">
                <div class="swiper-wrapper">
                    <?php foreach ($partners as $partner) { ?>
                        <?php
                        $logo = get_post_thumbnail_id($partner->ID);
                        $alt_logo = carbon_get_post_meta($partner->ID, 'alt_logo');
                        $website = carbon_get_post_meta($partner->ID, 'website');
                        $partner_description = carbon_get_post_meta($partner->ID, 'partner_description');
                        $logo_val = $alt_logo ? $alt_logo : $logo;
                        ?>
                        <div class="swiper-slide">
                            <div class="column-holder">
                                <div class="top">
                                    <?php if ($logo_val) { ?>
                                        <div class="image-box">
                                            <img src="<?= wp_get_attachment_image_url($logo_val, 'medium') ?>" alt="<?= $partner->post_title ?>">
                                        </div>
                                    <?php } ?>
                                    <div class="heading-box">
                                        <h2><?= $partner->post_title ?></h2>
                                    </div>
                                    <div class="description-box">
                                        <?= wpautop($partner_description) ?>
                                    </div>

                                </div>
                                <div class="bottom">
                                    <?php if ($website) { ?>
                                        <div class="sc_item_button sc_button_wrap">
                                            <a target="_blank" href="<?= $website ?>" class="apply-button sc_button sc_button_bordered sc_button_size_normal sc_button_icon_left color_style_link3">
                                                <span class="sc_button_text"><span class="sc_button_title">Visit Website</span></span>
                                            </a>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="swiper-pagination swiper-pagination-style"></div>

            </div>
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    <?php } ?>

</div>
<?php if (\Elementor\Plugin::$instance->editor->is_edit_mode()) { ?>
    <script>
        const mySwiperPartnerGrid = new Swiper(".mySwiperPartnerGrid", {
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: true,
            },
            slidesPerView: 1,
            spaceBetween: 30,
            pagination: {
                el: ".swiper-pagination",
                clickable: true
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },

            breakpoints: {
                0: {
                    slidesPerView: 2,
                },

                992: {
                    slidesPerView: 3,
                },

            },
        });
    </script>
<?php } ?>