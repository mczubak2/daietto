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
          </div>

        <?php endforeach; ?>
      </div>
      <div class="suggestedMeals__content">

      </div>
    </div>
  </div>
</section>