<?php

  namespace ThemeClasses\Settings;

  class Menu
  {
    public function __construct()
    {
      add_action('after_setup_theme', [$this, 'registerNavMenus']);
      add_filter('getMenuTree', [$this, 'getMenuTree'], 10, 2);
    }

    public function registerNavMenus()
    {
      register_nav_menus([
        'header_menu' => __('Header Menu', 'daietto'),
      ]);
    }

    public function getMenuTree($menu = [], $location)
    {
      global $post;

      $flatMenu = $menu;
      $flatMenu = $this->getMenuItems($menu, $location);

      $treeMenu = [];
      $itemsRefs = [];

      foreach ($flatMenu as $menuItemObj) {
        $itemId = $menuItemObj->ID;
        $parentId = $menuItemObj->menu_item_parent;

        $itemsRefs[$itemId] = [
          'name'     => $menuItemObj->title,
          'url'      => $menuItemObj->url,
          'target'   => $menuItemObj->target,
          'ID'       => $itemId,
          'parentId' => $parentId,
          'children' => [],
          'active'   => (int)$post->ID === (int)$menuItemObj->object_id,
        ];

        if ($parentId == 0) {
          $treeMenu[] = &$itemsRefs[$itemId];
        } elseif (isset($itemsRefs[$parentId])) {
          $itemsRefs[$parentId]['children'][] = &$itemsRefs[$itemId];
        }
      }

      return $treeMenu;
    }

    private function getMenuItems($menu, $location)
    {
      // Get all locations
      $locations = get_nav_menu_locations();
      if (empty($locations[$location])) die('no menus defined');

      // Get object id by location
      $menuObject = wp_get_nav_menu_object($locations[$location]);

      // Check menu exists
      if (!is_object($menuObject)) return [];

      // Get menu items by menu slug
      $menu = wp_get_nav_menu_items($menuObject->slug);

      // Return menu post objects
      return $menu;
    }
  }
