<?php
if (get_current_user_id() == 1) {

    function register_new_widgets($widgets_manager)
    {

        require_once( __DIR__  . '/elementor-widgets/partners/partners.php');

        $widgets_manager->register(new \Elementor_Partners());
    }
    add_action('elementor/widgets/register', 'register_new_widgets');
}
