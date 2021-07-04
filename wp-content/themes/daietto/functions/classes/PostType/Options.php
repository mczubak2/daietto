<?php

  namespace ThemeClasses\PostType;

  class Options
  {
    public function __construct()
    {
      add_action('init', [$this, 'registerPostType']);
    }

    public function registerPostType()
    {
      $labels = [
        'name'                  => __('Options', 'daietto'),
        'singular_name'         => __('Option', 'daietto'),
        'menu_name'             => __('Options', 'daietto'),
        'name_admin_bar'        => __('Option', 'daietto'),
        'add_new'               => __('Add optioin', 'daietto'),
        'add_new_item'          => __('Add new option', 'daietto'),
        'new_item'              => __('New option', 'daietto'),
        'edit_item'             => __('Edit option', 'daietto'),
        'view_item'             => __('View option', 'daietto'),
        'all_items'             => __('All options', 'daietto'),
        'search_items'          => __('Search option', 'daietto'),
        'parent_item_colon'     => __('Parent option:', 'daietto'),
        'not_found'             => __('No options.', 'daietto'),
        'not_found_in_trash'    => __('No options in trash.', 'daietto'),
        'archives'              => __('Options archive', 'daietto'),
        'filter_items_list'     => __('Filter options list', 'daietto'),
        'items_list_navigation' => __('Options list navigation', 'daietto'),
        'items_list'            => __('Options list', 'daietto'),
      ];

      $args = [
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => false,
        'query_var'          => true,
        'rewrite'            => ['slug' => 'options'],
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-admin-generic',
        'supports'           => ['title'],
        'exclude_from_search' => false,
      ];

      register_post_type('options', $args);
    }
  }
