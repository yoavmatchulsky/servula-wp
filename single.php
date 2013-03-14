<?php
/**
 * @package WordPress
 * @subpackage Hello_D
 */
 
get_header(); ?>

<div id="leftcolumn">

<?php if (have_posts()) : ?>

	<?php while (have_posts()) : the_post(); ?>
	<div class="post" id="post-<?php the_ID(); ?>">
		<h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

		<div class="entry">
			<?php the_content(); ?>
		</div><!-- end .entry -->

		<?php wp_link_pages(); ?>

		<div class="postdata">Posted in <?php the_category(', ') ?> by <?php the_author() ?> at <?php the_time('F jS, Y') ?>. <?php edit_post_link('Edit', '/ ', ''); ?><br /><?php the_tags('Tags: ', ', ', ' '); ?></div>
	</div><!-- end .post -->

	<?php
	if (function_exists('wp23_related_posts')) {
		echo '<div class="post" id="related">';
		wp23_related_posts();
		echo '</div>';
	}
	?>
	<div class="post" id="commentArea"><?php comments_template(); ?></div>

	<?php endwhile; ?>

	<?php else : ?>
	<div class="post">
		<div class="title"><h2><?php _e('Not Found', 'servula'); ?></h2></div>
		<p><?php _e("Sorry, but you are looking for something that isn't here.", 'servula'); ?></p>
	</div>

<?php endif; ?>
</div><!-- end #leftcolumn -->

<div id="rightcolumn">
  <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
