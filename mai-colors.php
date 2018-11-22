<?php

/**
 * Plugin Name:     Mai Colors
 * Plugin URI:      https://maitheme.com/
 * Description:     Customize colors in Mai Theme powered websites.
 *
 * Version:         0.2.0
 *
 * GitHub URI:      maithemewp/mai-colors
 *
 * Author:          MaiTheme.com
 * Author URI:      https://maitheme.com
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Main Mai_Colors Class.
 *
 * @since 0.1.0
 */
final class Mai_Colors {

	/**
	 * @var Mai_Colors The one true Mai_Colors
	 * @since 0.1.0
	 */
	private static $instance;

	/**
	 * Main Mai_Colors Instance.
	 *
	 * Insures that only one instance of Mai_Colors exists in memory at any one
	 * time. Also prevents needing to define globals all over the place.
	 *
	 * @since   0.1.0
	 * @static  var array $instance
	 * @uses    Mai_Colors::setup_constants() Setup the constants needed.
	 * @uses    Mai_Colors::includes() Include the required files.
	 * @uses    Mai_Colors::setup() Activate, deactivate, etc.
	 * @see     Mai_Colors()
	 * @return  object | Mai_Colors The one true Mai_Colors
	 */
	public static function instance() {
		if ( ! isset( self::$instance ) ) {
			// Setup the setup
			self::$instance = new Mai_Colors;
			// Methods
			self::$instance->setup_constants();
			self::$instance->includes();
			self::$instance->setup();
		}
		return self::$instance;
	}

	/**
	 * Throw error on object clone.
	 *
	 * The whole idea of the singleton design pattern is that there is a single
	 * object therefore, we don't want the object to be cloned.
	 *
	 * @since   0.1.0
	 * @access  protected
	 * @return  void
	 */
	public function __clone() {
		// Cloning instances of the class is forbidden.
		_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'mai-colors' ), '1.0' );
	}

	/**
	 * Disable unserializing of the class.
	 *
	 * @since   0.1.0
	 * @access  protected
	 * @return  void
	 */
	public function __wakeup() {
		// Unserializing instances of the class is forbidden.
		_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'mai-colors' ), '1.0' );
	}

	/**
	 * Setup plugin constants.
	 *
	 * @access  private
	 * @since   0.1.0
	 * @return  void
	 */
	private function setup_constants() {

		// Plugin version.
		if ( ! defined( 'MAI_COLORS_VERSION' ) ) {
			define( 'MAI_COLORS_VERSION', '0.2.0' );
		}

		// Plugin Folder Path.
		if ( ! defined( 'MAI_COLORS_PLUGIN_DIR' ) ) {
			define( 'MAI_COLORS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
		}

		// Plugin Includes Path.
		if ( ! defined( 'MAI_COLORS_INCLUDES_DIR' ) ) {
			define( 'MAI_COLORS_INCLUDES_DIR', MAI_COLORS_PLUGIN_DIR . 'includes/' );
		}

		// Plugin Folder URL.
		if ( ! defined( 'MAI_COLORS_PLUGIN_URL' ) ) {
			define( 'MAI_COLORS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
		}

		// Plugin Root File.
		if ( ! defined( 'MAI_COLORS_PLUGIN_FILE' ) ) {
			define( 'MAI_COLORS_PLUGIN_FILE', __FILE__ );
		}

		// Plugin Base Name
		if ( ! defined( 'MAI_COLORS_BASENAME' ) ) {
			define( 'MAI_COLORS_BASENAME', dirname( plugin_basename( __FILE__ ) ) );
		}

	}

	/**
	 * Include required files.
	 *
	 * @access  private
	 * @since   0.1.0
	 * @return  void
	 */
	private function includes() {
		include_once MAI_COLORS_INCLUDES_DIR . 'vendor/class-kirki-installer-section.php';
		foreach ( glob( MAI_COLORS_INCLUDES_DIR . '*.php' ) as $file ) { include $file; }
	}

	public function setup() {
		add_action( 'plugins_loaded', array( $this, 'updater' ) );
		add_action( 'init',           array( $this, 'settings' ) );
		add_action( 'login_head',     array( $this, 'login_styles' ) );
	}

	/**
	 * Setup the updater.
	 *
	 * @uses    https://github.com/YahnisElsts/plugin-update-checker/
	 *
	 * @return  void
	 */
	public function updater() {
		if ( ! is_admin() ) {
			return;
		}
		if ( ! class_exists( 'Puc_v4_Factory' ) ) {
			require_once MAI_COLORS_INCLUDES_DIR . 'vendor/plugin-update-checker/plugin-update-checker.php'; // 4.4
		}
		$updater = Puc_v4_Factory::buildUpdateChecker( 'https://github.com/maithemewp/mai-colors/', __FILE__, 'mai-colors' );
	}

	/**
	 * Register the customizer settings..
	 *
	 * @return  void
	 */
	function settings() {

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
			// 'description' => esc_attr__( '', 'mai-colors' ),
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

		// WooCommerce.
		if ( class_exists( 'WooCommerce' ) ) {
			include_once 'configs/woocommerce.php';
		}

	}

	/**
	 * Add custom login styles based on front end styles.
	 * If using a logo and site header is dark, login page would look weird, this matches a little more consistenty.
	 *
	 * @return  void
	 */
	function login_styles() {

		$logo_id = get_theme_mod( 'custom_logo' );

		// Bail if we don't have a custom logo.
		if ( ! $logo_id ) {
			return;
		}

		$colors = get_option( 'mai_colors' );

		// Bail if no colors.
		if ( ! $colors ) {
			return;
		}

		$header_bg    = isset( $colors['site_header']['bg'] ) ? sanitize_hex_color( $colors['site_header']['bg'] ) : false;
		$header_color = isset( $colors['header_nav_color']['item_color'] ) ? sanitize_hex_color( $colors['header_nav_color']['item_color'] ) : false;

		// Bail if no header background color.
		if ( ! $header_bg ) {
			return;
		}

		echo '<style>';
			echo 'body {';
				printf( 'background: %s;', sanitize_hex_color( $header_bg ) );
				$header_color ? printf( 'color: %s;', $header_color ) : '';
			echo '}';
			if ( $header_color ) {
				echo 'a,';
				echo '.login #nav a,';
				echo '.login #backtoblog a {';
					printf( 'color: %s;', $header_color );
				echo '}';
				echo 'a:hover,';
				echo 'a:focus,';
				echo '.login #nav a:hover,';
				echo '.login #nav a:focus,';
				echo '.login #backtoblog a:hover,';
				echo '.login #backtoblog a:focus {';
					printf( 'color: %s;', $header_color );
					echo 'text-decoration: underline dotted;';
				echo '}';
			}
		echo '</style>';
	}

}

/**
 * The main function for that returns Mai_Colors
 *
 * The main function responsible for returning the one true Mai_Colors
 * Instance to functions everywhere.
 *
 * Use this function like you would a global variable, except without needing
 * to declare the global.
 *
 * Example: <?php $plugin = Mai_Colors(); ?>
 *
 * @since 0.1.0
 *
 * @return object|Mai_Colors The one true Mai_Colors Instance.
 */
function Mai_Colors() {
	return Mai_Colors::instance();
}

// Get Mai_Colors Running.
Mai_Colors();
