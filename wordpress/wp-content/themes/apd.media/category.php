<?php 
get_header(); ?>


<main>

  <section class="inner_pages">



    <div class="container">
    
    <div class="row">
            <div class="col-sm-12"> <h3><?php  printf( __( 'Artikel: %s', 'apdinfo' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h3>
    </div>
    <div>&nbsp;</div>
            <div class="col-sm-12">
            
            <div class="row">
       <?php if (have_posts()) : ?>
    
       
    
 <ul class=" list search_posts" id="loadmore">   
    
<?php while ( have_posts() ) : the_post();
$current_id = get_the_ID();
?>
<li  class="col-sm-4">

<article>
  <div class="media">
    
	<div class="media-left"> 
  <a href="<?php the_permalink(); ?>"> 
<?php 
if( have_rows('art_details') ): 
while( have_rows('art_details') ): the_row(); 
// vars
$image = get_sub_field('art_image');
$img_src = wp_get_attachment_image_url( $image[ 'ID' ], 'medium' );
?>

  <?php if($img_src){?><img src="<?php echo esc_url( $img_src ); ?>"  class="img-responsive"  /><?php } else {?>
       <img src="<?php bloginfo('template_directory'); ?>/images/No_Image_Available.jpg"  alt="<?php the_title();?>" class="img-responsive"  style=" height: 100px;
    width: 120px;" />
  <?php } ?>
<?php endwhile; ?>
<?php endif; ?>   
 </a>
   </div>
	
	<?php /*?><?php if ( has_post_thumbnail() ) {  
                        the_post_thumbnail('medium', array( 'class' => 'img-responsive'));
						//the_post_thumbnail(array(350, 170));    
						//the_post_thumbnail();    
                        
                        }  ?><?php */?>
                          
   
    
    <div class="media-body">
      <h5><a href="<?php the_permalink(); ?>"><?php $title = get_the_title(); $keys= explode(" ",$s); $title = preg_replace('/('.implode('|', $keys) .')/iu', '<strong class="search-excerpt">\0</strong>', $title); ?>  <?php echo $title ?></a></h5>
      <span class="posdate"><i class="fa fa-calendar"></i> <?php echo get_the_date(); ?> <?php if(get_field('art_location')) {?>&nbsp; | &nbsp; <i class="fa fa-map-marker"></i> <?php the_field('art_location'); ?> </span><?php } ?> </div>
  </div>
</article>


<?php /*?><div class="media">



<a class="pull-left" href="<?php the_permalink(); ?>" target="_parent">
<?php 
if( have_rows('art_details') ): 
while( have_rows('art_details') ): the_row(); 
// vars
$image = get_sub_field('art_image');
$img_src = wp_get_attachment_image_url( $image[ 'ID' ], 'thumbnail' );
?>
	  <img src="<?php echo esc_url( $img_src ); ?>" alt="image" class="img-thumbnail"  />
<?php endwhile; ?>
<?php endif; ?>      
</a>
<?php $title = get_the_title(); $keys= explode(" ",$s); $title = preg_replace('/('.implode('|', $keys) .')/iu', '<strong class="search-excerpt">\0</strong>', $title); ?>
<div class="clearfix visible-sm"></div>
<div class="media-body fnt-smaller">
<a href="<?php the_permalink(); ?>" target="_parent"></a>
<h4 class="media-heading"><a href="<?php the_permalink(); ?>" target="_parent"><?php echo $title ?></a></h4>
<ul class="list-inline mrg-0 btm-mrg-10 clr-535353">
    <?php if ( get_field( 'art_location' ) ): ?><li><i class="fa fa-map-marker"></i> <?php the_field('art_location'); ?>&nbsp;&nbsp; |</li><?php endif; ?>
    <li><i class="fa fa-calendar"></i> <?php echo get_the_date(); ?>&nbsp;&nbsp; |</li>
    <li class="hidden-xs"><a href="javascript:void();"><?php the_category(', '); ?></a></li>
</ul>

<p class="hidden-xs"><?php the_field('art_teaser'); ?></p>
</div>
</div><?php */?>
</li>

    
        
    
    
        
    
        <?php endwhile; wp_reset_postdata();// end of the loop. ?>
    
         
         
 </ul>   
 
 
 <div class="clearfix"></div>
        <div class="load_more_btn"><a href="javascript:void();" class="thm-btn" id="btn">Load More</a></div>

              

           

                <?php endif; ?>
        </div>
      
        </div>
        
    <?php //get_sidebar(); ?>
            
        </div>      
	</div>	

</section><!-- .content-area -->

</main>

<?php get_footer(); ?>