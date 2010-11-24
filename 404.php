<?php get_header(); ?>

<section id="posts">

  <section id="no-results">
    <h2>Sorry&hellip; there&rsquo;s nothing here.</h2>
    <p>Perhaps a search would help you find what you&rsquo;re looking for?</p>
    <?php include (TEMPLATEPATH . '/searchform.php'); ?>
  </section>

</section>

<?php get_sidebar(); ?>

<?php get_footer(); ?>