<?php 
	/*
	
	Template Name: Sitemap Template
	
	*/
?>
<?php get_header();?>
        <!-- BEGIN OF PAGE TITLE -->
        <?php if (have_posts()) : ?>      
        <div id="page-title">
        	<div id="page-title-inner">
                <div class="title">
                <h1><?php the_title();?></h1>
                </div>
                <div class="dot-separator-title"></div>
                <div class="description">
                <?php $data = get_post_meta($post->ID, 'fecha', true ); ?>
                <p><?php echo $data;?></p>
                </div>
            </div>   	            
        </div>
        <!-- END OF PAGE TITLE --> 
        <div class="clr"></div>
        <!--  div id="miga">
        	<div id="cn-miga"><?php $simple_breadcrumb= new simple_breadcrumb(); ?></div>
       </div -->
        <!-- BEGIN OF CONTENT -->
        <div id="content">
        	<div id="content-left">          
                <div class="maincontent">
                <?php while (have_posts()) : the_post();?>
                <?php the_content();?>
                <div class="mapa-web">
					<?php							
						$catArray = explode("</li>",wp_list_pages('title_li=&echo=0&depth=2&exclude='));
						$catCount = count($catArray) - 1;
						$catColumns = round($catCount / 2);
					 
						for ($i=0;$i<$catCount;$i++) {
							if ($i<=$catColumns){
								$catLeft = $catLeft.''.$catArray[$i].'</li>';
						         }
							else{
								$catRight = $catRight.''.$catArray[$i].'</li>';
							 }  
						};
					?>
 
					<ul class="left">
					      <?php echo $catLeft; ?>
					</ul>
					<ul class="right">
					      <?php echo $catRight; ?>
					</ul>
				</div>
                <?php endwhile;?>     
                </div>
            </div>
            <?php endif;?>
          <?php get_sidebar();?>             
                  
        </div>
        <!-- END OF CONTENT -->
<?php get_footer();?>
