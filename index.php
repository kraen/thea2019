<?php get_header(); ?>



  <?php if (have_posts()) : ?>
    <section>
    <div class="container">


    <?php while (have_posts()) : the_post(); ?>
      <div class="post" id="post-<?php the_id(); ?>">
        <h1><?php the_title(); ?></h1>
        <p><?php the_content(); ?></p>
      </div>

    <?php endwhile; ?>
    </div>
  </section>
  <?php else : ?>
  <?php endif; ?>

  

<?php get_footer(); ?>
