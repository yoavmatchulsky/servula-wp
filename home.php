<?php get_header(); ?>

<div id="homepage-wrapper">

  <div id="leftcolumn">
    <h1>Outsourcing simplified</h1>
    <h2>Servula is a place where you can order inbound marketing services easily, and be sure they will be done by the top freelancers. We monitor and <strong>check the work ourselves</strong> - saving you time so you can focus on your business.</h2>

    <div class="start-shopping-button">
      <a href="<?php print servula_info('full_url'); ?>">Start Shopping</a>
    </div>
    
    <img class="or-separator" src="<?php bloginfo('template_url'); ?>/images/homepage/or-separator.png" />
    
    <div class="learn-more">
      <a href="<?php print site_url('about/'); ?>">Learn More</a>
    </div>
  </div>
  
  <div id="rightcolumn">
    <div id="bee-wrapper">
      <img src="<?php bloginfo('template_url'); ?>/images/homepage/bee.png" data-image-original="<?php bloginfo('template_url'); ?>/images/homepage/bee.png" class="bee-image" />
      
      <div class="floor" style="top: 9px; height: 125px;" data-image-over="<?php bloginfo('template_url'); ?>/images/homepage/bee-3.png" data-text-id="floor-text-top" data-text-top="0px"></div>
      <div class="floor" style="top: 135px; height: 139px;" data-image-over="<?php bloginfo('template_url'); ?>/images/homepage/bee-2.png" data-text-id="floor-text-middle" data-text-top="135px"></div>
      <div class="floor" style="top: 275px; height: 100px;" data-image-over="<?php bloginfo('template_url'); ?>/images/homepage/bee-1.png" data-text-id="floor-text-bottom" data-text-top="230px"></div>
      
      <span class="our-process">
        <img src="<?php bloginfo('template_url'); ?>/images/homepage/our-process.png" />
      </span>
      
      <div class="bee-text-wrapper">
        <p class="floor-text" id="floor-text-top">Our professional staff of online marketers is always willing to help you with any question.</p>
        <p class="floor-text" id="floor-text-middle">Your order is taken care of by our awesome team of razor-sharp, creative &amp; witty freelancers.</p>
        <p class="floor-text" id="floor-text-bottom">After your order is complete, we check its quality and send you a detailed report.</p>
      </div>
    </div>
  </div>
  
  <div id="all-services">
    <h3>
      <img src="<?php bloginfo('template_url'); ?>/images/homepage/cog.png" />
      Order our Services
    </h3>
    <div id="services-wrapper">
      <div id="service-content-writing" class="services-column">
        <ul>
          <li class="service-item">
            <a href="<?php print site_url('services/article-writing/'); ?>" class="service-name"><img width="32" height="32" src="<?php bloginfo('template_url'); ?>/images/services/pen_alt2_32x32.png" data-image-over="<?php bloginfo('template_url'); ?>/images/services/pen_alt2_32x32-over.png" alt="Article Writing" />Article Writing</a>
            <a href="<?php print servula_info('full_url'); ?>/orders/new/article-writing">Order Now</a>
            |
            <a href="<?php print site_url('services/article-writing/'); ?>">More Info</a>
          </li>
          <li class="service-item">
            <a href="<?php print servula_info('full_url'); ?>/orders/new/article-writing?style=3" class="service-name"><img width="32" height="32" src="<?php bloginfo('template_url'); ?>/images/services/star_32x32.png" data-image-over="<?php bloginfo('template_url'); ?>/images/services/star_32x32-over.png" alt="Web Copywriting">Web Copywriting</a>
            <a href="<?php print servula_info('full_url'); ?>/orders/new/article-writing?style=3">Order Now</a>
          </li>
          <li class="service-item">
            <a href="<?php print site_url('services/professional-translation/'); ?>" class="service-name"><img width="32" height="32" src="<?php bloginfo('template_url'); ?>/images/services/sun_fill_32x32.png" data-image-over="<?php bloginfo('template_url'); ?>/images/services/sun_fill_32x32-over.png" alt="Translation">Translation</a>
            <a href="<?php print servula_info('full_url'); ?>/orders/new/professional-translation">Order Now</a>
            |
            <a href="<?php print site_url('services/professional-translation/'); ?>">More Info</a>
          </li>
        </ul>
      </div>
      <div id="service-link-building" class="services-column">
        <ul>
          <li class="service-item">
            <a href="<?php print site_url('services/answers-posting/'); ?>" class="service-name"><img width="32" height="32" src="<?php bloginfo('template_url'); ?>/images/services/comment_alt2_stroke_32x32.png" data-image-over="<?php bloginfo('template_url'); ?>/images/services/comment_alt2_stroke_32x32-over.png" alt="Answers Posting">Answers Posting</a>
            <a href="<?php print servula_info('full_url'); ?>/orders/new/answers-posting">Order Now</a>
            |
            <a href="<?php print site_url('services/answers-posting/'); ?>">More Info</a>
          </li>
          <li class="service-item">
            <a href="<?php print site_url('services/forum-commenting/'); ?>" class="service-name"><img width="32" height="32" src="<?php bloginfo('template_url'); ?>/images/services/pin_32x32.png" data-image-over="<?php bloginfo('template_url'); ?>/images/services/pin_32x32-over.png" alt="Forum Commenting">Forum Commenting</a>
            <a href="<?php print servula_info('full_url'); ?>/orders/new/forum-commenting">Order Now</a>
            |
            <a href="<?php print site_url('services/forum-commenting/'); ?>">More Info</a>
          </li>
          <li class="service-item">
            <a href="<?php print servula_info('full_url'); ?>/orders/new/blog-commenting" class="service-name"><img width="32" height="32" src="<?php bloginfo('template_url'); ?>/images/services/book_32x32.png" data-image-over="<?php bloginfo('template_url'); ?>/images/services/book_32x32-over.png" alt="Blog Commenting">Blog Commenting</a>
            <a href="<?php print servula_info('full_url'); ?>/orders/new/blog-commenting">Order Now</a>
          </li>
          <li class="service-item">
            <a href="<?php print site_url('services/article-submission/'); ?>" class="service-name"><img width="32" height="32" src="<?php bloginfo('template_url'); ?>/images/services/book_alt2_32x32.png" data-image-over="<?php bloginfo('template_url'); ?>/images/services/book_alt2_32x32-over.png" alt="Article Submission">Article Submission</a>
            <a href="<?php print servula_info('full_url'); ?>/orders/new/article-submission">Order Now</a>
            |
            <a href="<?php print site_url('services/article-submission/'); ?>">More Info</a>
          </li>
          <li class="service-item">
            <a href="<?php print site_url('services/directory-submission/'); ?>" class="service-name"><img width="32" height="32" src="<?php bloginfo('template_url'); ?>/images/services/folder_stroke_32x32.png" data-image-over="<?php bloginfo('template_url'); ?>/images/services/folder_stroke_32x32-over.png" alt="Directory Submission">Directory Submission</a>
            <a href="<?php print servula_info('full_url'); ?>/orders/new/directory-submission">Order Now</a>
            |
            <a href="<?php print site_url('services/directory-submission/'); ?>">More Info</a>
          </li>
        </ul>
      </div>
      <div id="service-social-media" class="services-column">
        <ul>
          <li class="service-item">
            <a href="<?php print site_url('services/social-bookmarking/'); ?>" class="service-name"><img width="32" height="32" src="<?php bloginfo('template_url'); ?>/images/services/chat_32x32.png" data-image-over="<?php bloginfo('template_url'); ?>/images/services/chat_32x32-over.png" alt="Social Bookmarking">Social Bookmarking</a>
            <a href="<?php print servula_info('full_url'); ?>/orders/new/social-bookmarking">Order Now</a>
            |
            <a href="<?php print site_url('services/social-bookmarking/'); ?>">More Info</a>
          </li>
          <li class="service-item">
            <a href="<?php print servula_info('full_url'); ?>/orders/new/blog-building" class="service-name"><img width="32" height="32" src="<?php bloginfo('template_url'); ?>/images/services/wrench_32x32.png" data-image-over="<?php bloginfo('template_url'); ?>/images/services/wrench_32x32-over.png" alt="Blog Building">Blog Building</a>
            <a href="<?php print servula_info('full_url'); ?>/orders/new/blog-building">Order Now</a>
          </li>
        </ul>
      </div>
      <div id="service-special-premium" class="services-column">
        <ul>
          <li class="service-item">
            <a href="<?php print servula_info('full_url'); ?>/orders/new/conversion-report" class="service-name"><img width="32" height="32" src="<?php bloginfo('template_url'); ?>/images/services/chart_alt_32x32.png" data-image-over="<?php bloginfo('template_url'); ?>/images/services/chart_alt_32x32-over.png" alt="Conversion Report">Conversion Report</a>
            <a href="<?php print servula_info('full_url'); ?>/orders/new/conversion-report">Order Now</a>
          </li>
          <li class="service-item">
            <a href="<?php print servula_info('full_url'); ?>/orders/new/dedicated-freelancer" class="service-name"><img width="32" height="32" src="<?php bloginfo('template_url'); ?>/images/services/user_32x32.png" data-image-over="<?php bloginfo('template_url'); ?>/images/services/user_32x32-over.png" alt="Dedicated Freelancer">Dedicated Freelancer</a>
            <a href="<?php print servula_info('full_url'); ?>/orders/new/dedicated-freelancer">Order Now</a>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <div id="what-our-clients-say">
    <h3>
      <img src="<?php bloginfo('template_url'); ?>/images/homepage/heart.png" />
      Servula is trusted by...
    </h3>
    <?php include TEMPLATEPATH . '/testimonials.php'; ?>
  </div>
  
  <div id="recent-posts">
    <h3>
      <img src="<?php bloginfo('template_url'); ?>/images/homepage/rss.png" />
      Recent Posts From our Blog
    </h3>
    
	  <div id="posts-wrapper">
    
    <?php

    $feed_items_columns = servula_get_feed_items(6);
    foreach ($feed_items_columns as $feed_items_column) : ?>
      <div class="articles-column">
      <?php foreach ($feed_items_column as $item) : ?>
        <?php $title = $item->get_title(); ?>
        <article>
          <div class="post">
            <?php $enclosure = $item->get_enclosure(); ?>
            <img src="<?php print $enclosure->link; ?>" width="73" height="66" title="<?php print esc_attr(strip_tags($title)); ?>" class="attachment-post-thumbnail wp-post-image" />
            
            <h2 class="title"><a href="<?php print $item->get_permalink() ?>" rel="bookmark" title="Permanent Link to <?php print esc_attr(strip_tags($title)); ?>"><?php print $title; ?></a></h2>

            <div class="post-date"><?php print $item->get_date(); ?></div>
          </div>
        </article>
      <?php endforeach; ?>
      </div>
    <?php endforeach; ?>
      	  
  	  <a class="to-all-posts" href="<?php print site_url('blog/'); ?>">All Posts &raquo;</a>
    </div>
  </div>
  
  <div id="interested">
    If you're interested in getting high quality Inbound Marketing Services, 
    you can start using Servula now
    <a href="<?php print servula_info('full_url'); ?>" class="to-get-started">
      Get Started Now
    </a>
  </div>
</div>

<?php get_footer(); ?>
