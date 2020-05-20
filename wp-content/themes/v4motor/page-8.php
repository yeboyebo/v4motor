<?php get_header();?>

<script type="text/javascript">
	$(document).ready(function(){
			$('#gallery').galleryView({
				panel_width: 548,
				panel_height: 373,
				frame_width: 82,
				frame_height: 49,
				show_filmstrip_nav:false,
				show_infobar:false,
				frame_gap:12,
				panel_scale: 'crop'
			});
	});	
</script>

<div class="body-contener">
<div class="banner-lyrbg"><h3>Ofertas</h3></div>
<p><?php new simple_breadcrumb();?></p>
<div class="body-left">
<div class="banner cn_carrousel page_8">
	
	<ul id="gallery">
		<?php
		
			$attachments = get_children(
				array(
					'post_parent' => 8, 
					'post_type' => 'attachment', 
					'order' => 'ASC', 
					'orderby' => 'menu_order',
					'post_status' => 'inherit'
				)
			);
					
			$out='';
			foreach ($attachments as $item) {
				$idImg=$item->ID;
				$aImg=wp_get_attachment_image_src($idImg,"full");
				$src=$aImg[0];
				$width=$aImg[1];
				$height=$aImg[2];
				
				$imgName=$item->post_title;
				$prefijo=substr($imgName, 0, 2);
						
						
				if($prefijo=='g_'){
					$out.='<li><img src="'.$src.'" /></li>';
				}
			}
			echo $out;
					
			wp_reset_query();
			
		?>
   </ul>
	
</div>
	<?php while (have_posts()) : the_post();?>
            <?php the_content();?>
        <?php endwhile;?>
</div>

<?php get_sidebar(); ?>

<div class="clr"></div>
</div>

        
<?php get_footer(); ?>