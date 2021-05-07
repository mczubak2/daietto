<?php

  namespace ThemeClasses\Settings;

  class Acf
  {
    public function __construct()
    {
      add_filter('acf/location/rule_match/page_type', [$this, 'matchValueForFrontPage'], 10, 4);
    }

    public function matchValueForFrontPage($match, $rule, $options, $field_group)
    {
      if (
        $rule['param'] != 'page_type' ||
        $rule['operator'] != '==' ||
        $rule['value'] != 'front_page' ||
        (isset($options['post_type']) && $options['post_type'] != 'page')
      ) return $match;

      $pageId = isset($options['post_id']) ? $options['post_id'] : -1;
      $frontPageId = get_option('page_on_front');

      if (function_exists('pll_get_post')) $frontPageId = pll_get_post($frontPageId);

      if ($pageId == $frontPageId) return 1;

      return $match;
    }
  }
