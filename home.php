<?php $servula['body_class'] = 'homepage'; ?>
<?php get_header(); ?>

<div id="homepage-wrapper">

  <h1>One-Stop Shop for Inbound Marketing Services</h1>
  <h2>All services in one place, done by top professionals, including QA.</h2>

  <div class="tabs">
    <div class="tabs-header">
      <div class="current-credits-wrapper">
        <strong>450+</strong> Professionals are waiting your instructions
      </div>
    
      <ul>
        <li><a href="#all-services">All Services</a></li>
        <li><a href="#packages">Packages</a></li>              
      </ul>

    </div>
    
    <div class="tabs-content">
      <div id="all-services">
        <div id="services-wrapper">
          <div id="service-content-writing" class="services-column">
            <h4>Content</h4>
            <ul>
              <li class="service-item service-item-article-writing">
                <div class="title"><span>Article Writing</span></div>
                <div class="actions">
                  <a href="<?php print servula_info('full_url'); ?>/orders/new/article-writing" class="order-now">Start Now</a>
                  <a href="<?php print site_url('services/article-writing/'); ?>" class="more-info">More Info</a>
                </div>
              </li>
              <li class="service-item service-item-web-copywriting">
                <div class="title"><span>Copywriting</span></div>
                <div class="actions">
                  <a href="<?php print servula_info('full_url'); ?>/orders/new/article-writing?style=3" class="order-now">Start Now</a>
                </div>
              </li>
              <li class="service-item service-item-translation">
                <div class="title"><span>Translation</span></div>
                <div class="actions">
                  <a href="<?php print servula_info('full_url'); ?>/orders/new/professional-translation" class="order-now">Start Now</a>
                  <a href="<?php print site_url('services/translation/'); ?>" class="more-info">More Info</a>
                </div>
              </li>
            </ul>
          </div>
          <div id="service-link-building" class="services-column">
            <h4>SEO</h4>
            <ul>
              <li class="service-item service-item-local-listing service-item-new">
                <div class="title"><span>Local Listing</span></div>
                <div class="actions">
                  <a href="<?php print servula_info('full_url'); ?>/orders/new/local-listing" class="order-now">Start Now</a>
                  <a href="<?php print site_url('services/local-listing/'); ?>" class="more-info">More Info</a>
                </div>
              </li>
              <li class="service-item service-item-answers-posting">
                <div class="title"><span>Answers Posting</span></div>
                <div class="actions">
                  <a href="<?php print servula_info('full_url'); ?>/orders/new/answers-posting" class="order-now">Start Now</a>
                  <a href="<?php print site_url('services/answers-posting/'); ?>" class="more-info">More Info</a>
                </div>
              </li>
              <li class="service-item service-item-article-submission">
                <div class="title"><span>Article Submission</span></div>
                <div class="actions">
                  <a href="<?php print servula_info('full_url'); ?>/orders/new/article-submission" class="order-now">Start Now</a>
                  <a href="<?php print site_url('services/article-submission/'); ?>" class="more-info">More Info</a>
                </div>
              </li>
              <li class="service-item service-item-directory-submission">
                <div class="title"><span>Directory Submission</span></div>
                <div class="actions">
                  <a href="<?php print servula_info('full_url'); ?>/orders/new/directory-submission" class="order-now">Start Now</a>
                  <a href="<?php print site_url('services/directory-submission/'); ?>" class="more-info">More Info</a>
                </div>
              </li>
            </ul>
          </div>
          <div id="service-social-media" class="services-column">
            <h4>Social</h4>
            <ul>
              <li class="service-item service-item-social-bookmarking">
                <div class="title"><span>Social Bookmarking</span></div>
                <div class="actions">
                  <a href="<?php print servula_info('full_url'); ?>/orders/new/social-bookmarking" class="order-now">Start Now</a>
                  <a href="<?php print site_url('services/social-bookmarking/'); ?>" class="more-info">More Info</a>
                </div>
              </li>
              <li class="service-item service-item-blog-building">
                <div class="title"><span>Blog Building</span></div>
                <div class="actions">
                  <a href="<?php print servula_info('full_url'); ?>/orders/new/blog-building" class="order-now">Start Now</a>
                </div>
              </li>
            </ul>
          </div>
          <div id="service-special-premium" class="services-column">
            <h4>Other</h4>
            <ul>
              <li class="service-item service-item-dedicated-freelancer">
                <div class="title"><span>Dedicated Freelancer</span></div>
                <div class="actions">
                  <a href="<?php print servula_info('full_url'); ?>/orders/new/dedicated-freelancer" class="order-now">Start Now</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
      
      <div id="packages">
        Coming soon!
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
