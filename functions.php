<?php
/**
 * Servula
 */

add_theme_support('post-thumbnails');

if ( function_exists('register_sidebar') )
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

add_action('init', 'servula_register_menu');
function servula_register_menu() {
  register_nav_menus(
    array(
      'primary' => __('Primary menu'),
      'sidebar' => __('Sidebar menu'),
    ));
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
      $order_now_end = '<a href="' . reset($order_service_link) . '" class="order-now">Order Now</a>' . $order_now_end;
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
          <div class="service-header">{$service_column_info->title}</div>
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

  if (function_exists('curl_init')) {
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

function servula_info($key = '') {
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
        return $url;
        
      case 'system_url'   : return $env == 'production' ? 'https://my.servula.com' : 'http://test.servula.local';
      case 'system_port'  : return $env == 'production' ? 443 : 3000;
      case 'env'          : return $env;
      
      case 'dashboard_url'  : return servula_info('full_url') . '/users/' . $servula['user_id'];
      case 'credits_url'    : return servula_info('full_url') . '/credits/plans';
      
      case 'header_credits_text' : 
        if (!$servula['logged_in'] or $servula['user_credits'] <= 0) {
          return 'No Credits, Yet';
        }
        else {
          return "<strong>" . intval($servula['user_credits']) . "</strong> Credits Left";
        }
      case 'header_services_in_cart' :
        if ($servula['user_services'] > 1) {
          return '<strong>' . $servula['user_services'] . '</strong> Services in Cart';
        }
        elseif ($servula['user_services'] == 1) {
          return '<strong>1</strong> Service in Cart';
        }
        else {
          return 'Cart is Empty';
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
	
	if ($count > 3) {
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
  if (is_front_page()) {
    wp_enqueue_script('homepage', get_template_directory_uri() . '/homepage.js');
    wp_enqueue_script('testimonials', get_template_directory_uri() . '/testimonials.js');
  }
  
  wp_register_script('services', get_template_directory_uri() . '/services.js');  
}

function get_page_by_slug($page_slug, $output = OBJECT, $post_type = 'page' ) {
  global $wpdb;
  $page = $wpdb->get_var($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE post_name = %s AND post_type = %s AND post_status <> %s", $page_slug, $post_type, 'trash'));
  return $page ? get_page($page, $output) : null;
}
