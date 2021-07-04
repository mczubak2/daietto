<?php

  namespace ThemeClasses\PostType;

  class Meals
  {
    public function __construct()
    {
      add_action('init', [$this, 'registerPostType']);
    }

    public function registerPostType()
    {
      $labels = [
        'name'                  => __('Meals', 'daietto'),
        'singular_name'         => __('Meal', 'daietto'),
        'menu_name'             => __('Meals', 'daietto'),
        'name_admin_bar'        => __('Meal', 'daietto'),
        'add_new'               => __('Add meal', 'daietto'),
        'add_new_item'          => __('Add new meal', 'daietto'),
        'new_item'              => __('New meal', 'daietto'),
        'edit_item'             => __('Edit meal', 'daietto'),
        'view_item'             => __('View meal', 'daietto'),
        'all_items'             => __('All meals', 'daietto'),
        'search_items'          => __('Search meal', 'daietto'),
        'parent_item_colon'     => __('Parent meal:', 'daietto'),
        'not_found'             => __('No meals.', 'daietto'),
        'not_found_in_trash'    => __('No meals in trash.', 'daietto'),
        'archives'              => __('Meals archive', 'daietto'),
        'filter_items_list'     => __('Filter meals list', 'daietto'),
        'items_list_navigation' => __('Meals list navigation', 'daietto'),
        'items_list'            => __('Meals list', 'daietto'),
      ];

      $args = [
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => false,
        'query_var'          => true,
        'rewrite'            => ['slug' => 'meals'],
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-food',
        'supports'           => ['title'],
        'exclude_from_search' => false,
      ];

      register_post_type('meals', $args);
    }
  }
