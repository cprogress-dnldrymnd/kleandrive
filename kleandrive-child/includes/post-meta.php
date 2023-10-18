<?php

use Carbon_Fields\Container;
use Carbon_Fields\Complex_Container;
use Carbon_Fields\Field;

/*-----------------------------------------------------------------------------------*/
/* Career Settings
/*-----------------------------------------------------------------------------------*/
Container::make('theme_options', __('Careers Settings'))
    ->set_page_parent('edit.php?post_type=careers')
    ->add_tab('General Settings', array(
        Field::make('text', 'careers_alt_title', 'Alt Title'),
        Field::make('textarea', 'careers_description', 'Description'),
    ))
    ->add_tab('Contact Form', array(
        Field::make('text',   'careers_contact_form_shortcode', 'Contact Form Shortcode'),
    ));


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
                    'accordion_title' => 'Responsibilites',
                ),
                array(
                    'accordion_title' => 'Requirements',
                ),
            ))
            ->set_header_template('<%- accordion_title  %>')
    ));
