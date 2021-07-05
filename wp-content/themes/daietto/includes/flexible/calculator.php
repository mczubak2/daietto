<section class="calculator">
  <div class="container">
    <div class="calculator__inner" data-vue-component>
      <v-calculator
        :header-text='<?= json_encode($section['header']) ?>'
        :age-content='<?= json_encode($section['steps']['age']) ?>'
        :gender-content='<?= json_encode($section['steps']['gender']) ?>'
        :height-content='<?= json_encode($section['steps']['height']) ?>'
        :weight-content='<?= json_encode($section['steps']['weight']) ?>'
        :result-content='<?= json_encode($section['steps']['result']) ?>'
      ></v-calculator>
      <div class="calculator__background">
        <img class="calculator__backgroundItem" src="<?= THEME_URL . '/assets/images/background_element.png' ?>">
      </div>
    </div>
  </div>
</section>