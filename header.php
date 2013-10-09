<!DOCTYPE HTML>
<html>
<head>
  <meta charset="UTF-8">
  <title><?php wp_title('|',true,'right'); ?><?php bloginfo('name'); ?></title>
  <meta name="description" content="INSERT DESCRIPTION HERE">
  <meta name="keywords" content="INSERT KEYWORDS HERE">
  <meta name="author" content="INSERT AUTHOR HERE">
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" media="screen">
  <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>">
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
  <?php wp_head(); ?>
  <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
</head>

<body>

<header>
  <h1><a href="<?php echo get_settings('home'); ?>"><?php bloginfo('name'); ?></a></h1>
  <h2><?php bloginfo('description'); ?></h2>
</header>

<hr />
