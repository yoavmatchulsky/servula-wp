<?php
/**
 * Servula
 */

include 'functions/iframe.php';
include 'functions/affiliates.php';
include 'functions/page.php';
include 'functions/googleplus.php';

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));
    
  register_sidebar(array(
    'name' => 'Contact Form Sidebar',
    'id' => 'contact-form-sidebar',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
  ));
  
  register_sidebar(array(
    'name' => 'Blog Posts Sidebar',
    'id' => 'blog-posts-sidebar',
    'before_widget' => '<li id="%1$s" class="widget %2$s">',
    'after_widget' => '</li>',
    'before_title' => '<h2>',
    'after_title' => '</h2>',
  ));  
}

add_action('init', 'servula_init');
function servula_init() {
  register_nav_menus(
    array(
      'primary' => __('Primary menu'),
      'sidebar' => __('Sidebar menu'),
    ));
  add_theme_support('post-thumbnails');
}

add_filter('the_content', 'servula_service_page');
function servula_service_page($content) {
  global $post;
  $intro_image = get_post_custom_values('service-intro-image');
  
  if (preg_match_all('!\[\[service-intro\]\]!', $content, $matches)) {
    $intro = '<div class="service-intro">';
    if (count($intro_image) > 0) {
      $title = $post->post_title;
      $intro .= '<img src="' . reset($intro_image) . '" class="service-intro-image" alt="' . $title . '" title="' . $title . '" />';
    }

    $content = preg_replace('!\[\[service-intro\]\]!', $intro, $content, 1);
    $content = preg_replace('!\[\[service-intro-end\]\]!', '</div>', $content);
  }

  if (preg_match_all('!\[\[service\-order-now\]\]!', $content, $matches)) {
    $order_service_link = get_post_custom_values('service-order-link');

    $order_now_start = '<div class="service-order-now">';
    $order_now_end = '</div>';
        
    if (count($order_service_link) > 0) {
      $order_now_end = '<a href="' . reset($order_service_link) . '" class="order-now">' . __('Start Now', 'servula') . '</a>' . $order_now_end;
    }

    $content = preg_replace('!\[\[service-order-now\]\]!', $order_now_start, $content, 1);
    $content = preg_replace('!\[\[service-order-now-end\]\]!', $order_now_end, $content);
  }

  $urls_search = array(
    '!\[\[images-url\]\]!', '!\[\[assets-url\]\]!'
  );
  $urls_replace = array(
    get_bloginfo('template_url') . '/images', 'https://s3.amazonaws.com/servula/assets/wp'
  );
  
  $content = preg_replace($urls_search, $urls_replace, $content);
  
  return $content;
}

add_filter('the_content', 'servula_service_column');
function servula_service_column($content) {
  if (preg_match_all('!\[\[service-column\s+(\{[^\]]+\})\s*\]\]!', $content, $matches)) {
    foreach ($matches[1] as $encoded_service_column) {    
      $service_column_info = json_decode($encoded_service_column);
      if ($service_column_info) {
        $service_column = <<< END_OF_COLUMN_SERVICE
        <div class="service-column" id="{$service_column_info->id}">
          <h2>{$service_column_info->title}</h2>
END_OF_COLUMN_SERVICE;
      }
      
      $content = preg_replace('!\[\[service-column\s+[^\]]+\]\]!', $service_column, $content, 1);
    }
  }
  
  $content = preg_replace('!\[\[service-column-end\]\]!', '</div>', $content);
  return $content;	
}

add_action('init', 'servula_check_login');
function servula_check_login() {
  global $servula;
  $servula['logged_in'] = false;

  if (false && function_exists('curl_init')) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, servula_info('system_url') . '/sessions/info');
    curl_setopt($ch, CURLOPT_PORT, servula_info('system_port'));
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    
    $cookies = array('auth_token=' . $_COOKIE['auth_token']);
    curl_setopt($ch, CURLOPT_COOKIE, implode('; ', $cookies));

    $response = curl_exec($ch);
    if ($response) {
      $login_data = json_decode($response);
      $servula['logged_in'] = $login_data->logged_in;
      if ($servula['logged_in']) {
        $servula['user_id'] = $login_data->user->id;
        $servula['user_name'] = esc_html($login_data->user->name);
        $servula['user_email'] = $login_data->user->email;
        $servula['user_credits'] = floatval($login_data->user->credits);
        $servula['user_services'] = intval($login_data->user->services);
      }
    }
  }
}

add_filter('nav_menu_css_class' , 'special_nav_class' , 10, 2);
function special_nav_class($classes, $item) {
  // Add classes to menu-items
  // if its a dead item, add the post_name as a wrapper
  if ($item->url == '#') {
    $classes[] = "menu-item-{$item->post_name}-wrapper";
    $next = true;
  }
  // if its a child item, add the page's object_id
  elseif ($item->menu_item_parent > 0) {
    $classes[] = "menu-item-page-{$item->object_id}";
  }
  return $classes;
}

