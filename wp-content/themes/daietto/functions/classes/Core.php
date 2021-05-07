<?php

  namespace ThemeClasses;

  class Core
  {
    public function __construct()
    {
      new Settings\Core();
      new PostType\Core();
      new Taxonomy\Core();
      new Model\Core();
      new Api\Core();
    }
  }

