<?php 
  $content = get_field('meal', get_the_ID());
?>

<div class="nutritions"
  data-aos="fade-right"
  data-aos-anchor-placement="top-center">
  <div class="nutritions__inner">
    <ul class="nutritions__list">
      <?php foreach ($content['main_ingriedients'] as $item): ?>
        <li class="nutritions__item p">
          <span class="nutritions__itemName">
            <?= $item['ingriedient']['name'] ?>
          </span> 
          <span class="nutritions__itemDescription">
            <?= $item['ingriedient']['description'] ?>
          </span>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</div>
