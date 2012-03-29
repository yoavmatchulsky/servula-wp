$(function () {
  $('.login-register-wrapper').on('click', function (e) {
    p = $(this).find('.login-form-wrapper');
    if (p.is('.hidden') && !p.hasClass('my-dashboard-wrapper')) {
      e.stopPropagation();
    }
    p.toggleClass('hidden');
  });
  
  $(document.body).on('click', function (e) {
    p = $('.login-register-wrapper .login-form-wrapper');
    if (!p.is('.hidden')) {
      p.addClass('hidden');
    }
  });
  
  $('.login-register-wrapper .login-form-wrapper').on('click', function (e) {
    e.stopPropagation();
  });
});
