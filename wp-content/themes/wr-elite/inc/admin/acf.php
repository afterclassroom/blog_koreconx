<?php
/**
 * @version    1.6
 * @package    Elite
 * @author     WooRockets Team <support@woorockets.com>
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Websites: http://www.woorockets.com
 */

if ( function_exists( 'register_field_group' ) ) {
	register_field_group(
		array(
			'id'     => 'layout-options',
			'title'  => __( 'Layout Options', 'elite' ),
			'fields' => array(
				array(
					'key'          => 'field_549b74c3ad94f',
					'label'        => __( 'Select a specific layout for this page ', 'elite' ),
					'name'         => 'acf_page_layout',
					'type'         => 'select',
					'instructions' => __( 'Default layout: <strong>Global Layout On Customizer</strong>', 'elite' ),
					'choices' => array(
						'default'         => __( 'Default', 'elite' ),
						'main'            => __( 'Full Width', 'elite' ),
						'left-main'       => __( 'Left Sidebar', 'elite' ),
						'main-right'      => __( 'Right Sidebar', 'elite' ),
						'left-main-right' => __( 'Left - Main Content - Right', 'elite' ),
						'left-right-main' => __( 'Left - Right - Main Content', 'elite' ),
						'main-left-right' => __( 'Main Content - Left - Right', 'elite' )
					),
					'default_value' => 'default',
					'allow_null'    => 0,
					'multiple'      => 0,
				),
				array(
					'key'          => 'field_549b69c3ad94f',
					'label'        => __( 'Select a specific menu for this page ', 'elite' ),
					'name'         => 'acf_page_menu',
					'type'         => 'select',
					'choices' => array(
						'main_menu'     => __( 'Main Menu', 'elite' ),
						'one_page_menu' => __( 'One Page Menu', 'elite' ),
					),
					'default_value' => 'default',
					'allow_null'    => 0,
					'multiple'      => 0,
				),
			),
			'location' => array(
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'page'
					),
				),
			),
			'options' => array(
				'position'       => 'side',
				'layout'         => 'default',
				'hide_on_screen' => array(
				),
			),
			'menu_order' => 0,
		)
	);
}
