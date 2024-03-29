<?php
/*
Template Name: Service Sources
*/

$servula['body_class'] = 'body-services-page body-sources-page';

get_header();

$post_custom = get_post_custom();

$classes = array('page-services', 'page-sources', "page-sources-{$post->ID}");

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

$services_tab = false;
if ($post_custom['service-link'] and !empty($post_custom['service-link'])) {
  $services_tab = reset($post_custom['service-link']);
}

$service_icon = false;
if ($post_custom['service-icon'] and !empty($post_custom['service-icon'])) {
  $service_icon = reset($post_custom['service-icon']);
}

?>
<div id="leftcolumn" class="<?php print implode(' ', $classes); ?>">
  <div class="service-header-tabs">
    <?php if ($order_now) : ?>
    <span class="service-header-tab"><a href="<?php print $order_now; ?>"><?php _e('Start Now', 'servula'); ?></a></span>
    <?php endif; ?>
    <?php if ($services_tab) :?>    
    <span class="service-header-tab"><a href="<?php print $services_tab; ?>"><?php _e('Description &amp; Examples', 'servula'); ?></a></span>
    <?php endif; ?>
    <span class="service-header-tab current"><?php _e('Sources', 'servula'); ?></span>
  </div>
    
  <span class="more-link-in-header"><a href="<?php print servula_info('full_url'); ?>"><?php _e('Back to Services page', 'servula'); ?></a></span>
  
  <?php the_post(); ?>
  <div class="post" id="post-<?php the_ID(); ?>">
    <h1 class="title">
      <?php
        $title = get_the_title();
        
        if ($service_icon) : ?>
        <img title="<?php print $title; ?>" src="<?php print $service_icon; ?>" class="service-icon" alt="<?php print $title; ?>">
      <?php endif; ?>
      <?php print $title; ?>
    </h1>

    <div class="post-header">
      <ul class="social-links">
        <?php $url = get_permalink(); ?>
        <li><a href="https://twitter.com/share" class="twitter-share-button" data-via="servulashop" data-url="<?php print $url; ?>">Tweet</a>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></li>
        <li><iframe src="http://www.facebook.com/plugins/like.php?href=<?php print $url; ?>&locale=en_US&amp;layout=button_count&amp;show_faces=false&amp;width=90&amp;action=like&amp;font=arial&amp;colorscheme=light&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:90px; height:21px;" allowTransparency="true"></iframe></li>
        <li><g:plusone size="medium" href="<?php print $url; ?>"></g:plusone></li>
      </ul>
    </div>
    
    <div class="entry">
	    <?php the_content(); ?>
    </div>

    <div class="postdata"><?php edit_post_link('Edit'); ?></div>
  </div><!-- end .post -->

</div>


<div id="rightcolumn" class="page-services">
  <?php get_sidebar(); ?>
</div>

<?php wp_enqueue_script('services'); ?>

<?php get_footer(); ?>
