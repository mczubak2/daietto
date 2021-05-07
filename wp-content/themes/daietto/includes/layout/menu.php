<div class="menu">
  <ul class="menu__list">
    <?php foreach ($args as $item): ?>
      <li class="menu__item<?= $item['active'] ? ' menu__item--active' : '' ?>">
        <a href="<?= $item['url'] ?>" class="menu__link"><?= $item['name'] ?></a>
      </li>
    <?php endforeach; ?>
  </ul>
</div>