<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="{base_url('assets/bootstrap/css/bootstrap.min.css')}">
	<link rel="stylesheet" href="{base_url('assets/FortAwesome/css/font-awesome.css')}">
	<style>
		body {
			padding-top: 60px;
			padding-bottom: 40px;
		}
	</style>
	<link rel="stylesheet" href="{base_url('assets/bootstrap/css/bootstrap-responsive.min.css')}">
	<link rel="stylesheet" href="{base_url('assets/bootstrap/css/main.css')}">
	<script src="{base_url('assets/bootstrap/js/vendor/modernizr-2.6.1-respond-1.1.0.min.js')}"></script>
</head>
<body>
	<!--[if lt IE 7]>
	<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
	<![endif]-->
	
	<!-- This code is taken from http://twitter.github.com/bootstrap/examples/hero.html -->
	{include 'header.tpl' scope=parent}
	
	<div class="container">
		<h1>{block name="titre"}main.TITRE{/block}</h1>
		{block name=output_area}
			zone principale
		{/block}
		
		<footer>
			{include 'footer.tpl' scope=parent}
		</footer>
	</div> <!-- /container -->
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="{base_url('assets/bootstrap/js/vendor/jquery-1.8.2.min.js')}"><\/script>')</script>
	<script src="{base_url('assets/bootstrap/js/vendor/bootstrap.min.js')}"></script>
	<script src="{base_url('assets/bootstrap/js/main.js')}"></script>
</body>
</html>