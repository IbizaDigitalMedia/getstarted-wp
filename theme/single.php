<?php get_header(); ?>

<div class="page">
  <?php
    while (have_posts()) : the_post();

    $categories = get_the_category_list();
    $tags = get_the_tag_list();
  ?>

  <article class="post" role="article">
    <?php the_title( sprintf( '<h3 class="post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
    <?php if ($categories != ''): ?>
      <div class="post-meta-container"><strong>Posted in:</strong> <?php echo $categories; ?></div>
    <?php endif; ?>
    <?php the_date('d F Y', '<div class="post-date">Published ', '. Posted by ' . get_the_author() . '</div>'); ?>
    <?php the_content(); ?>
    <?php if ($tags != ''): ?>
      <div class="post-meta-container"><strong>Tags:</strong> <?php echo $tags; ?></div>
    <?php endif; ?>
  </article>
  <?php endwhile; ?>
</div>

<?php get_footer(); ?>
