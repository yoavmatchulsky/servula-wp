<?php
/**
 * @package WordPress
 * @subpackage Hello_D
 */
?>

</div>
<footer>
  <div class="wrapper">
    <ul>
      <li>
        <h3>Learn About Us</h3>
        <ul>
          <li><a href="<?php print site_url('about/'); ?>">What we do?</a></li>
          <li><a href="<?php print site_url('faq/'); ?>">FAQ</a></li>
          <li><a href="<?php print site_url('jobs/'); ?>">Jobs</a></li>
        </ul>
      </li>
      <li>
        <ul>
          <h3>&nbsp;</h3>
          <li><a href="<?php print site_url('contact/'); ?>">Contact Us</a></li>
          <li><a href="#" onclick="return false;" data-support-dialog="1">Support</a></li>
          <li><a href="<?php print site_url('blog/'); ?>">Blog</a></li>
        </ul>
      </li>
      <li>
        <h3>General</h3>
        <ul>
          <li><a href="<?php print servula_info('full_url'); ?>">Our Services</li>
          <li><a href="<?php print servula_info('full_url'); ?>/register">Register Now!</a></li>
          <li><a href="<?php print site_url('terms_of_service/'); ?>">Terms of Service</a></li>
        </ul>
      </li>
      <li>
        <h3>Spread the word!</h3>
        <ul class="social-links">
          <li><a href="https://twitter.com/share" class="twitter-share-button" data-via="servulashop">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></li>
          <li><iframe src="http://www.facebook.com/plugins/like.php?href=<?php the_permalink() ?>&locale=en_US&amp;layout=button_count&amp;show_faces=false&amp;width=90&amp;action=like&amp;font=arial&amp;colorscheme=light&amp;height=20" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:90px; height:20px;" allowTransparency="true"></iframe></li>
          <li><g:plusone size="medium"></g:plusone></li>
        </ul>
      </li>
    </ul>
    
    
    <div class="newsletter-wrapper">
      <img src="<?php bloginfo('template_url'); ?>/images/footer/servula-logo.png" />
      
      <div class="newsletter-bubble">
        <div class="newsletter-text">
          Something Soemthing
          Now that i have your...
        </div>
        
        <form>
          <input type="submit" value="Sign Up" />
          <input type="text" name="name" value="Name" />
          <input type="text" name="email" value="Email" />
        </form>
      </div>
    </div>

    <div class="copyright-wrapper">
  	  &copy; <?php echo date('Y'); ?> <a href="<?php echo get_option('home'); ?>/">Servula</a>, LLC. All right reserved.
  	</div>
  </div>
</footer>

<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>

<?php wp_footer(); ?>
</body>
</html>
