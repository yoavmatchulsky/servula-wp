<?php 

define('SERVULA_AFFILIATES_QUERY_PARAMETER', 'ul');

add_action('send_headers', 'servula_affiliates');
function servula_affiliates() {
  if (isset($_REQUEST[SERVULA_AFFILIATES_QUERY_PARAMETER])) {
    $aff_id = intval($_REQUEST[SERVULA_AFFILIATES_QUERY_PARAMETER]);
    if ($aff_id > 0) {
      $time       = time();
      $next_month = $time + 2592000;
      $domain     = servula_info('cookie_domain');
      $path       = '/';
      
      setcookie('aff_tag', $aff_id, $next_month, $path, $domain);
      setcookie('aff_from', $_SERVER['HTTP_REFERER'], $next_month, $path, $domain);
      setcookie('aff_time', $time, $next_month, $path, $domain);
    }
  }
}
