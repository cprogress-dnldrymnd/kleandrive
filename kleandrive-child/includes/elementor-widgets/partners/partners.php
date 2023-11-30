<?php
class Elementor_Partners extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'widget_name';
    }

    public function get_title()
    {
        return esc_html__('Partners', 'textdomain');
    }

    public function get_icon()
    {
        return 'eicon-code';
    }

    public function get_custom_help_url()
    {
        return 'https://go.elementor.com/widget-name';
    }

    public function get_categories()
    {
        return ['basic'];
    }

    public function get_keywords()
    {
        return ['partners'];
    }


    protected function register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Partners', 'elementor-oembed-widget'),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'important_note',
            [
                'label'           => esc_html__('', 'textdomain'),
                'type'            => \Elementor\Controls_Manager::RAW_HTML,
                'raw'             => esc_html__('This widget will display partners/testimonials', 'textdomain'),
                'content_classes' => '',
            ]
        );

        $this->add_control(
            'style',
            [
                'label'   => esc_html__('Style', 'textdomain'),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'partner-style-1',
                'options' => [
                    'partner-style-1' => esc_html__('Style 1(Slider)', 'textdomain'),
                    'partner-style-2' => esc_html__('Style 2(Slider)', 'textdomain'),
                    'partner-style-3' => esc_html__('Style 3(Grid)', 'textdomain'),
                ],
            ]
        );

        $this->add_control(
            'group',
            [
                'label'     => esc_html__('Group', 'textdomain'),
                'type'      => \Elementor\Controls_Manager::SELECT,
                'default'   => 'solid',
                'options'   => _get_taxonomy_terms('cpt_testimonials_group'),
                'selectors' => [
                    '{{WRAPPER}} .your-class' => 'border-style: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render oEmbed widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();

        include(__DIR__ . '/render.php');
    }
    public function get_style_depends()
    {
        return ['elementor-swiper-css'];
    }
    public function get_script_depends()
    {
        return ['elementor-swiper-js', 'elementor-partner-widget-js'];
    }
}
