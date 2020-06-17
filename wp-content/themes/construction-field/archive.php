<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Acme Themes
 * @subpackage Construction Field
 */
get_header();
global $construction_field_customizer_all_values;
?>
<div class="row">
		<div class="page-menu">
			<?php //construction_field_breadcrumbs();?>
			<?php echo do_shortcode('[do_widget id=nav_menu-2]'); ?>
			<?php echo do_shortcode('[do_widget id=nav_menu-3]'); ?>
			<?php echo do_shortcode( '[searchandfilter slug="categorias"]' ); ?>
		</div>
	</div>
<div id="content" class="site-content container clearfix">
	<?php
	$sidebar_layout = construction_field_sidebar_selection();
	if( 'both-sidebar' == $sidebar_layout ) {
		echo '<div id="primary-wrap" class="clearfix">';
	}
	?>


	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php
			if ( have_posts() ) :
				/* Start the Loop */
				while ( have_posts() ) :
					echo '<div class="col-md-4 col-xs-12">';
					the_post();

					/*
                     * Include the Post-Format-specific template for the content.
                     * If you want to override this in a child theme, then include a file
                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                     */
					get_template_part( 'template-parts/content', get_post_format() );
					echo '</div>';
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
	</div><!-- #primary -->
	<?php
	get_sidebar( 'left' );
	get_sidebar();
	if( 'both-sidebar' == $sidebar_layout ) {
		echo '</div>';
	}
	?>
</div><!-- #content -->
<?php get_footer();
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
$categories = get_the_category();
$_SESSION['lastCategory'] = $categories[0]->cat_ID;
?>
