<?php

  namespace ThemeClasses\Taxonomy;

  class OptionsPage
  {
    public function __construct()
    {
      add_action('init', [$this, 'registerTaxonomy']);
    }

    public function registerTaxonomy()
    {
      $labels = [
        'name'              => __('Options groups'),
        'singular_name'     => __('Options group'),
        'search_items'      => __('Search options group'),
        'all_items'         => __('All options groups'),
        'parent_item'       => __('Parent options group'),
        'parent_item_colon' => __('Parent options group:'),
        'edit_item'         => __('Edit options group'),
        'update_item'       => __('Update options group'),
        'add_new_item'      => __('Add new options group'),
        'new_item_name'     => __('New options group name'),
        'menu_name'         => __('Options groups'),
      ];

      $args = [
        'hierarchical'      => true,
        'labels'            => $labels,
        'public'            => false,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => ['slug' => 'optionsgroup'],
      ];

      register_taxonomy('optionsgroup', ['optionspage'], $args);
    }
  }
