<li class="post-item align-center <?php echo $wp_query->current_post % 2 != 0 ? 'reverse' : ''; ?>">
        <a class="permalink" target="_blank" href="<?php the_permalink(); ?>">
              <div class="media ">
                  <?php the_post_thumbnail('large',array('class'=>'blog-image-size')); ?>
               </div>
        </a>

     <div class="post-meta">
       <a class="title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                
           <div class="data">
               <p><?php echo get_the_date(); ?></p>
           </div>
      <div class="comment-whislist">
          <a class="like whishlist" rel="<?php echo $post->ID; ?>"><span class="fas fa-heart"><?php echo likeCount($post->ID); ?></a>   

          <a href="<?php the_permalink(); ?>"><p><?php echo (get_comments_number($post->ID)== 0 ? 'No Comments' : get_comments_number($post->ID). 'Comments' ); ?><span class="fas fa-comment-alt"></span></p></a>
           <p></p>
        </div>
     </div><!-- / post meta -->
 </li><!-- / post -->
