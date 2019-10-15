<?php get_header(); ?>

<?php if (have_posts()) : ?>
  <section class="post-section">


      <?php while (have_posts()) : the_post();
      $imgUrl = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
      ?>
      <div id="post-<?php the_id(); ?>" class="single-portfolio-item-header" style="background-image: url('<?php echo $imgUrl; ?>');">
        <div class="inner">


        <div class="container h-100 text-center">
          <div class="row h-100">
            <div class="col align-self-center">
              <h1 class="display-2"><?php the_title(); ?></h1>
            </div>

          </div>

        </div>
        </div>
      </div>
      <div class="container mt-3">
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <div class="post">

              <div class="meta small my-4">
                <i class="mdi mdi-calendar" aria-hidden="true"></i> <?php the_date(); ?>
              </div>
              <p><?php the_content(); ?></p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <div class="comments" id="comments">
              <?php if ( comments_open() || get_comments_number() ) {
        				comments_template();
        			} ?>
            </div>
          </div>
        </div>
      </div>
      <?php endwhile; ?>


</section>
<?php else : ?>
<?php endif; ?>

<?php get_footer(); ?>
