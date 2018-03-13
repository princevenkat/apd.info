<?php get_header(); ?>


<main>
  <section class="inner_pages">
    <div class="container">
      <div class="row">
        <div class="col-sm-8">
        
          <article>
         
           <?php if (have_posts()) : while (have_posts()) : the_post();   
		   setPostViews(get_the_ID());

		     ?>
          
           
              <div class="front_big_post">
              
              
                
                
                
<?php 
if( have_rows('art_details') ): 
while( have_rows('art_details') ): the_row(); 
$art_title = get_sub_field('art_title');
$art_copyright = get_sub_field('art_copyright');

$image = get_sub_field('art_image');
$img_src = wp_get_attachment_image_url( $image[ 'ID' ], 'full' );

?><div class="big_thumb gallery">
	  <?php if($img_src) {?><a href="<?php echo esc_url( $img_src ); ?>" rel="prettyPhoto[gallery]" title="<?php echo $art_copyright; ?>"><img src="<?php echo esc_url( $img_src ); ?>" alt="<?php echo $art_title; ?>" class="img-responsive" /></a><?php } ?>
	  <span class="image_copyright"><?php echo $art_title; ?>
	  <copy><?php echo $art_copyright; ?></copy></span>
       </div>
<?php endwhile; ?>
<?php endif; wp_reset_query();?>                  
 
                  
                 
                  
                  
                  
                <div class="big_heading">
                  <h3><?php the_title(); ?></h3>
                </div>
                <div class="date line-height">
                <!--<span><i class="fa fa-map-marker"></i> <?php the_field('art_location'); ?></span> | -->
                <?php if ( get_field( 'art_location' ) ): ?><span><i class="fa fa-map-marker"></i> <?php the_field('art_location'); ?></span> | <?php endif; ?>
                <span><i class="fa fa-calendar"></i> <?php echo get_the_date(); ?></span>
                <?php if ( get_field( 'art_agency' ) ): ?> | <span><i class="fa fa-building"></i> <?php the_field('art_agency'); ?></span> | <?php endif; ?>
                <span class="hidden-xs"><?php the_category(', '); ?></span>
                  <div class="pull-right">
                   
                    <?php echo do_shortcode('[socialSharingButtons]'); ?>

				<?php //echo getPostViews(get_the_ID()); ?>

                  </div>
                </div>
                <div class="clearfix"></div>
                <summary>
                  <div class="post_content">
                  
                    <div class="bold_text">
                    <?php the_field('art_teaser'); ?>
                    </div>  
                    <hr />
                   <?php the_content(); ?>
                  </div>
                </summary>
              </div>
           <?php endwhile; ?>


    <!-- Left Arrow -->
    <div class="clear">&nbsp;</div>
    <hr />
    <div class="clear">&nbsp;</div>
<div class="row no-gutters divider blog-post-slider">



<div class="side_bar_posts">





<?php 
if ( 
   $next = get_next_post() ) {
   $next_title = $next->post_title;
   $next_ex_con = ( $next->post_excerpt ) ? $next->post_excerpt : strip_shortcodes( $next->post_content );
   $next_text = wp_trim_words( apply_filters( 'the_excerpt', $next_ex_con ), 15 );
   $location = get_field('art_location', $next->ID);
   //$nextthumbnail = get_the_post_thumbnail($next->ID,'full');
}
?>
<?php if (!empty($next)) {?>
<div class="col-xs-6 col-sm-6 pull-right ">
    <a href="<?php echo esc_url( get_permalink( $next->ID ) ); ?>" class="next-article pull-right">Nächster Artikel <i class="fa fa-angle-right" aria-hidden="true"></i></a>
    <div class="clearfix"></div>
    <article class="hidden-xs">
    <div class="media">
    <div class="media-body">
      <h5><a href="<?php echo esc_url( get_permalink( $next->ID ) ); ?>"><?php echo $next_title; ?> </a></h5>
      <span class="posdate"><i class="fa fa-calendar"></i> <?php echo mysql2date('d.m.Y', $next->post_date, false) ?> <?php if($location) {?>| <i class="fa fa-map-marker"></i> <?php echo $location; ?> </span><?php } ?> </div>
    <div class="media-left hidden-xs"> 
   
   <?php if( have_rows('art_details', $next->ID) ): 
while( have_rows('art_details', $next->ID) ): the_row(); 

$image = get_sub_field('art_image', $next->ID);
$img_src = wp_get_attachment_image_url( $image[ 'ID' ], 'medium' );
?>               
<?php if($img_src) { ?>
<a href="<?php echo esc_url( get_permalink( $next->ID ) ); ?>"><img src="<?php echo esc_url( $img_src ); ?>" alt="<?php echo $art_title; ?>" class="img-responsive" /></a><?php } ?>   
<?php endwhile; ?>
<?php endif; ?>                    

   
    </div>
    
    </div>
    </article>
</div>
<?php } ?>
    

    
<?php 
if ( $prev = get_previous_post() ) {
   $prev_title = $prev->post_title;
   $prev_ex_con = ( $prev->post_excerpt ) ? $prev->post_excerpt : strip_shortcodes( $prev->post_content );
   $prev_text = wp_trim_words( apply_filters( 'the_excerpt', $prev_ex_con ), 15 );
   $location = get_field('art_location', $prev->ID);
   
   //$prevthumbnail = get_the_post_thumbnail($prev->ID, 'full' );
}
?>
<div class="col-xs-6 col-sm-6 pull-left">
<a href="<?php echo esc_url( get_permalink( $prev->ID ) ); ?>" class="prev-article  pull-left clear"><i class="fa fa-angle-left" aria-hidden="true"></i>  Letzter Artikel </a>
    <div class="clearfix"></div>
    <article class="hidden-xs">
    <div class="media">
    <div class="media-left hidden-xs"> 
<?php 
if( have_rows('art_details', $prev->ID) ): 
while( have_rows('art_details', $prev->ID) ): the_row(); 
$image = get_sub_field('art_image', $prev->ID);
$img_src = wp_get_attachment_image_url( $image[ 'ID' ], 'medium' );
?>  
<?php if($img_src) { ?>  
<a href="<?php echo esc_url( get_permalink( $prev->ID ) ); ?>">           
<img src="<?php echo esc_url( $img_src ); ?>" alt="<?php echo $art_title; ?>" class="img-responsive" /><?php } ?>
</a>
<?php endwhile; ?>
<?php endif; ?>   
     </div>
    <div class="media-body">
      <h5><a href="<?php echo esc_url( get_permalink( $prev->ID ) ); ?>"><?php echo $prev_title; ?></a></h5>
      <span class="posdate"><i class="fa fa-calendar"></i> <?php echo mysql2date('d.m.Y', $prev->post_date, false) ?> <?php if($location) {?>| <i class="fa fa-map-marker"></i> <?php echo $location; ?> </span><?php } ?> </div>
    </div>
    </article>
</div>


</div>
</div>




<?php endif; ?>
           
         

          </article>
          <!-- Previous and Next Post -->

<!-- /Previous and Next Post -->
        </div>
          
            <?php get_sidebar(); ?>
       
       
        </div>
      </div>
    </div>
    <div class="clearfix"></div>

  </section>
</main>


<!-- Footer -->
<?php get_footer(); ?>