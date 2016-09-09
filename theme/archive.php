<?php
/**
 * The template for displaying archive pages.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 */

  get_header();
?>

<div class="page archive-page">
  <!-- archives -->
  <main class="archives row" role="main">
    <div class="c-md-9">

      <?php if (have_posts()): ?>

        <?php while(have_posts()) : the_post(); ?>
        <?php
          // Get featured image
          $featured_img = gb_get_featured_image(get_the_ID());
        ?>

        <!-- archives-article -->
        <div class="article row">
          <?php the_title( sprintf( '<h3 class="article-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
          <?php the_date('d F Y', '<div class="article-date">', '. Posted by ' . get_the_author() . '</div>'); ?>

          <div class="row">
            <div class="c-md-4">
              <a href="<?php echo esc_url( get_permalink() ); ?>"><img class="article-img" src="<?php echo $featured_img; ?>" /></a>
            </div>

            <div class="c-md-8">
              <div class="article-content"><?php the_excerpt(); ?></div>

              <a class="article-read-more" href="<?php echo esc_url( get_permalink() ); ?>">
                <span>Read More</span>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/hero-arrow-right.svg" class="svg" alt="" />
              </a>
            </div>
          </div>
        </div>
        <!-- /archive-article -->
        <?php endwhile; ?>

        <!-- pagination -->
        <?php
          the_posts_pagination(array(
            'prev_text' => 'Previous',
            'next_text' => 'Next'
          ));
        ?>
        <!-- /pagination -->

      <?php else: ?>
        <div class="page error-404">
          <article class="article" role="article">
            <h1>That article can&rsquo;t be found</h1>
            <p>It looks like nothing was found at this location. Maybe try a search?</p>
            <div class="search-form"><?php get_search_form(); ?></div>
          </article>
        </div>
      <?php endif; ?>

    </div>

    <!-- archive-sidebar -->
    <div class="archives-sidebar c-md-3">
      <?php
        // Get list of all posts in this category
        // limit = 10
        $args = array(
          'posts_per_page' => 20,
          'category_name' => $title
        );
        $posts = get_posts($args);
      ?>
      <h5 class="sidebar-header"><?php echo $title; ?> Archive</h5>

      <?php foreach($posts as $post): ?>
        <?php the_title( sprintf( '<div class="sidebar-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></div>' ); ?>
      <?php endforeach; ?>
    </div>
    <!-- /archives-sidebar -->
  </main>
</div>
<!-- /archives -->

<?php get_footer(); ?>
