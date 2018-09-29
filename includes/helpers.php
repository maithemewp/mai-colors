<?php


function _maicolors_nav_menu_has_highlight( $menu_name ) {

	// Setup cache.
	static $locations = null;

	// If cache is not populated, do it now.
	if ( null === $locations ) {
		$locations = get_nav_menu_locations();
	}

	// Bail if menu doesn't exist.
	if ( ! isset( $locations[ $menu_name ] ) ) {
		return false;
	}

	// Get menu items.
	$menu_items = wp_get_nav_menu_items( wp_get_nav_menu_object( $locations[ $menu_name ] ) );

	// Loop thru em.
	foreach ( $menu_items as $item ) {
		// If we have a highlight.
		if ( in_array( 'highlight', $item->classes ) ) {
			return true;
		}
	}

	// Nope.
	return false;
}

function _maicolors_nav_config( $setting, $label, $class, $active_callback ) {
	$config = array(
		'type'            => 'multicolor',
		'settings'        => "$setting",
		'label'           => "$label",
		'section'         => 'maicolors_menus',
		'transport'       => 'auto',
		'choices'         => _maicolors_nav_choices( $setting, $class),
		'default'         => _maicolors_nav_defaults( $setting, $class ),
		'output'          => _maicolors_nav_output( $setting, $class ),
		'active_callback' => $active_callback,
	);
	return $config;
}

function _maicolors_nav_choices( $setting, $class ) {
	$choices = array();
	// Header nav does not have a bg setting.
	// if ( 'header_nav_color' !== $setting ) {
		$choices['menu_bg'] = esc_attr__( 'Background', 'mai-colors' );
	// }
	$choices = array_merge( $choices, array(
		'item_color'         => esc_attr__( 'Item Color', 'mai-colors' ),
		'item_hover_bg'      => esc_attr__( 'Item Hover Background', 'mai-colors' ),
		'item_hover_color'   => esc_attr__( 'Item Hover Color', 'mai-colors' ),
		'item_current_bg'    => esc_attr__( 'Current Item Background', 'mai-colors' ),
		'item_current_color' => esc_attr__( 'Current Item Color', 'mai-colors' ),
	) );
	// Only header nav has highlight button settings. Only show the settings if we actually have a highlight item.
	// if ( 'header_nav_color' === $setting && ( _maicolors_nav_menu_has_highlight( 'header_left' ) || _maicolors_nav_menu_has_highlight( 'header_right' ) ) ) {
	if ( _maicolors_nav_menu_has_highlight( 'header_left' ) || _maicolors_nav_menu_has_highlight( 'header_right' ) ) {
		$choices = array_merge( $choices, array(
			'button_bg'          => esc_attr__( 'Highlight Button Background', 'mai-colors' ),
			'button_color'       => esc_attr__( 'Highlight Button Color', 'mai-colors' ),
			'button_hover_bg'    => esc_attr__( 'Highlight Button Hover Background', 'mai-colors' ),
			'button_hover_color' => esc_attr__( 'Highlight Button Hover Color', 'mai-colors' ),
		) );
	}
	return $choices;
}

function _maicolors_nav_defaults( $setting, $class ) {
	$defaults = array();
	// Header nav does not have a bg setting.
	// if ( 'header_nav_color' !== $setting ) {
		$defaults['menu_bg'] = '';
	// }
	$defaults = array_merge( $defaults, array(
		'item_color'         => '',
		'item_hover_bg'      => '',
		'item_hover_color'   => '',
		'item_current_bg'    => '',
		'item_current_color' => '',
	) );
	// Only header nav has highlight button settings. Only show the settings if we actually have a highlight item.
	// if ( 'header_nav_color' === $setting && ( _maicolors_nav_menu_has_highlight( 'header_left' ) || _maicolors_nav_menu_has_highlight( 'header_right' ) ) ) {
	if ( _maicolors_nav_menu_has_highlight( 'header_left' ) || _maicolors_nav_menu_has_highlight( 'header_right' ) ) {
		$defaults = array_merge( $defaults, array(
			'button_bg'          => '',
			'button_color'       => '',
			'button_hover_bg'    => '',
			'button_hover_color' => '',
		) );
	}
	return $defaults;
}

