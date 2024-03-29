<?php

add_action('add_meta_boxes', 'ebook_meta_box_init');
function ebook_meta_box_init() {
  $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];
  
  $template_file = get_post_meta($post_id, '_wp_page_template', TRUE);

	// check for a template type
	if (empty($post_id) || $template_file == 'ebook.php') {
		add_meta_box('ebook-meta-box', 'eBook options', 'ebook_meta_box_callback', 'page', 'side', 'core');
	}
}

function ebook_meta_box_callback( $post ) {
  wp_nonce_field( 'ebook_meta_box_nonce', 'meta_box_nonce' );
  $values = get_post_custom($post->ID);
  
  ?>
  <div class="form-item">
    <label style="display: block;" for="ebook_title"><?php _e('Download eBook title', 'servula'); ?></label>
    <input type="text" id="ebook_title" name="ebook_title" value="<?php print $values['ebook_title'][0]; ?>" />
  </div>

  <div class="form-item" style="margin-top: 10px;">
    <label style="display: block;" for="ebook_pdf_size"><?php _e('PDF size', 'servula'); ?></label>
    <input type="text" id="ebook_pdf_size" name="ebook_pdf_size" value="<?php print $values['ebook_pdf_size'][0]; ?>" />
  </div>
  <?php
}

add_action('save_post', 'ebook_meta_box_save');
function ebook_meta_box_save( $post_id ) {
  // Bail if we're doing an auto save
  if (defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE) {
    return;
  }

  // if our nonce isn't there, or we can't verify it, bail
  if (!isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce($_POST['meta_box_nonce'], 'ebook_meta_box_nonce')) {
    return;
  }

  // if our current user can't edit this post, bail
  if (!current_user_can('edit_post')) {
    return;
  }

  if (isset( $_POST['ebook_title'])) {
    if (empty($_POST['ebook_title'])) {
      delete_post_meta($post_id, 'ebook_title');
    }
    else {
      update_post_meta($post_id, 'ebook_title', $_POST['ebook_title']);
    }
  }
  
  if (isset( $_POST['ebook_pdf_size'])) {  
    if (empty($_POST['ebook_pdf_size'])) {
      delete_post_meta($post_id, 'ebook_pdf_size');
    }
    else {
      update_post_meta($post_id, 'ebook_pdf_size', $_POST['ebook_pdf_size']);
    }
  }
}
