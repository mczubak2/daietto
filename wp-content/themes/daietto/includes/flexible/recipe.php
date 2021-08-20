<section class="recipe">
  <div class="container">
    <div class="recipe__inner">
      <div class="recipe__animation" data-animate-on-scroll-container>
        <ul class="recipe__animationList" data-animate-on-scroll-list>
          <?php foreach ($section['animated_items'] as $index => $item): ?>
            <li class="recipe__animationItem" data-animate-on-scroll-element style="left: <?= (50 / count($section['animated_items'])) * $index ?>%;">
              <?= $item['item'] ?>
            </li>
          <?php endforeach; ?>
          <li class="recipe__animationBucket" data-animate-on-scroll-bucket>🥣</li>
        </ul>
      </div>
      <div class="recipe__steps">
        <h4 class="recipe__title h">
          <?= $section['title'] ?> 
          <span class="recipe__prepTime">
            ~ <?= $section['prep_time'] ?> minutes prep
          </span>
        </h4>
        <ul class="recipe__stepsList">
          <?php foreach ($section['steps'] as $item): ?>
            <li class="recipe__stepsItem p">
              <?= $item['step'] ?> 
              <?php if($item['time']): ?>
               <span class="recipe__prepTime">~ <?= $item['time'] ?> minutes prep</span>
              <?php endif; ?>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </div>
</section>