function _maicolors_nav_output( $setting, $class ) {
	$output = array();
	// Header nav does not have a bg setting.
	// if ( 'header_nav_color' !== $setting ) {
		$output['menu_bg'] = array(
			'choice'   => 'menu_bg',
			'property' => 'background-color',
			'element'  => array(
				"$class",
				"$class .sub-menu a",
				".home $class .current-menu-item > a",
			),
		);
	// }
	$output = array_merge( $output, array(
		array(
			'choice'   => 'item_color',
			'property' => 'color',
			'element'  => array(
				"$class a",
				"$class .nav-search",
				"$class .sub-menu a",
				".home $class .current-menu-item > a",
			),
		),
		array(
			'choice'   => 'item_hover_bg',
			'property' => 'background-color',
			'element'  => array(
				"$class a:hover",
				"$class a:focus",
				"$class .nav-search:hover",
				"$class .nav-search:focus",
				"$class .sub-menu a:hover",
				"$class .sub-menu a:focus",
				"$class .menu-item-has-children:not(.current-menu-ancestor):hover > a",
			),
		),
		array(
			'choice'   => 'item_hover_color',
			'property' => 'color',
			'element'  => array(
				"$class a:hover",
				"$class a:focus",
				"$class .nav-search:hover",
				"$class .nav-search:focus",
				"$class .sub-menu a:hover",
				"$class .sub-menu a:focus",
				"$class .menu-item-has-children:not(.current-menu-ancestor):hover > a",
			),
		),
		array(
			'choice'   => 'item_current_bg',
			'property' => 'background-color',
			'element'  => array(
				"$class .current-menu-item > a",
				"$class .current-menu-item > a:hover",
				"$class .current-menu-item > a:focus",
				"$class .current-menu-ancestor > a",
				"$class .current-menu-ancestor > a:hover",
				"$class .current-menu-ancestor > a:focus",
			),
		),
		array(
			'choice'   => 'item_current_color',
			'property' => 'color',
			'element'  => array(
				"$class .current-menu-item > a",
				"$class .current-menu-item > a:hover",
				"$class .current-menu-item > a:focus",
				"$class .current-menu-ancestor > a",
				"$class .current-menu-ancestor > a:hover",
				"$class .current-menu-ancestor > a:focus",
			),
		),
	) );
	// Only header nav has highlight button settings. Only show the settings if we actually have a highlight item.
	// if ( 'header_nav_color' === $setting && ( _maicolors_nav_menu_has_highlight( 'header_left' ) || _maicolors_nav_menu_has_highlight( 'header_right' ) ) ) {
	if ( _maicolors_nav_menu_has_highlight( 'header_left' ) || _maicolors_nav_menu_has_highlight( 'header_right' ) ) {
		$output = array_merge( $output, array(
			array(
				'choice'   => 'button_bg',
				'property' => 'background-color',
				'element'  => array(
					"$class .highlight > a",
				),
			),
			array(
				'choice'   => 'button_color',
				'property' => 'color',
				'element'  => array(
					"$class .highlight > a",
				),
			),
			array(
				'choice'   => 'button_hover_bg',
				'property' => 'background-color',
				'element'  => array(
					"$class .highlight > a:hover",
					"$class .highlight > a:focus",
				),
			),
			array(
				'choice'   => 'button_hover_color',
				'property' => 'color',
				'element'  => array(
					"$class .highlight > a:hover",
					"$class .highlight > a:focus",
				),
			),
		) );
	}
	return $output;
}

function _maicolors_has_header_nav() {
	return ( has_nav_menu( 'header_left' ) || has_nav_menu( 'header_right' ) );
}

function _maicolors_has_primary_nav() {
	return has_nav_menu( 'primary' );
}

function _maicolors_has_secondary_nav() {
	return has_nav_menu( 'secondary' );
}
