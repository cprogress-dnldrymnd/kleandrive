<?php

function _get_taxonomy_terms($taxonomy)
{
    $terms = get_terms(
        array(
            'taxonomy'   => $taxonomy,
            'hide_empty' => false,
        )
    );

    $arr = array();

    foreach ($terms as $term) {
        $arr[$term->term_id] = $term->name;
    }

    return $arr
}
function register_new_widgets($widgets_manager)
{

    require_once(__DIR__ . '/elementor-widgets/partners/partners.php');

    $widgets_manager->register(new \Elementor_Partners());
}
add_action('elementor/widgets/register', 'register_new_widgets');
