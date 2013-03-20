<?php
/*
Template Name: No Sidebar Landing Page
*/

$servula['body_class']      = 'body-no-sidebar-landing-page';
$servula['show-user-info']  = false;
get_header();

?>
<div id="leftcolumn" class="page-no-sidebar-landing-page">
  <?php the_post(); ?>
  <div class="post" id="post-<?php the_ID(); ?>">

    <h1 class="title">
      <?php
        $title = get_the_title();
        
      <?php print $title; ?>
    </h1>
    
    <div class="entry">
	    <?php the_content(); ?>
    </div>

    <div class="postdata"><?php edit_post_link('Edit'); ?></div>
  </div><!-- end .post -->

</div>

<?php get_footer(); ?>
