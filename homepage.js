(function() {
  jQuery(function($) {
    $('.tabs').tabs({
      selected : 0,
      fx : { height : 'toggle', duration : 'slow'}
    });
  });
}).call(this);

$(function () {
  testimonials_wrapper = $('.testimonials-wrapper')
  if (testimonials_wrapper.length < 1) return;
  
  $.extend(Servula, {
    testimonials : {
      step : 350,
      li_width : 116,
      strip_width : 848,
      duration : 700
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
      
      texts_wrapper = testimonials_wrapper.find('.testimonials-text-wrapper').removeClass('hidden tilted-left')

      // add .hidden to all the text_wrappers
      text_wrapper = texts_wrapper.find('.testimonial-text-wrapper').addClass('hidden').filter('[data-key="' + key + '"]')

      ul = testimonials_wrapper.find('ul');
      left_position_of_ul = parseInt(ul.css('left'));
      new_left = t.position().left + left_position_of_ul + 49;
      if (new_left + 400 > 960) {
        new_left -= 300;
        texts_wrapper.addClass('tilted-left');
      }

      texts_wrapper.css('left', new_left)
      text_wrapper.removeClass('hidden');
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
