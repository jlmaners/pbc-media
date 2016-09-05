<?php

namespace Roots\Sage\Titles;

/**
 * Tweak Archive Titles to remove labels
 */
add_filter('get_the_archive_title', function($title) {
    if (is_category()) {
        return single_cat_title('', false);
    }
    if (is_tag()) {
        return single_tag_title('', false);
    }
    if (is_author()) {
        return sprintf(__('Author: %s'), '<span class="vcard">' . get_the_author() . '</span>');
    }
    if (is_year()) {
        return get_the_date(_x('Y', 'yearly archives date format'));
    }
    if (is_month()) {
        return get_the_date(_x('F Y', 'monthly archives date format'));
    }
    if (is_day()) {
        return get_the_date(_x('F j, Y', 'daily archives date format'));
    }
    if ( is_post_type_archive() ) {
        $title = sprintf( __( '%s' ), post_type_archive_title( '', false ) );
    }
    return $title;
});

/**
 * Page titles
 */
function title() {
  if (is_home()) {
    if (get_option('page_for_posts', true)) {
      return get_the_title(get_option('page_for_posts', true));
    } else {
      return __('Latest Posts', 'sage');
    }
  } elseif (is_archive()) {
    return get_the_archive_title();
  } elseif (is_search()) {
    return sprintf(__('Search Results for %s', 'sage'), get_search_query());
  } elseif (is_404()) {
    return __('Not Found', 'sage');
  } else {
    return get_the_title();
  }
}
