<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
  <?php wp_head(); ?>
</head>
<body>

  <nav class="navbar navbar-expand-lg fixed-top">
    <a href="<?php bloginfo('url'); ?>" class="navbar-brand"><?php bloginfo('name'); ?></a>
    <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>
    <div id="navbarSupportedContent" class="collapse navbar-collapse">
      <?php
wp_nav_menu( array(
    'theme_location' => 'primary',
    'container'       => 'div',
    'container_class' => 'collapse navbar-collapse',
    'container_id'    => 'bs-example-navbar-collapse-1',
    'menu_class'      => 'navbar-nav ml-auto',
    'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
    'walker'          => new WP_Bootstrap_Navwalker() ) );
?>

    </div>
  </nav>
