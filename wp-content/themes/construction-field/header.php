<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Acme Themes
 * @subpackage Construction Field
 */

/**
 * construction_field_action_before_head hook
 * @since Construction Field 1.0.0
 *
 * @hooked construction_field_set_global -  0
 * @hooked construction_field_doctype -  10
 */
do_action( 'construction_field_action_before_head' );?>
	<head>

		<?php
		/**
		 * construction_field_action_before_wp_head hook
		 * @since Construction Field 1.0.0
		 *
		 * @hooked construction_field_before_wp_head -  10
		 */
		do_action( 'construction_field_action_before_wp_head' );

		wp_head();
		?>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

	</head>
<body <?php body_class();?>>

<?php
/**
 * construction_field_action_before hook
 * @since Construction Field 1.0.0
 *
 * @hooked construction_field_site_start - 20
 */
echo '
<link href="/wp-content/themes/construction-field/css/all.css" rel="stylesheet">
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<script  src="/wp-content/themes/construction-field/assets/js/finance.js"></script>

  ';

do_action( 'construction_field_action_before' );

/**
 * construction_field_action_before_header hook
 * @since Construction Field 1.0.0
 *
 * @hooked construction_field_skip_to_content - 10
 */
do_action( 'construction_field_action_before_header' );

/**
 * construction_field_action_header hook
 * @since Construction Field 1.0.0
 *
 * @hooked construction_field_header - 10
 */
do_action( 'construction_field_action_header' );

/**
 * construction_field_action_after_header hook
 * @since Construction Field 1.0.0
 *
 * @hooked null
 */
do_action( 'construction_field_action_after_header' );

/**
 * construction_field_action_before_content hook
 * @since Construction Field 1.0.0
 *
 * @hooked null
 */
do_action( 'construction_field_action_before_content' );
echo '
<style type="text/css" media="screen">
	html { margin-top: 0px !important; }
	* html body { margin-top: 0px !important; }
	@media screen and ( max-width: 782px ) {
		html { margin-top: 0px !important; }
		* html body { margin-top: 0px !important; }
	}
</style>';