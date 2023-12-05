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
        Field::make('html', 'style')->set_html('<style>.styled{background-color: #1d2327 !important; color: #fff !important} .styled h4 { margin: 0 !important }</style>'),
        Field::make('html', 'num_of_buses_html')->set_html('<h4>Number of buses to be Repowered</h4>')->set_classes('styled'),
        Field::make('text', 'num_of_buses_min', 'Min')->set_attribute('type', 'number')->set_width(33),
        Field::make('text', 'num_of_buses_max', 'Max')->set_attribute('type', 'number')->set_width(33),
        Field::make('text', 'num_of_buses_start', 'Start')->set_attribute('type', 'number')->set_width(33),
        Field::make('textarea', 'num_of_buses_desc', 'Description'),
        Field::make('textarea', 'single_double_desc', 'Are they single or double deck buses Description'),


        Field::make('html', 'annual_average_distance_travel_html')->set_html('<h4>Annual average distance travelled per bus</h4>')->set_classes('styled'),
        Field::make('text', 'annual_average_distance_travel_min', 'Min')->set_attribute('type', 'number')->set_width(33),
        Field::make('text', 'annual_average_distance_travel_max', 'Max')->set_attribute('type', 'number')->set_width(33),
        Field::make('text', 'annual_average_distance_travel_start', 'Start')->set_attribute('type', 'number')->set_width(33),
        Field::make('textarea', 'annual_average_distance_travel_desc', 'Description')->set_width(33),

        Field::make('html', 'average_remaining_life_html')->set_html('<h4>Average remaining life of the vehicles</h4>')->set_classes('styled'),
        Field::make('text', 'average_remaining_life_min', 'Min')->set_attribute('type', 'number')->set_width(33),
        Field::make('text', 'average_remaining_life_max', 'Max')->set_attribute('type', 'number')->set_width(33),
        Field::make('text', 'average_remaining_life_start', 'Start')->set_attribute('type', 'number')->set_width(33),
        Field::make('textarea', 'average_remaining_life_desc', 'Description'),

        Field::make('html', 'existing_vehicle_service_and_maintenance_cost_html')->set_html('<h4>Existing annual diesel vehicle service and maintenance cost</h4>')->set_classes('styled'),
        Field::make('text', 'existing_vehicle_service_and_maintenance_cost_min', 'Min')->set_attribute('type', 'number')->set_width(33),
        Field::make('text', 'existing_vehicle_service_and_maintenance_cost_max', 'Max')->set_attribute('type', 'number')->set_width(33),
        Field::make('text', 'existing_vehicle_service_and_maintenance_cost_start', 'Start')->set_attribute('type', 'number')->set_width(33),
        Field::make('textarea', 'existing_vehicle_service_and_maintenance_cost_desc', 'Description'),

        Field::make('html', 'fuel_cots_html')->set_html('<h4>Fuel Costs</h4>')->set_classes('styled'),
        Field::make('text', 'diesel', 'Current cost of diesel £/litre default value')->set_attribute('type', 'number'),
        Field::make('textarea', 'diesel_description', 'Current cost of diesel Description'),
        Field::make('text', 'electricity', 'Cost of electricity £/kWh default value ')->set_attribute('type', 'number'),
        Field::make('textarea', 'electricity_description', 'Cost of electricity Description'),
    ))
    ->add_tab('Assumptions', array(
        Field::make('html', 'damage_cost_html')->set_html('<h4>Damage cost assumptions</h4>')->set_classes('styled'),
        Field::make('text', 'nox_road_transport', 'NOx Road Transport / tonne (£2022)')->set_attribute('type', 'number'),
        Field::make('text', 'particulate_matter_road_transport', 'Particulate Matter Road Transport PM2.5/ tonne (£2002)')->set_attribute('type', 'number'),

        Field::make('html', 'other_html')->set_html('<h4>Other assumptions</h4>')->set_classes('styled'),
        Field::make('text', 'blended_average_co2_saving_dd', 'Blended average CO2 saving per 1 DD vehicle/ km (g)')->set_attribute('type', 'number'),
        Field::make('text', 'blended_average_nox_saving_dd', 'Blended average NOx saving per 1 DD vehicle/ km (g)')->set_attribute('type', 'number'),
        Field::make('text', 'blended_average_pm_saving_dd', 'Blended average PM saving per 1 DD vehicle/ km (g)')->set_attribute('type', 'number'),
        Field::make('text', 'blended_average_co2_saving_sd', 'Blended average CO2 saving per 1 SD vehicle/ km (g)')->set_attribute('type', 'number'),
        Field::make('text', 'blended_average_nox_saving_sd', 'Blended average NOx saving per 1 SD vehicle/ km (g)')->set_attribute('type', 'number'),
        Field::make('text', 'blended_average_pm_saving_pm', 'Blended average PM saving per 1 SD vehicle/ km (g)')->set_attribute('type', 'number'),
        Field::make('text', 'incremental_co2_benefit_sd', 'Incremental CO2 benefit vs New SD BEV per 1 vehicle/ km (g)')->set_attribute('type', 'number'),
        Field::make('text', 'incremental_co2_benefit_dd', 'Incremental CO2 benefit vs New DD BEV per 1 vehicle/ km (g)')->set_attribute('type', 'number'),
        Field::make('text', 'incremental_single_captial_cost_savings', 'Incremental single captial cost savings (new bev cost - repower)')->set_attribute('type', 'number'),
        Field::make('text', 'incremental_double_captial_cost_savings', 'Incremental double capital cost savings (new bev cost - repower)')->set_attribute('type', 'number'),
    ))
    ->add_tab('Diesel/Electric', array(
        Field::make('html', 'diesel_html')->set_html('<h4>Diesel</h4>')->set_classes('styled'),
        Field::make('text', 'double_deck_bus_diese', 'doubl – 6 MPG (47.1 litres/100km)')->set_attribute('type', 'number'),
        Field::make('text', 'single_deck_bus_diesel', 'Single Deck Bus – 8 MPG (47.1 litres/100km)')->set_attribute('type', 'number'),
        Field::make('text', 'bsog_nsg_rate', 'BSOG rate England ')->set_attribute('type', 'number'),

        Field::make('html', 'electric_html')->set_html('<h4>Electric</h4>')->set_classes('styled'),
        Field::make('text', 'dd_battery_electric_energy_consumption', 'DD Battery Electric Energy Consumption (kWh/km)')->set_attribute('type', 'number'),
        Field::make('text', 'sd_battery_electric_energy_consumption', 'SD Battery Electric Energy Consumption (kWh/km)')->set_attribute('type', 'number'),
        Field::make('text', 'bsog_nsg_rate_repowered', 'BSOG rate England ')->set_attribute('type', 'number'),



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
