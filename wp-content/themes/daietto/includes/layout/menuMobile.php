<div class="menuMobile"
  data-mobile-wrapper="menuMobile--active"
  data-mobile-wrapper-active="menuMobile__items--active">
  <?php
    $mobile = apply_filters('parse_menu_mobile', apply_filters('wpf_menu', [], 'main_nav'));
    foreach ($mobile as $index => $menu) :
  ?>
    <ul class="menuMobile__items <?= isset($menuClass) ? $menuClass : '' ?> <?= ($index === 0) ? ' menuMobile__items--margin menuMobile__items--active' : ''; ?>"
      data-mobile-menu="<?= $index; ?>">
      <?php if ($menu['_parent']) : ?>
        <li
          class="menuMobile__item"
          data-mobile-item="<?= $menu['_parent']['_menu']; ?>"
        >
          <a
            href="#"
            class="menuMobile__itemLink menuMobile__itemLink--backMenu"
            data-mobile-link
          >
            <?= __('Go back', 'lang') ?>
          </a>
        </li>
      <?php endif; ?>

      <?php foreach ($menu['_items'] as $item) : ?>
        <li class="menuMobile__item" <?= ($item['_menu']) ? 'data-mobile-item="' . $item['_menu'] . '"' : ''; ?>>
          <?php if ($item['class'] == 'category'): ?>
          <span class="menuMobile__itemCategory">
            <?= $item['title']; ?>
          </span>
          <?php else: ?>
          <a
            href="<?= $item['url']; ?>"
            target="<?= $item['target']; ?>"
            class="menuMobile__itemLink <?= ($item['_menu']) ? 'menuMobile__itemLink--hasSubmenu' : ''; ?>"
            <?= ($item['_menu']) ? 'data-mobile-link' : ''; ?>
          >
            <?= $item['title']; ?>
          </a>
          <?php endif; ?>
        </li>
      <?php endforeach; ?>

      <?php if ($menu['_parent']) : ?>
        <li class="menuMobile__item">
          <a
            href="<?= $menu['_parent']['url']; ?>"
            target="<?= $menu['_parent']['target']; ?>"
            class="menuMobile__itemLink menuMobile__itemLink--accent"
          >
            <?= $menu['_parent']['title']; ?>
          </a>
        </li>
      <?php endif; ?>
    </ul>
  <?php endforeach; ?>
</div>