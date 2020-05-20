<?php 
	/*
	
	Template Name: AutoScout Template
	
	*/
	if(isset($_GET['price'])){
		$price = (int)$_GET['price'];
	}else{
		$price = "";
	}
	
	$ver='';
	
	if(!empty($post)){

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
	}else{
		$ver='all';	
	}
?>

<?php get_header();?>


<script type="text/javascript">	
	jQuery(document).ready(function() {
		var urlParams = new URLSearchParams(window.location.search);

		autoscout.init();
		if(urlParams.has('price')){
			if(jQuery("#buscadorFlag").length == 0){
				jQuery("#formListProduct").append("<input type='hidden' id='buscadorFlag' name='buscador' value='true'/>");
			}
			autoscout.changePag();
		}else{
			if(window.location.pathname == "/"){
				//autoscout.getHomeProduct();
				//console.log("Home products");
				autoscout.changePag(1);
			}else{
				autoscout.changePag(1);
			}
		}
		//autoscout.changePag(1);
		$("#filterByTmp").change(function(){ $("#filterBy").val($("#filterByTmp").val()); autoscout.changePag()});
		$("#objPagTmp").change(function(){ $("#objPag").val($("#objPagTmp").val()); autoscout.changePag()});
	});
</script>
<?php if(!empty($post)):?>
<div class="row">
	<div class="page-menu">
		<p class="crumb"><?php new simple_breadcrumb();?></p>
		<?php echo do_shortcode('[do_widget id=nav_menu-2]'); ?>
	</div>
</div>
<?php endif;?>

