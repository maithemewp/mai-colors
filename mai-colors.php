<?php

/**
 * Plugin Name:     Mai Colors
 * Plugin URI:      https://maitheme.com/
 * Description:     Customize fonts and typography in Mai Theme powered sites.
 *
 * Version:         0.1.0
 *
 * GitHub URI:      maithemewp/mai-colors
 *
 * Author:          MaiTheme.com
 * Author URI:      https://maitheme.com
 */

include_once plugin_dir_path( __FILE__ ) . 'includes/vendor/class-kirki-installer-section.php';
foreach ( glob( plugin_dir_path( __FILE__ ) . 'includes/*.php' ) as $file ) { include_once $file; }


add_action( 'init', 'maicolors_register_customizer_settings' );
function maicolors_register_customizer_settings() {

	if ( ! class_exists( 'Kirki' ) ) {
		return;
	}

	$config_id      = 'mai_colors';
	$panel_id       = 'mai_colors';
	$settings_field = 'mai_colors';

	Kirki::add_config( $config_id, array(
		'capability'  => 'edit_theme_options',
		'option_type' => 'option',
		'option_name' => $settings_field,
	) );

	/**
	 * Mai Colors
	 */
	Kirki::add_panel( $panel_id, array(
		'title'       => esc_attr__( 'Mai Colors', 'mai-colors' ),
		'description' => esc_attr__( 'My panel description', 'mai-colors' ),
		'priority'    => 55,
	) );

	// Defaults.
	include_once 'configs/defaults.php';

	// Navigation.
	include_once 'configs/navigation.php';

	// Header & Footer.
	include_once 'configs/header-footer.php';

	// Content.
	include_once 'configs/content.php';

}
