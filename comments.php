<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

        if (!empty($post->post_password)) { // if there's a password
            if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
				?>
				
				<p>This post is password protected. Enter the password to view comments.<p>
				
				<?php
				return;
            }
        }

		/* This variable is for alternating comment background */
		$oddcomment = 'alt';
?>

<?php if ($comments) : ?>
<h3 id="comments"><?php comments_number('No Comments', 'One Comment', '% Comments' );?></h3>

<ol class="commentlist">

<?php foreach ($comments as $comment) : ?>
<li class="<?php
if (1 == $comment->user_id)
$oddcomment = "comment-me";
echo $oddcomment;
?>" id="comment-<?php comment_ID() ?>">
<?php if(function_exists('get_avatar')) { echo get_avatar($comment, '50'); } ?> 
On <?php comment_date('F jS, Y') ?> at <?php comment_time() ?> <cite><?php comment_author_link() ?></cite> said:
<?php if ($comment->comment_approved == '0') : ?><span class="awaitingmoderation"><em>Your comment is awaiting moderation.</em></span><?php endif; ?>
<?php comment_text() ?>
</li>
<?php /* Changes every other comment to a different class */	
	if ('alt' == $oddcomment) $oddcomment = '';
	else $oddcomment = 'alt';
?>
<?php endforeach; /* end for each comment */ ?>

</ol>

 <?php else : // this is displayed if there are no comments so far ?>

  <?php if ('open' == $post->comment_status) : ?> 
		<!-- If comments are open, but there are no comments. -->
		
	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p>Comments are closed.</p>
		
	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>


<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logged in</a> to post a comment.</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<fieldset>
  <legend>Leave a Comment</legend>
</fieldset>

<?php if ( $user_ID ) : ?>

<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout &raquo;</a></p>

<?php else : ?>

<fieldset>
  <label for="author">Your name <?php if ($req) echo "(required)"; ?></label>
  <input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" placeholder="Your name <?php if ($req) echo "(required)"; ?>" tabindex="1" />
</fieldset>

<fieldset>
  <label for="email">Mail (<?php if ($req) echo "required, but "; ?>will not be published)</label>
  <input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" placeholder="Mail (<?php if ($req) echo "required, but "; ?>will not be published)" tabindex="2" />
</fieldset>

<fieldset>
  <label for="url">Website (optional)</label>
  <input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" placeholder="Website (optional)" tabindex="3" />
</fieldset>

<?php endif; ?>

<fieldset>
  <label for "comment">Your comment</label>
  <textarea name="comment" id="comment" rows="10" tabindex="4"></textarea>
</fieldset>

<fieldset>
  <input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" />
  <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
</fieldset>

<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>

