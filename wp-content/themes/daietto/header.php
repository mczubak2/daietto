<?php
  include_once(__DIR__ . DIRECTORY_SEPARATOR . 'includes/core.php');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <?php
    wp_head();
    do_action('wpf_favicons',  '/public/img/favicons/');
  ?>

</head>
<body <?php body_class(); ?>>

<?php get_template_part('includes/layout/header');