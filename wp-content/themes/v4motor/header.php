<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?> <?php bloginfo('description'); ?></title>
<meta name="language" content="es" />
<meta name="revisit-after" content="7 days" />
<meta name="robots" content="index, follow, all" />
<meta name="author" content="Interactiv4" />
<link rel="shortcut icon" href="<?php echo TEMPLATEURI;?>/images/favicon.ico" />
<link rel="stylesheet" type="text/css" href="<?php echo TEMPLATEURI;?>/css/style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo TEMPLATEURI;?>/js/shadowbox-3.0.3/shadowbox.css" />
<!--link rel="stylesheet" type="text/css" href="<?php echo TEMPLATEURI;?>/css/jquery.galleryview-3.0-dev.css" /-->
<link type="text/css" rel="stylesheet" href="<?php echo TEMPLATEDIR;?>/js/galleryview-3.0b3/css/jquery.galleryview-3.0.css" />
<?php wp_head();?>
<script type="text/javascript">var switchTo5x=false;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "a87c4ed8-e84f-4413-a595-8948fbdc5ee7"}); </script>
</head>

<body id="topbg">
<div id="parent">
<div class="header-contener">
<div class="header-contleft"><a href="<?php bloginfo('siteurl'); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php echo TEMPLATEURI;?>/images/logo.jpg" alt="logo" /></a></div>
<div class="logo_txt">Especialistas en comerciales, industriales y monovolúmenes</div>
<div class="header-contright">
<div class="topimg-social"><a href="http://www.volumen4motor.com/feed/" target="blank"><img src="<?php echo TEMPLATEURI;?>/images/rss.jpg" alt="rss"/></a></div>
<div class="topimg-social"><a href="#" target="blank"><img src="<?php echo TEMPLATEURI;?>/images/utube.jpg" alt="tube"/></a></div> 
<div class="topimg-social"><a href="http://twitter.com/volumen4motor" target="blank"><img src="<?php echo TEMPLATEURI;?>/images/twitt.jpg" alt="twitt"/></a></div>
<div class="topimg-social"><a href="https://www.facebook.com/pages/Volumen-4-MOTOR/525694794108993" target="blank"><img src="<?php echo TEMPLATEURI;?>/images/face.jpg" alt="face"/></a></div>
<div class="social-text">Siguenos en...</div>
<div class="phon"><img src="<?php echo TEMPLATEURI;?>/images/phon.jpg" alt="phone" /></div>
<div class="phon-text">948 21 40 94</div>
</div>
<div class="clr"></div>
<div class="topnavbg02">
<div class="topnav">
	<?php wp_nav_menu( array( 'container_class' => 'menu_header','link_before' => '<span>','link_after' => '</span>', 'theme_location' => 'primary' ) ); ?>
<!--ul>
<li><a href="#" class="active"><span>Home</span></a></li>
<li><a href="#"><span>La empresa</span></a></li>
<li><a href="#"><span>Transformacion de vehiculos</span></a></li>
<li><a href="#"><span>catalogo de vehiculos</span></a></li>
<li><a href="#"><span>Noticias</span></a></li>
</ul-->
<div class="clr"></div>
</div>
<!--div class="inptdiv"><input type="text" onfocus="if(this.value=='Buscar en todo el sitio...') this.value='';" onblur="if(this.value=='') this.value='Buscar en todo el sitio...';" value="Buscar en todo el sitio..." alt="Search " class="inpt" name="Search "/><a href="#"><img src="<?php echo TEMPLATEURI;?>/images/search-icon.jpg" alt="btn" class="inpt-btn" /></a></div>
<div class="clr"></div-->
</div>
</div>