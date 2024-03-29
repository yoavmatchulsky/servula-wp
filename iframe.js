jQuery(function() {
  var _error;
  try {
    var parent = window.parent;
    if (typeof Servula !== "undefined" && Servula !== null && parent.servula_info != null) {
      Servula.iframe = parent.servula_info;

      if (Servula.iframe.trigger_resize != null && typeof Servula.iframe.trigger_resize === 'function') {
        $('body').on('servula:iframe:resize', function() {
          Servula.iframe.trigger_resize();
        });
      }

      if (Servula.iframe.trigger_loaded != null && typeof Servula.iframe.trigger_loaded === 'function') {
        $('body').on('servula:iframe:loaded', function() {
          Servula.iframe.trigger_loaded();
        });
      }

      order_now_links = $('a.order-now').attr('target', '_top');
      if (Servula.iframe.order_now_href != null) {
        order_now_links.attr('href', Servula.iframe.order_now_href);
      }
    }
  } catch (_error) {
    console && console.warn("I can't access my parent!", _error);
  } finally {
    if (Servula.iframe == null) {
      Servula.iframe = {};
    }
  }
});