function language_icon($slug = 'en') {
  $icon = '<img src="';
  $icon .= servula_info('assets_url') . 'languages/';
  switch ($slug) {
    case 'en': 
      $icon .= '1-english.png'; 
      $title = 'English';
      break;
      
    case 'he':
      $icon .= '2-hebrew.png';
      $title = 'Hebrew';
      break;
  }
  
  $icon .= '" alt="' . $title . '" class="language-icon" />';
  return $icon;
}

function servula_info($key = '', $with_locale = true) {
  global $servula;
    
  if (!empty($key) and isset($servula[$key])) {
    return $servula[$key];
  }
  else {
    $env = servula_get_env();
    switch ($key) {
      case 'full_url'     : 
        $url = servula_info('system_url');
        $port = servula_info('system_port');
        if (!in_array($port, array(80, 443))) {
          $url .= ':' . $port;
        }
        if ($with_locale) {
          $url .= servula_info('language_prefix');
        }
        return $url;
        
      case 'system_url'   : return $env == 'production' ? 'https://my.servula.com' : 'http://test.servula.local';
      case 'system_port'  : return $env == 'production' ? 443 : 3000;
      case 'env'          : return $env;
      
      case 'content_domain' : return $env == 'production' ? 'servula.com' : 'servula.local';
      
      case 'dashboard_url'  : return servula_info('full_url') . '/users/' . $servula['user_id'];
      case 'credits_url'    : return servula_info('full_url') . '/credits/plans';
      case 'assets_url'     : return 'https://s3.amazonaws.com/servula/';
      
      case 'header_credits_text' : 
        if (!$servula['logged_in'] or $servula['user_credits'] <= 0) {
          return __('No Credits, Yet', 'servula');
        }
        else {
          return sprintf( __("<strong>%d</strong> Credits Left", 'servula'), intval($servula['user_credits']) );
        }
      case 'header_services_in_cart' :
        if ($servula['user_services'] >= 1) {
          return sprintf( _n('<strong>%d</strong> Service in Cart', '<strong>%d</strong> Services in Cart', 'servula'), $servula['user_services'] );
        }
        else {
          return __('Cart is Empty', 'servula');
        }
        
      case 'language_slug' :
        return substr(get_bloginfo('language'), 0, 2);
        
      case 'language_underscore' :
        return str_replace('-', '_', get_bloginfo('language'));
        
      case 'google_plus_language' :
        $slug = servula_info('language_slug');
        switch ($slug) {
          case 'en': return 'en-US';
          case 'he': return 'iw';
        }
        
        return 'en-US';
      
      case 'language_prefix' :
        $slug = servula_info('language_slug');
        if ($slug == 'en') {
          return '';
        }
        else {
          return '/' . $slug;
        }
        
      case 'rtl' :
        return (get_bloginfo('text_direction') == 'rtl');

      case 'cookie_domain':
        if ($env == 'production') {
          return '.servula.com';
        }
        else {
          return '.servula.local';
        }
    }
  }
  
  return false;
}

function servula_get_env() {
  $env = 'production';
  if (preg_match('!\.local$!', site_url()) > 0) {
    $env = 'development';
  }
  return $env;
}

function servula_get_feed_items($count = 3) {
  if(!function_exists('fetch_feed')) { return; }
  
  include_once(ABSPATH . WPINC . '/feed.php');
  $feed = fetch_feed('http://www.servula.com/blog/feed');

  if (!is_wp_error( $feed )) {
    $limit = $feed->get_item_quantity($count);
    if ($limit > 0) {
    	$feed_items = $feed->get_items(0, $limit);
  	}
	}
	
	if (is_array($feed_items) && $count > 3) {
	  return array_chunk($feed_items, 3);
  }
	else {
  	return array($feed_items);
	}
}

// Increase excerpt length
function servula_template_tags($content) {
  $search = array(
    '[servula-system-url]'
  );
  $replace = array(
    servula_info('full_url')
  );
  
  return str_replace($search, $replace, $content);
}
add_filter('the_content', 'servula_template_tags');

add_action('wp_enqueue_scripts', 'servula_enqueue_scripts');
function servula_enqueue_scripts() {
  /* Replace local jquery with a CDN */
  wp_deregister_script('jquery');
  wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js', false, '1.7.2');
  wp_enqueue_script('jquery');

  wp_enqueue_script('fancybox', get_template_directory_uri() . '/jquery.fancybox.js', array('jquery'), false, true);

  /*
   * Remove tabs from homepage
  if (is_front_page()) {
    wp_deregister_script('jquery-ui-tabs');
    wp_register_script('jquery-ui-tabs', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.20/jquery-ui.min.js', false, '1.8.20');
    wp_enqueue_script('jquery-ui-tabs');
  }
  */
}

function get_page_by_slug($page_slug, $output = OBJECT, $post_type = 'page' ) {
  global $wpdb;
  $page = $wpdb->get_var($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE post_name = %s AND post_type = %s AND post_status <> %s", $page_slug, $post_type, 'trash'));
  return $page ? get_page($page, $output) : null;
}

add_action('after_setup_theme', 'servula_theme_setup');
function servula_theme_setup(){
  load_theme_textdomain('servula', get_template_directory() . '/languages');
}