jQuery(document).ready(function($){

    //Pongo hamburguesa menu
    jQuery("#nav_menu-2").attr("data-before","");


    var at_window = $(window);
    var at_body = $('body');
    function at_ticker() {
        var ticker = $('.news-notice-content'),
            ticker_first = ticker.children(':first');

        if( ticker_first.length ){
            setInterval(function() {
                if ( !ticker_first.is(":hover") ){
                    ticker_first.fadeOut(function() {
                        ticker_first.appendTo(ticker);
                        ticker_first = ticker.children(':first');
                        ticker_first.fadeIn();
                    });
                }
            },3000);
        }
    }

    at_ticker();

    function homeFullScreen() {

        var homeSection = $('#at-banner-slider');
        var windowHeight = at_window.outerHeight();

        if (homeSection.hasClass('home-fullscreen')) {

            $('.home-fullscreen').css('height', windowHeight);
        }
    }
    //make slider full width
    homeFullScreen();

    //window resize
    at_window.resize(function () {
        homeFullScreen();
    });

    at_window.on("load", function() {

        /*slick*/
        $('.acme-slick-carausel').each(function() {
            var at_featured_img_slider = $(this);

            var slidesToShow = parseInt(at_featured_img_slider.data('column'));
            var slidesToScroll = parseInt(at_featured_img_slider.data('column'));
            var prevArrow =at_featured_img_slider.closest('.widget').find('.at-action-wrapper > .prev');
            var nextArrow =at_featured_img_slider.closest('.widget').find('.at-action-wrapper > .next');
            at_featured_img_slider.css('visibility', 'visible').slick({
                slidesToShow: slidesToShow,
                slidesToScroll: slidesToScroll,
                autoplay: true,
                adaptiveHeight: true,
                cssEase: 'linear',
                arrows: true,
                prevArrow: prevArrow,
                nextArrow: nextArrow,
                responsive: [
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: ( slidesToShow > 1 ? slidesToShow - 1 : slidesToShow ),
                            slidesToScroll: ( slidesToScroll > 1 ? slidesToScroll - 1 : slidesToScroll )
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: ( slidesToShow > 2 ? slidesToShow - 2 : slidesToShow ),
                            slidesToScroll: ( slidesToScroll > 2 ? slidesToScroll - 2 : slidesToScroll )
                        }
                    }
                ]
            });
        });

        $('.featured-slider').show().slick({
            autoplay: true,
            adaptiveHeight: true,
            autoplaySpeed: 3000,
            speed: 700,
            cssEase: 'linear',
            fade: true,
            prevArrow: '<i class="prev fa fa-angle-left"></i>',
            nextArrow: '<i class="next fa fa-angle-right"></i>'
        });
        /*parallax scolling*/
        $('.site-footer a[href*="\\#"]').click(function(event){
            var at_offset= $.attr(this, 'href');
            var id = at_offset.substring(1, at_offset.length);
            if ( ! document.getElementById( id ) ) {
                return;
            }
            if( $( at_offset ).offset() ){
                $('html, body').animate({
                    scrollTop: $( at_offset ).offset().top-$('.at-navbar').height()
                }, 1000);
                event.preventDefault();
            }

        });
        /*bootstrap sroolpy*/
        $("body").scrollspy({target: ".at-sticky", offset: $('.at-navbar').height()+50 } );

        /*featured slider*/
        $('.acme-gallery').each(function(){
            var $masonry_boxes = $(this);
            var $container = $masonry_boxes.find('.fullwidth-row');
            $container.imagesLoaded( function(){
                $masonry_boxes.fadeIn( 'slow' );
                $container.masonry({
                    itemSelector : '.at-gallery-item'
                });
            });
            /*widget*/
            $masonry_boxes.find('.image-gallery-widget').magnificPopup({
                type: 'image',
                closeBtnInside: false,
                gallery: {
                    enabled: true
                },
                fixedContentPos: false

            });
            $masonry_boxes.find('.single-image-widget').magnificPopup({
                type: 'image',
                closeBtnInside: false,
                fixedContentPos: false
            });
        });

        /*widget slider*/
        $('.acme-widget-carausel').show().slick({
            autoplay: true,
            autoplaySpeed: 3000,
            speed: 700,
            cssEase: 'linear',
            fade: true,
            prevArrow: '<i class="prev fa fa-angle-left"></i>',
            nextArrow: '<i class="next fa fa-angle-right"></i>'
        });

    });

    function stickyMenu() {

        var scrollTop = at_window.scrollTop();
        if ( scrollTop > 200 && window.innerWidth > 600) {
            $('.construction-field-sticky, #nav_menu-2').addClass('at-sticky');
            $('.sm-up-container, #nav_menu-2').show();
        }
        else {
            $('.construction-field-sticky, #nav_menu-2').removeClass('at-sticky');
            $('.sm-up-container').hide();
        }
    }
    //What happen on window scroll
    /*stickyMenu();
    at_window.on("scroll", function (e) {
        setTimeout(function () {
           // stickyMenu();
        }, 300)
    });*/

    /*schedule tab*/
    function schedule_tab() {
        // Runs when the image button is clicked.
        jQuery('body').on('click','.schedule-title a', function(e){
            var $this = $(this),
                schedule_wrap = $this.closest('.at-schedule'),
                schedule_tab_id = $this.data('id'),
                schedule_title = schedule_wrap.find('.schedule-title'),
            schedule_content_wrap = schedule_wrap.find('.schedule-item-content');

            schedule_title.removeClass('active');
            $this.parent().addClass('active');
            schedule_content_wrap.removeClass('active');

            schedule_content_wrap.each(function () {
                if( $(this).data('id') === schedule_tab_id ){
                    $(this).addClass('active')
                }
            });

            e.preventDefault();
        });
    }
    function accordion() {
        // Runs when the image button is clicked.
        jQuery('body').on('click','.accordion-title', function(e){
            var $this = $(this),
                accordion_content  = $this.closest('.accordion-content'),
                accordion_item  = $this.closest('.accordion-item'),
                accordion_details  = accordion_item.find('.accordion-details'),
                accordion_all_items  = accordion_content.find('.accordion-item'),
                accordion_icon  = accordion_content.find('.accordion-icon');

            accordion_icon.each(function () {
                $(this).addClass('fa-plus');
                $(this).removeClass('fa-minus');
            });
            accordion_all_items.each(function () {
                $(this).find('.accordion-details').slideUp();
            });

            if( accordion_details.is(":visible")){
                accordion_details.slideUp();
                $this.find('.accordion-icon').addClass('fa-plus');
                $this.find('.accordion-icon').removeClass('fa-minus');
            }
            else{
                accordion_details.slideDown();
                $this.find('.accordion-icon').addClass('fa-minus');
                $this.find('.accordion-icon').removeClass('fa-plus');
            }
            e.preventDefault();
        });
    }
    function at_site_origin_grid() {
        $('.panel-grid').each(function(){
            var count = $(this).children('.panel-grid-cell').length;
            if( count < 1 ){
                count = $(this).children('.panel-grid').length;
            }
            if( count > 1 ){
                $(this).addClass('at-grid-full-width');
            }
        });
    }
    accordion();
    schedule_tab();
    at_site_origin_grid();

    jQuery("#financia").change(function(){
    	var precio = parseInt(jQuery("#precio").val());
    	var interes = parseFloat((8.99/100)/12);
    	var meses =  parseInt(jQuery("#meses_a_financiar").val());
    	var entrada = parseInt(jQuery("#entrada").val());
    	if(isNaN(entrada)){
			entrada = 0;
		 }

		 if(jQuery("#quierecomision").prop("checked")){
		 	jQuery("#totalcontado").text(entrada);
		 	precio += (precio * 0.03);
		 }else{
		 	jQuery("#totalcontado").text(entrada+(precio*0.03));
		 }
    	var cuota;
    	console.log(precio +" "+ meses +" "+entrada+" "+" "+interes);
    	//var Finance = import('finance.js');

  		var finance = new Finance();
  		cuota = finance.AM(precio, 8.99, meses/12, 0);
    	//cuota = (precio*interes*(Math.pow((1+interes),(meses))))/((Math.pow((1+interes),(meses)))-1);
    	completo=+parseFloat(cuota*meses);

    	jQuery("#ncuotas").text(meses);
    	jQuery("#precio_cuota").text(cuota.toFixed(2));
    	jQuery("#precio_credito").text(completo.toFixed(2));


    });
    jQuery("#financia").ready(function(){jQuery("#financia").change();})

    //Control menu movil
    jQuery(".navbar-toggle").click(function(){
    	if(jQuery("#menu-menu-principal").css("display") == "none"){
    		jQuery("#menu-menu-principal").fadeIn("slow");
    	}else{
    		jQuery("#menu-menu-principal").fadeOut("slow");
    		jQuery(".navbar-toggle").css("background-color","#7a7878");
    	}
    });

    //Animacion al filtrar coches
    jQuery(".items .item").click(function(){
    	setTimeout(function(){
    		jQuery('html,body').animate({
		        scrollTop: jQuery("#cn_content").offset().top
		    }, 'slow');
    	},1000);
    });

    //Control menu
    jQuery("#nav_menu-2").click(function(){

        if(jQuery("#menu-menu-principal").css("display") != "none"){
            jQuery("#menu-menu-principal").fadeOut('slow');
            jQuery("#nav_menu-2").attr("data-before","");
        }else{
            jQuery("#menu-menu-principal").fadeIn('slow');
            jQuery("#nav_menu-2").attr("data-before","");
        }
    });
    //Control buscador home
    jQuery("#searchByCategory").click(function(){

        if(jQuery(".content-categorias").css("display") != "none"){
            jQuery(".content-categorias").fadeOut('slow');
        }else{
            jQuery(".content-categorias").fadeIn('slow');
        }
    });

    jQuery("#searchHome").change(function(){
        jQuery("#ver").val("all");
        jQuery("#filterBy").val(jQuery(this).val());
		autoscout.getHomeProduct();
		jQuery(".home-results").fadeIn('slow');
		jQuery('html,body').animate({
			scrollTop: jQuery(".home-results").offset().top
		}, 'slow');
    });

});

/*animation with wow*/
if(typeof WOW !== 'undefined'){
    eb_wow = new WOW({
            boxClass: 'init-animate'
    }
    );
    eb_wow.init();
}