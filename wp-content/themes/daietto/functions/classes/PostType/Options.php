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
        'name'                  => __('Options', 'survival'),
        'singular_name'         => __('Option', 'survival'),
        'menu_name'             => __('Options', 'survival'),
        'name_admin_bar'        => __('Option', 'survival'),
        'add_new'               => __('Add optioin', 'survival'),
        'add_new_item'          => __('Add new option', 'survival'),
        'new_item'              => __('New option', 'survival'),
        'edit_item'             => __('Edit option', 'survival'),
        'view_item'             => __('View option', 'survival'),
        'all_items'             => __('All options', 'survival'),
        'search_items'          => __('Search option', 'survival'),
        'parent_item_colon'     => __('Parent option:', 'survival'),
        'not_found'             => __('No options.', 'survival'),
        'not_found_in_trash'    => __('No options in trash.', 'survival'),
        'archives'              => __('Options archive', 'survival'),
        'filter_items_list'     => __('Filter options list', 'survival'),
        'items_list_navigation' => __('Options list navigation', 'survival'),
        'items_list'            => __('Options list', 'survival'),
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
