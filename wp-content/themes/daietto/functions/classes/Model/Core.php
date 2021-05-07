<?php

  namespace ThemeClasses\Model;

  class Core
  {
    public function __construct()
    {
      new Options();
      new GenericPost();
    }
  }

