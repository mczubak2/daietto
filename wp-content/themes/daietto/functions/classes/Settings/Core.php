<?php

  namespace ThemeClasses\Settings;

  class Core
  {

    public function __construct()
    {
      // new Env(); // getting vars from global .env file
      new Admin();
      new Langs();
      new Menu();
      new Theme();
      new Media();
      new Acf();
    }
  }
