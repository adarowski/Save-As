<?php get_header(); ?>

<section id="posts">

  <?php if (have_posts()) : ?>
  		
    <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
    
    <?php /* If this is a category archive */ if (is_category()) { ?>				
    <h2>Archive for the Category &ldquo;<?php echo single_cat_title(); ?>&rdquo;</h2>
    
    <?php /* If this is a tag archive */ } elseif (is_tag()) { ?>
    <h2>Archive for the Tag &ldquo;<?php echo single_tag_title(); ?>&rdquo;</h2>
        
    <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
    <h2>Archive for <?php the_time('F jS, Y'); ?></h2>
    
    <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
    <h2>Archive for <?php the_time('F, Y'); ?></h2>
    
    <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
    <h2>Archive for <?php the_time('Y'); ?></h2>
    
    <?php /* If this is a search */ } elseif (is_search()) { ?>
    <h2>Search Results</h2>
    
    <?php /* If this is an author archive */ } elseif (is_author()) { ?>
    <h2>Author Archive for <?php wp_title('',true,'right'); ?></h2>
    
    <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
    <h2>Blog Archives</h2>
    
    <?php } ?>
    
    <?php $hit_count = $wp_query->found_posts; // count # of search results ?>
    <p><em>There are <?php echo $hit_count . ' posts'; ?>.</em></p>
    
    <?php while (have_posts()) : the_post(); ?>
    				
      <article id="post-<?php the_ID(); ?>" class="post">
      
        <h3><a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h3>
        <ul class="postmetadata">
          <li class="comments"><?php comments_popup_link('<span>0</span> Comments', '<span>1</span> Comment', '<span>%</span> Comments'); ?></li>
          <li>Posted <time datetime="<?php the_time('Y-m-d') ?>"><?php the_time('F jS, Y') ?></time> by <?php the_author_posts_link(); ?></li>
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