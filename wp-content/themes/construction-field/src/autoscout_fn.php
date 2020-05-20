<?php
	require_once '../com/autoscout.class.php';

	$$fn=$_POST['action'];
	$$fn();

	function getHomeProduct(){
		while(list($key, $value) = each($_POST)) {
          $$key=$value;
    	}

		$autoscout= new Autoscout();
		$xpath =$autoscout->getListProduct($filterBy,$objPag,$typeProduct,$pag);

		//Productos
		$aItems = $xpath->query("//li[@class='cl_bg_box']");

		$index=0;
		$outOfertas='';
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
						$urlImg2=str_replace('-small', '', $urlImg);
						$urlGallery= $node->childNodes->item(1)->getAttribute('onclick');
						break;
					case 'info clearfix':
						$price=$node->childNodes->item(0)->childNodes->item(0)->nodeValue;
						$title=$node->childNodes->item(1)->childNodes->item(0)->nodeValue;
						$descriCorta=$node->childNodes->item(1)->childNodes->item(1)->nodeValue;
						break;
					default:

						break;
				}

			}

			/*echo '<p>-------------</p>';
			echo $index.'//'.$title.'//'.$descriCorta;
			echo '<p>-------------</p>';*/
			if($index==1){
				//Destacado home.
				$outDestacado=getGallery($idObj);
			}else{
				//Nuestras ofertas.
				$style=($index%3!=0 || $index==0)?'product-list':'product-list11';
				$uriDetalle='http://'.$_SERVER[HTTP_HOST].'/catalogo-de-vehiculos/detalle.html?id='.$idObj;

				$outOfertas.= '<div class="'.$style.' col-md-4">
					<div class="list-image"><a href="'.$uriDetalle.'" title="'.$title.'"><img src="'.$urlImg2.'" alt="'.$title.'" /></a></div>
					<div class="product-name-txt2">
					<a href="'.$uriDetalle.'" title="'.$title.'">'.cortaTxt($title,40).'</a>
					<p>'.cortaTxt($descriCorta, 75).'</p>
					</div>
				</div>';

				//if($index%3==0 && $index!=0) $outOfertas.= '<div class="clr"></div>';
			}
			++$index;

		}
		echo json_encode(array('outDestacado'=>$outDestacado,'outOfertas'=>$outOfertas));
	}


	function getHomeProductTxt(){
		while(list($key, $value) = each($_POST)) {
          $$key=$value;
    	}

		$autoscout= new Autoscout();
		$objPag = 80;
		$ver = 0;
		$xpath =$autoscout->getListProductTxt($filterBy,$objPag,$ver,$pag);

		//Productos
		$aItems = $xpath->query("//li[@class='cl_bg_box']");

		$index=0;
		$outOfertas='<p id="message"></p>';
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
						$urlImg2=str_replace('-small', '', $urlImg);
						$urlImg3=str_replace('120x90', '640x480', $urlImg);
						$urlGallery= $node->childNodes->item(1)->getAttribute('onclick');
						break;
					case 'info clearfix':
						$price=$node->childNodes->item(0)->childNodes->item(0)->nodeValue;
						$price = str_replace(',-','€',$price);
						$title=$node->childNodes->item(1)->childNodes->item(0)->nodeValue;
						$descriCorta=$node->childNodes->item(1)->childNodes->item(1)->nodeValue;
						break;
					default:

						break;
				}

			}

			/*echo '<p>-------------</p>';
			echo $index.'//'.$title.'//'.$descriCorta;
			echo '<p>-------------</p>';*/
			if($index==0){
				//Destacado home.
				$outDestacado=getGallery($idObj);
			}else{
				//Nuestras ofertas.
				$style=($index%3!=0 || $index==0)?'product-list':'product-list';
				$uriDetalle='http://'.$_SERVER[HTTP_HOST].'/catalogo-de-vehiculos/detalle.html?id='.$idObj;

				$outOfertas.= '<div class="'.$style.' col-md-4">
					<div class="item">
					<div class="list-image"><a href="'.$uriDetalle.'" title="'.$title.'"><img src="'.$urlImg3.'"  alt="'.$title.'" /></a></div>
					<div class="product-name-txt2 ">
					<a href="'.$uriDetalle.'" title="'.$title.'">'.cortaTxt($title,30).'</a>
					<p>'.cortaTxt($descriCorta, 65).'</p>
					<span class="price">'.$price.'</span>
					</div>
					</div>
				</div>';

				//if($index%3==0 && $index!=0) $outOfertas.= '<div class="clr"></div>';
			}
			++$index;

		}

			//Paginacion
			$aPaginacion = $xpath->query("//li[@class='innerdgg']");
			$index=0;
			foreach($aPaginacion as $item){
				if($intex==0){
					$nodesTmp=$item->childNodes;
					$numNodes= $nodesTmp->length;
					$pNext=$pag+1;
					$pPrev=$pag-1;

					if($numNodes>0){

						$outOfertas.= '
							<div class="catalogo-devider"><img src="'.$templateUri.'/images/cata-devider.jpg" class="sinBorde" alt="cata" /></div>
							<div class="perivious-next">';

						if($pag>1 && $numNodes>1){
							$outOfertas.= '<div class="perivious"><a href="javascript:autoscout.changePag('.$pPrev.');"><img src="'.$templateUri.'/images/privius-arro.jpg" class="sinBorde" alt="Anterior" /></a></div><div class="priv-text"><a href="javascript:autoscout.changePag('.$pPrev.');">Anterior</a></div>';
						}else{
							$outOfertas.= '<div class="perivious"><img src="'.$templateUri.'/images/privius-arro.jpg" class="sinBorde" alt="Anterior" /></div><div class="priv-text">Anterior</div>';
						}


						foreach($nodesTmp as $node) {
							$pagTmp=$node->nodeValue;
							$active=($pag==$pagTmp)?'<span class="active">'.$pagTmp.'</span>':'<a href="javascript:autoscout.changePag('.$pagTmp.');">'.$pagTmp.'</a>';
							$outOfertas.= '<div class="priv-number">'.$active.'</div>';
						}

						if($pag<$numNodes){
							$outOfertas.= '<div class="next-text"><a href="javascript:autoscout.changePag('.$pNext.');">Siguiente</a></div><div class="next"><a href="javascript:autoscout.changePag('.$pNext.');"><img src="'.$templateUri.'/images/next-arro.jpg" class="sinBorde" alt="Siguiente" /></a></div>';
						}else{
							$outOfertas.= '<div class="next-text">Siguiente</div><div class="next"><img src="'.$templateUri.'/images/next-arro.jpg" class="sinBorde" alt="Siguiente" /></div>';
						}

						$outOfertas.= '</div>';

					}
				}
				++$intex;
			}
		echo json_encode(array('outDestacado'=>$outDestacado,'outOfertas'=>$outOfertas));
	}

	function getListProduct(){
		$string='';
		while(list($key, $value) = each($_POST)) {
        	$$key=$value;

			if($key=='se'){
				foreach ($value as $key2 => $value2) {
					$string.='se['.$key2.']='.$value2.'&';
				}
			}
			if($key!='templateUri' && $key!='action' && $key!='se'){
				$string.=$key.'='.$value.'&';
			}
    	}

		$autoscout= new Autoscout();
		if(!isset($dgpge) && !isset($soL)){
			//Producto por tipo
			$xpath =$autoscout->getListProduct($filterBy,$objPag,$typeProduct,$pag);
		}else{
			//search
			$string=str_replace('&pag=', '&dgpge=', $string);
			$xpath =$autoscout->getListProductString($string);
		}


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
						$urlImg2=str_replace('-small', '', $urlImg);
						$urlImg2=str_replace('120x90', '640x480', $urlImg);
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

			$uriDetalle='';
			switch ($typeProduct) {
				case 12:
					$uriDetalle='http://'.$_SERVER[HTTP_HOST].'/catalogo-de-vehiculos/furgonetas/furgoneta-detalle.html?id='.$idObj;
					break;
				case 5:
					$uriDetalle='http://'.$_SERVER[HTTP_HOST].'/catalogo-de-vehiculos/monovolumenes/monovolumenes-detalle.html?id='.$idObj;
					break;
				case 4:
					$uriDetalle='http://'.$_SERVER[HTTP_HOST].'/catalogo-de-vehiculos/todoterreno/todoterreno-detalle.html?id='.$idObj;
					break;
				case 13:
					$uriDetalle='http://'.$_SERVER[HTTP_HOST].'/catalogo-de-vehiculos/transporter/transporter-detalle.html?id='.$idObj;
					break;
				case 7:
					$uriDetalle='http://'.$_SERVER[HTTP_HOST].'/catalogo-de-vehiculos/otros.html?id='.$idObj;
					break;

				default:
					$uriDetalle='http://'.$_SERVER[HTTP_HOST].'/resultado-de-busqueda/resultado-de-busqueda-detalle.html?id='.$idObj;
					break;
			}

			$style=($index%3!=0)?'catalogo-product-list':'catalogo-product-list2211';

			echo '<div class="'.$style.' col-md-3">
					<div class="list-image"><a href="'.$uriDetalle.'" title="'.$title.'"><img src="'.$urlImg2.'"  alt="'.$title.'" /></a></div>
					<div class="catalogo-product-name-txt2">
						<a href="'.$uriDetalle.'" title="'.$title.'">'.$title.'</a>
						<p>'.$price.'</p>
					</div>
				</div>';

			//if($index%3==0) echo '<div class="clr"></div>';
			++$index;
		}

		//Paginacion
		$aPaginacion = $xpath->query("//li[@class='innerdgg']");
		$index=0;
		foreach($aPaginacion as $item){
			if($intex==0){
				$nodesTmp=$item->childNodes;
				$numNodes= $nodesTmp->length;
				$pNext=$pag+1;
				$pPrev=$pag-1;

				if($numNodes>0){

					echo '<div class="clr"></div>
						<div class="catalogo-devider"><img src="'.$templateUri.'/images/cata-devider.jpg" class="sinBorde" alt="cata" /></div>
						<div class="perivious-next">';

					if($pag>1 && $numNodes>1){
						echo '<div class="perivious"><a href="javascript:autoscout.changePag('.$pPrev.');"><img src="'.$templateUri.'/images/privius-arro.jpg" class="sinBorde" alt="Anterior" /></a></div><div class="priv-text"><a href="javascript:autoscout.changePag('.$pPrev.');">Anterior</a></div>';
					}else{
						echo '<div class="perivious"><img src="'.$templateUri.'/images/privius-arro.jpg" class="sinBorde" alt="Anterior" /></div><div class="priv-text">Anterior</div>';
					}


					foreach($nodesTmp as $node) {
						$pagTmp=$node->nodeValue;
						$active=($pag==$pagTmp)?'<span class="active">'.$pagTmp.'</span>':'<a href="javascript:autoscout.changePag('.$pagTmp.');">'.$pagTmp.'</a>';
						echo '<div class="priv-number">'.$active.'</div>';
					}

					if($pag<$numNodes){
						echo '<div class="next-text"><a href="javascript:autoscout.changePag('.$pNext.');">Siguiente</a></div><div class="next"><a href="javascript:autoscout.changePag('.$pNext.');"><img src="'.$templateUri.'/images/next-arro.jpg" class="sinBorde" alt="Siguiente" /></a></div>';
					}else{
						echo '<div class="next-text">Siguiente</div><div class="next"><img src="'.$templateUri.'/images/next-arro.jpg" class="sinBorde" alt="Siguiente" /></div>';
					}

					echo '</div>';

				}
			}
			++$intex;
		}
	}
	function getListProductTxt(){

		$string='';
		while(list($key, $value) = each($_POST)) {
        	$$key=$value;

			if($key=='se'){
				foreach ($value as $key2 => $value2) {
					$string.='se['.$key2.']='.$value2.'&';
				}
			}
			if($key!='templateUri' && $key!='action' && $key!='se'){
				$string.=$key.'='.$value.'&';
			}
    	}

		$autoscout= new Autoscout();
		$busqueda = strpos($string, 'buscador');

		if(!isset($dgpge) && !isset($soL) && !$busqueda ){
			$verTmp=($ver=='all')?'':$ver;
			$verTmp .= '&soB=brand_id';
			//Producto por tipo
			$xpath =$autoscout->getListProductTxt($filterBy,$objPag,$verTmp,$pag);
		}else{
			//search
			$string=str_replace('&pag=', '&dgpge=', $string);
			$xpath =$autoscout->getListProductString($string);
		}


		//Productos
		$aItems = $xpath->query("//li[@class='cl_bg_box']");

		$index=1;
		$contador = 0;
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
						$urlImg2=str_replace('-small', '', $urlImg);
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

			$uriDetalle='';
			switch ($ver) {
				case 'all':
					$uriDetalle='http://'.$_SERVER[HTTP_HOST].'/catalogo-de-vehiculos/detalle.html?id='.$idObj;
					break;
				case 'Y4':
					$uriDetalle='http://'.$_SERVER[HTTP_HOST].'/catalogo-de-vehiculos/furgoneta-vivienda/furgoneta-vivienda-detalle.html?id='.$idObj;
					break;
				case 'Y1':
					$uriDetalle='http://'.$_SERVER[HTTP_HOST].'/catalogo-de-vehiculos/monovolumenes/monovolumenes-detalle.html?id='.$idObj;
					break;
				case 'Y3':
					$uriDetalle='http://'.$_SERVER[HTTP_HOST].'/catalogo-de-vehiculos/vehiculo-de-ocio/vehiculo-de-ocio-detalle.html?id='.$idObj;
					break;
				case 'Y2':
					$uriDetalle='http://'.$_SERVER[HTTP_HOST].'/catalogo-de-vehiculos/furgonetas/furgoneta-detalle.html?id='.$idObj;
					break;
				case 'Y5':
					$uriDetalle='http://'.$_SERVER[HTTP_HOST].'/catalogo-de-vehiculos/furgonetas-medianas-y-grandes/furgonetas-medianas-y-grandes-detalle.html?id='.$idObj;
					break;
				case 'Y6':
					$uriDetalle='http://'.$_SERVER[HTTP_HOST].'/catalogo-de-vehiculos/carrozados/carrozados-detalle.html?id='.$idObj;
					break;
				case 'Y7':
					$uriDetalle='http://'.$_SERVER[HTTP_HOST].'/catalogo-de-vehiculos/isotermos/isotermos-detalle.html?id='.$idObj;
					break;
                            case 'Y8':
					$uriDetalle='http://'.$_SERVER[HTTP_HOST].'/catalogo-de-vehiculos/turismos/turismos-detalle.html?id='.$idObj;
					break;
				default:
					$uriDetalle='http://'.$_SERVER[HTTP_HOST].'/resultado-de-busqueda/resultado-de-busqueda-detalle.html?id='.$idObj;
					break;
			}

			$style=($index%4!=0)?'catalogo-product-list':'catalogo-product-list2211';
			if($contador == 0){
				echo '<div class="row">';
				echo '<div class="col-md-2"></div>';
			}
			echo '
				<div class="'.$style.' col-md-2">
					<div class="list-image"><a href="'.$uriDetalle.'" title="'.$title.'"><img src="'.$urlImg2.'"  alt="'.$title.'" /></a></div>
					<div class="catalogo-product-name-txt2">
						<a href="'.$uriDetalle.'" title="'.$title.'">'.$title.'</a>
						<p>'.$price.'</p>
					</div>
				</div>
				';
			if($contador == 3){
				echo '<div class="col-md-2"></div>';
				echo '</div>'; $contador = 0;
			} else {
				$contador++;
			}

			if($index%4==0) echo '<div class="clr"></div>';
			++$index;
		}

		//Paginacion
		$aPaginacion = $xpath->query("//li[@class='innerdgg']");
		$index=0;
		foreach($aPaginacion as $item){
			if($intex==0){
				$nodesTmp=$item->childNodes;
				$numNodes= $nodesTmp->length;
				$pNext=$pag+1;
				$pPrev=$pag-1;

				if($numNodes>0){

					echo '<div class="clr row"></div>
						<div class="catalogo-devider"><img src="'.$templateUri.'/images/cata-devider.jpg" class="sinBorde" alt="cata" /></div>
						<div class="perivious-next">';

					if($pag>1 && $numNodes>1){
						echo '<div class="perivious"><a href="javascript:autoscout.changePag('.$pPrev.');"><img src="'.$templateUri.'/images/privius-arro.jpg" class="sinBorde" alt="Anterior" /></a></div><div class="priv-text"><a href="javascript:autoscout.changePag('.$pPrev.');">Anterior</a></div>';
					}else{
						echo '<div class="perivious"><img src="'.$templateUri.'/images/privius-arro.jpg" class="sinBorde" alt="Anterior" /></div><div class="priv-text">Anterior</div>';
					}


					foreach($nodesTmp as $node) {
						$pagTmp=$node->nodeValue;
						$active=($pag==$pagTmp)?'<span class="active">'.$pagTmp.'</span>':'<a href="javascript:autoscout.changePag('.$pagTmp.');">'.$pagTmp.'</a>';
						echo '<div class="priv-number">'.$active.'</div>';
					}

					if($pag<$numNodes){
						echo '<div class="next-text"><a href="javascript:autoscout.changePag('.$pNext.');">Siguiente</a></div><div class="next"><a href="javascript:autoscout.changePag('.$pNext.');"><img src="'.$templateUri.'/images/next-arro.jpg" class="sinBorde" alt="Siguiente" /></a></div>';
					}else{
						echo '<div class="next-text">Siguiente</div><div class="next"><img src="'.$templateUri.'/images/next-arro.jpg" class="sinBorde" alt="Siguiente" /></div>';
					}

					echo '</div>';

				}
			}
			++$intex;
		}
	}
	function getObjGallery(){
		echo getGallery($_POST['idProducto']);
	}
	function getGallery($v){
		$idObj=$v;
		error_reporting(1);
		$autoscout= new Autoscout();
		$xpath= $autoscout->getGallery($idObj);

		$aItems = $xpath->query("//img[@id='bigImage']");

		$script = '<script>$(function(){';

		/*foreach($aItems as $node) {
			$imgBig = $node->getAttribute('src');
			$out='<li><img src="'.$imgBig.'" /></li>';
		}


		$aItems = $xpath->query("//img[@class='thumbnailNeutral']");
		foreach($aItems as $node) {
			$imgTh = $node->getAttribute('src');
			$imgTh = str_replace('thumbnails-big', 'images-big', $imgTh);
			$out.='<li><img src="'.$imgTh.'" /></li>';

		}*/

		$scripts = $xpath->query("//body//script[not(@src)]");

		foreach ($scripts as $tag) {
		    //echo ($tag->nodeValue);
		    $functions[] = explode('$(function(){',$tag->nodeValue);
		}

		$script .= str_replace('});','',$functions[0][1]);

		$script .= '});</script>';
		$out .= $script;
		return $out;
	}

	function cortaTxt($txt, $num){
		return substr($txt,0,strrpos(substr($txt,0,$num)," ")).'...';
	}

?>