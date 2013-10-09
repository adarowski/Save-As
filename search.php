<?php get_header(); ?>

<section id="posts">

  <?php if (have_posts()) : ?>
  
    <h2>Search Results</h2>
    
    <?php $hit_count = $wp_query->found_posts; // count # of search results ?>
    <p><em>Your search for <strong>&ldquo;<?php the_search_query(); ?>&rdquo;</strong> returned <?php echo $hit_count . ' results'; ?>.</em></p>
    		
    <?php while (have_posts()) : the_post(); ?>
    
      <article id="post-<?php the_ID(); ?>" class="post">

        <?php $title = get_the_title(); $keys= explode(" ",$s); $title = preg_replace('/('.implode('|', $keys) .')/iu', '<mark class="search-excerpt">\0</mark>', $title); ?>      
        <h3><a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title(); ?>"><?php echo $title; ?></a></h3>
        <ul class="postmetadata">
          <li class="comments"><?php comments_popup_link('<span>0</span> Comments', '<span>1</span> Comment', '<span>%</span> Comments'); ?></li>
          <li>Posted <?php the_time('F jS, Y') ?> by <?php the_author_posts_link(); ?></li>
          <li>Filed Under: <?php the_category(', ') ?></li>
          <li>Tags: <?php the_tags('',', ','') ?></li>
        </ul>
      
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