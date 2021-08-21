<section class="flexColumns">
  <ul class="flexColumns__list">
    <?php foreach ($section['columns'] as $item): ?>
      <li 
        class="flexColumns__item" 
        style="background-image: url('<?= $item['image']['url'] ?>')"
      >
        <div class="flexColumns__header">
          <span class="flexColumns__headerLine"></span>
          <h4 class="flexColumns__headerTitle">
            <?= $item['header'] ?>
          </h4>
        </div>
        <div 
          class="flexColumns__content" 
          style="width: <?= (100 / (count($section['columns']) + 1)) * 2 ?>vw"
        >
          <?= $item['content'] ?>
        </div>
      </li>
    <?php endforeach; ?>
  </ul>
</section>
