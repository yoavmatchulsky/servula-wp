if (typeof $ == 'undefined') {
  $ = jQuery;
}

$(function () {
  // Check for placeholder support
  body = $('body')

  placeholder_test = document.createElement('input');
  if (!('placeholder' in placeholder_test)) {
    $('footer .newsletter-wrapper form').on({
      focusin : function(e) {
        t = $(this);
        placeholder = t.attr('placeholder');
        if (placeholder && t.val() == placeholder) {
          t.val('');
        }
      },
      focusout : function (e) {
        t = $(this);
        placeholder = t.attr('placeholder');
        if (placeholder && t.val() == '') {
          t.val(placeholder);
        }
      }
    }, 'input[type="text"]').find('input[type="text"]').trigger('focusout');
  }
  
  $.extend(Servula.func, {
    login: {
      timer: null,
      active_element: null,
      open: function(login_register_wrapper) {
        var wrapper = login_register_wrapper.find('.login-form-wrapper');
        clearTimeout(Servula.func.login.timer);
        if (!wrapper.hasClass('hidden')) {
          return;
        }
        wrapper.stop(true, true).hide().removeClass('hidden').slideDown(200, 'swing', function() {
          Servula.func.login.active_element = $(document.activeElement);
          $(this).find('input[type="text"]:first').trigger('focus');
        });
      },
      close: function(login_register_wrapper) {
        var wrapper = login_register_wrapper.find('.login-form-wrapper');
        wrapper.stop(true, true).slideUp(200, 'swing', function() {
          $(this).addClass('hidden');
          if (Servula.func.login.active_element) {
            Servula.func.login.active_element.trigger('focus');
            Servula.func.login.active_element = null;
          }
        });
      }
    }
  });

  $('.login-register-wrapper').on({
    mouseenter: function(e) {
      Servula.func.login.open($(this));
    },
    
    mouseleave: function(e) {
      var t = $(this);
      if (!e.relatedTarget) {
        return;
      }
      Servula.func.login.timer = setTimeout(function() {
        Servula.func.login.close(t);
      }, 150);
    }
  });

  $.extend(Servula.func, {
    notifications : {
      launch : {
        dismiss : function(obj) {
          expires = new Date();
          expires.setDate(expires.getDate() + 365);
          
          domain = location.hostname.split('.');
          domain.shift();
          domain = '.' + domain.join('.');
          
          document.cookie = 'servula-launch-notification=1;domain=' + domain + ';path=/;expires=' + expires.toUTCString();
          
          $(obj).parents('.header-notifications').slideUp('slow');
        },
        open : function() {
          notifications = $('header .header-notifications.hidden');
          if (notifications.length == 1) {
            setTimeout(function () {
              notifications.slideDown('slow', function () {
                notifications.removeClass('hidden')
              });
            }, 1000);
          }
        }
      }
    }
  });

  Servula.func.notifications.launch.open();

  /* Homepage scripts */
  if (body.hasClass('homepage')) {
    $('.tabs').tabs({
      selected : 0,
      fx : { height : 'toggle', duration : 'slow'}
    }).find('.tabs-content .hidden').removeClass('hidden');

    $(function () {
      testimonials_wrapper = $('.testimonials-wrapper')
      if (testimonials_wrapper.length < 1) return;
      
      $.extend(Servula, {
        testimonials : {
          step : 350,
          li_width : 116,
          strip_width : 848,
          duration : 700,
          texts_width : 650
        }
      });
      
      testimonials_image = new Image();
      testimonials_image.src = 'https://s3.amazonaws.com/servula/assets/wp/testimonials.png';
      
      timer = null;
      
      testimonials_wrapper.find('.testimonial-wrapper').on({
        mouseover : function(e) {
          clearTimeout(timer);
          t = $(this);
          key = t.data('testimonial-key');
          
          texts_wrapper = testimonials_wrapper.find('.testimonials-text-wrapper').removeClass('hidden tilted-left').width(Servula.testimonials.texts_width)

          // add .hidden to all the text_wrappers
          text_wrapper = texts_wrapper.find('.testimonial-text-wrapper').addClass('hidden').filter('[data-key="' + key + '"]')

          ul = testimonials_wrapper.find('ul');
          
          if (Servula.locale.is_rtl) {
            li_count              = ul.find('.testimonial-wrapper').length;
            lis_width             = Servula.testimonials.li_width * li_count;
            right_position_of_ul  = parseInt(ul.css('right'), 10);
            new_right             = lis_width - (t.position().left + Servula.testimonials.li_width) + right_position_of_ul + 49;

            if (new_right + Servula.testimonials.texts_width > 960) {
              overflow_right = new_right + Servula.testimonials.li_width - Servula.testimonials.texts_width;
              if (overflow_right < 0) {
                texts_wrapper.css('width', (new_right + Servula.testimonials.li_width) + 'px');
                new_right = 0;
              }
              else {
                new_right = overflow_right;
              }
              texts_wrapper.addClass('tilted-left');
            }

            texts_wrapper.css('right', new_right);
          }
          else {
            left_position_of_ul = parseInt(ul.css('left'), 10);
            new_left = t.position().left + left_position_of_ul + 49; // navigation arrow width

            if (new_left + Servula.testimonials.texts_width > 960) {
              overflow_left = new_left + Servula.testimonials.li_width - Servula.testimonials.texts_width;
              if (overflow_left < 0) {
                texts_wrapper.css('width', (new_left + Servula.testimonials.li_width) + 'px');
                new_left = 0;
              }
              else {
                new_left = overflow_left;
              }
              texts_wrapper.addClass('tilted-left');
            }

            texts_wrapper.css('left', new_left)
          }

          text_wrapper.removeClass('hidden');
          height = texts_wrapper.height();
          texts_wrapper.css('top', -20 - height);
        },
        
        mouseout : function(e) {
          timer = setTimeout(function () {
            testimonials_wrapper.find('.testimonials-text-wrapper').addClass('hidden');
          }, 500);
        }
      });
      
      testimonials_wrapper.on('mouseenter', '.testimonials-text-wrapper', function (e) { clearTimeout(timer); });
      testimonials_wrapper.on('mouseleave', function (e) {
        setTimeout(function() {
          testimonials_wrapper.find('.testimonials-text-wrapper').addClass('hidden');
        }, 300);
      });

      testimonials_wrapper.find('.testimonials-buttons-wrapper').on('mousedown', function (e) {
        left_attribute = Servula.locale.is_rtl ? 'right' : 'left'
        ul = testimonials_wrapper.find('ul');
        left = parseInt(ul.css(left_attribute));

        animation = {}    
        is_next = $(this).hasClass('testimonials-next-wrapper');
        if (is_next) {
          li_count = ul.find('.testimonial-wrapper').length;
          lis_width = Servula.testimonials.li_width * li_count;
          
          if (lis_width - (-left) - Servula.testimonials.step < Servula.testimonials.strip_width) {
            animation[left_attribute] = (Servula.testimonials.strip_width - lis_width) + 'px';
          }
          else {
            animation[left_attribute] = '-=' + Servula.testimonials.step + 'px';
          }
        }
        else {
          if (left + Servula.testimonials.step > 0) {
            animation[left_attribute] = '0px';
          }
          else {
            animation[left_attribute] = '+=' + Servula.testimonials.step + 'px';
          }
        }
        ul.stop(true, true).animate(animation, Servula.testimonials.duration);
      });
    });
  }

  /* Services page */
  if (body.hasClass('body-services-page')) {
    $('.page-services .service-column').on('change', '#service-example-group-select', function (e) {
      t = $(this);
      selected = t.find('option:selected').val();
      t.siblings('.service-example-group').addClass('hidden');
      t.siblings('#service-example-group-' + selected).removeClass('hidden');
    }).find('#service-example-group-select').trigger('change');
    
    $('.service-examples-wrapper li a').fancybox({
      titlePosition : 'inside'
    });
  }

  /* eBook page */
  if (body.hasClass('body-ebook-page')) {
    var icpForm5770 = $('#icpsignup5770');
    if (icpForm5770.length == 1) {
      icpForm5770.on('submit', function () {
        fname = icpForm5770.find('[name="fields_fname"]');
        if (fname.val() == "") {
          fname.focus();
          alert("The Name field is required.");
          return false;
        }
        
        email = icpForm5770.find('[name="fields_email"]');
        if (email.val() == "") {
          email.focus();
          alert("The Email field is required.");
          return false;
        }
        return true;
      });
    }
  }
});

