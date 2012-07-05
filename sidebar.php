<ul id="sidebar">

<?php 	/* Widgetized sidebar, if you have the plugin installed. */
  if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>

  <li>
  <?php print wp_nav_menu( array( 
          'theme_location' => 'sidebar',
          'container' => 'nav',
          'menu_class' => 'sidebar-menu',
          'fallback_cb' => '', ) ); ?>
  </li>
  
<?php endif; ?>
</ul>

