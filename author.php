<?php

global $servula;
$servula['body_class'] = 'author';

?><?php get_header(); ?>

<div id="leftcolumn">
  <?php get_sidebar(); ?>
</div>

<div id="rightcolumn">

<?php 
  $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
  global $authordata;
  $authordata = $curauth;
  ?>
  <div class="author-details">
    <h1><?php print $curauth->display_name; ?></h1>
    <?php userphoto_the_author_thumbnail(); ?>
    
    <?php print $curauth->description; ?>
    <?php if (!empty($curauth->googleplus)) : ?>
      <br/>
      <strong><?php _e('Google+ Profile:', 'servula'); ?></strong> <a rel="me" href="<?php print $curauth->googleplus; ?>" target="_blank"><?php print $curauth->display_name; ?></a>
    <?php endif; ?>
  </div>

<?php if (have_posts()) : ?>

  <h2><?php _e('My recent posts:', 'servula'); ?></h2>

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
