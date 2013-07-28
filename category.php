<?php

global $servula;
$servula['body_class'] = 'author category';

?><?php get_header(); ?>

<div id="leftcolumn">
  <?php get_sidebar(); ?>
</div>

<div id="rightcolumn">

<?php if (have_posts()) : ?>

  <h1><?php printf( __('Recent Posts about "%s"', 'servula'), single_cat_title( null, false ) ); ?></h1>

  <?php while (have_posts()) : the_post(); ?>
  <article>
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

    <div class="pagers clearfix">
        <p class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></p>
        <p class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></p>
    </div>

<?php endif; ?>
</div>
<?php get_footer(); ?>
