<?php

use Carbon_Fields\Container;
use Carbon_Fields\Complex_Container;
use Carbon_Fields\Field;

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
