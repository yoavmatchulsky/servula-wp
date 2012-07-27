<?php
/*
Template Name: Service
*/
?><?php get_header(); ?>

<div id="leftcolumn" class="page-services" id="page-services-<?php print $post->ID; ?>">
  <div class="service-header-tabs">
    <span class="service-header-tab service-header-tab-current">Description</span>
    <span class="service-header-tab"><a href="<?php print servula_info('full_url'); ?>/orders/new/content-article">Order Now</a></span>
  </div>
    
  <span class="more-link-in-header back-button"><a href="<?php print servula_info('full_url'); ?>">Back to All Services</a></span>
  
  <?php the_post(); ?>
  <div class="post" id="post-<?php the_ID(); ?>">
    <h1 class="title">
      <?php 
        $service_icon = get_post_custom_values('service-icon');
        $title = get_the_title();
        if (!empty($service_icon)) : ?>
        
        <img title="<?php print $title; ?>" src="<?php print reset($service_icon); ?>" class="service-icon" alt="<?php print $title; ?>">
      <?php endif; ?>
      <?php print $title; ?>
    </h1>
    
    <?php $header_values = get_post_custom_values('header'); ?>
    <?php if ($header_values) : ?>
    <div class="post-header">
      <?php foreach ($header_values as $header_value) : ?>
      <div class="post-header-info">
        <?php print $header_value; ?>
      </div>
      <?php endforeach; ?>
      
      <?php
          $order_service_link = get_post_custom_values('service-order-link');
              
          if (count($order_service_link) > 0) : ?>
        <a href="<?php print reset($order_service_link); ?>" class="order-now">Order Now</a>
      <?php endif; ?>
    </div>
    <?php endif; ?>
    
    <div class="entry">
	    <?php the_content(); ?>
    </div>

    <?php $related_services = get_post_custom_values('related-service'); ?>
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
        
        $service_icon = get_post_custom_values('service-icon', $post_id);
      ?>
        <li><a href="<?php print get_permalink($post_id); ?>"><img src="<?php print reset($service_icon); ?>" /><?php print $page->post_title; ?></a></li>
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
