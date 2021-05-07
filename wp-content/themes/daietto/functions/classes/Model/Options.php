<?php

  namespace ThemeClasses\Model;

  class Options
  {
    public function __construct()
    {
      add_filter('getOptions', [$this, 'getOptions'], 10, 2);
    }

    public function getOptions($options = '', $optionsTaxSlug)
    {      
      $optionsId = $this->getOptionsId($optionsTaxSlug);
      $options = get_fields($optionsId);

      return $options;
    }

    private function getOptionsId($optionsTaxSlug)
    {
      $lang = function_exists('pll_current_language') ? pll_current_language() : null;

      $option = get_posts([
        'post_type' => 'options',
        'post_status' => 'publish',
        'posts_per_' => 1,
        'tax_query' => [
          [
            'taxonomy' => 'optionsgroup',
            'field' => 'slug',
            'terms' => $optionsTaxSlug,
          ],
        ],
      ]);
      
      if (count($option) && isset($option[0])) {
        $optionId = $option[0]->ID;
        return (function_exists('pll_get_post') ? pll_get_post($optionId, $lang) : $optionId);
      }

      return null;
    }
  }
