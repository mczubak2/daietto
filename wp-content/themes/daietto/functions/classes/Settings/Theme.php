<?php

  namespace ThemeClasses\Settings;

  class Theme
  {
    public function __construct()
    {
      add_action('wp_loaded', [$this, 'registerScripts']);
      add_action('wp_enqueue_scripts', [$this, 'enqueueScripts']);
      add_action('wp_enqueue_scripts', [$this, 'namespaceEnqueueScripts']);
    }

    public function registerScripts()
    {
      $distPath = get_template_directory_uri() . '/public/build/';

      wp_register_style('frontend_styles',   $distPath . 'css/styles.css', [], '1.0.5', false);
      wp_register_script('frontend_scripts', $distPath . 'js/scripts.js', [], '1.0.5', false);
    }

    public function enqueueScripts()
    {
      wp_enqueue_style('frontend_styles');
      wp_enqueue_script('frontend_scripts');
    }

    public function namespaceEnqueueScripts()
    {
      wp_enqueue_script('namespace-scripts', $distPath . 'js/namespace-scripts.js', array(), '1.0.0', true);

      wp_localize_script('namespace-scripts', 'mynamespace', array(
        'rootapiurl' => esc_url_raw(rest_url()),
        'nonce' => wp_create_nonce('wp_rest')
      ));
    }
  }
