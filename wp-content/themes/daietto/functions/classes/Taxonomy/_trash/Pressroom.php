<?php

  namespace ThemeClasses\Taxonomy;

  class Pressroom
  {
    use GenericCategory;

    static public $postTypeSlug = 'pressroom';
    static public $categorySlug = 'pressroom-category';
    static public $tagSlug      = 'pressroom-tag';

    public function __construct()
    {
      add_action('init', [$this, 'registerTaxonomyCategory']);  
      $this->manageCategoryColumns();
    
      add_action('init', [$this, 'registerTaxonomyTag']);
    }

    public function registerTaxonomyCategory()
    {
      $labels = [
        'name'              => __('Pressroom categories'),
        'singular_name'     => __('Pressroom category'),
        'search_items'      => __('Search pressroom category'),
        'all_items'         => __('All pressroom categories'),
        'parent_item'       => __('Parent pressroom category'),
        'parent_item_colon' => __('Parent pressroom category:'),
        'edit_item'         => __('Edit pressroom category'),
        'update_item'       => __('Update pressroom category'),
        'add_new_item'      => __('Add new pressroom category'),
        'new_item_name'     => __('New pressroom category name'),
        'menu_name'         => __('Pressroom categories'),
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

    public function registerTaxonomyTag()
    {
      $labels = [
        'name'              => __('Pressroom tags'),
        'singular_name'     => __('Pressroom tag'),
        'search_items'      => __('Search pressroom tag'),
        'all_items'         => __('All pressroom tags'),
        'parent_item'       => __('Parent pressroom tag'),
        'parent_item_colon' => __('Parent pressroom tag:'),
        'edit_item'         => __('Edit pressroom tag'),
        'update_item'       => __('Update pressroom tag'),
        'add_new_item'      => __('Add new pressroom tag'),
        'new_item_name'     => __('New pressroom tag name'),
        'menu_name'         => __('Pressroom tags'),
      ];

      $args = [
        'hierarchical'      => true,
        'labels'            => $labels,
        'public'            => true,
        'show_ui'           => true,
        'show_in_nav_menus' => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => ['slug' => static::$tagSlug],
      ];

      register_taxonomy(static::$tagSlug, [static::$postTypeSlug], $args);
    }
  }
