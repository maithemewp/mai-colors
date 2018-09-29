<?php

/* ******** *
 * Defaults *
 * ******** */
Kirki::add_section( 'maicolors_defaults', array(
	'title' => esc_attr__( 'Defaults', 'mai-colors' ),
	'panel' => $panel_id,
) );

/**
 * Body Background
 */
Kirki::add_field( $config_id, array(
	'type'      => 'color',
	'settings'  => 'body_bg',
	'label'     => __( 'Body Background', 'mai-colors' ),
	'section'   => 'maicolors_defaults',
	'transport' => 'auto',
	'default'   => '',
	'choices'   => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => 'body',
			'property' => 'background-color',
		),
	),
) );

/**
 * Body Text Color
 */
Kirki::add_field( $config_id, array(
	'type'      => 'color',
	'settings'  => 'body_color',
	'label'     => __( 'Body Text Color', 'mai-colors' ),
	'section'   => 'maicolors_defaults',
	'transport' => 'auto',
	'default'   => '',
	'choices'   => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => 'body',
			'property' => 'color',
		),
	),
) );

/**
 * Link Color
 */
Kirki::add_field( $config_id, array(
	'type'      => 'multicolor',
	'settings'  => 'link',
	'label'     => __( 'Links', 'mai-colors' ),
	'section'   => 'maicolors_defaults',
	'transport' => 'auto',
	'choices'   => array(
		'link'  => esc_attr__( 'Color', 'mai-colors' ),
		'hover' => esc_attr__( 'Hover', 'mai-colors' ),
	),
	'default' => array(
		'link'  => '',
		'hover' => '',
	),
	'output' => array(
		array(
			'choice'   => 'link',
			'element'  => 'a',
			'property' => 'color',
		),
		array(
			'choice'   => 'hover',
			'element'  => array( 'a:hover', 'a:focus' ),
			'property' => 'color',
		),
	),
) );

/**
 * Buttons (Primary)
 */
