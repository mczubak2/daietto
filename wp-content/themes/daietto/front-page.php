<?php get_header(); ?>

<main class="sections">
  <?php 
    get_template_part('./includes/sections/hero');
    get_template_part('./includes/flexible/_core');
    get_template_part('./includes/flexible/four-columns');
  ?>
</main>

<?php get_footer();
