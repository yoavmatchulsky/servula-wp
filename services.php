<?php
/*
Template Name: Service
*/

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

$service_icon = false;
if ($post_custom['service-icon'] and !empty($post_custom['service-icon'])) {
  $service_icon = reset($post_custom['service-icon']);
}

?>
<div id="leftcolumn" class="<?php print implode(' ', $classes); ?>">
  <div class="service-header-tabs">
    <span class="service-header-tab current">Description</span>
    <?php if ($order_now) : ?>
    <span class="service-header-tab"><a href="<?php print $order_now; ?>">Order Now</a></span>
    <?php endif; ?>
  </div>
    
  <span class="more-link-in-header back-button"><a href="<?php print servula_info('full_url'); ?>">Back to All Services</a></span>
  
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
    
    <?php $header = $post_custom['header']; ?>
    <?php if ($header) : ?>
    <div class="post-header">
      <?php foreach ($header as $header_value) : ?>
      <div class="post-header-info">
        <?php print $header_value; ?>
      </div>
      <?php endforeach; ?>
      
      <?php if ($order_now) : ?>
        <a href="<?php print $order_now; ?>" class="order-now">Order Now</a>
      <?php endif; ?>
    </div>
    <?php endif; ?>
    
    <div class="entry">
	    <?php the_content(); ?>
    </div>

    <?php $related_services = $post_custom['related-service']; ?>
    <?php if ($related_services) : ?>
    <div class="related-services">
      <h3>Related Services:</h3>
      
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
        <li class="more-services"><a href="<?php print home_url(); ?>">More Services &raquo;</a></li>
      </ul>
    </div>
    <?php endif; ?>
    <div class="postdata"><?php edit_post_link('Edit'); ?></div>
  </div><!-- end .post -->

</div>


<div id="rightcolumn" class="page-services">
  <?php get_sidebar(); ?>
</div>

<?php wp_enqueue_script('services'); ?>

<?php get_footer(); ?>
