<?php get_header(); ?>

<div id="content-wrapper">

  <?php get_sidebar(); ?>

  <div id="rightcolumn">

  <?php if (have_posts()) : ?>

	  <?php while (have_posts()) : the_post(); ?>
    <article>
	    <div class="post" id="post-<?php the_ID(); ?>">
		    <h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

		    <div class="entry">
			    <?php the_content('Read More...'); ?>
		    </div>
	    </div>
    </article>

	  <?php endwhile; ?>

      <div class="pagers clearfix">
          <p class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></p>
          <p class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></p>
      </div>

  <?php else : ?>

    <article>
	    <div class="post">
		    <div class="title"><h2>Not Found</h2></div>
		    <p>Sorry, but you are looking for something that isn't here.</p>
	    </div>
    </article>

  <?php endif; ?>
  </div>
</div>       
<?php get_footer(); ?>
