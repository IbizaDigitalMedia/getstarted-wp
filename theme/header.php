<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?php wp_title('|', true, 'right'); ?></title>

    <?php wp_head(); ?>

    <!-- bower:css -->
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/vendor/reset-css/reset.css" />
    <!-- endbower -->

    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
  </head>

  <body <?php body_class('app'); ?>>
    <div class="container">

      <!-- header -->
      <header class="header row">
        <div class="c-md-3">
          <a href="<?php echo get_option('home'); ?>">
            <img class="header-logo"
                 alt="Header Logo."
                 src="http://placehold.it/200x60" />
          </a>
        </div>

        <div class="c-md-9">
          <!-- top-nav -->
          <nav class="top-nav" role="navigation">
            <?php wp_nav_menu(
              array(
                'theme_location' => 'primary-menu',
                'container' => '',
                'items_wrap' => '<ul class="top-nav-menu">%3$s</ul>'
                )
              ); ?>
          </nav>
          <!-- /top-nav -->
        </div>
      </header>
      <!-- /header -->
