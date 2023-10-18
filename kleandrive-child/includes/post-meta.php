<?php

use Carbon_Fields\Container;
use Carbon_Fields\Complex_Container;
use Carbon_Fields\Field;

class PostMeta extends GetData
{
	function _field($type, $id, $label)
	{
		return Field::make($type, $id, __($label));
	}
	function _text($id, $label)
	{
		return Field::make('text', $id, __($label));
	}
	function _number($id, $label)
	{
		return Field::make('text', $id, __($label))->set_attribute('type', 'number');
	}
	function _textarea($id, $label)
	{
		return Field::make('textarea', $id, __($label));
	}
	function _rich_text($id, $label)
	{
		return Field::make('rich_text', $id, __($label));
	}
	function _file($id, $label)
	{
		return Field::make('file', $id, __($label));
	}
	function _image($id = 'image', $label = 'Image')
	{
		return Field::make('image', $id, __($label));
	}
	function _media_gallery($id = 'image_gallery', $label = 'Images')
	{
		return Field::make('media_gallery', $id, __($label))
			->set_duplicates_allowed(true)
			->set_type(array('image'));
	}
	function _complex($id, $label, $layout = 'tabbed-vertical')
	{
		return Field::make('complex', $id, __($label))
			->set_layout($layout);
	}
	function _checkbox($id, $label)
	{
		return Field::make('checkbox', $id, __($label));
	}
	function _documentation()
	{
		ob_start();
		get_template_part('admin/documentation');
		return ob_get_clean();
	}
	function _button($id, $separator = '')
	{
		$link_type = array(
			'' => 'None',
			'page_button' => 'Page',
			'post_button' => 'Post',
			'usecases_button' => 'Use Case',
			'casestudies_button' => 'Case Study',
			'custom_button' => 'Custom',
		);

		$buttons = array(
			$this->_select($id . '_button_type', 'Button Type', $link_type)
				->set_width(25),
			$this->_text($id . '_button_text', 'Button Text')
				->set_help_text('Leave blank to use post title. Does not work with custom button')
				->set_width(25)
				->set_conditional_logic(array(
					array(
						'field' => $id . '_button_type',
						'value' => array('page_button', 'post_button', 'usecases_button', 'casestudies_button', 'custom_button'),
						'compare' => 'IN'
					)
				)),
			$this->_select($id . '_page_button', 'Page Link', $this->get_posts('page'))
				->set_width(25)
				->set_conditional_logic(array(
					array(
						'field' => $id . '_button_type',
						'value' => 'page_button',
					)
				)),
			$this->_select($id . '_post_button', 'Post Link', $this->get_posts('post'))
				->set_width(25)
				->set_conditional_logic(array(
					array(
						'field' => $id . '_button_type',
						'value' => 'post_button',
					)
				)),
			$this->_select($id . '_usecases_button', 'Use Case Link', $this->get_posts('usecases'))
				->set_width(25)
				->set_conditional_logic(array(
					array(
						'field' => $id . '_button_type',
						'value' => 'usecases_button',
					)
				)),
			$this->_select($id . '_casestudies_button', 'Case Study Link', $this->get_posts('casestudies'))
				->set_width(25)
				->set_conditional_logic(array(
					array(
						'field' => $id . '_button_type',
						'value' => 'casestudies_button',
					)
				)),
			$this->_text($id . '_custom_button', 'Custom Link')
				->set_width(25)
				->set_conditional_logic(array(
					array(
						'field' => $id . '_button_type',
						'value' => 'custom_button',
					)
				)),
			$this->_select($id . '_button_action', 'Button Action', array(
				'' => 'Same Window',
				'target="_blank"' => 'New Tab',
			))
				->set_width(25)
				->set_conditional_logic(array(
					array(
						'field' => $id . '_button_type',
						'value' => array('page_button', 'post_button', 'service_button', 'custom_button'),
						'compare' => 'IN'
					)
				)),
		);

		if ($separator) {
			return array_merge(array($this->_seperator($id . '_sep', $separator)), $buttons);
		} else {
			return $buttons;
		}
	}

