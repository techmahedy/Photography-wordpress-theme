<?php
/**
 * Keenshot functions and definitions
 *
 * @link 
 *
 * @package Keenshot
 * 
 * Keenshot Customizer Repeater Function
 */

function keenshot_customizer_repeater_data(string $settings){

    $keenshot_settings = get_theme_mod($settings, json_encode( array('')) ); 
    return $keenshot_settings;
 
 }

/**
 * Customizer Banner Function
 */
add_action('keenshot_banner','keenshot_banner_section');

if(!function_exists('keenshot_banner_section')):
function keenshot_banner_section() {
   
    $counter = 0;

    foreach(json_decode(keenshot_customizer_repeater_data('keenshot_home_page_slider_settings')) as $repeater_item){
       $counter++;
         if($repeater_item->image_url == ''){
            return;
        }else{
           if($counter == 1){
            echo '<section class="banner">';
         }
        echo '<div class="item" style="background: url('.esc_url($repeater_item->image_url).')"></div>';

       }
   }
    echo '</section>';
}
endif;
/**
 * Customizer Client Logo Function & Definition
 */

add_action('keenshot_client_logo','keenshot_client_logo_section');

if(!function_exists('keenshot_client_logo_section')):
function keenshot_client_logo_section() {
   
    $counter = 0;

    foreach(json_decode(keenshot_customizer_repeater_data('keenshot_client_logo_settings')) as $repeater_item){
       $counter++;
         if($repeater_item->image_url == ''){
            return;
        }else{
           if($counter == 1){
            echo '<section class="client-logos">
                    <div class="container">
                        <div class="logos">';
         }
        echo '<a target="_blank" href="'.$repeater_item->link.'"><img src="'.esc_url($repeater_item->image_url).'" class="img-responsive" alt="'.esc_url($repeater_item->image_url).'"></a>';
       }
   }
    echo '</div>
     </div>
</section>';
}
endif;
/**
 * Customizer About Us Function & Definition
 */

add_action('keenshot_about_us','keenshot_about_section');

if(!function_exists('keenshot_about_section')):
function keenshot_about_section() {
   
    $counter = 0;

    foreach(json_decode(keenshot_customizer_repeater_data('keenshot_about_settings')) as $repeater_item){
       $counter++;
         if($repeater_item->image_url == ''){
            return;
        }else{
           if($counter == 1){
            echo '<section class="about-us">
                    <div class="container">
                       <div class="row">
                         <div class="col-md-6 col-sm-6 col-xs-6 col">';
           }
    
          echo '<h1>'.$repeater_item->title.'</h1>';
          echo '<h2>'.$repeater_item->subtitle.'</h2>';
          echo '<p>'.$repeater_item->text.'</p>';

          if($counter == 1){
            echo '<div class="social-media">
                 <ul class="list-inline">';
          }

    $social_repeater = json_decode(html_entity_decode($repeater_item->social_repeater));

          if(isset($social_repeater)){
            foreach($social_repeater as $social_repeater){ 
                echo '<li><a style="color: #4267b2;" target="_blank" href="'.$social_repeater->link.'"><span class="fab '. $social_repeater->icon.'"></span></a></li>';
          }
        }
        echo ' </ul>
           </div>
        </div>';
    }

    if($counter == 1){
        echo '<div class="col-md-6 col-sm-6 col-xs-6 col">
        <div class="media">';
    }
    echo '<img src="'.$repeater_item->image_url.'" class="img-responsive" alt="'.$repeater_item->image_url.'">';

        echo '<div class="patarn"> <img src="'.get_theme_file_uri( 'assets/images/Dot.png' ).'" alt="image">
        </div>';
}
    echo ' </div>
         </div>
       </div>
    </div>
</section>';
}
endif;


/**
 * Customizer Testimonial Function & Definition
 */
add_action('keenshot_testimonial','keenshot_testimonial_section');

