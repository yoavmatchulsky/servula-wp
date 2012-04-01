<?php
/*
Template Name: Service
*/

get_header(); ?>

<div id="page-services-<?php print $post->ID; ?>" class="page-services">
  <div id="leftcolumn">

    <?php wp_nav_menu( array( 
            'menu' => 'services',
            'container' => 'nav',
            'fallback_cb' => '', ) ); ?>
                
  </div>
  
  <div id="rightcolumn">

    <?php the_post(); ?>
    <div class="post" id="post-<?php the_ID(); ?>">
      <?php $header_title = get_post_custom_values('header-title'); ?>
      <?php if ($header_title) : ?>
      <h1 class="post-title">
        <?php print implode("\n", $header_title); ?>
      </h1>
      <?php endif; ?>
      
      <?php $header_values = get_post_custom_values('header'); ?>
      <?php if ($header_values) : ?>
      <div class="post-header">
        <?php foreach ($header_values as $header_value) : ?>
        <div class="post-header-info">
          <?php print $header_value; ?>
        </div>
        <?php endforeach; ?>
        
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
      </div>
      <?php endif; ?>
      
	    <div class="entry">
		    <?php the_content(); ?>
	    </div><!-- end .entry -->

	    <div class="postdata"><?php edit_post_link('Edit'); ?></div>
    </div><!-- end .post -->

  </div>
  
       
</div>

<?php get_footer(); ?>