	function _button_2($id, $separator = '')
	{
		$link_type = array(
			'' => 'None',
			'page_button' => 'Page',
			'post_button' => 'Post',
			'usecases_button' => 'Use Case',
			'casestudies_button' => 'Case Study',
			'custom_button' => 'Custom',
		);

		$buttons = array(
			$this->_select($id . '_button_type', 'Button Type', $link_type),
			$this->_text($id . '_button_text', 'Button Text')
				->set_help_text('Leave blank to use post title. Does not work with custom button')
				->set_conditional_logic(array(
					array(
						'field' => $id . '_button_type',
						'value' => array('page_button', 'post_button', 'usecases_button', 'casestudies_button', 'custom_button'),
						'compare' => 'IN'
					)
				)),
			$this->_select($id . '_page_button', 'Page Link', $this->get_posts('page'))
				->set_conditional_logic(array(
					array(
						'field' => $id . '_button_type',
						'value' => 'page_button',
					)
				)),
			$this->_select($id . '_post_button', 'Post Link', $this->get_posts('post'))
				->set_conditional_logic(array(
					array(
						'field' => $id . '_button_type',
						'value' => 'post_button',
					)
				)),
			$this->_select($id . '_usecases_button', 'Use Case Link', $this->get_posts('usecases'))
				->set_width(25)
				->set_conditional_logic(array(
					array(
						'field' => $id . '_button_type',
						'value' => 'usecases_button',
					)
				)),
			$this->_select($id . '_casestudies_button', 'Case Study Link', $this->get_posts('casestudies'))
				->set_width(25)
				->set_conditional_logic(array(
					array(
						'field' => $id . '_button_type',
						'value' => 'casestudies_button',
					)
				)),
			$this->_text($id . '_custom_button', 'Custom Link')
				->set_conditional_logic(array(
					array(
						'field' => $id . '_button_type',
						'value' => 'custom_button',
					)
				)),
			$this->_select($id . '_button_action', 'Button Action', array(
				'' => 'Same Window',
				'target="_blank"' => 'New Tab',
			))
				->set_conditional_logic(array(
					array(
						'field' => $id . '_button_type',
						'value' => array('page_button', 'post_button', 'service_button', 'custom_button'),
						'compare' => 'IN'
					)
				)),
		);

		if ($separator) {
			return array_merge(array($this->_seperator($id . '_sep', $separator)), $buttons);
		} else {
			return $buttons;
		}
	}
	function _select($id, $label, $options)
	{
		return Field::make('select', $id, __($label))
			->set_options($options);
	}
	function _radio($id, $label, $options)
	{
		return Field::make('radio', $id, __($label))
			->set_options($options);
	}
	function _color($id, $label)
	{
		return Field::make('color', $id, __($label));
	}
	function _html($id = 'html', $html = 'Please put htlm content')
	{
		return Field::make('html', $id)
			->set_html($html);
	}

	function _seperator($id = 'html', $html = 'Please put htlm content')
	{
		return Field::make('html', $id)
			->set_html('<label>' . $html . '</label>')
			->set_classes('seperator ');
	}

	function _contact_form($id = 'contact_form', $label = 'Contact Form')
	{
		return Field::make('select', $id, __($label))
			->set_options($this->get_contact_forms());
	}

	function after_banner_fields()
	{
		$after_banner = carbon_get_theme_option('after_banner');
		$after_banner_container_fields = array();
		foreach ($after_banner as $after_banner_template) {
			$after_banner_container_fields[] = $this->_checkbox('hide_after_header_' . $after_banner_template['template'], 'Hide ' . get_the_title($after_banner_template['template']));
		}
		return $after_banner_container_fields;
	}

	function before_footer_fields()
	{
		$after_banner = carbon_get_theme_option('before_footer');
		$after_banner_container_fields = array();
		foreach ($after_banner as $after_banner_template) {
			$after_banner_container_fields[] = $this->_checkbox('hide_before_footer_' . $after_banner_template['template'], 'Hide ' . get_the_title($after_banner_template['template']));
		}
		return $after_banner_container_fields;
	}

	function post_settings_general_settings($post_type)
	{
		return array(
			$this->_text($post_type . '_alt_title', 'Alt Title'),
			$this->_textarea($post_type . '_description', 'Description'),
		);
	}

	function documentation()
	{
		ob_start();
		get_template_part('admin/documentation');
		return ob_get_clean();
	}
}

/*-----------------------------------------------------------------------------------*/
/* Career Settings
/*-----------------------------------------------------------------------------------*/
Container::make('theme_options', __('Careers Settings'))
	->set_page_parent('edit.php?post_type=careers')
	->add_tab('General Settings', $PostMeta->post_settings_general_settings('careers'))
	->add_tab('Contact Form', array(
		$PostMeta->_contact_form('careers_contact_form', 'Contact Form')
	));


Container::make('post_meta', __('Careers Details'))
	->where('post_type', '=', 'careers')
	->add_fields(array(
		$PostMeta->_text('salary', 'Salary'),
		$PostMeta->_complex('accordion', 'Accordion')
			->add_fields(array(
				$PostMeta->_text('accordion_title', 'Accordion Title'),
				$PostMeta->_rich_text('accordion_content', 'Accordion Content'),
			))
			->set_default_value(array(
				array(
					'accordion_title' => 'Responsibilites',
				),
				array(
					'accordion_title' => 'Knowledge & Experience',
				),
			))
			->set_header_template('<%- accordion_title  %>')
	));

