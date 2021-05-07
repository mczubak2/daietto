<?php

  namespace ThemeClasses\Model;

  trait GenericTag
  {
    public function getTags($items = [])
    {
      $items = get_terms([
        'taxonomy' => static::$postTypeSlug . '-tag',
        'hide_empty' => true,
      ]);

      $items = array_map(function($item) {
        return static::getTagDetails($item);
      }, $items);

      return $items;
    }

    static public function getPostTags($postId)
    {
      $taxonomy = static::$postTypeSlug . '-tag';
      if (!taxonomy_exists($taxonomy)) return;

      $tagTerms = get_the_terms($postId, $taxonomy);
      if (!$tagTerms) return;

      $tags = $tagTerms ? array_map(function($tagTerm) {
        return static::getTagDetails($tagTerm);
      }, $tagTerms) : null;

      return $tags;
    }

    static public function getTagDetails($tagTerm)
    {
      if (!is_object($tagTerm)) return null;

      $termId = $tagTerm->term_id;
      $taxonomy = $tagTerm->taxonomy;
      $name = $tagTerm->name;
      $slug = $tagTerm->slug;
      $url = get_term_link($termId, $taxonomy);

      return [
        'id'        => $termId,
        'taxonomy'  => $taxonomy,
        'name'      => $name,
        'slug'      => $slug,
        'url'       => $url,
      ];
    }
  }
