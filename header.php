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

  <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/homepage.js" type="text/javascript"></script>
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
	<header id="header">
	  <div class="container">
	    <div id="logo-wrapper">
	      <a href="<?php print get_option('home'); ?>/">
	        <img src="<?php bloginfo('template_url'); ?>/images/logo.png" />
	      </a>
	    </div>
	    
      <?php wp_nav_menu( array( 
              'theme_location' => 'primary',
              'container' => 'nav',
              'fallback_cb' => '', ) ); ?>

      <div class="info-wrapper">
        <div>
          <img src="<?php bloginfo('template_url'); ?>/images/users-20x18.png" width="20" height="18" />
          <strong>322</strong> Freelancers
        </div>
        
        <div>
          <img src="<?php bloginfo('template_url'); ?>/images/cog-16x16.png" width="16" height="16" style="margin-left: 2px; margin-right: 2px;" />
          <strong>12</strong> Services
        </div>
      </div>
      
      <?php if (servula_info('logged_in')) : ?>
      <div class="login-register-wrapper my-dashboard-wrapper">
        <img src="<?php bloginfo('template_url'); ?>/images/down-arrow-16x16.png" width="16" height="16" />
        My Dashboard
        <div class="login-form-wrapper hidden">
          <ul>
            <li><a href="<?php print servula_info('full_url'); ?>/users/<?php print servula_info('user_id'); ?>">Dashboard</a></li>
            <li><a href="<?php print servula_info('full_url'); ?>/users/<?php print servula_info('user_id'); ?>/edit">Account Settings</a></li>
            <li>
              <a href="<?php print servula_info('full_url'); ?>/credits/plans">Buy Credits</a>
              <span>(<?php print servula_info('user_credits'); ?> left)</span>
            </li>
            <hr />
            <li><a href="<?php print servula_info('full_url'); ?>/logout">Logout</a></li>
          </ul>
        </div>
      </div>
      
      <?php else : ?>
      <div class="login-register-wrapper">
        <img src="<?php bloginfo('template_url'); ?>/images/down-arrow-16x16.png" width="16" height="16" />
        <span class="login-register-button">Login/Register</span>
        <div class="login-form-wrapper hidden">
          <form action="http://test.servula.local:3000/sessions" method="POST" accept-charset="UTF-8">
            <input type="hidden" value="✓" name="utf8">
            
            <div class="form-item">
              <label for="session_email">Email:</label>
              <input type="text" value="" tabindex="1" size="35" name="session[email]" id="session_email">
            </div>
            
            <div class="form-item">
              <span class="forgot-password"><a href="http://test.servula.local:3000/password_resets/new">Forgot Password?</a></span>
              <label for="session_password">Password:</label>
              <input type="password" tabindex="2" size="35" name="session[password]" id="session_password">
            </div>
            
            <div class="form-item">            
              <input type="hidden" value="0" name="session[remember_me]"><input type="checkbox" value="1" name="session[remember_me]" id="session_remember_me">
              <label for="session_remember_me">Remember Me</label>
            </div>
            
            <input type="submit" value="Login" tabindex="3" name="commit">
            Or
            <a href="http://test.servula.local:3000/register">Register now</a>
          </form>
        </div>
      </div>
      <?php endif; ?>
      
    </div>
  </header>
  <div class="container clearfix">