if(!function_exists('keenshot_testimonial_section')):
function keenshot_testimonial_section() {
   
    $counter = 0;

    foreach(json_decode(keenshot_customizer_repeater_data('keenshot_testimonial_settings')) as $repeater_item){
       $counter++;
        if($repeater_item->image_url == ''){
            return;
        }else{
           if($counter == 1){
         echo '<section class="testimonials">
            <div class="container">
                <div class="row align-center">
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        <div class="testimonial-quote">
                            <h1>'. apply_filters( "keenshot_testimonial_title", __("Testimonial", "keenshot")).'</h1>
                            <div class="testimonial-quote-slider">';
           }
          
          echo ' <div class="slider-item text-center">
                    <div class="slider-content">
                 <span class="fas fa-quote-left"></span>';
          echo '<p>'.$repeater_item->text.'</p>';       
          echo '<strong>'.$repeater_item->title.'</strong>';     
          echo ' </div></div>';
        }
    }
    echo '</div>
              </div>
                 </div>
               <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="testimonial-image-slider">';

    foreach(json_decode(keenshot_customizer_repeater_data('keenshot_testimonial_settings')) as $repeater_item){
        if(isset($repeater_item)){
            echo '<div class="slider-img">';
            echo '<img src="'.esc_url($repeater_item->image_url).'" class="img-responsive" alt="'.esc_url($repeater_item->image_url).'">';
            echo '</div>';
        }
    }
    
    echo '</div>
        </div>
    </div>
</div>
</section>';
}
endif;

/**
 * Keenshot Team Functions & Definitions
 */

add_action('keenshot_team','keenshot_team_section');

if(!function_exists('keenshot_team_section')):
function keenshot_team_section() {

$counter = 0;  

foreach(json_decode(keenshot_customizer_repeater_data('keenshot_team_settings')) as $repeater_item){
    $counter++;
    if($repeater_item->image_url == ''){
       return;
    }else{
      if($counter == 1){
        echo '<section class="team-member">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                    <div class="section-title">
                        <span><img src="'.get_stylesheet_directory_uri().'/assets/images/separator.png'.'" class="img-responsive" alt=""></span>
                            <h1>'.apply_filters( "keenshot_team_filter", __("Team", "keenshot")).'</h1>
                        <span><img src="'.get_stylesheet_directory_uri().'/assets/images/separator.png'.'" class="img-responsive" alt="Team member image"></span>
                </div>
            </div>
        </div>
    <div class="row">';
      }


   }
  echo '<div class="col-md-4 col-sm-6 col-xs-6 col">
      <div class="member">
<div class="media">';
   echo '<img src="'.$repeater_item->image_url.'" alt="'.$repeater_item->image_url.'">';
   echo '<div class="social-media">
   <ul class="list-inline">';

   $social_repeater = json_decode(html_entity_decode($repeater_item->social_repeater));
   foreach($social_repeater as $social_repeater){
    echo '<li><a style="color: #4267b2;" target="_blank" href="'.$social_repeater->link.'"><span class="fab '.$social_repeater->icon.'"></span></a></li>';
   }
   echo ' </ul>
   </div>
</div>';

echo ' <div class="member-meta">
<div class="info text-center">';

echo '<h4>'.$repeater_item->title.'</h4>';
echo '<p>'.$repeater_item->subtitle.'</p>';
echo ' </div></div></div></div>';
}
    
         
    echo '</div>
    </div>
</section>';
}
endif;

/**
 * Keenshot Skill Functions & Definitions
 */

add_action('keenshot_skill','keenshot_skill_section');

