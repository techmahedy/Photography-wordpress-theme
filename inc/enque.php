<?php
/**
 * Keenshot functions and definitions
 *
 * @link 
 *
 * @package Keenshot
 */

if( ! function_exists( 'keenshot_scripts' ) ) :
/**
 * Enqueue scripts and styles.
 */
function keenshot_scripts(){
    
    wp_enqueue_style( "bootstrap-css", get_theme_file_uri( "/assets/css/bootstrap.min.css" ), null,time() );
    wp_enqueue_style( "font-awesome-css", get_theme_file_uri( "/assets/css/font-awesome.min.css" ), null,time());
    wp_enqueue_style( "slick-css", get_theme_file_uri( "/assets/css/slick.min.css" ), null, "1.0" );
    wp_enqueue_style( "main-style-css", get_theme_file_uri( "/assets/css/main-style.css" ), time(), "1.0" );
    wp_enqueue_style( "keenshot-css", get_stylesheet_uri(), time(), KEENSHOT_THEME_VERSION );

    wp_enqueue_script( "bootstrap-js", get_theme_file_uri( "/assets/js/bootstrap.min.js" ), array( "jquery" ), "1.0", true );
    wp_enqueue_script( "slick-js", get_theme_file_uri( "/assets/js/slick.min.js" ), array( "jquery" ), "1.0", true );
    wp_enqueue_script( "mixitup-js", get_theme_file_uri( "/assets/js/mixitup.min.js" ), array( "jquery" ), "1.0", true );

    wp_enqueue_script( "scripts-js", get_theme_file_uri( "/assets/js/scripts.js" ), array( "jquery" ), "1.0", true );
    wp_enqueue_script( "custom-js", get_theme_file_uri( "/assets/js/custom.js" ), array( "jquery" ), time(), true );

    if ( is_page() ){
        wp_enqueue_script( "google-map-js", get_theme_file_uri( "/assets/js/google-map.js" ),null, "1.0", true );
    }

    wp_enqueue_script( "image-popup-js", get_theme_file_uri( "/assets/js/image-popup.js" ), array( "jquery" ), "1.0", true );
    
    wp_register_script( 'like-post', get_theme_file_uri('/assets/js/like-post.js') , array('jquery'),'1.0',true);
    wp_enqueue_script( 'like-post' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
endif;
add_action( 'wp_enqueue_scripts', 'keenshot_scripts' );
