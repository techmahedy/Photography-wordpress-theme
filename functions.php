<?php
/**
 * Keenshot functions and definitions
 *
 * @link 
 *
 * @package keenshot
 */

/**
 * Keenshot Theme Version
 */
if ( ! defined( 'KEENSHOT_THEME_VERSION' ) ) {
	$theme_data = wp_get_theme();	
	define ( 'KEENSHOT_THEME_VERSION', $theme_data->get( 'Version' ) );
}

/**
 * Keenshot Walker Activation
 */
require get_template_directory() . '/inc/walker.php';


/**
 * Plugin Recommendation
 */
require get_template_directory() . '/inc/tgmpa/recommended-plugins.php';

/**
 * Keenshot Theme Custom Function
 */
require get_template_directory() . '/inc/custom-functions.php';
require get_template_directory() . '/inc/customizer-functions.php';

/**
 * Redirect user after activating keenshot theme
 */

require get_template_directory() . '/inc/redirect-user.php';

/**
 * Keenshot custom customizer function definations
 */

require get_template_directory() . '/customizer-repeater/functions.php';
require get_template_directory() . '/customizer-repeater/inc/footer-section.php';

/**
 * Keenshot extra theme function
 */

require get_template_directory() . '/inc/extras.php';
