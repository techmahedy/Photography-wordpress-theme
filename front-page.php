<?php
/**
 * The front-page template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage keenshot
 * @since 1.0.0
 */

get_header(); 

   $keenshot_section = keenshot_all_theme_sections();

      if ('posts' == get_option('show_on_front')){
         require get_home_template();
      }else{
         foreach ($keenshot_section as $section) {
           get_template_part( 'sections/'.$section); 
         }
      }    

get_footer(); ?>