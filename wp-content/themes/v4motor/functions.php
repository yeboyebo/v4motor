<?php

require_once(TEMPLATEPATH . '/functions/shortcodes.php');
require_once(TEMPLATEPATH . '/com/breadcrumb.class.php');
define('TEMPLATEURI', get_bloginfo('template_directory'));


function register_jquery() {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js');
    wp_enqueue_script( 'jquery' );
}
add_action('wp_enqueue_scripts', 'register_jquery');

function register_others_script() {
    wp_register_script('shadowbox',TEMPLATEURI.'/js/shadowbox-3.0.3/shadowbox.js', array('jquery'));
    wp_enqueue_script('shadowbox');
	wp_register_script('utilJs',TEMPLATEURI.'/js/functions.js', array('jquery'));
    wp_enqueue_script('utilJs');
	wp_register_script('jqTimers',TEMPLATEURI.'/js/galleryview-3.0b3/jquery.timers-1.2.js', array('jquery'));
    wp_enqueue_script('jqTimers');
	wp_register_script('jqEasing',TEMPLATEURI.'/js/galleryview-3.0b3/jquery.easing.1.3.js', array('jquery'));
    wp_enqueue_script('jqEasing');
	wp_register_script('jqGallery',TEMPLATEURI.'/js/galleryview-3.0b3/jquery.galleryview-3.0.js', array('jquery'));
    wp_enqueue_script('jqGallery');
	/*wp_register_script('jqGallery2',TEMPLATEURI.'/js/jquery.galleryview-3.0-dev.js', array('jquery'));
    wp_enqueue_script('jqGallery2');*/
}
add_action('wp_enqueue_scripts', 'register_others_script');


function mcekit_editor_style (){
	$url= TEMPLATEURI.'/css/admin.css';
	return $url;
}
add_filter ('mce_css', 'mcekit_editor_style');


if ( function_exists('register_nav_menus') ){
	register_nav_menus( array('primary' => __( 'Primary Navigation' ),) );
}

function my_wp_nav_menu_args( $args = '' ){
	$args['container'] = false;
	return $args;
} 
add_filter( 'wp_nav_menu_args', 'my_wp_nav_menu_args' );

if ( function_exists( 'add_theme_support' ) ) { 
  add_theme_support( 'post-thumbnails' ); 
}
if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'sidebar_thumb', 113, 74, true );
}


function limit_words($string, $word_limit) {
	$string = preg_replace('/<img(?:[^>]+?)>/', '', $string);
    $string = preg_replace('/<a([^>]+?)><\/a>/', '', $string);
    $string = preg_replace('/<p([^>]*?)><\/p>/', '', $string);
    $string = preg_replace('/<object(.+?)<\/object>/', '', $string);
	$words = explode(' ', $string);
	return implode(' ', array_slice($words, 0, $word_limit));
 
}

function change_wp_login_url() {
	echo bloginfo('');
}
function change_wp_login_title() {
	echo 'Ir al Site';
}
add_filter('login_headerurl', 'change_wp_login_url');
add_filter('login_headertitle', 'change_wp_login_title');

function admin_login_logo() {
	echo '<style type="text/css">
	h1 a { background-image:url('.TEMPLATEURI.'/images/admin/logo-acceso.png) !important; }
	</style>';
}
add_action('login_head', 'admin_login_logo');

function admin_logo() {
	echo '
	<style type="text/css">
	#header-logo { background-image: url('.TEMPLATEURI.'/images/admin/logo-menu.png) !important; }
	</style>
	';
}
add_action('admin_head', 'admin_logo');

function admin_favicon() {
    echo '<link rel="Shortcut Icon" type="image/x-icon" href="'.TEMPLATEURI.'/images/favicon.ico" />';
}
add_action('admin_head', 'admin_favicon');

add_filter('admin_footer_text', 'left_admin_footer_text_output');
function left_admin_footer_text_output($text) {
    $text = 'Creado por <a href="http://www.interactiv4.com/" target="_blank">www.interactiv4.com</a>';
    return $text;
}
 
add_filter('update_footer', 'right_admin_footer_text_output', 11);
function right_admin_footer_text_output($text) {
    $text = 'v.1.0';
    return $text;
}

if (!current_user_can('edit_users')) {
    add_action('init', create_function('$a', "remove_action('init', 'wp_version_check');"), 2);
    add_filter('pre_option_update_core', create_function('$a', "return null;"));
}

remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);


if ( ! function_exists( 'volumen4motor_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own twentyten_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Twenty Ten 1.0
 */
function volumen4motor_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
		<div id="comment-<?php comment_ID(); ?>">
			<div class="comment-box">
				<span><em><?php echo get_comment_author_link();?> el <?php echo get_comment_date();?></em></span>
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'volumen4motor' ); ?></em>
					<br />
				<?php endif; ?>
				<p><?php comment_text(); ?></p>
				<?php edit_comment_link( __( '(Edit)', 'volumen4motor' ), ' ' );?><br />
				<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				<div class="clr"></div>
			</div>
		</div>

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
			break;
	endswitch;
}
endif;


?>