<footer>
  <div class="container">
    <div class="row">
      <div class="col-sm-3">
        <div class="footer_address">
			<?php if ( !function_exists('dynamic_sidebar')
            || !dynamic_sidebar('sidebar-4') ) : ?>
            <?php endif; ?>
        </div>
      </div>
      <div class="col-sm-3">
			<?php if ( !function_exists('dynamic_sidebar')
            || !dynamic_sidebar('sidebar-5') ) : ?>
            <?php endif; ?>
      </div>
      <div class="col-sm-3">
		  <?php if ( !function_exists('dynamic_sidebar')
                || !dynamic_sidebar('sidebar-6') ) : ?>
           <?php endif; ?>
      </div>
      <div class="col-sm-3">

<?php if( have_rows('apd_contact','options') ): 
	while( have_rows('apd_contact','options') ): the_row(); 
		// vars
		$apd_address = get_sub_field('apd_address');
		$apd_phone = get_sub_field('apd_phone');
		$apd_email = get_sub_field('apd_email');
?>

        <div class="footer_address">
          <h4>Impressum</h4>
          <div class="footer_address">
            <p><?php echo $apd_address; ?></p>
            <p><i class="fa fa-phone"></i> <?php echo $apd_phone; ?></p>
            <p><i class="fa fa-envelope"></i> <?php echo $apd_email; ?></p>
          </div>
        </div>
        
<?php endwhile; ?>
<?php endif; ?>      
        
      </div>
    </div>
  </div>
  <div class="copyright">
    <div class="container">
      <div class="col-sm-12">
        <div class="copy">
          <p>&copy; 1997 - <?php echo date('Y'); ?>. APD Deutschland<?php //echo get_bloginfo( 'name' ); ?></p>
        </div>
      </div>
    </div>
  </div>
</footer>



<?php wp_footer(); ?>
</body>
</html>