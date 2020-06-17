<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Acme Themes
 * @subpackage Construction Field
 */
$no_blog_image = '';
global $construction_field_customizer_all_values;
$fields = get_fields();
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('init-animate'); ?>>
    <div class="content-wrapper">
        <div class="entry-content <?php echo $no_blog_image?>">
			<?php if(isset($fields['Precio']) && $fields['Precio'] > 0):?>
				<!--Carousel Wrapper-->
				<div id="carousel-post" class="carousel slide carousel-fade z-depth-1-half" data-ride="carousel">
				<!--Slides-->
				<div class="carousel-inner" role="listbox">
				<?php
				$images = get_attached_media('image');
				$i = 0;
				$active = "active";
				foreach($images as $imagePost):?>
					<?php if($i > 0) $active = "";$i++;?>
					<div class="item <?= $active ?>">
						<div class="view">
						<img class="d-block w-100" src="<?php echo wp_get_attachment_image_src($imagePost->ID, 'extralarge')[0]?>" />
						<div class="mask rgba-black-light"></div>
						</div>
					</div>
				<?php endforeach;?>
				</div>
			<!--/.Slides-->
			<!--Controls-->
			<!-- Left and right controls -->
				<a class="left carousel-control" href="#carousel-post" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
				<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#carousel-post" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
				<span class="sr-only">Next</span>
				</a>
			<!--/.Controls-->
			</div>
			<!--/.Carousel Wrapper-->
            <div class="entry-header-title col-md-12">
				<?php
				the_title( '<h1 class="entry-title">', '</h1>' );
				?>
			</div>
			<div class="row fields">
				<div class="col-md-8 col-xs-12 caracteristicas">
					<div class="col-md-2 col-xs-2"><span>Año</span></div>
					<div class="col-md-2 col-xs-3"><span>Kilometraje</span></div>
					<div class="col-md-2 col-xs-3"><span>Combustible</span></div>
					<div class="col-md-2 hidden-mobile"><span>Categoría</span></div>
					<div class="col-md-2 col-xs-4"><span>Tipo de cambio</span></div>
					<div class="col-md-2 hidden-mobile"><span>Plazas</span></div>
					<div class="col-md-2 col-xs-2"><strong><?=  $fields['Año']; ?></strong></div>
					<div class="col-md-2 col-xs-3"><strong><?=  number_format($fields['km'], 0, ',', '.'); ?></strong></div>
					<div class="col-md-2 col-xs-3"><strong><?=  $fields['Combustible']; ?></strong></div>
					<div class="col-md-2 hidden-mobile"><strong><?=  $fields['categoria']; ?></strong></div>
					<div class="col-md-2 col-xs-4"><strong><?=  $fields['transmision']; ?></strong></div>
					<div class="col-md-2 hidden-mobile"><strong><?=  $fields['Plazas']; ?></strong></div>
				</div>
				<div class="col-md-4 col-xs-12 precio">
					<span class="price-label">Precio</span>
					<span class="price-quantity"><strong><?=  number_format($fields['Precio'], 2, ',', '.'); ?>€</strong>
						<?php if(isset($fields['precio_sin_iva']) && $fields['precio_sin_iva'] > 0):?>
						<span class="sin-iva"><?=  number_format( $fields['precio_sin_iva'], 2, ',', '.'); ?>€ + IVA</span>
					<?php endif;?>
					</span>
				</div>
			</div>
			<?php
				$equipamiento = $fields["Equipamiento"];
			?>
			<div class="row equipamiento">
				<div class="col-md-8 col-xs-12 items">
					<div class="row">
						<div class="col-md-12 col-xs-12">
							<h3>Equipamiento</h3>
							<div class="col-md-4">
								<ul>
									<?php for($i = 0; $i< count($equipamiento); $i++):?>
										<?php if($i % 3 == 0):?>
											<li class="equipamiento-item"><i class="fas fa-check"></i><?= $equipamiento[$i] ?></li>
										<?php endif;?>
									<?php endfor?>
								</ul>
							</div>
							<div class="col-md-4">
								<ul>
									<?php for($i = 0; $i< count($equipamiento); $i++):?>
										<?php if($i % 3 == 1):?>
											<li class="equipamiento-item"><i class="fas fa-check"></i><?= $equipamiento[$i] ?></li>
										<?php endif;?>
									<?php endfor?>
								</ul>
							</div>
							<div class="col-md-4">
								<ul>
									<?php for($i = 0; $i< count($equipamiento); $i++):?>
										<?php if($i % 3 == 2):?>
											<li class="equipamiento-item"><i class="fas fa-check"></i><?= $equipamiento[$i] ?></li>
										<?php endif;?>
									<?php endfor?>
								</ul>
							</div>
						</div>
						<div class="col-md-12 col-xs-12 descripcion">
							<h3>Comentario</h3>
							<?php the_content();?>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-xs-12 financiacion">
					<h3>Finanaciación a tu medida</h3>
					<input type="range" class="range-slider"  name="price" value="<?=$fields['Precio'] ?>" max="50000" onchange="updateRangeInput(this.value);" />
					<label>Importe</label><strong class="importe"><?= number_format($fields['Precio'], 2, ',', '.') ?>€</strong>
					<input type="range" class="range-slider"  name="months" value="36" max="60" onchange="updateRangeTimeInput(this.value);" />
					<label>Tiempo</label><strong class="time">36 Meses</strong>
					<div class="row">
						<p class="cuota"><span>Cuota: </span><span class="value">75€/mes</span>
						<p>Toda la información sobre las condiciones de financiación disponible aquí</p>
					</div>
					<div class="row interesado">
					<h3>¡Me interesa!</h3>
						<a href="https://volumen4motor.com/?page_id=27" class="col-md-4 col-xs-4"><i class="fas fa-envelope-open-text"></i>Escríbenos</a>
						<a href="tel:948214094" class="col-md-4 col-xs-4"><i class="fas fa-phone-volume"></i>Llámanos</a>
						<a href="https://volumen4motor.com/?page_id=27" class="col-md-4 col-xs-4"><i class="fas fa-user-clock"></i>Te llamamos</a>
					</div>
				</div>
		</div>
		<div class="row">
			<?php echo do_shortcode('[related_post post_id="'.get_the_ID().'"]'); ?>
		</div>
