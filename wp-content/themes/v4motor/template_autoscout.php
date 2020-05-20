<?php 
	/*
	
	Template Name: AutoScout Template
	
	*/
	$ver='';
	switch ($post->ID) {
		case 52:
			//Catalogo
			$ver='all';
			break;
		case 55:
			//Furgonetas
			$ver='Y2';
			break;
		case 57:
			//Monovolúmenes
			$ver='Y1';
			break;
		case 59:
			// Furgoneta Vivienda
			$ver='Y4';
			break;
		case 62:
			//Vehículo de Ocio
			$ver='Y3';
			break;
		case 64:
			// FURGON
			$ver='Y5';
			break;
		case 261:
			// CARROZADO
			$ver='Y6';
			break;
		case 266:
			// ISOTERMO
			$ver='Y7';
			break;
		case 818:
			// TURISMOS
			$ver='Y8';
			break;	
		default:
			$ver='all';		
			break;
	}
?>

<?php get_header();?>

<script type="text/javascript">	
	$(function() {
		autoscout.init();
		autoscout.changePag(1);
		$("#filterByTmp").change(function(){ $("#filterBy").val($("#filterByTmp").val()); autoscout.changePag()});
		$("#objPagTmp").change(function(){ $("#objPag").val($("#objPagTmp").val()); autoscout.changePag()});
	});
</script>
<div class="body-contener">
	<div class="banner-lyrbg"><h3><? echo the_title();?></h3></div>
	<p><?php new simple_breadcrumb();?></p>
	<div class="body-left">
		<div class="camas-corner">
			<div class="catalogo-text">Ordenar por</div>
			<select id="filterByTmp" name="filterByTmp" class="catalogo-inpt">
				<option value="price" selected="selected" >Precio</option>
				<option value="leasingfinance"  >Leasing/Financiación</option>
				<option value="brand_id"  >Marca/modelo</option>
				<option value="year"  >Antigüedad</option>
				<option value="mileage"  >Kilometraje</option>
				<option value="pubstart"  >Fecha del anuncio</option>
				<option value="kilowatt"  >Potencia</option>
			</select>
			<select id="objPagTmp" name="objPagTmp" class="catalogo-inpt-right">
				<option value="9">9</option>
				<option value="15">15</option>
				<option value="21">21</option>
			</select>
			<div class="catalogo-text-right">Ver</div>
			<div class="clr"></div>
			<div class="catalogo-devider"><img src="<?php echo TEMPLATEURI;?>/images/cata-devider.jpg" alt="" class="sinBorde" /></div>
			<div id="cn_content">
			</div>
        <div class="clr"></div>
       </div>
	</div>
	
	

<?php get_sidebar(); ?>

<div class="clr"></div>
</div>
<form id="formListProduct">
	<input type="hidden" name="templateUri" id="templateUri" value="<?php echo TEMPLATEURI;?>"/>
	<input type="hidden" name="action" value="getListProductTxt" />
	<input type="hidden" name="ver" value="<?php echo $ver;?>" />
	<input type="hidden" name="filterBy" id="filterBy" value="price" />
	<input type="hidden" name="objPag" id="objPag" value="9" />
	<input type="hidden" name="pag" id="pag" value="1" />
</form>
        
<?php get_footer(); ?>