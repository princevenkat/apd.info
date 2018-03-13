<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " - $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'apd.media' ), max( $paged, $page ) );

	?></title>
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>
<?php wp_head(); ?>

</head>
<body <?php body_class(); ?> <?php //if( is_home() || is_front_page() ) : ?> class="landing" <?php //endif; ?>>



<!-- header -->
<?php if( have_rows('logo_setting','options') ): 
	while( have_rows('logo_setting','options') ): the_row(); 
		// vars
		$logo_text = get_sub_field('logo_text');
		$logo_caption = get_sub_field('logo_caption');
		$right_text = get_sub_field('right_text');
?>
<header>
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <div class="logo">
          <div class="left"><a href="<?php echo home_url(); ?>"><?php echo $logo_text; ?></a></div>
          <div class="right"><?php echo $logo_caption; ?></div>
          <!--<div class="clearfix"></div>-->
        </div>
      </div>
      <div class="col-sm-6 hidden-xs">
        <div class="logo_right pull-right">
          <div class="left"><img src="<?php bloginfo('template_directory'); ?>/images/apd-right.svg" /></div>
          <div class="right"><?php echo $right_text; ?></div>
        </div>
      </div>
    </div>
  </div>
</header>
<?php endwhile; ?>
<?php endif; ?>




<!-- Navbar -->
<nav class="navbar navbar-inverse">
  <div class="container">
    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
    <div class="collapse navbar-collapse js-navbar-collapse">
      
<?php 
if (has_nav_menu('main_navigation')) {

$app_default_menu = array(
'theme_location'  => 'main_navigation',
'menu'       => 'main_navigation',
'depth'      => 2,
'container'  => false,
'menu_class' => 'nav navbar-nav',
'menu_id' => 'nav',
'fallback_cb'       => 'wp_page_menu',
'walker'     => new wp_bootstrap_navwalker(),
);

}
wp_nav_menu( $app_default_menu );

?>
      
      <!--<ul class="nav navbar-nav">
        <li><a href="#">News</a></li>
        <li><a href="#">Archiv</a></li>
        <li><a href="#">Suche</a></li>
        <li><a href="#">Kontakt</a></li>
        <li><a href="#">Impressum</a></li>
      </ul>-->
      
      
      <div class="pull-right">
			<?php if ( !function_exists('dynamic_sidebar')
            || !dynamic_sidebar('sidebar-3') ) : ?>
            <?php endif; ?>
        
        <?php echo get_search_form(); ?>
        <!--<form class="navbar-form" role="search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search" name="q">
            <div class="input-group-btn">
              <button class="btn btn-yellow" type="submit"><i class="fa fa-search"></i></button>
            </div>
          </div>
        </form>-->
      </div>
    </div>
    <!-- /.nav-collapse -->
  </div>
</nav>