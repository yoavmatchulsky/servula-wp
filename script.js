$(function () {
  contact_dialog = $('#contact-dialog');
  contact_dialog.find('.questions p').addClass('hidden');
  contact_dialog.on('mousedown', 'h3', function(e) {
    t = $(this);
    answer = t.next('.answer');
    contact_dialog.find('.questions .answer').not(answer).hide('fast', function () { answer.show('fast'); });
  });

  $('a[href="#contact-dialog"]').fancybox({
    width : 691,
    height : 500,
    padding : 0,
    autoDimensions : false,
    
    onComplete : function () {
      contact_dialog.find('.questions p').addClass('answer')
      contact_dialog.find('.questions .answer').hide().removeClass('hidden');
    }
  });

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
});
