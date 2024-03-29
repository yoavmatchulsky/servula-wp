<?php
/**
 * @package WordPress
 * @subpackage Hello_D
 */

// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	}
?>

<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>
	<h3 id="comments"><?php comments_number(__('No Responses', 'servula'), __('One Response', 'servula'), __('% Responses', 'servula') );?> to &#8220;<?php the_title(); ?>&#8221;</h3>

	<div class="pagers clearfix">
		<p class="alignleft"><?php previous_comments_link() ?></p>
		<p class="alignright"><?php next_comments_link() ?></p>
	</div>

	<ol class="commentlist">
	<?php wp_list_comments(); ?>
	</ol>

	<div class="pagers clearfix">
		<p class="alignleft"><?php previous_comments_link() ?></p>
		<p class="alignright"><?php next_comments_link() ?></p>
	</div>
 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments"><?php _e('Comments are closed.', 'servula'); ?></p>

	<?php endif; ?>
<?php endif; ?>


<?php if ( comments_open() ) : ?>

<div id="respond">

<div class="cancel-comment-reply">
	<small><?php cancel_comment_reply_link(); ?></small>
</div>

<h3><?php comment_form_title( __('Leave a Reply', 'servula'), __('Leave a Reply to %s', 'servula') ); ?></h3>

<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
<p><?php printf( __('You must be <a href="%s">logged in</a> to post a comment.', 'servula'), wp_login_url( get_permalink() )); ?></p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( is_user_logged_in() ) : ?>

<p><?php printf(__('Logged in as <a href="%s/wp-admin/profile.php">%s</a>.', 'servula'), get_option('siteurl'), $user_identity ); ?> <?php printf( __('<a href="%s" title="Log out of this account">Log out &raquo;</a>', 'servula'), wp_logout_url(get_permalink() )); ?></p>

<?php else : ?>

<p><input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="32" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> class="text" />
<label for="author"><?php _e('Name', 'servula'); ?> <?php if ($req) _e('(required)', 'servula'); ?></label></p>

<p><input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="32" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> class="text" />
<label for="email"><?php _e('Email (will not be published)', 'servula'); ?> <?php if ($req) _e("(required)", 'servula'); ?></label></p>

<p><input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="32" tabindex="3" class="text" />
<label for="url"><?php _e('Website', 'servula'); ?></label></p>

<?php endif; ?>

<!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->

<p><textarea name="comment" id="comment" cols="25" rows="10" tabindex="4" class="text"></textarea></p>

<p><input name="submit" type="submit" id="submit" style="width: 150px; padding: 3px;" tabindex="5" value="<?php _e('Submit Comment', 'servula'); ?>" class="button" />
<?php comment_id_fields(); ?>
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>
</div>

<?php endif; // if you delete this the sky will fall on your head ?>
