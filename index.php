<?php get_header(); ?>


<section class="post-section">


    <div class="container">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post(); ?>
            <div class="row my-3 py-3" id="post-<?php the_id(); ?>">
              <div class="col post">
                <h1><?php the_title(); ?></h1>
                <div class="meta small my-4">
                  <i class="mdi mdi-calendar" aria-hidden="true"></i> <?php the_date(); ?>
                </div>
              </div>
              <div class="w-100"></div>
              <div class="col-md-8">
                <div class="post-content">
                  <?php the_content(); ?>
                  <a href="<?php the_permalink(); ?>">Læs mere</a>
                </div>

              </div>
              <?php if (has_post_thumbnail()) : ?>
                <div class="col-md-4 post-thumbnail">
                  <?php the_post_thumbnail( 'large' ); ?>
                </div>
              <?php endif; ?>
            </div>
            <hr>

          <?php endwhile; ?>
          <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
          if (1 == $paged) page_navi(); ?>
          </div>

        <?php else : ?>
        <?php endif; ?>
        </div>
      </div>


</section>


<?php get_footer(); ?>