Kirki::add_field( $config_id, array(
	'type'      => 'multicolor',
	'settings'  => 'button',
	'label'     => __( 'Buttons (Primary)', 'mai-colors' ),
	'section'   => 'maicolors_defaults',
	'transport' => 'auto',
	'choices'   => array(
		'bg'          => esc_attr__( 'Background Color', 'mai-colors' ),
		'color'       => esc_attr__( 'Text Color', 'mai-colors' ),
		'bg_hover'    => esc_attr__( 'Background Hover', 'mai-colors' ),
		'color_hover' => esc_attr__( 'Text Hover', 'mai-colors' ),
	),
	'default' => array(
		'bg'          => '',
		'color'       => '',
		'bg_hover'    => '',
		'color_hover' => '',
	),
	'output' => array(
		array(
			'choice'   => 'bg',
			'property' => 'background-color',
			'element'  => array(
				'button',
				'input[type="button"]',
				'input[type="reset"]',
				'input[type="submit"]',
				'.button',
				'.entry-content .button',
				'.entry-content .more-link',
				'.menu-item.highlight a',
				'.woocommerce a.button',
				'.woocommerce button.button',
				'.woocommerce input.button',
				'.woocommerce .button.alt.single_add_to_cart_button',
				'.woocommerce .button.alt.checkout-button',
				'.woocommerce #payment #place_order',
				'.woocommerce-page #payment #place_order',
			),
		),
		array(
			'choice'   => 'bg_hover',
			'property' => 'background-color',
			'element'  => array(
				'button:hover',
				'button:focus',
				'input:hover[type="button"]',
				'input:focus[type="button"]',
				'input:hover[type="reset"]',
				'input:focus[type="reset"]',
				'input:hover[type="submit"]',
				'input:focus[type="submit"]',
				'.button:hover',
				'.button:focus',
				'.entry-content .button:hover',
				'.entry-content .button:focus',
				'.entry-content .more-link:hover',
				'.entry-content .more-link:focus',
				'.menu-item.highlight.current-menu-item > a',
				'.menu-item.highlight > a:hover',
				'.menu-item.highlight > a:focus',
				'.woocommerce a.button:hover',
				'.woocommerce a.button:focus',
				'.woocommerce button.button:hover',
				'.woocommerce button.button:focus',
				'.woocommerce input.button:hover',
				'.woocommerce input.button:focus',
				'.woocommerce .button.alt.single_add_to_cart_button:hover',
				'.woocommerce .button.alt.single_add_to_cart_button:focus',
				'.woocommerce .button.alt.checkout-button:hover',
				'.woocommerce .button.alt.checkout-button:focus',
				'.woocommerce #payment #place_order:hover',
				'.woocommerce #payment #place_order:focus',
				'.woocommerce-page #payment #place_order:hover',
				'.woocommerce-page #payment #place_order:focus',
				'.woocommerce #respond input#submit.alt.disabled',
				'.woocommerce #respond input#submit.alt.disabled:hover',
				'.woocommerce #respond input#submit.alt:disabled',
				'.woocommerce #respond input#submit.alt:disabled:hover',
				'.woocommerce #respond input#submit.alt:disabled[disabled]',
				'.woocommerce #respond input#submit.alt:disabled[disabled]:hover',
				'.woocommerce a.button.alt.disabled',
				'.woocommerce a.button.alt.disabled:hover',
				'.woocommerce a.button.alt:disabled',
				'.woocommerce a.button.alt:disabled:hover',
				'.woocommerce a.button.alt:disabled[disabled]',
				'.woocommerce a.button.alt:disabled[disabled]:hover',
				'.woocommerce button.button.alt.disabled',
				'.woocommerce button.button.alt.disabled:hover',
				'.woocommerce button.button.alt:disabled',
				'.woocommerce button.button.alt:disabled:hover',
				'.woocommerce button.button.alt:disabled[disabled]',
				'.woocommerce button.button.alt:disabled[disabled]:hover',
				'.woocommerce input.button.alt.disabled',
				'.woocommerce input.button.alt.disabled:hover',
				'.woocommerce input.button.alt:disabled',
				'.woocommerce input.button.alt:disabled:hover',
				'.woocommerce input.button.alt:disabled[disabled]',
				'.woocommerce input.button.alt:disabled[disabled]:hover',
			),
		),
		array(
			'choice'   => 'color',
			'property' => 'color',
			'element'  => array(
				'button',
				'input[type="button"]',
				'input[type="reset"]',
				'input[type="submit"]',
				'.button',
				'.entry-content .button',
				'.entry-content .more-link',
				'.menu-item.highlight a',
				'.woocommerce a.button',
				'.woocommerce button.button',
				'.woocommerce input.button',
				'.woocommerce .button.alt.single_add_to_cart_button',
				'.woocommerce .button.alt.checkout-button',
				'.woocommerce #payment #place_order',
				'.woocommerce-page #payment #place_order',
			),
		),
		array(
			'choice'   => 'color_hover',
			'property' => 'color',
			'element'  => array(
				'button:hover',
				'button:focus',
				'input:hover[type="button"]',
				'input:focus[type="button"]',
				'input:hover[type="reset"]',
				'input:focus[type="reset"]',
				'input:hover[type="submit"]',
				'input:focus[type="submit"]',
				'.button:hover',
				'.button:focus',
				'.entry-content .button:hover',
				'.entry-content .button:focus',
				'.entry-content .more-link:hover',
				'.entry-content .more-link:focus',
				'.menu-item.highlight.current-menu-item > a',
				'.menu-item.highlight > a:hover',
				'.menu-item.highlight > a:focus',
				'.woocommerce a.button:hover',
				'.woocommerce a.button:focus',
				'.woocommerce button.button:hover',
				'.woocommerce button.button:focus',
				'.woocommerce input.button:hover',
				'.woocommerce input.button:focus',
				'.woocommerce .button.alt.single_add_to_cart_button:hover',
				'.woocommerce .button.alt.single_add_to_cart_button:focus',
				'.woocommerce .button.alt.checkout-button:hover',
				'.woocommerce .button.alt.checkout-button:focus',
				'.woocommerce #payment #place_order:hover',
				'.woocommerce #payment #place_order:focus',
				'.woocommerce-page #payment #place_order:hover',
				'.woocommerce-page #payment #place_order:focus',
				'.woocommerce #respond input#submit.alt.disabled',
				'.woocommerce #respond input#submit.alt.disabled:hover',
				'.woocommerce #respond input#submit.alt:disabled',
				'.woocommerce #respond input#submit.alt:disabled:hover',
				'.woocommerce #respond input#submit.alt:disabled[disabled]',
				'.woocommerce #respond input#submit.alt:disabled[disabled]:hover',
				'.woocommerce a.button.alt.disabled',
				'.woocommerce a.button.alt.disabled:hover',
				'.woocommerce a.button.alt:disabled',
				'.woocommerce a.button.alt:disabled:hover',
				'.woocommerce a.button.alt:disabled[disabled]',
				'.woocommerce a.button.alt:disabled[disabled]:hover',
				'.woocommerce button.button.alt.disabled',
				'.woocommerce button.button.alt.disabled:hover',
				'.woocommerce button.button.alt:disabled',
				'.woocommerce button.button.alt:disabled:hover',
				'.woocommerce button.button.alt:disabled[disabled]',
				'.woocommerce button.button.alt:disabled[disabled]:hover',
				'.woocommerce input.button.alt.disabled',
				'.woocommerce input.button.alt.disabled:hover',
				'.woocommerce input.button.alt:disabled',
				'.woocommerce input.button.alt:disabled:hover',
				'.woocommerce input.button.alt:disabled[disabled]',
				'.woocommerce input.button.alt:disabled[disabled]:hover',
			),
		),
	),
) );

