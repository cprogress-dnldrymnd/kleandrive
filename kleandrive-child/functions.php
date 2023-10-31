<?php

/**
 * Child-Theme functions and definitions
 */

// Load rtl.css because it is not autoloaded from the child theme
if (!function_exists('planty_child_load_rtl')) {
	add_filter('wp_enqueue_scripts', 'planty_child_load_rtl', 3000);
	function planty_child_load_rtl()
	{

		wp_register_script( 'elementor-partner-widget-js', get_stylesheet_directory_uri().'/includes/elementor-widgets/partners/partners-script.js' );
		wp_register_script( 'elementor-swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js' );
		wp_register_style( 'elementor-swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css' );
		
		if (is_post_type_archive('careers') || is_tax('careers-category') || is_page_template('templates/page-template-process.php') ) {
			wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css');
			wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js');
		}
		if (is_rtl()) {
			wp_enqueue_style('planty-style-rtl', get_template_directory_uri() . '/rtl.css');
		}
	}
}
/*-----------------------------------------------------------------------------------*/
/* Register Carbofields
/*-----------------------------------------------------------------------------------*/
add_action('carbon_fields_register_fields', 'tissue_paper_register_custom_fields');
function tissue_paper_register_custom_fields()
{
	require_once('includes/post-meta.php');
}


require_once('includes/post-types.php');
require_once('includes/elementor.php');

function _get_terms_details($taxonomy, $hide_empty = false, $order = false)
{
	$args = array(
		'taxonomy' => $taxonomy,
		'hide_empty' => $hide_empty,
	);
	if ($order) {
		$args['meta_key'] = '_order';
		$args['orderby'] = '_order';
	}
	$terms = get_terms($args);

	if (!$terms) return;
	$term_array = array();
	foreach ($terms as $term) {
		$term_array[$term->term_id] = array(
			'name' => $term->name,
			'short_description' => carbon_get_term_meta($term->term_id, 'short_description'),
			'icon' => carbon_get_term_meta($term->term_id, 'icon'),
		);
	}
	return $term_array;
}

function footer_cta() {
	ob_start();
	get_template_part('template-parts/footer-cta');
	return ob_get_clean();
}

add_shortcode('footer_cta', 'footer_cta');

function action_planty_action_before_body() {
	echo 'test';
}

add_action('planty_action_before_body', 'planty_action_page_content_start_text');