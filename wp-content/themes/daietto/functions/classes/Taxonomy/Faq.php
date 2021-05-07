<?php

  namespace ThemeClasses\Taxonomy;

  class Faq
  {
    use GenericCategory;

    static public $postTypeSlug = 'faq';
    static public $categorySlug = 'faq-category';
    static public $tagSlug      = 'faq-tag';

    public function __construct()
    {
      add_action('init', [$this, 'registerTaxonomyCategory']);

      // $this->manageCategoryColumns();
      // add_action('init', [$this, 'registerTaxonomyTag']);
    }

    public function registerTaxonomyCategory()
    {
      $labels = [
        'name'              => __('FAQ categories'),
        'singular_name'     => __('FAQ category'),
        'search_items'      => __('Search FAQ category'),
        'all_items'         => __('All FAQ categories'),
        'parent_item'       => __('Parent FAQ category'),
        'parent_item_colon' => __('Parent FAQ category:'),
        'edit_item'         => __('Edit FAQ category'),
        'update_item'       => __('Update FAQ category'),
        'add_new_item'      => __('Add new FAQ category'),
        'new_item_name'     => __('New FAQ category name'),
        'menu_name'         => __('FAQ categories'),
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

    // public function registerTaxonomyTag()
    // {
    //   $labels = [
    //     'name'              => __('FAQ tags'),
    //     'singular_name'     => __('FAQ tag'),
    //     'search_items'      => __('Search FAQ tag'),
    //     'all_items'         => __('All FAQ tags'),
    //     'parent_item'       => __('Parent FAQ tag'),
    //     'parent_item_colon' => __('Parent FAQ tag:'),
    //     'edit_item'         => __('Edit FAQ tag'),
    //     'update_item'       => __('Update FAQ tag'),
    //     'add_new_item'      => __('Add new FAQ tag'),
    //     'new_item_name'     => __('New FAQ tag name'),
    //     'menu_name'         => __('FAQ tags'),
    //   ];

    //   $args = [
    //     'hierarchical'      => true,
    //     'labels'            => $labels,
    //     'public'            => true,
    //     'show_ui'           => true,
    //     'show_in_nav_menus' => true,
    //     'show_admin_column' => true,
    //     'query_var'         => true,
    //     'rewrite'           => ['slug' => static::$tagSlug],
    //   ];

    //   register_taxonomy(static::$tagSlug, [static::$postTypeSlug], $args);
    // }
  }
