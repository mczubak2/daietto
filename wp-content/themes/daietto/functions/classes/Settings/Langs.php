<?php

  namespace ThemeClasses\Settings;

  class Langs
  {
    public function __construct()
    {
      add_action('after_setup_theme', [$this, 'setTextdomain']);
    }

    public function setTextdomain()
    {
      load_theme_textdomain('daietto', get_template_directory() . '/langs');
    }
  }
