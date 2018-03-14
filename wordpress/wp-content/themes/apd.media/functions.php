<?php  

require_once ('requireplugins.php');
require_once ('inc/compact.php');
require_once ('inc/archive_categories.php');

require_once ('wp_bootstrap_navwalker.php');
register_nav_menu('main_navigation', __('Primary Menu', 'modality') );
register_nav_menu('footer_menu', __('Footer Menu', 'modality') );

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class($classes, $item){
     if( in_array('current-menu-item', $classes) ){
             $classes[] = 'active ';
     }
     return $classes;
}

//Theme Options
/*
add_filter('acf/settings/show_admin', '__return_false');
add_filter('acf/settings/show_updates', '__return_false');
*/

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Options',
		'menu_title'	=> 'APD Settings',
		'menu_slug' 	=> 'theme-options',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

}


add_theme_support( 'post-thumbnails' ); 
the_post_thumbnail();                  // without parameter -> 'post-thumbnail'
the_post_thumbnail( 'thumbnail' );       // Thumbnail (default 150px x 150px max)
the_post_thumbnail( 'medium' );          // Medium resolution (default 300px x 300px max)
the_post_thumbnail( 'large' );           // Large resolution (default 640px x 640px max)
the_post_thumbnail( 'full' );            // Full resolution (original size uploaded)
//the_post_thumbnail( array(100, 100) );  // Other resolutions




/**
 * Enqueues scripts and styles.
 *
 * @since Twenty Sixteen 1.0
 */
