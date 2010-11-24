<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
  <input type="search" placeholder="Search the Blog" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s">
  <input type="submit" id="searchsubmit" value="Search">
</form>
