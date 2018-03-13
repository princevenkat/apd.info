<?php get_header(); ?>
<main>

  <section class="inner_pages">

    <div class="container">
    
    <div class="row">
            <div class="col-sm-12">
        <?php 
		if (have_posts()) { ?>	
    
         <h3><?php printf( __( 'Search Results for: %s', 'shape' ), '<span>' . get_search_query() . '</span>' ); ?></h3>
    <div>&nbsp;</div>
    
 <ul class="list search_posts" id="search_list">   
    
<?php while (have_posts()) { the_post(); 
$current_id = get_the_ID();
$archthumbnail = get_the_post_thumbnail($current_id, 'full');

?>	
<li  class="col-sm-4">
<article>
  <div class="media">
    
	
	 <?php 
if( have_rows('art_details') ): 
while( have_rows('art_details') ): the_row(); 
// vars
$image = get_sub_field('art_image');
$img_src = wp_get_attachment_image_url( $image[ 'ID' ], 'thumbnail' );
?>
<div class="media-left"> <a href="#"> 
	  <img src="<?php echo esc_url( $img_src ); ?>" alt="image" class="img-responsive"  />
    </a> </div>
<?php endwhile; ?>
<?php endif; ?>   <?php //echo $archthumbnail; ?> 
    <div class="media-body">
      <h5><a href="<?php the_permalink(); ?>"><?php $title = get_the_title(); $keys= explode(" ",$s); $title = preg_replace('/('.implode('|', $keys) .')/iu', '<strong class="search-excerpt">\0</strong>', $title); ?>  <?php echo $title ?></a></h5>
      <span class="posdate"><i class="fa fa-calendar"></i> <?php echo get_the_date(); ?> <?php if(get_field('art_location')) {?>&nbsp; | &nbsp; <i class="fa fa-map-marker"></i> <?php the_field('art_location'); ?> </span><?php } ?> </div>
  </div>
</article>
</li>


<?php } ?>


    
         
         
 </ul>   
 
 
 <div class="clearfix"></div>
        <div class="load_more_btn"><a href="javascript:void();" class="thm-btn" id="btn">Load More</a></div>
        
<?php } else { ?>
		<ul class="">   
        <li><article >
                <div align="center">
                        <img src="<?php bloginfo('template_directory'); ?>/images/noresult.jpg" />
                        <h2>No Results Found</h2>
                        <p>Sorry, but the requested resource was not found on this site.</p>
                        <a href="<?php echo home_url(); ?>" class="btn btn-primary btn-lg">Go Back to Home</a>
                </div>    
                </article></li>
        </ul>
<?php } ?>		


              
                
        </div>
      
        
        
    <?php //get_sidebar(); ?>
            
        </div>      
	</div>	

</section><!-- .content-area -->

</main><!-- .site-main -->



<?php get_footer(); ?>

<script>
		$("#search_list").loadMore({
			selector: 'li',
			loadBtn: '#btn',
			limit: 45,
			load: 15,
			animate: true,
			animateIn: 'fadeInUp'
		});

</script>