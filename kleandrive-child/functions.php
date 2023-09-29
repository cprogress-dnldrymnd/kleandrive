<?php
/**
 * Child-Theme functions and definitions
 */

// Load rtl.css because it is not autoloaded from the child theme
if ( ! function_exists( 'planty_child_load_rtl' ) ) {
	add_filter( 'wp_enqueue_scripts', 'planty_child_load_rtl');
	function planty_child_load_rtl() {
		if ( is_rtl() ) {
			wp_enqueue_style( 'planty-style-rtl', get_template_directory_uri() . '/rtl.css' );
		}
	}
}

?>