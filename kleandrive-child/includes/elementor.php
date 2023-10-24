<?php
function register_new_widgets( $widgets_manager ) {

	require_once( get_stylesheet_directory_uri(). '/elementor-widgets/partners.php' );

	$widgets_manager->register( new \Elementor_Partners() );

}
add_action( 'elementor/widgets/register', 'register_new_widgets' );


class Elementor_Partners extends \Elementor\Widget_Base {

	public function get_name() {
		return 'widget_name';
	}

	public function get_title() {
		return esc_html__( 'My Widget Name', 'textdomain' );
	}

	public function get_icon() {
		return 'eicon-code';
	}

	public function get_custom_help_url() {
		return 'https://go.elementor.com/widget-name';
	}

	public function get_categories() {
		return [ 'kleandrive' ];
	}

	public function get_keywords() {
		return [ 'partners' ];
	}

}