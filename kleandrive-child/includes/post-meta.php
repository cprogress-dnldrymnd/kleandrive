<?php

use Carbon_Fields\Container;
use Carbon_Fields\Complex_Container;
use Carbon_Fields\Field;


/*-----------------------------------------------------------------------------------*/
/* Footer Settings
/*-----------------------------------------------------------------------------------*/

$theme_settings = Container::make('theme_options', __('Theme Settings'))
    ->add_tab('FOOTER CTA', array(
        Field::make('select', 'footer_cta_target', 'Target')
            ->set_options(array(
                '_self' => 'Same Window',
                '_blank' => 'New Tab',
            )),
        Field::make('text', 'footer_cta_heading', 'Heading'),
        Field::make('text', 'footer_cta_button_text', 'Button Text'),
        Field::make('text', 'footer_cta_button_url', 'Button URL'),
    ));


/*-----------------------------------------------------------------------------------*/
/* Savings Calculator
/*-----------------------------------------------------------------------------------*/

Container::make('theme_options', __('Savings Calculator'))
    ->set_page_parent($theme_settings)
    ->add_tab('Inputs', array(
        Field::make('html', 'style')->set_html('<style>.styled{background-color: #1d2327 !important; color: #fff !important}</style>'),
        Field::make('html', 'num_of_buses_html')->set_html('<h4>Number of buses to be Repowered</h4>')->set_classes('styled'),
        Field::make('text', 'num_of_buses_min', 'Min')->set_attribute( 'type', 'number' ),
        Field::make('text', 'num_of_buses_max', 'Max')->set_attribute( 'type', 'number' ),
        Field::make('textarea', 'num_of_buses_desc', 'Description'),
        Field::make('html', 'annual_average_distance_travel_html')->set_html('<h4>Annual average distance travelled per bus</h4>')->set_classes('styled'),
        Field::make('text', 'annual_average_distance_travel_min', 'Min')->set_attribute( 'type', 'number' ),
        Field::make('text', 'annual_average_distance_travel_min_max', 'Max')->set_attribute( 'type', 'number' ),
        Field::make('textarea', 'annual_average_distance_travel_desc', 'Description'),
        Field::make('html', 'average_remaining_life_html')->set_html('<h4>Average remaining life of the vehicles</h4>')->set_classes('styled'),
        Field::make('text', 'average_remaining_life_min', 'Min')->set_attribute( 'type', 'number' ),
        Field::make('text', 'average_remaining_life_min_max', 'Max')->set_attribute( 'type', 'number' ),
        Field::make('textarea', 'average_remaining_life_desc', 'Description'),
        Field::make('html', 'existing_vehicle_service_and_maintenance_cost_html')->set_html('<h4>Existing annual diesel vehicle service and maintenance cost</h4>')->set_classes('styled'),
        Field::make('text', 'existing_vehicle_service_and_maintenance_cost_min', 'Min')->set_attribute( 'type', 'number' ),
        Field::make('text', 'existing_vehicle_service_and_maintenance_cost_min_max', 'Max')->set_attribute( 'type', 'number' ),
        Field::make('textarea', 'existing_vehicle_service_and_maintenance_cost_desc', 'Description'),
    ))
    ->add_tab('Fuel Costs', array(
        Field::make('text', 'diesel', 'Diesel')->set_attribute( 'type', 'number' ),
        Field::make('text', 'electricity', 'Electricity ')->set_attribute( 'type', 'number' ),
    ))
    ->add_tab('Grant Funding', array(
        Field::make('select', 'elegible_for_bsog', 'Are you eleigible for the Bus Service Opertators Grant (BSOG)?')
            ->add_options(array(
                'yes' => __('Yes'),
                'no' => __('No'),
            )),
        Field::make('select', 'elegible_for_nsg', 'Are you eligible for Network Support Grant (Scotland)?')
            ->add_options(array(
                'yes' => __('Yes'),
                'no' => __('No'),
            )),
        Field::make('text', 'bsog_nsg_rate', 'Current Rate of BSOG/NSG ')->set_attribute( 'type', 'number' ),
        Field::make('text', 'bsog_nsg_rate_repowered', 'Rate of BSOG/NSG for repowered vehicle ')->set_attribute( 'type', 'number' ),

    ));


