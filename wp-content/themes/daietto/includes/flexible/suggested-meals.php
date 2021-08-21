<section class="suggestedMeals">
  <div class="container">
    <div class="suggestedMeals__inner">
      <div class="suggestedMeals__meals" data-aos="fade-right" data-aos-anchor-placement="top-center">
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
            <div class="suggestedMeals__mealMacros">
              <?php foreach ($macro as $key => $item): ?>
                <?php if ($key == 'calories'): ?>
                  <div class="suggestedMeals__mealMacro">
                    <p class="suggestedMeals__mealMacroValue suggestedMeals__mealMacroValue--red"><?= $item ?></p>
                    <p class="suggestedMeals__mealMacroName"><?= $section['calories'] ?></p>
                  </div>
                <?php elseif ($key == 'fat'): ?>
                  <div class="suggestedMeals__mealMacro">
                    <p class="suggestedMeals__mealMacroValue"><?= $item . 'g' ?></p>
                    <p class="suggestedMeals__mealMacroName"><?= $section['fat'] ?></p>
                  </div>
                <?php endif; ?>
              <?php endforeach; ?>
            </div>
            <a class="suggestedMeals__mealLink" href="<?= get_permalink($id) ?>">
              <span class="suggestedMeals__mealLinkIcon suggestedMeals__mealLinkIcon--first icon-arrow-right"></span>
              <span class="suggestedMeals__mealLinkIcon suggestedMeals__mealLinkIcon--second icon-arrow-right"></span>
            </a>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="suggestedMeals__content" data-aos="fade-left" data-aos-anchor-placement="top-center">
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