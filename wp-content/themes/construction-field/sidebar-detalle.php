<?php 
	global $price,$anno,$kilometraje,$combustible,$potencia,$tipoCambio,$color,$garantia,$descripcion,$inspeccion,$cilindrada,$marchas,$numCilindros,$asientos, $emisiones, $tabla;
?>
<script type="text/javascript">	
	
	$(document).ready(function(){
		
		$('.right-email-box input[type=text]').val('mi e-mail');
		$('.right-email-box input[type=text]').focus(function(){
			$(this).val('');
		});
		var finance = new Finance();
		price = "<?php echo $price?>".split("=");
			if(price[1] != undefined){
				price = price[1].replace("€","").replace(".","");
			}else{
				price = price[0].replace("€","").replace(".","");
			}
		
  		cuota = finance.AM(parseFloat(price), 8.99, 120/12, 0);
  		$("#cuota").html(cuota.toFixed(0)+" <span>€/mes</span>");
  		$("#financiacion").attr("href", "/financiacion.html?price="+price);

	});
	
</script>

<div class="body-right sidebar">
	<div class="row">
		<div class="col-md-6">
			<span><strong class="cuotaTxt">Cuota</strong> desde</span>
			<a href="#" id="financiacion">ver financiación</a>
		</div>
		<div class="col-md-6 cuota">
			<span id="cuota"></span>
		</div>
	</div>
      <div class="right-findbox">
        <h4>Detalles del vehiculo:</h4>
        <div class="clr"></div>
        <table width="100" border="0" cellspacing="0" cellpadding="0">

          <?php if(isset($tabla['Antigüedad:'])):?>
          <tr>
            <td align="left" valign="top"><div class="tab-product-left">Año</div></td>
            <td align="right" valign="top"><div class="tab-product-right">&nbsp;<?php echo $tabla['Antigüedad:']; ?></div></td>
          </tr>
           <?php endif;?>
          <?php if(isset($tabla['Kilometraje:'])):?>
          <tr>
            <td align="left" valign="top"><div class="tab-product-left">Kilometraje</div></td>
            <td align="right" valign="top"><div class="tab-product-right">&nbsp;<?php echo $tabla['Kilometraje:']; ?></div></td>
          </tr>
           <?php endif;?>
          <?php if(isset($tabla['Combustible:'])):?>
          <tr>
            <td align="left" valign="top"><div class="tab-product-left">Combustible</div></td>
            <td align="right" valign="top"><div class="tab-product-right">&nbsp;<?php echo $tabla['Combustible:']; ?></div></td>
          </tr>
           <?php endif;?>
            <?php if(isset($tabla['Consumo de combustible:'])):?>
          <tr>
            <td align="left" valign="top"><div class="tab-product-left">Consumo de combustible</div></td>
            <td align="right" valign="top"><div class="tab-product-right">&nbsp;<?php echo $tabla['Consumo de combustible:']; ?></div></td>
          </tr>
           <?php endif;?>
          <?php if(isset($tabla['Carrocería:'])):?>
          <tr>
            <td align="left" valign="top"><div class="tab-product-left">Categoria de vehiculo</div></td>
            <td align="right" valign="top"><div class="tab-product-right">&nbsp;<?php echo $tabla['Carrocería:']; ?></div></td>
          </tr>
           <?php endif;?>
          <?php if(isset($tabla['Tipo de transmisión:'])):?>
          <tr>
            <td align="left" valign="top"><div class="tab-product-left">Tipo de cambio</div></td>
            <td align="right" valign="top"><div class="tab-product-right">&nbsp;<?php echo $tabla['Tipo de transmisión:']; ?></div></td>
          </tr>
           <?php endif;?>
          <?php if(isset($tabla['Cilindros:'])):?>
          <tr>
            <td align="left" valign="top"><div class="tab-product-left">Nº de cilindros</div></td>
            <td align="right" valign="top"><div class="tab-product-right">&nbsp;<?php echo $tabla['Cilindros:']; ?></div></td>
          </tr>
          <?php endif;?>
          <?php if(isset($tabla['Velocidades:'])):?>
          <tr>
            <td align="left" valign="top"><div class="tab-product-left">Marchas</div></td>
            <td align="right" valign="top"><div class="tab-product-right">&nbsp;<?php echo $tabla['Velocidades:']; ?></div></td>
          </tr>
          <?php endif;?>
          <!--tr>
            <td align="left" valign="top"><div class="tab-product-left">Puertas</div></td>
            <td align="right" valign="top"><div class="tab-product-right">&nbsp;<?php echo $anno; ?></div></td>
          </tr-->
          <?php if(isset($tabla['Asientos:'])):?>
          <tr>
            <td align="left" valign="top"><div class="tab-product-left">Asientos</div></td>
            <td align="right" valign="top"><div class="tab-product-right">&nbsp;<?php echo $tabla['Asientos:']; ?></div></td>
          </tr>
          <?php endif;?>
          <?php if(isset($tabla['Cilindrada:'])):?>
          <tr>
            <td align="left" valign="top"><div class="tab-product-left">Cilindrada (cc)</div></td>
            <td align="right" valign="top"><div class="tab-product-right">&nbsp;<?php echo $tabla['Cilindrada:']; ?></div></td>
          </tr>
          <?php endif;?>
          <!--tr>
            <td align="left" valign="top"><div class="tab-product-left">Especial</div></td>
            <td align="right" valign="top"><div class="tab-product-right">IVA deducible</div></td>
          </tr-->
  		<?php if(isset($tabla['Potencia:'])):?>
          <tr>
            <td align="left" valign="top"><div class="tab-product-left">Potencia (kw/cv)</div></td>
            <td align="right" valign="top"><div class="tab-product-right">&nbsp;<?php echo $tabla['Potencia:']; ?></div></td>
          </tr>
        <?php endif;?>
		<?php if(isset($tabla['Emisiones de C02:'])):?>
          <tr>
            <td align="left" valign="top"><div class="tab-product-left">Emisiones de CO2 (g/km)</div></td>
            <td align="right" valign="top"><div class="tab-product-right">&nbsp;<?php echo $tabla['Emisiones de C02:']; ?></div></td>
          </tr>
        <?php endif;?>
          <!--tr>
            <td align="left" valign="top"><div class="tab-product-left">Nº de refencia</div></td>
            <td align="right" valign="top"><div class="tab-product-right">SKU - 155076013</div></td>
          </tr-->
          <?php if(isset($price)):?>
          <tr>
            <td align="left" valign="top"><div class="tab-price-left02">Precio</div></td>
            <td align="right" valign="top"><div class="tab-price-right02">&nbsp;<?php echo $price; ?></div></td>
          </tr>
      <?php endif;?>
        </table>
      </div>
      <!-- <div class="sec-boxbtmbg"><img src="<?php //echo TEMPLATEURI;?>/images/corner-rightbtm.jpg" alt="btm" /></div> -->
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
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2928.9746250326702!2d-1.6332926843495053!3d42.76774191725006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd50917bb8ba9f27%3A0xe4c054cf099c39b4!2sVolumen4Motor%C2%AE!5e0!3m2!1ses!2ses!4v1536164001010" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
        <div class="clr"></div>
    
    