<?php
/**
 * The template for displaying Comments.
 *
 */
?>

			<div id="comments">
<?php if ( post_password_required() ) : ?>
				<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'volumen4motor' ); ?></p>
			</div><!-- #comments -->
<?php
		/* Stop the rest of comments.php from being processed,
		 * but don't kill the script entirely -- we still have
		 * to fully load the template.
		 */
		return;
	endif;
?>

<?php
	// You can start editing here -- including this comment!
?>

<?php if ( have_comments() ) : ?>
			<h3 id="comments-title">Comentarios</h3>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<div class="navigation">
				<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments', 'volumen4motor' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>', 'volumen4motor' ) ); ?></div>
			</div> <!-- .navigation -->
<?php endif; // check for comment navigation ?>

			<?php
					/* Loop through and list the comments. Tell wp_list_comments()
					 * to use twentyten_comment() to format the comments.
					 * If you want to overload this in a child theme then you can
					 * define twentyten_comment() and that will be used instead.
					 * See twentyten_comment() in twentyten/functions.php for more.
					 */
					wp_list_comments( array( 'callback' => 'volumen4motor_comment' ) );
				?>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<div class="navigation">
				<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments', 'volumen4motor' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>', 'volumen4motor' ) ); ?></div>
			</div><!-- .navigation -->
<?php endif; // check for comment navigation ?>

<?php else : // or, if we don't have comments:

	/* If there are no comments and comments are closed,
	 * let's leave a little note, shall we?
	 */
	if ( ! comments_open() ) :
?>
	<p class="nocomments"><?php _e( 'Comentarios cerrados' ); ?></p>
<?php endif; // end ! comments_open() ?>

<?php endif; // end have_comments() ?>
<div class="reset separa"></div>


<div class="name-fields">Escribe aqu&iacute; tu comentario</div>
<form action="http://v4m.interactiv4.com/wp-comments-post.php" method="post" id="commentform">
<input type='hidden' name='comment_post_ID' value='<?php echo $post->ID;?>' id='comment_post_ID' />
<input type='hidden' name='comment_parent' id='comment_parent' value='0' />
	
	<div class="name-enter">Nombre *</div>
	<div class="email-enter">Email (no se publicará) *</div>
	<div class="clr"></div>
	<input id="author" name="author" type="text" class="name-enter-inpt" />
	<input id="email" name="email" type="text" class="email-enter-inpt" />
	<div class="clr"></div>
	<div class="coment-boxbtm01">Comentario *</div>
	<textarea id="comment" name="comment" cols="" rows="" class="coment-boxbtm01-inpt"></textarea>
	<p>&nbsp;</p>
	<input type="submit" value="" class="enter-btn rollover"/>
	<div class="campos">* Campos obligatorios</div>
	<div class="clr"></div>
</form>	

</div><!-- #comments -->
