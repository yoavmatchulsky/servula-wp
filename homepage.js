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
    
    $('.start-shopping-button').on('click', function (e) {
      location.href = Servula.system_url;
    });
    
    $('#homepage-wrapper .floor').on('mouseover', function(e) {
      t = $(this);
      src = t.data('image-over');
      t.siblings('img').attr('src', src);
    }).each(function(i, floor) {
      src = $(floor).data('image-over')
      if (src) {
        i = new Image();
        i.src = src;
      }
    });
    
    $('#bee-wrapper').on('mouseleave', function(e) {
      img = $(this).find('img');
      orig_src = img.data('image-original');
      img.attr('src', orig_src);      
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
