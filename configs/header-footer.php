<?php

/* *************** *
 * Header & Footer *
 * *************** */
Kirki::add_section( 'maicolors_header_footer', array(
	'title' => esc_attr__( 'Header & Footer', 'mai-colors' ),
	'panel' => $panel_id,
) );

/**
 * Header Before.
 */
Kirki::add_field( $config_id, array(
	'type'      => 'multicolor',
	'settings'  => 'header_before',
	'label'     => __( 'Before Header', 'mai-colors' ),
	'section'   => 'maicolors_header_footer',
	'transport' => 'auto',
	'default'   => '',
	'choices'   => array(
		'bg'               => esc_attr__( 'Background', 'mai-colors' ),
		'color'            => esc_attr__( 'Text Color', 'mai-colors' ),
		'link_color'       => esc_attr__( 'Link Color', 'mai-colors' ),
		'link_hover_color' => esc_attr__( 'Link Hover Color', 'mai-colors' ),

	),
	'default' => array(
		'bg'               => '',
		'color'            => '',
		'link_color'       => '',
		'link_hover_color' => '',
	),
	'output' => array(
		array(
			'choice'   => 'bg',
			'property' => 'background-color',
			'element'  => '.header-before',
		),
		array(
			'choice'   => 'color',
			'property' => 'color',
			'element'  => '.header-before',
		),
		array(
			'choice'   => 'link_color',
			'property' => 'color',
			'element'  => '.header-before a',
		),
		array(
			'choice'   => 'link_hover_color',
			'property' => 'color',
			'element'  => array( '.header-before a:hover', '.header-before a:focus' ),
		),
	),
	'active_callback' => function() {
		return is_active_sidebar( 'header_before' );
	}
) );

/**
 * Header.
 */
Kirki::add_field( $config_id, array(
	'type'      => 'multicolor',
	'settings'  => 'site_header',
	'label'     => __( 'Site Header', 'mai-colors' ),
	'section'   => 'maicolors_header_footer',
	'transport' => 'auto',
	'default'   => '',
	'choices'   => array(
		'bg' => esc_attr__( 'Background', 'mai-colors' ),

	),
	'default' => array(
		'bg' => '',
	),
	'output' => array(
		array(
			'choice'   => 'bg',
			'property' => 'background-color',
			'element'  => '.site-header',
		),
	),
) );

/**
 * Site Title.
 */
Kirki::add_field( $config_id, array(
	'type'      => 'multicolor',
	'settings'  => 'site_title',
	'label'     => __( 'Site Title', 'mai-colors' ),
	'section'   => 'maicolors_header_footer',
	'transport' => 'auto',
	'default'   => '',
	'choices'   => array(
		'color' => esc_attr__( 'Color', 'mai-colors' ),
	),
	'default' => array(
		'color' => '',
	),
	'output' => array(
		array(
			'choice'   => 'color',
			'property' => 'color',
			'element'  => '.site-title a:not(.custom-logo-link)',
		),
	),
	'active_callback' => function() {
		return ! has_custom_logo();
	}
) );

/**
 * Footer Widgets.
 */
Kirki::add_field( $config_id, array(
	'type'      => 'multicolor',
	'settings'  => 'footer_widgets',
	'label'     => __( 'Footer Widgets', 'mai-colors' ),
	'section'   => 'maicolors_header_footer',
	'transport' => 'auto',
	'default'   => '',
	'choices'   => array(
		'bg'               => esc_attr__( 'Background', 'mai-colors' ),
		'color'            => esc_attr__( 'Text Color', 'mai-colors' ),
		'link_color'       => esc_attr__( 'Link Color', 'mai-colors' ),
		'link_hover_color' => esc_attr__( 'Link Hover Color', 'mai-colors' ),

	),
	'default' => array(
		'bg'               => '',
		'color'            => '',
		'link_color'       => '',
		'link_hover_color' => '',
	),
	'output' => array(
		array(
			'choice'   => 'bg',
			'property' => 'background-color',
			'element'  => '.footer-widgets',
		),
		array(
			'choice'   => 'color',
			'property' => 'color',
			'element'  => '.footer-widgets',
		),
		array(
			'choice'   => 'link_color',
			'property' => 'color',
			'element'  => '.footer-widgets a',
		),
		array(
			'choice'   => 'link_hover_color',
			'property' => 'color',
			'element'  => array( '.footer-widgets a:hover', '.footer-widgets a:focus' ),
		),
	),
	'active_callback' => function() {
		return ( genesis_get_option( 'footer_widget_count' ) > 0 );
	}
) );

/**
 * Site Footer.
 */
Kirki::add_field( $config_id, array(
	'type'      => 'multicolor',
	'settings'  => 'site_footer',
	'label'     => __( 'Site Footer Background', 'mai-colors' ),
	'section'   => 'maicolors_header_footer',
	'transport' => 'auto',
	'default'   => '',
	'choices'   => array(
		'bg'               => esc_attr__( 'Background', 'mai-colors' ),
		'color'            => esc_attr__( 'Text Color', 'mai-colors' ),
		'link_color'       => esc_attr__( 'Link Color', 'mai-colors' ),
		'link_hover_color' => esc_attr__( 'Link Hover Color', 'mai-colors' ),

	),
	'default' => array(
		'bg'               => '',
		'color'            => '',
		'link_color'       => '',
		'link_hover_color' => '',
	),
	'output' => array(
		array(
			'choice'   => 'bg',
			'property' => 'background-color',
			'element'  => '.site-footer',
		),
		array(
			'choice'   => 'color',
			'property' => 'color',
			'element'  => '.site-footer',
		),
		array(
			'choice'   => 'link_color',
			'property' => 'color',
			'element'  => '.site-footer a',
		),
		array(
			'choice'   => 'link_hover_color',
			'property' => 'color',
			'element'  => array( '.site-footer a:hover', '.site-footer a:focus' ),
		),
	),
) );
