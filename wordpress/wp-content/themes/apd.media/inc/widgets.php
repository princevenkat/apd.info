<?php 



// LATEST POSTS WIDGET

class Latest_Widget extends WP_Widget 

{

	function __construct() {

		parent::__construct(

			'latest_widget', // Base ID

			'Latest Articles', // Name

			array('description' => __( 'Displays Your Latest Articles'))

		);

	}

	function widget($args, $instance) { //output

		extract( $args );

		// these are the widget options

		$title = apply_filters('widget_title', $instance['title']);

		$numberOfListings = $instance['numberOfListings'];

		echo $before_widget;

		// Check if title is set

		if ( $title ) {

			echo $before_title . $title . $after_title;

		}

		$this->getRealtyListings($numberOfListings);

		echo $after_widget;

	}



	function update($new_instance, $old_instance) {

		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);

		$instance['numberOfListings'] = strip_tags($new_instance['numberOfListings']);

		return $instance;

	}	

    

    // widget form creation

	function form($instance) {



	// Check values

	if( $instance) {

		$title = esc_attr($instance['title']);

		$numberOfListings = esc_attr($instance['numberOfListings']);

	} else {

		$title = '';

		$numberOfListings = '';

	}

	?>

<p>
  <label for="<?php echo $this->get_field_id('title'); ?>">
    <?php _e('Title', 'latest_widget'); ?>
  </label>
  <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
</p>
<p>
  <label for="<?php echo $this->get_field_id('numberOfListings'); ?>">
    <?php _e('Number of Listings:', 'latest_widget'); ?>
  </label>
  <select id="<?php echo $this->get_field_id('numberOfListings'); ?>"  name="<?php echo $this->get_field_name('numberOfListings'); ?>">
    <?php for($x=1;$x<=10;$x++): ?>
    <option <?php echo $x == $numberOfListings ? 'selected="selected"' : '';?> value="<?php echo $x;?>"><?php echo $x; ?></option>
    <?php endfor;?>
  </select>
</p>
<?php

	}

	

	function getRealtyListings($numberOfListings) { //html

		global $post;

		//add_image_size( 'latest_widget_size', 100, 100, false,array('class'=>'img-responsive') );

		$listings = new WP_Query();

		$listings->query('order=DESC&offset=1&posts_per_page=' . $numberOfListings );	
		
	
		

		if($listings->found_posts > 0) {

			echo '<div class="side_bar_posts">';
			
			while ( $listings->have_posts() ) :
		    $listings->the_post();
			$location = get_field('art_location');
			//$latestthumbnail = get_the_post_thumbnail($listings->the_post,'full' );
			   ?>
<?php /*?><?php if ( has_post_thumbnail() ) {
the_post_thumbnail('large',array('class'=>'img-responsive'));
} else { ?>
<img src="<?php bloginfo('template_directory'); ?>/images/no_img.jpg" alt="image" class="img-responsive" />
<?php } ?><?php */?>
<article>
  <div class="media">
    <div class="media-left">
      <a href="<?php the_permalink();?>">
      <?php if( have_rows('art_details') ): 
while( have_rows('art_details') ): the_row(); 
//$art_image = get_sub_field('art_image');
$image = get_sub_field('art_image');
$img_src = wp_get_attachment_image_url( $image[ 'ID' ], 'medium' );

?><?php if($img_src) { ?>   
      <img src="<?php echo esc_url( $img_src ); ?>"  alt="<?php the_title();?>" class="img-responsive average-background-colorize"  />
  <?php } else {?>
       <img src="<?php bloginfo('template_directory'); ?>/images/No_Image_Available.jpg"  alt="<?php the_title();?>" class="img-responsive average-background-colorize"  style=" height: 100px;
    width: 120px;" />    
  <?php } ?>


      <?php endwhile; ?>
      <?php endif; ?>
     </a> 
  </div>    
    <div class="media-body">
      <h5><a href="<?php the_permalink();?>">
        <?php the_title();?>
        </a></h5>
      <span class="posdate"><i class="fa fa-calendar"></i> &nbsp;<?php echo get_the_date(); ?>
      <?php if ($location) { ?>
      &nbsp;|&nbsp; <i class="fa fa-map-marker"></i> <?php echo $location;?> </span>
      <?php } ?>
    </div>
  </div>
</article>
<?php endwhile; wp_reset_postdata();

				/*while ($listings->have_posts()) {

	
	

					$listings->the_post();
					
					if( have_rows('art_details') ): 
					while( have_rows('art_details')) : the_row(); 
						echo $art_image = get_sub_field('art_image');
					endwhile; endif;
	
					$location = get_field('art_location');
					
					$image = (has_post_thumbnail($post->ID)) ? get_the_post_thumbnail($post->ID, 'thumbnail',array('class'=>'img-responsive')) : '<div class="noThumb"></div>'; 

					echo '<article><div class="media">'; 

					$listItem = '<div class="media-left"><a href="' . get_permalink() . '">'.$art_image.'</a></div>'; 

					$listItem .= '<div class="media-body">';

					$listItem .= '<h5><a href="' . get_permalink() . '">'.get_the_title() . '</a></h5>';

					$listItem .= '<span class="posdate"><i class="fa fa-calendar"></i> ' . get_the_date() . ' &nbsp;|&nbsp;  <i class="fa fa-map-marker"></i> '.$location.' </span></div>'; 

					echo $listItem; 

		        	echo '</div></article>';
					
					

				}*/

			echo '</div>';

			wp_reset_postdata(); 

		}else{

			echo '<p style="padding:25px;">No listing found</p>';

		} 
		
		

	

	}

	

}

