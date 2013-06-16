<?php

function my_googleplus_link() {
  if ( get_the_author_meta( 'googleplus' ) ) {
    print '<a href="' . the_author_meta( 'googleplus' ) . '" > ' . the_author_meta( 'display_name' ) . '</a>';
  }
}

function googleplus_link() {
  if ( get_the_author_meta('googleplus')) {
    return get_the_author_meta('googleplus') . '?rel=author';
  }
  else {
    return '';
  }
}

function my_googleplus_image_link() {
  print '<a target="_blank" href="' . googleplus_link() . '"><img class="googleplus-author" style="" alt="Google+" src="https://s3.amazonaws.com/servula/assets/wp/google-plus-author.png"></a>';
}