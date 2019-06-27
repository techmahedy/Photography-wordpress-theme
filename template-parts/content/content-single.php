	<div class="col-sm-8 col-xs-12">
			<h2><?php the_title(); ?></h2>
	</div>
	<div class="col-md-8 col-sm-12 col-xs-12 blog-space">
		<div class="blog-content">
					
		<?php the_post_thumbnail( 'large'); ?>
			<div class="post-info">
				<div class="post-meta"> 
					<p><?php echo get_the_date(); ?></p>
					<a class="like whishlist fas fa-heart" rel="<?php echo $post->ID; ?>"><?php echo likeCount($post->ID); ?></a>   
					<p><?php 
					        echo keenshot_category();
							echo keenshot_tag();
					?></p>
				</div>
			</div>

			 <?php echo do_shortcode( '[ssba-buttons]' ); ?>
			
		</div> <!-- Blog content -->
		<div class="default-editor">
				<?php 
					the_content(); 
					wp_link_pages();
					echo keenshot_post_navigation();
				?>
		</div>

	<?php 
		if('post' === get_post_type())
			echo keenshot_related_posts_list('related');
	?>

	<div class="comments">
		<?php 
			if ( comments_open() ):
			comments_template();
			endif;
		?>
	</div>
</div>

<div class="col-md-4">
	<?php get_sidebar(); ?>
</div>
