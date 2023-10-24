<?php
if (get_current_user_id() == 1) {

    function register_new_widgets($widgets_manager)
    {

        require_once(get_stylesheet_directory_uri() . '/elementor-widgets/partners.php');

        $widgets_manager->register(new \Elementor_Partners());
    }
    add_action('elementor/widgets/register', 'register_new_widgets');
}