/* eBook page */
var addthis_share = {
  url_transforms : {
    add: {
      source: 'addthis-email',
    }
  }
}

update_session_info = function (data) {
  if (typeof data == 'undefined') {
    logged_in = false;
  }
  else {
    logged_in = data.logged_in;
  }
  
  Servula.session_info.logged_in = logged_in;
  if (logged_in) {
    Servula.session_info.user = data.user;
    header = $('header')
    if (data.hasOwnProperty('strings')) {
      strings = data.strings;
    }
    else {
      strings = {
        credits_left : '<strong>' + parseInt(Servula.session_info.user.credits) + '</strong> Credits left',
      }
      
      if (Servula.session_info.user.services > 1) {
        strings.services_in_cart = '<strong>' + Servula.session_info.user.services + '</strong> Services in Cart';
      }
      else if (Servula.session_info.user.services == 1) {
        strings.services_in_cart = '<strong>1</strong> Service in Cart';
      }
      else {
        strings.services_in_cart = 'Cart is Empty';
      }
    }
    
    $('.header-credits-text', header).html(strings.credits_left);
    $('.header-services-in-cart', header).html(strings.services_in_cart);
    
    my_dashboard_wrapper = $('.my-dashboard-wrapper', header);
    
    $('.header-user-name',      my_dashboard_wrapper).text(Servula.session_info.user.name);
    $('.header-user-credits',   my_dashboard_wrapper).text(parseInt(Servula.session_info.user.credits));
    
    $('.header-dashboard-link', my_dashboard_wrapper).attr('href', Servula.system_url + '/users/' + Servula.session_info.user.id + '/');
    $('.header-edit-link',      my_dashboard_wrapper).attr('href', Servula.system_url + '/users/' + Servula.session_info.user.id + '/edit');
    
    $('.login-register-wrapper', header).addClass('hidden').filter('.my-dashboard-wrapper').removeClass('hidden');
    
    if (typeof $zopim !== 'undefined') {
      $zopim(function () {
        $zopim.livechat.set({
          name      : Servula.session_info.user.name,
          email     : Servula.session_info.user.email
        });
      });
    }
  }
}