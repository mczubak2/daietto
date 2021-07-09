<?php 
  $items = get_field('hero_content');
  $cards = get_field('hero_cards');

  $cloudSmall = $cards['first']['colud'];
  $cloudBig   = $cards['second']['colud'];
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

          <div class="cloud cloud--small">
            <div class="cloud__inner">
              <div class="cloud__content">
                <div class="cloud__results">
                  <div class="cloud__title">
                    <?= $cloudSmall['title'] ?>
                  </div>
                  <ul class="cloud__properties">
                    <?php foreach ($cloudSmall['properties'] as $key => $item): ?>
                      <li class="cloud__property">
                        <div class="cloud__value <?= $key == 0 ? 'cloud__value--red' : '' ?>">
                          <?= $item['value'] ?><?= $item['unit'] ? $item['unit'] : '' ?>
                        </div>
                        <div class="cloud__category">
                          <?= $item['category'] ?>
                        </div>
                      </li>
                    <?php endforeach; ?>
                  </ul>
                </div>
              </div>
            </div>
          </div>

        </div>
        <div class="hero__card">
          <div class="hero__cardInner">
            <img class="hero__cardImage" src="<?= $cards['second']['image']['url'] ?>">
          </div>
          <div class="cloud cloud--big">
            <div class="cloud__inner">
              <div class="cloud__content cloud__content--bottomSpacing">
                <div class="cloud__results">
                  <div class="cloud__title"><?= $cloudBig['title'] ?></div>
                  <ul class="cloud__properties">
                    <li class="cloud__property">
                      <div class="cloud__category cloud__category--bottomSpacing">
                        <?= $cloudBig['properties']['lost']['title'] ?>
                      </div>
                      <div class="cloud__value cloud__value--light">
                        <?= $cloudBig['properties']['lost']['value'] ?> <?= $cloudBig['properties']['lost']['unit'] ?>
                      </div>
                    </li>
                    <li class="cloud__property">
                      <div class="cloud__category cloud__category--bottomSpacing">
                        <?= $cloudBig['properties']['level']['title'] ?>
                      </div>
                      <div class="cloud__value cloud__value--light">
                        level <?= $cloudBig['properties']['level']['value'] ?>
                      </div>
                    </li>
                  </ul>
                </div>
                <div class="cloud__circle">
                  <div class="cloud__circleChart" data-pie-chart>
                    <div class="cloud__circleContent">
                      <p class="cloud__circleContentText cloud__circleContentText--value"><?= $cloudBig['properties']['ring']['value'] ?></p>
                      <p class="cloud__circleContentText"><?= $cloudBig['properties']['ring']['unit'] ?></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="cloud__footer">
                <span><?= $cloudBig['footer']['content'] ?></span> 
                <a class="cloud__footerLink" href="<?= $cloudBig['footer']['highlighted']['url'] ?>l">
                  <?= $cloudBig['footer']['highlighted']['title'] ?>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="hero__backgroundElement">
        <img class="hero__backgroundElementImage" src="<?= THEME_URL . '/assets/images/background_element.png' ?>">
      </div>
    </div>
  </div>
</div>