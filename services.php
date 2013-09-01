<?php
/*
Template Name: Service
*/

$servula['body_class'] = 'body-services-page';

get_header();

$post_custom = get_post_custom();

$classes = array('page-services', "page-services-{$post->ID}");

if ($post_custom['service-group'] and !empty($post_custom['service-group'])) {
  $service_group = reset($post_custom['service-group']);
  if (in_array($service_group, array('content-writing', 'link-building', 'social-media', 'special-premium'))) {
    array_push($classes, "page-services-$service_group");
  }
}

$order_now = false;
if ($post_custom['service-order-link'] and !empty($post_custom['service-order-link'])) {
  $order_now = reset($post_custom['service-order-link']);
}

$sources_tab = false;
if ($post_custom['sources-tab-link'] and !empty($post_custom['sources-tab-link'])) {
  $sources_tab = reset($post_custom['sources-tab-link']);
}

$service_icon = false;
if ($post_custom['service-icon'] and !empty($post_custom['service-icon'])) {
  $service_icon = reset($post_custom['service-icon']);
}

?>
<div id="leftcolumn" class="<?php print implode(' ', $classes); ?>">
  <?php if ( !IN_IFRAME ) : ?>
  <div class="service-header-tabs">
    <?php if ($order_now) : ?>
    <span class="service-header-tab"><a href="<?php print $order_now; ?>"><?php _e('Start Now', 'servula'); ?></a></span>
    <?php endif; ?>
    <span class="service-header-tab current"><?php _e('Description &amp; Examples', 'servula'); ?></span>
    <?php if ($sources_tab) : ?>
    <span class="service-header-tab"><a href="<?php print $sources_tab; ?>"><?php _e('Sources', 'servula'); ?></a></span>
    <?php endif; ?>
  </div>
    
  <span class="more-link-in-header"><a href="<?php print servula_info('full_url'); ?>"><?php _e('Back to Services page', 'servula'); ?></a></span>
  <?php endif; ?>

  <?php the_post(); ?>
  <div class="post" id="post-<?php the_ID(); ?>">
    <?php if (!IN_IFRAME) : ?>
    <ul class="social-links">
      <?php $url = get_permalink(); ?>
      <li><a href="https://twitter.com/share" class="twitter-share-button" data-via="servulashop" data-url="<?php print $url; ?>" data-lang="<?php print servula_info('language_slug'); ?>">Tweet</a>
  <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></li>
      <li><iframe src="http://www.facebook.com/plugins/like.php?href=<?php print $url; ?>&locale=en_US&amp;layout=button_count&amp;show_faces=false&amp;width=90&amp;action=like&amp;font=arial&amp;colorscheme=light&amp;height=21&amp;locale=<?php print servula_info('language_underscore'); ?>" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:90px; height:21px;" allowTransparency="true"></iframe></li>
      <li><g:plusone size="medium" href="<?php print $url; ?>"></g:plusone></li>
    </ul>
    <?php endif; ?>
    
    <h1 class="title">
      <?php
        $title = get_the_title();
        
        if ($service_icon) : ?>
        <img title="<?php print $title; ?>" src="<?php print $service_icon; ?>" class="service-icon" alt="<?php print $title; ?>">
      <?php endif; ?>
      <?php print $title; ?>
    </h1>
    
    <?php $header = $post_custom['header']; ?>
    <?php if ($header) : ?>
    <div class="post-header">
      <?php foreach ($header as $header_value) : ?>
      <div class="post-header-info">
        <?php print $header_value; ?>
      </div>
      <?php endforeach; ?>
      
      <?php if ($order_now and ( !IN_IFRAME )) : ?>
        <a href="<?php print $order_now; ?>" class="order-now"><?php _e('Start Now', 'servula'); ?></a>
      <?php endif; ?>
    </div>
    <?php endif; ?>
    
    <div class="entry">
	    <?php the_content(); ?>
    </div>

    <?php $related_services = $post_custom['related-service']; ?>
    <?php if ($related_services and (!IN_IFRAME)) : ?>

    <div class="related-services">
      <h3><?php _e('Related Services:', 'servula'); ?></h3>
      
      <ul>
      <?php foreach ($related_services as $related_service) :
        $page = get_page_by_slug($related_service);
        $post_id = $page->ID;
        if ($post_id == NULL) {
          continue;
        }
        
        $service_icon = get_post_meta($post_id, 'service-icon', true);
      ?>
        <li><a href="<?php print get_permalink($post_id); ?>"><img src="<?php print $service_icon; ?>" /><?php print $page->post_title; ?></a></li>
      <?php endforeach; ?>
        <li class="more-services"><a href="<?php print servula_info('full_url'); ?>"><?php _e('More Services &raquo;', 'servula'); ?></a></li>
      </ul>
    </div>
    <?php endif; ?>
    <div class="postdata"><?php edit_post_link('Edit'); ?></div>
  </div><!-- end .post -->

</div>

<?php if ( !IN_IFRAME ) : ?>
<div id="rightcolumn" class="page-services">
  <?php get_sidebar(); ?>
</div>
<?php endif; ?>

<?php get_footer(); ?>
