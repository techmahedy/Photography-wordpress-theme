<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/
 *
 * @package Keenshot
 */


    /**
      * Doctype Hook
      * 
      * @hooked keenshot_doctype
      */
      
      do_action( 'keenshot_doctype' );
?>

<head itemscope itemtype="http://schema.org/WebSite">

<?php 

     /**
       * Before wp_head
       * 
       * @hooked keenshot head
       */

    do_action( 'keenshot_before_wp_head' );

    wp_head(); 
?>

</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">

<?php

      /**
        * Before wp_head
        * 
        * @hooked keenshot after body
        */

    do_action( 'keenshot_content_after_body' );
   