if(!function_exists('keenshot_skill_section')):
function keenshot_skill_section() {

    $counter = 0;  
    
    foreach(json_decode(keenshot_customizer_repeater_data('keenshot_skill_settings')) as $repeater_item){
        $counter++;
      
        if($repeater_item->title == ''){
           return;
        }else{
          if($counter == 1){
            echo '<section class="skills">
            <div class="container">
                <div class="row">';
          }
        echo '<div class="col-md-6 col-sm-6 col-xs-12">
        <div class="skills-description">';
        echo '<h1>'.esc_html($repeater_item->title).'</h1>';
        echo '<p>'.esc_html($repeater_item->text).'</p>';

        echo '</div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="skills-bar">';
       }

    $social_repeater = json_decode(html_entity_decode($repeater_item->social_repeater));

       if(isset($social_repeater)){
        foreach($social_repeater as $social_repeater){
          echo '<h3 class="progress-title">'.$social_repeater->icon.'</h3>';
          echo '<div class="progress" style="color:#337ab7;">';
          echo '<div class="progress-bar" style="width:'.$social_repeater->link.'%"></div>';
          echo ' <span class="progress-value">'.$social_repeater->link.'%</span>';
          echo '</div>';
        }
    } 

    echo '</div></div>';
  
    }
             
    echo '</div></div></section>';
}
endif;
/**
 * Keenshot Front Blog Functions & Definitions
 */

add_action('keenshot_front_blog_post','keenshot_front_blog_post_section');

if(!function_exists('keenshot_front_blog_post_section')):
function keenshot_front_blog_post_section() {
  ?>
<section class="latest-post">
    <div class="container">
        <div class="row">
            <div class="col-md-1 col-sm-1 col-xs-12">
                <h1>
                    <span><?php _e('P','keenshot'); ?></span>
                    <span><?php _e('O','keenshot'); ?></span>
                    <span><?php _e('S','keenshot'); ?></span>
                    <span><?php _e('T','keenshot'); ?></span>
                </h1>
            </div>
            <div class="col-md-11 col-sm-11 col-xs-12">
                <div class="post-wrapper">
                <?php 
                $query = array(
                            'post_type' => 'post',
                            'post_status' => 'publish',
                            'posts_per_page' => 8,
                            'order' => 'DESC'
                        );
                    $loop = new WP_Query($query);
                    while ($loop->have_posts() ){
                        $loop->the_post();
            
                if ( has_post_thumbnail() ){
                $thumbnail_url = get_the_post_thumbnail_url(null,"large");
                printf( '<a class="post popup" data-content-id="#thepop" href="%s">',$thumbnail_url);
                the_post_thumbnail('custom-size'); 
                echo '</a>';

           } } ?>

                </div>
            </div>
        </div>
    </div>
</section><!--  /end of latest-post -->
<?php 
}
endif;
/**
 * Keenshot About Page Template Functions & Definitions
 */
add_action('keenshot_about_page_template_data','keenshot_about_page_template_data_section');

if(!function_exists('keenshot_about_page_template_data_section')):
 function keenshot_about_page_template_data_section() {

    $counter = 0;  
    
    foreach(json_decode(keenshot_customizer_repeater_data('keenshot_about_settings')) as $repeater_item){
        $counter++;

      if($repeater_item->image_url == ''){
         return;
      }else{

        if($counter == 1){
            echo '<section class="about-me">
            <div class="container">
                <div class="about-me-wrapper">
                    <div class="media">';
        }
       
        echo '<img src="'.esc_url($repeater_item->image_url).'" class="img-responsive" alt="'.esc_url($repeater_item->image_url).'"></div>';

        echo '<div class="about-meta">
        <h2>'.esc_html($repeater_item->title).'</h2>
        <div class="stylish-border"></div>
        <h3>'.esc_html($repeater_item->subtitle).'</h3>
        <p>'.esc_html($repeater_item->text).'</p>
        <a class="btn" href="/contact">'.apply_filters( 'keenshot_contact_button_title', __('Get in touch', 'keenshot')).'</a>
    </div>';
       
    echo '</div>
    </div>
</section>';
        }
    }
}
endif;
/**
 * Google map api key function & definition
 */
add_action('keenshot_google_map_key','keenshot_google_map_key_section');

