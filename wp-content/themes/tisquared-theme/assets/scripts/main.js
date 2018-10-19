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
    'common': {
      init: function() {
        // JavaScript to be fired on all pages
      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    // About us page, note the change from about-us to about_us.
    'about_us': {
      init: function() {
        // JavaScript to be fired on the about us page
      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
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
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

  var timeoutId;
  var $videoBgAspect = $(".videobg-aspect");
  var $videoBgWidth = $(".videobg-width");
  var videoAspect = $videoBgAspect.outerHeight() / $videoBgAspect.outerWidth();

  function videobgEnlarge() {
    windowAspect = ($(window).height() / $(window).width());
    if (windowAspect > videoAspect) {
      $videoBgWidth.width((windowAspect / videoAspect) * 100 + '%');
    } else {
      $videoBgWidth.width(100 + "%");
    }
  }

  $(window).resize(function() {
    clearTimeout(timeoutId);
    timeoutId = setTimeout(videobgEnlarge, 100);
  });

  $(function() {
    videobgEnlarge();
  });

  var disableScroll = false;
  var scrollPosScroll = 0;

  function disable_scroll() {
    $("html, body").css("overflow", "hidden");
    disableScroll = true;
    scrollPosScroll = $(window).scrollTop();
  }

  // Enable scroll
  function enable_scroll() {
    $("html,body").css("overflow", "auto");
    $("html").css("height", "auto");
    disableScroll = false;
  }

  $(function(){
    $(window).bind('scroll', function(){
      if(disableScroll) {
        $(window).scrollTop(scrollPosScroll );
      }
    });
    $(window).bind('touchmove', function(){
      $(window).trigger('scroll');
    });
  });

  // $('select').styler({
  //   onSelectClosed: function() {
  //     // к открытому селекту добавляется красная обводка
  //     $('.jq-selectbox__select-text').css('color', '#191f22');
  //   }
  // });

  $('select').selectmenu({
    change: function( event, ui ) {
      $(this).next().find('.ui-selectmenu-text').css('color','#191f22;');
    }
  });

  /*OnResize*/
  $(window).resize(function() {
    SelectWidth();
  });

  /*Select Width*/
  SelectWidth();
  function SelectWidth() {
    var Select = $('.ui-selectmenu-button');
    var SelectWidth;
    var NavWidth;

    Select.each(function () {
      SelectWidth = $(this).outerWidth();
      NavWidth = SelectWidth - 1;
      var dataTarget = $(this).attr('aria-owns');
      // console.log(dataTarget);
      // console.log($('#'+dataTarget).parent('.ui-selectmenu-menu'));
      if ($(window).width() >= 992) {
        $('#'+dataTarget).parent('.ui-selectmenu-menu').css('width',''+NavWidth+'px');
      } else {
        $('#'+dataTarget).parent('.ui-selectmenu-menu').css('width',''+SelectWidth+'px');
      }
    });

  }


  $('input[type="radio"], input[type="checkbox"]').styler({});

  if($('.hero-overview video').length) {
    $(window).on('load', function () {
      var videoProcess = document.getElementById("process-video");
      videoProcess.play();
    });
  }

  var header = $('.main-header');
  var topPanelSize = header.innerHeight();
  var windowOffset = $(window).scrollTop();
  console.log(windowOffset);

  $(window).on('load', function () {
    if(windowOffset !== 0 && !header.hasClass('main-header--fixed')) {
      header.addClass('main-header--fixed');
    }
  });
  $(window).scroll(function() {
    var scrollPos = $(this).scrollTop();
    if (scrollPos > topPanelSize) {
      header.addClass('main-header--fixed');
    } else {
      if(!$('body').hasClass('page-template-template-process')) {
        header.removeClass('main-header--fixed');
      }
    }
  });

  var homeBannerSetion = $('.homepage-banner');
  var homeBannerContent = $('.homepage-banner-content');

  $('.home-banner-scroll-link--js').on('click', function() {
    var top = ($('.logos-section').offset().top - 86);

    if($(window).innerWidth() <= 768) {
      var top = ($('.logos-section').offset().top - 74);
    }
    $('body, html').animate({scrollTop: top}, 700);
    if(!header.hasClass('main-header--fixed')) {
      header.addClass('main-header--fixed');
    }
  });

  $('.page-banner-company .page-banner__btn a').on('click', function() {
    var id  = $(this).attr('href');
    var top = ($(id).offset().top) - 100;
    $('body, html').animate({scrollTop: top}, 700);
    if(!header.hasClass('main-header--fixed')) {
      header.addClass('main-header--fixed');
    }
  });

  var objectForAnimationMenuItem = {
    transform: 'translateX(0)',
    transition: 'all 0.5s ease-in-out 0.5s',
    opacity: '1'
  };
  var part = $('.full-page-nav__item');

  $(window).on('load', function () {
    homeBannerContent.addClass('is-ready');

    $('.logos-section, .industries-section, .industries-tabs-list, .process-section-header, .footer-main, .carousel-home, .process-tab-container').viewportChecker({
      classToAdd: 'visible'
    });

    animationItem(part, objectForAnimationMenuItem );

  });



  //Tabs
  $('.industries-tabs-list li:first > a').addClass('active-tab');

  if($(window).innerWidth() <= 639) {
    var textActiveTab = $('.industries-tabs-list li:first > a').addClass('active-tab').text();
    $('.tab-mobile-activetab').text(textActiveTab);
  }

  var firsActive = $('.active-tab').data('content-target');
  $('.tab-content').children('[data-content-tab="'+firsActive+'"]').addClass('is-ready').fadeIn(500);
  $('.nav-tab-left').addClass('disabled');

  $('.industries-tabs-list__item a').on('click', function (e) {
    e.stopPropagation();
    e.preventDefault();
    if(!$(this).hasClass('active-tab')) {
      var thisTarget = $(this).data('content-target');
      var thisTargetContent = $('.tab-content').children('[data-content-tab="'+thisTarget+'"]');
      $('.industries-tabs-list__item a').removeClass('active-tab');
      $('.tab-content .tab-content-item').removeClass('is-ready').fadeOut('slow');
      thisTargetContent.addClass('is-ready').fadeIn('slow');
      $(this).addClass('active-tab');
    }
    $('.nav-tab-left').removeClass('disabled');
    $('.nav-tab-right').removeClass('disabled');

    if($(this).parent('.industries-tabs-list__item').next().index() === -1) {
      $('.is-ready .nav-tab-left').removeClass('disabled');
      $('.is-ready .nav-tab-right').addClass('disabled');
    }
    if($(this).parent('.industries-tabs-list__item').next().index() === 1) {
      $('.is-ready .nav-tab-right').removeClass('disabled');
      $('.is-ready .nav-tab-left').addClass('disabled');
    }

    if($(window).innerWidth() <= 639) {
      if($('.industries-tabs-list').hasClass('open')) {
        $('.industries-tabs-list').slideUp().removeClass('open');
      }

      $('.tab-mobile-activetab').removeClass('open');
      $('.tab-mobile-btn').removeClass('btn-rotated');

      var textActiveTabN = $('.active-tab > h2').text();
      $('.tab-mobile-activetab').text(textActiveTabN);
    }


  });

  //Tab arrow navigation
  $('.nav-tab-right').on('click', function (e) {
    e.stopPropagation();
    e.preventDefault();
    var activeTab = $('.industries-tabs-list__item .active-tab');
    var activeTabContent = $('.tab-content .is-ready');
    var index = activeTab.parent('.industries-tabs-list__item').next().index();
    if(!$(this).hasClass('disabled') && activeTab.parent('.industries-tabs-list__item').next()) {
      $('.nav-tab-left').removeClass('disabled');
      $('.industries-tabs-list__item a').removeClass('active-tab');
      $('.tab-content .tab-content-item').removeClass('is-ready').fadeOut('slow');
      activeTab.parent('.industries-tabs-list__item').next().eq(0).find('a').addClass('active-tab');
      activeTabContent.next().eq(0).addClass('is-ready').fadeIn('slow');
    }
    if(index === 4) {
      $('.is-ready .nav-tab-right').addClass('disabled');
    }

    if($(window).innerWidth() <= 639) {
      $('.tab-mobile-activetab').removeClass('open');
      $('.industries-tabs-list').removeClass('open').slideUp();
      $('.tab-mobile-btn').removeClass('btn-rotated');

      var textActiveTabN = $('.active-tab > h2').text();
      $('.tab-mobile-activetab').text(textActiveTabN);
    }

  });

  $('.nav-tab-left').on('click', function (e) {
    e.stopPropagation();
    e.preventDefault();
    var activeTab = $('.industries-tabs-list__item .active-tab');
    var activeTabContent = $('.tab-content .is-ready');
    var index = activeTab.parent('.industries-tabs-list__item').next().index();
    if(!$(this).hasClass('disabled') && activeTab.parent('.industries-tabs-list__item').prev()) {
      $('.nav-tab-right').removeClass('disabled');
      $('.industries-tabs-list__item a').removeClass('active-tab');
      $('.tab-content .tab-content-item').removeClass('is-ready').fadeOut('slow');
      activeTab.parent('.industries-tabs-list__item').prev().eq(0).find('a').addClass('active-tab');
      activeTabContent.prev().eq(0).addClass('is-ready').fadeIn('slow');
    } if(index === 2) {
      $('.is-ready .nav-tab-left').addClass('disabled');
    }

    if($(window).innerWidth() <= 639) {
      $('.industries-tabs-list').removeClass('open').slideUp();
      $('.tab-mobile-activetab').removeClass('open');
      $('.tab-mobile-btn').removeClass('btn-rotated');

      var textActiveTabN = $('.active-tab > h2').text();
      $('.tab-mobile-activetab').text(textActiveTabN);
    }


  });

  //Mobile tab

  if($(window).innerWidth() <= 639) {
    $('.tab-mobile-btn').on('click', function () {
      $('.industries-tabs-list').addClass('open').slideToggle();
      $('.tab-mobile-activetab').toggleClass('open');
      $(this).toggleClass('btn-rotated');
    })
  }

  //Process tab
  $('.process-tabs li:first').addClass('active-tab');
  var prFirsActive = $('.process-tabs .active-tab').data('process-step');
  $('.process-home-img').children('[data-process-target="'+prFirsActive+'"]').addClass('is-ready').fadeIn('slow');
  $('.process-step-content').children('[data-process-target="'+prFirsActive+'"]').addClass('is-ready').slideDown();
  $('.process-tabs li a').on('click', function (e) {
    e.stopPropagation();
    e.preventDefault();
    if(!$(this).parent('.process-tabs__item').hasClass('active-tab')) {
      $('.process-tabs__item').removeClass('active-tab');
      var thisProcessTarget = $(this).parent('.process-tabs__item').data('process-step');
      var thisProcessTargetContent = $('.process-step-content').children('[data-process-target="'+thisProcessTarget+'"]');
      var thisProcessTargetImg = $('.process-home-img').children('[data-process-target="'+thisProcessTarget+'"]');
      $('.process-step-content .process-tab-content').removeClass('is-ready').slideUp();
      $('.process-home-img .process-home-img__inner').removeClass('is-ready').fadeOut('slow');
      thisProcessTargetContent.addClass('is-ready').slideDown();
      thisProcessTargetImg.addClass('is-ready').fadeIn('slow');
      $(this).parent('.process-tabs__item').addClass('active-tab');
    }
  });

  //Home slider
  $('.slider-list').slick({
    centerMode: true,
    variableWidth: true,
    dots: true,
    appendArrows: $('.carousel-home-arrow-container'),
    slidesToShow: 1,
    appendDots: $('.slider-navigation'),
    prevArrow: '<button type="button" class="slick-prev"></button>',
    nextArrow: '<button type="button" class="slick-next"></button>',
    responsive: [
      {
        breakpoint: 800,
        settings: {
          variableWidth: false,
          slidesToShow: 1,
          centerMode: false
        }
      }
    ]
  });


  if($(window).innerWidth() <= 767) {
    $('.logo-list').slick({
      dots: true,
      slidesToShow: 3,
      prevArrow: '<button type="button" class="slick-prev"></button>',
      nextArrow: '<button type="button" class="slick-next"></button>',
      responsive: [
        {
          breakpoint: 640,
          settings: {
            slidesToShow: 1
          }
        }
      ]
    });
  }

  //Process page

  if($('.page-template-template-process'.length)) {
    function defPosMegaMenu(items, transformStep, transformIter) {
      var transform;
      if (transformIter) {
        transform = transformIter;
      } else {
        transform = 0;
      }
      items.each(function () {
        $(this).css({'transform': 'translateX(' + transform + 'px)', 'opacity': '0'});
        transform += transformStep;
      });
    }
    function animationItem(items, objectCss) {
      items.css(objectCss);
    }

    defPosMegaMenu(part, -100, 0);

    $('#fullpage').fullpage({
      showActiveTooltip: true,
      fixedElements: '.main-header, .procces-scroll-link',
      lockAnchors: true,
      afterLoad: function (anchorLink, index) {
        console.log('first log', index);
        var scrollLink = $('.procces-scroll-link--js');
        $('.full-page-nav__item a').removeClass('active');
        var loadedSection = $(this);
        if(!loadedSection.hasClass('hero-overview') && !$('.full-page-nav').hasClass('dark-menu')) {
          $('.main-header').addClass('main-header--fixed');
          $('.full-page-nav').addClass('dark-menu');
          $('.procces-scroll-link').addClass('dark-scroll');
        }

        if(index === $('.section').length) {
          $('.procces-scroll-link--js').hide();
          $('.procces-scroll-link--top').show();
          $('.procces-scroll-link--top').on('click', function (e) {
            e.preventDefault();
            e.stopPropagation();
            $.fn.fullpage.moveTo(1);
            $('.procces-scroll-link--top').hide();
            $('.procces-scroll-link--js').show();
          });
        }
        else {
          $('.procces-scroll-link--top').hide();
          $('.procces-scroll-link--js').show();
        }
        if(index === 1) {
          $('.main-header').removeClass('main-header--fixed');
          $('.full-page-nav').removeClass('dark-menu');
          $('.procces-scroll-link').removeClass('dark-scroll');
        } else {
          $('.main-header').addClass('main-header--fixed');
        }
        var thisDataSection = $(this).data('menu-target');
        var loadedMenuTarget = $('.full-page-nav__item').children('[data-target-sc="'+thisDataSection+'"]');
        loadedMenuTarget.addClass('active');
      }
    });

    $('.procces-scroll-link--js').on('click',function (e) {
      console.log('');
      e.preventDefault();
      e.stopPropagation();
      $.fn.fullpage.moveSectionDown();
    });

    var evenSection = $('.section:not(.hero-overview):nth-child(even)');
    var oddSection = $('.section:not(.hero-overview):nth-child(odd)');
    oddSection.addClass('odd-fn-section');
    evenSection.addClass('even-fn-section');
    $('.full-page-nav__item a').on('click', function (e) {
      e.preventDefault();
      e.stopPropagation();
      var ActiveLink = $('.full-page-nav__item a.active');
      var activeTarget = $(this).data('target-sc');
      var activeSection = $('#fullpage').children('[data-menu-target="'+activeTarget+'"]');
      if(!$(this).hasClass('active')) {
        var indexSectionTarget = activeSection.index() + 1;
        $('.full-page-nav__item a').removeClass('active');
        $(this).addClass('active');
        $.fn.fullpage.moveTo(indexSectionTarget);
      } else {
        console.log('false');
      }
    });
  }

  // Industries

  if($('.page-template-template-industries').length) {
    var pageBanner = $('.page-banner');
    $(window).on('load', function () {
      pageBanner.addClass('is-ready');

      $('.service-content').viewportChecker({
        classToAdd: 'visible'
      });

    });
  }

  if($('.page-template-template-company').length) {
    var pageBanner = $('.page-banner');
    var companySubhero = $('.company-subhero');
    $(window).on('load', function () {
      pageBanner.addClass('is-ready');
      companySubhero.addClass('is-ready');

      $('.company-subhero__inner, .leadership-company, .about-section, .jobs-section').viewportChecker({
        classToAdd: 'visible'
      });

    });

    $('.leadership-list').slick({
      dots: false,
      infinite: true,
      speed: 500,
      slidesToShow: 2,
      arrows: false,
      variableWidth: true,
      responsive: [
        {
          breakpoint: 640,
          settings: {
            slidesToShow: 1
          }
        }
      ]
    });

    $('.slick-slide').mousedown(function () {
      $('.touch-btn').fadeOut();
    });

    $('.leadership-list').on('swipe', function(event, slick, direction){
      $('.touch-btn').fadeIn();
    });

    $('.plus-desc').on('click', function (e) {
      e.preventDefault();
      e.stopPropagation();
      if(!$(this).parents('.leadership-list__item').hasClass('description-is-opened') && !$(this).hasClass('plus-desc--close')) {
        $('.leadership-list__item').removeClass('description-is-opened');
        $('.plus-desc').removeClass('.plus-desc--close');
        $(this).parents('.leadership-list__item').addClass('description-is-opened');
        $(this).addClass('plus-desc--close');
      } else {
        $(this).parents('.leadership-list__item').removeClass('description-is-opened');
        $(this).removeClass('plus-desc--close');
      }
    });
  }

  if($('.single-jobs').length) {
    var pageBanner = $('.page-banner');
    $(window).on('load', function () {
      pageBanner.addClass('is-ready');

      $('.candidate-experience, .careers-form-inner').viewportChecker({
        classToAdd: 'visible'
      });
    });
    var fileNameFild = $('.file-name');
    // var fieldBK = $('input[type="file"]');
    // var fieldBKWrp = $('input[type="file"]').parents('.wpcf7-form-control-wrap');
    $("input[type=file]").each(function() {
      if($(this).val() === "") {
        $(this).attr('disabled', 'disabled');
      }
    });

    $('.upload-file-label').on('click', function (e) {
      $("input[type=file]").each(function() {
        $(this).removeAttr('disabled');
      });
    });

    $('input[type="file"]').on('change', function () {
      var fileName = this.files[0].name+'';
      var a =  fileName+'<div class="file-name-del"></div>';
      fileNameFild.append(a);
      $('.file-name-del').fadeIn();
    });

    $('.file-name').on('click','.file-name-del',function (e) {
      e.preventDefault();
      e.stopPropagation();
      $('.file-name').text('');
    });

    $('.wpcf7').on('wpcf7:mailsent', function (e) {
      $('.file-name').text('');
      $('.jq-radio, .jq-checkbox').removeClass('checked');
    });

    $('.wpcf7').on('wpcf7:invalid', function (e) {
      $('.file-name').text('');
      $('.jq-radio, .jq-checkbox').removeClass('checked');
    });

  }

  if($('.error404').length) {
    $(window).on('load', function () {
      $('.page404-container').viewportChecker({
        classToAdd: 'visible'
      });

    });
  }

  if($('.page-template-template-contact').length) {
    var pageBanner = $('.page-banner');
    $(window).on('load', function () {
      pageBanner.addClass('is-ready');
      $('.contact-info-section').addClass('visible');

      $('.contact-info-section, .contact-page-main').viewportChecker({
        classToAdd: 'visible'
      });
    });

    $('.wpcf7').on('wpcf7:mailsent', function (e) {
      $('.jq-selectbox__dropdown ul li').removeClass('selected').removeClass('sel');
    });

    $('.wpcf7').on('wpcf7:invalid', function (e) {
      $('.jq-selectbox__dropdown ul li').removeClass('selected').removeClass('sel');
    });
  }

  if($('.page-template-template-quote').length) {
    var pageBanner = $('.page-banner');
    $(window).on('load', function () {
      pageBanner.addClass('is-ready');
      // $('.file-wrapper-multiple input[type="file"]').attr('multiple', '');

      $('.wpcf7-response-output.wpcf7-display-none').appendTo('.custom-output-message');

      $('.request-page-main').viewportChecker({
        classToAdd: 'visible'
      });

    });

    $("input[type=file]").each(function() {
      if($(this).val() === "") {
        $(this).attr('disabled', 'disabled');
      }
    });

    $('.upload-file-label').on('click', function (e) {
      $("input[type=file]").each(function() {
        $(this).removeAttr('disabled');
      });
    });

    $('input[type="file"]').on('change', function () {
      var fileList = $('.file-list');
      var listFiles = this.files;
      var FilesList = Object.assign({}, listFiles);
      console.log(FilesList);
      $('.file-list .file-name').remove();
      while (fileList.hasChildNodes) {
        fileList.removeChild(div.firstChild);
      }
      for (var i = 0; i < this.files.length; i++) {
        var a = this.files[i].name;
        fileList.append('<div class="file-name"><div class="file-name__inner">'+a+'</div></div>');
      }
      // $('.file-list .file-name').on('click','.file-name-del',function (e) {
      //   e.preventDefault();
      //   e.stopPropagation();
      //   var thisIndex = $(this).data('indexfile');
      //   delete FilesList[thisIndex];
      //   $('input[type="file"]').val(FilesList);
      //   console.log($('input[type="file"]').val(FilesList));
      //   $(this).parents('.file-name').remove();
      // });

    });

    $('.file-name').on('click','.file-name-del',function (e) {
      e.preventDefault();
      e.stopPropagation();
      $('.file-name').text('');
    });

    $('.wpcf7').on('wpcf7:mailsent', function (e) {
      $('.file-list .file-name').remove();
      $('.jq-radio, .jq-checkbox').removeClass('checked');
      $('.jq-selectbox__dropdown ul li').removeClass('selected').removeClass('sel');
    });

    $('.wpcf7').on('wpcf7:invalid', function (e) {
      $('.file-list .file-name').remove();
      $('.jq-radio, .jq-checkbox').removeClass('checked');
      $('.jq-selectbox__dropdown ul li').removeClass('selected').removeClass('sel');
    });

  }

  if($('.page-template-template-education').length) {
    var pageBanner = $('.page-banner');
    var subSection = $('.education-subsection-wrapper');
    $(window).on('load', function () {
      pageBanner.addClass('is-ready');
      subSection.addClass('is-ready');
      $('.education-about').viewportChecker({
        classToAdd: 'visible'
      });
    });

  }

  //Mobile menu

  if($(window).innerWidth() <= 1023) {
    $('.btn-menu').on('click', function (e) {
      e.preventDefault();
      e.stopPropagation();
      $(this).toggleClass('menu-btn-open');
      $('.menu-container').toggleClass('open');

      if(!$('body').hasClass('page-template-template-process')) {
        if (!$(this).hasClass('menu-btn-open') && !$('.menu-container').hasClass('open')) {
          enable_scroll();
        } else {
          disable_scroll();
        }
      }
    });
  }
})(jQuery); // Fully reference jQuery after this point.
