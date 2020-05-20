<?php

require_once TEMPLATEPATH.'/com/autoscout.class.php';

$typeProduct=12;// 12=furgoneta
$pag=1; //pag por la que va
$objPag=9; //Objetos por pag
$filterBy='price'; // price= filtro por precio, mileage= kilometros

$autoscout= new Autoscout();
$idCliente= $autoscout->getIdClient();
$html= $autoscout->getHtml("http://cpcms.autoscout24.com/index.php?soO=asc&soB=$filterBy&soL=$objPag&p=list&sci=$idCliente&se[bo_ty]=$typeProduct&dgpge=$pag");

// parse the html into a DOMDocument
$dom = new DOMDocument();
@$dom->loadHTML($html);

// grab all the on the page
$xpath = new DOMXPath($dom);

//Productos
$aItems = $xpath->query("//li[@class='cl_bg_box']");

$index=1;
foreach($aItems as $item){
            		
	$nodesTmp=$item->childNodes;
					
	foreach($nodesTmp as $node) {
		$typeInfo = $node->getAttribute("class");
						
		switch ($typeInfo) {
			case 'checkbox':
				$idObj = $node->childNodes->item(0)->getAttribute('value');
				break;
			case 'image':
				$urlDetalle=$node->childNodes->item(0)->getAttribute('href');
				$urlImg=$node->childNodes->item(0)->childNodes->item(0)->getAttribute('src');
				$urlGallery= $node->childNodes->item(1)->getAttribute('onclick');
				break;
			case 'info clearfix':
				$price=$node->childNodes->item(0)->childNodes->item(0)->nodeValue;
				$title=$node->childNodes->item(1)->childNodes->item(0)->nodeValue;
				break;
			default:
								
				break;
			}
	}
					
	$style=($index%3!=0)?'catalogo-product-list':'catalogo-product-list2211';
	echo '<div class="'.$style.'">
			<div class="list-image"><a href="#"><img src="'.$urlImg.'" width="162" height="122" alt="'.$title.'" /></a></div>
			<div class="catalogo-product-name-txt2">
				<a href="#" title="'.$title.'">'.$title.'</a> 
				<p>'.$price.'</p>
			</div>
		</div>';
						
	if($index%3==0) echo '<div class="clr"></div>';
	++$index;
}

//Paginacion
$aPaginacion = $xpath->query("//li[@class='innerdgg']");
$index=0;
foreach($aPaginacion as $item){
	if($intex==0){
		$nodesTmp=$item->childNodes;
		$numNodes= $nodesTmp->length;
		
		if($numNodes>0){
			
			echo '<div class="clr"></div>
				<div class="catalogo-devider"><img src="'.TEMPLATEURI.'/images/cata-devider.jpg" class="sinBorde" alt="cata" /></div>
				<div class="perivious-next">';
				
			if($pag>1 && $numNodes>1){
				echo '<div class="perivious"><a href="#"><img src="'.TEMPLATEURI.'/images/privius-arro.jpg" class="sinBorde" alt="Anterior" /></a></div><div class="priv-text"><a href="#">Anterior</a></div>';
			}else{
				echo '<div class="perivious"><img src="'.TEMPLATEURI.'/images/privius-arro.jpg" class="sinBorde" alt="Anterior" /></div><div class="priv-text">Anterior</div>';
			}
			

			foreach($nodesTmp as $node) {
				$pagTmp=$node->nodeValue;
				$active=($pag==$pagTmp)?'<span class="active">'.$pagTmp.'</span>':'<a href="#">'.$pagTmp.'</a>';
				echo '<div class="priv-number">'.$active.'</div>';
			}
			
			if($pag<$numNodes){
				echo '<div class="next-text"><a href="#">Siguiente</a></div><div class="next"><a href="#"><img src="'.TEMPLATEURI.'/images/next-arro.jpg" class="sinBorde" alt="Siguiente" /></a></div>';
			}else{
				echo '<div class="next-text">Siguiente</div><div class="next"><img src="'.TEMPLATEURI.'/images/next-arro.jpg" class="sinBorde" alt="Siguiente" /></div>';
			}
					
			echo '</div>';
			
		}
	}
	++$intex;
}

?>
