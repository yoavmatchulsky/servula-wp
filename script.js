$(function () {
  // Check for placeholder support
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
});

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
