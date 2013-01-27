</div>
<footer>
  <div class="wrapper">
    <ul>
      <li style="width: 230px;">
        <h3><?php _e('Learn About Us', 'servula'); ?></h3>
        <ul>
          <li><a href="<?php print site_url('about/'); ?>"><?php _e('What we do?', 'servula'); ?></a></li>
          <li><a href="<?php print site_url('values/'); ?>"><?php _e('Our Values', 'servula'); ?></a></li>
          <li><a href="<?php print site_url('faq/'); ?>"><?php _e('FAQ', 'servula'); ?></a></li>
          <li><a href="<?php print site_url('inbound-marketing/'); ?>"><?php _e('What is Inbound Marketing?', 'servula'); ?></a></li>
        </ul>
      </li>
      <li>
        <ul>
          <h3>&nbsp;</h3>
          <li><a href="<?php print site_url('jobs/'); ?>"><?php _e('Jobs', 'servula'); ?></a></li>
          <li><a href="<?php print site_url('contact/'); ?>"><?php _e('Contact Us', 'servula'); ?></a></li>
          <li><a href="<?php print site_url('blog/'); ?>"><?php _e('Blog', 'servula'); ?></a></li>
        </ul>
      </li>
      <li>
        <h3><?php _e('General', 'servula'); ?></h3>
        <ul>
          <li><a href="<?php print servula_info('full_url'); ?>"><?php _e('Our Services', 'servula'); ?></a></li>
          <li><a href="<?php print servula_info('full_url'); ?>/register"><?php _e('Register Now!', 'servula'); ?></a></li>
          <li><a href="<?php print servula_info('full_url'); ?>/terms-of-service"><?php _e('Terms of Service', 'servula'); ?></a></li>
        </ul>
      </li>
      <li>
        <h3><?php _e('Spread the word!', 'servula'); ?></h3>
        <ul class="social-links">
          <?php $url = home_url('/'); ?>
          <li><a href="https://twitter.com/servulashop" class="twitter-follow-button" data-show-screen-name="false" data-show-count="true" data-lang="<?php print servula_info('language_slug'); ?>" data-width="90px">Follow @servulashop</a></li>
          <li><iframe src="http://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fpages%2FServula%2F181501315237979&locale=en_US&amp;layout=button_count&amp;show_faces=false&amp;width=90&amp;action=like&amp;font=arial&amp;colorscheme=light&amp;height=21&amp;locale=<?php print servula_info('language_underscore'); ?>" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:90px; height:21px;" allowTransparency="true"></iframe></li>
          <li><g:plusone size="medium" href="<?php print $url; ?>"></g:plusone></li>
        </ul>
        
        <ul class="social-links social-links-images">
          <li><a id="social-links-image-linked-in" href="https://www.linkedin.com/company/servula"></a></li>
          <li><a id="social-links-image-twitter" href="https://twitter.com/#!/ServulaShop"></a></li>
          <li><a id="social-links-image-facebook" href="http://www.facebook.com/pages/Servula/181501315237979"></a></li>
        </ul>
      </li>
    </ul>
    
    <div class="newsletter-wrapper">
      <?php if (servula_info('rtl')) : ?>
      <img src="<?php bloginfo('template_url'); ?>/images/footer/servula-logo-rtl.png" />
      <?php else : ?>
      <img src="<?php bloginfo('template_url'); ?>/images/footer/servula-logo.png" />
      <?php endif; ?>
      
      <div class="newsletter-bubble">
        <div class="newsletter-text">
        <?php _e("<strong>Hey! Get over here.</strong>
          Sign up for Servula's newsletter and get updates about our latest activities,
          blog posts, special offers and cool tips!", 'servula', 'newsletter-sign-up'); ?>
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

          <input type="submit" value="<?php _e('Sign Up', 'servula', 'newsletter-sign-up'); ?>" tabindex="102" />
          <input type="text" name="fields_fname" value="" placeholder="<?php _e('Name', 'servula', 'newsletter-sign-up'); ?>" tabindex="100" />
          <input type="text" name="fields_email" value="" placeholder="<?php _e('Email', 'servula', 'newsletter-sign-up'); ?>" tabindex="101" />
        </form>
      </div>
    </div>
    <div class="copyright-wrapper">
  	  &copy; <?php echo date('Y'); ?> <a href="<?php echo site_url(); ?>">Servula</a>, LLC. <?php _e('All right reserved.', 'servula'); ?>
  	</div>
  </div>
</footer>

<script type="text/javascript">
  window.___gcfg = {
    lang: '<?php print servula_info('google_plus_language'); ?>'
  };
  
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

<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

<?php wp_footer(); ?>

<?php if (servula_info('env') == 'production') : ?>
<script type="text/javascript" src="<?php print servula_info('full_url'); ?>/sessions/info.json?jsonp=update_session_info"></script>
<?php endif; ?>

</body>
</html>
