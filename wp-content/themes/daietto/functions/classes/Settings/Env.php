<?php

  namespace ThemeClasses\Settings;

  /**
   * Activates usage of vars setup in global /.env file
   *
   * Usage:
   *   $_ENV['APP_ENV']
   *
   * More info: https://github.com/vlucas/phpdotenv
   *
   */
  class Env
  {
    public function __construct()
    {

      $dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/../../../../../../../', '.env');
      $dotenv->load();
    }
  }