<div class="body-contener row">
	<div class="col-md-2">	</div>
	<div class="col-md-8">
		<div class="row">
			<div class="col-md-12">

                                                 
	<h1 id="titleSearch">Buscar coches</h1>
	<h2 id="titleResults" class="subtitle" style="display: none;"></h2>


	<div id="searchForm" class="advanced" style="">
		
        
		<!--<h3>Tipo de vehículo:</h3>-->
		<div class="interior" style="margin-top: 30px;">
			<div class="types">
				<label for="type" class="hide">Tipo de vehículo</label>
				<select name="type" style="display: none;">
					<option value="">Todos los tipos</option>
				<option value="1">Cabrio</option><option value="2">Ciclomotor</option><option value="3">Coupé</option><option value="4">Familiar</option><option value="5">Industrial</option><option value="6">Mono-volumen</option><option value="7">SUV</option><option value="8">Todo Terreno</option><option value="9">Turismo</option></select>
				<div class="row items">
					<div class="col-xs-12 col-sm-3 col-md-1 type"></div>
					<div class="col-xs-12 col-sm-3 col-md-1 type"></div>
					<div class="col-xs-4 col-sm-3 col-md-1 type all">
				        <div class="item" id="iconAll" data-type="all">
				            <img src="/wp-content/themes/construction-field/assets/img/type_0.png" alt="">
				            <h3>Todos</h3>
				        </div>				        
				    </div>
		

		<div class="col-xs-4 col-sm-3 col-md-1 type">
	        <div class="item" data-type="Y8">
	            <img alt="" src="/wp-content/themes/construction-field/assets/img/turismo.png">
	            <h3>Turismo</h3>
	        </div>
	    </div>
    
		<div class="col-xs-4 col-sm-3 col-md-1 type">
	        <div class="item" data-type="Y1">
	            <img alt="" src="/wp-content/themes/construction-field/assets/img/monovolumen.png">
	            <h3>Mono-volumen</h3>
	        </div>
	    </div>
    
    
		<div class="col-xs-4 col-sm-3 col-md-1 type">
	        <div class="item" data-type="Y2">
	            <img alt="" src="/wp-content/themes/construction-field/assets/img/furgoneta.png">
	            <h3>Furgonetas</h3>
	        </div>
	    </div>
    
		<div class="col-xs-4 col-sm-3 col-md-1 type">
	        <div class="item" data-type="Y4">
	            <img alt="" src="/wp-content/themes/construction-field/assets/img/california.png">
	            <h3>Furgonetas Vivienda</h3>
	        </div>
	    </div>

		<div class="col-xs-4 col-sm-3 col-md-1 type">
	        <div class="item" data-type="Y5">
	            <img alt="" src="/wp-content/themes/construction-field/assets/img/transport.png">
	            <h3>Furgonetas Medianas y Grandes</h3>
	        </div>
	    </div>
	
	    <div class="col-xs-4 col-sm-3 col-md-1 type">
	        <div class="item" data-type="Y7">
	            <img alt="" src="/wp-content/themes/construction-field/assets/img/camion.png">
	            <h3>Isotermo</h3>
	        </div>
	    </div>
	    <div class="col-xs-12 col-sm-3 col-md-1 type"></div>
	    <div class="col-xs-12 col-sm-3 col-md-1 type"></div>
    
    </div>
			</div>
		</div>
	<form id="formListProduct">
		<input type="hidden" name="templateUri" id="templateUri" value="<?php echo TEMPLATEURI;?>"/>
		<input type="hidden" name="action" value="getListProductTxt" />
		<input type="hidden" name="ver" id="ver" value="<?php echo $ver;?>" />
		<input type="hidden" name="filterBy" id="filterBy" value="price" />
		<input type="hidden" name="objPag" id="objPag" value="12" />
		<input type="hidden" name="pag" id="pag" value="1" />
		<div class="interior">

			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-10">
					<h3>Características:</h3>
				</div>
			</div>
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-4">
					<div class="makes">
						<label for="make">Marca</label>
						<select name="se[make]" class="select cl_brd_form" label="Todas las marcas">
							<option value="0">Todas las marcas</option>
							<option value="6">Alfa Romeo</option>
							<option value="13">BMW</option>
							<option value="21">Citroen</option>
							<option value="28">Fiat</option>
							<option value="29">Ford</option>
							<option value="35">Isuzu</option>
							<option value="14882">Iveco</option>
							<option value="42">Lancia</option>
							<option value="47">Mercedes-Benz</option>
							<option value="52">Nissan</option>
							<option value="54">Opel</option>
							<option value="55">Peugeot</option>
							<option value="60">Renault</option>
							<option value="64">SEAT</option>
							<option value="74">Volkswagen</option>
						</select>
						
						<div id="buttonsForm" class="pull-left">
							<button type="button" data-loading-text="Buscando..." class="btn btn-default btn-lg search" autocomplete="off" id="btnBuscar">Buscar</button>
							<button type="button" data-loading-text="Buscando..." class="btn btn-primary pull-left search-all" autocomplete="off" id="btnAll">Ver todos</button>
						</div>
		
					</div>
				</div>
					

				<div class="col-md-2">
					<div class="prices">
						<label for="price_min">Precio min.</label>
						<div class="input-group">
							<input type="text" name="se[pr_f]" class="min form-control">
							<span class="input-group-addon">€</span>
						</div>
					</div>
					<div class="years">
						<label for="year_min">Año min.</label>
						<input type="text" name="se[ag_f]" class="min form-control">
					</div>
				</div>

				<div class="col-md-2">
					<div class="prices">
						<label for="price_max">Precio max.</label>
						<div class="input-group">
							<input type="text" name="se[pr_t]" class="max form-control" value="<?php echo $price; ?>">
							<span class="input-group-addon">€</span>
						</div>
					</div>
					<div class="years">
						<label for="year_max">Año max.</label>
						<input type="text" name="se[ag_t]" class="max form-control">
					</div>
				</div>
				</div>
			</div>		
		</div>

		
	</form>

	</div>

	<div id="searchContent" class="row" style="display: none;">

		<div id="car" class="col-md-12" style="display: none;">
				
		</div>

		<div class="col-md-9 col-md-push-3">

				
	<div class="row utils">
		<div class="col-md-6">
			<div id="options">
				<label>Ordenar por:</label>
				<select name="selector" class="form-control">
					<option value="h2.title>a">Modelo</option>
					<option value="div.price span">Precio</option>
					<option value="p.description>span.year">Del año</option>
					<option value="p.description>span.km">Kilómetraje</option>
				</select>
				<select name="order" class="form-control">
					<option value="asc">Ascendente</option>
					<option value="desc">Descendente</option>
				</select>
			</div>
		</div>
		<div class="col-md-6 pagination-1">
			<ul class="carsPagination pagination">				
			</ul>
		</div>
	</div>
	
			<ul id="cars" style="display: none;">
				
			</ul>			

			<div class="row utils">
				<div class="col-md-6">
					
				</div>
				<div class="col-md-6 pagination-2">
					<ul class="carsPagination pagination">				
					</ul>
				</div>
			</div>
		</div>

		<div class="col-md-3 col-md-pull-9">
			<div id="filtersForm" style="display: none;">
				
        		
		<h3>Filtros</h3>
		<div class="types">
			<h4>Tipo de vehículo</h4>
			<select name="type" class="form-control">
			</select>
		</div>
		<div class="makes">
			<h4>Marca</h4>
						<select name="make" class="form-control">
			</select>
		</div>
		<div class="models">
			<h4>Modelo</h4>
						<select name="model" class="form-control">
			</select>
		</div>
		<div class="prices">
			<h4>Precio</h4>
			<label for="price_min">Precio min.</label>
			<div class="input-group">
				<input type="text" name="price_min" class="min form-control">
				<span class="input-group-addon">€</span>
			</div>
			<label for="price_max">Precio max.</label>
			<div class="input-group">
				<input type="text" name="price_max" class="max form-control">
				<span class="input-group-addon">€</span>
			</div>
		</div>
		<div class="years">
			<h4>Del año</h4>
			<label for="year_min">Año min.</label>
			<input type="text" name="year_min" class="min form-control">
			<label for="year_max">Año max.</label>
			<input type="text" name="year_max" class="max form-control">
		</div>
		<div class="transmission">
			<h4>Cambio</h4>
			<select name="transmission" class="form-control">
				<option value="0">Todos</option>
				<option value="1">Manual</option>
				<option value="2">Automático</option>
			</select>
		</div>
		<div class="kilometers">
			<h4>Kilómetraje</h4>
			<label for="kilometers_min">Kilómetros min.</label>
			<input type="text" name="kilometers_min" class="min form-control">
			<label for="kilometers_max">Kilómetros max.</label>
			<input type="text" name="kilometers_max" class="max form-control">
		</div>
		<div class="fuels">
			<h4>Combustible</h4>
			<select name="fuel" class="form-control">
			</select>
		</div>
		<div class="powers">
			<h4>Potencia</h4>
			<label for="power_min">Potencia min.</label>
			<div class="input-group">
				<input type="text" name="power_min" class="min form-control">
				<span class="input-group-addon">CV</span>
			</div>
			<label for="power_max">Potencia max.</label>
			<div class="input-group">
				<input type="text" name="power_max" class="max form-control">
				<span class="input-group-addon">CV</span>
			</div>
		</div>
		<div class="checkbox featured">
			<label>
				<input type="checkbox" value="1" name="featured">
				Buscar coches destacados con "Eduardo Selección"
			</label>
		</div>
		<button type="button" data-loading-text="Buscando..." class="btn btn-primary search" autocomplete="off">Refinar búsqueda</button>
	
			</div>
		</div>

	</div>	

	<div id="htmlToJs" style="display: none;">

			
	<div class="cars-clone">
		<div class="car list">
			<div class="row">
				<div class="col-md-4">
					<a class="image" href="#">
						<img alt="" src="">
					</a>
				</div>
				<div class="col-md-8">

					<h2 class="title"></h2>
					<div class="price pw"><h3><span></span> €</h3></div>
					<div class="price offer"><h3><span></span> €</h3></div>
					<div class="before"><h4><span></span> €</h4></div>					

					<p class="description">
						<span class="pre-sold"></span>
						Del año <span class="year"></span> (<span class="month"></span>),
						 <span class="km"></span> km
						 y color <span class="color"></span>.
					</p>
					<div class="info">
						<p><i class="glyphicon glyphicon-picture" aria-hidden="true"></i><span class="imagesCount"></span> fotos</p>
						<p><i class="glyphicon glyphicon-cog" aria-hidden="true"></i><span class="power"></span> CV</p>
						<p><i class="glyphicon glyphicon-repeat" aria-hidden="true"></i><span class="fuel"></span></p>
						<p><i class="glyphicon glyphicon-road" aria-hidden="true"></i><span class="type"></span></p>
						<p class="pre-featured"><i class="glyphicon glyphicon-star featured" aria-hidden="true"></i><span class="featured">Destacado</span></p>
					</div>
				</div>
			</div>
		</div>
	</div>
			
	<div class="car-clone">
		<div class="car-details">

			<a class="close">X</a>
			<h1 class="title"></h1>

			<div class="row">

	            <div class="col-xs-12 col-md-8 images">
	            	<div id="imagesCarousel" class="carousel slide" data-ride="carousel">
        				<div class="carousel-inner" role="listbox">
	                		<div class="item"></div>
	                	</div>
	                	<a class="left carousel-control" href="#imagesCarousel" role="button" data-slide="prev">
	                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
	                        <span class="sr-only">Última</span>
	                    </a>
	                    <a class="right carousel-control" href="#imagesCarousel" role="button" data-slide="next">
	                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
	                        <span class="sr-only">Siguiente</span>
	                    </a>
	                    <!-- Indicators -->
	                    <ol class="carousel-indicators">
	                    </ol>
	                </div>
	            </div>
	            <div class="col-xs-12 col-md-4 data">
	                <div class="price pw"><h2><span></span> €</h2></div>
					<div class="price offer"><h2><span></span> €</h2></div>
					<div class="before"><h3><span></span> €</h3></div>
					<span class="pre-sold"></span>
					<span class="pre-featured"><i class="glyphicon glyphicon-star featured" aria-hidden="true"></i><span class="">Destacado</span></span>
	                <h4>Detalles del coche:</h4>
	                <ul class="description">
	                    <li>
	                        <span class="carac">Tipo de vehículo</span>
	                        <span class="text"></span>
	                    </li>
	                    <li>
	                        <span class="carac">Del año</span>
	                        <span class="year"> </span> <span class="month"></span>
	                    </li>
	                    <li>
	                        <span class="carac">Kilómetraje</span>
	                        <span class="km"></span>
	                    </li>
	                    <li>
	                        <span class="carac">Potencia</span>
	                        <span class="power"></span>
	                    </li>
	                    <li>
	                        <span class="carac">Cambio</span>
	                        <span class="transmission"></span>
	                    </li>
	                    <li>
	                        <span class="carac">Combustible</span>
	                        <span class="fuel"></span>
	                    </li>
	                    <li>
	                        <span class="carac">Color</span>
	                        <span class="color"></span>
	                    </li>
	                    
	                    <li>
	                        <span class="carac">Carrocería</span>
	                        <span class="bodytype"></span>
	                    </li>

	                    <li>
	                        <span class="carac">Puertas</span>
	                        <span class="doors"></span>
	                    </li>
	                    <li>
	                        <span class="carac">Plazas</span>
	                        <span class="seats"></span>
	                    </li>

	                </ul>

	                <div class="compare-buttons">
                    	<h5>Opciones:</h5>
	                	<button disabled="disabled" class="btn btn-primary compare">Comparar (<span>0</span>)</button>
	                	<a href="/index.php/api/comparar/" class="btn btn-info compare-go">Ir a comparar</a>
	                	<a href="" class="btn btn-default print">Imprimir</a>
	                </div>
	
					<div class="contact">
	                    <h5>Contactar:</h5>
	                    <p>Teléfono: <strong>941 270 491</strong> <br>Email: <a href="mailto:info@automovileseduardo.com">info@automovileseduardo.com</a></p>
	                </div>   				

					<h5>Comentario:</h5>
	                <div class="comment">
	                    <p></p>
	                </div>

	            </div>
	        </div>

	        <div id="share" class="row">
	            <div class="col-xs-12 col-md-8">
	            </div>
	            <div class="col-xs-12 col-md-4">
	               
	            </div>
	        </div>

	        <div id="extras" class="row">
	            <div class="col-md-12 others">

            		<h3>Características</h3>
	                <div role="tabpanel">
	                    <!-- Nav tabs -->
	                    <ul class="nav nav-tabs" role="tablist">
	                        	                        	                        	                    
	                    <!-- Tab panes -->
	                    <div class="tab-content">
	                        <div role="tabpanel" class="tab-pane active carac" id="carCaract">
	                        	<ul class="list-group">
	                        	</ul>
	                        </div>
	                        	                        	                    </div>
	                </div>
	                
	            </div>
	            	        </div>

	        <div id="extras2" class="row">
	            <div class="col-md-12 others">
	            <h3>Notas</h3>
	                <div role="tabpanel">
	                    <ul class="nav nav-tabs" role="tablist">
	                    </ul>
	                    <!-- Tab panes -->
	                    <div class="tab-content">
	                        <div role="tabpanel" class="tab-pane active notes" id="carCaract">
	                            <ul class="list-group">
	                            </ul>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>

	        <div id="similar" class="row">
	            <div class="col-md-12">
	                <h3>Coches similares:</h3>
					<div id="similarRelated">
					</div>
	            </div>
	        </div>

		</div>
	</div>
			
	<div class="type-clon">
		<div class="col-xs-4 col-sm-3 col-md-1 type">
	        <div class="item">
	            <a href="#" class="image"><img alt="" src=""></a>
	            <h3><a href="#">--</a></h3>
	        </div>
	    </div>
    </div>
			
    <div class="cars-related-clone">
    	<div class="col-md-4">
            <div class="car">
                <div class="photo">
                    <a class="image" rel="" href="#">
                        <img alt="" src="">
                    </a>
                </div>
                <div class="data">
                    <h2 class="title"></h2>
                    <p class="description">
                        <span class="text"></span>, del año <span class="year"></span> (<span class="month"></span>) y 
                        <span class="km"></span> km.
                    </p>

                    <p class="price pw"><span></span></p>
                    <p class="price offer"><span></span></p>
                    <p class="before"><span></span></p>
                </div>
            </div>
        </div>
    </div>
	</div>


                </div>
		</div>
		<!--div class="row">
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
				
	        <div class="clr"></div>
	       </div>
		</div>
	</div-->
	</div>
	<div class="col-md-2"></div>
