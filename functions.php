<?php
if ( ! function_exists( 'theabech_setup' ) ) :

  function theabech_setup() {

    register_nav_menus(
      array (
        'primary' => 'Primary menu'
      )
    );

    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'automatic-feed-links' );

    add_theme_support( 'title-tag' );

    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
  }

endif;

add_action( 'after_setup_theme', 'theabech_setup' );

function theabech_load_styles() {

  wp_enqueue_style( 'main', get_template_directory_uri() . '/style.css' );
  wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
  wp_enqueue_style( 'font', 'https://fonts.googleapis.com/css?family=Montserrat:400,900&display=swap', false );

}

add_action( 'wp_enqueue_scripts', 'theabech_load_styles' );

function theabech_load_scripts() {
  wp_enqueue_script( 'jquery');
  wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.bundle.min.js');
}

add_action( 'wp_enqueue_scripts', 'theabech_load_scripts' );

function create_portfolio_post_type() {
  register_post_type( 'portfolio',
    array(
      'labels' => array(
        'name' => 'Portfolio',
        'singular_name' => 'Portfolio'
      ),
      'supports' => array(
        'title',
        'editor',
        'thumbnail',
        'author',
        'revisions'
      ),
      'show_in_rest' => true,
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'portfolio'),
    )
  );
}

add_action( 'init', 'create_portfolio_post_type');

?>
