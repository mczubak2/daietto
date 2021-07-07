<?php 
  $items = apply_filters('getMenuTree', [], 'header_menu');
?>

<div class="menu">
  <ul class="menu__list">
    <?php foreach ($items as $item): ?>
      <li class="menu__item<?= $item['active'] ? ' menu__item--active' : '' ?>">
        <a class="menu__link p" href="<?= $item['url'] ?>" 
          data-text="<?= $item['name'] ?>">
          <?= $item['name'] ?>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>
</div>