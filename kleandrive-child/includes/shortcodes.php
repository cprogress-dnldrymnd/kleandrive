<?php
function footer_cta_button()
{
    ob_start();
    if (is_home()) {
        $blog_page_id = get_option('page_for_posts');

        $overwrite_footer_cta = carbon_get_post_meta($blog_page_id, 'overwrite_footer_cta');
        $heading = carbon_get_post_meta($blog_page_id, 'heading');
        $button_text = carbon_get_post_meta($blog_page_id, 'button_text');
        $button_url = carbon_get_post_meta($blog_page_id, 'button_url');
        $target = carbon_get_post_meta($blog_page_id, 'target');
    } else {
        $overwrite_footer_cta = carbon_get_the_post_meta('overwrite_footer_cta');
        $heading = carbon_get_the_post_meta('heading');
        $button_text = carbon_get_the_post_meta('button_text');
        $button_url = carbon_get_the_post_meta('button_url');
        $target = carbon_get_the_post_meta('target');
    }

    $footer_cta_heading = carbon_get_theme_option('footer_cta_heading');
    $footer_cta_button_text = carbon_get_theme_option('footer_cta_button_text');
    $footer_cta_button_url = carbon_get_theme_option('footer_cta_button_url');
    $footer_cta_target = carbon_get_theme_option('footer_cta_target');


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


    if ($overwrite_footer_cta && $target) {
        $target_val = $target;
    } else {
        $target_val = $target;
    }

?>
    <div class="sc_item_button sc_button_wrap">
        <a href="/savings-calculator" class="sc_button sc_button_default sc_button_size_normal sc_button_icon_left color_style_dark">
            <span class="sc_button_text">
                <span class="sc_button_title">
                    SAVINGS CALCULATOR
                </span>
            </span>
        </a>
        <a target="<?= $target_val ?>" href="<?= $button_url_val ?>" class="sc_button sc_button_default sc_button_size_normal sc_button_icon_left color_style_dark">
            <span class="sc_button_text">
                <span class="sc_button_title">
                    <?= $button_text_val ?>
                </span>
            </span>
        </a>
    </div>
<?php
    return ob_get_clean();
}

add_shortcode('footer_cta_button', 'footer_cta_button');
