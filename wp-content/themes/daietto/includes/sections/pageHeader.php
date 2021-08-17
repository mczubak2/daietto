<?php
  $content = get_field('meal', get_the_ID());
?>

<section class="pageHeader">
  <div class="container">
    <div class="pageHeader__inner">
      <div class="pageHeader__slider">
        <div class="pageHeader__sliderContainer swiper-container">
          <div class="pageHeader__sliderWrapper swiper-wrapper">
            <?php foreach ($content['photos'] as $item) : ?>
              <div class="pageHeader__sliderSlide swiper-slide" style='background-image: url("<?= $item['url'] ?>");'></div>
            <?php endforeach; ?>
          </div>
          <div class="pageHeader__sliderPagination swiper-pagination"></div>
          <div class="pageHeader__sliderButtonPrev swiper-button-prev">
            <div class="pageHeader__sliderButtonIcons">
              <span class="pageHeader__sliderButtonIcon icon-arrow-right"></span>
              <span class="pageHeader__sliderButtonIcon icon-arrow-right"></span>
            </div>
          </div>
          <div class="pageHeader__sliderButtonNext swiper-button-next">
            <div class="pageHeader__sliderButtonIcons">
              <span class="pageHeader__sliderButtonIcon icon-arrow-right"></span>
              <span class="pageHeader__sliderButtonIcon icon-arrow-right"></span>
            </div>
          </div>
          <div class="pageHeader__sliderScrollbar swiper-scrollbar"></div>
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
