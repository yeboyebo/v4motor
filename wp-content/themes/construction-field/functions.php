<?php
/**
 * Construction Field functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Acme Themes
 * @subpackage Construction Field
 */

/**
 * Require init.
 */
require trailingslashit( get_template_directory() ).'acmethemes/init.php';
remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );

require_once(TEMPLATEPATH . '/functions/shortcodes.php');
require_once(TEMPLATEPATH . '/com/breadcrumb.class.php');
define('TEMPLATEURI', get_bloginfo('template_directory'));
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
function register_others_script() {
 //    wp_register_script('shadowbox',TEMPLATEURI.'/js/shadowbox-3.0.3/shadowbox.js', array('jquery'));
 //    wp_enqueue_script('shadowbox');
	// wp_register_script('jqTimers',TEMPLATEURI.'/js/galleryview-3.0b3/jquery.timers-1.2.js', array('jquery'));
 //    wp_enqueue_script('jqTimers');
	// wp_register_script('jqEasing',TEMPLATEURI.'/js/galleryview-3.0b3/jquery.easing.1.3.js', array('jquery'));
 //    wp_enqueue_script('jqEasing');
	// wp_register_script('jqGallery',TEMPLATEURI.'/js/galleryview-3.0b3/jquery.galleryview-3.0.js', array('jquery'));
 //    wp_enqueue_script('jqGallery');
	// wp_register_script('jqGallery2',TEMPLATEURI.'/js/jquery.galleryview-3.0-dev.js', array('jquery'));
 //    wp_enqueue_script('jqGallery2');
    wp_register_script('utilJs',TEMPLATEURI.'/js/functions.js', array('jquery'));
    wp_enqueue_script('utilJs');
}
add_action('wp_enqueue_scripts', 'register_others_script');


remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);

function calculator(){
$html = '
  <div class="row">
   <div class="col-md-2 col-xs-12"></div>
  <div class="col-md-8 col-xs-12 financiacion">
          <h3>Finanaciación a tu medida</h3>
          <input type="range" class="range-slider"  name="price" value="12000" max="50000" onchange="updateRangeInput(this.value);" />
          <label>Importe</label><strong class="importe">'.number_format(12000, 2, ',', '.').'€</strong>
          <input type="range" class="range-slider"  name="months" value="36" max="60" onchange="updateRangeTimeInput(this.value);" />
          <label>Tiempo</label><strong class="time">36 Meses</strong>
          <div class="row">
            <p class="cuota"><span>Cuota: </span><span class="value">75€/mes</span>
            <p>Toda la información sobre las condiciones de financiación disponible aquí</p>
          </div>
          <div class="row interesado">
          <h3>¡Me interesa!</h3>
            <a href="https://volumen4motor.com/?page_id=27" class="col-md-4 col-xs-4"><i class="fas fa-envelope-open-text"></i>Escríbenos</a>
            <a href="tel:948214094" class="col-md-4 col-xs-4"><i class="fas fa-phone-volume"></i>Llámanos</a>
            <a href="https://volumen4motor.com/?page_id=27" class="col-md-4 col-xs-4"><i class="fas fa-user-clock"></i>Te llamamos</a>
          </div>
        </div>
    <div class="col-md-2 col-xs-12"></div>
  </div>
';	

$html .= "<script>
  function updateRangeInput(val) {
      jQuery('.financiacion .importe').text(parseFloat(val).toLocaleString('es-ES',  {style: 'currency', currency: 'EUR'}));
      var precio = jQuery('.financiacion .importe').text().replace('.','').replace(',','.');
      var cuota = calculaFinanciacion(parseFloat(precio), parseInt(jQuery('.financiacion .time').text()));
      jQuery('.financiacion .value').text(cuota.toLocaleString('es-ES',  {style: 'currency', currency: 'EUR'}));
    }
    function updateRangeTimeInput(val) {
      jQuery('.financiacion .time').text(val+' Meses');
      var precio = jQuery('.financiacion .importe').text().replace('.','').replace(',','.');
      var cuota = calculaFinanciacion(parseFloat(precio), parseInt(jQuery('.financiacion .time').text()));
      jQuery('.financiacion .value').text(cuota.toLocaleString('es-ES',  {style: 'currency', currency: 'EUR'}));
    }

    jQuery(document).ready(function(){
      var precio = jQuery('.financiacion .importe').text().replace('.','').replace(',','.');
        var cuota = calculaFinanciacion(parseFloat(precio), parseInt(jQuery('.financiacion .time').text()));
        jQuery('.financiacion .value').text(cuota.toLocaleString('es-ES',  {style: 'currency', currency: 'EUR'}));
    })


    function calculaFinanciacion(precio, meses){

      var interes = parseFloat((7.99/100)/12);
    var entrada = 0;
      if(isNaN(entrada)){
      entrada = 0;
     }


    precio += (precio * 0.03);

      var cuota;
      //var Finance = import('finance.js');

      var finance = new Finance();
      cuota = finance.AM(precio, 7.99, meses/12, 0);
      //cuota = (precio*interes*(Math.pow((1+interes),(meses))))/((Math.pow((1+interes),(meses)))-1);
      //console.log(cuota);
      completo=+parseFloat(cuota*meses);
    return cuota;
    }
</script>";
return $html;
}
add_shortcode( 'calculadora_financiacion', 'calculator' );

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

