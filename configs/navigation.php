<?php

/* ********** *
 * Navigation *
 * ********** */
Kirki::add_section( 'maicolors_menus', array(
	'title' => esc_attr__( 'Menus', 'mai-colors' ),
	'panel' => $panel_id,
) );

// Header Nav.
// Kirki::add_field( $config_id, _maicolors_nav_config( 'header_nav_color', __( 'Header Nav', 'mai-colors' ), '.nav-header', '_maicolors_has_header_nav' ) );

// Primary Nav.
// Kirki::add_field( $config_id, _maicolors_nav_config( 'primary_nav_color', __( 'Primary Nav', 'mai-colors' ), '.nav-primary', '_maicolors_has_primary_nav' ) );

// Secondary/Footer Nav.
// Kirki::add_field( $config_id, _maicolors_nav_config( 'secondary_nav_color', __( 'Footer Nav', 'mai-colors' ), '.nav-secondary', '_maicolors_has_secondary_nav' ) );

// Kirki::add_field( $config_id, array(
// 	'type'      => 'multicolor',
// 	'settings'  => 'header_before',
// 	'label'     => __( 'Before Header', 'mai-colors' ),
// 	'section'   => 'maicolors_header_footer',
// 	'transport' => 'auto',
// 	'default'   => '',
// 	'choices'   => array(
// 		'bg'               => esc_attr__( 'Background', 'mai-colors' ),
// 		'color'            => esc_attr__( 'Text Color', 'mai-colors' ),
// 		'link_color'       => esc_attr__( 'Link Color', 'mai-colors' ),
// 		'link_hover_color' => esc_attr__( 'Link Hover Color', 'mai-colors' ),

// 	),
// 	'default' => array(
// 		'bg'               => '',
// 		'color'            => '',
// 		'link_color'       => '',
// 		'link_hover_color' => '',
// 	),
// 	'output' => array(
// 		array(
// 			'choice'   => 'bg',
// 			'property' => 'background-color',
// 			'element'  => '.header-before',
// 		),
// 		array(
// 			'choice'   => 'color',
// 			'property' => 'color',
// 			'element'  => '.header-before',
// 		),
// 		array(
// 			'choice'   => 'link_color',
// 			'property' => 'color',
// 			'element'  => '.header-before a',
// 		),
// 		array(
// 			'choice'   => 'link_hover_color',
// 			'property' => 'color',
// 			'element'  => array( '.header-before a:hover', '.header-before a:focus' ),
// 		),
// 	),
// 	'active_callback' => function() {
// 		return is_active_sidebar( 'header_before' );
// 	}
// ) );

/**
 * Primary Nav.
 */
Kirki::add_field( $config_id, _maicolors_get_nav_config( 'primary_nav_color', '.nav-primary', '_maicolors_get_nav_primary_callback' ) );

/**
 * Primary Nav Submenu.
 */
Kirki::add_field( $config_id, _maicolors_get_nav_submenu_config( 'primary_nav_submenu_color', '.nav-primary', '_maicolors_get_nav_primary_submenu_callback' ) );

/**
 * Primary Nav Highlight.
 */
Kirki::add_field( $config_id, _maicolors_get_nav_highlight_config( 'primary_nav_highlight_color', '.nav-primary', '_maicolors_get_nav_primary_highlight_callback' ) );

