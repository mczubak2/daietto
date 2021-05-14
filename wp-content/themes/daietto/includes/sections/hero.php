<?php 
  $items = get_field('hero_content');
?>
<div class="hero">
  <div class="container">
    <div class="hero__inner">
      <div class="hero__content">
        <div class="hero__line"></div>
        <div class="hero__intro">
          <p class="p p--large">
            <?= $items['intro'] ?>
          </p>
        </div>
        <div class="hero__title">
          <h2 class="h h--large">
            <span class="h--light">
              <?= $items['title']['highlighted'] ?>
            </span>
            <?= $items['title']['content'] ?>
          </h2>
        </div>
        <div class="hero__description">
          <p class="hero__descriptionContent p">
            <?= $items['description'] ?>
          </p>
        </div>
        <div class="hero__buttons">
          <button class="hero__button"><?= $items['button'] ?></button>
          <div class="hero__devices">

          </div>
        </div>
      </div>
    </div>
  </div>
</div>