<?php 
	global $price,$anno,$kilometraje,$combustible,$potencia,$tipoCambio,$color,$garantia,$descripcion,$inspeccion,$cilindrada,$marchas,$numCilindros,$asientos;
?>
<script type="text/javascript">	
	
	$(document).ready(function(){
		
		$('.right-email-box input[type=text]').val('mi e-mail');
		$('.right-email-box input[type=text]').focus(function(){
			$(this).val('');
		});
	});
	
</script>

<div class="body-right">
      <div class="right-findbox">
        <h3>Detalles</h3>
        <span>+</span>
        <div class="clr"></div>
        <table width="100" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left" valign="top"><div class="tab-product-left">Año</div></td>
            <td align="right" valign="top"><div class="tab-product-right">&nbsp;<?php echo $anno; ?></div></td>
          </tr>
          <tr>
            <td align="left" valign="top"><div class="tab-product-left">Kilometraje</div></td>
            <td align="right" valign="top"><div class="tab-product-right">&nbsp;<?php echo $kilometraje; ?></div></td>
          </tr>
          <tr>
            <td align="left" valign="top"><div class="tab-product-left">Combustible</div></td>
            <td align="right" valign="top"><div class="tab-product-right">&nbsp;<?php echo $combustible; ?></div></td>
          </tr>
          <tr>
            <td align="left" valign="top"><div class="tab-product-left">Categoria de vehiculo</div></td>
            <td align="right" valign="top"><div class="tab-product-right">&nbsp;<?php echo $color; ?></div></td>
          </tr>
          <tr>
            <td align="left" valign="top"><div class="tab-product-left">Tipo de cambio</div></td>
            <td align="right" valign="top"><div class="tab-product-right">&nbsp;<?php echo $tipoCambio; ?></div></td>
          </tr>
          <tr>
            <td align="left" valign="top"><div class="tab-product-left">Nº de cilindros</div></td>
            <td align="right" valign="top"><div class="tab-product-right">&nbsp;<?php echo $numCilindros; ?></div></td>
          </tr>
          <tr>
            <td align="left" valign="top"><div class="tab-product-left">Marchas</div></td>
            <td align="right" valign="top"><div class="tab-product-right">&nbsp;<?php echo $marchas; ?></div></td>
          </tr>
          <!--tr>
            <td align="left" valign="top"><div class="tab-product-left">Puertas</div></td>
            <td align="right" valign="top"><div class="tab-product-right">&nbsp;<?php echo $anno; ?></div></td>
          </tr-->
          <tr>
            <td align="left" valign="top"><div class="tab-product-left">Asientos</div></td>
            <td align="right" valign="top"><div class="tab-product-right">&nbsp;<?php echo $asientos; ?></div></td>
          </tr>
          <tr>
            <td align="left" valign="top"><div class="tab-product-left">Cilindrada (cc)</div></td>
            <td align="right" valign="top"><div class="tab-product-right">&nbsp;<?php echo $cilindrada; ?></div></td>
          </tr>
          <!--tr>
            <td align="left" valign="top"><div class="tab-product-left">Especial</div></td>
            <td align="right" valign="top"><div class="tab-product-right">IVA deducible</div></td>
          </tr-->
          <tr>
            <td align="left" valign="top"><div class="tab-product-left">Potencia (kw/cv)</div></td>
            <td align="right" valign="top"><div class="tab-product-right">&nbsp;<?php echo $potencia; ?></div></td>
          </tr>
          <!--tr>
            <td align="left" valign="top"><div class="tab-product-left">Nº de refencia</div></td>
            <td align="right" valign="top"><div class="tab-product-right">SKU - 155076013</div></td>
          </tr-->
          <tr>
            <td align="left" valign="top"><div class="tab-price-left02">Precio</div></td>
            <td align="right" valign="top"><div class="tab-price-right02">&nbsp;<?php echo $price; ?></div></td>
          </tr>
        </table>
      </div>
      <div class="sec-boxbtmbg"><img src="<?php echo TEMPLATEURI;?>/images/corner-rightbtm.jpg" alt="btm" /></div>
      <div class="suscribe">
        <h3>Suscríbete al boletín</h3>
        <p>Suscríbete al boletin de noticias y novedades, facilitando tu e-mail</p>
      </div>
     <div class="right-email-box">
			<div class="email-link"><?php echo do_shortcode('[contact-form-7 id="213" title="newsletter"]'); ?></div>
			<div class="clr"></div>
		</div>
		<div class="email-boxbtmbg"><img src="<?php echo TEMPLATEURI;?>/images/emai-btmcorner.jpg" alt="corn" /></div>
		<div class="clr"></div>
      <div class="map-point">
        <h3>Dónde estamos</h3>
        <div class="map-point-text01"><a target="_blank" href="http://maps.google.es/maps?q=Poligono+industial+Talluntxe+II+C%2F+D+n%C2%BA+35,+Noain+(Navarra)&hl=es&ie=UTF8&sll=42.769765,-1.630777&sspn=0.015453,0.030427&hnear=Calle+D,+35,+31110+No%C3%A1in,+Navarra,+Comunidad+Foral+de+Navarra&t=m&z=17">Poligono industial Talluntxe II C/ D nº 35</a><br />
31110, Noain (Navarra)<br /><a href="mailto:info@volumen4motor.com">info@volumen4motor.com</a><br /><strong>948 21 40 94</strong></div>
<div class="map-point-img"><a target="_blank" href="http://maps.google.es/maps?q=Poligono+industial+Talluntxe+II+C%2F+D+n%C2%BA+35,+Noain+(Navarra)&hl=es&ie=UTF8&sll=42.769765,-1.630777&sspn=0.015453,0.030427&hnear=Calle+D,+35,+31110+No%C3%A1in,+Navarra,+Comunidad+Foral+de+Navarra&t=m&z=17"><img src="<?php echo TEMPLATEURI;?>/images/map-point.jpg" alt="map" /></a></div><div class="clr"></div></div>
</div>
        <div class="clr"></div>
    
    