<?php
/*
Template Name: Blog index
*/

global $servula;
$servula['body_class'] = 'author category';

?><?php get_header(); ?>

<div id="leftcolumn">
  <?php get_sidebar(); ?>
</div>

<div id="rightcolumn">

<?php query_posts('post_type=post&post_status=publish&nopaging=true&orderby=date'); ?>

<?php if (have_posts()) : ?>

  <h1><?php _e("Servula's Blog", 'servula'); ?></h1>

  <?php while (have_posts()) : the_post(); ?>
  <article>
    <?php if ( has_post_thumbnail() ) : ?>
    <div class="post-thumbnail-wrapper">
      <?php the_post_thumbnail( array( 106, 104 ) ); ?>
    </div>
    <?php endif; ?>
    <div class="post" id="post-<?php the_ID(); ?>">
	    <h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
      <div class="postdata">
        <span class="postdate"><?php the_time('F jS, Y'); ?></span>
      </div>

      <div class="entry">
        <?php the_excerpt(); ?>
      </div>
    </div>
  </article>

  <?php endwhile; ?>
<?php endif; ?>
</div>
<?php get_footer(); ?>
