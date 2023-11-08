<?php

/**
 * Child-Theme functions and definitions
 */

// Load rtl.css because it is not autoloaded from the child theme
if (!function_exists('planty_child_load_rtl')) {
	add_filter('wp_enqueue_scripts', 'planty_child_load_rtl', 3000);
	function planty_child_load_rtl()
	{

		wp_register_script('elementor-partner-widget-js', get_stylesheet_directory_uri() . '/includes/elementor-widgets/partners/partners-script.js');
		wp_register_script('elementor-swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js');
		wp_register_style('elementor-swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css');

		if (is_post_type_archive('careers') || is_tax('careers-category') || is_page_template('templates/page-template-process.php') || is_page_template('templates/page-savings-calculator.php')) {
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

function footer_cta()
{
	ob_start();
	get_template_part('template-parts/footer-cta');
	return ob_get_clean();
}

add_shortcode('footer_cta', 'footer_cta');

function action_planty_action_before_body()
{
	if (is_home()) {
		echo do_shortcode('[trx_sc_layouts layout="22919"]');
	}
}

add_action('planty_action_content_wrap_start', 'action_planty_action_before_body');



function append_query_string($url, $post, $leavename = false)
{
	if ($post->post_type == 'post') {
		$artilce_url = carbon_get_the_post_meta('artilce_url');
		if ($artilce_url) {
			$url = $artilce_url;
		} else {
			$url = add_query_arg('foo', 'bar', $url);
		}
	} else 	if ($post->post_type == 'cpt_team') {
		$url = "#";
	}
	return $url;
}
add_filter('post_link', 'append_query_string', 10, 3);


add_filter('manage_post_posts_columns', 'smashing_filter_posts_columns');
function smashing_filter_posts_columns($columns)
{
	$columns['artilce_url'] = __('Article URL');
	return $columns;
}

add_action('manage_post_posts_custom_column', 'smashing_post_column', 10, 2);
function smashing_post_column($column, $post_id)
{
	$artilce_url = '';
	if ('artilce_url' === $column) {
		$artilce_url = carbon_get_the_post_meta('artilce_url');
		if ($artilce_url) {
			echo '<strong>External URL</strong> <br>';
		}
		echo $artilce_url;
	}
}

function action_the_title($title, $id = null)
{
	if (get_post_type($id) == 'post' && !is_admin()) {
		$logo = carbon_get_the_post_meta('logo');

		if ($logo) {
			return $title . '<div class="blog-logo">' . wp_get_attachment_image($logo, 'medium') . '</div>';
		} else {
			return $title;
		}
	} else {
		return $title;
	}
}
add_filter('the_title', 'action_the_title', 10, 2);


add_filter('register_post_type_args', 'customize_team_post_type_labels', 10, 2);
function customize_team_post_type_labels($args, $post_type)
{
	// Let's make sure that we're customizing the post type we really need
	if ($post_type !== 'cpt_team') {
		return $args;
	}


	$args['publicly_queryable'] = false;
	$args['exclude_from_search'] = true;
	$args['show_in_nav_menus'] = false;

	return $args;
}


function action_wp_footer()
{
?>
	<script>
		jQuery(document).ready(function() {
			jQuery('.cpt_team .sc_team_item_link').removeAttr('href');
		});
	</script>
<?php
}

add_action('wp_footer', 'action_wp_footer');