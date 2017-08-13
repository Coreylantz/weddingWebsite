<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php // Load Meta ?>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="theme-color" content="#283141"/>
  <title><?php  wp_title('|', true, 'right'); ?></title>
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  <!-- stylesheets should be enqueued in functions.php -->
  <?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>

<header>
  <div class="container head">
    <h1><span class="c">C</span>orey <span class="mid">&</span> <span class="b">B</span>riana</h1>
    <h3>August 4 2018</h3>
    <h4 class="countdown"></h4>

    <a href="#about"><i class="fa fa-angle-down" aria-hidden="true"></i></a>
  </div> <!-- /.container -->
</header><!--/.header-->

