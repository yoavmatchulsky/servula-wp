<?php $servula['body_class'] = 'homepage'; ?>
<?php get_header(); ?>

<div id="homepage-wrapper">

  <h1><?php _e('One-Stop Shop for Inbound Marketing Services', 'servula'); ?></h1>
  <h2><?php _e('All services in one place, done by top professionals, including QA.', 'servula'); ?></h2>

  <div class="tabs">
    <div class="tabs-header">
      <div class="current-credits-wrapper">
        <?php _e('<strong>450+</strong> Professionals are waiting your instructions', 'servula'); ?>
      </div>
    
      <ul>
        <li><a href="#all-services"><?php _e('All Services', 'servula'); ?></a></li>
        <li><a href="#packages"><?php _e('Packages', 'servula'); ?></a></li>
      </ul>

    </div>
    
    <div class="tabs-content">
      <div id="all-services">
        <div id="services-wrapper">
          <div id="service-content-writing" class="services-column">
            <h4><?php _e('Content', 'servula'); ?></h4>
            <ul>
              <li class="service-item service-item-article-writing">
                <div class="title"><span><?php _e('Article Writing', 'servula'); ?></span></div>
                <div class="actions">
                  <a href="<?php print servula_info('full_url'); ?>/orders/new/article-writing" class="order-now"><?php _e('Start Now', 'servula'); ?></a>
                  <a href="<?php print site_url('services/article-writing/'); ?>" class="more-info"><?php _e('More Info', 'servula'); ?></a>
                </div>
              </li>
              <li class="service-item service-item-web-copywriting">
                <div class="title"><span><?php _e('Copywriting', 'servula'); ?></span></div>
                <div class="actions">
                  <a href="<?php print servula_info('full_url'); ?>/orders/new/copywriting" class="order-now"><?php _e('Start Now', 'servula'); ?></a>
                  <a href="<?php print site_url('services/copywriting/'); ?>" class="more-info"><?php _e('More Info', 'servula'); ?></a>
                </div>
              </li>
              <li class="service-item service-item-pressrelease">
                <div class="title"><span><?php _e('Press Release Writing', 'servula'); ?></span></div>
                <div class="actions">
                  <a href="<?php print servula_info('full_url'); ?>/orders/new/press-release-writing" class="order-now"><?php _e('Start Now', 'servula'); ?></a>
                  <a href="<?php print site_url('services/press-release-writing/'); ?>" class="more-info"><?php _e('More Info', 'servula'); ?></a>
                </div>
              </li>
              <li class="service-item service-item-translation">
                <div class="title"><span><?php _e('Translation', 'servula'); ?></span></div>
                <div class="actions">
                  <a href="<?php print servula_info('full_url'); ?>/orders/new/professional-translation" class="order-now"><?php _e('Start Now', 'servula'); ?></a>
                  <a href="<?php print site_url('services/translation/'); ?>" class="more-info"><?php _e('More Info', 'servula'); ?></a>
                </div>
              </li>
            </ul>
          </div>
          <div id="service-link-building" class="services-column">
            <h4><?php _e('SEO', 'servula'); ?></h4>
            <ul>
              <li class="service-item service-item-article-submission">
                <div class="title"><span><?php _e('Article Submission', 'servula'); ?></span></div>
                <div class="actions">
                  <a href="<?php print servula_info('full_url'); ?>/orders/new/article-submission" class="order-now"><?php _e('Start Now', 'servula'); ?></a>
                  <a href="<?php print site_url('services/article-submission/'); ?>" class="more-info"><?php _e('More Info', 'servula'); ?></a>
                </div>
              </li>
              <li class="service-item service-item-directory-submission">
                <div class="title"><span><?php _e('Directory Submission', 'servula'); ?></span></div>
                <div class="actions">
                  <a href="<?php print servula_info('full_url'); ?>/orders/new/directory-submission" class="order-now"><?php _e('Start Now', 'servula'); ?></a>
                  <a href="<?php print site_url('services/directory-submission/'); ?>" class="more-info"><?php _e('More Info', 'servula'); ?></a>
                </div>
              </li>
              <li class="service-item service-item-local-listing">
                <div class="title"><span><?php _e('Local Listing', 'servula'); ?></span></div>
                <div class="actions">
                  <a href="<?php print servula_info('full_url'); ?>/orders/new/local-listing" class="order-now"><?php _e('Start Now', 'servula'); ?></a>
                  <a href="<?php print site_url('services/local-listing/'); ?>" class="more-info"><?php _e('More Info', 'servula'); ?></a>
                </div>
              </li>
              <li class="service-item service-item-answers-posting">
                <div class="title"><span><?php _e('Answers Posting', 'servula'); ?></span></div>
                <div class="actions">
                  <a href="<?php print servula_info('full_url'); ?>/orders/new/answers-posting" class="order-now"><?php _e('Start Now', 'servula'); ?></a>
                  <a href="<?php print site_url('services/answers-posting/'); ?>" class="more-info"><?php _e('More Info', 'servula'); ?></a>
                </div>
              </li>
            </ul>
          </div>
          <div id="service-social-media" class="services-column">
            <h4><?php _e('Social', 'servula'); ?></h4>
            <ul>
              <li class="service-item service-item-social-bookmarking">
                <div class="title"><span><?php _e('Social Bookmarking', 'servula'); ?></span></div>
                <div class="actions">
                  <a href="<?php print servula_info('full_url'); ?>/orders/new/social-bookmarking" class="order-now"><?php _e('Start Now', 'servula'); ?></a>
                  <a href="<?php print site_url('services/social-bookmarking/'); ?>" class="more-info"><?php _e('More Info', 'servula'); ?></a>
                </div>
              </li>
              <li class="service-item service-item-blog-building">
                <div class="title"><span><?php _e('Blog Building', 'servula'); ?></span></div>
                <div class="actions">
                  <a href="<?php print servula_info('full_url'); ?>/orders/new/blog-building" class="more-info"><?php _e('More Info', 'servula'); ?></a>
                </div>
              </li>
            </ul>
          </div>
          <div id="service-special-premium" class="services-column">
            <h4><?php _e('Other', 'servula'); ?></h4>
            <ul>
              <li class="service-item service-item-dedicated-freelancer">
                <div class="title"><span><?php _e('Dedicated Freelancer', 'servula'); ?></span></div>
                <div class="actions">
                  <a href="<?php print servula_info('full_url'); ?>/orders/new/dedicated-freelancer" class="more-info"><?php _e('More Info', 'servula'); ?></a>
                </div>
              </li>
            </ul>
            <ul>
              <li class="service-item service-item-site-review service-item-new">
                <div class="title"><span><?php _e('Usability Test', 'servula'); ?></span></div>
                <div class="actions">
                  <a href="<?php print servula_info('full_url'); ?>/orders/new/usability-test" class="order-now"><?php _e('Start Now', 'servula'); ?></a>
                  <a href="<?php print site_url('services/usability-test/'); ?>" class="more-info"><?php _e('More Info', 'servula'); ?></a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
      
      <div id="packages" class="hidden">
        <?php _e('Coming soon!', 'servula'); ?>
      </div>
    </div>
  </div>

  <div id="what-our-clients-say">
    <h3>
      <img src="<?php bloginfo('template_url'); ?>/images/homepage/heart.png" />
      <?php _e('Servula is trusted by...', 'servula'); ?>
    </h3>
    <?php include TEMPLATEPATH . '/testimonials.php'; ?>

    <div id="featured-clients">
      <img src="https://s3.amazonaws.com/servula/assets/wp/featured-clients.png" />
    </div>
  </div>
  
  <div id="recent-posts">
    <h3>
      <img src="<?php bloginfo('template_url'); ?>/images/homepage/rss.png" />
      <?php _e('Recent Posts From our Blog', 'servula'); ?>
    </h3>
    
	  <div id="posts-wrapper">
    
    <?php
      if (servula_info('language_slug') == 'he') :
        $count = 0;
        if (have_posts()) :
          while (have_posts() && $count < 6) : the_post(); $count += 1; ?>
          <article>
            <div class="post">
              <?php the_post_thumbnail(array('73', '66'), array('class' => 'attachment-post-thumbnail wp-post-image')); ?>
              
              <h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

              <div class="post-date"><?php the_time('F jS, Y'); ?></div>
            </div>
          </article>
      <?php endwhile;
        endif;
      else : 

      $feed_items_columns = servula_get_feed_items(6);
      if (!empty($feed_items_columns)) :
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
        <?php endforeach;
      endif;
    endif; ?>
      	  
  	  <a class="to-all-posts" href="<?php print site_url('blog/'); ?>"><?php _e('All Posts &raquo;', 'servula'); ?></a>
    </div>
  </div>
  
  <div id="interested">
    <?php _e("If you're interested in getting high quality Inbound Marketing Services, you can start using Servula now", 'servula'); ?>
    <a href="<?php print servula_info('full_url'); ?>" class="to-get-started">
      <?php _e('Get Started Now', 'servula'); ?>
    </a>
  </div>
</div>

<?php get_footer(); ?>
