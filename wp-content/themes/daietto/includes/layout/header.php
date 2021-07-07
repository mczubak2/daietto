<header class="header" data-templ="<?= get_page_template_slug() ?>">
  <div class="container">
    <div class="header__inner">
      <div class="header__logo">
        <a href="" class="header__link">
          <img src="<?= THEME_URL . 'assets/images/logo.png' ?>" alt="<?= get_bloginfo('name'); ?>" class="header__image">
          <h1 class="header__title"><?= get_bloginfo('name'); ?></h1>
        </a>
      </div>
      <div class="header__menu">
        <?php get_template_part( 'includes/layout/menu' ); ?>
      </div>
    </div>
  </div>
</header>