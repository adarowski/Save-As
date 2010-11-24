<?php get_header(); ?>

<section id="posts">

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  				
    <article id="post-<?php the_ID(); ?>" class="post">
    
      <h2><a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
      <?php the_content(); ?>
    
    </article> <!-- close #post-<?php the_ID(); ?> -->
  
  <?php endwhile; ?>
  
  <?php else : ?>
  
    <section id="no-results">
      <h2>Sorry&hellip; there&rsquo;s nothing here.</h2>
      <p>Perhaps a search would help you find what you&rsquo;re looking for?</p>
      <?php include (TEMPLATEPATH . '/searchform.php'); ?>
    </section>
  
  <?php endif; ?>
  
</section>

<?php get_sidebar(); ?>

<?php get_footer(); ?>