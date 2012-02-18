<?php
/**
 * @package WordPress
 * @subpackage Hello_D
 */
?>

</div>
<div id="footer">
  <div class="container">
		  <span><a href="<?php echo get_option('home'); ?>/">home</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?php bloginfo('rss2_url'); ?>">entries (rss)</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?php bloginfo('comments_rss2_url'); ?>">comments (rss)</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#header">top &uarr;</a></span>
		
		  &copy;<?php echo date('Y'); ?> <a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a>
		
		  <!-- <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. -->
  </div><!-- end .container -->
</div><!-- end #footer -->
<?php wp_footer(); ?>
</body>
</html>