function _maicolors_get_nav_config( $key, $class, $callback ) {

	return array(
		'type'            => 'multicolor',
		'settings'        => $key,
		'label'           => __( 'Primary Nav', 'mai-colors' ),
		'section'         => 'maicolors_menus',
		'transport'       => 'auto',
		'choices'         => array(
			'menu_bg'            => esc_attr__( 'Background', 'mai-colors' ),
			'item_color'         => esc_attr__( 'Item Color', 'mai-colors' ),
			'item_hover_bg'      => esc_attr__( 'Item Hover Background', 'mai-colors' ),
			'item_hover_color'   => esc_attr__( 'Item Hover Color', 'mai-colors' ),
			'item_current_bg'    => esc_attr__( 'Current Item Background', 'mai-colors' ),
			'item_current_color' => esc_attr__( 'Current Item Color', 'mai-colors' ),
		),
		'default' => array(
			'menu_bg'            => '',
			'item_color'         => '',
			'item_hover_bg'      => '',
			'item_hover_color'   => '',
			'item_current_bg'    => '',
			'item_current_color' => '',
		),
		'output' => array(
			array(
				'choice'   => 'menu_bg',
				'property' => 'background-color',
				'element'  => array(
					"{$class}",
					"{$class} .sub-menu a",
					".home {$class} .current-menu-item > a",
				),
			),
			array(
				'choice'   => 'item_color',
				'property' => 'color',
				'element'  => array(
					"{$class} a",
					"{$class} .nav-search",
					"{$class} .sub-menu a",
					".home {$class} .current-menu-item > a",
				),
			),
			array(
				'choice'   => 'item_hover_bg',
				'property' => 'background-color',
				'element'  => array(
					"{$class} a:hover",
					"{$class} a:focus",
					"{$class} .nav-search:hover",
					"{$class} .nav-search:focus",
					"{$class} .sub-menu a:hover",
					"{$class} .sub-menu a:focus",
					"{$class} .menu-item-has-children:not(.current-menu-ancestor):hover > a",
				),
			),
			array(
				'choice'   => 'item_hover_color',
				'property' => 'color',
				'element'  => array(
					"{$class} a:hover",
					"{$class} a:focus",
					"{$class} .nav-search:hover",
					"{$class} .nav-search:focus",
					"{$class} .sub-menu a:hover",
					"{$class} .sub-menu a:focus",
					"{$class} .menu-item-has-children:not(.current-menu-ancestor):hover > a",
				),
			),
			array(
				'choice'   => 'item_current_bg',
				'property' => 'background-color',
				'element'  => array(
					"{$class} .current-menu-item > a",
					"{$class} .current-menu-item > a:hover",
					"{$class} .current-menu-item > a:focus",
					"{$class} .current-menu-ancestor > a",
					"{$class} .current-menu-ancestor > a:hover",
					"{$class} .current-menu-ancestor > a:focus",
				),
			),
			array(
				'choice'   => 'item_current_color',
				'property' => 'color',
				'element'  => array(
					"{$class} .current-menu-item > a",
					"{$class} .current-menu-item > a:hover",
					"{$class} .current-menu-item > a:focus",
					"{$class} .current-menu-ancestor > a",
					"{$class} .current-menu-ancestor > a:hover",
					"{$class} .current-menu-ancestor > a:focus",
				),
			),
		),
		'active_callback' => $callback,
	);
}

function _maicolors_get_nav_submenu_config( $key, $class, $callback ) {

	return array(
		'type'            => 'multicolor',
		'settings'        => $key,
		'label'           => __( 'Primary Nav Submenu', 'mai-colors' ),
		'section'         => 'maicolors_menus',
		'transport'       => 'auto',
		'choices'         => array(
			'submenu_menu_bg'            => esc_attr__( 'Background', 'mai-colors' ),
			'submenu_item_color'         => esc_attr__( 'Item Color', 'mai-colors' ),
			'submenu_item_hover_bg'      => esc_attr__( 'Item Hover Background', 'mai-colors' ),
			'submenu_item_hover_color'   => esc_attr__( 'Item Hover Color', 'mai-colors' ),
			'submenu_item_current_bg'    => esc_attr__( 'Current Item Background', 'mai-colors' ),
			'submenu_item_current_color' => esc_attr__( 'Current Item Color', 'mai-colors' ),
		),
		'default' => array(
			'submenu_menu_bg'            => '',
			'submenu_item_color'         => '',
			'submenu_item_hover_bg'      => '',
			'submenu_item_hover_color'   => '',
			'submenu_item_current_bg'    => '',
			'submenu_item_current_color' => '',
		),
		'output' => array(
			array(
				'choice'   => 'submenu_menu_bg',
				'property' => 'background-color',
				'element'  => array(
					"{$class} .sub-menu a",
				),
			),
			array(
				'choice'   => 'submenu_item_color',
				'property' => 'color',
				'element'  => array(
					"{$class} .sub-menu a",
				),
			),
			array(
				'choice'   => 'submenu_item_hover_bg',
				'property' => 'background-color',
				'element'  => array(
					"{$class} .sub-menu a:hover",
					"{$class} .sub-menu a:focus",
				),
			),
			array(
				'choice'   => 'submenu_item_hover_color',
				'property' => 'color',
				'element'  => array(
					"{$class} .sub-menu a:hover",
					"{$class} .sub-menu a:focus",
				),
			),
			array(
				'choice'   => 'submenu_item_current_bg',
				'property' => 'background-color',
				'element'  => array(
					"{$class} .sub-menu .current-menu-item > a",
					"{$class} .sub-menu .current-menu-item > a:hover",
					"{$class} .sub-menu .current-menu-item > a:focus",
					"{$class} .sub-menu .current-menu-ancestor > a",
					"{$class} .sub-menu .current-menu-ancestor > a:hover",
					"{$class} .sub-menu .current-menu-ancestor > a:focus",
				),
			),
			array(
				'choice'   => 'submenu_item_current_color',
				'property' => 'color',
				'element'  => array(
					"{$class} .sub-menu .current-menu-item > a",
					"{$class} .sub-menu .current-menu-item > a:hover",
					"{$class} .sub-menu .current-menu-item > a:focus",
					"{$class} .sub-menu .current-menu-ancestor > a",
					"{$class} .sub-menu .current-menu-ancestor > a:hover",
					"{$class} .sub-menu .current-menu-ancestor > a:focus",
				),
			),
		),
		'active_callback' => $callback,
	);
}

