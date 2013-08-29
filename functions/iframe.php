<?php

function servula_iframe_setup() {
  if ( isset($_REQUEST['iframe'] )) {
    $iframe = $_REQUEST['iframe'];
    if ( $iframe === 'true' or $iframe === '1' or $iframe === '' ) {
      $iframe = true;
    }

    if ( $iframe === true ) {
      define( 'IN_IFRAME', true );
      return;
    }
  }

  define( 'IN_IFRAME', false );
}
add_action('after_setup_theme', 'servula_iframe_setup');

function servula_body_class($classes) {
  if ( IN_IFRAME ) {
    $classes[] = 'iframe';
  }

  return $classes;
}
add_filter('body_class', 'servula_body_class');