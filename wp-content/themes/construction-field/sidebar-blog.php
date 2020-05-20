<script type="text/javascript">	
	
	$(document).ready(function(){
		$(".cn_pesta").click(function(e){
			e.preventDefault();
			$(".cn_pesta").removeClass("active");
			$(this).addClass("active");
			$(".tab_content").hide();
			var tabTmp=$(this).attr('href')+'.tab_content';
			$(tabTmp).fadeIn('slow');
	
			return false;
		});
		
		$('.right-email-box input[type=text]').val('mi e-mail');
		$('.right-email-box input[type=text]').focus(function(){
			$(this).val('');
		});
	});
	
</script>


<div class="body-right">
<div class="right-findbox">
        <h3>Categorías</h3>
        <span>+</span>
        <div class="clr"></div>
        <ul>
          <li><a href="http://www.volumen4motor.com/category/eventos/">Eventos</a></li>
          <li><a href="http://www.volumen4motor.com/category/noticias/">Noticias</a></li>
          <li><a href="http://www.volumen4motor.com/category/patrocinios/">Patrocinios</a></li>
          <li><a href="http://www.volumen4motor.com/category/nuevas-competiciones/">Nuevas competiciones</a></li>
          <li><a href="http://www.volumen4motor.com/category/acuerdos/">Acuerdos</a></li>
        </ul>
        <div class="catalogo-devider"><img src="<?php echo TEMPLATEURI;?>/images/blog-devider-right.jpg" alt="blog" /></div>
        <div class="blog-inpitop-txt">Buscar...</div>
        	<form method="get" id="searchform" action="http://www.volumen4motor.com/">
        		<input type="text" onfocus="if(this.value=='texto a encontrar') this.value='';" onblur="if(this.value=='') this.value='texto a encontrar';" value="texto a encontrar" alt="texto a encontrar" class="blog-inpt-right" name="s"/>
        		<div class="blog-inpt-btn"><a href="javascript:$('#searchform').submit();"><img src="<?php echo TEMPLATEURI;?>/images/btn.jpg" alt="btn" /></a>
        	</form>
        </div>
        <div class="clr"></div>
      </div>
      <div class="sec-boxbtmbg"><img src="<?php echo TEMPLATEURI;?>/images/corner-rightbtm.jpg" alt="btm" /></div>
<div class="right-manu-box">
	<div class="right-manu">
		<ul>
			<li><a href="#tab1" class="cn_pesta active"><span>&Uacute;ltimas noticias</span></a></li>
			<li><a href="#tab2" class="cn_pesta"><span>Patrocinios</span></a></li>
		</ul>
		<div class="clr"></div>
	</div>
	<div class="tab_container">
			<div id="tab1" class="tab_content">
				<?php
				        $args= array(
				            'post_type' => 'post',
				        	'cat' => 1,
				            'posts_per_page' =>3
				            );
				            query_posts( $args);
				            
				            while ( have_posts() ) : the_post();?>
				            
				            	<div class="sec-boximg021">
				            		<?php if ( has_post_thumbnail() ) {
										the_post_thumbnail('sidebar_thumb');
									}?>
				            	</div>
				            	<div class="box-imgtext01">
				            		<p class="sl_info"><?php the_date('d M');?></li> | <?php comments_popup_link(__('Sin comentarios', ''), __('1 Comentario', ''), __('% Comentarios', ''));?></p>
				            		<div class="clr"></div>
				            		<a href="<?php the_permalink(); ?>"><?php echo limit_words(get_the_title(), '3')?>...</a>
				            		<p><?php echo limit_words(get_the_excerpt(), '8');?>...</p>
				            	</div>
				            	<div class="clr"></div>
				            	<div class="devider"><img src="<?php echo TEMPLATEURI;?>/images/devider.jpg" alt="dev" /></div>
				           
				       <?php
				            endwhile;
				            wp_reset_query();
			?>
			</div>
			<div id="tab2" class="tab_content hide">
				<?php
				        $args= array(
				            'post_type' => 'post',
				        	'cat' => 5,
				            'posts_per_page' =>3
				            );
				            query_posts( $args);
				            
				            while ( have_posts() ) : the_post();?>
				            
				            	<div class="sec-boximg021">
				            		<?php if ( has_post_thumbnail() ) {
										the_post_thumbnail('sidebar_thumb');
									}?>

				            	</div>
				            	<div class="box-imgtext01">
				            		<p class="sl_info"><?php the_date('d M');?></li> | <?php comments_popup_link(__('Sin comentarios', ''), __('1 Comentario', ''), __('% Comentarios', ''));?></p>
				            		<div class="clr"></div>
				            		<a href="<?php the_permalink(); ?>"><?php echo limit_words(get_the_title(), '3')?>...</a>
				            		<p><?php echo limit_words(get_the_excerpt(), '8');?>...</p>
				            	</div>
				            	<div class="clr"></div>
				            	<div class="devider"><img src="<?php echo TEMPLATEURI;?>/images/devider.jpg" alt="dev" /></div>
				           
				       <?php
				            endwhile;
				            wp_reset_query();
			?>
			</div>
	</div>
</div>
<div class="sec-boxbtmbg"><img src="<?php echo TEMPLATEURI;?>/images/sec-box-btmbg.jpg" alt="btm" /></div>
<div class="suscribe"><h3>Suscríbete al boletín</h3>
<p>Suscríbete al boletin de noticias y novedades, facilitando tu e-mail</p></div>
<div class="right-email-box">
	<div class="email-link"><?php echo do_shortcode('[contact-form-7 id="213" title="newsletter"]'); ?></div>
	<div class="clr"></div>
</div>
<div class="email-boxbtmbg"><img src="<?php echo TEMPLATEURI;?>/images/emai-btmcorner.jpg" alt="corn" /></div>
<div class="clr"></div>
<div class="map-point"><h3>D&oacute;nde estamos</h3>
<div class="map-point-text01"><a target="_blank" href="http://maps.google.es/maps?q=poligono+industial+talluntxe+ii+c%2f+d+n%c2%ba+35,+noain+(navarra)&hl=es&ie=utf8&sll=42.769765,-1.630777&sspn=0.015453,0.030427&hnear=calle+d,+35,+31110+no%c3%a1in,+navarra,+comunidad+foral+de+navarra&t=m&z=17">poligono industial talluntxe ii c/ d nº 35</a><br />
31110, noain (navarra)<br /><a href="mailto:info@volumen4motor.com">info@volumen4motor.com</a><br /><strong>984 21 40 94</strong></div>
<div class="map-point-img"><a target="_blank"  href="http://maps.google.es/maps?q=poligono+industial+talluntxe+ii+c%2f+d+n%c2%ba+35,+noain+(navarra)&hl=es&ie=utf8&sll=42.769765,-1.630777&sspn=0.015453,0.030427&hnear=calle+d,+35,+31110+no%c3%a1in,+navarra,+comunidad+foral+de+navarra&t=m&z=17"><img src="<?php echo TEMPLATEURI;?>/images/map-point.jpg" alt="map" /></a></div><div class="clr"></div></div>
</div>