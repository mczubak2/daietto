<?php

  namespace ThemeClasses\Taxonomy;

  trait GenericCategory
  {
    public function manageCategoryColumns(){
      add_filter('manage_edit-' . static::$categorySlug . '_columns' , [$this, 'setColumnsCategory']);
      add_action('manage_' . static::$categorySlug . '_custom_column' , [$this, 'fillColumnsCategory'], 10, 3);
    }

    public function setColumnsCategory($columns) {
      $columns = array_merge(array_slice($columns, 0, 2, true), [
        'color' => __('Color', 'survival'),
      ], array_slice($columns, 2, NULL, true));

      return $columns;
    }

    public function fillColumnsCategory($value, $column, $tax_id) {
      switch ($column) {

        case 'color' :
          $color = get_field('categoryColor', static::$categorySlug . '_' . $tax_id);
          $style = '';
          $style .= 'display: inline-block;';
          $style .= 'width: 16px;';
          $style .= 'height: 16px;';
          $style .= 'background-color: ' . $color . ';';
          $style .= 'margin: -2px 0;';
          $style .= 'margin-right: 10px;';
          $value = '';
          $value .= '<span style="' . $style . '"></span>';
          $value .= '<span>' . $color . '</span>';
          break;

        default:
          break;
      }

      return $value;
    }
  }