</div>
<div class="row">
	<div class="catalogo-devider" style="margin-bottom: 30px;margin-top:30px;">
		<img src="<?php echo TEMPLATEURI;?>/images/cata-devider.jpg" alt="" class="sinBorde" />
	</div>
	<div id="cn_content"></div>
</div>
	

<?php get_sidebar(); ?>

<div class="clr"></div>
</div>

<?php if(!empty($post)):?>        
<?php get_footer(); ?>
<?php endif;?>

<script type="text/javascript">
	jQuery("#searchForm .item").click(function(){
		var type = jQuery(this).data('type');
		
		if(jQuery("#buscadorFlag").length > 0){
			jQuery("#buscadorFlag").remove();
		}
		
		jQuery("#ver").val(type);
		autoscout.changePag();
	});

	jQuery("#btnAll").click(function(){
		jQuery("#ver").val("all");
		if(jQuery("#buscadorFlag").length > 0){
			jQuery("#buscadorFlag").remove();
		}
		autoscout.changePag();
	});

	jQuery("#btnBuscar").click(function(){
		if(jQuery("#buscadorFlag").length == 0){
			jQuery("#formListProduct").append("<input type='hidden' id='buscadorFlag' name='buscador' value='true'/>");
		}
		autoscout.changePag();
	});
</script>