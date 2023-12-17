/*
Theme Name: Nantria
Description: Multi-purpose HTML5 Template
Author: Erilisdesign
Theme URI: https://preview.erilisdesign.com/html/nantria/
Author URI: https://themeforest.net/user/erilisdesign
Version: 2.1.0
License: https://themeforest.net/licenses/standard
*/

/*------------------------------------------------------------------
[Table of contents]

1. Loader
2. Navigation
3. Navigation - Dropdown
4. Navigation - On scroll
5. Navigation - Navigation - Auto hide on scroll
6. Back to top
7. Backgrounds
8. Parallax Background
9. Masonry
10. Countdown
11. Subscribe Form
12. Contact Form
13. Bootstrap
-------------------------------------------------------------------*/

(function($) {
    "use strict";

  // Vars
  var _body = document.querySelector('body'),
    _siteNavbar = document.querySelector('.site-navbar'),
    _siteNavbarCollapse = document.querySelector('.site-navbar #navbarCollapse'),
    $siteNavbarToggler = $('.site-navbar .navbar-toggler-alternative'),
    $siteNavbarMenu = $('#navigation'),
    siteNavbar_base = _siteNavbar && _siteNavbar.hasAttribute('data-navbar-base') ? _siteNavbar.getAttribute('data-navbar-base') : '',
    siteNavbar_toggled = _siteNavbar && _siteNavbar.hasAttribute('data-navbar-toggled') ? _siteNavbar.getAttribute('data-navbar-toggled') : '',
    siteNavbar_scrolled = _siteNavbar && _siteNavbar.hasAttribute('data-navbar-scrolled') ? _siteNavbar.getAttribute('data-navbar-scrolled') : '',
    siteNavbar_expand = 992,
    siteNavbar_dropdownHover = true,
    siteNavbar_autoHide = _siteNavbar && _siteNavbar.classList.contains('site-navbar-autohide') ? _siteNavbar.classList.contains('site-navbar-autohide') : false,
    siteNavbar_autoHideDistance = 300,
    _backToTop = document.querySelector('.back-to-top');

  function getWindowWidth(){
    return Math.max($(window).width(), window.innerWidth);
  }

  function getWindowHeight(){
    return Math.max($(window).height(), window.innerHeight );
  }

  function getBodyWidth(){
    return Math.max( document.body.offsetWidth, document.documentElement.clientWidth, parseInt( window.getComputedStyle( document.body ).width, 10 ) );
  }

  function getScrollbarWidth(){
    if( getWindowWidth() === getBodyWidth() ){
      var scrollbarWidth = 0;
    } else {
      var scrollDiv = document.createElement('div');
      scrollDiv.className = 'modal-scrollbar-measure';
      document.body.appendChild(scrollDiv);
      var scrollbarWidth = scrollDiv.getBoundingClientRect().width - scrollDiv.clientWidth;
      document.body.removeChild(scrollDiv);
    }
    return scrollbarWidth;
  }

  function setOverflowScroll(){
    var html = document.documentElement;
    var body = document.body;
    var measureDiv = document.createElement('div');
    measureDiv.className = 'body-overflow-measure';
    body.appendChild(measureDiv);
    if ( ( window.getComputedStyle(html).overflowY !== 'visible' && window.getComputedStyle(html).overflowY !== 'hidden' ) && html.scrollHeight > html.clientHeight ){
      html.style.overflowY = 'scroll';
    } else if ( ( window.getComputedStyle(body).overflowY !== 'visible' && window.getComputedStyle(body).overflowY !== 'hidden' ) && body.scrollHeight > body.clientHeight ){
      body.style.overflowY = 'scroll';
    }
    body.removeChild(measureDiv);
  }
  setOverflowScroll();

  function resetScrollbar(){
    $html.css('overflow-y','');
    $body.css('overflow-y','');
  }

  function hideScrollbar(){
    $html.css('overflow-y','hidden');
    $body.css('overflow-y','hidden');
  }

  // [1. Loader]
  window.addEventListener( 'load', function(){
    document.querySelector('body').classList.add('loaded');
  });

  // [2. Navigation]
  function nantria_nav(){

    if( _siteNavbar ){

      // Navigation collapse
      $(_siteNavbarCollapse).on( 'show.bs.collapse', function(){
        _siteNavbar.classList.add('navbar-toggled-show');
        nantria_navigationChangeClasses('toggled');
      });

      $(_siteNavbarCollapse).on( 'hidden.bs.collapse', function(){
        _siteNavbar.classList.remove('navbar-toggled-show');

        if( _siteNavbar.classList.contains('scrolled') ){
          nantria_navigationChangeClasses('scrolled');
        } else {
          nantria_navigationChangeClasses();
        }
      });

      // Close nav on click outside of '.site-navbar'
      $(document).on( 'click touchstart', function(e){
        if ( $('.site-navbar').is(e.target) || $(e.target).parents('.site-navbar').length > 0 || $('.site-navbar').is(e.target) || $(e.target).hasClass('navbar-toggler') ){
          return;
        }

        if ( $siteNavbarToggler.attr('aria-expanded') === 'true' ){
          $siteNavbarToggler.trigger('click');
        }
      });

    }

    // Smooth Scroll
    var smoothScrollLinks = $('a.scrollto, .site-navbar a[href^="#"], .back-to-top');

    smoothScrollLinks.on('click', function(e) {
      var target;

      if($(this).hasClass('dropdown-toggle')){
		  return;
	  }

      // Make sure this.hash has a value before overriding default behavior
      if (this.hash !== "") {
        if( $( this.hash ).length > 0 ) {
          target = $(this).attr('href');

          if( $(this).parents('li').attr('data-menuanchor') ){
            target = $('[data-anchor="'+ target.substr(1) +'"]');
          } else if( $('[data-anchor="'+ target.substr(1) +'"]').length > 0 ){
            target = $('[data-anchor="'+ target.substr(1) +'"]');
          } else if( $(this).hasClass('back-to-top') ){
            target = 0;
          }
        }
      } else if( $(this).hasClass('back-to-top') ){
        target = 0;
      } else {
        return false;
      }

      if( target !== '' ){
        e.preventDefault();

        $.smoothScroll({
          offset: 0,
          easing: 'swing',
          speed: 800,
          scrollTarget: target,
          preventDefault: false
        });

        $(this).blur();
      }

    });
  }

  // [3. Navigation - Dropdown]
  function nantria_navDropdown(){

    // Close all submenus when dropdown is hiding
    $('.navbar-nav > .dropdown').on('hide.bs.dropdown', function () {
      var $submenus = $(this).find('.dropdown-submenu');

      $submenus.removeClass('show dropdown-target');
      $submenus.find('.dropdown-menu').removeClass('show');
    });

    // Add hovered class
    $('.navbar-nav > .dropdown').on('shown.bs.dropdown', function() {
      if (window.innerWidth > 991) {
        $(this).addClass('hovered');
      } else {
        $(this).removeClass('hovered');
      }
    });

    // Enable clicks inside dropdown
    $(document).on('click', '.navbar-nav > .dropdown', function (e) {
      e.stopPropagation();
    });

    // Dropdown
    var navbarDropdown = document.querySelectorAll('.navbar-nav > .dropdown, .navbar-nav .dropdown-submenu');

    [].forEach.call(navbarDropdown, function(dropdown) {
      'mouseenter mouseleave click'.split(' ').forEach(function(event) {
        dropdown.addEventListener(event, function(e) {
          if (window.innerWidth >= siteNavbar_expand && siteNavbar_dropdownHover === true ) {
            // Hover

            var _this = this;

            if( event === 'mouseenter' ){
              if( _this.classList.contains('dropdown') ){
                var toggle = _this.querySelector('[data-toggle="dropdown"]');

                if( _this.classList.contains('show') ){
                  $(toggle).dropdown('hide');
                  $(toggle).blur();
                } else {
                  $(toggle).dropdown('show');

                  e.stopPropagation();
                }
              } else if( _this.classList.contains('dropdown-submenu') ){
                if( $(_this).parent().find('.dropdown-target') ){
                  $(_this).parent().find('.dropdown-target.dropdown-submenu').removeClass('show dropdown-target');
                }

                _this.classList.add('hovered', 'show', 'dropdown-target');
              }
            } else {
              if( _this.classList.contains('dropdown') ){
                var toggle = _this.querySelector('[data-toggle="dropdown"]');

                $(toggle).dropdown('hide');
                $(toggle).blur();
              } else if( _this.classList.contains('dropdown-submenu') ){
                _this.classList.remove('show', 'dropdown-target');
              }
            }
          } else {
            // Click

            if( event === 'click' && e.target.classList.contains('dropdown-toggle') && e.target.parentNode.classList.contains('dropdown-submenu') ){
              if( e.target.parentNode.classList.contains('dropdown') ){
                return true;
              }

              e.stopPropagation();
              e.preventDefault();

              var _this = e.target,
                ddSubmenu = _this.parentNode,
                ddMenu = _this.nextElementSibling;

              if( ddSubmenu.classList.contains('show') ){

                ddSubmenu.classList.remove('show', 'dropdown-target');
                ddMenu.classList.remove('show');

                if( ddMenu.querySelectorAll('.dropdown-target').length > 0 ){
                  var submenuNodeList = ddMenu.querySelectorAll('.dropdown-target.dropdown-submenu'), i;

                  for (i = 0; i < submenuNodeList.length; ++i) {
                    submenuNodeList[i].classList.remove('show', 'dropdown-target');
                    submenuNodeList[i].querySelector('.dropdown-menu').classList.remove('show');
                  }
                }
              } else {
                if( ddSubmenu.parentNode.querySelectorAll('.dropdown-target').length > 0 ){
                  var submenuNodeList = ddSubmenu.parentNode.querySelectorAll('.dropdown-target.dropdown-submenu'), i;

                  for (i = 0; i < submenuNodeList.length; ++i) {
                    submenuNodeList[i].classList.remove('show', 'dropdown-target');
                    submenuNodeList[i].querySelector('.dropdown-menu').classList.remove('show');
                  }
                }

                ddSubmenu.classList.add('hovered', 'show', 'dropdown-target');
                ddMenu.classList.add('show');
              }
            }
          }
        });
      });
    });

  }

  // [4. Navigation - On scroll]
  function nantria_navOnScroll(){
    var scrollPos = $(window).scrollTop();

    if ( !_siteNavbar ){
      return;
    }

    if ( scrollPos > 0 ){
      if ( _siteNavbar.classList.contains('scrolled') ){
        return;
      }

      _siteNavbar.classList.add('scrolled');
      _siteNavbar.classList.remove('scrolled-0');

      if( _siteNavbar.classList.contains('navbar-toggled-show') ){
        nantria_navigationChangeClasses('toggled');
      } else {
        nantria_navigationChangeClasses('scrolled');
      }
    } else {
      _siteNavbar.classList.remove('scrolled');
      _siteNavbar.classList.add('scrolled-0');

      if( _siteNavbar.classList.contains('navbar-toggled-show') ){
        nantria_navigationChangeClasses('toggled');
      } else {
        nantria_navigationChangeClasses();
      }
    }
  }

  // [5. Navigation - Auto hide on scroll]
  function nantria_navAutoHideOnScroll() {
    if( siteNavbar_autoHide === true ){
      if( getWindowWidth() >= 576 ){
        var lastPos = 0,
          scrollDistance = 0,
          scrollDirection = 0,
          scrollDirection_UP = 8,
          scrollDirection_DOWN = 16,
          scrollDistance_A = 0,
          scrollDistance_count = 0;

        $(window).on('scroll', function(e){
          var currentPos = $(window).scrollTop();
          scrollDistance_count++;

          if (currentPos > lastPos){
            scrollDirection = scrollDirection_DOWN;

            if( scrollDistance_count === 1 ){
              scrollDistance_A = currentPos;
            }

            scrollDistance = currentPos - scrollDistance_A;
          } else {
            scrollDirection = scrollDirection_UP;
            scrollDistance_count = 0;
          }

          if( scrollDistance > siteNavbar_autoHideDistance & scrollDirection === scrollDirection_DOWN ){
            if( !_siteNavbar.classList.contains('navbar-toggled-show') ){
              _body.classList.add('site-navbar-hidden');

        // Hide all dropdowns
        if( _siteNavbar.querySelectorAll('.dropdown.show').length > 0 ){
          var dropdownNodeList = _siteNavbar.querySelectorAll('.dropdown.show [data-toggle="dropdown"]'), i;

          for (i = 0; i < dropdownNodeList.length; ++i) {
            $(dropdownNodeList[i]).dropdown('hide');
          }
        }
      }
          } else {
            _body.classList.remove('site-navbar-hidden');
          }

          lastPos = currentPos;
        });
      } else {
        _body.classList.remove('site-navbar-hidden');
      }
    }
  }

  function nantria_navigationResize(){
    if( _siteNavbar.length === 0 ){
      return;
    }

    var scrollPos = $(window).scrollTop();

    if( getWindowWidth() >= siteNavbar_expand ){
      if ( $siteNavbarToggler.attr('aria-expanded') == 'true' ){
        _siteNavbar.classList.remove('navbar-toggled-show');
        _siteNavbarCollapse.classList.remove('show');
        _siteNavbarCollapse.style.display = '';
        $siteNavbarToggler.attr('aria-expanded','false').addClass('collapsed');
      }
    }

    if ( scrollPos > 0 ){
      _siteNavbar.classList.add('scrolled');
      _siteNavbar.classList.remove('scrolled-0');

      if( _siteNavbar.classList.contains('navbar-toggled-show') ){
        nantria_navigationChangeClasses('toggled');
      } else {
        nantria_navigationChangeClasses('scrolled');
      }
    } else {
      _siteNavbar.classList.remove('scrolled');
      _siteNavbar.classList.add('scrolled-0');

      if( _siteNavbar.classList.contains('navbar-toggled-show') ){
        nantria_navigationChangeClasses('toggled');
      } else {
        nantria_navigationChangeClasses();
      }
    }
  }

  var nav_event_old;
  function nantria_navigationChangeClasses(nav_event,target){
    if( nav_event_old === nav_event && !( nav_event == '' || nav_event == undefined ) && nav_event !== 'section' )
      return;

    if( nav_event === 'toggled' && siteNavbar_toggled ){
      _siteNavbar.classList.remove('navbar-light', 'navbar-dark', siteNavbar_base, siteNavbar_scrolled);
      _siteNavbar.classList.add(siteNavbar_toggled);
    } else if( nav_event === 'scrolled' && siteNavbar_scrolled ){
      _siteNavbar.classList.remove('navbar-light', 'navbar-dark', siteNavbar_base, siteNavbar_toggled);
      _siteNavbar.classList.add(siteNavbar_scrolled);
    } else if( nav_event === 'section' ){
      var siteNavbar_section = target.attr('data-navbar');

    if( siteNavbar_section ){
      _siteNavbar.classList.remove('navbar-light', 'navbar-dark', siteNavbar_base,siteNavbar_toggled,siteNavbar_scrolled);
      _siteNavbar.classList.add( siteNavbar_section );
      } else {
        _siteNavbar.classList.remove('navbar-light', 'navbar-dark', siteNavbar_toggled,siteNavbar_scrolled);
        _siteNavbar.classList.add( siteNavbar_base );
      }
    } else {
      if(siteNavbar_base){
        _siteNavbar.classList.remove('navbar-light', 'navbar-dark', siteNavbar_toggled,siteNavbar_scrolled);
        _siteNavbar.classList.add(siteNavbar_base);
      }
    }

  if( _siteNavbar.classList.contains('navbar-light') ){
      $('[data-on-navbar-light]').each(function(){
        var el = $(this),
          el_light = el.attr('data-on-navbar-light') ? el.attr('data-on-navbar-light') : '',
          el_dark = el.attr('data-on-navbar-dark') ? el.attr('data-on-navbar-dark') : '';

        el.removeClass(el_dark).addClass(el_light);
      });
  } else if( _siteNavbar.classList.contains('navbar-dark') ) {
      $('[data-on-navbar-dark]').each(function(){
        var el = $(this),
          el_light = el.attr('data-on-navbar-light') ? el.attr('data-on-navbar-light') : '',
          el_dark = el.attr('data-on-navbar-dark') ? el.attr('data-on-navbar-dark') : '';

        el.removeClass(el_light).addClass(el_dark);
      });
  }

    nav_event_old = nav_event;
  }

  // [6. Back to top]
  function nantria_backToTop() {
    if( _backToTop ){
      var currentPos = $(window).scrollTop();

      if( currentPos > 400 ){
        _backToTop.classList.add('show');
      } else {
        _backToTop.classList.remove('show');
      }
    }
  }

  // [7. Backgrounds]
  function nantria_backgrounds(){

    // Image
    var _bgImageNodeList = document.querySelectorAll('.bg-image-holder'), i;

    if( _bgImageNodeList.length > 0 ){
      for (i = 0; i < _bgImageNodeList.length; ++i) {
        var src = _bgImageNodeList[i].querySelector('img').hasAttribute('src') ? _bgImageNodeList[i].querySelector('img').getAttribute('src') : '';

        _bgImageNodeList[i].style.backgroundImage = 'url('+src+')';
        _bgImageNodeList[i].querySelector('img').style.display = 'none';
      }
    }

    // Video Background
    if( _body.classList.contains('mobile') ){
      $('.video-wrapper').css('display', 'none');
    }

  }

  // [8. Parallax Background]
  function nantria_parallaxBG() {
    var windowHeight = window.innerHeight || document.documentElement.clientHeight,
      scrollTop = Math.max(window.pageYOffset, document.documentElement.scrollTop, document.body.scrollTop),
      bottomWindow = scrollTop + windowHeight,
      speedDivider = 0.25;

    $('.bg-parallax').each(function() {
      var parallaxElement = $(this),
        parallaxHeight = parallaxElement.outerHeight(),
        parallaxTop = parallaxElement.offset().top,
        parallaxBottom = parallaxTop + parallaxHeight,
        parallaxWrapper = parallaxElement.parents('.overlay-advanced'),

        section = parallaxElement.parents('section'),
        sectionHeight = parallaxElement.parents('section').outerHeight(),
        offSetTop = scrollTop + section[0].getBoundingClientRect().top,
        offSetPosition = windowHeight + scrollTop - offSetTop;
        
      if (offSetPosition > 0 && offSetPosition < (sectionHeight + windowHeight)) {
        var value = ((offSetPosition - windowHeight) * speedDivider);

        if (Math.abs(value) < (parallaxHeight - sectionHeight)) {
          parallaxElement.css({
            "transform" : "translate3d(0px, " + value + "px, 0px)",
            "-webkit-transform" : "translate3d(0px, " + value + "px, 0px)"
          });
        } else {
          parallaxElement.css({
            "transform" : "translate3d(0px, " + parallaxHeight - sectionHeight + "px, 0px)",
            "-webkit-transform" : "translate3d(0px, " + parallaxHeight - sectionHeight + "px, 0px)"
          });
        }
      }
    });
  }

  // [9. Masonry]
  function nantria_masonryLayout(){
    if ($('.masonry-container').length > 0) {
      var $masonryContainer = $('.masonry-container'),
        $columnWidth = $masonryContainer.data('column-width');

      if($columnWidth == null){
        var $columnWidth = '.masonry-item';
      }

      $masonryContainer.isotope({
        filter: '*',
        animationEngine: 'best-available',
        resizable: false,
        itemSelector : '.masonry-item',
        masonry: {
          columnWidth: $columnWidth
        },
        animationOptions: {
          duration: 750,
          easing: 'linear',
          queue: false
        }
      });

      // layout Isotope after each image loads
      $masonryContainer.imagesLoaded().progress( function() {
        $masonryContainer.isotope('layout');
      });
    }

    $('nav.masonry-filter a').on('click', function(e) {
      e.preventDefault();

      var selector = $(this).attr('data-filter');
      $masonryContainer.isotope({ filter: selector });
      $('nav.masonry-filter a').removeClass('active');
      $(this).addClass('active');

      return false;
    });
  }

  // [10. Countdown]
  function nantria_countdown(){
    var countdown = $('.countdown[data-countdown]');

    if (countdown.length > 0) {
      countdown.each(function() {
        var $countdown = $(this),
          finalDate = $countdown.data('countdown');
        $countdown.countdown(finalDate, function(event) {
          $countdown.html(event.strftime(
            '<div class="countdown-container row"><div class="col-6 col-sm-auto"><div class="countdown-item"><div class="number">%-D</div><span class="title">Day%!d</span></div></div><div class="col-6 col-sm-auto"><div class="countdown-item"><div class="number">%H</div><span class="title">Hours</span></div></div><div class="col-6 col-sm-auto"><div class="countdown-item"><div class="number">%M</div><span class="title">Minutes</span></div></div><div class="col-6 col-sm-auto"><div class="countdown-item"><div class="number">%S</div><span class="title">Seconds</span></div></div></div>'
          ));
        });
      });
    }
  }

  // [11. Subscribe Form]
  function nantria_subscribeForm(){
    var $subscribeForm = $('.subscribe-form');

    if ( $subscribeForm.length > 0 ){
      $subscribeForm.each( function(){
        var el = $(this),
          elResult = el.find('.subscribe-form-result');

        el.find('form').validate({
          submitHandler: function(form) {
            elResult.fadeOut( 500 );

            $(form).ajaxSubmit({
              target: elResult,
              dataType: 'json',
              resetForm: true,
              success: function( data ) {
                elResult.html( data.message ).fadeIn( 500 );
                if( data.alert != 'error' ) {
                  $(form).clearForm();
                  setTimeout(function(){
                    elResult.fadeOut( 500 );
                  }, 5000);
                };
              }
            });
          }
        });

      });
    }
  }

  // [12. Contact Form]
  function nantria_contactForm(){
    var $contactForm = $('.contact-form');

    if ( $contactForm.length > 0 ){
      $contactForm.each( function(){
        var el = $(this),
          elResult = el.find('.contact-form-result');

        el.find('form').validate({
          submitHandler: function(form) {
            elResult.fadeOut( 500 );

            $(form).ajaxSubmit({
              target: elResult,
              dataType: 'json',
              success: function( data ) {
                elResult.html( data.message ).fadeIn( 500 );
                if( data.alert != 'error' ) {
                  $(form).clearForm();
                  setTimeout(function(){
                    elResult.fadeOut( 500 );
                  }, 5000);
                };
              }
            });
          }
        });

      });
    }
  }

  // [13. Typed text]
  function nantria_typedText(){
    var toggle = document.querySelectorAll('[data-toggle="typed"]');

    function init(el) {
      var elementOptions = el.dataset.options;
          elementOptions = elementOptions ? JSON.parse(elementOptions) : {};
      var defaultOptions = {
        typeSpeed: 40,
        backSpeed: 40,
        backDelay: 3000,
        loop: true
      }
      var options = Object.assign(defaultOptions, elementOptions);

      new Typed(el, options);
    }

    if (typeof Typed !== 'undefined' && toggle) {
      [].forEach.call(toggle, function(el) {
        init(el);
      });
    }

  }

  // [14. Bootstrap]
  function nantria_bootstrap() {


    // Botostrap Tootltips
    $('[data-toggle="tooltip"]').tooltip();

    // Bootstrap Popovers
    $('[data-toggle="popover"]').popover();

    // Modals
    $('.modal').on('show.bs.modal', function(e){
      var scrollbarWidth = getScrollbarWidth();
      hideScrollbar();
      $body.css('padding-right',scrollbarWidth);
      $('.site-navbar.site-navbar-absolute').css('right',scrollbarWidth);
      $('.site-navbar.site-navbar-fixed').css('right',scrollbarWidth);
    });

    $('.modal').on('hidden.bs.modal', function(e){
      resetScrollbar();
      $body.css('padding-right','');
      $('.site-navbar.site-navbar-absolute').css('right','');
      $('.site-navbar.site-navbar-fixed').css('right','');

      setOverflowScroll();
    });

  }

  $(document).ready(function($){
    nantria_nav();
    nantria_navDropdown();
    nantria_navOnScroll();
    nantria_navAutoHideOnScroll();
    nantria_backToTop();
    nantria_backgrounds();
    nantria_masonryLayout();
    nantria_countdown();
    nantria_subscribeForm();
    nantria_contactForm();
    nantria_typedText();
    nantria_bootstrap();
  });

  $(window).on('load', function(){

    // For parallax background
    var resizeTimer;
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(function() {
      $(window).trigger('resize');
    }, 100);
  });

  $(window).on('resize', function(){
     nantria_navOnScroll();
     nantria_navAutoHideOnScroll();
     nantria_backToTop();
  });

  $(window).on('scroll', function(){
    nantria_navOnScroll();
    nantria_backToTop();
  });

  $(window).on('scroll resize', function() {
    if(!_body.classList.contains('mobile')){
      nantria_parallaxBG();
    }
  });

})(jQuery);