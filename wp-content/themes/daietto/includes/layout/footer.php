<?php 
  $items = apply_filters('getMenuTree', [], 'footer_menu');
?>

<footer class="footer">
  <div class="container">
    <div class="footer__inner">
      <div class="footer__main">
        <div class="footer__logo">
          <div class="footer__logoInner">
            <img class="footer__logoImage" src="<?= THEME_URL . 'assets/images/logo.png' ?>" alt="<?= get_bloginfo('name'); ?>">
            <h1 class="footer__logoTitle"><?= get_bloginfo('name'); ?></h1>
          </div>
        </div>
        <div class="footer__menu">
          <ul class="footer__menuList">
            <?php foreach ($items as $item): ?>
              <li class="footer__menuItem<?= $item['active'] ? ' footer__menuItem--active' : '' ?>">
                <a class="footer__menuItemLink p" href="<?= $item['url'] ?>" 
                  data-text="<?= $item['name'] ?>">
                  <span class="footer__menuItemIcon icon-arrow-right"></span>
                  <?= $item['name'] ?>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
        <div class="footer__socials">
          
        </div>
      </div>
      <div class="footer__rights">
        <p class="footer__rightsText p">© 2021 Daietto all rights reserved.</p>
      </div>
    </div>
  </div>
</footer>