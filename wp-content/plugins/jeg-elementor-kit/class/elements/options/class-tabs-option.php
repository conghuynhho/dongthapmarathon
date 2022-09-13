<?php
/**
 * Tabs Option Class
 *
 * @package jeg-elementor-kit
 * @author Jegstudio
 * @since 1.8.0
 */

namespace Jeg\Elementor_Kit\Elements\Options;

/**
 * Class Tabs_Option
 *
 * @package Jeg\Elementor_Kit\Elements\Options
 */
class Tabs_Option extends Option_Abstract {
	/**
	 * Show color scheme flag for element.
	 *
	 * @return bool
	 */
	public function show_color_scheme() {
		return false;
	}

	/**
	 * Compatibility column
	 *
	 * @return array
	 */
	public function compatible_column() {
		return array();
	}

	/**
	 * Override function to remove compatible column alert
	 */
	public function set_compatible_column_option() {
	}

	/**
	 * Element name
	 *
	 * @return string
	 */
	public function get_element_name() {
		return esc_html__( 'JKit - Tabs', 'jeg-elementor-kit' );
	}

	/**
	 * Element category
	 *
	 * @return string
	 */
	public function get_category() {
		return esc_html__( 'Jeg Elementor Kit', 'jeg-elementor-kit' );
	}

	/**
	 * Element options
	 */
	public function set_options() {
		$this->set_style_option();
		$this->set_element_options();

		parent::set_options();
	}

	/**
	 * Option segments
	 */
	public function set_segments() {
		$this->segments['segment_general'] = array(
			'name'     => esc_html__( 'General', 'jeg-elementor-kit' ),
			'priority' => 10,
		);

		$this->segments['segment_content'] = array(
			'name'     => esc_html__( 'Content', 'jeg-elementor-kit' ),
			'priority' => 11,
		);

		$this->set_style_segment();
	}

	/**
	 * Style segments
	 */
	public function set_style_segment() {
		$this->segments['style_general'] = array(
			'name'      => esc_html__( 'General', 'jeg-elementor-kit' ),
			'priority'  => 11,
			'kit_style' => true,
		);

		$this->segments['style_tab'] = array(
			'name'      => esc_html__( 'Tab Title', 'jeg-elementor-kit' ),
			'priority'  => 12,
			'kit_style' => true,
		);

		$this->segments['style_content'] = array(
			'name'      => esc_html__( 'Content', 'jeg-elementor-kit' ),
			'priority'  => 13,
			'kit_style' => true,
		);

		$this->segments['style_caret'] = array(
			'name'      => esc_html__( 'Caret', 'jeg-elementor-kit' ),
			'priority'  => 14,
			'kit_style' => true,
		);

		parent::set_style_segment();
	}