if(!function_exists('keenshot_google_map_key_section')):
function keenshot_google_map_key_section(){
  
 foreach(json_decode(keenshot_customizer_repeater_data('keenshot_contact_settings')) as $repeater_item){

    echo '<script async defer src="'.esc_url($repeater_item->link).'"
    type="text/javascript"></script>';
  }

}
endif;

/**
 * Keenshot contact address
 */

add_action('keenshot_contact_address','keenshot_contact_address_section');

if(!function_exists('keenshot_contact_address_section')):
function keenshot_contact_address_section(){
    $counter = 0;  
    
    foreach(json_decode(keenshot_customizer_repeater_data('keenshot_contact_settings')) as $repeater_item){
        $counter++;
      
        if($repeater_item->title == ''){
           return;
        }else{
          if($counter == 1){
            echo '<section class="contact-information">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-sm-7 col-xs-12">
                       <div id="gmap"></div>
                    </div>
                    <div class="col-md-5 col-sm-5 col-xs-12">
                       <div class="contact-info">';
            }
       
        echo '<h4>'.apply_filters( 'keenshot_contact_info_title', __('Contact Info', 'keenshot')).'</h4>';

        echo '<p><strong>'. apply_filters( 'keenshot_contact_address_title', __('Phone', 'keenshot')).'</strong>
        <a>'. esc_html($repeater_item->title,'keenshot').'</a>
        </p>';

        echo '<p><strong>'. apply_filters( 'keenshot_contact_address_phone', __('Phone', 'keenshot')).'</strong> 
        <a>'.esc_html($repeater_item->subtitle,'keenshot').'</a><br></p>

        <p><strong>'. apply_filters( 'keenshot_contact_address_email', __('Email', 'keenshot')).'</strong> 
        <a href="mailto:'.esc_url($repeater_item->text, 'keenshot').'">'.$repeater_item->text.'</a></p>';
       
        }
    }

    echo '</div>
    </div>
</div>
</div>
</section>';
}
endif;


/**
 * Keenshot footer address function & definition
 */

add_action('keenshot_footer','keenshot_footer_section');

if(!function_exists('keenshot_footer_section')):
 function keenshot_footer_section(){
   ?>
   <section class="footer">
        <div class="container">
            <div class="footer-wrapper">
                <div class="quick-contact">
                    <div class="widgets" id="copywrite">
                        <div class="widget-title">
                            <h3><?php echo apply_filters( 'keenshot_contact_filter', __('Contact', 'keenshot')); ?></h3>
                            <div class="stylish-border"></div>
                        </div>

                        <div class="info-item">
                            <div class="icon">
                                <span class="fas fa-phone"></span>
                            </div>
                            <?php if(get_theme_mod( 'keenshot_footer_phone_settings', '' )): ?>
                            <a href="tel:<?php echo get_theme_mod( 'keenshot_footer_phone_settings', '' ); ?>"><?php echo get_theme_mod( 'keenshot_footer_phone_settings', '' ); ?></a>
                            <?php endif; ?>
                        </div><!--  / Info Item -->
                        <div class="info-item">
                            <div class="icon">
                                <span class="fas fa-map-marker-alt"></span>
                            </div>
                            <?php if(get_theme_mod( 'keenshot_footer_address_settings', '' )): ?>
                            <a target="_blank" href="<?php echo get_theme_mod( 'keenshot_footer_google_map_settings', '' ); ?>"><?php echo get_theme_mod( 'keenshot_footer_address_settings', '' ); ?></a>
                             <?php endif; ?>
                        </div><!--  / Info Item -->

                    </div><!--  / widget -->
                </div>
          

           
                <div class="copy-right-area text-center" id="address">
                <?php if(get_theme_mod( 'sample_default_footer_text_body', '' )): ?>
                    <div class="widgets">
                        <div class="copy-right">
                            <a href="<?php site_url(); ?>">
                                <img src="<?php echo keenshot_footer_image_option(); ?>" class="img-responsive" alt="Keenshot footer image">
                            </a>
                            <p><?php echo get_theme_mod( 'sample_default_footer_text_body', '' ); ?></p>
                            <p><small><?php echo get_theme_mod( 'sample_default_footer_text', '' ); ?></small></p>
                        </div>
                    </div><!--  / widget -->
                    <?php endif; ?>
                </div>
         

            <?php  if(get_theme_mod( 'keenshot_socialite_settings', '' )):  ?>
                <div class="instagram-photos">
                    <div class="widgets">
                        <div class="widget-title">
                            <h3><?php echo apply_filters( 'keenshot_instagram_filter', __('Instagram Photo', 'keenshot')); ?></h3>
                            <div class="stylish-border"></div>
                        </div>

                        <div class="instagram-photo_img"> 
                              <?php if (is_active_sidebar('instagram')) {
                                dynamic_sidebar( 'instagram' );
                               }?>
                        </div>

                        <div class="social-media" id="socialite-footer">
                            <ul class="list-inline">
                <?php 
                   foreach(json_decode(keenshot_customizer_repeater_data('keenshot_socialite_settings')) as $repeater_item):
                         $social_repeater = json_decode(html_entity_decode($repeater_item->social_repeater));
                              if(isset($social_repeater)):
                            foreach($social_repeater as $social_repeater):
                 ?>
               
                 <li><a style="color: #4267b2;" target="_blank" href="<?php echo $social_repeater->link; ?>"><span class="fab <?php echo $social_repeater->icon; ?>"></span></a></li>
                <?php endforeach; endif; endforeach; ?>
                            </ul>
                        </div><!--  / Social Media -->
                    </div><!--  / widget -->
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section><!--  /end of footer -->
 <?php
 }