<?php else:?>
	<div class="row">
		<div class="post-title col-md-12 inner-main-title">
				<?php
				the_title( '<h1 class="entry-title">', '</h1>' );
				?>
		</div>
		<div class="post-content col-md-12">
			<?php the_content();?>
		</div>
	</div>
<?php endif;?>
			<?php

		/*	wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'construction-field' ),
				'after'  => '</div>',
			) );*/
			?>
        </div><!-- .entry-content -->
    </div>
</article><!-- #post-## -->

<script>
	function updateRangeInput(val) {
      jQuery('.financiacion .importe').text(parseFloat(val).toLocaleString('es-ES',  {style: 'currency', currency: 'EUR'}));
      var precio = jQuery('.financiacion .importe').text().replace('.','').replace(',','.');
      var cuota = calculaFinanciacion(parseFloat(precio), parseInt(jQuery('.financiacion .time').text()));
      jQuery('.financiacion .value').text(cuota.toLocaleString('es-ES',  {style: 'currency', currency: 'EUR'}));
    }
    function updateRangeTimeInput(val) {
      jQuery('.financiacion .time').text(val+' Meses');
      var precio = jQuery('.financiacion .importe').text().replace('.','').replace(',','.');
      var cuota = calculaFinanciacion(parseFloat(precio), parseInt(jQuery('.financiacion .time').text()));
      jQuery('.financiacion .value').text(cuota.toLocaleString('es-ES',  {style: 'currency', currency: 'EUR'}));
    }

    jQuery(document).ready(function(){
    	var precio = jQuery('.financiacion .importe').text().replace('.','').replace(',','.');
      	var cuota = calculaFinanciacion(parseFloat(precio), parseInt(jQuery('.financiacion .time').text()));
      	jQuery('.financiacion .value').text(cuota.toLocaleString('es-ES',  {style: 'currency', currency: 'EUR'}));
    })


    function calculaFinanciacion(precio, meses){

    	var interes = parseFloat((7.99/100)/12);
    	//var entrada = parseInt(jQuery("#entrada").val());
		var entrada = 0;
    	if(isNaN(entrada)){
			entrada = 0;
		 }


	 	precio += (precio * 0.03);

    	var cuota;
    	//console.log(precio +" "+ meses +" "+entrada+" "+" "+interes);
    	//var Finance = import('finance.js');

  		var finance = new Finance();
  		cuota = finance.AM(precio, 7.99, meses/12, 0);
    	//cuota = (precio*interes*(Math.pow((1+interes),(meses))))/((Math.pow((1+interes),(meses)))-1);
    	//console.log(cuota);
    	completo=+parseFloat(cuota*meses);
		return cuota;
    }
</script>