<?php 
	/*
	
	Template Name: AutoScout Search Template
	
	*/
?>

<?php 
	get_header();
	
	if (isset($_SESSION["pag"])){
		$pag=$_SESSION['pag'];
		$filterBy=$_SESSION['filterBy'];
		$objPag=$_SESSION['objPag'];
		session_unset();
		session_destroy();
	}
	
	$pag=(isset($pag))?$pag:1;
	$filterBy=(isset($filterBy))?$filterBy:'price';
	$objPag=(isset($objPag))?$objPag:9;

?>

<script type="text/javascript">	
	$(function() {
		autoscout.init();
		autoscout.changePag(<?php echo $pag;?>);
		$("#filterByTmp").change(function(){ $("#filterBy").val($("#filterByTmp").val()); autoscout.changePag()});
		$("#objPagTmp").change(function(){ $("#objPag").val($("#objPagTmp").val()); autoscout.changePag()});
		
		
		var txtSearch='para ';
		var vTmp='<?php echo $_POST['se_make'];?>';
		if(vTmp!='' && vTmp!=0){
			txtTmp='marca: '+$('select[name="se_make"] option[value="'+vTmp+'"]').attr('label');
			txtSearch+=(txtSearch=='para ')?txtTmp:', '+txtTmp;
		}
		vTmp='<?php echo $_POST['se_ar_ca'];?>';
		if(vTmp!='' && vTmp!=0){
			txtTmp='categor&iacute;a: '+$('select[name="se_ar_ca"] option[value="'+vTmp+'"]').attr('label');
			txtSearch+=(txtSearch=='para ')?txtTmp:', '+txtTmp;
		}
		vTmp='<?php echo $_POST['se_pr_f'];?>';
		if(vTmp!='' && vTmp!=0){
			txtTmp='precio desde: '+$('select[name="se_pr_f"] option[value="'+vTmp+'"]').attr('label');
			txtSearch+=(txtSearch=='para ')?txtTmp:', '+txtTmp;
		}
		vTmp='<?php echo $_POST['se_pr_t'];?>';
		if(vTmp!='' && vTmp!=0){
			txtTmp='precio hasta: '+$('select[name="se_pr_t"] option[value="'+vTmp+'"]').attr('label');
			txtSearch+=(txtSearch=='para ')?txtTmp:', '+txtTmp;
		}
	
		if(txtSearch!='para '){
			$('.txtSearch').html(txtSearch);
		}
		
	});
</script>
<div class="body-contener">
	<div class="banner-lyrbg"><h3><? echo the_title();?></h3></div>
	<p><?php new simple_breadcrumb();?> <span class="txtSearch" style="font-weight: bold;"></span></p>
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
	<input type="hidden" name="action" value="getListProduct" />
	<input type="hidden" name="se[make]" value="<?php echo $_POST['se_make'];?>" />
	<input type="hidden" name="se[ar_ca]" value="<?php echo $_POST['se_ar_ca'];?>" />
	<input type="hidden" name="se[pr_f]" value="<?php echo $_POST['se_pr_f'];?>" />
	<input type="hidden" name="se[pr_t]" value="<?php echo $_POST['se_pr_t'];?>" />
	<input type="hidden" name="se[bo_ty]" value="<?php echo $_POST['se_bo_ty'];?>" />
	<input type="hidden" name="se[km_f]" value="<?php echo $_POST['se_km_f'];?>" />
	<input type="hidden" name="se[km_t]" value="<?php echo $_POST['se_km_t'];?>" />
	<input type="hidden" name="se[po_f]" value="<?php echo $_POST['se_po_f'];?>" />
	<input type="hidden" name="se[po_t]" value="<?php echo $_POST['se_po_t'];?>" />
	<input type="hidden" name="se[ag_f]" value="<?php echo $_POST['se_ag_f'];?>" />
	<input type="hidden" name="se[ag_t]" value="<?php echo $_POST['se_ag_t'];?>" />
	<input type="hidden" name="soB" id="filterBy" value="<?php echo $filterBy;?>" />
	<input type="hidden" name="soL" id="objPag" value="<?php echo $objPag;?>" />
	<input type="hidden" name="pag" id="pag" value="<?php echo $pag;?>" />
</form>
        
<?php get_footer(); ?>