endif;

add_action('keenshot_enqueue_script','keenshot_enqueue_script_section');

if(!function_exists('keenshot_enqueue_script_section')):
function keenshot_enqueue_script_section(){
         wp_footer();  ?>
      </body>
   </html>
<?php
}
endif;

/**
 * Keenshot header doctype
 */
add_action('keenshot_doctype','keenshot_doctype_header');
if(!function_exists('keenshot_doctype_header')):
function keenshot_doctype_header(){
?>

<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">

 <?php 
}
endif;

/**
 * Keenshot header head
 */
add_action('keenshot_before_wp_head','keenshot_before_wp_head_section');
if(!function_exists('keenshot_before_wp_head_section')):
function keenshot_before_wp_head_section(){
?>

<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

 <?php 
}
endif;

/**
 * Keenshot body
 */
add_action('keenshot_content_after_body','keenshot_content_after_body_section');
if(!function_exists('keenshot_content_after_body_section')):
function keenshot_content_after_body_section(){
    ?>
    <header class="header">
        <nav class="navbar">
            <div class="container">
                <div class="navigation">
                    <div class="navbar-header">
                        <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="icon-bar"><span class="inner"></span></span>
                            <span class="icon-bar"><span class="inner"></span></span>
                            <span class="icon-bar"><span class="inner"></span></span>
                            <span class="icon-bar"><span class="inner"></span></span>
                        </button>
                        <div class="logo">
                <?php 
                    if(has_custom_logo()){
                       the_custom_logo();
                      }
                    else{
                      echo '<h1><a href="'.site_url().'">'.get_bloginfo('name').'</a></h1>';
                      echo '<h5><a href="'.site_url().'">'.get_bloginfo('description').'</a></h5>';
                     }
                  ?>
                        </div>
                    </div>
                                                 
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        
   <?php
   
    $keenshot_nav_menu = wp_nav_menu( array(
        'menu'           => __('Primary Menu','keenshot'),
        'theme_location' => 'primary',
        'menu_id'        => 'primary',
        'menu_class'     => 'nav navbar-nav navbar-right',
        'echo'           => false,
        'walker' => new Keenshot_Walker_Nav_Caret()
    ) );
    
     echo $keenshot_nav_menu;

    ?>
                       
                    </div>
                </div>
            </div>
        </nav><!-- / navigation  -->
    </header><!-- / Header Area  -->
<div class="header_gutter"></div>
<?php
}
endif;

