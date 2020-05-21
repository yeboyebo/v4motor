<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Acme Themes
 * @subpackage Construction Field
 */
get_header();
global $construction_field_customizer_all_values;
?>
<?php echo do_shortcode('[do_widget id=nav_menu-2]'); ?>
<div class="wrapper inner-main-title">
	<?php
	echo construction_field_get_header_normal_image();
	?>

			<?php //echo do_shortcode('[do_widget id=nav_menu-3]'); ?>
	<div class="container">
		<header class="entry-header init-animate">
			<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'construction-field' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			<?php
			if( 1 == $construction_field_customizer_all_values['construction-field-show-breadcrumb'] ){
				construction_field_breadcrumbs();
			}
			?>
		</header><!-- .entry-header -->
	</div>
</div>
<div id="content" class="site-content container clearfix category">
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

			/* Start the Loop */
			while ( have_posts() ) :
				echo '<div class="col-md-4 col-xs-12">';
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
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