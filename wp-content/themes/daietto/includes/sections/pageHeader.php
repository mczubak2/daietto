<?php 
  $content = get_field('meal', the_ID());
?>

<section class="pageHeader">
  <div class="container">
    <div class="pageHeader__inner">
      <div class="pageHeader__slider">
        <div class="swiper-container">
          <div class="swiper-wrapper">
            <?php foreach ($content['photos'] as $item): ?>
              <div class="swiper-slide" style='background-image: url("<?= $item['url'] ?>")'>Slide 1</div>
            <?php endforeach; ?>
          </div>
          <div class="swiper-pagination"></div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
          <div class="swiper-scrollbar"></div>
        </div>
      </div>
      <div class="pageHeader__content">
        <div class="pageHeader__contentInner">
          <h2 class="pageHeader__title h">
            <?= the_title() ?>
          </h2>
          <p class="pageHeader__description p">
            <?= $content['description'] ?>
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<pre> <?php print_r($content); ?> </pre>
