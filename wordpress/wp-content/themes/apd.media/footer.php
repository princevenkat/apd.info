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
<script type="text/javascript">
  window.onload = function(){
    var imgs = document.getElementsByClassName('average-background-colorize');
    for( i=0; i<imgs.length; i++){if (window.CP.shouldStopExecution(1)){break;}
         imgEl = imgs[i];
         rgb = getAverageRGB(imgEl);
         imgEl.parentNode.style.backgroundColor = 'rgb('+rgb.r+','+rgb.g+','+rgb.b+')';
    }
  window.CP.exitedLoop(1);
    function getAverageRGB(imgEl) {
        var blockSize = 5, // only visit every 5 pixels
            defaultRGB = {r:255,g:255,b:255}, // for non-supporting envs
            canvas = document.createElement('canvas'),
            context = canvas.getContext && canvas.getContext('2d'),
            data, width, height,
            i = -4,
            length,
            rgb = {r:0,g:0,b:0},
            count = 0;

        if (!context) {
            return defaultRGB;
        }
        height = canvas.height = imgEl.naturalHeight || imgEl.offsetHeight || imgEl.height;
        width = canvas.width = imgEl.naturalWidth || imgEl.offsetWidth || imgEl.width;
        context.drawImage(imgEl, 0, 0);
        try {
            data = context.getImageData(0, 0, width, height);
        } catch(e) {
            return defaultRGB;
        }
        length = data.data.length;
        while ( (i += blockSize * 4) < length ) {if (window.CP.shouldStopExecution(2)){break;}
            ++count;
            rgb.r += data.data[i];
            rgb.g += data.data[i+1];
            rgb.b += data.data[i+2];
        }
      window.CP.exitedLoop(2);
        // ~~ used to floor values
        rgb.r = ~~(rgb.r/count);
        rgb.g = ~~(rgb.g/count);
        rgb.b = ~~(rgb.b/count);
        return rgb;
    }
}
</script>
</body>
</html>