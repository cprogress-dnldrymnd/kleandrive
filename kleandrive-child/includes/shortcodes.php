<?php
function footer_cta_heading()
{

    if (is_home()) {
        $blog_page_id = get_option('page_for_posts');
        $overwrite_footer_cta = carbon_get_post_meta($blog_page_id, 'overwrite_footer_cta');
        $heading = carbon_get_post_meta($blog_page_id, 'heading');
    } else {
        $overwrite_footer_cta = carbon_get_the_post_meta('overwrite_footer_cta');
        $heading = carbon_get_the_post_meta('heading');
    }

    $footer_cta_heading = carbon_get_theme_option('footer_cta_heading');


    if ($overwrite_footer_cta && $heading) {
        $heading_val = $heading;
    } else {
        $heading_val = $footer_cta_heading;
    }

    return $heading_val;
}

add_shortcode('footer_cta_heading', 'footer_cta_heading');
