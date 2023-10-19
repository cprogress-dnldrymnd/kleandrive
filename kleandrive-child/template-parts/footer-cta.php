<?php
$overwrite_footer_cta = carbon_get_the_post_meta('overwrite_footer_cta');
$heading = carbon_get_the_post_meta('heading');
$button_text = carbon_get_the_post_meta('button_text');
$button_url = carbon_get_the_post_meta('button_url');

$footer_cta_heading = carbon_get_theme_option('footer_cta_heading');
$footer_cta_button_text = carbon_get_theme_option('footer_cta_button_text');
$footer_cta_button_url = carbon_get_theme_option('footer_cta_button_url');


if ($overwrite_footer_cta && $heading) {
    $heading_val = $heading;
} else {
    $heading_val = $footer_cta_heading;
}

if ($overwrite_footer_cta && $button_text) {
    $button_text_val = $button_text;
} else {
    $button_text_val = $footer_cta_button_text;
}

if ($overwrite_footer_cta && $button_url) {
    $button_url_val = $button_url;
} else {
    $button_url_val = $footer_cta_button_url;
}
?>

<section class="footer-cta">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="heading-box">
                    <h2>
                        <?= $heading_val ?>
                    </h2>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sc_item_button sc_button_wrap">
                    <a href="<?= $button_url_val ?>" class="sc_button sc_button_default sc_button_size_normal sc_button_icon_left color_style_dark">
                        <span class="sc_button_text">
                            <span class="sc_button_title">
                                <?= $button_text_val ?>
                            </span>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>