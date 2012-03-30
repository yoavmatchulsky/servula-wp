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

function servula_info($key = '') {
  global $servula;
  
  if (!empty($key) and isset($servula[$key])) {
    return $servula[$key];
  }
  else {  
    switch ($key) {
      case 'full_url'  : return servula_info('system_url') . ':' . servula_info('system_port');
      case 'system_url'       : return 'http://test.servula.local';
      case 'system_port'      : return 3000;
    }
  }
  
  return false;
}

?>
