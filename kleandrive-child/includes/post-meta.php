<?php

use Carbon_Fields\Container;
use Carbon_Fields\Complex_Container;
use Carbon_Fields\Field;


/*-----------------------------------------------------------------------------------*/
/* Footer Settings
/*-----------------------------------------------------------------------------------*/

Container::make('theme_options', __('Theme Settings'))
    ->add_tab('FOOTER CTA', array(
        Field::make('text', 'footer_cta_heading', 'Heading'),
        Field::make('text', 'footer_cta_button_text', 'Button Text'),
        Field::make('text', 'footer_cta_button_url', 'Button URL'),
    ));



/*-----------------------------------------------------------------------------------*/
/* Career Settings
/*-----------------------------------------------------------------------------------*/

Container::make('post_meta', __('Careers Details'))
    ->where('post_type', '=', 'careers')
    ->add_fields(array(
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
