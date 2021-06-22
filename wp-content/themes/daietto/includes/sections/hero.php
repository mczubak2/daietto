<?php 
  $items = get_field('hero_content');
  $cards = get_field('hero_cards');
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
          <button class="hero__button">
            <?= $items['button'] ?>
          </button>
          <div class="hero__devices">

          </div>
        </div>
      </div>
      <div class="hero__cards">
        <div class="hero__card">
          <div class="hero__cardInner hero__cardInner--circle">
            <img class="hero__cardImage" src="<?= $cards['first']['image']['url'] ?>">
          </div>
          <div class="hero__cloudSmall" data-vue-component>
            <v-cloud-small
              :cloud='<?= json_encode($cards['first']['colud']); ?>'
            ></v-cloud-small>
          </div>
        </div>
        <div class="hero__card">
          <div class="hero__cardInner">
            <img class="hero__cardImage" src="<?= $cards['second']['image']['url'] ?>">
          </div>
          <div class="hero__cloudBig" data-vue-component>
            <v-cloud-big
              :cloud='<?= json_encode($cards['second']['colud']); ?>'
            ></v-cloud-big>
          </div>
        </div>
        <div class="hero__backgroundElement">
          <img class="hero__backgroundElementImage" src="<?= THEME_URL . '/assets/images/background_element.png' ?>">
        </div>
      </div>
    </div>
  </div>
</div>