/**
 * Keenshot Contact Page Template
 */
add_action('keenshot_contact_page_template_content','keenshot_contact_page_template_content_section');
if(!function_exists('keenshot_contact_page_template_content_section')):
function keenshot_contact_page_template_content_section(){
?>
<section class="contact-us">
<?php  
  foreach(json_decode(keenshot_customizer_repeater_data('keenshot_contact_page_settings')) as $repeater_item):
?>
    <div class="media hidden-xs" style="background: url('<?php echo isset($repeater_item) ? esc_url($repeater_item->image_url,'keenshot') : ''; ?>');">
       
    </div>
    <div class="media visible-xs">
    <img src="<?php echo isset($repeater_item) ? esc_url($repeater_item->image_url,'keenshot') : ''; ?>" class="img-responsive" alt="keenshot image">
    </div>

    <div class="social-media">
        <ul class="list-unstyle">
        <?php 
            $social_repeater = json_decode(html_entity_decode($repeater_item->social_repeater));
            if(isset($social_repeater)):
            foreach($social_repeater as $social_repeater):
        ?>
        <li><a style="color: #4267b2;" target="_blank" href="<?php echo $social_repeater->link; ?>"><span class="fab <?php echo $social_repeater->icon; ?>"></span></a></li>
        <?php endforeach; endif; ?>
        </ul>
    </div><!--  / Social Media -->
<?php endforeach; ?>
    <div class="contact-form">
        <div class="contact-form-wrapper">
            <div class="title">
                <h2><?php echo apply_filters( 'keenshot_contact_title', __('Contact With Me', 'keenshot') ); ?></h2>
                <div class="stylish-border"></div>
            </div>
            <?php echo do_shortcode('[contact-form-7 id="410" title="Contact form 1"]'); ?>
        </div>
    </div>
</section><!--  /end of contact-us -->

<section id="gmap"></section>
<?php
}
endif;

/**
 * Keenshot Gallery Page Template
 */
add_action('keenshot_gallery_page_template_content','keenshot_gallery_page_template_content_section');

if(!function_exists('keenshot_gallery_page_template_content_section')):
function keenshot_gallery_page_template_content_section(){
  
}
endif;

/**
 * Keenshot Pricing Page Template
 */
add_action('keenshot_pricing_page_template_content','keenshot_pricing_page_template_content_section');

if(!function_exists('keenshot_pricing_page_template_content_section')):
function keenshot_pricing_page_template_content_section(){
  
}
endif;

/**
 * Keenshot Taxonomy Post Section
 */
add_action('keenshot_taxonomy_content','keenshot_taxonomy_content_section');

if(!function_exists('keenshot_taxonomy_content_section')):
function keenshot_taxonomy_content_section(){
   
}
endif;


/**
 * Keenshot Comment Navigation
 */
add_action('keenshot_comment_navigation','keenshot_comment_navigation_section');

if(!function_exists('keenshot_comment_navigation_section')):
function keenshot_comment_navigation_section(){
?> 
  <nav class="comment-navigation" role="navigation">
	<div class="row">
		<div class="col-xs-12 col-sm-6">
			<div class="post-link-nav">
				<span class="keenshot-icon keenshot-chevron-left" aria-hidden="true"></span> 
				<?php previous_comments_link( esc_html__( 'Older Comments', 'keenshot' ) ) ?>
			</div>
		</div>
		<div class="col-xs-12 col-sm-6 text-right">
			<div class="post-link-nav">
				<?php next_comments_link( esc_html__( 'Newer Comments', 'keenshot' ) ) ?>
				<span class="keenshot-icon keenshot-chevron-right" aria-hidden="true"></span>
			</div>
		</div>
	</div><!-- .row -->
</nav>
<?php 
}
endif;

