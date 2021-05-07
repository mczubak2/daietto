<?php

  namespace ThemeClasses\Taxonomy;

  class Notification
  {
    use GenericCategory;

    static public $postTypeSlug = 'notification';
    static public $categorySlug = 'notification-category';

    public function __construct()
    {
      add_action('init', [$this, 'registerTaxonomyCategory']);  
      $this->manageCategoryColumns();
    }

    public function registerTaxonomyCategory()
    {
      $labels = [
        'name'              => __('Notification categories'),
        'singular_name'     => __('Notification category'),
        'search_items'      => __('Search notification category'),
        'all_items'         => __('All notification categories'),
        'parent_item'       => __('Parent notification category'),
        'parent_item_colon' => __('Parent notification category:'),
        'edit_item'         => __('Edit notification category'),
        'update_item'       => __('Update notification category'),
        'add_new_item'      => __('Add new notification category'),
        'new_item_name'     => __('New notification category name'),
        'menu_name'         => __('Notification categories'),
      ];

      $args = [
        'hierarchical'      => true,
        'labels'            => $labels,
        'public'            => true,
        'show_ui'           => true,
        'show_in_nav_menus' => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => ['slug' => static::$categorySlug],
      ];

      register_taxonomy(static::$categorySlug, [static::$postTypeSlug], $args);
    }
  }
