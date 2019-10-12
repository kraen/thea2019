<?php
/*
* Template Name: Frontpage
*/

?>

<?php get_header(); ?>

<!-- Hero Section-->
<?php if ( is_active_sidebar( 'hero_frontpage' ) ) : ?>
  <section class="hero">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <?php dynamic_sidebar( 'hero_frontpage' ); ?>
      </div>

    </div>
  </div>
</section>
<?php endif; ?>

<?php if (have_posts()) : ?>
  <section class="post-section">
  <div class="container">


  <?php while (have_posts()) : the_post(); ?>
    <div class="post" id="post-<?php the_id(); ?>">
      <p><?php the_content(); ?></p>
    </div>

  <?php endwhile; ?>
  </div>
</section>
<?php else : ?>
<?php endif; ?>

<!-- Portfolio section -->
<?php
// Display Custom Post Type portfolio
$args = array('post_type' => 'portfolio', 'posts_per_page' => 6);
$newQuery = new WP_Query($args);
$post_count = $newQuery->post_count;

$i = 1;

$span = "col-lg-6 col-md-6";

if ($newQuery->have_posts()) :
?>
<section class="portfolio-section">
  <div class="container-fluid p-0">
    <div class="row">
      <?php while ($newQuery->have_posts()) : $newQuery->the_post();

      $imgUrl = wp_get_attachment_url( get_post_thumbnail_id( $newQuery->ID ) );

      ?>
      <?php
      if ($post_count == 6) {
        if ($i == 3 || $i == 4 || $i == 5) {
          $span = "col-lg-4 col-md-4";
        }elseif ($i == 6 ) {
          $span = "col-lg-12 col-md-12";
        }else{
          $span = "col-lg-6 col-md-6";
        }
      }elseif ($post_count == 4) {
        if ($i == 1 || $i == 4) {
          $span = "col-lg-4 col-md-4";
        }else{
          $span = "col-lg-8 col-md-8";
        }
      }else{
        if ($i <= 2) {
          $span = "col-lg-6 col-md-6";
        }
        if ($i == 3 || $i == 4 || $i == 5) {
          $span = "col-lg-4 col-md-4";
        }
      }

      ?>
      <div class="<?php echo $span; ?>">
        <a href="<?php the_permalink(); ?>" class="portfolio-item" style="background-image: url('<?php echo $imgUrl; ?>');"><div class="pi-inner"><h2><?php the_title(); ?></h2></div></a>
      </div>


    <?php $i++; endwhile; wp_reset_postdata(); ?>
    </div>
  </div>
</section>
<?php endif; ?>
<?php get_footer(); ?>