function _maicolors_get_nav_highlight_config( $key, $class, $callback ) {

	return array(
		'type'            => 'multicolor',
		'settings'        => $key,
		'label'           => __( 'Primary Nav Highlight', 'mai-colors' ),
		'section'         => 'maicolors_menus',
		'transport'       => 'auto',
		'choices'         => array(
			'button_bg'          => esc_attr__( 'Highlight Button Background', 'mai-colors' ),
			'button_color'       => esc_attr__( 'Highlight Button Color', 'mai-colors' ),
			'button_hover_bg'    => esc_attr__( 'Highlight Button Hover Background', 'mai-colors' ),
			'button_hover_color' => esc_attr__( 'Highlight Button Hover Color', 'mai-colors' ),
		),
		'default' => array(
			'button_bg'          => '',
			'button_color'       => '',
			'button_hover_bg'    => '',
			'button_hover_color' => '',
		),
		'output' => array(
			array(
				'choice'   => 'button_bg',
				'property' => 'background-color',
				'element'  => array(
					"{$class} .highlight > a",
				),
			),
			array(
				'choice'   => 'button_color',
				'property' => 'color',
				'element'  => array(
					"{$class} .highlight > a",
				),
			),
			array(
				'choice'   => 'button_hover_bg',
				'property' => 'background-color',
				'element'  => array(
					"{$class} .highlight > a:hover",
					"{$class} .highlight > a:focus",
				),
			),
			array(
				'choice'   => 'button_hover_color',
				'property' => 'color',
				'element'  => array(
					"{$class} .highlight > a:hover",
					"{$class} .highlight > a:focus",
				),
			),
		),
		'active_callback' => $callback,
	);
}

function _maicolors_get_nav_primary_callback() {
	return has_nav_menu( 'primary' );
}

function _maicolors_get_nav_primary_submenu_callback() {
	return ( has_nav_menu( 'primary' ) && _maicolors_nav_menu_has_submenu( 'primary' ) );
}

function _maicolors_get_nav_primary_highlight_callback() {
	return ( has_nav_menu( 'primary' ) && _maicolors_nav_menu_has_highlight( 'primary' ) );
}

function _maicolors_nav_menu_has_submenu( $menu_name ) {

	// Get menu items.
	$menu_items = _mai_colors_get_nav_menu_items( $menu_name );

	// Loop thru em.
	foreach ( $menu_items as $item ) {
		// If we have a child menu item.
		if ( $item->post_parent > 0 ) {
			return true;
			continue;
		}
	}

	// Nope.
	return false;
}

function _maicolors_nav_menu_has_highlight( $menu_name ) {

	// Get menu items.
	$menu_items = _mai_colors_get_nav_menu_items( $menu_name );

	// Loop thru em.
	foreach ( $menu_items as $item ) {
		// If we have a highlight.
		if ( in_array( 'highlight', $item->classes ) ) {
			return true;
			continue;
		}
	}

	// Nope.
	return false;
}

function _mai_colors_get_nav_menu_items( $menu_name ) {

	// Setup caches.
	static $menu_items_cache = array();
	static $locations_cache  = array();

	// If cached, return it.
	if ( isset( $menu_items_cache[ $menu_name ] ) ) {
		return $menu_items_cache[ $menu_name ];
	}

	// Maybe cache locations.
	if ( empty( $locations_cache ) ) {
		$locations_cache = get_nav_menu_locations();
	}

	// Bail if menu doesn't exist.
	if ( ! isset( $locations_cache[ $menu_name ] ) ) {
		return;
	}

	// Get menu items.
	$menu_items = wp_get_nav_menu_items( wp_get_nav_menu_object( $locations_cache[ $menu_name ] ) );

	// Add cache.
	$menu_items_cache[ $menu_name ] = $menu_items;

	return $menu_items_cache[ $menu_name ];
}
