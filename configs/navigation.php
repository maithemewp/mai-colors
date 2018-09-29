<?php

/* ********** *
 * Navigation *
 * ********** */
Kirki::add_section( 'maicolors_menus', array(
	'title' => esc_attr__( 'Menus', 'mai-colors' ),
	'panel' => $panel_id,
) );

// Header Nav.
Kirki::add_field( $config_id, _maicolors_nav_config( 'header_nav_color', __( 'Header Nav', 'mai-colors' ), '.nav-header', '_maicolors_has_header_nav' ) );

// Primary Nav.
Kirki::add_field( $config_id, _maicolors_nav_config( 'primary_nav_color', __( 'Primary Nav', 'mai-colors' ), '.nav-primary', '_maicolors_has_primary_nav' ) );

// Secondary/Footer Nav.
Kirki::add_field( $config_id, _maicolors_nav_config( 'secondary_nav_color', __( 'Footer Nav', 'mai-colors' ), '.nav-secondary', '_maicolors_has_secondary_nav' ) );
