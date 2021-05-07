<?php

  namespace ThemeClasses\Api;

  use ThemeClasses\Model\GenericPost as GenericPostModel;

  class GenericPost extends \WP_REST_Controller {

    static protected $postTypeName = 'Generic';
    static protected $postTypeSlug = 'generic';

    public function __construct() {
      $this->version = '1';
      $this->namespace = 'api/v' . $this->version;
      $this->base = '/' . static::$postTypeSlug;

      add_action('rest_api_init', [$this, 'registerRoutes']);
    }

    /**
      * Register the routes for the objects of the controller.
      */
    public function registerRoutes() {
      // register_rest_route($this->namespace, $this->base . '/all', [
      register_rest_route($this->namespace, $this->base, [
        [
          'methods'             => \WP_REST_Server::READABLE,
          'callback'            => [$this, 'getPosts'],
          'permission_callback' => [$this, 'memberPermissionsCheck'],
          'args'                => [
            'date' => [
              'description'       => 'Post date',
              'required'          => false,
              // 'default'           => '',
              'validate_callback' => function($value, $request, $param) {
                return (preg_match(GenericPostModel::REGEX_DATE, $value) > 0);
              },
            ],
            'category' => [
              'description'       => 'Post category',
              'required'          => false,
              // 'default'           => '',
              'validate_callback' => function($value, $request, $param) {
                return (preg_match(GenericPostModel::REGEX_SLUG, $value) > 0);
              },
            ],
            'tags' => [
              'description'       => 'Post tags comma separated list',
              'required'          => false,
              // 'default'           => '',
              'validate_callback' => function($value, $request, $param) {
                return (preg_match(GenericPostModel::REGEX_SLUGS_ARR, $value) > 0);
              },
            ],
            'search' => [
              'description'       => 'Search text',
              'required'          => false,
              // 'default'           => '',
              'validate_callback' => function($value, $request, $param) {
                return (preg_match(GenericPostModel::REGEX_TEXT, $value) > 0);
              },
            ],
            'page' => [
              'description'       => 'Page number',
              'required'          => false,
              // 'default'           => 1,
              'validate_callback' => function($value, $request, $param) {
                return (preg_match(GenericPostModel::REGEX_NUMBER, $value) > 0);
              },
            ],
            'per_page' => [
              'description'       => 'Posts per page',
              'required'          => false,
              // 'default'           => 12,
              'validate_callback' => function($value, $request, $param) {
                return (preg_match(GenericPostModel::REGEX_NUMBER, $value) > 0);
              },
            ],
            'lang' => [
              'description'       => 'Language',
              'required'          => false,
              // 'default'           => 'en',
              'validate_callback' => function($value, $request, $param) {
                return (preg_match(GenericPostModel::REGEX_LANG, $value) > 0);
              },
            ],
          ],
          'show_in_index'       => false,
        ],
      ]);
    }

    /**
      * Get posts details
      *
      * @param WP_REST_Request $request Full data about the request.
      * @return WP_Error|WP_REST_Response
      */
    public function getPosts($request) {
      $params = $this->getRequestParams($request);

      $data = apply_filters('apiGet' . static::$postTypeName . 'Posts', [], $params);
      if (is_array($data)) {
        if ($data['success']) {
          return new \WP_REST_Response($data, 200);
        }
      }

      return new \WP_Error('cant-get-' . static::$postTypeSlug . '-posts', __('Can\'t get ' . static::$postTypeName . ' posts', 'survival'), ['status' => 500]);
    }

    /**
      * Check if a given request has access to member actions
      *
      * @param WP_REST_Request $request Full data about the request.
      * @return WP_Error|bool
      */
    public function memberPermissionsCheck($request) {
      return true;
    }

    /**
      * Get and prepare request params
      *
      * @param WP_REST_Request $request Request object
      * @return WP_Error|object $params
      */
    protected function getRequestParams($request) {
      return $request->get_params();
    }
  }