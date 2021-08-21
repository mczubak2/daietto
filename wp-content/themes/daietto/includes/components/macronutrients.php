<?php 
  $content = get_field('meal', get_the_ID());
?>

<div class="macronutrients" 
  data-aos="fade-left"
  data-aos-anchor-placement="top-center">
  <div class="macronutrients__inner">
    <div class="macronutrients__macros">
      <ul class="macronutrients__macrosList">
        <?php foreach ($content['macronutrients'] as $name => $value): ?>
          <li class="macronutrients__macrosItem macronutrients__macrosItem--name">
            <?= $name ?>
          </li>
          <li class="macronutrients__macrosItem macronutrients__macrosItem--value <?= $name == 'calories' ? 'macronutrients__macrosItem--red' : '' ?>">
            <?= $value . ($name != 'calories' ? 'g' : '') ?>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
    <div class="macronutrients__image">
      <img src="<?= $content['image']['url'] ?>" class="macronutrients__imageItem">
    </div>
  </div>
</div>