<?php 

/**
 * Keenshot single post category
 */

  function keenshot_category(){
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		$categories_list = get_the_category_list( esc_html__( ',','keenshot' ) );
		if ( $categories_list ) {
			echo '<span class="fas fa-folder"></span>' . $categories_list;
		 }
	  }
   }  

/**
 * Keenshot single custom post taxonomy
 */

function keenshot_taxonomy($post){
   $terms = wp_get_post_terms($post, 'cat');

    if(isset($terms)){
      foreach ($terms as $term){
        echo '<a class="category"><span class="fas fa-folder"></span>' . $term->name
      . '</a>';
      } 
    }
  }  

/**
 * Keenshot single post tag
 */

   function keenshot_tag(){
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		$tags_list = get_the_tag_list( '', esc_html_x( ', ', ', ', 'keenshot' ) );
		if ( $tags_list ) {
			echo '<span class="fas fa-tag"></span>' . $tags_list;
		}
	  }
    }

/**
 * Keenshot related post 
 */

function keenshot_related_posts_list( $status, $post_type = 'post' ){

    global $post;
    $args = array(
        'post_type'           => $post_type,
        'posts_status'        => 'publish',
        'ignore_sticky_posts' => true
    );
    
    switch( $status ){

        case 'related':
        $args['posts_per_page'] = 6;
        $args['post__not_in']   = array( $post->ID );
        $args['orderby']        = 'rand';
        $title                  = get_theme_mod( 'related_post_title', __( 'You may also like...', 'keenshot' ) );
        $class                  = 'related-posts';
        $image_size             = 'keenshot-related';        
        $cats                   = get_the_category( $post->ID );        
        if( $cats ){
            $c = array();
            foreach( $cats as $cat ){
                $c[] = $cat->term_id; 
            }
            $args['category__in'] = $c;
        }        
        break;
    }
    
    $qry = new WP_Query( $args );
    
    if( $qry->have_posts() ){ ?>    
        <div class="<?php echo esc_attr( $class ); ?>">
    		<?php 
            if( $title ){
                if( $status == 'latest' ) echo '<header class="section-header">';
                echo '<h2 class="section-title">' . esc_html( $title ) . '</h2>'; 
                if( $status == 'latest' ) echo '</header>';   		  
    		}  
            ?>
			<div class="post-holder">
                <?php while( $qry->have_posts() ){ $qry->the_post(); ?>
                <div class="col">
    				<a href="<?php the_permalink(); ?>">
                        <?php
                            if( has_post_thumbnail() ){
                                the_post_thumbnail('small',array('class'=> 'related-post'));
                            }
                        ?>
                    </a>
                    <?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
    			</div>
    			<?php } ?>
            </div><!-- .post-holder -->
    	</div>
        <?php
    wp_reset_postdata();
       }
    }
/**
 * Custom post taxonomy
 */

function keenshot_custom_taxonomy(){


    $terms = get_terms( array(
               'taxonomy' => 'cat',
               'hide_empty' => false,
    ));
 
    echo '<div class="widget widget_categories"><h2 class="widgettitle">' . esc_html( 'Categories', 'keenshot' ) . '</h2>'; 
     foreach ($terms as $term): ?>
        <li><a href="<?php echo get_term_link($term); ?>"><?php echo $term->name; ?><span>(<?php echo $term->count; ?>)</span></a>
       </li> 
    <?php 
        endforeach; 
    echo "</div>";
    wp_reset_query();
 }


function keenshot_cpt_recent_post( $status, $post_type = 'gallery' ){
    global $post;
    add_image_size( 'recent-post', '70', '60');
    $args = array(
        'post_type'           => $post_type,
        'posts_status'        => 'publish',
    );
    
    switch( $status ){
        case 'latest':        
        $args['posts_per_page'] = 10;
        $title                  = __( 'Latest Posts', 'keenshot' );
        $class                  = '';
        break;
    }
    
    $query = new WP_Query( $args );
    
    if( $query->have_posts() ){ ?>    
        <div class="<?php echo esc_attr( $class ); ?>">
            <ul class="list-unstyle recent-post">
            <?php 
            if( $title ){
                if( $status == 'latest' )
                echo '<h2 class="widgettitle">' . esc_html( $title ) . '</h2>';        
             }  
            ?>
            <?php while( $query->have_posts() ){ $query->the_post(); ?>
                    <li>
                       <div class="media">
                           <?php the_post_thumbnail('recent-thumbnail'); ?>
                       </div>
                        <div class="post-meta">
                            <a href="<?php the_permalink() ?>" title="<?php echo esc_attr( get_the_title() ? get_the_title() : get_the_ID() ); ?>"><?php if ( get_the_title() ) the_title(); else the_ID(); ?></a>

                            <span class="post-date"><?php echo get_the_date(); ?></span>
                        </div>
                    </li>
            <?php } ?>
                </ul>
        </div>
        <?php
  wp_reset_postdata();
    }
}