	/**
	 * Set element option
	 */
	public function set_element_options() {
		$this->options['sg_general_layout'] = array(
			'type'    => 'select',
			'title'   => esc_html__( 'Layout', 'jeg-elementor-kit' ),
			'segment' => 'segment_general',
			'default' => 'horizontal',
			'options' => array(
				'horizontal' => esc_html__( 'Horizontal', 'jeg-elementor-kit' ),
				'vertical'   => esc_html__( 'Vertical', 'jeg-elementor-kit' ),
			),
		);

		$this->options['sg_general_icon_enable'] = array(
			'type'    => 'checkbox',
			'title'   => esc_html__( 'Enable Icon', 'jeg-elementor-kit' ),
			'segment' => 'segment_general',
		);

		$this->options['sg_general_icon_position'] = array(
			'type'       => 'select',
			'title'      => esc_html__( 'Icon Position', 'jeg-elementor-kit' ),
			'segment'    => 'segment_general',
			'default'    => 'before',
			'options'    => array(
				'before' => esc_html__( 'Before', 'jeg-elementor-kit' ),
				'after'  => esc_html__( 'After', 'jeg-elementor-kit' ),
				'top'    => esc_html__( 'Top', 'jeg-elementor-kit' ),
			),
			'dependency' => array(
				array(
					'field'    => 'sg_general_icon_enable',
					'operator' => '==',
					'value'    => true,
				),
			),
		);

		$this->options['sg_content_list'] = array(
			'type'        => 'repeater',
			'title'       => esc_html__( 'Content List', 'jeg-elementor-kit' ),
			'default'     => esc_html__( 'Tab Title', 'jeg-elementor-kit' ),
			'segment'     => 'segment_content',
			'title_field' => '{{ sg_content_list_title }}',
			'fields'      => array(
				'sg_content_set_default' => array(
					'type'    => 'checkbox',
					'title'   => esc_html__( 'Set as Default', 'jeg-elementor-kit' ),
					'segment' => 'sg_content_list',
				),
				'sg_content_icon_type'   => array(
					'type'    => 'radio',
					'title'   => esc_html__( 'Icon Type', 'jeg-elementor-kit' ),
					'segment' => 'sg_content_list',
					'default' => 'icon',
					'options' => array(
						'none'  => array(
							'title' => esc_html__( 'None', 'jeg-elementor-kit' ),
							'icon'  => 'fas fa-ban',
						),
						'icon'  => array(
							'title' => esc_html__( 'Icon', 'jeg-elementor-kit' ),
							'icon'  => 'fas fa-icons',
						),
						'image' => array(
							'title' => esc_html__( 'Image', 'jeg-elementor-kit' ),
							'icon'  => 'fas fa-image',
						),
					),
				),
				'sg_content_icon'        => array(
					'type'       => 'iconpicker',
					'title'      => esc_html__( 'Choose Icon', 'jeg-elementor-kit' ),
					'default'    => array(
						'value'   => 'fas fa-home',
						'library' => 'fa-solid',
					),
					'segment'    => 'sg_content_list',
					'dependency' => array(
						array(
							'field'    => 'sg_content_icon_type',
							'operator' => '==',
							'value'    => 'icon',
						),
					),
				),
				'sg_content_image_size'  => array(
					'type'       => 'imagesize',
					'title'      => esc_html__( 'Image Size', 'jeg-elementor-kit' ),
					'segment'    => 'sg_content_list',
					'default'    => 'thumbnail',
					'dependency' => array(
						array(
							'field'    => 'sg_content_icon_type',
							'operator' => '==',
							'value'    => 'image',
						),
					),
				),
				'sg_content_image'       => array(
					'type'       => 'image',
					'title'      => esc_html__( 'Choose Image ', 'jeg-elementor-kit' ),
					'segment'    => 'sg_content_list',
					'default'    => \Elementor\Utils::get_placeholder_image_src(),
					'dependency' => array(
						array(
							'field'    => 'sg_content_icon_type',
							'operator' => '==',
							'value'    => 'image',
						),
					),
				),
				'sg_content_list_title'  => array(
					'type'        => 'text',
					'segment'     => 'sg_content_list',
					'title'       => esc_html__( 'Title', 'jeg-elementor-kit' ),
					'label_block' => false,
				),
				'sg_content_type'        => array(
					'type'    => 'select',
					'title'   => esc_html__( 'Content Type', 'jeg-elementor-kit' ),
					'segment' => 'sg_content_list',
					'default' => 'content',
					'options' => array(
						'content'  => esc_html__( 'Content', 'jeg-elementor-kit' ),
						'template' => esc_html__( 'Template', 'jeg-elementor-kit' ),
					),
				),
				'sg_content_text'        => array(
					'type'       => 'wysiwyg',
					'segment'    => 'sg_content_list',
					'title'      => esc_html__( 'Content', 'jeg-elementor-kit' ),
					'default'    => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio, neque qui velit. Magni dolorum quidem ipsam eligendi, totam, facilis laudantium cum accusamus ullam voluptatibus commodi numquam, error, est. Ea, consequatur.', 'jeg-elementor-kit' ),
					'dependency' => array(
						array(
							'field'    => 'sg_content_type',
							'operator' => '==',
							'value'    => 'content',
						),
					),
				),
				'sg_content_template'    => array(
					'type'       => 'select',
					'title'      => esc_html__( 'Select Template', 'jeg-elementor-kit' ),
					'segment'    => 'sg_content_list',
					'options'    => jkit_get_elementor_saved_template_option(),
					'dependency' => array(
						array(
							'field'    => 'sg_content_type',
							'operator' => '==',
							'value'    => 'template',
						),
					),
				),
			),
			'default'     => array(
				array(
					'sg_content_set_default' => 'yes',
					'sg_content_list_title'  => esc_html__( 'Tab Title 1', 'jeg-elementor-kit' ),
					'sg_content_image'       => array(
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					),
				),
				array(
					'sg_content_list_title' => esc_html__( 'Tab Title 2', 'jeg-elementor-kit' ),
					'sg_content_image'      => array(
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					),
				),
				array(
					'sg_content_list_title' => esc_html__( 'Tab Title 3', 'jeg-elementor-kit' ),
					'sg_content_image'      => array(
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					),
				),
			),
		);
	}

