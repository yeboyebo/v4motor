<?php 
	/*
	
	Template Name: AutoScout detalle
	
	*/
?>
<?php 
	require_once TEMPLATEPATH.'/com/autoscout.class.php';
	
	$_SESSION['pag']=$_GET['pag'];
	$_SESSION['filterBy']=$_GET['filterBy'];
	$_SESSION['objPag']=$_GET['objPag'];
	
	$idObj=$_GET['id'];
	
	if($idObj!=''){
		$autoscout= new Autoscout();
		$xpath =$autoscout->getProduct($idObj);
		$nodeTmp=$xpath->query("//h1[@class='f_cl_flow1']");
		$titulo=$nodeTmp->item(0)->nodeValue;
		$titulo=cortaTxt($titulo,40);
		
		$aNodos=$xpath->evaluate("//table[@class='table col-2']/tr/td[2]");
		/*$bloque1=$aNodos->item(1)->textContent;
		$descripcion=$bloque1;*/
		//$descripcion=new DOMText($bloque1);
		/*/$bloque1=$aNodos->item(0)->childNodes->item(0)->childNodes;*/
		$descripcion=$aNodos->length;

	}else{
		$titulo='Veh&iacute;culo no encontrado';
		$descripcion=$titulo;
	}
	
	function cortaTxt($txt, $num){
		return substr($txt,0,strrpos(substr($txt,0,$num)," ")).'...';
	}
	

?>




<?php get_header('detalle');?>

<script type="text/javascript">	
	$(function() {
		autoscout.init();
		autoscout.getObjGallery();
		$('#migas a').each(function(index,value) {
			if($(this).attr('href')=='http://www.volumen4motor.com/resultado-de-busqueda.html'){
				$(this).attr('href','javascript:history.back();');
			}
		});
	});
