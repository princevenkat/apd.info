<?php
get_header(); ?>

<main>
  <section class="inner_pages">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <ul class="list search_posts" id="loadmore">
            <?php $count = 1;  if (have_posts()) : ?>
			<?php 
                while (have_posts()) : the_post();
                $current_id = get_the_ID();
            ?>
            <li  class="col-sm-4">
              <article>
                <div class="media">
                  <div class="media-left"> <a href="<?php the_permalink(); ?>">
                    <?php //echo $archthumbnail; ?>
                    <?php 
if( have_rows('art_details') ): 
while( have_rows('art_details') ): the_row(); 
// vars
$image = get_sub_field('art_image');
$img_src = wp_get_attachment_image_url( $image[ 'ID' ], 'medium' );
?>
                    <?php if($img_src){ ?>
                    <img src="<?php echo esc_url( $img_src ); ?>"  class="img-responsive"  />
                    <?php }  else {?>
                    <img src="<?php bloginfo('template_directory'); ?>/images/No_Image_Available.jpg"  alt="<?php the_title();?>" class="img-responsive"  style=" height: 100px;
    width: 120px;" />
                    <?php }?>
                    <?php endwhile; ?>
                    <?php endif; ?>
                    </a> </div>
                  <div class="media-body">
                    <h5><a href="<?php the_permalink(); ?>">
                      <?php $title = get_the_title(); $keys= explode(" ",$s); $title = preg_replace('/('.implode('|', $keys) .')/iu', '<strong class="search-excerpt">\0</strong>', $title); ?>
                      <?php echo $title ?></a></h5>
                    <span class="posdate"><i class="fa fa-calendar"></i> <?php echo get_the_date(); ?>
                    <?php if(get_field('art_location')) {?>
                    &nbsp; | &nbsp; <i class="fa fa-map-marker"></i>
                    <?php the_field('art_location'); ?>
                    </span>
                    <?php } ?>
                  </div>
                </div>
              </article>
            </li>
            <?php if( $count % 3 == 0 ) echo "\n".'<div  style="clear: both;"></div>'; ?>
            <?php $count++;  endwhile; endif; // end of the loop. ?>
          </ul>
          <div class="clearfix"></div>
          <div class="load_more_btn"><a href="javascript:void();" class="thm-btn" id="btn">Load More</a></div>
          
          <!-- Previous and Next Post --> 
          
          <!-- /Previous and Next Post --> 
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
  </section>
</main>
<!-- .site-main -->
<?php get_footer(); ?>
