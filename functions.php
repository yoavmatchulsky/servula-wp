<?php
/**
 * @package WordPress
 * @subpackage Hello_D
 */

if ( function_exists('register_sidebar') )
	register_sidebar(array(
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));

add_action('init', 'servula_register_menu');
function servula_register_menu() {
  register_nav_menus(
    array(
      'primary' => __('Primary menu'),
      'sidebar' => __('Sidebar menu'),
    ));
}

add_filter('the_content', 'servula_service_column');
function servula_service_column($content) {
  if (preg_match_all('!\[\[service\-column\s+(\{[^\]]+\})\s*\]\]!', $content, $matches)) {
    foreach ($matches[1] as $encoded_service_column) {    
      $service_column_info = json_decode($encoded_service_column);
      if ($service_column_info) {
        $service_column = <<< END_OF_COLUMN_SERVICE
        <div class="service-column" id="{$service_column_info->id}">
          <div class="service-header"><img src="{$service_column_info->image}" />
          <p class="service-header-text">
            <span class="service-header-text-big">{$service_column_info->title_big}</span>
            {$service_column_info->title}
          </p>
        </div>
END_OF_COLUMN_SERVICE;
      }
      
      $content = preg_replace('!\[\[service\-column\s+[^\]]+\]\]!', $service_column, $content, 1);
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
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $cookies = array('auth_token=' . $_COOKIE['auth_token']);
    curl_setopt($ch, CURLOPT_COOKIE, implode('; ', $cookies));
    
    $response = curl_exec($ch);
    if ($response) {
      $login_data = json_decode($response);
      $servula['logged_in'] = $login_data->logged_in;
      if ($servula['logged_in']) {
        $servula['user_id'] = $login_data->user->id;
        $servula['user_name'] = $login_data->user->name;
        $servula['user_email'] = $login_data->user->email;
        $servula['user_credits'] = floatval($login_data->user->credits);
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
      case 'full_url'     : return servula_info('system_url') . ':' . servula_info('system_port');
      case 'system_url'   : return $env == 'production' ? 'http://test.servula.com' : 'http://test.servula.local';
      case 'system_port'  : return $env == 'production' ? 80 : 3000;
      case 'env'          : return $env;
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
?>
