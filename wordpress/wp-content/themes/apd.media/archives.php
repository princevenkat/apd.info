<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
/*
Template Name: Archives
*/
get_header(); ?>

<main>
  <section class="inner_pages">
    <div class="container">
      <div class="row">
      
		  
		  <?php 
		  $args = array(
    'type'              => 'yearly',
    'show_post_count'   => true
);
//wp_get_archives($args);
		  ?>
      
        <div class="col-sm-7">
        
     

<h4><?php _e('Artikel nach Jahr und Monat', 'apdinfo'); ?></h4>
<ul class="archive_list_numeric">
    <?php compact_archive($style='numeric'); ?>
</ul>
    

        </div>
        
        
        <div class="col-sm-5">
        
     <h4><?php _e('Artikel nach Kategorie', 'apdinfo'); ?></h4>
<ul class="archive_list">
        <?php wp_list_categories('title_li='); ?>
</ul>
<?php /*?><h4><?php _e('Archives by Category:', 'apdinfo'); ?></h4>
	<ul class="archive_list">
    
<h5><?php  _e('International:', 'apdinfo');//wp_list_categories( 	array(	'exclude'  => array( 9 ),	'title_li' => ''	) ); ?></h5>
	<?php wp_get_archives(array( 'type' => 'yearly','cat' => '13' ) ); ?>
<hr />
<h5><?php  _e('Deutschland:', 'apdinfo');//wp_list_categories( 	array(	'exclude'  => array( 1 ),	'title_li' => ''	) ); ?></h5>
	<?php wp_get_archives(array( 'type' => 'yearly','cat' => '12' ) ); ?>
<?php */?>





	</ul>

        </div>
          
          
       
       
        </div>
      </div>
    </div>
    <div class="clearfix"></div>

  </section>
</main>


<!-- .site-main -->
<?php get_footer(); ?>
