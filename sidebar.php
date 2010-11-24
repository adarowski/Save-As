<aside id="sidebar">
  <p>The sidebar is deliberately kept simple, making it easy to drop in just what you need.</p>
  <h3>Search</h3>
  <?php include (TEMPLATEPATH . '/searchform.php'); ?>
  <h3>Authors</h3>
  <ul>
    <?php wp_list_authors('optioncount=1&show_fullname=1&hide_empty=1'); ?>
  </ul>
  <h3>Topics</h3>
  <ul>
    <?php wp_list_categories('show_count=1&title_li='); ?>
  </ul>
</aside>
