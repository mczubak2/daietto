<?php 
  $content = get_field('meal', get_the_ID());
?>

<section class="macronutrients">
  <div class="container">
    <div class="macronutrients__inner">
      <div class="macronutrients__case">
        <div class="macronutrients__macros">
          <ul class="macronutrients__macrosList">
            <?php foreach ($content['macronutrients'] as $key => $value): ?>
              <li class="macronutrients__macrosItem">
                <span class="macronutrients__macrosItemName">
                  <?= $key ?>
                </span>
                <span class="macronutrients__macrosItemValue">
                  <?= $value ?>
                </span>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
        <div class="macronutrients__image">
          <img src="<?= $content['image']['url'] ?>" class="macronutrients__imageItem">
        </div>
      </div>
    </div>
  </div>
</section>
