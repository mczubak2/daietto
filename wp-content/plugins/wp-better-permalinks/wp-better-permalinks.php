<?php 

  /*
    Plugin Name: WP Better Permalinks
    Description: Set custom friendly permalinks structure: Custom Post Type > Taxonomy > Post and Custom Post Type > Taxonomy instead of default WordPress structure.
    Version: 4.1.0
    Author: Mateusz Gbiorczyk
    Author URI: https://gbiorczyk.pl/
  */

  define('WBP_VERSION', '4.1.0');
  define('WBP_FILE',    __FILE__);
  define('WBP_NAME',    plugin_basename(__FILE__));
  define('WBP_PATH',    plugin_dir_path(__FILE__));
  define('WBP_URL',     plugin_dir_url(__FILE__));

  require_once __DIR__ . '/vendor/autoload.php';
  new WpBetterPermalinks\WpBetterPermalinks();