/**
 * Keenshot all sections
 */
add_action('keenshot_theme_sections','keenshot_all_theme_sections');

if(!function_exists('keenshot_all_theme_sections')):
function keenshot_all_theme_sections(){

   $keenshot_sections = array('banner','about-us','client-logo','taxonomy-cat','front-blog','testimonial');
   return $keenshot_sections;

}
endif;

/**
 * Keenshot Before Article Content
 */
add_action('keenshot_before_posts_content','keenshot_before_article');
if(!function_exists('keenshot_before_article')):
function keenshot_before_article(){
?>
<section class="page-banner">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><?php echo apply_filters( 'keenshot_blog_title', __('Blog', 'keenshot') ); ?></h1>
                <h5><?php  echo apply_filters( 'keenshot_blog_subtitle', __('Lorem ipsum donor lopen kess hien loream ipsum', 'keenshot') ); ?></h5>
            </div>
        </div>
    </div>
</section><!--  /end of page-banner -->
<!-- begin blog-list -->
<section class="blog-list" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            
                <ul class="post-items">
<?php
}
endif;

/**
 * Keenshot Before Article Content
 */
add_action('keenshot_after_posts_content','keenshot_after_article');
if(!function_exists('keenshot_after_article')):
function keenshot_after_article(){

    echo '</ul>';
    keenshot_post_pagination();   
    echo '</div></div></div></section>';
}
endif;

/**
 * Keenshot Before Single Post Contect
 */
add_action('keenshot_before_single_posts_content','keenshot_single_posts');
if(!function_exists('keenshot_single_posts')):
function keenshot_single_posts(){

    echo ' <section class="blog-single">
    <div class="container">
        <div class="row">';
}
endif;


/**
 * Keenshot After Single Post Contect
 */
add_action('keenshot_after_single_posts_content','keenshot_single_posts_after');
if(!function_exists('keenshot_single_posts_after')):
function keenshot_single_posts_after(){
 
   echo '</div></div></section>';
}
endif;

/**
 * Keenshot Sidebar
 */
add_action('keenshot_sidebar','keenshot_sidebar_content');
if(!function_exists('keenshot_sidebar_content')):
function keenshot_sidebar_content(){
?>
   <div class="sidebar">

        <div class="widgets">
          <?php get_search_form(); ?>
        </div>
       
            <?php
            if('post' === get_post_type()){
               if (is_active_sidebar( 'sidebar' ))
                 dynamic_sidebar( 'sidebar' );
             }else{
              keenshot_custom_taxonomy();
             }
            ?>

        <div class="widgets">
            <?php 
            
            if('post' != get_post_type())
              keenshot_cpt_recent_post('latest');
             ?>
        </div>
   </div>

<?php
}
endif;

/**
 * Keenshot Before Search Hook
 */
add_action('keenshot_before_search_content','keenshot_before_search_section');
if(!function_exists('keenshot_before_search_section')):
function keenshot_before_search_section(){
?>

<section class="page-banner seach-banner">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><?php echo apply_filters( 'keenshot_search_title','Your search result for : ', 'keenshot' ); ?><span><?php echo get_search_query(  ); ?></span></h1>
                
            </div>
        </div>
    </div>
</section>
    <!-- begin blog-list -->
<section class="blog-list" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ul class="post-items">
<?php
}
endif;


/**
 * Keenshot Before Archive Hook
 */
add_action('keenshot_before_archive_content','keenshot_archive_content');
if(!function_exists('keenshot_archive_content')):
function keenshot_archive_content(){
?>

<section class="page-banner">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><?php echo apply_filters( 'keenshot_blog_title',single_cat_title(), 'keenshot'); ?></h1>
            </div>
        </div>
    </div>
 </section>
   
    <section class="blog-list" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="post-items">
<?php
}
endif;


