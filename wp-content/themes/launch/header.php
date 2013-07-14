<?php
// Press75.com
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">

<!--
**********************************************************************************************

Designed and Built by Jason Schuller - theSevenFive.com, Press75.com

CSS, XHTML and Design Files are all Copyright 2007-2010 Circa75 Media, LLC

Be inspired, but please don't steal...

**********************************************************************************************
-->

<head profile="http://gmpg.org/xfn/11">
	<!-- page titles -->
	<title><?php if ( is_home() ) { ?><?php bloginfo('name'); ?>&nbsp;<?php bloginfo('description'); ?><?php } ?><?php if ( is_search() ) { ?><?php bloginfo('name'); ?>&nbsp;Search Results<?php } ?><?php if ( is_author() ) { ?><?php bloginfo('name'); ?>&nbsp;Author Archives<?php } ?><?php if ( is_single() ) { ?><?php wp_title(''); ?>&nbsp;<?php bloginfo('name'); ?><?php } ?><?php if ( is_page() ) { ?><?php bloginfo('name'); ?>&nbsp;<?php wp_title(''); ?><?php } ?><?php if ( is_category() ) { ?><?php bloginfo('name'); ?>&nbsp;Archive&nbsp;<?php single_cat_title(); ?><?php } ?><?php if ( is_month() ) { ?><?php bloginfo('name'); ?>&nbsp;Archive&nbsp;<?php the_time('F'); ?><?php } ?><?php if (function_exists('is_tag')) { if ( is_tag() ) { ?><?php bloginfo('name'); ?>&nbsp;Tag Archive&nbsp;<?php  single_tag_title("", true); } } ?></title>
	
	<!-- meta tags -->
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<?php if (is_single() || is_page() ) : if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<meta name="description" content="<?php the_excerpt_rss(); ?>" />
	<?php endwhile; endif; elseif(is_home()) : ?>
	<meta name="description" content="<?php bloginfo('description'); ?>" />
	<?php endif; ?>
	
	<!-- import required theme styles -->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css3.css" type="text/css" media="screen" />
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,900,700italic,900italic' rel='stylesheet' type='text/css'>
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/scripts/custom.js" type="text/javascript"></script>
  	<!-- custom favicon -->

  	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />

	<?php wp_head(); ?>
	
	<!-- custom theme styles if there are any -->
	<link rel='stylesheet' type='text/css' href="<?php bloginfo('url'); ?>/?sf-custom-content=css" />
	
	<script type="text/javascript">
		function doClear(theText) {
			if (theText.value == theText.defaultValue) {
				theText.value = ""
			}
		}
	</script>
</head>

<body>
	<div id="content">
		<div class="lang">
		<ul id="headerMenuSystem"><li class="menu_item"><a href="http://www.scripler.com/" hreflang="en" title="English"><span>English</span></a></li><li class="menu_item"><a href="http://www.scripler.com/dk/" hreflang="dk" title="Dansk"><span>Dansk</span></a></li></ul></div>
		<div class="wrapper-parent">
		<div class="wrapper-child">
		<div id="header">
			<div id="logo">
			<?php if (get_option(THEME_PREFIX . "logo_txt")) : ?>
				<h1><a href="<?php echo get_option('home'); ?>/" title="Home" ><?php echo get_option(THEME_PREFIX . "logo_txt"); ?></a></h1>
			<?php else : ?>
				<img class="logo" src="<?php echo ($logo = get_option(THEME_PREFIX . 'logo_img')) ? $logo : get_bloginfo("template_url") . "/images/logo.png"; ?>" alt="<?php bloginfo('name'); ?>" />
			<?php endif; ?>
			</div> <!-- logo -->
		</div> <!-- header -->
