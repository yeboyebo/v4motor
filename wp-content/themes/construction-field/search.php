<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Acme Themes
 * @subpackage Construction Field
 */
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
get_header();
global $construction_field_customizer_all_values;
?>
<div class="page-menu">
<?php echo do_shortcode('[do_widget id=nav_menu-2]'); ?>
<?php echo do_shortcode('[do_widget id=nav_menu-3]'); ?>
<?php echo do_shortcode( '[searchandfilter slug="categorias"]' ); ?>
</div>
<!--div class="wrapper inner-main-title">
	<?php
	echo construction_field_get_header_normal_image();
	?>

			<?php //echo do_shortcode('[do_widget id=nav_menu-3]'); ?>
	<div class="container">
		<header class="entry-header init-animate">
			<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'construction-field' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			<?php
			if( 1 == $construction_field_customizer_all_values['construction-field-show-breadcrumb'] ){
				//construction_field_breadcrumbs();
			}
			?>
		</header>
	</div>
</div-->
<div id="content" class="site-content container clearfix category category-search">
	<?php
	$sidebar_layout = construction_field_sidebar_selection();
	if( 'both-sidebar' == $sidebar_layout ) {
		echo '<div id="primary-wrap" class="clearfix">';
	}
	?>
	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php
		if ( have_posts() ) :
				//echo "<h1>".$_SESSION['lastCategory']." -> ".$_GET['sfid']."</h1>";
				while ( have_posts() ) :
					the_post();
					$categories = get_the_category(get_the_ID());
					$cat = $categories[0]->cat_ID;
					if ( (isset($_GET['sfid']) && isset($_SESSION['lastCategory']) && in_category($_SESSION['lastCategory'], get_the_ID())) || !isset($_GET['sfid']) ) :
					echo '<div class="col-md-4 col-xs-12 ">';
					

					/*
                     * Include the Post-Format-specific template for the content.
                     * If you want to override this in a child theme, then include a file
                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                     */
					get_template_part( 'template-parts/content', get_post_format() );
					echo '</div>';
					else:
						//the_post();
					endif;
				endwhile;

			/**
			 * construction_field_action_posts_navigation hook
			 * @since Construction Field 1.0.0
			 *
			 * @hooked construction_field_posts_navigation - 10
			 */
			do_action( 'construction_field_action_posts_navigation' );

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->
	<?php
	get_sidebar( 'left' );
	get_sidebar();
	if( 'both-sidebar' == $sidebar_layout ) {
		echo '</div>';
	}
	?>
</div><!-- #content -->
<?php get_footer();