<?php

class Mai_Colors_Navigation {

	function __construct( $panel_id, $config_id ) {

		/* ********** *
		 * Navigation *
		 * ********** */
		Kirki::add_section( 'maicolors_menus', array(
			'title' => esc_attr__( 'Menus', 'mai-colors' ),
			'panel' => $panel_id,
		) );

		/**
		 * Header Nav.
		 */
		Kirki::add_field( $config_id, $this->get_config( __( 'Header Nav', 'mai-colors' ), 'header_nav_color', '.nav-header', $this->has_menu( 'header' ) ) );

		/**
		 * Header Nav Submenu.
		 */
		Kirki::add_field( $config_id, $this->get_submenu_config( __( 'Header Nav Submenu', 'mai-colors' ), 'header_nav_submenu_color', '.nav-header', $this->has_submenu( 'header' ) ) );

		/**
		 * Header Nav Highlight.
		 */
		Kirki::add_field( $config_id, $this->get_highlight_config( __( 'Header Nav Highlight', 'mai-colors' ), 'header_nav_highlight_color', '.nav-header', $this->has_highlight( 'header' ) ) );

		/**
		 * Primary Nav.
		 */
		Kirki::add_field( $config_id, $this->get_config( __( 'Primary Nav', 'mai-colors' ), 'primary_nav_color', '.nav-primary', $this->has_menu( 'primary' ) ) );

		/**
		 * Primary Nav Submenu.
		 */
		Kirki::add_field( $config_id, $this->get_submenu_config( __( 'Primary Nav Submenu', 'mai-colors' ), 'primary_nav_submenu_color', '.nav-primary', $this->has_submenu( 'primary' ) ) );

		/**
		 * Primary Nav Highlight.
		 */
		Kirki::add_field( $config_id, $this->get_highlight_config( __( 'Primary Nav Highlight', 'mai-colors' ), 'primary_nav_highlight_color', '.nav-primary', $this->has_highlight( 'primary' ) ) );

		/**
		 * Secondary Nav.
		 */
		Kirki::add_field( $config_id, $this->get_config( __( 'Footer Nav', 'mai-colors' ), 'secondary_nav_color', '.nav-secondary', $this->has_menu( 'secondary' ) ) );

		/**
		 * Secondary Nav Submenu.
		 */
		Kirki::add_field( $config_id, $this->get_submenu_config( __( 'Footer Nav Submenu', 'mai-colors' ), 'secondary_nav_submenu_color', '.nav-secondary', $this->has_submenu( 'secondary' ) ) );

		/**
		 * Secondary Nav Highlight.
		 */
		Kirki::add_field( $config_id, $this->get_highlight_config( __( 'Footer Nav Highlight', 'mai-colors' ), 'secondary_nav_highlight_color', '.nav-secondary', $this->has_highlight( 'secondary' ) ) );


	}

	function get_config( $label, $key, $class, $callback ) {

		$config = array(
			'type'      => 'multicolor',
			'settings'  => $key,
			'label'     => $label,
			'section'   => 'maicolors_menus',
			'transport' => 'auto',
			'choices'   => array(
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

		// If header nav.
		if ( 'header_nav_color' === $key ) {
			// Remove menu_bg settings.
			unset( $config['choices']['menu_bg'] );
			unset( $config['default']['menu_bg'] );
			// Remove .sub-menu CSS selectors.
			unset( $config['output'][0] );
			unset( $config['output'][1]['element'][2] );
			unset( $config['output'][2]['element'][4] );
			unset( $config['output'][2]['element'][5] );
			unset( $config['output'][3]['element'][4] );
			unset( $config['output'][3]['element'][5] );
		}

		return $config;
	}

	function get_submenu_config( $label, $key, $class, $callback ) {

		return array(
			'type'      => 'multicolor',
			'settings'  => $key,
			'label'     => $label,
			'section'   => 'maicolors_menus',
			'transport' => 'auto',
			'choices'   => array(
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

	function get_highlight_config( $label, $key, $class, $callback ) {

		return array(
			'type'      => 'multicolor',
			'settings'  => $key,
			'label'     => $label,
			'section'   => 'maicolors_menus',
			'transport' => 'auto',
			'choices'   => array(
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

	function has_menu( $menu_name ) {
		return has_nav_menu( $menu_name );
	}

	function has_submenu( $menu_name ) {

		if ( ! $this->has_menu( $menu_name ) ) {
			return false;
		}

		// Get menu items.
		$menu_items = $this->get_menu_items( $menu_name );

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

	function has_highlight( $menu_name ) {

		if ( ! $this->has_menu( $menu_name ) ) {
			return false;
		}

		// Get menu items.
		$menu_items = $this->get_menu_items( $menu_name );

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

	function get_menu_items( $menu_name ) {

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

}

function Mai_Colors_Navigation( $panel_id, $config_id ) {
	return new Mai_Colors_Navigation( $panel_id, $config_id );
}

Mai_Colors_Navigation( $panel_id, $config_id );
