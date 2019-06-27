<?php
/**
 * Keenshot functions and definitions
 *
 * @link 
 *
 * @package Keenshot
 */


 if( ! function_exists( 'keenshot_theme_setup' ) ) :
 /**
  * Keenshot Theme Setup
  */

function keenshot_theme_setup(){ 
	/*
	* Make theme available for translation.
    * Translations can be filed in the /languages/ directory. 
    */
    load_theme_textdomain( 'keenshot', get_template_directory() . '/languages' );
    
    // Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	* Let WordPress manage the document title.
	* By adding theme support, we declare that this theme does not use a
	* hard-coded <title> tag in the document head, and expect WordPress to
	* provide it for us.
	*/
	add_theme_support( 'title-tag' );

  
	/*
	* Enable support for woocommerce plugins
	*
	* @link https://developer.wordpress.org/themes/functionality
	featured-images-post-thumbnails/
	*/
	add_theme_support( 'woocommerce' );
	
    /*
	* Enable support for Post Thumbnails on posts and pages.
	*
	* @link https://developer.wordpress.org/themes/functionality
	featured-images-post-thumbnails/
	*/
	

	add_theme_support( 'post-thumbnails');

    /**
    * Add support for core custom logo.
	*
    * @link https://codex.wordpress.org/Theme_Logo
	*/
	add_theme_support(
			'custom-logo',
			  array(
				'flex-width'  => false,
				'flex-height' => false
			)
	);

    /*
	* Switch default core markup for search form, comment form, and comments
	* to output valid HTML5.
	*/
	add_theme_support(
			'html5',
			 array(
				'search-form',
				'comment-form',
				'comment-list',
			)
		);
    
    /**
	* Add support for core custom header.
	*
	* @link https://codex.wordpress.org/Theme_Logo
	*/

    $alfa_custom_header_details = array(
      'header-text'        => true,
      'default-text-color' => '#002244',
      'flex-height'        => true,
      'flex-width'         => true
    );

    add_theme_support("custom-header",$alfa_custom_header_details);

    /**
	* Add support for core custom background.
	*
	* @link https://codex.wordpress.org/Theme_Logo
	*/

    add_theme_support('custom-background');

    /**
	* Add support for core custom editor_style.
	*
	* @link https://codex.wordpress.org/Theme_Logo
	*/

    add_editor_style( 'custom-editor-style.css' );
	/**
	* Add support for core custom logo.
	*
	* @link https://codex.wordpress.org/Theme_Logo
	*/

    // Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Add support for Block Styles.
	add_theme_support( 'wp-block-styles' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );

	// Add support for responsive embedded content.
	add_theme_support( 'responsive-embeds' );
    
    // Register Keenshot Navigation Menu.
	register_nav_menu( "primary", __( "Nav Menu", "keenshot" ) );

	if (is_single()){
		 $content_width = 780;  
	}

    //add_image_size( 'blog-image-size', '300', '300');
}
endif;
add_action("after_setup_theme","keenshot_theme_setup");


if( ! function_exists( 'keenshot_content_width' ) ) :
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function keenshot_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'keenshot_content_width', 780 );
}
endif;
add_action( 'after_setup_theme', 'keenshot_content_width', 0 );