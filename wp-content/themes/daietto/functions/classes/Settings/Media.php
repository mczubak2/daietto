<?php

  namespace ThemeClasses\Settings;

  class Media
  {
    public function __construct()
    {
      add_filter('intermediate_image_sizes', [$this, 'removeDefaultImageSizes']);

      $this->addCustomImageSizes();
    }

    public function removeDefaultImageSizes($sizes)
    {
      $toRemove = [
        'thumbnail',
        'medium',
        'medium_large',
        'large',
        '1536x1536',
        '2048x2048',
      ];

      // foreach ($sizes as $sizeIndex => $size) {
      //   if (in_array($size, $toRemove)) {
      //     unset($sizes[$sizeIndex]);
      //   }
      // }

      $keepSizes = [];
      foreach ($sizes as $sizeIndex => $size) {
        if (!in_array($size, $toRemove)) {
          $keepSizes[] = $size;
        }
      }
      $sizes = $keepSizes;

      return $sizes;
    }

    private function addCustomImageSizes()
    {
      add_image_size('full-hd', 1920, 1080, false);
      add_image_size('laptop', 1366, 800, false);
      add_image_size('square', 600, 600, false);
      add_image_size('thumb', 200, 200, false);
    }
  }
