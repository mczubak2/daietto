<?php
  get_header();
  // get_part('header/pageHeader', get_field('header'));
?>
<main class="sections">
  <?php
    // get_template_part('includes/sections/jobs-details');
    get_template_part('includes/flexible/_core');
    get_part('components/gap');
  ?>
</main>
<?php get_footer();
