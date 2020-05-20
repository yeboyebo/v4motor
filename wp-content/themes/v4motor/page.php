<?php get_header();?>

<div class="body-contener">
	<div class="banner-lyrbg"><h3><? echo the_title();?></h3></div>
	<p><?php new simple_breadcrumb();?></p>
	<div class="body-left">
		<div class="camas-corner">
		<?php while (have_posts()) : the_post();?>
            <?php the_content();?>
        <?php endwhile;?>
        <div class="clr"></div>
       </div>
	</div>

<?php get_sidebar(); ?>

<div class="clr"></div>
</div>

        
<?php get_footer(); ?>