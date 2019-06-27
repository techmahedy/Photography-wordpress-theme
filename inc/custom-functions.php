<?php
/**
 * Keenshot functions and definitions
 *
 * @link 
 *
 * @package Keenshot
 */

/**
 * Keenshot Theme Setup    
 */
require get_template_directory() . '/inc/theme-setup.php';

/**
 * Keenshot Enque File Scripts
 */
require get_template_directory() . '/inc/enque.php';

/**
 * Keenshot Widgets init    
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Keenshot Ajax Like Button    
 */

require get_template_directory() . '/inc/like-button/like-metabox.php';
require get_template_directory() . '/inc/like-button/like-post.php';

/**
 * Keenshot Wp-Login Page 
 */
 require get_template_directory() . '/inc/wp-login.php';

/**
 * Keenshot Custom Image Size
 */
add_image_size( 'custom-size', 260, 250 );

/**
 * Keenshot Comment Section
 */

function keenshot_get_post_navigation()
{
    if (get_comment_pages_count() > 1 && get_option('page_comments')):

        require get_template_directory().'/sections/comments-nav.php';

    endif;
}

/**
 * Keenshot Previous & Next Post Link Section
 */

function keenshot_post_navigation()
{
    $nav = '<div class="row">';

    $prev = get_previous_post_link('<div class="post-link-nav"><span class="sunset-icon sunset-chevron-left" aria-hidden="true"></span> %link</div>', '%title');
    $nav .= '<div class="col-xs-12 col-sm-6">'.$prev.'</div>';

    $next = get_next_post_link('<div class="post-link-nav">%link <span class="sunset-icon sunset-chevron-right" aria-hidden="true"></span></div>', '%title');
    $nav .= '<div class="col-xs-12 col-sm-6 text-right">'.$next.'</div>';

    $nav .= '</div>';

    return $nav;
}

/**
 * Keenshot Highlighted Search Result
 */

function keenshot_highlight_search_results($text){
    if(is_search()){
        $pattern = '/('. join('|', explode(' ', get_search_query())).')/i';
        $text = preg_replace($pattern, '<span class="search-highlight">\0</span>', $text);
    }
    return $text;
}
add_filter('the_content', 'keenshot_highlight_search_results');
add_filter('the_excerpt', 'keenshot_highlight_search_results');
add_filter('the_title', 'keenshot_highlight_search_results');

/**
 * Keenshot Pagination
 */

function keenshot_post_pagination() {
 
    if( is_singular() )
        return;
 
    global $wp_query;
 
    if( $wp_query->max_num_pages <= 1 )
        return;
 
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
 
    if ( $paged >= 1 )
        $links[] = $paged;
 
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
 
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
 
    echo '<div class="pagination"><ul>' . "\n";
 
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';
 
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
 
        if ( ! in_array( 2, $links ) )
            echo '<li></li>';
    }
 
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
 
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li></li>' . "\n";
 
        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
 
    if ( get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", get_next_posts_link() );
 
    echo '</ul></div>' . "\n";
 
}

function keenshot_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
    <div class="search-form-wraper">
    <input type="text" placeholder="Search Here" value="' . get_search_query() . '" name="s" id="s" />
    <button id="searchsubmit" type="submit"><span class="fas fa-search"></button>
    </div>
    </form>';
    return $form;
}

add_filter( 'get_search_form', 'keenshot_search_form', 100 );


/**
 * Woocommerce support @hoocked 
 */

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'keenshot_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'keenshot_wrapper_end', 10);

function keenshot_wrapper_start() {
    echo '<section id="main">';
}

function keenshot_wrapper_end() {
    echo '</section>';
}