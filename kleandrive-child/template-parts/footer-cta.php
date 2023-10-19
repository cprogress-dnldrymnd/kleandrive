<?php
$overwrite_footer_cta = carbon_get_the_post_meta('overwrite_footer_cta');
$heading = carbon_get_the_post_meta('heading');
$button_text = carbon_get_the_post_meta('button_text');
$button_url = carbon_get_the_post_meta('button_url');

$footer_cta_heading = carbon_get_theme_option('footer_cta_heading');
$footer_cta_button_text = carbon_get_theme_option('footer_cta_button_text');
$footer_cta_button_url = carbon_get_theme_option('footer_cta_button_url');
?>

<section class="footer-cta">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="heading-box">
                    <h2>
                        <?php
                        if ($overwrite_footer_cta && $heading) {
                            echo $heading;
                        } else {
                            echo $footer_cta_heading;
                        }
                        ?>
                    </h2>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sc_item_button sc_button_wrap">
                    <a href="#" class="sc_button sc_button_default sc_button_size_normal sc_button_icon_left color_style_dark">
                        <span class="sc_button_text">
                            <span class="sc_button_title">
                                <?php
                                if ($overwrite_footer_cta && $button_text) {
                                    echo $button_text;
                                } else {
                                    echo $footer_cta_button_text;
                                }
                                ?>
                            </span>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>