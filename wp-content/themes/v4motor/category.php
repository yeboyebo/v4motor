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
  <h3><?php echo $nameCat;?></h3>
</div>
<p><?php new simple_breadcrumb();?></p>
<div class="body-left">
  <div class="camas-corner">
    <?php while (have_posts()) : the_post();?>
           <div class="catalogo-devider"><img src="<?php echo TEMPLATEURI;?>/images/cata-devider.jpg" alt="cata" class="sinBorde" /></div>
		    <div class="blog-left"><a href="<?php the_permalink(); ?>"><?php 
		    
		    	$attr = array('class'	=> "sinBorde");
				if ( has_post_thumbnail()) the_post_thumbnail('thumbnail',$attr);
		    ?></a></div>
		    <div class="blog-text04">
		      <p><em><?php the_date('d/m/Y'); ?></em></p>
		      <h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
		       <?php echo limit_words(get_the_content(), '10');?> ...
		      <p class="cn_linkComment"><?php comments_popup_link(__('<span>0</span> comentarios', ''), __('<span>1</span> Comentario', ''), __('<span>%</span> Comentarios', ''))?></p>
		    </div>
		    <div class="clr"></div>
    <?php endwhile;?>
    <div class="catalogo-devider"><img src="<?php echo TEMPLATEURI;?>/images/cata-devider.jpg" alt="cata" class="sinBorde" /></div>
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