<?php
/*
Template Name: Service
*/
?><?php get_header(); ?>

<div id="leftcolumn">
  <?php get_sidebar(); ?>
</div>

<div id="rightcolumn" class="page-services" id="page-services-<?php print $post->ID; ?>">
  <div class="service-header-tabs">
    <span class="service-header-tab service-header-tab-current">Description</span>
    <span class="service-header-tab"><a href="<?php print servula_info('full_url'); ?>/orders/new/content-article">Order Now</a></span>
    
    <span class="more-link-in-header back-button"><a href="<?php print servula_info('full_url'); ?>">Back to All Services</a></span>
  </div>
  
  <?php the_post(); ?>
  <div class="post" id="post-<?php the_ID(); ?>">
    <h1 class="title">
      <img title="Content Article" src="http://s3.amazonaws.com/servula/services/1/icon-medium-pen_alt2.png" class="service-icon" alt="Content Article">
      <?php the_title(); ?>
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
      <!--
      <div class="post-header-order">
        <?php
          $order_link = get_post_custom_values('header-order-link');
          $link = servula_info('full_url') . '/orders/new';
          if ($order_link) {
            $link .= '/' . reset($order_link);
          }
        ?>
        <a href="<?php print $link; ?>">Order</a>
      </div>
      -->
    </div>
    <?php endif; ?>
    
    <div class="entry">
	    <?php the_content(); ?>
    </div>

    <div class="related-services">
      RELATED
    </div>
    <div class="postdata"><?php edit_post_link('Edit'); ?></div>
  </div><!-- end .post -->

</div>

<?php get_footer(); ?>
