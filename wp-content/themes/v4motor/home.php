<?php get_header();?>

<script type="text/javascript">	
	$(function() {
		autoscout.init();
		autoscout.getHomeProduct();
	});
</script>

<div class="body-contener cn_home">
<div class="banner-lyrbg"><h3>Destacamos... </h3></div>
<p>Estoy en... <strong> Home</strong></p> 
<div class="body-left">
<div class="banner cn_carrousel"><!--img src="<?php echo TEMPLATEURI;?>/images/banner.jpg" alt="ban" /-->
	
	<ul id="gallery">
		<div class="cn_loading">&nbsp;</div>
   </ul>
	
	
</div>
<div class="banner-lyrbgbtm2"><h3>Nuestras ofertas </h3></div>
<div class="list-pro-box" style="min-height: 473px;">
	<!-- list ofertas /-->
	<div class="cn_loading">&nbsp;</div>
</div>
<div class="moretxt-product"><a href="http://www.volumen4motor.com/catalogo-de-vehiculos.html" class="active">Mira todo el catalogo...</a></div>
<div class="clr"></div>
</div>

<?php get_sidebar(); ?>

<div class="clr"></div>
</div>

<!--form id="formListProduct">
	<input type="hidden" name="templateUri" id="templateUri" value="<?php echo TEMPLATEURI;?>"/>
	<input type="hidden" name="action" value="getHomeProduct" />
	<input type="hidden" name="typeProduct" value="" />
	<input type="hidden" name="filterBy" id="filterBy" value="price" />
	<input type="hidden" name="objPag" id="objPag" value="7" />
	<input type="hidden" name="pag" id="pag" value="1" />
	
	
</form-->

<form id="formListProduct">
	<input type="hidden" name="templateUri" id="templateUri" value="<?php echo TEMPLATEURI;?>"/>
	<input type="hidden" name="action" value="getHomeProductTxt" />
	<input type="hidden" name="ver" value="Y0" />
	<input type="hidden" name="filterBy" id="filterBy" value="" />
	<input type="hidden" name="objPag" id="objPag" value="7" />
	<input type="hidden" name="pag" id="pag" value="1" />
</form>
        
<?php get_footer(); ?>