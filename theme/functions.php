<?php
/**
 * THEME FUNCTIONS
 */

/**
 * getstarted setup.
 * Clean up default WordPress head tag.
 */
function gb_setup() {
  remove_action('wp_head', 'wp_generator');
  remove_action('wp_head', 'wlwmanifest_link');
  remove_action('wp_head', 'rsd_link');
  remove_action('wp_head', 'wp_shortlink_wp_head');
  remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);

  add_filter('the_generator', '__return_false');
  add_filter('show_admin_bar', '__return_false');
  add_filter('wp_trim_excerpt', 'gb_get_custom_excerpt', 10, 2);
  add_theme_support('post-thumbnails');

  remove_action( 'wp_head', 'print_emoji_detection_script', 7);
  remove_action( 'wp_print_styles', 'print_emoji_styles' );

  // Register primary navigation
  register_nav_menus(array(
    'primary-menu' => __('Primary Navigation', 'getstarted-primary'),
    'secondary-menu' => __('Secondary Navigation', 'getstarted-secondary')
  ));
}
add_action('after_setup_theme', 'gb_setup');


/**
 * CUSTOM FUNCTIONS
 */

// Get featured image from post.
if (!function_exists('gb_get_featured_image')) {
  function gb_get_featured_image($post, $size = 'large') {
    if (has_post_thumbnail()) {
      // get the featured image of the post.
      $img = wp_get_attachment_image_src(get_post_thumbnail_id(), $size);
      $image = $img[0];
    } else {
      // check for images attached to the post.
      $attachments = get_children(array(
        'post_type' => 'attachment',
        'order' => 'ASC',
        'orderby' => 'menu_order',
        'post_mime_type' => 'image',
        'post_parent' => $post->ID,
      ));

      $attachments = get_posts($attachments);
      $attached_image = wp_get_attachment_image_src($attachments[0], $size);
      $image = $attached_image[0];

      if ($attached_image == '') {
        // check the post content for an `<img>` element and get the `src` value.
        $content = get_the_content($post);
        preg_match('/<img.+src=[\'"](?P<src>.+)[\'"].*>/i', $content, $img_element);

        $image = $img_element;
      }
    }

    // if $image has been set to something, return it.
    if ($image !== null) {
      return $image;
    }
  }
}

// Filter empty <br> tags from specified shortcodes
if (!function_exists('gb_strip_empty_tags')) {
  function gb_strip_empty_tags($content) {
    // Shortcodes to filter
    $shortcodes = array(
        'row',
        'column'
      );

    foreach ($shortcodes as $shortcode) {
      $array = array (
        '<p>[' . $shortcode => '[' .$shortcode,
        '<p>[/' . $shortcode => '[/' .$shortcode,
        $shortcode . ']</p>' => $shortcode . ']',
        $shortcode . ']<br />' => $shortcode . ']',
        '<br>[' . $shortcode => '[' .$shortcode,
        '<br>[/' . $shortcode => '[/' .$shortcode,
        $shortcode . ']<br>' => $shortcode . ']'
      );

      $content = strtr($content, $array);
    }

    return $content;
  }
}
add_filter('the_content', 'gb_strip_empty_tags');


// Replace shortcodes in $content with another shortcode
if (!function_exists('gb_replace_shortcode')) {
  function gb_replace_shortcode($content, $tag, $newTag) {
    return str_replace($tag, $newTag, $content);

    return str_replace(array(
        "[$tag",
        "[/$tag]"
      ),
      array(
        "[$newTag",
        "[/$newTag]"
      ), $content);
  }
}


/**
 * SHORTCODES
 */

// Row
if (!function_exists('gb_row_shortcode')) {
  function gb_row_shortcode($atts, $content = null) {
    $a = shortcode_atts(array(
      'class' => ''
    ), $atts);

    return '<div class="row ' . $a['class'] . '">' . do_shortcode($content) . '</div>';
  }
}
add_shortcode('row', 'gb_row_shortcode');

// Columns
if (!function_exists('gb_column_shortcode')) {
  function gb_column_shortcode($atts, $content = null) {
    $a = shortcode_atts(array(
      'class' => '',
      'breakpoint' => 'md',
      'span' => 6
    ), $atts);

    if ($a['span'] < 1 || $a['span'] > 12) {
      $a['span'] = 12;
    }

    return '<div class="c-' . $a['breakpoint'] . '-' . $a['span'] . ' '.$a['class'].'">' . do_shortcode($content) . '</div>';
  }
}
add_shortcode('column', 'gb_column_shortcode');
