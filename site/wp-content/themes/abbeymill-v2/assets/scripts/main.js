/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {
  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    common: {
      init: function() {
        // JavaScript to be fired on all pages

        var navBtn = document.querySelectorAll('.js-nav-btn');
        var html = document.querySelector('html');

        for (var i = 0; i < navBtn.length; i++) {
          navBtn[i].addEventListener('click', function() {
            if (html.classList.contains('nav-open')) {
              html.classList.remove('nav-open');
            } else {
              html.classList.add('nav-open');
            }
          });
        }
      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      },
    },
    // Home page
    home: {
      init: function() {
        // JavaScript to be fired on the home page
        $('.home-slider').slick({
          centerMode: true,
          centerPadding: '50px',
          slidesToShow: 1,
          responsive: [
            {
              breakpoint: 768,
              settings: {
                arrows: false,
                centerMode: true,
                centerPadding: '40px',
                slidesToShow: 3,
              },
            },
            {
              breakpoint: 480,
              settings: {
                arrows: false,
                centerMode: true,
                centerPadding: '40px',
                slidesToShow: 1,
              },
            },
          ],
        });

        $('.testimonial-slider').slick({
          arrows: false,
          dots: true,
        });
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      },
    },
    // About us page, note the change from about-us to about_us.
    about_us: {
      init: function() {
        // JavaScript to be fired on the about us page
      },
    },
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = funcname === undefined ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    },
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);
})(jQuery); // Fully reference jQuery after this point.
