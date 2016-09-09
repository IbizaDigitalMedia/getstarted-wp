<?php get_header(); ?>

<div class="page constrained search-page">

  <?php if (have_posts()): ?>

    <h1 class="title-header">Results</h1>

    <?php while(have_posts()): the_post(); ?>
      <article class="search-result" role="article">
        <?php the_title( sprintf( '<h4><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h4>'); ?>
      </article>
    <?php endwhile; ?>

  <?php else: ?>

    <h1 class="title-header">Nothing Found</h1>

    <p class="align-center">It looks like nothing was found for this search. Maybe try some different terms?</p>

  <?php endif; ?>

  <div class="search-form"><?php get_search_form(); ?></div>

  <div class="align-center"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Return home?</a></div>

</div>

<?php get_footer(); ?>
