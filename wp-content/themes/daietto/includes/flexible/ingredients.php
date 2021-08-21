<section class="ingredients">
  <div class="container">
    <div class="ingredients__inner"
      data-aos="fade-right"
      data-aos-anchor-placement="top-center">
      <h4 class="ingredients__title h">
        <?= $section['title'] ?>
      </h4>
      <ul class="ingredients__list">
        <?php foreach ($section['list'] as $item): ?>
          <li class="ingredients__item p">
            <label class="ingredients__itemLabel">
              <input type="checkbox" class="ingredients__itemCheckbox">
              <span class="ingredients__itemText">
                <?= $item['element'] ?>
              </span>
            </label>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
  <div class="ingredients__backgroundElement">
    <img class="ingredients__backgroundElementImage" src="<?= THEME_URL . '/assets/images/background_element.png' ?>">
  </div>
</section>