<?php

function arphabet_widgets_init() {

	register_sidebar( array(
		'name'          => 'Hero area frontpage',
		'id'            => 'hero_frontpage',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h1 class="text-center display-1 heading-black">',
		'after_title'   => '</h1>',
	) );

}

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

    add_action( 'widgets_init', 'arphabet_widgets_init' );

  }

endif;

add_action( 'after_setup_theme', 'theabech_setup' );

function theabech_load_styles() {

  wp_enqueue_style( 'main', get_template_directory_uri() . '/style.css' );
  wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
  wp_enqueue_style( 'google-font', 'https://fonts.googleapis.com/css?family=Montserrat:400,900&display=swap', false );
	wp_enqueue_style( 'material-icons', 'https://cdn.materialdesignicons.com/4.5.95/css/materialdesignicons.min.css', false);
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

// Numeric Page Navi
function page_navi( \WP_Query $wp_query = null, $echo = true ) {
	if ( null === $wp_query ) {
		global $wp_query;
	}
	$pages = paginate_links( [
			'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
			'format'       => '?paged=%#%',
			'current'      => max( 1, get_query_var( 'paged' ) ),
			'total'        => $wp_query->max_num_pages,
			'type'         => 'array',
			'show_all'     => false,
			'end_size'     => 3,
			'mid_size'     => 1,
			'prev_next'    => true,
			'prev_text'    => __( 'Forrige' ),
			'next_text'    => __( 'Næste' ),
			'add_args'     => false,
			'add_fragment' => ''
		]
	);
	if ( is_array( $pages ) ) {
		//$paged = ( get_query_var( 'paged' ) == 0 ) ? 1 : get_query_var( 'paged' );
		$pagination = '<nav aria-label="Page navigation example"><ul class="pagination justify-content-center">';
		foreach ($pages as $page) {
                        $pagination .= '<li class="page-item' . (strpos($page, 'current') !== false ? ' active' : '') . '"> ' . str_replace('page-numbers', 'page-link', $page) . '</li>';
                }
		$pagination .= '</ul></nav>';
		if ( $echo ) {
			echo $pagination;
		} else {
			return $pagination;
		}
	}
	return null;
}

?>
