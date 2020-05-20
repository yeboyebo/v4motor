<?php get_header();?>

<?php
	
	$categoria = get_the_category();
	$idCat=$categoria[0]->cat_ID;
	$catPost=$categoria[0]->cat_name;
	
	$nameCat='';
	$parent = get_cat_name($categoria[0]->category_parent);
	if (!empty($parent)) {
	    $nameCat = $parent;
	} else {
	    $nameCat =  $categoria[0]->cat_name;
	}
	
	
?>

<div class="body-contener">
	<div class="banner-lyrbg"><h3><?php echo $nameCat;?></h3></div>
	<p><?php new simple_breadcrumb();?></p>
	<div class="body-left">
		<div class="camas-corner">
		<?php while (have_posts()) : the_post();?>
            <p><em>Publicado por <?php the_author_posts_link(); ?> en <span><?php echo $catPost ?></span>, <?php the_date('d/m/Y'); ?></em></p>
			<div class="left-topheding"><? echo the_title();?></div>
			<div class="detail-img"><?php if ( has_post_thumbnail()) the_post_thumbnail('full');?></div>
			<div class="detail-like-facetxt"><iframe src="//www.facebook.com/plugins/like.php?href&amp;send=false&amp;layout=standard&amp;width=450&amp;show_faces=true&amp;action=like&amp;colorscheme=light&amp;font&amp;height=25&amp;appId=239025399500974" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:25px;" allowTransparency="true"></iframe></div>
			<div class="clr"></div>
			<?php the_content();?>
			<div class="truck-text">Comp&aacute;rtelo con tus amigos:</div>
			<div class="truck-img st_facebook_custom" displayText='Facebook'><img src="<?php echo TEMPLATEURI;?>/images/f-truck.jpg" class="sinBorde" alt="" /></div>
			<div class="truck-img st_twitter_custom" displayText='Tweet'><img src="<?php echo TEMPLATEURI;?>/images/t-truck.jpg" class="sinBorde" alt="" /></div>
			<div class="truck-img st_yahoo_custom" displayText='Yahoo'><img src="<?php echo TEMPLATEURI;?>/images/y-truck.jpg" class="sinBorde" alt="" /></div>
			<div class="truck-img st_google_custom" displayText='Google'><img src="<?php echo TEMPLATEURI;?>/images/buz-truck.jpg" class="sinBorde" alt="" /></div>
			<div class="truck-img st_sharethis_custom" displayText='ShareThis'><img src="<?php echo TEMPLATEURI;?>/images/j-truck.jpg" class="sinBorde" alt="" /></div>
			<div class="truck-img st_email_custom" Email><img src="<?php echo TEMPLATEURI;?>/images/m-truck.jpg" class="sinBorde" alt="" /></div>
			<div class="clr"></div>
			<div class="catalogo-devider"><img src="<?php echo TEMPLATEURI;?>/images/cata-devider.jpg" alt="cata" class="sinBorde" /></div>
			<?php comments_template('', true); ?>
			<div class="clr"></div>
        <?php endwhile;?>
        <div class="clr"></div>
       </div>
	</div>

<?php get_sidebar('blog'); ?>

<div class="clr"></div>
</div>

        
<?php get_footer(); ?>