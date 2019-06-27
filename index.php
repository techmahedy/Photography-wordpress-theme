<?php
/**
 * The blog template file
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage keenshot
 * @since 1.0.0
 */

get_header(); ?>

<?php 

   /**
    * Keenshot Before Posts hook
    */
 
    do_action('keenshot_before_posts_content');

    if(have_posts()):        
      while (have_posts()): the_post(); 
        get_template_part( 'template-parts/content/content' );    
        endwhile; 
    endif; 
         
    /**
     * Keenshot Afer Posts hook
     */
 
    do_action('keenshot_after_posts_content');           
  
get_footer();