$(function () {
  $('.page-services .service-column').on('change', '#service-example-group-select', function (e) {
    t = $(this);
    selected = t.find('option:selected').val();
    t.siblings('.service-example-group').addClass('hidden');
    t.siblings('#service-example-group-' + selected).removeClass('hidden');
  });
  
  $('.service-examples-wrapper li a').fancybox();
});
