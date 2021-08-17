<?php
  get_header();
?>
<main class="sections">
  <?php
    get_template_part('includes/sections/pageHeader');
    get_template_part('includes/sections/macronutrients');
    get_template_part('includes/flexible/_core');
  ?>
</main>
<?php get_footer();
