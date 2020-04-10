<?php
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_sections',
		'title' => 'Sections',
		'fields' => array (
			array (
				'key' => 'field_533b804e6a16a',
				'label' => 'Template Sections',
				'name' => 'template_sections',
				'type' => 'flexible_content',
				'layouts' => array (
					array (
						'label' => 'Column Section',
						'name' => 'column_section',
						'display' => 'row',
						'min' => '',
						'max' => '',
						'sub_fields' => array (
							array (
								'key' => 'field_533b8e4341343',
								'label' => 'Variables',
								'name' => 'variables',
								'type' => 'checkbox',
								'column_width' => '',
								'choices' => array (
									'class' => 'Use Custom Class',
									'anchor' => 'Use Anchor',
									'color' => 'Set BG Color',
									'text' => 'Text Color',
									'padding' => 'Set Padding',
									'heading' => 'Section Heading',
								),
								'default_value' => '',
								'layout' => 'horizontal',
							),
							array (
								'key' => 'field_533b90df4f080',
								'label' => 'Custom Class',
								'name' => 'custom_class',
								'type' => 'text',
								'conditional_logic' => array (
									'status' => 1,
									'rules' => array (
										array (
											'field' => 'field_533b8e4341343',
											'operator' => '==',
											'value' => 'class',
										),
									),
									'allorany' => 'all',
								),
								'column_width' => '',
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'formatting' => 'html',
								'maxlength' => '',
							),
							array (
								'key' => 'field_533b91034f081',
								'label' => 'Anchor',
								'name' => 'anchor',
								'type' => 'text',
								'conditional_logic' => array (
									'status' => 1,
									'rules' => array (
										array (
											'field' => 'field_533b8e4341343',
											'operator' => '==',
											'value' => 'anchor',
										),
									),
									'allorany' => 'all',
								),
								'column_width' => '',
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'formatting' => 'html',
								'maxlength' => '',
							),
							array (
								'key' => 'field_533b91484f082',
								'label' => 'Background Color',
								'name' => 'background_color',
								'type' => 'select',
								'conditional_logic' => array (
									'status' => 1,
									'rules' => array (
										array (
											'field' => 'field_533b8e4341343',
											'operator' => '==',
											'value' => 'color',
										),
									),
									'allorany' => 'all',
								),
								'column_width' => '',
								'choices' => array (
									'white_bg' => 'White',
									'blue_bg' => 'Blue',
									'red_bg' => 'Red',
									'custom_bg' => 'Custom',
								),
								'default_value' => '',
								'allow_null' => 0,
								'multiple' => 0,
							),
							array (
								'key' => 'field_533b92104f086',
								'label' => 'Custom Background Color',
								'name' => 'custom_bg',
								'type' => 'color_picker',
								'conditional_logic' => array (
									'status' => 1,
									'rules' => array (
										array (
											'field' => 'field_533b91484f082',
											'operator' => '==',
											'value' => 'custom_bg',
										),
									),
									'allorany' => 'all',
								),
								'column_width' => '',
								'default_value' => '',
							),
							array (
								'key' => 'field_533b991ddd119',
								'label' => 'Text Color',
								'name' => 'text_color',
								'type' => 'select',
								'conditional_logic' => array (
									'status' => 1,
									'rules' => array (
										array (
											'field' => 'field_533b8e4341343',
											'operator' => '==',
											'value' => 'text',
										),
									),
									'allorany' => 'all',
								),
								'column_width' => '',
								'choices' => array (
									'text-default' => 'Default',
									'text-white' => 'White',
									'text-black' => 'Black',
								),
								'default_value' => 'text-default',
								'allow_null' => 0,
								'multiple' => 0,
							),
							array (
								'key' => 'field_533b91b54f083',
								'label' => 'Padding Top',
								'name' => 'padding_top',
								'type' => 'number',
								'conditional_logic' => array (
									'status' => 1,
									'rules' => array (
										array (
											'field' => 'field_533b8e4341343',
											'operator' => '==',
											'value' => 'padding',
										),
									),
									'allorany' => 'all',
								),
								'column_width' => '',
								'default_value' => 20,
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'min' => '',
								'max' => '',
								'step' => '',
							),
							array (
								'key' => 'field_533b9d1bd0e76',
								'label' => 'Padding Bottom',
								'name' => 'padding_bottom',
								'type' => 'number',
								'conditional_logic' => array (
									'status' => 1,
									'rules' => array (
										array (
											'field' => 'field_533b8e4341343',
											'operator' => '==',
											'value' => 'padding',
										),
									),
									'allorany' => 'all',
								),
								'column_width' => '',
								'default_value' => 20,
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'min' => '',
								'max' => '',
								'step' => '',
							),
							array (
								'key' => 'field_533b80616a16b',
								'label' => 'Section Heading',
								'name' => 'section_heading',
								'type' => 'text',
								'conditional_logic' => array (
									'status' => 1,
									'rules' => array (
										array (
											'field' => 'field_533b8e4341343',
											'operator' => '==',
											'value' => 'heading',
										),
									),
									'allorany' => 'all',
								),
								'column_width' => '',
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'formatting' => 'html',
								'maxlength' => '',
							),
							array (
								'key' => 'field_533b81d45d189',
								'label' => 'Number of Columns',
								'name' => 'number_columns',
								'type' => 'select',
								'required' => 1,
								'column_width' => '',
								'choices' => array (
									'one_column' => 'One Column',
									'two_column' => 'Two Columns',
									'three_column' => 'Three Columns',
									'four_column' => 'Four Columns',
									'five_column' => 'Five Columns',
									'six_column' => 'Six Columns',
									'seven_column' => 'Seven Columns',
									'eight_column' => 'Eight Columns',
								),
								'default_value' => '',
								'allow_null' => 0,
								'multiple' => 0,
							),
							array (
								'key' => 'field_533b80686a16c',
								'label' => 'Columns',
								'name' => 'columns',
								'type' => 'repeater',
								'column_width' => '',
								'sub_fields' => array (
									array (
										'key' => 'field_533b80716a16d',
										'label' => 'Column Content',
										'name' => 'column',
										'type' => 'wysiwyg',
										'column_width' => '',
										'default_value' => '',
										'toolbar' => 'full',
										'media_upload' => 'yes',
									),
								),
								'row_min' => 1,
								'row_limit' => '',
								'layout' => 'table',
								'button_label' => 'Add Column',
							),
							array (
								'key' => 'field_534cbbd29f5e9',
								'label' => 'Image Layout',
								'name' => 'image_layout',
								'type' => 'select',
								'column_width' => '',
								'choices' => array (
									'full_image' => 'Background Image',
									'image_left' => 'Image Left',
									'image_right' => 'Image Right',
								),
								'default_value' => 'full_image',
								'allow_null' => 0,
								'multiple' => 0,
							),
						),
					),
					array (
						'label' => 'Graphic Section',
						'name' => 'graphic_section',
						'display' => 'row',
						'min' => '',
						'max' => '',
						'sub_fields' => array (
							array (
								'key' => 'field_534ca990f6dfd',
								'label' => 'Variables',
								'name' => 'variables',
								'type' => 'checkbox',
								'column_width' => '',
								'choices' => array (
									'class' => 'Use Custom Class',
									'anchor' => 'Use Anchor',
									'color' => 'Set BG Color',
									'image' => 'Set BG Image',
									'text' => 'Text Color',
									'padding' => 'Set Padding',
									'heading' => 'Section Heading',
								),
								'default_value' => '',
								'layout' => 'horizontal',
							),
							array (
								'key' => 'field_534ca990f6dfe',
								'label' => 'Custom Class',
								'name' => 'custom_class',
								'type' => 'text',
								'conditional_logic' => array (
									'status' => 1,
									'rules' => array (
										array (
											'field' => 'field_534ca990f6dfd',
											'operator' => '==',
											'value' => 'class',
										),
									),
									'allorany' => 'all',
								),
								'column_width' => '',
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'formatting' => 'html',
								'maxlength' => '',
							),
							array (
								'key' => 'field_534ca990f6dff',
								'label' => 'Anchor',
								'name' => 'anchor',
								'type' => 'text',
								'conditional_logic' => array (
									'status' => 1,
									'rules' => array (
										array (
											'field' => 'field_534ca990f6dfd',
											'operator' => '==',
											'value' => 'anchor',
										),
									),
									'allorany' => 'all',
								),
								'column_width' => '',
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'formatting' => 'html',
								'maxlength' => '',
							),
							array (
								'key' => 'field_534ca990f6e00',
								'label' => 'Background Color',
								'name' => 'background_color',
								'type' => 'select',
								'conditional_logic' => array (
									'status' => 1,
									'rules' => array (
										array (
											'field' => 'field_534ca990f6dfd',
											'operator' => '==',
											'value' => 'color',
										),
									),
									'allorany' => 'all',
								),
								'column_width' => '',
								'choices' => array (
									'white_bg' => 'White',
									'blue_bg' => 'Blue',
									'red_bg' => 'Red',
									'custom_bg' => 'Custom',
								),
								'default_value' => '',
								'allow_null' => 0,
								'multiple' => 0,
							),
							array (
								'key' => 'field_534ca990f6e01',
								'label' => 'Custom Background Color',
								'name' => 'custom_bg',
								'type' => 'color_picker',
								'conditional_logic' => array (
									'status' => 1,
									'rules' => array (
										array (
											'field' => 'field_534ca990f6e00',
											'operator' => '==',
											'value' => 'custom_bg',
										),
									),
									'allorany' => 'all',
								),
								'column_width' => '',
								'default_value' => '',
							),
							array (
								'key' => 'field_534cbc8ca86fb',
								'label' => 'Image Layout',
								'name' => 'image_layout',
								'type' => 'select',
								'conditional_logic' => array (
									'status' => 1,
									'rules' => array (
										array (
											'field' => 'field_534ca990f6dfd',
											'operator' => '==',
											'value' => 'image',
										),
									),
									'allorany' => 'all',
								),
								'column_width' => '',
								'choices' => array (
									'full_image' => 'Full Background Image',
									'image_left' => 'Left Background Image',
									'image_right' => 'Right Background Image',
								),
								'default_value' => '',
								'allow_null' => 0,
								'multiple' => 0,
							),
							array (
								'key' => 'field_534ca9cff6e09',
								'label' => 'Background Image',
								'name' => 'background_image',
								'type' => 'image',
								'conditional_logic' => array (
									'status' => 1,
									'rules' => array (
										array (
											'field' => 'field_534cbc8ca86fb',
											'operator' => '==',
											'value' => 'full_image',
										),
									),
									'allorany' => 'all',
								),
								'column_width' => '',
								'save_format' => 'object',
								'preview_size' => 'thumbnail',
								'library' => 'all',
							),
							array (
								'key' => 'field_534cbe190595a',
								'label' => 'Background Image',
								'name' => 'side_background_image',
								'type' => 'image',
								'conditional_logic' => array (
									'status' => 1,
									'rules' => array (
										array (
											'field' => 'field_534cbc8ca86fb',
											'operator' => '==',
											'value' => 'image_left',
										),
										array (
											'field' => 'field_534cbc8ca86fb',
											'operator' => '==',
											'value' => 'image_right',
										),
									),
									'allorany' => 'any',
								),
								'column_width' => '',
								'save_format' => 'object',
								'preview_size' => 'thumbnail',
								'library' => 'all',
							),
							array (
								'key' => 'field_534ca990f6e02',
								'label' => 'Text Color',
								'name' => 'text_color',
								'type' => 'select',
								'conditional_logic' => array (
									'status' => 1,
									'rules' => array (
										array (
											'field' => 'field_534ca990f6dfd',
											'operator' => '==',
											'value' => 'text',
										),
									),
									'allorany' => 'all',
								),
								'column_width' => '',
								'choices' => array (
									'text-default' => 'Default',
									'text-white' => 'White',
									'text-black' => 'Black',
								),
								'default_value' => 'text-default',
								'allow_null' => 0,
								'multiple' => 0,
							),
							array (
								'key' => 'field_534ca990f6e03',
								'label' => 'Padding Top',
								'name' => 'padding_top',
								'type' => 'number',
								'conditional_logic' => array (
									'status' => 1,
									'rules' => array (
										array (
											'field' => 'field_534ca990f6dfd',
											'operator' => '==',
											'value' => 'padding',
										),
									),
									'allorany' => 'all',
								),
								'column_width' => '',
								'default_value' => 20,
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'min' => '',
								'max' => '',
								'step' => '',
							),
							array (
								'key' => 'field_534ca990f6e04',
								'label' => 'Padding Bottom',
								'name' => 'padding_bottom',
								'type' => 'number',
								'conditional_logic' => array (
									'status' => 1,
									'rules' => array (
										array (
											'field' => 'field_533b8e4341343',
											'operator' => '==',
											'value' => 'padding',
										),
									),
									'allorany' => 'all',
								),
								'column_width' => '',
								'default_value' => 20,
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'min' => '',
								'max' => '',
								'step' => '',
							),
							array (
								'key' => 'field_534ca990f6e05',
								'label' => 'Section Heading',
								'name' => 'section_heading',
								'type' => 'text',
								'conditional_logic' => array (
									'status' => 1,
									'rules' => array (
										array (
											'field' => 'field_534ca990f6dfd',
											'operator' => '==',
											'value' => 'heading',
										),
									),
									'allorany' => 'all',
								),
								'column_width' => '',
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'formatting' => 'html',
								'maxlength' => '',
							),
							array (
								'key' => 'field_534caf7872de1',
								'label' => 'Copy Layout',
								'name' => 'copy_layout',
								'type' => 'select',
								'conditional_logic' => array (
									'status' => 1,
									'rules' => array (
										array (
											'field' => 'field_534cbc8ca86fb',
											'operator' => '==',
											'value' => 'full_image',
										),
									),
									'allorany' => 'all',
								),
								'column_width' => '',
								'choices' => array (
									'align_left' => 'Left',
									'align_center' => 'Center',
									'align_right' => 'Right',
								),
								'default_value' => 'align_left',
								'allow_null' => 0,
								'multiple' => 0,
							),
							array (
								'key' => 'field_534caf3672de0',
								'label' => 'Graphic Copy',
								'name' => 'graphic_copy',
								'type' => 'wysiwyg',
								'column_width' => '',
								'default_value' => '',
								'toolbar' => 'full',
								'media_upload' => 'yes',
							),
						),
					),
				),
				'button_label' => 'Add Section',
				'min' => '',
				'max' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 2,
	));
}

?>