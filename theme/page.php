<?php get_header(); ?>

<div class="page">

  <?php while (have_posts()) : the_post(); ?>
  <article class="article" role="article">
    <?php the_title( '<h1 class="title-header">', '</h1>' ); ?>

    <?php the_content(); ?>
  </article>
  <?php endwhile; ?>

</div>

<?php get_footer(); ?>
