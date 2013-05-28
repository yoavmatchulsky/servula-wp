<?php
/*
Template Name: eBook
*/

$servula['body_class']      = 'body-ebook-page';
$servula['show-user-info']  = false;
get_header();

$post_custom = get_post_custom();

$classes = array('page-ebook', "page-ebook-{$post->ID}");

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
        <a href="<?php print $order_now; ?>" class="order-now"><?php _e('Order Now', 'servula'); ?></a>
      <?php endif; ?>
    </div>
    <?php endif; ?>
    
    <div class="entry">
	    <?php the_content(); ?>
    </div>

    <div class="postdata"><?php edit_post_link('Edit'); ?></div>
  </div><!-- end .post -->

</div>


<div id="rightcolumn" class="page-ebook">
  <div class="widget-download-ebook">
    <?php
      $download_title = $post_custom['ebook_title'][0];
      if (empty($download_title)) {
        $download_title = __('Download your eBook now!', 'servula');
      }
      
      $pdf_size = $post_custom['ebook_pdf_size'][0];
      if (empty($pdf_size)) {
        $pdf_size = '1,382k';
      }
    ?>
    <h5><?php print $download_title; ?></h5>

    <form method="post" action="https://app.icontact.com/icp/signup.php" name="icpsignup" id="icpsignup5770" accept-charset="UTF-8">
      <input type="hidden" name="redirect" value="http://www.servula.com/ebook-download-thank-you/" />
      <input type="hidden" name="errorredirect" value="http://www.servula.com/ebook-download-error/" />
      <input type="hidden" name="listid" value="92224">
      <input type="hidden" name="specialid:92224" value="F5MG">

      <input type="hidden" name="clientid" value="1063486">
      <input type="hidden" name="formid" value="5770">
      <input type="hidden" name="reallistid" value="1">
      <input type="hidden" name="doubleopt" value="0">
      <div id="signup">
        <input type="text" name="fields_fname" placeholder="<?php _e('Full name', 'servula'); ?>" />
        <input type="text" name="fields_email" placeholder="<?php _e('Email', 'servula'); ?>" />
        <span class="pdf-size"><?php printf( __('PDF file (%s size)', 'servula'), $pdf_size); ?></span>
        <input type="submit" name="Submit" value="<?php _e('Download', 'servula'); ?>" />
      </div>
    </form>    
  </div>
  
  <ul class="social-links vertical">
    <?php $url = get_permalink(); ?>
    <li>
      <div class="fb-like" data-send="false" data-layout="box_count" data-width="120" data-show-faces="false"></div>
    </li>

    <li>
      <script src="//platform.linkedin.com/in.js" type="text/javascript"></script>
      <script type="IN/Share" data-counter="top"></script>
    </li>

    <li>
      <a href="https://twitter.com/share" class="twitter-share-button" data-via="servulashop" data-url="<?php print $url; ?>" data-count="vertical">Tweet</a>
      <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    </li>

    <li>
      <div class="g-plus" data-action="share" data-annotation="vertical-bubble" data-height="60"></div>
    </li>

    <li>
      <a class="addthis_button_email at300b" href="http://www.addthis.com/bookmark.php" title="Email"><img width="55" height="62" border="0" alt="Email" src="http://www.hubspot.com/Portals/53/images/email-share-icon.png"></a>
      <script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-507849121da03807"></script>
    </li>
  </ul>
  
  <div class="featured-image-wrapper">
    <?php the_post_thumbnail(); ?>
  </div>
</div>

<?php get_footer(); ?>
