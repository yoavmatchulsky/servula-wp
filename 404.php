<?php
/**
 * @package WordPress
 * @subpackage Hello_D
 */
 
get_header(); ?>

<div id="leftcolumn">
  <?php get_sidebar(); ?>
</div>

<div id="rightcolumn">

	<div class="post">
		<h2 class="title"><?php _e('Not Found', 'servula'); ?></h2>
		<div class="entry">
			<p><?php _e('Sorry but the page you are looking for cannot be found.', 'servula'); ?></p>
			<p><?php _e("If you're in denial and think this is a conspiracy that cannot possibly be true, please try using my search box below.", 'servula'); ?></p>
			<?php $posts_archive = '<a href="' . get_bloginfo('url') . '">' . __('posts archive', 'servula') . '</a>'; ?>
			<p><?php printf (__('You may also want to try looking through the %s, as you may just find something else to read instead.', 'servula'), $posts_archive); ?></p>
		</div>
	</div>

</div>

<?php get_footer(); ?>
