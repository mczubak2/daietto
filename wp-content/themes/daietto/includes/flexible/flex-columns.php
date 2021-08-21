<section class="flexColumns">
  <ul class="flexColumns__list">
    <?php foreach ($section['columns'] as $item): ?>
      <li class="flexColumns__item" style="background-image: url('<?= $item['image']['url'] ?>')">
        <h4 class="flexColumns__header">
          <?= $item['header'] ?>
        </h4>
        <div class="flexColumns__content">
          <?= $item['content'] ?>
        </div>
      </li>
    <?php endforeach; ?>
  </ul>
</section>