<?php ?>

<div id="leftcolumn">

<ul id="sidebar">
  <li>
  <?php wp_nav_menu( array( 
          'theme_location' => 'sidebar',
          'container' => 'nav',
          'menu_class' => 'sidebar-menu',
          'fallback_cb' => '', ) ); ?>
  </li>

<?php 	/* Widgetized sidebar, if you have the plugin installed. */
	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
	
    <li class="widget">
        <h2>Latest Post</h2>
        <ul><?php wp_get_archives('type=postbypost&limit=10'); ?></ul>
    </li>

	<li class="widget">
		<h2>Categories</h2>
		<ul><?php wp_list_categories('show_count=1&title_li='); ?></ul>
	</li>

    <li id="search" class="widget widget_search">
		<form id="searchform" action="<?php bloginfo('url'); ?>" method="get">
			<div>
				<input id="s" type="text" size="15" name="s" /><br />
				<input type="submit" value="Search" />
			</div>
		</form>
	</li>

	<li class="widget">
		<h2>Tag Clouds</h2>
		<div class="widget_tag_cloud"><?php wp_tag_cloud('smallest=10&largest=18'); ?></div>
	</li>

	<!-- <li class="widget">
		<h2>Sponsors</h2>
		<a href="#"><img src="<?php bloginfo('template_url'); ?>/images/ad_120.png" alt="" /></a>&nbsp;&nbsp;<a href="#"><img src="<?php bloginfo('template_url'); ?>/images/ad_120.png" alt="" /></a>
	</li> -->

	<li class="widget">
		<h2>Archives</h2>
        <ul><?php wp_get_archives('type=monthly'); ?></ul>
	</li>

	<li class="widget">
		<h2>Blogroll</h2>
		<ul><?php wp_list_bookmarks('categorize=0&title_li=&before=<li>&after=</li>&show_images=0&orderby=rand'); ?></ul>
	</li>

<?php endif; ?>
</ul><!-- end #sidebar -->

</div><!-- end #rightcolumn -->
