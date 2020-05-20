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
	<form id="form_searcherAutoscout" action="http://www.volumen4motor.com/resultado-de-busqueda.html" method="post">
	<input type="hidden" name="action" value="searcherAutoscout" />
	<h3>Busqueda</h3><a href="javascript:searcherAutoscout.changeType();"><span class="searchType">+</span></a>
	<div class="clr"></div>
	<div class="find-text">Marca</div>
	<div class="find-text-right">Categor&iacute;a</div>
	<div class="clr"></div>
	<select name="se_make" class="find-inpt">
		<option label="Seleccione" value="0">Seleccione</option>
		<option label="Chrysler" value="20">Chrysler</option>
		<option label="Citroen" value="21">Citroen</option>
		<option label="Fiat" value="28">Fiat</option>
		<option label="Ford" value="29">Ford</option>
		<option label="Iveco" value="14882">Iveco</option>
		<option label="Lancia" value="42">Lancia</option>
		<option label="Mercedes-Benz" value="47">Mercedes-Benz</option>
		<option label="Nissan" value="52">Nissan</option>
		<option label="Opel" value="54">Opel</option>
		<option label="Peugeot" value="55">Peugeot</option>
		<option label="Renault" value="60">Renault</option>
		<option label="Seat" value="64">Seat</option>
		<option label="Volkswagen" value="74">Volkswagen</option>
	</select>
	<select name="se_ar_ca" class="find-inpt2-rt">
		<option label="Todos ..." value="0">Todos ...</option>
		<option label="Clásico" value="79">Clásico</option>
		<option label="Demostración" value="68">Demostración</option>
		<option label="KM0" value="83">KM0</option>
		<option label="Nuevo" value="78">Nuevo</option>
		<option label="Ocasión" value="85">Ocasión</option>
		<option label="Seminuevo" value="74">Seminuevo</option>
	</select>
	<div class="clr"></div>
	<div class="find-textbtm02">Precio</div>
	<div class="inpt-btmtextright">
		<select name="se_pr_f" class="find-inpt">
			<option label="Desde ..." value="0">Desde ...</option>
			<option label="500" value="500">500</option>
			<option label="1.000" value="1000">1.000</option>
			<option label="1.500" value="1500">1.500</option>
			<option label="2.000" value="2000">2.000</option>
			<option label="2.500" value="2500">2.500</option>
			<option label="3.000" value="3000">3.000</option>
			<option label="4.000" value="4000">4.000</option>
			<option label="5.000" value="5000">5.000</option>
			<option label="6.000" value="6000">6.000</option>
			<option label="7.000" value="7000">7.000</option>
			<option label="8.000" value="8000">8.000</option>
			<option label="9.000" value="9000">9.000</option>
			<option label="10.000" value="10000">10.000</option>
			<option label="12.500" value="12500">12.500</option>
			<option label="15.000" value="15000">15.000</option>
			<option label="17.500" value="17500">17.500</option>
			<option label="20.000" value="20000">20.000</option>
			<option label="30.000" value="30000">30.000</option>
			<option label="40.000" value="40000">40.000</option>
			<option label="50.000" value="50000">50.000</option>
			<option label="75.000" value="75000">75.000</option>
			<option label="100.000" value="100000">100.000</option>
		</select>
	</div>
	<div class="listado-text-inpt03">
		<select name="se_pr_t" class="find-inpt">
			<option label="hasta ..." value="0">hasta ...</option>
			<option label="500" value="500">500</option>
			<option label="1.000" value="1000">1.000</option>
			<option label="1.500" value="1500">1.500</option>
			<option label="2.000" value="2000">2.000</option>
			<option label="2.500" value="2500">2.500</option>
			<option label="3.000" value="3000">3.000</option>
			<option label="4.000" value="4000">4.000</option>
			<option label="5.000" value="5000">5.000</option>
			<option label="6.000" value="6000">6.000</option>
			<option label="7.000" value="7000">7.000</option>
			<option label="8.000" value="8000">8.000</option>
			<option label="9.000" value="9000">9.000</option>
			<option label="10.000" value="10000">10.000</option>
			<option label="12.500" value="12500">12.500</option>
			<option label="15.000" value="15000">15.000</option>
			<option label="17.500" value="17500">17.500</option>
			<option label="20.000" value="20000">20.000</option>
			<option label="30.000" value="30000">30.000</option>
			<option label="40.000" value="40000">40.000</option>
			<option label="50.000" value="50000">50.000</option>
			<option label="75.000" value="75000">75.000</option>
			<option label="100.000" value="100000">100.000</option>
		</select>
	</div>
	<div class="clr"></div>
	<div class="search_avance hide">
		<div class="find-textbtm02">Tipo de carrocer&iacute;a</div>
		<div class="inpt-btmtextright">
			<select name="se_bo_ty" class="find-inpt">
				<option label="Todos ..." value="0">Todos ...</option>
				<option label="2/3 puertas" value="1">2/3 puertas</option>
				<option label="4/5-puertas" value="6">4/5-puertas</option>
				<option label="Coupé" value="3">Coupé</option>
				<option label="Descapotable" value="2">Descapotable</option>
				<option label="Familiar" value="5">Familiar</option>
				<option label="Furgoneta" value="12">Furgoneta</option>
				<option label="Otros" value="7">Otros</option>
				<option label="Todoterreno" value="4">Todoterreno</option>
				<option label="Transporter" value="13">Transporter</option>
			</select>
		</div>
		<div class="clr"></div>
		<div class="find-textbtm02">Kilometraje</div>
		<div class="inpt-btmtextright">
			<select name="se_km_f" class="find-inpt">
				<option label="Desde ..." value="0">Desde ...</option>
				<option label="5.000" value="5000">5.000</option>
				<option label="10.000" value="10000">10.000</option>
				<option label="20.000" value="20000">20.000</option>
				<option label="30.000" value="30000">30.000</option>
				<option label="40.000" value="40000">40.000</option>
				<option label="50.000" value="50000">50.000</option>
				<option label="60.000" value="60000">60.000</option>
				<option label="70.000" value="70000">70.000</option>
				<option label="80.000" value="80000">80.000</option>
				<option label="90.000" value="90000">90.000</option>
				<option label="100.000" value="100000">100.000</option>
				<option label="125.000" value="125000">125.000</option>
				<option label="150.000" value="150000">150.000</option>
				<option label="175.000" value="175000">175.000</option>
				<option label="200.000" value="200000">200.000</option>
					
			</select>
		</div>
		<div class="listado-text-inpt03">
			<select name="se_km_t" class="find-inpt">
				<option label="hasta ..." value="0">hasta ...</option>
				<option label="5.000" value="5000">5.000</option>
				<option label="10.000" value="10000">10.000</option>
				<option label="20.000" value="20000">20.000</option>
				<option label="30.000" value="30000">30.000</option>
				<option label="40.000" value="40000">40.000</option>
				<option label="50.000" value="50000">50.000</option>
				<option label="60.000" value="60000">60.000</option>
				<option label="70.000" value="70000">70.000</option>
				<option label="80.000" value="80000">80.000</option>
				<option label="90.000" value="90000">90.000</option>
				<option label="100.000" value="100000">100.000</option>
				<option label="125.000" value="125000">125.000</option>
				<option label="150.000" value="150000">150.000</option>
				<option label="175.000" value="175000">175.000</option>
				<option label="200.000" value="200000">200.000</option>
			</select>
		</div>
		<div class="clr"></div>
		<div class="find-textbtm02">Potencia</div>
		<div class="inpt-btmtextright">
			<select name="se_po_f" class="find-inpt">
				<option label="Desde..." value="0">Desde...</option>
				<option label="44 (60)" value="44">44 (60)</option>
				<option label="55 (75)" value="55">55 (75)</option>
				<option label="66 (90)" value="66">66 (90)</option>
				<option label="81 (110)" value="81">81 (110)</option>
				<option label="92 (125)" value="92">92 (125)</option>
				<option label="110 (150)" value="110">110 (150)</option>
				<option label="147 (200)" value="147">147 (200)</option>
				<option label="184 (250)" value="184">184 (250)</option>
				<option label="220 (299)" value="220">220 (299)</option>
				<option label="257 (350)" value="257">257 (350)</option>
			</select>
		</div>
		<div class="listado-text-inpt03">
			<select name="se_po_t" class="find-inpt">
				<option label="hasta..." value="0">hasta...</option>
				<option label="44 (60)" value="44">44 (60)</option>
				<option label="55 (75)" value="55">55 (75)</option>
				<option label="66 (90)" value="66">66 (90)</option>
				<option label="81 (110)" value="81">81 (110)</option>
				<option label="92 (125)" value="92">92 (125)</option>
				<option label="110 (150)" value="110">110 (150)</option>
				<option label="147 (200)" value="147">147 (200)</option>
				<option label="184 (250)" value="184">184 (250)</option>
				<option label="220 (299)" value="220">220 (299)</option>
				<option label="257 (350)" value="257">257 (350)</option>
			</select>
		</div>
		<div class="clr"></div>
		<div class="find-textbtm02">A&ntilde;o</div>
		<div class="inpt-btmtextright">
			<select name="se_ag_f" class="find-inpt">
				<option label="Desde..." value="0">Desde...</option>
				<option label="2012" value="2012">2012</option>
				<option label="2011" value="2011">2011</option>
				<option label="2010" value="2010">2010</option>
				<option label="2009" value="2009">2009</option>
				<option label="2008" value="2008">2008</option>
				<option label="2007" value="2007">2007</option>
				<option label="2006" value="2006">2006</option>
				<option label="2005" value="2005">2005</option>
				<option label="2004" value="2004">2004</option>
				<option label="2003" value="2003">2003</option>
				<option label="2002" value="2002">2002</option>
				<option label="2001" value="2001">2001</option>
				<option label="2000" value="2000">2000</option>
				<option label="1999" value="1999">1999</option>
				<option label="1998" value="1998">1998</option>
				<option label="1997" value="1997">1997</option>
				<option label="1996" value="1996">1996</option>
				<option label="1995" value="1995">1995</option>
				<option label="1994" value="1994">1994</option>
				<option label="1993" value="1993">1993</option>
				<option label="1992" value="1992">1992</option>
				<option label="1991" value="1991">1991</option>
				<option label="1990" value="1990">1990</option>
				<option label="1985" value="1985">1985</option>
				<option label="1980" value="1980">1980</option>
				<option label="1975" value="1975">1975</option>
				<option label="1970" value="1970">1970</option>
				<option label="1965" value="1965">1965</option>
				<option label="1960" value="1960">1960</option>
				<option label="1950" value="1950">1950</option>
				<option label="1940" value="1940">1940</option>
				<option label="1930" value="1930">1930</option>
				<option label="1920" value="1920">1920</option>
				<option label="1910" value="1910">1910</option>
			</select>
		</div>
		<div class="listado-text-inpt03">
			<select name="se_ag_t" class="find-inpt">
				<option label="hasta..." value="0">hasta...</option>
				<option label="2012" value="2012">2012</option>
				<option label="2011" value="2011">2011</option>
				<option label="2010" value="2010">2010</option>
				<option label="2009" value="2009">2009</option>
				<option label="2008" value="2008">2008</option>
				<option label="2007" value="2007">2007</option>
				<option label="2006" value="2006">2006</option>
				<option label="2005" value="2005">2005</option>
				<option label="2004" value="2004">2004</option>
				<option label="2003" value="2003">2003</option>
				<option label="2002" value="2002">2002</option>
				<option label="2001" value="2001">2001</option>
				<option label="2000" value="2000">2000</option>
				<option label="1999" value="1999">1999</option>
				<option label="1998" value="1998">1998</option>
				<option label="1997" value="1997">1997</option>
				<option label="1996" value="1996">1996</option>
				<option label="1995" value="1995">1995</option>
				<option label="1994" value="1994">1994</option>
				<option label="1993" value="1993">1993</option>
				<option label="1992" value="1992">1992</option>
				<option label="1991" value="1991">1991</option>
				<option label="1990" value="1990">1990</option>
				<option label="1985" value="1985">1985</option>
				<option label="1980" value="1980">1980</option>
				<option label="1975" value="1975">1975</option>
				<option label="1970" value="1970">1970</option>
				<option label="1965" value="1965">1965</option>
				<option label="1960" value="1960">1960</option>
				<option label="1950" value="1950">1950</option>
				<option label="1940" value="1940">1940</option>
				<option label="1930" value="1930">1930</option>
				<option label="1920" value="1920">1920</option>
				<option label="1910" value="1910">1910</option>
			</select>
		</div>
		<div class="clr"></div>			
	</div>
	<div class="clr"></div>
	<div class="etxt-btn"><a href="javascript:searcherAutoscout.search();"><img src="<?php echo TEMPLATEURI;?>/images/btn.jpg" alt="btn" /></a></div>
	<div class="clr"></div>
	</form>
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
<div class="map-point-text01"><a target="_blank" href="https://maps.google.es/maps?q=volumen4motor+Noain,+Navarra,+espa%C3%B1a&hl=es&ie=UTF8&ll=42.768128,-1.63092&spn=0.001723,0.004128&sll=42.770439,-1.63059&sspn=0.004481,0.009645&hq=volumen4motor&hnear=No%C3%A1in,+Navarra,+Comunidad+Foral+de+Navarra&t=m&z=19&layer=c&cbll=42.768012,-1.630941&panoid=PuDKVYOo5syb7Mi9jO-VYA&cbp=12,236.59,,0,-6.22">Polígono Industrial Talluntxe II c/ D nº35</a><br />
31110, Noain (Navarra)<br /><a href="mailto:info@volumen4motor.com">info@volumen4motor.com</a><br /><strong>948 21 40 94</strong></div>
<div class="map-point-img"><a target="_blank"  href="https://maps.google.es/maps?q=volumen4motor+Noain,+Navarra,+espa%C3%B1a&hl=es&ie=UTF8&ll=42.768128,-1.63092&spn=0.001723,0.004128&sll=42.770439,-1.63059&sspn=0.004481,0.009645&hq=volumen4motor&hnear=No%C3%A1in,+Navarra,+Comunidad+Foral+de+Navarra&t=m&z=19&layer=c&cbll=42.768012,-1.630941&panoid=PuDKVYOo5syb7Mi9jO-VYA&cbp=12,236.59,,0,-6.22"><img src="<?php echo TEMPLATEURI;?>/images/map-point.jpg" alt="map" /></a></div><div class="clr"></div></div>
</div>