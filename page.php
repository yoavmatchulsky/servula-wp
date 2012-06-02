<?php
/*
Template Name: Inner Page
*/
?><?php get_header(); ?>

<div id="leftcolumn">
  <?php get_sidebar(); ?>
</div>

<div id="rightcolumn">
  <?php if (have_posts()) : ?>

	  <?php while (have_posts()) : the_post(); ?>

	  <div class="post" id="post-<?php the_ID(); ?>">
		  <h1 class="title"><?php the_title(); ?></h1>

		  <div class="entry">
			  <?php the_content(); ?>
		  </div>

		  <div class="postdata"><?php edit_post_link('Edit'); ?></div>
	  </div>

	  <?php endwhile; ?>

	  <?php else : ?>
	  <div class="post">
		  <div class="title"><h2>Not Found</h2></div>
		  <p>Sorry, but you are looking for something that isn't here.</p>
	  </div>

  <?php endif; ?>
</div>
     
<?php get_footer(); ?>
