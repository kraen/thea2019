<?php get_header(); ?>


<section class="post-section">
  <?php if (have_posts()) : ?>

    <div class="container">


    <?php while (have_posts()) : the_post(); ?>
      <div class="row">
        <div class="col post" id="post-<?php the_id(); ?>">
          <h1><?php the_title(); ?></h1>
          <div class="meta small my-2">
            <i class="mdi mdi-calendar" aria-hidden="true"</i> <?php the_date(); ?></i>
          </div>
          <div class="post-content">
            <?php the_content(); ?>
          </div>
        </div>
      </div>


    <?php endwhile; ?>
    </div>

  <?php else : ?>
  <?php endif; ?>
</section>


<?php get_footer(); ?>
