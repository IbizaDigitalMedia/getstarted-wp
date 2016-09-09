    <footer class="footer container">
      <div class="constrained row">
        <div class="row">
          <div class="c-md-12">
            <?php wp_nav_menu(
              array(
                'theme_location' => 'secondary-menu',
                'container' => '',
                'items_wrap' => '<ul class="footer-nav">%3$s</ul>'
                )
              ); ?>
          </div>
        </div>
      </div>
    </footer>

    <!-- bower:js -->
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/vendor/jquery/dist/jquery.js"></script>
    <!-- endbower -->

    <script src="<?php echo get_stylesheet_directory_uri(); ?>/scripts/app.js"></script>
    <?php wp_footer(); ?>
  </body>
</html>