register_widget('Latest_Widget');

//END LATEST POSTS WIDGET





// MOST VIEWED POSTS WIDGET

class Most_Viewed_Widget extends WP_Widget 

{

	function __construct() {

		parent::__construct(
			'most_viewed__widget', // Base ID
			'Most Viewed Articles', // Name
			array('description' => __( 'Displays Your Most Viewed Articles listings.'))

		);

	}

	function widget($args, $instance) { //output

		extract( $args );

		// these are the widget options

		$title = apply_filters('widget_title', $instance['title']);

		$numberOfListings = $instance['numberOfListings'];

		echo $before_widget;

		// Check if title is set

		if ( $title ) {

			echo $before_title . $title . $after_title;

		}

		$this->getRealtyListings($numberOfListings);

		echo $after_widget;

	}

	function update($new_instance, $old_instance) {

		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);

		$instance['numberOfListings'] = strip_tags($new_instance['numberOfListings']);

		return $instance;

	}	

    // widget form creation

	function form($instance) {



	// Check values

	if( $instance) {

		$title = esc_attr($instance['title']);

		$numberOfListings = esc_attr($instance['numberOfListings']);

	} else {

		$title = '';

		$numberOfListings = '';

	}

	?>
<p>
  <label for="<?php echo $this->get_field_id('title'); ?>">
    <?php _e('Title', 'latest_widget'); ?>
  </label>
  <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
</p>
<p>
  <label for="<?php echo $this->get_field_id('numberOfListings'); ?>">
    <?php _e('Number of Listings:', 'latest_widget'); ?>
  </label>
  <select id="<?php echo $this->get_field_id('numberOfListings'); ?>"  name="<?php echo $this->get_field_name('numberOfListings'); ?>">
    <?php for($x=1;$x<=10;$x++): ?>
    <option <?php echo $x == $numberOfListings ? 'selected="selected"' : '';?> value="<?php echo $x;?>"><?php echo $x; ?></option>
    <?php endfor;?>
  </select>
</p>
<?php

	}

	function getRealtyListings($numberOfListings) { //html

		global $post;

		//add_image_size( 'latest_widget_size', 85, 45, false );

		$listings = new WP_Query();

		$listings->query('meta_key=post_views_count&orderby=meta_value_num&order=DESC&posts_per_page='.$numberOfListings );	
		

		if($listings->found_posts > 0) {

			echo '<div class="side_bar_posts">';

			
while ( $listings->have_posts() ) :
		    $listings->the_post();
			$location = get_field('art_location');
			//$mostthumbnail = get_the_post_thumbnail($listings->the_post, 'full');
			
			   ?>
<?php /*?><?php if ( has_post_thumbnail() ) {
the_post_thumbnail('large',array('class'=>'img-responsive'));
} else { ?>
<img src="<?php bloginfo('template_directory'); ?>/images/no_img.jpg" alt="image" class="img-responsive" />
<?php } ?><?php */?>
<article>
  <div class="media">

     <div class="media-left">
      <a href="<?php the_permalink();?>">
      <?php if( have_rows('art_details') ): 
while( have_rows('art_details') ): the_row(); 
//$art_image = get_sub_field('art_image');
$image = get_sub_field('art_image');
$img_src = wp_get_attachment_image_url( $image[ 'ID' ], 'medium' );

?><?php if($img_src) { ?>   
      <img src="<?php echo esc_url( $img_src ); ?>"  alt="<?php the_title();?>" class="img-responsive average-background-colorize"  />
  <?php } else {?>
       <img src="<?php bloginfo('template_directory'); ?>/images/No_Image_Available.jpg"  alt="<?php the_title();?>" class="img-responsive average-background-colorize"  style=" height: 100px;
    width: 120px;" />
  <?php } ?>


      <?php endwhile; ?>
      <?php endif; ?>
     </a> 
  </div>    
      <?php /*?><?php if( have_rows('art_details') ): 
	while( have_rows('art_details') ): the_row(); 
	//$art_image = get_sub_field('art_image');
$image = get_sub_field('art_image');
$img_src = wp_get_attachment_image_url( $image[ 'ID' ], 'thumbnail' );
?>

                <img src="<?php echo esc_url( $img_src ); ?>" alt="image"  />
                 
<?php endwhile; ?>
<?php endif; ?><?php */?>

    <div class="media-body">
      <h5><a href="<?php the_permalink();?>">
        <?php the_title();?>
        </a></h5>
      <span class="posdate"><i class="fa fa-calendar"></i> &nbsp;<?php echo get_the_date(); ?>
      <?php if ($location) { ?>
      &nbsp;|&nbsp; <i class="fa fa-map-marker"></i> <?php echo $location;?> </span>
      <?php } ?>
    </div>
  </div>
</article>
<?php endwhile; wp_reset_postdata();
				/*while ($listings->have_posts()) {

					

					$listings->the_post();

					$location = get_field('main_image_location');

					$image = (has_post_thumbnail($post->ID)) ? get_the_post_thumbnail($post->ID, 'thumbnail',array('class'=>'img-responsive')) : '<div class="noThumb"></div>'; 

					echo '<article><div class="media">'; 

					$listItem = '<div class="media-left"><a href="' . get_permalink() . '">'.$image.'</a></div>'; 

					$listItem .= '<div class="media-body">';

					$listItem .= '<h5><a href="' . get_permalink() . '">'.get_the_title() . '</a></h5>';

					$listItem .= '<span class="posdate"><i class="fa fa-calendar"></i> ' . get_the_date() . ' &nbsp;|&nbsp;  <i class="fa fa-map-marker"></i> '.$location.' </span></div>'; 

					echo $listItem; 

		        	echo '</div></article>';

				}*/

			echo '</div>';

			wp_reset_postdata(); 

		}else{

			echo '<p style="padding:25px;">Keine Einträge gefunden</p>';

		} 

		

	}

	

}

