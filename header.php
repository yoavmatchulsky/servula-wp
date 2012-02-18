<?php
?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
  <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
  <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/print.css" type="text/css" media="print" />
  <!--[if IE]><link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/ie.css" type="text/css" media="screen, projection" /><![endif]-->

  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

  <script type="text/javascript">
  /* <![CDATA[ */
  if (false) {
	  $(document).ready(function() {
		  $(".menu a").wrapInner($("<span></span>"));
		  $('.post').before('<div class="post_top"></div>').after('<div class="post_end"></div>');
		  $('.widget').before('<li class="widget_top"></li>').after('<li class="widget_end"></li>');
		  $('#search').prepend('<h2 style="text-align: left;">Search</h2>');
	  });
  }
  /* ]]> */
  </script>

<?php
  if(is_singular()) {
    wp_enqueue_script('comment-reply');
  }
  wp_head();
?>

<title><?php wp_title(' '); ?><?php if(wp_title(' ', false)) { echo ' -'; } ?> <?php bloginfo('name'); ?></title>
<link href="<?php bloginfo('url'); ?>/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
</head>

<body>
<div class="container clearfix">
	<header id="header">
	  <div id="logo-wrapper">
	    <a href="<?php print get_option('home'); ?>/">
	      <img src="<?php bloginfo('template_url'); ?>/images/logo.png" />
	    </a>
	  </div>
	  
    <?php wp_nav_menu( array( 
            'theme_location' => 'primary',
            'container' => 'nav',
            'fallback_cb' => '', ) ); ?>

    <?php if (false) : ?>
    <ul class="menu">
      <li class="page_item page_item_1<?php if ( is_home() ) { ?> current_page_item<?php } ?>"><a href="<?php echo get_settings('home'); ?>/" title="Home">Home</a></li>
      <?php wp_list_pages('title_li=&depth=1' ); ?>
    </ul>
    <?php endif; ?>
  </header>
