<?php
/**
 * Template part for displaying posts and search results.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Acme Themes
 * @subpackage Construction Field
 */
global $construction_field_customizer_all_values;
$content_from = $construction_field_customizer_all_values['construction-field-blog-archive-content-from'];
$no_blog_image = '';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="content-wrapper">
        <?php
        $thumbnail = $construction_field_customizer_all_values['construction-field-blog-archive-img-size'];
        ?>
        <div class="entry-content <?php echo $no_blog_image?>">
			<?php
			if( has_post_thumbnail() && 'disable' != $thumbnail):
	        ?>
            <!--post thumbnal options-->
            <div class="image-wrap">
                <div class="post-thumb">
                    <a href="<?php the_permalink(); ?>">
				        <?php the_post_thumbnail( $thumbnail ); ?>
                    </a>
                </div><!-- .post-thumb-->
            </div>
	        <?php
        else:
	        $no_blog_image = 'no-image';
		endif;?>
		<?php $fields = get_fields();//print_r($fields);
			$classTitle = "post-title";
			if(isset($fields['Precio']) && $fields['Precio'] > 0){
				$classTitle = "entry-header-title";
			}
		?>
		<div class="<?= $classTitle ?>  t">
				<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		</div>
		<?php if(isset($fields['Precio']) && $fields['Precio'] > 0):?>
		<div class="row block-precio">
			<div class="col-md-8 precio">
				<span>
				<?=  number_format($fields['Precio'], 2, ',', '.'); ?>€
				</span>
			</div>
			<div class="col-md-4 info">
				<a href="<?=  get_permalink() ?>">+ info <i class="fas fa-caret-right"></i></a>
			</div>
		</div>
		<div class="row caracteristicas">
			<div class="col-md-4 col-xs-3"><span>Año</span></div>
			<div class="col-md-4 col-xs-4"><span>Kilometraje</span></div>
			<div class="col-md-4 col-xs-5"><span>Combustible</span></div>
			<div class="col-md-4 col-xs-3"><strong><?=  $fields['Año']; ?></strong></div>
			<div class="col-md-4 col-xs-4"><strong><?=  number_format($fields['km'], 0, ',', '.'); ?></strong></div>
			<div class="col-md-4 col-xs-5"><strong><?=  $fields['Combustible']; ?></strong></div>
		</div>
	<?php endif;?>
		<?php
            if ( 'content' == $content_from ) :
	            the_content( sprintf(
	            /* translators: %s: Name of current post. */
		           // wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'construction-field' ), array( 'span' => array( 'class' => array() ) ) ),
		          //  the_title( '<span class="screen-reader-text">"', '"</span>', false )
	            ) );
	          /*wp_link_pages( array(
		            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'construction-field' ),
		            'after'  => '</div>',
	            ) );*/
            else :
               // the_excerpt();
            endif;
			?>

            <footer class="entry-footer">
				<?php //construction_field_entry_footer(); ?>
            </footer><!-- .entry-footer -->
		</div><!-- .entry-content -->
	</div>
</article><!-- #post-## -->