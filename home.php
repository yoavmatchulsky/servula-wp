<?php get_header(); ?>

<div id="homepage-wrapper">

  <h1>One-Stop Shop for Inbound Marketing Services</h1>
  <h2>All services combined in one easy-to-use platform: Content Writing, Link Building and more.</h2>

  <div id="leftcolumn">
    <p>
      Move your mouse
      <img src="<?php bloginfo('template_url'); ?>/images/homepage/mouse.png" /><br />
      on each floor to see how it works
    </p>
    <a href="<?php print servula_info('full_url'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/homepage/start-shopping.png" /></a>
    <br />
    (or
    <a href="<?php print site_url('/services'); ?>">Learn More</a>)
  </div>
  
  <div id="rightcolumn">
    <img src="<?php bloginfo('template_url'); ?>/images/homepage/bee.jpg" />
  </div>
  
  <div id="what-our-clients-say">
    <h4>
      <img src="<?php bloginfo('template_url'); ?>/images/homepage/heart.png" />
      See what our clients say about Servula (<a href="<?php print site_url('/testimonials'); ?>">All Testimonials</a>)
    </h4>
    CLIENTS roll
  </div>
  
  <div id="all-services">
    <h4>All Services in one place (<a href="<?php print site_url('/services'); ?>">All Services</a>)</h4>
    SERVICES
  </div>
</div>

<?php get_footer(); ?>
