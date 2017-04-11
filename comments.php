<?php // Do not delete these lines
if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) die ('Please do not load this page directly. Thanks!');
if (!empty($post->post_password)) { // if there's a password
	if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
?>

<h2><?php _e('Password Protected'); ?></h2>
<p><?php _e('Enter the password to view comments.'); ?></p>

<?php return;
	}
}

	/* This variable is for alternating comment background */

$oddcomment = 'alt';

?>

<!-- You can start editing here. -->

<?php if ($comments) : ?>
	<h3 id="comments">评论</h3>

<ol class="commentlist">
<?php foreach ($comments as $comment) : ?>
   <?php if ($comment->comment_approved == '1') : ?>
        <li>

        <?php comment_text() ?>
        </li>
        <li>
                <div class="commentmetadata">
                <strong><?php comment_author_link() ?></strong>提交于:<a href="#comment-<?php comment_ID() ?>" title=""><?php comment_date('Y-m-d g:h a') ?></a>
                </div>
	</li>

   <?php endif; ?>
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
<p class="nocomments">Comments are closed.</p>

	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>

		<h3 id="respond">发表评论</h3>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logged in</a> to post a comment.</p>

<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
<?php if ( $user_ID ) : ?>

<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout &raquo;</a></p>

<?php else : ?>

<label for="author"><small>名字：<?php if ($req) echo ""; ?></small></label>
<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="40" tabindex="1" /></p>

<label for="email"><small>电子邮件：<?php if ($req) echo ""; ?></small></label>
<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="40" tabindex="2" /></p>

<label for="url"><small>URL：</small></label>
<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="40" tabindex="3" /></p>

<label for="idcode"><small>验证码为阿拉伯数字三：</small></label>
<p><input type="text" name="idcode" id="idcode" value="" size="40" tabindex="3" /></p>

<?php endif; ?>

<!--<p><small><strong>XHTML:</strong> <?php _e('You can use these tags&#58;'); ?> <?php echo allowed_tags(); ?></small></p>-->

<label for="content"><small>评论内容：</small></label>
<p><textarea name="comment" id="comment" cols="60" rows="10" tabindex="4"></textarea></p>

<p><input name="submit" type="submit" id="submit" tabindex="5" value="提交评论" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
</p>

<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>