function apdmedia_scripts() {
	// Theme stylesheet.
	wp_enqueue_style( 'apdmedia-style', get_stylesheet_uri() );

	// Load the stylesheet.
	//wp_enqueue_style( 'apdmedia-bootstrap-min', get_template_directory_uri() . '/css/bootstrap.min.css', array( 'apdmedia-style' ), '20160816' );
	//wp_enqueue_style( 'apdmedia-styles', get_template_directory_uri() . '/css/app.css', array( 'apdmedia-style' ), '20160816' );
	wp_enqueue_style( 'apdmedia-app', get_template_directory_uri() . '/css/app.css', array( 'apdmedia-style' ), '20160816' );
	wp_enqueue_style( 'apdmedia-font-awesome', get_template_directory_uri() . '/css/font-awesome.css', array( 'apdmedia-style' ), '20160816' );
	wp_enqueue_style( 'apdmedia-prettyPhoto-css', get_template_directory_uri() . '/lightbox/prettyPhoto.css', array( 'apdmedia-style' ), '20160816' );
	wp_enqueue_style( 'apdmedia-print', get_template_directory_uri() . '/css/print.css', array( 'apdmedia-style' ), '20160816' );
	// Load the jquery.

	//wp_enqueue_script( 'apdmedia-jquery', get_template_directory_uri() . '/components/jquery/dist/jquery.js', array() );
	//wp_enqueue_script( 'apdmedia-bootstrap', get_template_directory_uri() . '/components/bootstrap-sass/assets/javascripts/bootstrap.js', array() );
	wp_enqueue_script( 'apdmedia-jquery-min', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', array() );
	//wp_enqueue_script( 'apdmedia-averagebg', get_template_directory_uri() . '/js/averagebg.js');
	//wp_enqueue_script( 'apdmedia-custom', get_template_directory_uri() . '/js/custom.js','','',true);
	//wp_enqueue_script( 'apdmedia-loadmore', get_template_directory_uri() . '/js/loadmore.js');
	wp_enqueue_script( 'apdmedia-bundle', get_template_directory_uri() . '/js/bundle.js', array());
	wp_enqueue_script( 'apdmedia-prettyPhoto', get_template_directory_uri() . '/lightbox/jquery.prettyPhoto.js', array());
	
	
	/*wp_localize_script( 'apdmedia-script', 'screenReaderText', array(
		'expand'   => __( 'expand child menu', 'apdmedia' ),
		'collapse' => __( 'collapse child menu', 'apdmedia' ),
	) );*/
	
}
add_action( 'wp_enqueue_scripts', 'apdmedia_scripts' );





// Widgets
function themename_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Primary Sidebar', 'theme_name' ),
        'id'            => 'sidebar-1',
        'before_widget' => '<aside><div class="greg_bg_with_radius">',
        'after_widget'  => '</div></aside>',
        'before_title'  => '<div class="section_title icon_one"><h4 class="text-uppercase">',
        'after_title'   => '</h4></div>',
    ) );
 
    register_sidebar( array(
        'name'          => __( 'Secondary Sidebar', 'theme_name' ),
        'id'            => 'sidebar-2',
        'before_widget' => '<ul><li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li></ul>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
 
    register_sidebar( array(
        'name'          => __( 'Header Social Links', 'theme_name' ),
        'id'            => 'sidebar-3',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
		
    ));
 
    register_sidebar( array(
        'name'          => __( 'Footer 1', 'theme_name' ),
        'id'            => 'sidebar-4',
        'before_widget' => '<div class="footer_address">',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
		
    ));
 
    register_sidebar( array(
        'name'          => __( 'Footer 2', 'theme_name' ),
        'id'            => 'sidebar-5',
        'before_widget' => '<div class="footer_links">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
		'class' => 'footer_links'
    ));
 
    register_sidebar( array(
        'name'          => __( 'Footer 3', 'theme_name' ),
        'id'            => 'sidebar-6',
        'before_widget' => '<div class="footer_s_links">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ));
 
    register_sidebar( array(
        'name'          => __( 'Footer 4', 'theme_name' ),
        'id'            => 'sidebar-7',
        'before_widget' => '<div class="footer_address">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ));
    register_sidebar( array(
        'name'          => __( 'Archives', 'theme_name' ),
        'id'            => 'sidebar-8',
        'before_widget' => '<div class="footer_address">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ));
}
add_action( 'widgets_init', 'themename_widgets_init' );



require get_template_directory() . '/inc/widgets.php';




// Function to get archives list with limited months
function wpb_limit_archives() { 
 
$my_archives = wp_get_archives(array(
    'type'=>'monthly', 
    'limit'=>6,
    'echo'=>0
));
     
return $my_archives; 
 
} 
 
// Create a shortcode
add_shortcode('wpb_custom_archives', 'wpb_limit_archives'); 
 
// Enable shortcode execution in text widget
add_filter('widget_text', 'do_shortcode'); 




function string_limit_words($string, $word_limit)
{
  $words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit)
  array_pop($words);
  return implode(' ', $words);
  
}


function my_excerpt_length($length) {
return 250;
}
add_filter('excerpt_length', 'my_excerpt_length');


function my_search_form( $form ) {
$form = '<form role="search" method="get" id="searchform-all"  action="' . home_url( '/' ) . '"  class="navbar-form">
<div class="input-group">
<input type="text" value="' . get_search_query() . '" name="s" id="s" class="form-control" placeholder="Suche"/>
<div class="input-group-btn">
<button class="btn btn-yellow" type="submit" id="searchsubmit"><i class="fa fa-search"></i></button>
</div>
</div>
</form>';
return $form;
}

add_filter( 'get_search_form', 'my_search_form' );


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/share.php';




/*function filter_plugin_updates( $value ) {
    unset( $value->response['js_composer/js_composer.php'] );
	unset( $value->response['advanced-custom-fields-pro/acf.php'] );
    return $value;
}
add_filter( 'site_transient_update_plugins', 'filter_plugin_updates' );*/



function print_button_shortcode( $atts ){
return '<a class="print-link" href="javascript:window.print()">Print This Page</a>';
}
add_shortcode( 'print_button', 'print_button_shortcode' );







/*function acf_set_featured_image( $value, $post_id, $field  ){
    
    if($value != ''){
	    //Add the value which is the image ID to the _thumbnail_id meta data for the current post
	    add_post_meta($post_id, '_thumbnail_id', $value);
    }
 
    return $value;
}

// acf/update_value/name={$field_name} - filter for a specific field based on it's name
add_filter('acf/update_value/name=cursusfoto', 'acf_set_featured_image', 10, 3);*/

add_filter( 'jpeg_quality', create_function( '', 'return 100;' ) );


/*
 * Set post views count using post meta
 */
function setPostViews($postID) {
    $countKey = 'post_views_count';
    $count = get_post_meta($postID, $countKey, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $countKey);
        add_post_meta($postID, $countKey, '0');
    }else{
        $count++;
        update_post_meta($postID, $countKey, $count);
    }
}

// function to display number of posts.
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}




function hide_update_notice_to_all_but_admin_users() 
{
    if (!current_user_can('update_core')) {
        remove_action( 'admin_notices', 'update_nag', 3 );
    }
}
add_action( 'admin_head', 'hide_update_notice_to_all_but_admin_users', 1 );

function remove_core_updates(){
    global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
}
add_filter('pre_site_transient_update_core','remove_core_updates');
add_filter('pre_site_transient_update_plugins','remove_core_updates');
add_filter('pre_site_transient_update_themes','remove_core_updates');



function sanitize_filename_on_upload($filename) {
$ext = end(explode('.',$filename));
// Replace all weird characters
$sanitized = preg_replace('/[^a-zA-Z0-9-_.]/','', substr($filename, 0, -(strlen($ext)+1)));
// Replace dots inside filename
$sanitized = str_replace('.','-', $sanitized);
return strtolower($sanitized.'.'.$ext);
}

add_filter('sanitize_file_name', 'sanitize_filename_on_upload', 10);



//Remove from Post Content
remove_filter('the_content', 'wptexturize');
//Remove from Post Title
remove_filter('the_title', 'wptexturize');
//Remove from Post Excerpt
remove_filter('the_excerpt', 'wptexturize');
//Remove from Post Comments
remove_filter('comment_text', 'wptexturize');