<div class="calculator">
  <div class="container">
    <div class="calculator__inner" data-vue-component>
      <v-calculator
        :header-text='<?= json_encode($section['header']) ?>'
        :gender-content='<?= json_encode($section['steps']['gender']) ?>'
        :age-content='<?= json_encode($section['steps']['age']) ?>'
        :height-content='<?= json_encode($section['steps']['height']) ?>'
        :weight-content='<?= json_encode($section['steps']['weight']) ?>'
        :result-content='<?= json_encode($section['steps']['result']) ?>'
      ></v-calculator>
    </div>
  </div>
</div>