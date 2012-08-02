$(function () {
  contact_dialog = $('#contact-dialog');
  contact_dialog.find('.questions p').addClass('hidden');
  contact_dialog.on('mousedown', 'h3', function(e) {
    t = $(this);
    answer = t.next('.answer');
    contact_dialog.find('.questions .answer').not(answer).hide('fast', function () { answer.show('fast'); });
  });

  $('a[data-support-dialog]').fancybox({
    width : 691,
    height : 500,
    padding : 0,
    autoDimensions : false,
    
    onComplete : function () {
      contact_dialog.find('.questions p').addClass('answer')
      contact_dialog.find('.questions .answer').hide().removeClass('hidden');

      live_chat_src = 'http://www.google.com/talk/service/badge/Show' + '?tk=z01q6amlqaj4ogvcdo71ipl40564s1j7kfi6m3iub0giimeh34mstc79nqv0q' + '9vt3biqfvh3qr94diuog7hie1mspjh4rtkt8mtt' + '5me5l9p4plmit0c4jhrl1bnkilbr4fvv0m0u8mrobrtsoun0rrg0qudphqe2j8fbcp90m&amp;w=200&amp;h=60';
      contact_dialog.find('.rightcolumn iframe').attr('src', live_chat_src);
    }
  }).attr('href', '#contact-dialog');

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
});
