var autoscout={
	content:'',
	cnTmp:'', //Contenido temporal
	init:function(){
		this.content=$('#cn_content');
	},
	getHomeProduct:function(){
		//this.showLoadingOnly();
		var uri=$('#templateUri').val();
		var datos=$('#formListProduct').serialize();
		
		$.post(uri+'/src/autoscout_fn.php',datos,function(data){
			//autoscout.cnTmp=data;
			//autoscout.hideLoading();
			$('.list-pro-box').fadeOut('fast',function(){$('.list-pro-box').html(data.outOfertas).fadeIn('slow')});
			$('#gallery').html(data.outDestacado);
			$('#gallery').galleryView({
				panel_width: 548,
				panel_height: 373,
				frame_width: 82,
				frame_height: 49,
				show_filmstrip_nav:false,
				show_infobar:false,
				frame_gap:12,
				panel_scale: 'crop'
			});
		},"json");
	},
	getHomeProductTxt:function(){
		//this.showLoadingOnly();
		var uri=$('#templateUri').val();
		var datos=$('#formListProduct').serialize();
		
		$.post(uri+'/src/autoscout_fn.php',datos,function(data){
			//autoscout.cnTmp=data;
			//autoscout.hideLoading();
			$('.list-pro-box').fadeOut('fast',function(){$('.list-pro-box').html(data.outOfertas).fadeIn('slow')});
			$('#gallery').html(data.outDestacado);
			$('#gallery').galleryView({
				panel_width: 548,
				panel_height: 373,
				frame_width: 82,
				frame_height: 49,
				show_filmstrip_nav: false,
				show_infobar: false,
				frame_gap: 12,
				panel_scale: 'crop'
			});
		},"json");
	},
	getListProduct:function(){
		var uri=$('#templateUri').val();
		var datos=$('#formListProduct').serialize();
		
		$.post(uri+'/src/autoscout_fn.php',datos,function(data){
			autoscout.cnTmp=(data!='')?data:'En estos momentos, no hay veh&iacute;culos disponibles.';
			autoscout.hideLoading();
		},"html");	
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
		this.content.html(this.cnTmp);
		$('.catalogo-product-list a, .catalogo-product-list2211 a').each(function(index,value) {
			var urlTmp= $(this).attr('href');
			urlTmp+='&pag='+$('#pag').val()+'&filterBy='+$('#filterBy').val()+'&objPag='+$('#objPag').val();
			$(this).attr('href',urlTmp);

		});
		this.content.fadeIn('slow');
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
			$('#gallery').galleryView({
				panel_width: 548,
				panel_height: 373,
				frame_width: 82,
				frame_height: 49,
				show_filmstrip_nav: false,
				show_infobar: false,
				frame_gap: 12,
				panel_scale: 'crop'
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