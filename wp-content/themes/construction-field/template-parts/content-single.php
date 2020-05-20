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

				<!--Carousel Wrapper-->
				<div id="carousel-post" class="carousel slide carousel-fade z-depth-1-half" data-ride="carousel">
				<!--Slides-->
				<div class="carousel-inner" role="listbox">'
				<?php
				$posts = get_posts(array('post_type' => 'attachment'));
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
            <div class="entry-header-title col-md-8">
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
					<div class="col-md-2 col-xs-3"><strong><?=  number_format($fields['km'], 2, ',', '.'); ?></strong></div>
					<div class="col-md-2 col-xs-3"><strong><?=  $fields['Combustible']; ?></strong></div>
					<div class="col-md-2 hidden-mobile"><strong><?=  $fields['categoria']; ?></strong></div>
					<div class="col-md-2 col-xs-4"><strong><?=  $fields['transmision']; ?></strong></div>
					<div class="col-md-2 hidden-mobile"><strong><?=  $fields['Plazas']; ?></strong></div>
				</div>
				<div class="col-md-4 col-xs-12 precio">
					<span class="price-label">Precio</span>
					<span class="price-quantity"><strong><?=  number_format($fields['Precio'], 2, ',', '.'); ?>€</strong><span class="sin-iva"><?=  number_format( $fields['precio_sin_iva'], 2, ',', '.'); ?>€ + IVA</span></span>
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
						<div class="col-md-12 col-xs-12">
							<h3>Comentario</h3>
							<?php the_content();?>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-xs-12 financiacion">
					<h3>Finanaciación a tu medida</h3>
					<input type="range" class="range-slider"  name="price" value="<?= number_format($fields['Precio'], 2, ',', '.') ?>" max-value="50000" />
					<label>Importe</label><strong class="value"><?= number_format($fields['Precio'], 2, ',', '.') ?>€</strong>
					<input type="range" class="range-slider"  name="months" value="12" max-value="24" />
					<label>Tiempo</label><strong class="value">12 Meses</strong>
					<div class="row">
						<p class="cuota"><span>Cuota:</span><span class="value">75€/mes</span>
						<p>Toda la información sobre las condiciones de fi nanciación disponible aquí</p>
					</div>
					<div class="row interesado">
					<h3>¡Me interesa!</h3>
						<a href="/la-empresa/contacto.html" class="col-md-4 col-xs-4"><i class="fas fa-envelope-open-text"></i>Escríbenos</a>
						<a href="tel:948214094" class="col-md-4 col-xs-4"><i class="fas fa-phone-volume"></i>Llámanos</a>
						<a href="/la-empresa/contacto.html" class="col-md-4 col-xs-4"><i class="fas fa-user-clock"></i>Te llamamos</a>
					</div>
				</div>
		</div>
			<?php

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'construction-field' ),
				'after'  => '</div>',
			) );
			?>
        </div><!-- .entry-content -->
    </div>
</article><!-- #post-## -->