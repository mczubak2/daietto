<?php

  namespace ThemeClasses\Taxonomy;

  class FooterOptions
  {
    public function __construct()
    {
      add_action('init', [$this, 'registerTaxonomy']);
    }

    public function registerTaxonomy()
    {
      $labels = [
        'name'              => __('Footer options'),
        'singular_name'     => __('Footer option'),
        'search_items'      => __('Search footer options'),
        'all_items'         => __('All footer options'),
        'parent_item'       => __('Parent footer option'),
        'parent_item_colon' => __('Parent footer option:'),
        'edit_item'         => __('Edit footer option'),
        'update_item'       => __('Update footer option'),
        'add_new_item'      => __('Add new footer option'),
        'new_item_name'     => __('New footer option name'),
        'menu_name'         => __('Footer options'),
      ];

      $args = [
        'hierarchical'      => true,
        'labels'            => $labels,
        'public'            => false,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => ['slug' => 'footeroptions'],
      ];

      register_taxonomy('footeroptions', ['options'], $args);
    }
  }
