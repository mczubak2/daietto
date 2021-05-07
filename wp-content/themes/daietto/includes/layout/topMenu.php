<div class="topMenu">
  <ul class="topMenu__list">
    <?php foreach ($args as $item): ?>
      <li class="topMenu__item<?= $item['active'] ? ' topMenu__item--active' : '' ?>">
        <a href="<?= $item['url'] ?>" class="topMenu__itemLink"><?= $item['name'] ?></a>
      </li>
    <?php endforeach; ?>
  </ul>
</div>