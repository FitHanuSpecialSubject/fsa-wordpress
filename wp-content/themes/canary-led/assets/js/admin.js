"use strict";

var _wp = wp,
    apiFetch = _wp.apiFetch;
jQuery(function ($) {
  var redirectToKitPage = function redirectToKitPage(res) {
    window.location = "".concat(window.canary_led.canary_led_demo_import_page);
  }; // Activate plugins.


  $(document).on('click', '.canary-led-activate-plugin', function () {
    $(this).html('<span class="dashicons dashicons-update"></span> Loading...').addClass('canary-led-importing-plugin');
    apiFetch({
      path: '/wp/v2/plugins/one-click-demo-import/one-click-demo-import',
      method: 'POST',
      data: {
        "status": "active"
      }
    }).then(function (res) {
      apiFetch({
        path: '/wp/v2/plugins/theme-canary-demo-import/theme-canary-demo-importer',
        method: 'POST',
        data: {
          "status": "active"
        }
      }).then(function (res) {
      apiFetch({
        path: '/wp/v2/plugins/jetpack/jetpack',
        method: 'POST',
        data: {
          "status": "active"
        }
      }).then(function (res) {
        apiFetch({
        path: '/wp/v2/plugins/contact-form-7/wp-contact-form-7',
        method: 'POST',
        data: {
          "status": "active"
        }
      }).then(function (res) {
        redirectToKitPage(res);
      }).then(function (res) {
        redirectToKitPage(res);
      }).then (function (res){
        redirectToKitPage(res);
        });
      })["catch"](function () {
        redirectToKitPage({});
      });
    })["catch"](function () {
      redirectToKitPage({});
    });
    })["catch"](function () {
      redirectToKitPage({});
    });
  });
  
  $(document).on('click', '.canary-led-install-plugin', function () {
    $(this).html('<span class="dashicons dashicons-update"></span> Loading...').addClass('canary-led-importing-plugin');
    apiFetch({
      path: '/wp/v2/plugins',
      method: 'POST',
      data: {
        "slug": "one-click-demo-import",
        "status": "active"
      }
    }).then(function (res) {
      apiFetch({
        path: '/wp/v2/plugins',
        method: 'POST',
        data: {
          "slug": "theme-canary-demo-import",
          "status": "active"
        }
      }).then(function (res) {
      apiFetch({
        path: '/wp/v2/plugins',
        method: 'POST',
        data: {
          "slug": "jetpack",
          "status": "active"
        }
      }).then(function (res) {
      apiFetch({
        path: '/wp/v2/plugins',
        method: 'POST',
        data: {
          "slug": "contact-form-7",
          "status": "active"
        }
      }).then(function (res) {
        redirectToKitPage(res);
      }).then(function (res) {
        redirectToKitPage(res);
      }).then(function (res) {
        redirectToKitPage(res);
      });
      })["catch"](function () {
        redirectToKitPage({});
      });
    })["catch"](function () {
      redirectToKitPage({});
    });
    })["catch"](function () {
      redirectToKitPage({});
    });
  });

  $(document).on('click', '.canary-led-admin-notice .notice-dismiss', function () {
    console.log(ajaxurl + "?action=canary_led_hide_theme_info_noticebar&canary-led-nonce-name=".concat(window.canary_led.canary_led_nonce));
    apiFetch({
      url: ajaxurl + "?action=canary_led_hide_theme_info_noticebar&canary-led-nonce-name=".concat(window.canary_led.canary_led_nonce),
      method: 'POST'
    }).then(function (res) {
      console.log(res);
    })["catch"](function (res) {
      console.log(res);
    });
  });
});
