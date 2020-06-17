<?php
/**
 * Footer content
 * @since Construction Field 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'construction_field_footer' ) ) :

    function construction_field_footer() {

        global $construction_field_customizer_all_values;

        $construction_field_footer_bg_img = $construction_field_customizer_all_values['construction-field-footer-bg-img'];
	    $style = '';
        if( !empty( $construction_field_footer_bg_img ) ){
	        $style .= 'background-image:url(' . esc_url( $construction_field_footer_bg_img ) . ');background-repeat:no-repeat;background-size:cover;background-position:center;';
        }
	    ?>
        <div class="clearfix"></div>
        <footer class="site-footer">
            <?php
            $footer_column = 0;
            if(is_active_sidebar('footer-col-one') ){
	            $footer_column++;
            }
            if(is_active_sidebar('footer-col-two') ){
	            $footer_column++;
            }
            if(is_active_sidebar('footer-col-three') ){
	            $footer_column++;
            }
            if(is_active_sidebar('footer-col-four') ){
	            $footer_column++;
            }
            if( 0 !=$footer_column ) {
                ?>
                <div class="footer-columns at-fixed-width">
                    <div class="container">
                        <div class="row">
			                <?php
			                if ( 2 == $footer_column ){
				                $footer_top_col = 'col-sm-6 init-animate';
			                }
                            elseif ( 3 == $footer_column ){
				                $footer_top_col = 'col-sm-4 init-animate';
			                }
                            elseif ( 4 == $footer_column ){
				                $footer_top_col = 'col-sm-3 init-animate';
			                }
			                else{
				                $footer_top_col = 'col-sm-12 init-animate';
			                }
			                $footer_top_col .= ' zoomIn';
			                if (is_active_sidebar('footer-col-one')) : ?>
                                <div class="footer-sidebar <?php echo esc_attr($footer_top_col); ?>">
					                <?php dynamic_sidebar('footer-col-one'); ?>
                                </div>
			                <?php endif;
			                if (is_active_sidebar('footer-col-two')) : ?>
                                <div class="footer-sidebar <?php echo esc_attr($footer_top_col); ?>">
					                <?php dynamic_sidebar('footer-col-two'); ?>
                                </div>
			                <?php endif;
			                if (is_active_sidebar('footer-col-three')) : ?>
                                <div class="footer-sidebar <?php echo esc_attr($footer_top_col); ?>">
					                <?php dynamic_sidebar('footer-col-three'); ?>
                                </div>
			                <?php endif;
			                if (is_active_sidebar('footer-col-four')) : ?>
                                <div class="footer-sidebar <?php echo esc_attr($footer_top_col); ?>">
					                <?php dynamic_sidebar('footer-col-four'); ?>
                                </div>
			                <?php endif; ?>
                        </div>
                    </div><!-- bottom-->
                </div>
                <div class="clearfix"></div>
                <?php
            }
            ?>
            <div class="row">
                <div class="col-md-3 col-xs-12">
                    <?= get_custom_logo()?>
                </div>
                <div class="col-md-9">
                    <div class="row footer-columns">
                        <div class="col-md-3 col-xs-6">
                            <ul>
                                <ol><strong>Acerca de Volumen4</strong></ol>
                                <ol><a href="/la-empresa/quienes-somos.html">Quiénes somos</a></ol>
                                <ol><a href="/la-empresa/experiencia.html">Experiencia</a></ol>
                                <ol><a href="/la-empresa/contacto.html">Contacto</a></ol>
                                <ol><a href="/localizacion.html">Dónde estamos</a></ol>
                            </ul>
                        </div>
                        <div class="col-md-3 col-xs-6">
                            <ul>
                                <ol><strong>Catálogo de vehiculos</strong></ol>
                                <ol><a href="/category/vehiculos/camper/">Furgoneta Vivienda y Camper</a></ol>
                                <ol><a href="/category/vehiculos/monovolumen/">Monovolúmenes</a></ol>
                                <ol><a href="/category/vehiculos/furgonetas-pequenas/">Furgos pequeñas</a></ol>
                                <ol><a href="/category/vehiculos/furgonetas-medianas-y-grandes/">Furgos Medianas y Grandes</a></ol>
                                <ol><a href="/category/vehiculos/carrozado/">Furgos Carrozados</a></ol>
                                <ol><a href="/category/vehiculos/isotermo/">Furgos Isotermos+Frio</a></ol>
                                <ol><a href="/category/vehiculos/suv-y-4x4/">SUV y 4x4</a></ol>
                                <ol><a href="/category/vehiculos/turismo/">Turismos</a></ol>
                            </ul>
                        </div>
                        <div class="col-md-3 col-xs-6">
                            <ul>
                                <ol><strong>Servicios</strong></ol>
                                <ol><a href="/financiacion.html">Financiación</a></ol>
                            </ul>
                        </div>
                        <div class="col-md-3 col-xs-6">
                            <ul>
                                <ol><strong>Horario de exposición</strong></ol>
                                <ol>Lunes a viernes:</ol>
                                <ol>mañana de 9:00 h. a 13:30 h.</ol>
                                <ol>tarde de 16:00 h. a 20:00 h.</ol>
                                <ol>Sábados:</ol>
                                <ol>mañana de 9:30 h. a 13:30 h.</ol>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            <p>Contacta con el equipo de Volumen 4: T. <strong>948 21 40 94</strong> • email <a href="mailto:info@volumen4motor.com">info@volumen4motor.com</a></p>
                            <p>Ven a visitarnos en: <strong>Polígono Industrial Talluntxe II c/ D no35. 31110, Noain (Navarra)</strong></p>
                         </div>
                        <div class="col-md-3">
                            <p>Síguenos en RRSS:</p>
                            <a href="https://www.facebook.com/Volumen-4-MOTOR-525694794108993" target="_blank"><i class="fab fa-facebook"></i></a>
                            <a href="" target="_blank"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.instagram.com/volumen4motor/?hl=es" target="_blank"><i class="fab fa-instagram"></i></a>
                            <a href="" target="_blank"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copy-right">
                <div class='container'>
                    <div class="row">
                        <div class="col-sm-12 init-animate">
                            <div class="footer-copyright text-left">
	                            <?php
	                            if( isset( $construction_field_customizer_all_values['construction-field-footer-copyright'] ) ): ?>
                                    <p class="at-display-inline-block">
			                            <?php echo wp_kses_post( $construction_field_customizer_all_values['construction-field-footer-copyright'] ); ?>
                                        <a href="#">Política de privacidad</a> |
                                        <a href="#">Uso de cookies</a> |
                                        <a href="#">Condiciones de uso</a> |
                                        <a href="#">Avisos legales</a> |
                                        <a href="#">Mapa del sitio</a>
                                    </p>
	                            <?php endif;  ?>
                            </div>
                        </div>
                        <!--div class="col-sm-6 init-animate">
								<div class="topimg-social"><a href="http://www.volumen4motor.com/feed/" target="blank"><img src="/wp-content/themes/construction-field/assets/img/rss-grey.png" alt="rss"></a></div>
								<div class="topimg-social"><a href="#" target="blank"><img src="/wp-content/themes/construction-field/assets/img/youtube-grey.png" alt="tube"></a></div>
								<div class="topimg-social"><a href="http://instagram.com/volumen4motorsl" target="blank"><img src="/wp-content/themes/construction-field/assets/img/insta_grey.png" alt="twitt"></a></div>		<div class="topimg-social"><a href="https://www.facebook.com/pages/Volumen-4-MOTOR/525694794108993" target="blank"><img src="/wp-content/themes/construction-field/assets/img/face-grey.png" alt="face"></a></div>
								<div class="social-text">Siguenos en...</div>

                            <?php
                            $construction_field_footer_copyright_beside_option = $construction_field_customizer_all_values['construction-field-footer-copyright-beside-option'];
                            if( 'hide' != $construction_field_footer_copyright_beside_option ){
	                            if ( 'social' == $construction_field_footer_copyright_beside_option ) {
		                            /**
		                             * Social Sharing
		                             * construction_field_action_social_links
		                             * @since Construction Field 1.0.0
		                             *
		                             * @hooked construction_field_social_links -  10
		                             */
		                            echo "<div class='text-right'>";
		                            do_action('construction_field_action_social_links');
		                            echo "</div>";
	                            }
	                            else{
		                            echo "<div class='at-first-level-nav text-right'>";
		                            wp_nav_menu(
			                            array(
				                            'theme_location' => 'footer-menu',
				                            'container' => false,
				                            'depth' => 1
                                        )
		                            );
		                            echo "</div>";
	                            }
                            }
                            ?>
                        </div-->
                    </div>
                </div>
                <a href="#page" class="sm-up-container"><i class="fa fa-angle-up sm-up"></i></a>
            </div>
        </footer>
    <?php
    }
endif;
add_action( 'construction_field_action_footer', 'construction_field_footer', 10 );

/**
 * Page end
 *
 * @since Construction Field 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'construction_field_page_end' ) ) :

    function construction_field_page_end() {
	    global $construction_field_customizer_all_values;
	    $construction_field_booking_form_title = $construction_field_customizer_all_values['construction-field-popup-widget-title'];
	    ?>
        <!-- Modal -->
        <div id="at-shortcode-bootstrap-modal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
					    <?php
					    if( !empty( $construction_field_booking_form_title ) ){
						    ?>
                            <h4 class="modal-title"><?php echo esc_html( $construction_field_booking_form_title ); ?></h4>
						    <?php
					    }
					    ?>
                    </div>
				    <?php
				    if( is_active_sidebar( 'popup-widget-area' ) ) :
					    echo "<div class='modal-body'>";
					    dynamic_sidebar( 'popup-widget-area' );
					    echo "</div>";
				    endif;
				    ?>
                </div><!--.modal-content-->
            </div>
        </div><!--#at-shortcode-bootstrap-modal-->

        </div><!-- #page -->
    <?php
    }
endif;
add_action( 'construction_field_action_after', 'construction_field_page_end', 10 );