</script>
<div class="body-contener">
	<div class="banner-lyrbg"><h3><?php echo $titulo;?></h3></div>
	<p id="migas"><?php new simple_breadcrumb();?></p>
	<div class="body-left">
		<div class="camas-corner">
			<div class="detail-img cn_carrousel"><!--img src="<?php echo TEMPLATEURI;?>/images/pro-banner.jpg" alt="ban" /-->
				<ul id="gallery" style="min-height:385px">
					<div class="cn_loading">&nbsp;</div>
			   </ul>
			</div>
			<div class="detail-like"><iframe src="//www.facebook.com/plugins/like.php?href&amp;send=false&amp;layout=standard&amp;width=450&amp;show_faces=true&amp;action=like&amp;colorscheme=light&amp;font&amp;height=25&amp;appId=239025399500974" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:25px;" allowTransparency="true"></iframe></div>
			<div class="clr"></div>
			
			<?php 
			if($idObj!=''){	
				global $price,$anno,$kilometraje,$combustible,$potencia,$tipoCambio,$color,$garantia,$descripcion,$inspeccion,$cilindrada,$marchas,$numCilindros,$asientos;
			
				$price='';
				$anno='';
				$kilometraje='';
				$combustible='';
				$potencia='';
				$tipoCambio='';
				$color='';
				$garantia='';
				$descripcion='';
				$inspeccion='';
				$cilindrada='';
				$marchas='';
				$numCilindros='';
				$asientos='';
				$dataContainer=0;
				foreach ($aNodos as $node) {
					$nodesTmp=$node->childNodes;
					foreach ($nodesTmp as $node2) {
						if($node2->nodeName=='dl'){
							$index=0;
							$nodesTmp2=$node2->childNodes;
							foreach ($nodesTmp2 as $node3) {
								//echo '<p>'.$node3->nodeName.'</p>';
								if($node3->nodeName=='dd'){
									
									switch ($index) {
										case 7:
											$price=$node3->nodeValue;
											break;
										case 2:
											$anno=$node3->nodeValue;
											break;
										case 3:
											$kilometraje=$node3->nodeValue;
											break;
										case 4:
											$combustible=$node3->nodeValue;
											break;
										case 5:
											$potencia=$node3->nodeValue;
											break;
										case 6:
											$tipoCambio=$node3->nodeValue;
											break;
										case 1:
											$color=$node3->nodeValue;
											break;
										case 3:
											$garantia=$node3->nodeValue;
											break;
										default:
											
											break;
									}	
									++$index;
								}
							}
						}else if($node2->nodeName=='div' && $node2->getAttribute("class")=='dataContainer'){
							if($dataContainer==1){
								$descripcion=$node2->nodeValue;
							}else if($dataContainer==2){
								
								$nodesTmp2=$node2->childNodes;
								foreach ($nodesTmp2 as $node3) {
									
									if($node3->nodeName=='dl'){
										$nodesTmp3=$node3->childNodes;
										
										$index=0;
										foreach ($nodesTmp3 as $node4) {
											//echo '<p>'.$node4->nodeName.'</p>';
											if($node4->nodeName=='dd'){
												
												switch ($index) {
													case 0:
														$inspeccion=$node4->nodeValue;
														break;
													case 1:
														$cilindrada=$node4->nodeValue;
														break;
													case 2:
														$marchas=$node4->nodeValue;
														break;
													case 3:
														$numCilindros=$node4->nodeValue;
														break;
													case 4:
														$asientos=$node4->nodeValue;
														break;
													default:
														
														break;
												}
												//echo 'nodo'.$index.':'.$node4->nodeValue;	
												++$index;
											}
										}
									}
								}
							}
							++$dataContainer;
								
						}
					}
				}
				
				
				//echo '<p>Precio'.$index.':'.$price.', año:'.$anno.', kilometraje:'.$kilometraje.', potencia:'.$potencia.', tipo de cambio:'.$tipoCambio.', color:'.$color.', garantia:'.$garantia.'</p>';
				//echo '<p>descripcion:'.$descripcion.'</p>';
				//echo '<p>inspeccion:'.$inspeccion.', marchas:'.$marchas.', num cilindros:'.$numCilindros.', asientos:'.$asientos.'</p>';
				
			}
			echo '<p>'.$descripcion.'</p>';
			?>
			
			
			<div class="truck-text">Comp&aacute;rtelo con tus amigos:</div>
			<div class="truck-img st_facebook_custom" displayText='Facebook'><img src="<?php echo TEMPLATEURI;?>/images/f-truck.jpg" class="sinBorde" alt="" /></div>
			<div class="truck-img st_twitter_custom" displayText='Tweet'><img src="<?php echo TEMPLATEURI;?>/images/t-truck.jpg" class="sinBorde" alt="" /></div>
			<div class="truck-img st_yahoo_custom" displayText='Yahoo'><img src="<?php echo TEMPLATEURI;?>/images/y-truck.jpg" class="sinBorde" alt="" /></div>
			<div class="truck-img st_google_custom" displayText='Google'><img src="<?php echo TEMPLATEURI;?>/images/buz-truck.jpg" class="sinBorde" alt="" /></div>
			<div class="truck-img st_sharethis_custom" displayText='ShareThis'><img src="<?php echo TEMPLATEURI;?>/images/j-truck.jpg" class="sinBorde" alt="" /></div>
			<div class="truck-img st_email_custom" Email><img src="<?php echo TEMPLATEURI;?>/images/m-truck.jpg" class="sinBorde" alt="" /></div>
			<div class="clr"></div>
        <div class="clr"></div>
       </div>
	</div>
	
	

<?php get_sidebar('detalle'); ?>

<div class="clr"></div>
</div>
<form id="formProduct">
	<input type="hidden" name="templateUri" id="templateUri" value="<?php echo TEMPLATEURI;?>"/>
	<input type="hidden" name="action" value="getObjGallery" />
	<input type="hidden" name="idProducto" value="<?php echo $_GET['id'];?>" />
</form>
        
<?php get_footer(); ?>