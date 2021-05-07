<?php 

  $menuItems = apply_filters('getMenuTree', [], 'header_menu');
  
?>

<header class="header" data-templ="<?= get_page_template_slug() ?>">
  <div class="container">
    <div class="header__inner">
      <div class="header__logo">
        <a href="" class="header__logoLink">
          <img src="<?= THEME_URL . 'assets/images/logo.png' ?>" alt="<?= get_bloginfo('name'); ?>" class="header__logoImage">
          <h1 class="header__logoTitle"><?= get_bloginfo('name'); ?></h1>
        </a>
      </div>
      <?php get_template_part( 'includes/layout/topMenu', null, $menuItems ); ?>
    </div>
  </div>
</header>