register_widget('Most_Viewed_Widget');

//END MOST VIEWED WIDGET







// HEADER SOCIAL LINKS WIDGET

class Header_Social_Links_Widget extends WP_Widget 

{

	function __construct() {

		parent::__construct(

			'header_social__widget', // Base ID

			'Header Social Links', // Name

			array('description' => __( 'Displays Your Social Links On Footer'))

		);

	}

	function widget($args, $instance) { //output

		extract( $args );

		// these are the widget options

		$title = apply_filters('widget_title', $instance['title']);

		$numberOfListings = $instance['numberOfListings'];

		echo $before_widget;

		// Check if title is set

		if ( $title ) {

			echo $before_title . $title . $after_title;

		}

		$this->getRealtyListings($numberOfListings);

		echo $after_widget;

	}



	function update($new_instance, $old_instance) {

		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);

		$instance['numberOfListings'] = strip_tags($new_instance['numberOfListings']);

		return $instance;

	}	

    

    // widget form creation

	function form($instance) {



	// Check values

	if( $instance) {

		$title = esc_attr($instance['title']);

		$numberOfListings = esc_attr($instance['numberOfListings']);

	} else {

		$title = '';

		$numberOfListings = '';

	}

	?>
<p>
  <label for="<?php echo $this->get_field_id('title'); ?>">
    <?php _e('Title', 'header_social__widget'); ?>
  </label>
  <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
</p>
<p> </p>
<?php

	}

	

	

	function getRealtyListings($numberOfListings) { //html

	

	 $fb_url = get_field('facebook_url','options');

	 $tw_url = get_field('twitter_url','options');

	 $rss_url = get_field('rss_url','options');

	 

		echo '<ul class="social_links m_r10">

				<li><a href="'.$fb_url.'" target="_blank"><i class="fa fa-facebook"></i></a></li>

				<li><a href="'.$tw_url.'" target="_blank"><i class="fa fa-twitter"></i></a></li>

				<li><a href="'.$rss_url.'" target="_blank"><i class="fa fa-rss"></i></a></li>

             </ul>';

	}

	

}