	/**
	 * Add Additional Style.
	 */
	public function additional_style() {
		$this->options['st_general_boxshadow'] = array(
			'type'      => 'boxshadow',
			'title'     => esc_html__( 'Box Shadow', 'jeg-elementor-kit' ),
			'segment'   => 'style_general',
			'selectors' => '.jeg-elementor-kit.jkit-tabs',
		);

		$this->options['st_general_border'] = array(
			'type'      => 'border',
			'title'     => esc_html__( 'Border', 'jeg-elementor-kit' ),
			'segment'   => 'style_general',
			'selectors' => '.jeg-elementor-kit.jkit-tabs',
		);

		$this->options['st_general_padding'] = array(
			'type'      => 'dimension',
			'title'     => esc_html__( 'Padding', 'jeg-elementor-kit' ),
			'segment'   => 'style_general',
			'units'     => array( 'px', '%', 'em' ),
			'selectors' => '.jeg-elementor-kit.jkit-tabs',
			'attribute' => 'padding',
		);

		$this->options['st_general_margin'] = array(
			'type'      => 'dimension',
			'title'     => esc_html__( 'Margin', 'jeg-elementor-kit' ),
			'segment'   => 'style_general',
			'units'     => array( 'px', '%', 'em' ),
			'selectors' => '.jeg-elementor-kit.jkit-tabs',
			'attribute' => 'margin',
		);

		$this->options['st_general_border_radius'] = array(
			'type'      => 'dimension',
			'title'     => esc_html__( 'Border Radius', 'jeg-elementor-kit' ),
			'segment'   => 'style_general',
			'units'     => array( 'px', '%', 'em' ),
			'selectors' => '.jeg-elementor-kit.jkit-tabs',
			'attribute' => 'border-radius',
		);

		$this->options['st_tab_full_width'] = array(
			'type'       => 'checkbox',
			'title'      => esc_html__( 'Full Width', 'jeg-elementor-kit' ),
			'segment'    => 'style_tab',
			'default'    => 'yes',
			'selectors'  => array(
				'custom' => array(
					'{{WRAPPER}} .jeg-elementor-kit.jkit-tabs .tab-nav-list .tab-nav' => 'width: 100%;',
				),
			),
			'dependency' => array(
				array(
					'field'    => 'sg_general_layout',
					'operator' => '==',
					'value'    => 'horizontal',
				),
			),
		);

		$this->options['st_tab_full_height'] = array(
			'type'       => 'checkbox',
			'title'      => esc_html__( 'Full Height', 'jeg-elementor-kit' ),
			'segment'    => 'style_tab',
			'default'    => '',
			'selectors'  => array(
				'custom' => array(
					'{{WRAPPER}} .jeg-elementor-kit.jkit-tabs .tab-nav-list .tab-nav' => 'height: 100%;',
				),
			),
			'dependency' => array(
				array(
					'field'    => 'sg_general_layout',
					'operator' => '==',
					'value'    => 'vertical',
				),
			),
		);

		$this->options['st_tab_horizontal_alignment'] = array(
			'type'       => 'radio',
			'title'      => esc_html__( 'Tab Alignment', 'jeg-elementor-kit' ),
			'segment'    => 'style_tab',
			'options'    => array(
				'flex-start'   => array(
					'title' => esc_html__( 'Left', 'jeg-elementor-kit' ),
					'icon'  => 'fas fa-align-left',
				),
				'center'       => array(
					'title' => esc_html__( 'Center', 'jeg-elementor-kit' ),
					'icon'  => 'fas fa-align-center',
				),
				'flex-end'     => array(
					'title' => esc_html__( 'Right', 'jeg-elementor-kit' ),
					'icon'  => 'fas fa-align-right',
				),
				'space-around' => array(
					'title' => esc_html__( 'Justified', 'jeg-elementor-kit' ),
					'icon'  => 'fas fa-align-justify',
				),
			),
			'responsive' => true,
			'selectors'  => '.jeg-elementor-kit.jkit-tabs .tab-nav-list',
			'attribute'  => 'justify-content',
			'dependency' => array(
				array(
					'field'    => 'sg_general_layout',
					'operator' => '==',
					'value'    => 'horizontal',
				),
				array(
					'field'    => 'st_tab_full_width!',
					'operator' => '==',
					'value'    => true,
				),
			),
		);

		$this->options['st_tab_vertical_alignment'] = array(
			'type'       => 'radio',
			'title'      => esc_html__( 'Tab Alignment', 'jeg-elementor-kit' ),
			'segment'    => 'style_tab',
			'options'    => array(
				'flex-start'   => array(
					'title' => esc_html__( 'Top', 'jeg-elementor-kit' ),
					'icon'  => 'fas fa-angle-double-up',
				),
				'center'       => array(
					'title' => esc_html__( 'Center', 'jeg-elementor-kit' ),
					'icon'  => 'fas fa-align-center',
				),
				'flex-end'     => array(
					'title' => esc_html__( 'Bottom', 'jeg-elementor-kit' ),
					'icon'  => 'fas fa-angle-double-down',
				),
				'space-around' => array(
					'title' => esc_html__( 'Justified', 'jeg-elementor-kit' ),
					'icon'  => 'fas fa-arrows-alt-v',
				),
			),
			'responsive' => true,
			'selectors'  => '.jeg-elementor-kit.jkit-tabs .tab-nav-list',
			'attribute'  => 'justify-content',
			'dependency' => array(
				array(
					'field'    => 'sg_general_layout',
					'operator' => '==',
					'value'    => 'vertical',
				),
				array(
					'field'    => 'st_tab_full_height!',
					'operator' => '==',
					'value'    => true,
				),
			),
		);

		$this->options['st_tab_vertical_item_alignment'] = array(
			'type'       => 'radio',
			'title'      => esc_html__( 'Item Alignment', 'jeg-elementor-kit' ),
			'segment'    => 'style_tab',
			'options'    => array(
				'flex-start'    => array(
					'title' => esc_html__( 'Top', 'jeg-elementor-kit' ),
					'icon'  => 'fas fa-angle-double-up',
				),
				'center'        => array(
					'title' => esc_html__( 'Center', 'jeg-elementor-kit' ),
					'icon'  => 'fas fa-align-center',
				),
				'flex-end'      => array(
					'title' => esc_html__( 'Bottom', 'jeg-elementor-kit' ),
					'icon'  => 'fas fa-angle-double-down',
				),
				'space-between' => array(
					'title' => esc_html__( 'Justified', 'jeg-elementor-kit' ),
					'icon'  => 'fas fa-arrows-alt-v',
				),
			),
			'responsive' => true,
			'selectors'  => array(
				'custom' => array(
					'{{WRAPPER}} .jeg-elementor-kit.jkit-tabs .tab-nav-list .tab-nav'                   => 'align-items: {{VALUE}};',
					'{{WRAPPER}} .jeg-elementor-kit.jkit-tabs .tab-nav-list.icon-position-top .tab-nav' => 'align-content: {{VALUE}};',
				),
			),
			'default'    => 'center',
			'dependency' => array(
				array(
					'field'    => 'sg_general_layout',
					'operator' => '==',
					'value'    => 'vertical',
				),
				array(
					'field'    => 'st_tab_full_height',
					'operator' => '==',
					'value'    => true,
				),
			),
		);

		$this->options['st_tab_text_alignment'] = array(
			'type'       => 'radio',
			'title'      => esc_html__( 'Text Alignment', 'jeg-elementor-kit' ),
			'segment'    => 'style_tab',
			'options'    => array(
				'left'   => array(
					'title' => esc_html__( 'Left', 'jeg-elementor-kit' ),
					'icon'  => 'fas fa-align-left',
				),
				'center' => array(
					'title' => esc_html__( 'Center', 'jeg-elementor-kit' ),
					'icon'  => 'fas fa-align-center',
				),
				'right'  => array(
					'title' => esc_html__( 'Right', 'jeg-elementor-kit' ),
					'icon'  => 'fas fa-align-right',
				),
			),
			'responsive' => true,
			'selectors'  => '.jeg-elementor-kit.jkit-tabs .tab-nav-list .tab-nav',
			'attribute'  => 'text-align',
			'default'    => 'center',
			'dependency' => array(
				array(
					'field'    => 'sg_general_icon_enable',
					'operator' => '==',
					'value'    => true,
				),
				array(
					'field'    => 'sg_general_icon_position',
					'operator' => '==',
					'value'    => 'top',
				),
			),
		);

		$this->options['st_tab_text_flex_alignment'] = array(
			'type'       => 'radio',
			'title'      => esc_html__( 'Text Alignment', 'jeg-elementor-kit' ),
			'segment'    => 'style_tab',
			'options'    => array(
				'flex-start' => array(
					'title' => esc_html__( 'Left', 'jeg-elementor-kit' ),
					'icon'  => 'fas fa-align-left',
				),
				'center'     => array(
					'title' => esc_html__( 'Center', 'jeg-elementor-kit' ),
					'icon'  => 'fas fa-align-center',
				),
				'flex-end'   => array(
					'title' => esc_html__( 'Right', 'jeg-elementor-kit' ),
					'icon'  => 'fas fa-align-right',
				),
			),
			'responsive' => true,
			'selectors'  => '.jeg-elementor-kit.jkit-tabs .tab-nav-list .tab-nav',
			'attribute'  => 'justify-content',
			'default'    => 'center',
			'dependency' => array(
				'custom' => array(
					'relation' => 'or',
					'terms'    => array(
						array(
							'name'     => 'sg_general_icon_enable',
							'operator' => '==',
							'value'    => '',
						),
						array(
							'relation' => 'and',
							'terms'    => array(
								array(
									'name'     => 'sg_general_icon_enable',
									'operator' => '==',
									'value'    => 'yes',
								),
								array(
									'name'     => 'sg_general_icon_position',
									'operator' => 'in',
									'value'    => array( 'before', 'after' ),
								),
							),
						),
					),
				),
			),
		);

		$this->options['st_tab_icon_alignment'] = array(
			'type'       => 'radio',
			'title'      => esc_html__( 'Icon Alignment', 'jeg-elementor-kit' ),
			'segment'    => 'style_tab',
			'options'    => array(
				'flex-start' => array(
					'title' => esc_html__( 'Left', 'jeg-elementor-kit' ),
					'icon'  => 'fas fa-align-left',
				),
				'center'     => array(
					'title' => esc_html__( 'Center', 'jeg-elementor-kit' ),
					'icon'  => 'fas fa-align-center',
				),
				'flex-end'   => array(
					'title' => esc_html__( 'Right', 'jeg-elementor-kit' ),
					'icon'  => 'fas fa-align-right',
				),
			),
			'responsive' => true,
			'selectors'  => array(
				'custom' => array(
					'{{WRAPPER}} .jeg-elementor-kit.jkit-tabs .tab-nav-list .tab-nav'                 => 'justify-content: {{VALUE}};',
					'{{WRAPPER}} .jeg-elementor-kit.jkit-tabs.layout-vertical .tab-nav-list .tab-nav' => 'justify-content: {{VALUE}};',
				),
			),
			'default'    => 'center',
			'dependency' => array(
				array(
					'field'    => 'sg_general_icon_enable',
					'operator' => '==',
					'value'    => true,
				),
				array(
					'field'    => 'sg_general_icon_position',
					'operator' => '==',
					'value'    => 'top',
				),
			),
		);

		$this->options['st_tab_typography'] = array(
			'type'      => 'typography',
			'title'     => esc_html__( 'Typography', 'jeg-elementor-kit' ),
			'segment'   => 'style_tab',
			'selectors' => '.jeg-elementor-kit.jkit-tabs .tab-nav-list .tab-title',
		);

		$this->options['st_tab_min_width'] = array(
			'type'       => 'slider',
			'title'      => esc_html__( 'Min Width', 'jeg-elementor-kit' ),
			'segment'    => 'style_tab',
			'default'    => 140,
			'responsive' => true,
			'options'    => array(
				'min'  => 0,
				'max'  => 1000,
				'step' => 1,
			),
			'selectors'  => '.jeg-elementor-kit.jkit-tabs.layout-vertical .tab-nav-list',
			'attribute'  => 'min-width',
			'dependency' => array(
				array(
					'field'    => 'sg_general_layout',
					'operator' => '==',
					'value'    => 'vertical',
				),
			),
		);

		$this->options['st_tab_icon_size'] = array(
			'type'       => 'slider',
			'title'      => esc_html__( 'Icon Size', 'jeg-elementor-kit' ),
			'segment'    => 'style_tab',
			'default'    => 16,
			'responsive' => true,
			'options'    => array(
				'min'  => 0,
				'max'  => 200,
				'step' => 1,
			),
			'selectors'  => array(
				'custom' => array(
					'{{WRAPPER}} .jeg-elementor-kit.jkit-tabs .tab-nav-list .tab-nav > i' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .jeg-elementor-kit.jkit-tabs .tab-nav-list .tab-nav img' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .jeg-elementor-kit.jkit-tabs .tab-nav-list .tab-nav svg' => 'width: {{SIZE}}{{UNIT}};',
				),
			),
			'dependency' => array(
				array(
					'field'    => 'sg_general_icon_enable',
					'operator' => '==',
					'value'    => true,
				),
			),
		);

		$this->options['st_tab_icon_gap'] = array(
			'type'       => 'slider',
			'title'      => esc_html__( 'Icon Gap', 'jeg-elementor-kit' ),
			'segment'    => 'style_tab',
			'default'    => 10,
			'responsive' => true,
			'options'    => array(
				'min'  => 0,
				'max'  => 100,
				'step' => 1,
			),
			'selectors'  => array(
				'custom' => array(
					'{{WRAPPER}} .jeg-elementor-kit.jkit-tabs .tab-nav-list.icon-position-before .tab-nav > i, {{WRAPPER}} .jeg-elementor-kit.jkit-tabs .tab-nav-list.icon-position-before .tab-nav > img, {{WRAPPER}} .jeg-elementor-kit.jkit-tabs .tab-nav-list.icon-position-before .tab-nav > svg' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .jeg-elementor-kit.jkit-tabs .tab-nav-list.icon-position-after .tab-nav > i, {{WRAPPER}} .jeg-elementor-kit.jkit-tabs .tab-nav-list.icon-position-after .tab-nav > img, {{WRAPPER}} .jeg-elementor-kit.jkit-tabs .tab-nav-list.icon-position-after .tab-nav > svg'    => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .jeg-elementor-kit.jkit-tabs .tab-nav-list.icon-position-top .tab-nav > i, {{WRAPPER}} .jeg-elementor-kit.jkit-tabs .tab-nav-list.icon-position-top .tab-nav > img, {{WRAPPER}} .jeg-elementor-kit.jkit-tabs .tab-nav-list.icon-position-top .tab-nav > svg'          => 'margin-bottom: {{SIZE}}{{UNIT}};',
				),
			),
			'dependency' => array(
				array(
					'field'    => 'sg_general_icon_enable',
					'operator' => '==',
					'value'    => true,
				),
			),
		);

		$this->options['st_tab_padding'] = array(
			'type'      => 'dimension',
			'title'     => esc_html__( 'Padding', 'jeg-elementor-kit' ),
			'segment'   => 'style_tab',
			'units'     => array( 'px', '%', 'em' ),
			'selectors' => '.jeg-elementor-kit.jkit-tabs .tab-nav-list .tab-nav',
			'attribute' => 'padding',
		);

		$this->options['st_tab_margin'] = array(
			'type'      => 'dimension',
			'title'     => esc_html__( 'Margin', 'jeg-elementor-kit' ),
			'segment'   => 'style_tab',
			'units'     => array( 'px', '%', 'em' ),
			'selectors' => '.jeg-elementor-kit.jkit-tabs .tab-nav-list .tab-nav',
			'attribute' => 'margin',
		);

		$this->options['st_tab_tabs_start'] = array(
			'type'    => 'control_tabs_start',
			'segment' => 'style_tab',
		);

		$this->options['st_tab_normal_tab_start'] = array(
			'type'    => 'control_tab_start',
			'title'   => esc_html__( 'Normal', 'jeg-elementor-kit' ),
			'segment' => 'style_tab',
		);

		$this->options['st_tab_normal_background'] = array(
			'type'      => 'background',
			'title'     => esc_html__( 'Background', 'jeg-elementor-kit' ),
			'segment'   => 'style_tab',
			'selectors' => '.jeg-elementor-kit.jkit-tabs .tab-nav-list .tab-nav',
			'options'   => array(
				'classic',
				'gradient',
			),
		);

		$this->options['st_tab_normal_text_color'] = array(
			'type'       => 'color',
			'title'      => esc_html__( 'Text Color', 'jeg-elementor-kit' ),
			'segment'    => 'style_tab',
			'responsive' => true,
			'selectors'  => '.jeg-elementor-kit.jkit-tabs .tab-nav-list .tab-nav .tab-title',
		);

		$this->options['st_tab_normal_icon_color'] = array(
			'type'       => 'color',
			'title'      => esc_html__( 'Icon Color', 'jeg-elementor-kit' ),
			'segment'    => 'style_tab',
			'responsive' => true,
			'selectors'  => array(
				'custom' => array(
					'{{WRAPPER}} .jeg-elementor-kit.jkit-tabs .tab-nav-list .tab-nav > i'   => 'color: {{VALUE}};',
					'{{WRAPPER}} .jeg-elementor-kit.jkit-tabs .tab-nav-list .tab-nav > svg' => 'fill: {{VALUE}};',
				),
			),
			'dependency' => array(
				array(
					'field'    => 'sg_general_icon_enable',
					'operator' => '==',
					'value'    => true,
				),
			),
		);

		$this->options['st_tab_normal_border'] = array(
			'type'      => 'border',
			'title'     => esc_html__( 'Border', 'jeg-elementor-kit' ),
			'segment'   => 'style_tab',
			'selectors' => '.jeg-elementor-kit.jkit-tabs .tab-nav-list .tab-nav',
		);

		$this->options['st_tab_normal_border_radius'] = array(
			'type'      => 'dimension',
			'title'     => esc_html__( 'Border Radius', 'jeg-elementor-kit' ),
			'segment'   => 'style_tab',
			'units'     => array( 'px', '%', 'em' ),
			'selectors' => '.jeg-elementor-kit.jkit-tabs .tab-nav-list .tab-nav',
			'attribute' => 'border-radius',
		);

		$this->options['st_tab_normal_tab_end'] = array(
			'type'    => 'control_tab_end',
			'segment' => 'style_tab',
		);

		$this->options['st_tab_hover_tab_start'] = array(
			'type'    => 'control_tab_start',
			'title'   => esc_html__( 'Hover', 'jeg-elementor-kit' ),
			'segment' => 'style_tab',
		);

		$this->options['st_tab_hover_background'] = array(
			'type'      => 'background',
			'title'     => esc_html__( 'Background', 'jeg-elementor-kit' ),
			'segment'   => 'style_tab',
			'selectors' => '.jeg-elementor-kit.jkit-tabs .tab-nav-list .tab-nav:hover',
			'options'   => array(
				'classic',
				'gradient',
			),
		);

		$this->options['st_tab_hover_text_color'] = array(
			'type'       => 'color',
			'title'      => esc_html__( 'Text Color', 'jeg-elementor-kit' ),
			'segment'    => 'style_tab',
			'selectors'  => '.jeg-elementor-kit.jkit-tabs .tab-nav-list .tab-nav:hover .tab-title',
			'responsive' => true,
		);

		$this->options['st_tab_hover_icon_color'] = array(
			'type'       => 'color',
			'title'      => esc_html__( 'Icon Color', 'jeg-elementor-kit' ),
			'segment'    => 'style_tab',
			'responsive' => true,
			'selectors'  => array(
				'custom' => array(
					'{{WRAPPER}} .jeg-elementor-kit.jkit-tabs .tab-nav-list .tab-nav:hover > i'   => 'color: {{VALUE}};',
					'{{WRAPPER}} .jeg-elementor-kit.jkit-tabs .tab-nav-list .tab-nav:hover > svg' => 'fill: {{VALUE}};',
				),
			),
			'dependency' => array(
				array(
					'field'    => 'sg_general_icon_enable',
					'operator' => '==',
					'value'    => true,
				),
			),
		);

		$this->options['st_tab_hover_border'] = array(
			'type'      => 'border',
			'title'     => esc_html__( 'Border', 'jeg-elementor-kit' ),
			'segment'   => 'style_tab',
			'selectors' => '.jeg-elementor-kit.jkit-tabs .tab-nav-list .tab-nav:hover',
		);

		$this->options['st_tab_hover_border_radius'] = array(
			'type'      => 'dimension',
			'title'     => esc_html__( 'Border Radius', 'jeg-elementor-kit' ),
			'segment'   => 'style_tab',
			'units'     => array( 'px', '%', 'em' ),
			'selectors' => '.jeg-elementor-kit.jkit-tabs .tab-nav-list .tab-nav:hover',
			'attribute' => 'border-radius',
		);

		$this->options['st_tab_hover_tab_end'] = array(
			'type'    => 'control_tab_end',
			'segment' => 'style_tab',
		);

		$this->options['st_tab_active_tab_start'] = array(
			'type'    => 'control_tab_start',
			'title'   => esc_html__( 'Active', 'jeg-elementor-kit' ),
			'segment' => 'style_tab',
		);

		$this->options['st_tab_active_background'] = array(
			'type'      => 'background',
			'title'     => esc_html__( 'Background', 'jeg-elementor-kit' ),
			'segment'   => 'style_tab',
			'selectors' => '.jeg-elementor-kit.jkit-tabs .tab-nav-list .tab-nav.active',
			'options'   => array(
				'classic',
				'gradient',
			),
		);

		$this->options['st_tab_active_text_color'] = array(
			'type'       => 'color',
			'title'      => esc_html__( 'Text Color', 'jeg-elementor-kit' ),
			'segment'    => 'style_tab',
			'responsive' => true,
			'selectors'  => '.jeg-elementor-kit.jkit-tabs .tab-nav-list .tab-nav.active .tab-title',
		);

		$this->options['st_tab_active_icon_color'] = array(
			'type'       => 'color',
			'title'      => esc_html__( 'Icon Color', 'jeg-elementor-kit' ),
			'segment'    => 'style_tab',
			'responsive' => true,
			'selectors'  => array(
				'custom' => array(
					'{{WRAPPER}} .jeg-elementor-kit.jkit-tabs .tab-nav-list .tab-nav.active > i'   => 'color: {{VALUE}};',
					'{{WRAPPER}} .jeg-elementor-kit.jkit-tabs .tab-nav-list .tab-nav.active > svg' => 'fill: {{VALUE}};',
				),
			),
			'dependency' => array(
				array(
					'field'    => 'sg_general_icon_enable',
					'operator' => '==',
					'value'    => true,
				),
			),
		);

		$this->options['st_tab_active_border'] = array(
			'type'      => 'border',
			'title'     => esc_html__( 'Border', 'jeg-elementor-kit' ),
			'segment'   => 'style_tab',
			'selectors' => '.jeg-elementor-kit.jkit-tabs .tab-nav-list .tab-nav.active',
		);

		$this->options['st_tab_active_border_radius'] = array(
			'type'      => 'dimension',
			'title'     => esc_html__( 'Border Radius', 'jeg-elementor-kit' ),
			'segment'   => 'style_tab',
			'units'     => array( 'px', '%', 'em' ),
			'selectors' => '.jeg-elementor-kit.jkit-tabs .tab-nav-list .tab-nav.active',
			'attribute' => 'border-radius',
		);

		$this->options['st_tab_active_tab_end'] = array(
			'type'    => 'control_tab_end',
			'segment' => 'style_tab',
		);

		$this->options['st_tab_tabs_end'] = array(
			'type'    => 'control_tabs_end',
			'segment' => 'style_tab',
		);

		$this->options['st_content_typography'] = array(
			'type'      => 'typography',
			'title'     => esc_html__( 'Typography', 'jeg-elementor-kit' ),
			'segment'   => 'style_content',
			'selectors' => '.jeg-elementor-kit.jkit-tabs .tab-content-list .tab-content',
		);

		$this->options['st_content_background'] = array(
			'type'      => 'background',
			'title'     => esc_html__( 'Background', 'jeg-elementor-kit' ),
			'segment'   => 'style_content',
			'selectors' => '.jeg-elementor-kit.jkit-tabs .tab-content-list .tab-content',
			'options'   => array(
				'classic',
				'gradient',
			),
		);

		$this->options['st_content_text_color'] = array(
			'type'       => 'color',
			'title'      => esc_html__( 'Text Color', 'jeg-elementor-kit' ),
			'segment'    => 'style_content',
			'responsive' => true,
			'selectors'  => '.jeg-elementor-kit.jkit-tabs .tab-content-list .tab-content',
		);

		$this->options['st_content_boxshadow'] = array(
			'type'      => 'boxshadow',
			'title'     => esc_html__( 'Box Shadow', 'jeg-elementor-kit' ),
			'segment'   => 'style_content',
			'selectors' => '.jeg-elementor-kit.jkit-tabs .tab-content-list .tab-content',
		);

		$this->options['st_content_border'] = array(
			'type'      => 'border',
			'title'     => esc_html__( 'Border', 'jeg-elementor-kit' ),
			'segment'   => 'style_content',
			'selectors' => '.jeg-elementor-kit.jkit-tabs .tab-content-list .tab-content',
		);

		$this->options['st_content_padding'] = array(
			'type'      => 'dimension',
			'title'     => esc_html__( 'Padding', 'jeg-elementor-kit' ),
			'segment'   => 'style_content',
			'units'     => array( 'px', '%', 'em' ),
			'selectors' => '.jeg-elementor-kit.jkit-tabs .tab-content-list .tab-content',
			'attribute' => 'padding',
		);

		$this->options['st_content_margin'] = array(
			'type'      => 'dimension',
			'title'     => esc_html__( 'Margin', 'jeg-elementor-kit' ),
			'segment'   => 'style_content',
			'units'     => array( 'px', '%', 'em' ),
			'selectors' => '.jeg-elementor-kit.jkit-tabs .tab-content-list .tab-content',
			'attribute' => 'margin',
		);

		$this->options['st_content_border_radius'] = array(
			'type'      => 'dimension',
			'title'     => esc_html__( 'Border Radius', 'jeg-elementor-kit' ),
			'segment'   => 'style_content',
			'units'     => array( 'px', '%', 'em' ),
			'selectors' => '.jeg-elementor-kit.jkit-tabs .tab-content-list .tab-content',
			'attribute' => 'border-radius',
		);

		$this->options['st_caret_enable'] = array(
			'type'    => 'checkbox',
			'title'   => esc_html__( 'Enable Caret on Active Tab', 'jeg-elementor-kit' ),
			'segment' => 'style_caret',
			'default' => '',
		);

		$this->options['st_caret_size'] = array(
			'type'       => 'slider',
			'title'      => esc_html__( 'Size', 'jeg-elementor-kit' ),
			'segment'    => 'style_caret',
			'default'    => 16,
			'responsive' => true,
			'options'    => array(
				'min'  => 0,
				'max'  => 100,
				'step' => 1,
			),
			'selectors'  => array(
				'custom' => array(
					'{{WRAPPER}} .jeg-elementor-kit.jkit-tabs .tab-nav-list.caret-on .tab-nav.active::after'                 => 'border-width: {{SIZE}}{{UNIT}}; bottom: -{{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .jeg-elementor-kit.jkit-tabs.layout-vertical .tab-nav-list.caret-on .tab-nav.active::after' => 'right: -{{SIZE}}{{UNIT}}; top: calc(50% - {{SIZE}}{{UNIT}}) !important;',
				),
			),
			'dependency' => array(
				array(
					'field'    => 'st_caret_enable',
					'operator' => '==',
					'value'    => true,
				),
			),
		);

		$this->options['st_caret_color'] = array(
			'type'       => 'color',
			'title'      => esc_html__( 'Color', 'jeg-elementor-kit' ),
			'segment'    => 'style_caret',
			'responsive' => true,
			'selectors'  => array(
				'custom' => array(
					'{{WRAPPER}} .jeg-elementor-kit.jkit-tabs .tab-nav-list.caret-on .tab-nav.active::after'                 => 'border-top-color: {{VALUE}};',
					'{{WRAPPER}} .jeg-elementor-kit.jkit-tabs.layout-vertical .tab-nav-list.caret-on .tab-nav.active::after' => 'border-top-color: transparent; border-left-color: {{VALUE}};',
				),
			),
			'dependency' => array(
				array(
					'field'    => 'st_caret_enable',
					'operator' => '==',
					'value'    => true,
				),
			),
		);

		parent::additional_style();
	}
}
