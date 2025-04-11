<?php
/**
 * Plugin Name: Elementor Scheme_Color and Scheme_Typography Class Issue
 **/

namespace Elementor;

add_action(
  'plugins_loaded',
  function() {
    if ( ! class_exists( 'ElementorScheme_Color' ) ) {
      class Scheme_Color extends CoreSchemesColor {}
    }
  }
);
add_action(
  'plugins_loaded',
  function() {
    if ( ! class_exists( 'ElementorScheme_Typography' ) ) {
      class Scheme_Typography extends CoreSchemesTypography {}
    }
  }
);
?>