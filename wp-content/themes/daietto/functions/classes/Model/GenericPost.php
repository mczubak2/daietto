<?php

  namespace ThemeClasses\Model;

  class GenericPost
  {
    use GenericCategory;
    use GenericTag;

    const REGEX_DATE = '/^\d{4}\-\d{2}\-\d{2}$|^$/';
    const REGEX_SLUG = '/^([\w_]+-)*[\w_]+$|^$/';
    const REGEX_SLUGS_ARR = '/^(([\w_]+-)*[\w_]+,)*([\w_]+-)*[\w_]+$|^$/';
    const REGEX_TEXT = '/^.*$/';
    const REGEX_NUMBER = '/^\d+$/';
    const REGEX_LANG = '/^\w{2}$|^$/';

    protected static $postTypeName = 'Generic';
    protected static $postTypeSlug = 'generic';

    static protected $perPage = 12;

    public function __construct()
    {
      add_filter('posts_where', [$this, 'extendPostsWhere'], 10, 2);

      add_filter('get' . static::$postTypeName . 's', [$this, 'getPosts'], 10, 2);
      add_filter('get' . static::$postTypeName . 'sCategories', [$this, 'getCategories'], 10, 2);
      add_filter('get' . static::$postTypeName . 'sTags', [$this, 'getTags'], 10, 2);
      add_filter('get' . static::$postTypeName . 'sDatesFilter', [$this, 'getDatesFilter'], 10, 2);
      add_filter('get' . static::$postTypeName . 'sCategoriesFilter', [$this, 'getCategoriesFilter'], 10, 2);
      add_filter('get' . static::$postTypeName . 'sFeatured', [$this, 'getFeatured'], 10, 2);
      add_filter('get' . static::$postTypeName . 'Details', [$this, 'getDetails'], 10, 2);

      add_filter('apiGet' . static::$postTypeName . 'Posts', [$this, 'apiGetPosts'], 10, 2);
    }

    public function extendPostsWhere($where, $queryObj)
    {
      $queryVars = $queryObj->query_vars;

      if ($queryVars['post_type'] != static::$postTypeSlug) return $where;

      $queryLabel = isset($queryVars['query_label']) ? $queryVars['query_label'] : '';
      if ($queryLabel != 'custom' . static::$postTypeName . 'Query') return $where;

      global $wpdb;

      $search = $queryVars['search_query'];
      if ($search == '') return $where;

      $where .= ' AND ( ';
      $where .= $wpdb->prefix . 'posts.post_title LIKE \'%' . $search . '%\'';
      $where .= ' OR ';
      $where .= $wpdb->prefix . 'posts.post_content LIKE \'%' . $search . '%\'';
      $where .= ' ) ';

      return $where;
    }

    public function getPosts($items = [], $args = [])
    {
      $lang = function_exists('pll_current_language') ? pll_current_language() : null;

      $varArgs = array_merge([
        'per_page' => static::$perPage,
        'offset' => static::getPageOffset($args),
        'tax_query' => static::getTaxQuery($args),
        'date_query' => static::getDateQuery($args),
        'meta_query' => static::getMetaQuery($args),
        'search_query' => static::getSearchQuery($args),
        'lang' => $lang,
      ], (array)$args);

      $queryArgs = [
        'query_label' => 'custom' . static::$postTypeName . 'Query',
        'suppress_filters' => false, // false value allows use posts_where filter
        'post_type' => static::$postTypeSlug,
        'post_status' => 'publish',
        'posts_per_page' => $varArgs['per_page'],
        'offset' => $varArgs['offset'],
        'tax_query' => $varArgs['tax_query'],
        'date_query' => $varArgs['date_query'],
        'meta_query' => $varArgs['meta_query'],
        'search_query' => $varArgs['search_query'],
        'lang' => $varArgs['lang'],
      ];

      $items = get_posts($queryArgs);

      $items = array_map(function($item) {
        return static::getPostDetails($item);
      }, $items);

      if (!isset($args['with_pages'])) return $items;

      return [
        'items' => $items,
        'pages' => max(1, ceil(count(get_posts(array_merge($queryArgs, [
          'posts_per_page' => -1,
          'offset' => 0,
        ]))) / static::$perPage)),
      ];
    }

    static public function getPageOffset($args)
    {
      if (!isset($args['page'])) return 0;

      $perPage = isset($args['per_page']) ? $args['per_page'] : static::$perPage;
      return ($args['page'] - 1) * $perPage;
    }

    static public function getDateQuery($args)
    {
      if (!isset($args['date']) || $args['date'] == '') return null;

      return [
        'after' => $args['date'] . ' 00:00:00',
        'before' => $args['date'] . ' 23:59:59',
        'inclusive' => true,
      ];
    }

    static public function getTaxQuery($args)
    {
      $taxQuery = [
        'relation' => 'AND',
      ];

      static::extendTaxQuery($taxQuery, 'category', $args, 'category');
      static::extendTaxQuery($taxQuery, 'tag', $args, 'tags');

      return $taxQuery;
    }

    static public function extendTaxQuery(&$taxQuery, $taxSlug, $args, $argName)
    {
      if (!isset($args[$argName]) || $args[$argName] == '') return;

      $taxQuery[$taxSlug] = [
        'taxonomy' => static::$postTypeSlug . '-' . $taxSlug,
        'field' => 'slug',
        'terms' => explode(',', $args[$argName]),
        'operator' => 'IN',
      ];
    }

    static public function getMetaQuery($args)
    {
      $metaQuery = [
        'relation' => 'AND',
      ];

      return $metaQuery;
    }

    static public function getSearchQuery($args)
    {
      if (!isset($args['search']) || $args['search'] == '') return '';

      return $args['search'];
    }

    public function getDatesFilter($items = [])
    {
      $dates = [];

      if (count($items) <= 0) {
        $items = $this->getPosts($items, [
          'per_page' => -1,
        ]);
      }

      foreach ($items as $item) {
        $itemTime = $item['time'];
        $value = date_i18n('Y-m-d', $itemTime);
        $label = date_i18n('d.m', $itemTime);

        $dates[$value] = [
          'value' => $value,
          'label' => $label
        ];
      }

      return $dates;
    }

    public function getCategoriesFilter($items = [])
    {
      if (count($items) <= 0) {
        $items = $this->getCategories($items);
      }

      $items = array_map(function($item) {
        return [
          'value' => $item['slug'],
          'label' => $item['name'],
          'color' => $item['color'],
        ];
      }, $items);

      return $items;
    }

    public function getFeatured($items = [])
    {
      $featured = $items;

      $options = apply_filters('getOptions', [], static::$postTypeSlug . '-archive');
      $featured['large'] = array_map(function($item) {
        return static::getPostDetails($item);
      }, $options['featured']['large']);
      $featured['small'] = array_map(function($item) {
        return static::getPostDetails($item);
      }, $options['featured']['small']);

      return $featured;
    }

    public function getDetails($postObj)
    {
      return static::getPostDetails($postObj);
    }

    static public function getPostDetails($postObj)
    {
      if (!is_object($postObj)) return null;

      $postId = $postObj->ID;

      $url     = get_permalink($postId);
      $title   = get_the_title($postId);
      $excerpt = get_the_excerpt($postId);
      $text    = get_field('description', $postId);
      $time    = get_post_time('U', false, $postId);
      $date    = date_i18n('M j, Y G:i', $time);

      $participants = get_field('participants');

      $file = get_field('file', $postId);
      $file = ($file != '') ? $file : null;

      $category = static::getPostCategory($postId);
      $tags = static::getPostTags($postId);

      return [
        'id'           => $postId,
        'url'          => $url,
        'title'        => $title,
        'excerpt'      => $excerpt,
        'text'         => $text,
        'time'         => $time,
        'date'         => $date,
        'file'         => $file,
        'category'     => $category,
        'tags'         => $tags,
        'participants' => $participants,
      ];
    }

    public function apiGetPosts($items = [], $args) {
      $result = $this->getPosts($items, array_merge($args, [
        'with_pages' => true,
      ]));

      return [
        'success' => true,
        'data' => [
          'items' => $result['items'],
          'pages' => $result['pages'],
        ],
      ];
    }
  }
