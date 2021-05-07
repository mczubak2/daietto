<?php

  namespace ThemeClasses\Taxonomy;

  class MediaKit
  {
    use GenericCategory;

    static public $postTypeSlug = 'mediakit';
    static public $categorySlug = 'mediakit-category';
    static public $tagSlug      = 'mediakit-tag';

    public function __construct()
    {
      add_action('init', [$this, 'registerTaxonomyCategory']);   
      $this->manageCategoryColumns();

      add_action('init', [$this, 'registerTaxonomyTag']);
    }

    public function registerTaxonomyCategory()
    {
      $labels = [
        'name'              => __('Media kit categories'),
        'singular_name'     => __('Media kit category'),
        'search_items'      => __('Search media kit category'),
        'all_items'         => __('All media kit categories'),
        'parent_item'       => __('Parent media kit category'),
        'parent_item_colon' => __('Parent media kit category:'),
        'edit_item'         => __('Edit media kit category'),
        'update_item'       => __('Update media kit category'),
        'add_new_item'      => __('Add new media kit category'),
        'new_item_name'     => __('New media kit category name'),
        'menu_name'         => __('Media kit categories'),
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
        'name'              => __('Media kit tags'),
        'singular_name'     => __('Media kit tag'),
        'search_items'      => __('Search media kit tag'),
        'all_items'         => __('All media kit tags'),
        'parent_item'       => __('Parent media kit tag'),
        'parent_item_colon' => __('Parent media kit tag:'),
        'edit_item'         => __('Edit media kit tag'),
        'update_item'       => __('Update media kit tag'),
        'add_new_item'      => __('Add new media kit tag'),
        'new_item_name'     => __('New media kit tag name'),
        'menu_name'         => __('Media kit tags'),
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
