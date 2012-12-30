<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>{block name=titre}Cuisine{/block}</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="{base_url('css/style.css')}">
	{block name=scripts_area}{/block}
</head>
<body>
	<!--[if lt IE 7]>
	<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
	<![endif]-->
	
	<div id="entete" >
		{include 'header.tpl' scope=parent}
	</div>
	
	<div id="navigation" >
		{include 'navigation.tpl' scope=parent}
	</div>
	
	<div id="contenu">
		{block name=output_area}
			zone principale
		{/block}
		
		<footer>
			{include 'footer.tpl' scope=parent}
		</footer>
	</div>
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
</body>
</html>