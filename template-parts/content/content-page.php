<?php the_post(); ?>    
<section class="page-banner">
        <div class="container">
            <div class="row">    
                    <h1><?php echo apply_filters( 'keenshot_page_title',$wp_query->post->post_title, 'keenshot'); ?></h1>
                    <h5><?php  echo apply_filters( 'keenshot_page_subtitle', __('Lorem ipsum donor lopen kess hien loream ipsum', 'keenshot') ); ?></h5>
            </div>
        </div>
    </section><!--  /end of page-banner -->     

    <section class="blog-list blog-single" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="container">
            <div class="row">

    <div class="col-md-8 col-sm-12 col-xs-12">
        <div class="blog-content">
                    
        <?php the_post_thumbnail( 'large'); ?>
            
        </div> <!-- Blog content -->
        <div class="default-editor">
                <?php 
                    the_content(); 
                ?>
        </div>
          </div> 
          <div class="col-md-4 col-sm-12 col-xs-12">
            <?php get_sidebar(); ?>
          </div>
        </div>
    </div>
</section><!--  /end of blog-list -->