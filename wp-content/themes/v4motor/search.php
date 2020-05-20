<?php get_header();?>

<?php
	
	$categoria = get_the_category();
	$idCat=$categoria[0]->cat_ID;
	
	$nameCat='';
	$parent = get_cat_name($categoria[0]->category_parent);
	if (!empty($parent)) {
	    $nameCat = $parent;
	} else {
	    $nameCat =  $categoria[0]->cat_name;
	}

?>

<div class="body-contener">
	<div class="banner-lyrbg">
  <h3><?php printf( __( 'B&uacute;squeda por: %s', 'embajadaperu' ), '<span>' . get_search_query() . '</span>' ); ?></h3>
</div>
<p>Estoy en... <a href="http://www.volumen4motor.com">Inicio</a><span> / </span> B&uacute;squeda</p>
<div class="body-left">
  <div class="camas-corner">
  	 <div class="catalogo-devider"><img src="<?php echo TEMPLATEURI;?>/images/cata-devider.jpg" alt="cata" class="sinBorde" /></div>
  	<?php if ( have_posts() ) : ?>
	    <?php while (have_posts()) : the_post();?>
			    <p>
			      <h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
			       <?php echo limit_words(get_the_content(), '30');?> ... [ <a href="<?php the_permalink(); ?>">ver m&aacute;s</a> ]
			    </p>
			    <div class="clr"></div>
			    <div class="catalogo-devider"><img src="<?php echo TEMPLATEURI;?>/images/cata-devider.jpg" alt="cata" class="sinBorde" /></div>
	    <?php endwhile;?>
    <?php else : ?>
   		<p>No se encontraron resultados.</p>
    <?php endif; ?>
    <div class="perivious-next">
    	<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(  );} ?>
    </div>
    <div class="clr"></div>
  </div>
</div>

<?php get_sidebar('blog'); ?>

<div class="clr"></div>
</div>

        
<?php get_footer(); ?>