/*-----------------------------------------------------------------------------------*/
/* Career Settings
/*-----------------------------------------------------------------------------------*/

Container::make('post_meta', __('Careers Details'))
    ->where('post_type', '=', 'careers')
    ->add_fields(array(
        Field::make('text', 'location', 'Location'),
        Field::make('text', 'work_type', 'Work Type'),
        Field::make('text', 'salary', 'Salary'),
        Field::make('complex', 'accordion', 'Accordion')
            ->add_fields(array(
                Field::make('text', 'accordion_title', 'Accordion Title'),
                Field::make('rich_text', 'accordion_content', 'Accordion Content'),
            ))
            ->set_default_value(array(
                array(
                    'accordion_title' => 'Responsibilities',
                ),
                array(
                    'accordion_title' => 'Requirements',
                ),
            ))
            ->set_header_template('<%- accordion_title  %>')
    ));


/*-----------------------------------------------------------------------------------*/
/* Blog Settings
/*-----------------------------------------------------------------------------------*/
Container::make('post_meta', __('Blog Settings'))
    ->where('post_type', '=', 'post')
    ->set_context('side')
    ->set_priority('high')
    ->add_fields(array(
        Field::make('image', 'logo', 'Logo'),
        Field::make('text', 'artilce_url', 'Article URL'),

    ));



/*-----------------------------------------------------------------------------------*/
/* Footer Settings
/*-----------------------------------------------------------------------------------*/
Container::make('post_meta', __('Footer Settings'))
    ->where('post_type', '=', 'post')
    ->or_where('post_type', '=', 'page')
    ->or_where('post_type', '=', 'product')
    ->set_context('side')
    ->set_priority('high')
    ->add_fields(array(
        Field::make('checkbox', 'overwrite_footer_cta', 'Overwrite Footer CTA'),
        Field::make('select', 'target', 'Target')
            ->set_options(array(
                '_self' => 'Same Window',
                '_blank' => 'New Tab',
            )),
        Field::make('text', 'heading', 'Heading')
            ->set_conditional_logic(array(
                array(
                    'field' => 'overwrite_footer_cta',
                    'value' => true,
                )
            )),

        Field::make('text', 'button_text', 'Button Text')
            ->set_conditional_logic(array(
                array(
                    'field' => 'overwrite_footer_cta',
                    'value' => true,
                )
            )),
        Field::make('text', 'button_url', 'Button URL')
            ->set_conditional_logic(array(
                array(
                    'field' => 'overwrite_footer_cta',
                    'value' => true,
                )
            )),

    ));

/*-----------------------------------------------------------------------------------*/
/* Our Process Page Settings
/*-----------------------------------------------------------------------------------*/
Container::make('post_meta', __('Our Process Settings'))
    ->where('post_template', '=', 'templates/page-template-process.php')
    ->add_fields(array(
        Field::make('text', 'subtitle', 'Subtitle'),
        Field::make('textarea', 'description', 'Description'),
        Field::make('complex', 'process', 'Process')
            ->add_fields(array(
                Field::make('image', 'image', 'Image'),
                Field::make('text', 'stage', 'Stage'),
                Field::make('text', 'heading', 'Heading'),
                Field::make('rich_text', 'description', 'Description')->set_width(50),
                Field::make('rich_text', 'image_overlay_text', 'Image Overlay Text')->set_width(50),

            ))
            ->set_header_template('<%- heading  %>')
            ->set_layout('tabbed-vertical')
    ));



/*-----------------------------------------------------------------------------------*/
/* Our Process Page Settings
/*-----------------------------------------------------------------------------------*/
Container::make('post_meta', __('Settings'))
    ->or_where('post_type', '=', 'cpt_testimonials')
    ->add_fields(array(
        Field::make('text', 'website', 'Website'),
        Field::make('image', 'alt_logo', 'Alt Logo'),
        Field::make('textarea', 'partner_description', 'Partner Description(Optional)')
            ->set_help_text('Text to be display under partner description'),
    ));
