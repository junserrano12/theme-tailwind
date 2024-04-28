<?php

get_header(); ?>

<main class="max-w-4xl mx-auto px-5 flex justify-between">

  <div class="prose max-w-full">
    <?php if (have_posts()) {
      while(have_posts()) {
        the_post(); ?>
        <div>
          <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
          <?php the_content(); ?>
        </div>
      <?php }
    } ?>
  </div>
  </main>

<?php get_footer();