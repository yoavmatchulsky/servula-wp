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
          <li><a href="<?php print servula_info('full_url'); ?>">Our Services</a></li>
          <li><a href="<?php print servula_info('full_url'); ?>/register">Register Now!</a></li>
          <li><a href="<?php print servula_info('full_url'); ?>/terms-of-service">Terms of Service</a></li>
        </ul>
      </li>
      <li>
        <h3>Spread the word!</h3>
        <ul class="social-links">
          <?php $url = home_url('/'); ?>
          <li><a href="https://twitter.com/share" class="twitter-share-button" data-via="servulashop" data-url="<?php print $url; ?>">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></li>
          <li><iframe src="http://www.facebook.com/plugins/like.php?href=<?php print $url; ?>&locale=en_US&amp;layout=button_count&amp;show_faces=false&amp;width=90&amp;action=like&amp;font=arial&amp;colorscheme=light&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:90px; height:21px;" allowTransparency="true"></iframe></li>
          <li><g:plusone size="medium" href="<?php print $url; ?>"></g:plusone></li>
        </ul>
        
        <ul class="social-links social-links-images">
          <li><a id="social-links-image-linked-in" href="#"></a></li>
          <li><a id="social-links-image-twitter" href="https://twitter.com/#!/ServulaShop"></a></li>
          <li><a id="social-links-image-facebook" href="http://www.facebook.com/pages/Servula/181501315237979"></a></li>
        </ul>
      </li>
    </ul>
    
    <div class="newsletter-wrapper">
      <img src="<?php bloginfo('template_url'); ?>/images/footer/servula-logo.png" />
      
      <div class="newsletter-bubble">
        <div class="newsletter-text">
          <strong>Hey! Get over here.</strong>
          Sign up for Servula's newsletter and get updates about our latest activities,
          blog posts, special offers and cool tips!
        </div>
        
        <form action="http://app.icontact.com/icp/signup.php" name="icpsignup" id="icpsignup5242" method="post" accept-charset="UTF-8">
          <input type="hidden" value="http://www.icontact.com/www/signup/thanks.html" name="redirect">
          <input type="hidden" value="http://www.icontact.com/www/signup/error.html" name="errorredirect">        
          <input type="hidden" value="56024" name="listid">
          <input type="hidden" value="LUVM" name="specialid:56024">
          <input type="hidden" value="1063486" name="clientid">
          <input type="hidden" value="5242" name="formid">
          <input type="hidden" value="1" name="reallistid">
          <input type="hidden" value="0" name="doubleopt">          

          <input type="submit" value="Sign Up" tabindex="102" />
          <input type="text" name="fields_fname" value="" placeholder="Name" tabindex="100" />
          <input type="text" name="fields_email" value="" placeholder="Email" tabindex="101" />
        </form>
      </div>
    </div>
    <div class="copyright-wrapper">
  	  &copy; <?php echo date('Y'); ?> <a href="<?php echo site_url(); ?>">Servula</a>, LLC. All right reserved.
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

<!-- ClickTale Bottom part -->
<div id="ClickTaleDiv" style="display: none;"></div>
<script type="text/javascript">
if(document.location.protocol!='https:')
  document.write(unescape("%3Cscript%20src='http://s.clicktale.net/WRc9.js'%20type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
if(typeof ClickTale=='function') ClickTale(23332,1,"www02");
</script>

<?php wp_footer(); ?>

<div class="hidden">
  <?php include 'contact-dialog.php'; ?>
</div>

<?php if (servula_info('env') == 'production') : ?>
<script type="text/javascript">
  var uvOptions = {};
  (function() {
    var uv = document.createElement('script'); uv.type = 'text/javascript'; uv.async = true;
    uv.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'widget.uservoice.com/3u9Rp1iKBzm2f66qCFHeg.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(uv, s);
  })();
</script>
<?php endif; ?>

</body>
</html>
