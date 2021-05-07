<?php

  namespace ThemeClasses\Taxonomy;

  class Stream
  {
    static public $postTypeSlug = 'stream';
    static public $tagSlug      = 'stream-tag';

    public function __construct()
    {
      add_action('init', [$this, 'registerTaxonomyTag']);
    }

    public function registerTaxonomyTag()
    {
      $labels = [
        'name'              => __('Stream tags'),
        'singular_name'     => __('Stream tag'),
        'search_items'      => __('Search stream tag'),
        'all_items'         => __('All stream tags'),
        'parent_item'       => __('Parent stream tag'),
        'parent_item_colon' => __('Parent stream tag:'),
        'edit_item'         => __('Edit stream tag'),
        'update_item'       => __('Update stream tag'),
        'add_new_item'      => __('Add new stream tag'),
        'new_item_name'     => __('New stream tag name'),
        'menu_name'         => __('Stream tags'),
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
