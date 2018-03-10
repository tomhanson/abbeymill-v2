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

(function ($) {
  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    common: {
      init: function () {
        // JavaScript to be fired on all pages

        var navBtn = document.querySelectorAll('.js-nav-btn');
        var html = document.querySelector('html');

        for (var i = 0; i < navBtn.length; i++) {
          navBtn[i]
            .addEventListener('click', function () {
              if (html.classList.contains('nav-open')) {
                html
                  .classList
                  .remove('nav-open');
              } else {
                html
                  .classList
                  .add('nav-open');
              }
            });
        }
        window
          .addEventListener('scroll', function () {
            if (window.scrollY > (window.innerHeight / 3)) {
              document
                .querySelector('html')
                .classList
                .add('scrolling');
            } else {
              document
                .querySelector('html')
                .classList
                .remove('scrolling');
            }
          })

        var data = {
          'action': 'my_action',
          'whatever': 1234
        };
        var ajaxurl = 'http://abbeymill-latest.test/wp-admin/admin-ajax.php';

        function checkFetchingClass() {

          var html = document.querySelector('html');
          // if it doesnt contain the class fetching then add it and return true, else
          // return false
          if (!html.classList.contains('fetching-data')) {
            html
              .classList
              .add('fetching-data');
            return true;
          }
          return false;
        }
        function removeFetchingClass() {
          var html = document.querySelector('html');
          html
            .classList
            .remove('fetching-data');
        }

        function requestData(type, page) {
          var fetching = checkFetchingClass();
          if (fetching) {
            $.ajax({
              url: "//" + window.location.host + "/wp-admin/admin-ajax.php",
              type: 'post',
              data: {
                action: 'my_action',
                type: type,
                page: page
              },
              success: function (data) {
                //if data is empty prevent furhter requests
                if (data === '') {
                  var scrollWrapSold = document.querySelector('.js-infinite-scroll-sold');
                  if (scrollWrapSold) {
                    window.removeEventListener('scroll', checkScrollSold);
                  } else {
                    window.removeEventListener('scroll', checkScrollDev);
                  }
                  removeFetchingClass();
                  return;
                }
                var container = document.querySelector('.js-property-data');
                //setup the html
                var html = '<div class="flex lazy-loaded">' + data + '</div>'
                container.innerHTML += html;
                //increase the page count for the enxt review
                count++;
                //remove the lazy load class
                setTimeout(function () {
                  document
                    .querySelector('.lazy-loaded')
                    .classList
                    .remove('lazy-loaded');
                }, 300)
                //remove the fetching class
                removeFetchingClass();

              }
            })
          }

        }
        var count = 2;
        function checkScrollSold() {
          var body = document.body;

          if ((window.innerHeight + window.scrollY) >= (document.body.offsetHeight - 100)) {
            // you're at the bottom of the page
            requestData('Sold', count);
          }
          return;
        }
        function checkScrollDev() {
          var body = document.body;

          if ((window.innerHeight + window.scrollY) >= (document.body.offsetHeight - 100)) {
            // you're at the bottom of the page
            requestData('Development', count);
          }
          return;
        }
        //check container exists
        var scrollWrapSold = document.querySelector('.js-infinite-scroll-sold');
        var scrollWrapDev = document.querySelector('.js-infinite-scroll-dev');
        if (scrollWrapSold) {
          window.addEventListener('scroll', checkScrollSold);
        }
        if (scrollWrapDev) {
          window.addEventListener('scroll', checkScrollDev);
        }

      },
      finalize: function () {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    // Home page
    home: {
      init: function () {
        // JavaScript to be fired on the home page
        $('.home-slider').slick({
          centerMode: true, centerPadding: '50px', slidesToShow: 1,
          // responsive: [   {     breakpoint: 768,     settings: {       arrows: false,
          // centerMode: true,       centerPadding: '40px',       slidesToShow: 3, }, }, {
          //     breakpoint: 480,     settings: {       arrows: false, centerMode: true,
          // centerPadding: '40px',       slidesToShow: 1,     },  }, ],
        });

        var element = document.getElementById('section:content-block');
        var target = document.getElementById('js-home-scroll');
        var scrollDistance = target.offsetTop;
        target.addEventListener('click', function () {
          $('html, body').animate({
            scrollTop: scrollDistance
          }, 400)
        });
        $('.testimonial-slider').slick({arrows: false, dots: true});
      },
      finalize: function () {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    // About us page, note the change from about-us to about_us.
    our_portfolio: {
      init: function () {
        // JavaScript to be fired on the about us page
        var containerEl = document.querySelector('#js-tiles');

        var mixer = mixitup(containerEl);
      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function (func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = funcname === undefined
        ? 'init'
        : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function () {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function (i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);
})(jQuery); // Fully reference jQuery after this point.