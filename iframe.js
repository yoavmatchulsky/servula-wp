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

      if (Servula.iframe.order_now_href != null) {
        $('a.order-now').attr('href', Servula.iframe.order_now_href)
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
