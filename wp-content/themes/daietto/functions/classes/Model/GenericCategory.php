<?php

  namespace ThemeClasses\Model;

  trait GenericCategory
  {
    public function getCategories($items = [])
    {
      $items = get_terms([
        'taxonomy' => static::$postTypeSlug . '-category',
        'hide_empty' => true,
      ]);

      $items = array_map(function($item) {
        return static::getCategoryDetails($item);
      }, $items);

      return $items;
    }

    static public function getPostCategory($postId)
    {
      $taxonomy = static::$postTypeSlug . '-category';
      if (!taxonomy_exists($taxonomy)) return;

      $categoryTerms = get_the_terms($postId, $taxonomy);
      $categoryTerm = $categoryTerms ? $categoryTerms[0] : null;
      $category = ($categoryTerm != null) ? static::getCategoryDetails($categoryTerm) : null;

      return $category;
    }

    static public function getCategoryDetails($categoryTerm)
    {
      if (!is_object($categoryTerm)) return null;

      $termId = $categoryTerm->term_id;
      $taxonomy = $categoryTerm->taxonomy;
      $name = $categoryTerm->name;
      $slug = $categoryTerm->slug;
      $url = get_term_link($termId, $taxonomy);
      $color = get_field('categoryColor', $taxonomy . '_' . $termId);

      return [
        'id'        => $termId,
        'taxonomy'  => $taxonomy,
        'name'      => $name,
        'slug'      => $slug,
        'url'       => $url,
        'color'     => $color,
      ];
    }
  }
