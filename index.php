<?php get_header(); ?>

<section id="posts" class="index">

  <?php if (have_posts()) : ?>
  		
    <?php while (have_posts()) : the_post(); ?>
    				
      <article id="post-<?php the_ID(); ?>" class="post">
      
        <h2><a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
        <ul class="postmetadata">
          <li class="comments"><?php comments_popup_link('<span>0</span> Comments', '<span>1</span> Comment', '<span>%</span> Comments'); ?></li>
          <li>Posted <time datetime="<?php the_time('Y-m-d') ?>" pubdate><?php the_time('F jS, Y') ?></time> by <?php the_author_posts_link(); ?></li>
          <li>Filed Under: <?php the_category(', ') ?></li>
          <li>Tags: <?php the_tags('',', ','') ?></li>
        </ul>
        <?php the_content(); ?>
      
      </article> <!-- close #post-<?php the_ID(); ?> -->
    
    <?php endwhile; ?>

    <p class="navigate-posts">
      <span class="older"><?php next_posts_link('&laquo; Older Entries') ?></span> 
      <span class="newer"><?php previous_posts_link('Newer Entries &raquo;') ?></span> 
    </p>
  		
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