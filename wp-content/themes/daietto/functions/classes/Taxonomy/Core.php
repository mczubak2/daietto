<?php

  namespace ThemeClasses\Taxonomy;

  class Core
  {
    public function __construct()
    {
      new OptionsPage();
      new FooterOptions();
    }
  }