/**
 * Buttons (Alternate/Secondary)
 */
Kirki::add_field( $config_id, array(
	'type'      => 'multicolor',
	'settings'  => 'button_alt',
	'label'     => __( 'Buttons (Secondary/Alternate)', 'mai-colors' ),
	'section'   => 'maicolors_defaults',
	'transport' => 'auto',
	'choices'   => array(
		'bg'          => esc_attr__( 'Background Color', 'mai-colors' ),
		'color'       => esc_attr__( 'Text Color', 'mai-colors' ),
		'bg_hover'    => esc_attr__( 'Background Hover', 'mai-colors' ),
		'color_hover' => esc_attr__( 'Text Hover', 'mai-colors' ),
	),
	'default' => array(
		'bg'          => '',
		'color'       => '',
		'bg_hover'    => '',
		'color_hover' => '',
	),
	'output' => array(
		array(
			'choice'   => 'bg',
			'property' => 'background-color',
			'element'  => array(
				'.button.alt',
				'.comment-reply-link',
				'.entry-content .button.alt',
				'.entry-content .more-link',
				'.footer-widgets .button',
				'.site-footer .button',
				'.woocommerce .actions .button',
				'.woocommerce a.button.alt',
				'.woocommerce a.button.add_to_cart_button',
			),
		),
		array(
			'choice'   => 'bg_hover',
			'property' => 'background-color',
			'element'  => array(
				'.button.alt:hover',
				'.button.alt:focus',
				'.comment-reply-link:hover',
				'.comment-reply-link:focus',
				'.entry-content .button.alt:hover',
				'.entry-content .button.alt:focus',
				'.entry-content .more-link:hover',
				'.entry-content .more-link:focus',
				'.footer-widgets .button:hover',
				'.footer-widgets .button:focus',
				'.site-footer .button:hover',
				'.site-footer .button:focus',
				'.woocommerce .actions .button:hover',
				'.woocommerce .actions .button:focus',
				'.woocommerce a.button.alt:hover',
				'.woocommerce a.button.alt:focus',
				'.woocommerce a.button.add_to_cart_button:hover',
				'.woocommerce a.button.add_to_cart_button:focus',
			),
		),
		array(
			'choice'   => 'color',
			'property' => 'color',
			'element'  => array(
				'.button.alt',
				'.comment-reply-link',
				'.entry-content .button.alt',
				'.entry-content .more-link',
				'.footer-widgets .button',
				'.site-footer .button',
				'.woocommerce .actions .button',
				'.woocommerce a.button.alt',
				'.woocommerce a.button.add_to_cart_button',
			),
		),
		array(
			'choice'   => 'color_hover',
			'property' => 'color',
			'element'  => array(
				'.button.alt:hover',
				'.button.alt:focus',
				'.comment-reply-link:hover',
				'.comment-reply-link:focus',
				'.entry-content .button.alt:hover',
				'.entry-content .button.alt:focus',
				'.entry-content .more-link:hover',
				'.entry-content .more-link:focus',
				'.footer-widgets .button:hover',
				'.footer-widgets .button:focus',
				'.site-footer .button:hover',
				'.site-footer .button:focus',
				'.woocommerce .actions .button:hover',
				'.woocommerce .actions .button:focus',
				'.woocommerce a.button.alt:hover',
				'.woocommerce a.button.alt:focus',
				'.woocommerce a.button.add_to_cart_button:hover',
				'.woocommerce a.button.add_to_cart_button:focus',
			),
		),
	),
) );
