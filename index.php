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
                  <i class="mdi mdi-calendar" aria-hidden="true"></i> <?php the_date(); ?> // <i class="mdi mdi-comment" aria-hidden="true"></i> <?php comments_popup_link('Ingen kommentarer', '1 kommentar', '% kommentarer'); ?>
                </div>
              </div>
              <div class="w-100"></div>
              <div class="col">
                <div class="post-content">
                  <?php the_content(); ?>
                  <a href="<?php the_permalink(); ?>">Læs mere</a>
                </div>

              </div>
            </div>
            <hr>

          <?php endwhile; ?>
          <?php page_navi(); ?>
          </div>

        <?php else : ?>
        <?php endif; ?>
        </div>
      </div>


</section>


<?php get_footer(); ?>
