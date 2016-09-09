<?php get_header(); ?>

<div class="page error-404">

  <article class="article" role="article">
    <h1>That page can&rsquo;t be found</h1>

    <p>It looks like nothing was found at this location. Maybe try a search?</p>

    <div class="search-form"><?php get_search_form(); ?></div>

    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Return home?</a>
  </article>

</div>

<?php get_footer(); ?>
