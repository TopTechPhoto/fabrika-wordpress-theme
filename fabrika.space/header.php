<?php
/**
 * The template for displaying the header
 */
?>
<!DOCTYPE html>
<html>
<head>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<title>Home</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="/wp-content/themes/fabrika.space/css/style.css" />
	<link rel="stylesheet" type="text/css" href="/wp-content/themes/fabrika.space/css/devices.css" />

	<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
	<script src="/wp-content/themes/fabrika.space/js/nightnei.js"></script>

	<script src="https://use.typekit.net/ofq1pbu.js"></script>
	<script>try{Typekit.load({ async: true });}catch(e){}</script>

</head>
<body class="<?php if(is_front_page()) {echo "homePage";}else{echo "innerPage";}; ?>  tk-proxima-nova">

<div id="all">


	<!--****************HEADER****************-->
	<header id="header">
		<div class="innerHeader">
			<div class="mainMenu">
				<span class="sandwich"></span>
				<span class="closeMainMenu"></span>
				<ul>
					<li <?php if(is_front_page()) {echo "class='act'"; }; ?>><a href="/">Главная</a></li>
					<li <?php if(is_page_template( 'allnews.php' )) {echo "class='act'"; }; ?>><a href="/News">Новости</a></li>
					<li <?php if(is_page_template( 'allevents.php' )) {echo "class='act'"; }; ?>><a href="/Events">События</a></li>

					<li <?php if(str_ends_with( $_SERVER['REQUEST_URI'], "/coworking/" )) {echo "class='act'"; }; ?>><a href="/etc/coworking">Коворкинг</a></li>
					<li <?php if(str_ends_with( $_SERVER['REQUEST_URI'], "/confererence/" )) {echo "class='act'"; }; ?>><a href="/etc/confererence/">Конференц-сервис</a></li>
					<li <?php if(str_ends_with( $_SERVER['REQUEST_URI'], "/bar/" )) {echo "class='act'"; }; ?>><a href="/etc/bar/">Бар</a></li>
					<li <?php if(str_ends_with( $_SERVER['REQUEST_URI'], "/contacts/" )) {echo "class='act'"; }; ?>><a href="/etc/contacts/">Контакты</a></li>
				</ul>
			</div>
			<a href="#" class="logo"><img src="/wp-content/themes/fabrika.space/img/logo.png" /></a>
		</div>
	</header><!-- end #header-->

	<?php function str_ends_with($haystack, $needle)
		{
		    return strrpos($haystack, $needle) + strlen($needle) ===
		        strlen($haystack);
		}?>