register_widget('Header_Social_Links_Widget');

//END HEADER SOCIAL LINKS WIDGET







// FOOTER SOCIAL LINKS WIDGET

class Footer_Social_Links_Widget extends WP_Widget 

{

	function __construct() {

		parent::__construct(

			'footer_social__widget', // Base ID

			'Foooter Social Links', // Name

			array('description' => __( 'Displays Your Social Links On Footer'))

		);

	}

	function widget($args, $instance) { //output

		extract( $args );

		// these are the widget options

		$title = apply_filters('widget_title', $instance['title']);

		$numberOfListings = $instance['numberOfListings'];

		echo $before_widget;

		// Check if title is set

		if ( $title ) {

			echo $before_title . $title . $after_title;

		}

		$this->getRealtyListings($numberOfListings);

		echo $after_widget;

	}



	function update($new_instance, $old_instance) {

		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);

		$instance['numberOfListings'] = strip_tags($new_instance['numberOfListings']);

		return $instance;

	}	

    

    // widget form creation

	function form($instance) {



	// Check values

	if( $instance) {

		$title = esc_attr($instance['title']);

		$numberOfListings = esc_attr($instance['numberOfListings']);

	} else {

		$title = '';

		$numberOfListings = '';

	}

	?>
<p>
  <label for="<?php echo $this->get_field_id('title'); ?>">
    <?php _e('Title', 'footer_social__widget'); ?>
  </label>
  <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
</p>
<p> </p>
<?php

	}

	

	

	function getRealtyListings($numberOfListings) { //html

	

	 $fb_url = get_field('facebook_url','options');

	 $tw_url = get_field('twitter_url','options');

	 $rss_url = get_field('rss_url','options');

	 

		echo '<ul>

				<li><a href="'.$fb_url.'" target="_blank"><i class="fa fa-facebook"></i> Folge uns auf Facebook</a></li>

				<li><a href="'.$tw_url.'" target="_blank"><i class="fa fa-twitter"></i> Folge uns auf Twitter</a></li>

				<li><a href="'.$rss_url.'" target="_blank"><i class="fa fa-rss"></i> Folge uns auf mittels RSS</a></li>

             </ul>';

	}

	

}

register_widget('Footer_Social_Links_Widget');

//END FOOTER SOCIAL LINKS WIDGET




