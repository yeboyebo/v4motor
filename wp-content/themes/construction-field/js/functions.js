var autoscout={
	content:'',
	cnTmp:'', //Contenido temporal
	init:function(){
		this.content=$('#cn_content');
		console.log("Cargo functions");
	},
	getHomeProduct:function(){
		this.showLoadingOnly();
		var uri=$('#templateUri').val();
		var datos=$('#formListProduct').serialize();

		$.post(uri+'/src/autoscout_fn.php',datos,function(data){
			//autoscout.cnTmp=data;
			autoscout.hideLoading();
			//$('#cn_content').html(data.outOfertas).fadeIn('slow');
			$('#cn_content').fadeOut('fast',function(){
				$('#cn_content').html(data.outOfertas).fadeIn('slow');
				if(jQuery("#searchHome").val() != ""){
					search = jQuery("#searchHome").val().toLowerCase();
					console.log("Busco " + search + " en " + $("#cn_content .product-list").length +"opciones.");
					$("#cn_content .product-list").filter(function() {
						$(this).toggle($(this).find('.product-name-txt2  a').text().toLowerCase().indexOf(search) > -1)
					});
					setTimeout(function(){
						if($("#cn_content .product-list:visible").length == 0){
							$("#message").text('No hay resultados en esta página. Revise el resto de páginas.');
						}
				},500);
				}
			});
			/*$('#gallery').html(data.outDestacado);
			jQuery('#gallery').galleryView({
				panel_width: 548,
				panel_height: 373,
				frame_width: 82,
				frame_height: 49,
				show_filmstrip_nav:false,
				show_infobar:false,
				frame_gap:12,
				panel_scale: 'crop'
			});*/
		},"json");
	},
	getHomeProductTxt:function(){
		//this.showLoadingOnly();
		var uri=$('#templateUri').val();
		var datos=$('#formListProduct').serialize();

		$.post(uri+'/src/autoscout_fn.php',datos,function(data){
			autoscout.cnTmp=data.outOfertas;
			autoscout.hideLoading();
			$('#cn_content').fadeOut('fast',function(){$('#cn_content').html(data.outOfertas).fadeIn('slow')});
			/*$('#gallery').html(data.outDestacado);
			$('#gallery').galleryView({
				panel_width: 548,
				panel_height: 373,
				frame_width: 82,
				frame_height: 49,
				show_filmstrip_nav: false,
				show_infobar: false,
				frame_gap: 12,
				panel_scale: 'crop'
			});*/
		},"json");
	},
	getListProduct:function(){
		var uri=$('#templateUri').val();
		var datos=$('#formListProduct').serialize();
		console.log(datos);
		$.post(uri+'/src/autoscout_fn.php',datos,function(data){
			console.log(data);
			autoscout.cnTmp=(data!='')?data:'En estos momentos, no hay veh&iacute;culos disponibles.';
			autoscout.hideLoading();
		},"json");
	},
	getListProductTxt:function(){
		var uri=$('#templateUri').val();
		var datos=$('#formListProduct').serialize();
		$.post(uri+'/src/autoscout_fn.php',datos,function(data){
			autoscout.cnTmp=(data!='')?data:'En estos momentos, no hay veh&iacute;culos disponibles.';
			autoscout.hideLoading();
		},"html");
	},
	changePag:function(pag){
		var pagTmp=(pag!=undefined)?pag:1;
		$('#formListProduct #pag').val(pagTmp);

		this.content.fadeOut('fast',function(){autoscout.showLoading()});
	},
	searchProduct:function(){
		var pagTmp=(pag!=undefined)?pag:1;
		$('#formListProduct #pag').val(pagTmp);

		this.content.fadeOut('fast',function(){autoscout.showLoading()});
	},
	showLoadingOnly:function(){
		this.content.html('<div id="cn_loading">Cargando...</div>');
		this.content.fadeIn('slow');
	},
	showLoading:function(){
		this.content.html('<div id="cn_loading">Cargando...</div>');
		this.content.fadeIn('slow',function(){autoscout.getListProduct()});
	},
	hideLoading:function(){
		this.content.fadeOut('fast',function(){autoscout.showContent()});

	},
	hideLoadingOnly:function(){
		this.content.fadeOut('fast');
	},
	showContent:function(){
		if(this.cnTmp.outOfertas != undefined){
			$('#cn_content').html(this.cnTmp.outOfertas);
		}else{
			$('#cn_content').html(this.cnTmp);
		}

		$('.catalogo-product-list a, .catalogo-product-list2211 a').each(function(index,value) {
			var urlTmp= $(this).attr('href');
			urlTmp+='&pag='+$('#pag').val()+'&filterBy='+$('#filterBy').val()+'&objPag='+$('#objPag').val();
			$(this).attr('href',urlTmp);
		});
		$('#cn_content').fadeIn('slow');
		if(jQuery("#searchHome").val() != ""){
			search = jQuery("#searchHome").val().toLowerCase();
			console.log("Busco " + search + " en " + $("#cn_content .product-list").length +"opciones.");
			$("#cn_content .product-list").filter(function() {
				$(this).toggle($(this).find('.product-name-txt2  a').text().toLowerCase().indexOf(search) > -1)
			});
			setTimeout(function(){
				if($("#cn_content .product-list:visible").length == 0){
					$("#message").text('No hay resultados en esta página. Revise el resto de páginas.');
				}
		},500);
		}
	},
	showDetalle:function(id){
		alert(id);
	},
	getObjGallery:function(){
		var uri=$('#templateUri').val();
		var datos=$('#formProduct').serialize();

		$.post(uri+'/src/autoscout_fn.php',datos,function(data){
			autoscout.hideLoading();
			$('#gallery').html(data);
			$('#gallery').ready(function(){
		    	imgData.map(function(item,index){
		    		var clase ="";
					if(index == 0) clase = "active";
					var imagen = '<img src="'+item[1]+'">';
					var option = '<li data-target="#image-'+index+'" data-slide-to="'+index+'" class="'+clase+'">'+imagen+'</li>';
					var li = '<li id="image-' + index +'">' + imagen + '</li>';
					$('#product_gallery .carousel-indicators').append(option);
					$('#gallery').append(li);
					//$(this).attr("id","image-"+index);
		    	});

		    	jQuery(".carousel li").addClass("item");
				jQuery(".carousel li").first().addClass("active");

				 /*Control Galeria ficha de producto*/
			    $('#product_gallery .carousel-indicators li').click(function(){
			    	jQuery("#gallery .active").removeClass("active");
			    	jQuery(jQuery(this).data("target")).addClass("active");
			    	jQuery('#product_gallery .carousel-indicators li').removeClass("active");
			    	jQuery(this).addClass("active");
			    });
		    });

		},"html");

	},
	showImg:function(idImg){
		this.imgCurrent=(this.imgCurrent=='')?0:this.imgCurrent;
		$('div#img-'+this.imgCurrent).fadeOut('fast');
		$('div#img-'+idImg).fadeIn('slow');
		this.imgCurrent=idImg;
	}
}


var searcherAutoscout={
	open:0,
	changeType:function(){
		this.open=(open==0)?1:0;
		type=(open==0)?'+':'-';
		$('.search_avance').slideToggle('slow');
		$('.searchType').html(type);
	},
	search:function(){
		$('#form_searcherAutoscout').submit();
	}
}


function movGallery(pos){
	autoscout.showImg(pos);
}


function myFinish() {
	//
};