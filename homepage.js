(function() {
  jQuery(function($) {
    $('.tabs').tabs({
      selected : 0,
      fx : { height : 'toggle', duration : 'slow'}
    }).find('.tabs-content .hidden').removeClass('hidden');
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
