<section class="suggestedMeals">
  <div class="container">
    <div class="suggestedMeals__inner">
      <div class="suggestedMeals__meals">
        <?php foreach ($section['meals'] as $item):

          $id    = $item['meal']->ID;
          $title = $item['meal']->post_title;
          $image = get_field('image', $id);
          $macro = get_field('macronutrients', $id);?>

          <div class="suggestedMeals__meal">
            <div class="suggestedMeals__mealPlate">
              <image class="suggestedMeals__mealPlateImage" src="<?= $image['url'] ?>"></image>
            </div>
            <h3 class="suggestedMeals__mealTitle"><?= $title ?></h3>
            <div class="suggestedMeals__macronutrients">
              <?php foreach ($macro as $key => $item): ?>
                <?php if ($key == 'calories'): ?>
                  <div class="suggestedMeals__macronutrient">
                    <p class="suggestedMeals__macronutrientValue suggestedMeals__macronutrientValue--red"><?= $item ?></p>
                    <p class="suggestedMeals__macronutrientName"><?= $section['calories'] ?></p>
                  </div>
                <?php elseif ($key == 'fat'): ?>
                  <div class="suggestedMeals__macronutrient">
                    <p class="suggestedMeals__macronutrientValue"><?= $item . 'g' ?></p>
                    <p class="suggestedMeals__macronutrientName"><?= $section['fat'] ?></p>
                  </div>
                <?php endif; ?>
              <?php endforeach; ?>
            </div>
            <a class="suggestedMeals__mealButton" href="<?= get_permalink($id) ?>"></a>
          </div>

        <?php endforeach; ?>
      </div>
      <div class="suggestedMeals__content">
        <div class="suggestedMeals__contentInner">
          <div class="suggestedMeals__line"></div>
          <h1 class="suggestedMeals__header h">
            <span class="suggestedMeals__headerHightlighted h--light"><?= $section['header']['highlighted'] ?></span>
            <?= $section['header']['regular'] ?>
          </h1>
          <p class="suggestedMeals__description p"><?= $section['description'] ?></p>
        </div>
      </div>
    </div>
  </div>
</section>