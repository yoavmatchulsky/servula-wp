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
        <span class="st_sharethis" st_title="Servula Homepage" st_url="<?php site_url('/'); ?>" displayText="ShareThis"></span>
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
          <input type="text" name="name" value="Name" />
          <input type="text" name="email" value="Email" />
          <input type="submit" value="Sign Up" />
        </form>
      </div>
    </div>

    <div class="copyright-wrapper">
  	  &copy; <?php echo date('Y'); ?> <a href="<?php echo get_option('home'); ?>/">Servula</a>, LLC. All right reserved.
  	</div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
