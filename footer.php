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
          <li>What we do?</li>
          <li>FAQ</li>
          <li>Jobs</li>
        </ul>
      </li>
      <li>
        <ul>
          <h3>&nbsp;</h3>
          <li>Contact Us</li>
          <li>Support</li>
          <li><a href="<?php print site_url('blog/'); ?>">Blog</a></li>
        </ul>
      </li>
      <li>
        <h3>General</h3>
        <ul>
          <li><a href="<?php print site_url('services/'); ?>">Our Services</li>
          <li><a href="<?php print servula_info('full_url'); ?>/register">Register Now!</a></li>
          <li>Terms of Service</li>
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
