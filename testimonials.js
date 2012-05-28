$(function () {
  testimonials_wrapper = $('.testimonials-wrapper')
  if (testimonials_wrapper.length < 1) return;
  
  testimonials_wrapper.find('.testimonial-wrapper img').each(function (i, obj) {
    image = $(obj);
    image.data('image-original', image.attr('src'));
    
    i = new Image();
    i.width = 109;
    i.height = 144;
    i.src = image.data('image-over');
  });
  
  timer = null;
  
  testimonials_wrapper.find('.testimonial-wrapper').on({
    mouseover : function(e) {
      clearTimeout(timer);
      t = $(this);
      img = t.find('img');
      img.attr('src', img.data('image-over'));

      key = t.data('testimonial-text');
      title = t.find('.testimonial-title').clone();
      title.find('.testimonial-company').remove();
      title.find('.testimonial-position').removeClass('hidden');
      text = Servula.testimonials.texts[key];
      text_div = $('<div />').text(text);
      
      text_wrapper = testimonials_wrapper.find('.testimonials-text-wrapper');
      text_wrapper.empty().append(title, text_div);

      ul = testimonials_wrapper.find('ul');
      left_position_of_ul = parseInt(ul.css('left'));
      new_left = t.position().left + left_position_of_ul + 49;
            
      text_wrapper.css('left', new_left).removeClass('hidden');
    },
    mouseout : function(e) {
      t = $(this);
      img = t.find('img');
      img.attr('src', img.data('image-original'));
      
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

  $.extend(Servula.testimonials, {
    step : 300,
    li_width : 116,
    strip_width : 848,
    duration : 700
  });
  
  testimonials_wrapper.find('.testimonials-buttons-wrapper').on('mousedown', function (e) {
    ul = testimonials_wrapper.find('ul');
    left = parseInt(ul.css('left'));
    
    is_next = $(this).hasClass('testimonials-next-wrapper');
    if (is_next) {
      li_count = ul.find('.testimonial-wrapper').length;
      lis_width = Servula.testimonials.li_width * li_count;
      
      if (lis_width - (-left) - Servula.testimonials.step < Servula.testimonials.strip_width) {
        animation = { left : (Servula.testimonials.strip_width - lis_width) + 'px' }
      }
      else {
        animation = { left : '-=' + Servula.testimonials.step + 'px' };
      }
    }
    else {
      if (left + Servula.testimonials.step > 0) {
        animation = { left : '0px' };
      }
      else {
        animation = { left : '+=' + Servula.testimonials.step + 'px' };
      }
    }
    ul.stop(true, true).animate(animation, Servula.testimonials.duration);
  });
});
