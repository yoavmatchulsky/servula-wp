<?php
/**
 * @package WordPress
 * @subpackage Hello_D
 */
global $servula;

if (is_single()) {
  $servula['body_class'] = 'post-single';
}

get_header(); ?>

<div id="leftcolumn">
  <?php if (function_exists('dynamic_sidebar')) dynamic_sidebar( 'blog-posts-sidebar' ); ?>
</div>

<div id="rightcolumn">
<?php if (have_posts()) : ?>

	<?php while (have_posts()) : the_post(); ?>
	<div class="post" id="post-<?php the_ID(); ?>">
    <h1><?php the_title(); ?></h1>
    <div class="postdata">
      <?php _e('By:', 'servula'); ?> <a rel="author" href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php the_author(); ?></a> | <?php the_time('F jS, Y'); ?>
      
      <ul class="social-links">
        <li><iframe src="http://www.facebook.com/plugins/like.php?href=<?php the_permalink() ?>&locale=en_US&amp;layout=button_count&amp;show_faces=false&amp;width=90&amp;action=like&amp;font=arial&amp;colorscheme=light&amp;height=20" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:90px; height:21px;" allowTransparency="true"></iframe>
        </li>

        <li><a href="http://twitter.com/share" class="twitter-share-button" data-lang="en" data-count="horizontal" data-via="askpavel">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
        </li>

        <li><g:plusone size="medium"></g:plusone></li>

        <li>
          <script src="//platform.linkedin.com/in.js" type="text/javascript"></script>
          <script type="IN/Share" data-counter="right"></script>
        </li>
      </ul>
    </div>
    
		<div class="entry">
			<?php the_content(); ?>
		</div><!-- end .entry -->

		<?php wp_link_pages(); ?>

    <div class="bottom_postdata postdata">
      <?php _e('Published in:', 'servula'); ?> <?php the_category(', '); ?><br />
      <?php the_tags( __('Tags:'), ', ', '<br />' ); ?>
      
      <ul class="social-links">
        <li><iframe src="http://www.facebook.com/plugins/like.php?href=<?php the_permalink() ?>&locale=en_US&amp;layout=button_count&amp;show_faces=false&amp;width=90&amp;action=like&amp;font=arial&amp;colorscheme=light&amp;height=20" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:90px; height:21px;" allowTransparency="true"></iframe>
        </li>

        <li><a href="http://twitter.com/share" class="twitter-share-button" data-lang="en" data-count="horizontal" data-via="askpavel">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
        </li>

        <li><g:plusone size="medium"></g:plusone></li>

        <li>
          <script src="//platform.linkedin.com/in.js" type="text/javascript"></script>
          <script type="IN/Share" data-counter="right"></script>
        </li>
      </ul>
    </div>

	</div><!-- end .post -->

	<?php
	if (function_exists('wp23_related_posts')) {
		echo '<div class="post" id="related">';
		wp23_related_posts();
		echo '</div>';
	}
	?>
  <div class="post-credentials">
    <div class="author-details">
      <?php if (function_exists('userphoto_the_author_thumbnail')) { userphoto_the_author_thumbnail(); } ?>
      <a rel="author" href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php the_author_meta('display_name'); ?></a>
      <?php my_googleplus_image_link(); ?>
      <p><?php the_author_description(); ?></p>
    </div>
  </div>

  <div class="post" id="commentArea"><?php comments_template(); ?></div>

	<?php endwhile; ?>

	<?php else : ?>
	<div class="post">
		<div class="title"><h2><?php _e('Not Found', 'servula'); ?></h2></div>
		<p><?php _e("Sorry, but you are looking for something that isn't here.", 'servula'); ?></p>
	</div>

<?php endif; ?>
</div><!-- end #rightcolumn -->

<?php get_footer(); ?>
