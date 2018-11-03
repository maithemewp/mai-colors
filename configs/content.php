<?php

/* ******* *
 * Content *
 * ******* */
Kirki::add_section( 'maicolors_content', array(
	'title' => esc_attr__( 'Content', 'mai-colors' ),
	'panel' => $panel_id,
) );

/**
 * Site Container.
 */
Kirki::add_field( $config_id, array(
	'type'      => 'multicolor',
	'settings'  => 'site_container',
	'label'     => __( 'Site Container', 'mai-colors' ),
	'section'   => 'maicolors_content',
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
			'element'  => '.site-container.boxed',
		),
	),
	'active_callback' => function() {
		return in_array( 'site_container', (array) genesis_get_option( 'boxed_elements' ) );
	}
) );

/**
 * Content Sidebar Wrap.
 */
Kirki::add_field( $config_id, array(
	'type'      => 'multicolor',
	'settings'  => 'content_sidebar_wrap',
	'label'     => __( 'Content Sidebar Wrap', 'mai-colors' ),
	'section'   => 'maicolors_content',
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
			'element'  => '.content-sidebar-wrap.boxed',
		),
	),
	'active_callback' => function() {
		return in_array( 'content_sidebar_wrap', (array) genesis_get_option( 'boxed_elements' ) );
	}
) );

/**
 * Content.
 */
Kirki::add_field( $config_id, array(
	'type'      => 'multicolor',
	'settings'  => 'content',
	'label'     => __( 'Content', 'mai-colors' ),
	'section'   => 'maicolors_content',
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
			'element'  => '.content.boxed',
		),
	),
	'active_callback' => function() {
		return in_array( 'content', (array) genesis_get_option( 'boxed_elements' ) );
	}
) );

/**
 * Single Posts/Entries.
 */
Kirki::add_field( $config_id, array(
	'type'      => 'multicolor',
	'settings'  => 'entry_singular',
	'label'     => __( 'Single Posts/Entries', 'mai-colors' ),
	'section'   => 'maicolors_content',
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
			'element'  => '.singular .content > .entry.boxed',
		),
	),
	'active_callback' => function() {
		return in_array( 'entry_singular', (array) genesis_get_option( 'boxed_elements' ) );
	}
) );

/**
 * Archive Posts/Entries.
 */
Kirki::add_field( $config_id, array(
	'type'      => 'multicolor',
	'settings'  => 'entry_archive',
	'label'     => __( 'Archive Posts/Entries', 'mai-colors' ),
	'section'   => 'maicolors_content',
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
			'element'  => array(
				'.archive .content > .entry.boxed',
				'.blog .content > .entry.boxed',
				'.search .content > .entry.boxed',
			),
		),
	),
	'active_callback' => function() {
		return in_array( 'entry_archive', (array) genesis_get_option( 'boxed_elements' ) );
	}
) );

/**
 * Primary Sidebar.
 */
Kirki::add_field( $config_id, array(
	'type'      => 'multicolor',
	'settings'  => 'sidebar',
	'label'     => __( 'Primary Sidebar', 'mai-colors' ),
	'section'   => 'maicolors_content',
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
			'element'  => '.sidebar-primary.boxed',
		),
	),
	'active_callback' => function() {
		return in_array( 'sidebar', (array) genesis_get_option( 'boxed_elements' ) );
	}
) );

/**
 * Secondary Sidebar.
 */
Kirki::add_field( $config_id, array(
	'type'      => 'multicolor',
	'settings'  => 'sidebar_alt',
	'label'     => __( 'Secondary Sidebar', 'mai-colors' ),
	'section'   => 'maicolors_content',
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
			'element'  => '.sidebar-secondary.boxed',
		),
	),
	'active_callback' => function() {
		return in_array( 'sidebar_alt', (array) genesis_get_option( 'boxed_elements' ) );
	}
) );

/**
 * Primary Sidebar Widgets.
 */
Kirki::add_field( $config_id, array(
	'type'      => 'multicolor',
	'settings'  => 'sidebar_widgets',
	'label'     => __( 'Primary Sidebar Widgets', 'mai-colors' ),
	'section'   => 'maicolors_content',
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
			'element'  => '.sidebar-primary .widget.boxed',
		),
	),
	'active_callback' => function() {
		return in_array( 'sidebar_widgets', (array) genesis_get_option( 'boxed_elements' ) );
	}
) );

/**
 * Secondary Sidebar Widgets.
 */
Kirki::add_field( $config_id, array(
	'type'      => 'multicolor',
	'settings'  => 'sidebar_alt_widgets',
	'label'     => __( 'Secondary Sidebar Widgets', 'mai-colors' ),
	'section'   => 'maicolors_content',
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
			'element'  => '.sidebar-secondary .widget.boxed',
		),
	),
	'active_callback' => function() {
		return in_array( 'sidebar_alt_widgets', (array) genesis_get_option( 'boxed_elements' ) );
	}
) );

// $boxed = genesis_get_option( 'boxed_elements' );

// 'choices' => array(
// 	'site_container'       => __( 'Site Container (fixed width)', 'mai-theme-engine' ),
// 	'content_sidebar_wrap' => __( 'Content Sidebar Wrap', 'mai-theme-engine' ),
// 	'content'              => __( 'Main Content', 'mai-theme-engine' ),
// 	'entry_singular'       => __( 'Single Posts/Entries', 'mai-theme-engine' ),
// 	'entry_archive'        => __( 'Archive Posts/Entries', 'mai-theme-engine' ),
// 	'sidebar'              => __( 'Primary Sidebar', 'mai-theme-engine' ),
// 	'sidebar_alt'          => __( 'Secondary Sidebar', 'mai-theme-engine' ),
// 	'sidebar_widgets'      => __( 'Primary Sidebar Widgets', 'mai-theme-engine' ),
// 	'sidebar_alt_widgets'  => __( 'Secondary Sidebar Widget', 'mai-theme-engine' ),
// 	'author_box'           => __( 'After Entry Author Box', 'mai-theme-engine' ),
// 	'after_entry_widgets'  => __( 'After Entry Widgets', 'mai-theme-engine' ),
// 	'adjacent_entry_nav'   => __( 'Previous/Next Entry Navigation', 'mai-theme-engine' ),
// 	'comment_wrap'         => __( 'Comments Wrap', 'mai-theme-engine' ),
// 	'comment'              => __( 'Comments', 'mai-theme-engine' ),
// 	'comment_respond'      => __( 'Comment Submission Form', 'mai-theme-engine' ),
// 	'pings'                => __( 'Pings and Trackbacks', 'mai-theme-engine' ),
// ),
