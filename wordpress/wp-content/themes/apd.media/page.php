<?php get_header(); ?>

<main>
  <section class="inner_pages">
    <div class="container">
    
     <h3><?php the_title(); ?></h3>
    
    <?php while ( have_posts() ) : the_post(); ?>
    
    <?php the_content(); ?>
    
    <?php endwhile; wp_reset_postdata();// end of the loop. ?>
    
	</div>	
</section><!-- .content-area -->
</main><!-- .site-main -->
<!-- Footer -->
<?php get_footer(); ?>
