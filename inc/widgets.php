<?php
/**
 * Keenshot Widget Areas
 * 
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 * @package Keenshot
 */

function keenshot_widgets_init(){    
    $sidebars = array(
        'sidebar'   => array(
            'name'        => __( 'Sidebar', 'keenshot' ),
            'id'          => 'sidebar', 
            'description' => __( 'Manage your sidebar widgets','keenshot')
        ),

        'instagram'   => array(
            'name'        => __( 'Footer Instagram', 'keenshot' ),
            'id'          => 'instagram', 
            'description' => __( 'Manage your instagram photo', 'keenshot' ),
            'before_widget' => '<div class="widgets">',
            'after_widget' => '</div>',
            'before_title' => '<ul class="list-unstyle category">',
            'after_title'  =>  '</ul>',
        ),
    );

    foreach( $sidebars as $sidebar ){
        register_sidebar( array(
    		'name'          => esc_html( $sidebar['name'] ),
    		'id'            => esc_attr( $sidebar['id'] ),
    		'description'   => esc_html( $sidebar['description'] )
    	) );
    }
}
add_action( 'widgets_init', 'keenshot_widgets_init' );