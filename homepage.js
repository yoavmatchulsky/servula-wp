(function() {
  jQuery(function() {
    $('.login-register-wrapper').on({
      'mouseenter': function(e) {
        var p;
        p = $(this).find('.login-form-wrapper');
        return p.stop(true, true).hide().removeClass('hidden').slideDown('fast');
      },
      'mouseleave': function(e) {
        var p;
        p = $(this).find('.login-form-wrapper');
        return p.stop(true, true).addClass('hidden');
      }
    });
    
    $('#homepage-wrapper .floor').on('mouseover', function(e) {
      t = $(this);
      src = t.data('image-over');
      t.siblings('img.bee-image').attr('src', src);
      t.siblings('.our-process').hide(0);
      
      data_text_id = t.data('text-id');
      if (data_text_id) {
        text_obj = $('#' + data_text_id);
        if (text_obj.length > 0) {
          text_obj.show(0);
          text_wrapper = t.siblings('.bee-text-wrapper').show(0);
          text_css = { 'top' : t.data('text-top') }
          text_right = t.data('text-right');
          text_wrapper.css(text_css);
          text_wrapper.find('.floor-text').not(text_obj).hide(0);
        }
      }
    }).each(function(i, floor) {
      src = $(floor).data('image-over')
      if (src) {
        i = new Image();
        i.src = src;
      }
    });
    
    $('#bee-wrapper').on('mouseleave', function(e) {
      t = $(this);
      img = t.find('img.bee-image');
      orig_src = img.data('image-original');
      img.attr('src', orig_src);
      t.find('.our-process').show(0);
      t.find('.bee-text-wrapper').hide(0).find('.floor-text').hide(0);
    });
    
    $('.service-item img').each(function (i, obj) {
      image = $(obj);
      image.data('image-original', image.attr('src'));
      i = new Image();
      i.src = image.data('image-over');
    });

    $('.services-column').on({
      mouseover : function(e) {
        imgs = $(this).find('img');
        imgs.each(function (i, obj) {
          img = $(obj);
          img.attr('src', img.data('image-over'));
        });
      },
      mouseout : function(e) {
        imgs = $(this).find('img');
        imgs.each(function(i, obj) {
          img = $(obj);
          img.attr('src', img.data('image-original'));
        });
      }
    });
  });
}).call(this);
