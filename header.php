<?php
  global $servula;
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
  <script src="<?php bloginfo('template_url'); ?>/jquery.fancybox.js" type="text/javascript"></script>

  <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/script.js"></script>
  <script type="text/javascript">
  /* <![CDATA[ */
  var Servula = {
    system_url : "<?php print servula_info('full_url'); ?>",
    func : {},
    session_info : {}
  }
  /* ]]> */

  // ClickTale Top part
  var WRInitTime=(new Date()).getTime();
  </script>

  <title><?php wp_title(' '); ?> </title>
  <link href="<?php bloginfo('url'); ?>/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
  <script type="text/javascript">
  
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-24864094-1']);
  _gaq.push(['_setDomainName', 'servula.com']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
  
  </script>
  
<?php if (servula_info('env') == 'production') : ?>
<!--Start of Zopim Live Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');
$.src='//cdn.zopim.com/?R1VnaN0Gk6rs1xQDY6HSVYndlysPOWIe';z.t=+new Date;$.
type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');
</script>
<!--End of Zopim Live Chat Script-->
<?php endif; ?>

<?php
  if(is_singular()) {
    wp_enqueue_script('comment-reply');
  }
  wp_head();
?>
</head>

<body<?php if (isset($servula['body_class'])) { print ' class="' . $servula['body_class'] . '"'; } ?>>
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>
  
	<header id="header">
	  <div class="wrapper">
	    <div id="logo-wrapper">
	      <a href="<?php print get_option('home'); ?>">
	        <img src="<?php bloginfo('template_url'); ?>/images/logo-beta.png" alt="Servula is currently in Beta" title="Servula is currently in Beta" />
	      </a>
	    </div>
	    
      <?php wp_nav_menu( array( 
              'theme_location' => 'primary',
              'container' => 'nav',
              'fallback_cb' => '', ) ); ?>

      <div class="info-wrapper">
        <div class="info-item-wrapper">
          <img alt="Credits" height="24" src="<?php bloginfo('template_url'); ?>/images/header/gold-coin-24x24.png" width="24" />
          <div class="info-item-text">
            <div class="uppercase header-credits-text">
              <?php print servula_info('header_credits_text'); ?>
            </div>
            <a href="<?php print servula_info('full_url'); ?>/credits/plans">Buy Credits <span class="arrow-sign">&#9654;</span></a>
          </div>
        </div>
        <div class="info-item-wrapper">
          <a href="<?php print servula_info('full_url'); ?>/orders/checkout"><img alt="Go to Cart" height="24" src="<?php bloginfo('template_url'); ?>/images/header/cart-24x24.png" width="24" /></a>
          <div class="info-item-text">
            <div class="uppercase header-services-in-cart"><?php print servula_info('header_services_in_cart'); ?></div>
            <a href="<?php print servula_info('full_url'); ?>/">Order Services <span class="arrow-sign">&#9654;</span></a>
          </div>
        </div>
      </div>
      
      <div class="login-register-wrapper my-dashboard-wrapper hidden">
        <img src="<?php bloginfo('template_url'); ?>/images/header/down-arrow-16x16.png" width="16" height="16" />
        <span class="header-user-name"></span>
        <div class="login-form-wrapper hidden">
          <ul>
            <li><a class="header-dashboard-link" href="#">Dashboard</a></li>
            <li><a class="header-edit-link" href="#">Account Settings</a></li>
            <li>
              <a href="<?php print servula_info('credits_url'); ?>" style="display: inline-block;">Buy Credits</a>
              (<span class="header-user-credits">0</span> left)
            </li>
            <hr />
            <li><a href="<?php print servula_info('full_url'); ?>/logout">Logout</a></li>
          </ul>
        </div>
      </div>
      
      <div class="login-register-wrapper">
        <img src="<?php bloginfo('template_url'); ?>/images/header/down-arrow-16x16.png" width="16" height="16" />
        <span class="login-register-button">Login/Register</span>
        <div class="login-form-wrapper hidden">
          <form action="<?php print servula_info('full_url'); ?>/sessions" method="POST" accept-charset="UTF-8">
            <input type="hidden" value="✓" name="utf8">
            
            <div class="form-item" style="margin-top: 0;">
              <label for="session_email">Email:</label>
              <input type="text" value="" tabindex="1" size="35" name="session[email]" id="session_email">
            </div>
            
            <div class="form-item">
              <span class="forgot-password"><a href="<?php print servula_info('full_url'); ?>/password_resets/new">Forgot Password?</a></span>
              <label for="session_password">Password:</label>
              <input type="password" tabindex="2" size="35" name="session[password]" id="session_password">
            </div>
            
            <div class="form-item">            
              <input type="hidden" value="0" name="session[remember_me]"><input type="checkbox" value="1" name="session[remember_me]" id="session_remember_me">
              <label for="session_remember_me">Remember Me</label>
            </div>
            
            <input type="submit" value="Login" tabindex="3" name="commit">
            Or
            <a href="<?php print servula_info('full_url'); ?>/register">Register now</a>
          </form>
        </div>
      </div>
      
    </div>
    
    <?php if (!isset($_COOKIE['servula-launch-notification'])) : ?>
    <div class="header-notifications hidden">
      <div class="wrapper">
        <p>
          We've just launched! <a href="<?php print site_url('blog/servula-is-now-open-to-the-public/'); ?>" target="_blank">Read more about our journey</a> (and get FREE coupon!) |
          <a href="#" onclick="Servula.func.notifications.launch.dismiss(this); return false;">Dismiss</a>
        </p>
      </div>
    </div>
    <?php endif; ?>
    
  </header>
  <div class="wrapper clearfix">
