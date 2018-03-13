<div class="col-sm-4 hidden-xs">
  <div class="row">
    <div class="col-sm-12">
    <aside>
    <div class="greg_bg_with_radius">
    <div class="section_title icon_one"><h4 class="text-uppercase">Most viewed</h4></div>
    <div class="side_bar_posts">
    
<?php
query_posts('meta_key=post_views_count&orderby=meta_value_num&order=DESC');
if (have_posts()) : while (have_posts()) : the_post();
$location = get_field('art_location');
?>
    <article><div class="media">
       
<div class="media-left"><a href="<?php the_permalink();?>"><?php if( have_rows('art_details') ): 
	while( have_rows('art_details') ): the_row(); 
	//$art_image = get_sub_field('art_image');
$image = get_sub_field('art_image');
$img_src = wp_get_attachment_image_url( $image[ 'ID' ], 'full' );
?>

                <img src="<?php echo esc_url( $img_src ); ?>" alt="image"  />
                 
<?php endwhile; ?>
<?php endif; ?>  </a>
</div>       
          
<div class="media-body">
<h5><a href="<?php the_permalink();?>"><?php the_title();?> </a></h5>
<span class="posdate"><i class="fa fa-calendar"></i> &nbsp;<?php echo get_the_date(); ?>   <?php if ($location) { ?>&nbsp;|&nbsp; <i class="fa fa-map-marker"></i> <?php echo $location;?> </span><?php } ?>
</div>                
   

</div>
</article>
<?php
endwhile; endif;
wp_reset_query();
?>
</div>
	</div>
    </aside>
    </div>
  </div>
</div>
