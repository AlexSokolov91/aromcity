$(function () {

/***
  ** Filters Slide-Up
  **/

$('.filters-toggle').click(function() {

  $('html').addClass('filters-open');

  var filters = $(this).siblings('.catalog-filter');

  // hide on click outside filters
  $(document).on('mouseup touchend', function(e) {

    if (!filters.is(e.target) && filters.has(e.target).length === 0) {

      $('html').removeClass('filters-open');

    }

  });

});


/***
  ** Ratings
  **/

(function($) {

  $.fn.SetRatingStar = function(o,val) {
    var $this=this.find('span'),v=parseFloat(val),s=0;
    if(typeof o.callback!=='undefined'){if(parseFloat(this.find(o.input).val())!==v)o.callback(v);}
    $this.each(function() {
    s=parseInt($(this).data('rating'));$(this).removeClass('full');$(this).removeClass('half');
    if (Math.ceil(v)>=s){if(Math.ceil(v)>=s&&v<(s)){$(this).addClass('half');}else{$(this).addClass('full');}}
    });this.find(o.input).val(v);this.attr('data-val',v);
  };

  $.fn.RatingStar = function(options) {
    if(this.find('span').length===0){
      var $this=this,html=(typeof $this.data('input')==='undefined')?'<input type="hidden" name="vue" class="rating-value" />':'';
      var o=$.extend({
        stars:(typeof $this.data('stars')==='undefined')?5:parseInt($this.data('stars')),
        val:(typeof $this.data('val')==='undefined')?0:parseFloat($this.data('val')),
        change:(typeof $this.data('change')==='undefined')?true:$this.data('change'),
        input:(typeof $this.data('input')==='undefined')?'.rating-value':$this.data('input')
      }, options );$this.attr('data-input',o.input);/*console.log(o);*/
      for(var i=o.stars;i>0;i--)html=html+"<span class='"+(o.change?'star':'static')+"' data-rating='"+i+"'"+(o.change?' title="'+i+'"':'')+" ></span>"; $this.append(html);
      if(o.change) $this.find('span').on('click', function() {$this.SetRatingStar(o,$(this).data('rating'));});
      $this.SetRatingStar(o,o.val);return $this;
    }
  }

}(jQuery));


$('.product__rating').find('.rating').each(function(){
  $(this).RatingStar({change: false});
});


$('.leave-comment__rating').find('.rating').each(function(){
  $(this).RatingStar({change: true});
});


/***
  ** Search
  **/

$('#search input[name=\'search\']').parent().find('button').on('click', function() {
  var url = $('base').attr('href') + 'index.php?route=product/search';

  var value = $('#search input[name=\'search\']').val();

  if (value) {
    url += '&search=' + encodeURIComponent(value);
  }

  location = url;
});

$('#search input[name=\'search\']').on('keydown', function(e) {
  if (e.keyCode == 13) {
    $('header #search input[name=\'search\']').parent().find('button').trigger('click');
  }
});



/***
  ** Menu Toggle
  **/

$(".main-nav-toggle").click(function() {

  var mainNavBtn = $(this).toggleClass("on");
  var mainNav = $(".main-nav__wrapper").slideToggle();

  $(document).on('mouseup touchend', function(e) {

    // if the target of the click isn't the nav nor navBtn
    if (!mainNav.is(e.target) && mainNav.has(e.target).length === 0
      && !mainNavBtn.is(e.target) && mainNavBtn.has(e.target).length === 0) {

        mainNav.slideUp();
        mainNavBtn.removeClass('on');

    }

  });

  return false;
});


/**
** Magnific Popup
**/

// кнопки 'корзина' и 'добавить в корзину'
$('.add-to-cart, .cart-show-up').magnificPopup({
  type: 'inline',
  mainClass: 'mfp-cart',
  closeBtnInside: true,
  fixedContentPos: true,
  closeMarkup: '<button title="%title%" type="button" class="mfp-close"><span></span><span></span></button>',
  tClose: "Закрыть"
});

// продолжить покупки
$('.cart-continue').click(function(){
  $.magnificPopup.close();
});

// обратный звонок
$('.callback-show-up').magnificPopup({
  type: 'inline',
  mainClass: 'mfp-cart',
  closeBtnInside: true,
  fixedContentPos: true,
  closeMarkup: '<button title="%title%" type="button" class="mfp-close"><span></span><span></span></button>',
  tClose: "Закрыть"
});



/**
** Timer
**/

var now = new Date(),
secPassed = now.getHours() * 60 * 60 + now.getMinutes() * 60 + now.getSeconds();
var t = (60 * 60 * 24) - secPassed;

$('.timer').countdown({
    until: (t),
    labels: ['Годы', 'Месяцы', 'Недели', 'Дни', 'Часов', 'Минут', 'Секунд'],
    format: 'HMS',
    layout: '<span class="time-descr">До конца распродажи осталось:</span>' +
            '<ul class="time">' +
                '<li class="time-item">' +
                    '<div class="time-num"><div><span>{h10}</span></div><div><span>{h1}</span></div></div>' +
                    '<span class="time-text">часов</span>' +
                '</li>' +
                '<li class="time-item">' +
                    '<div class="time-num"><div><span>{m10}</span></div><div><span>{m1}</span></div></div>' +
                    '<span class="time-text">минут</span>' +
                '</li>' +
                '<li class="time-item">' +
                    '<div class="time-num"><div><span>{s10}</span></div><div><span>{s1}</span></div></div>' +
                    '<span class="time-text">секунд</span>' +
                '</li>' +
            '</ul>'
});


/**
** Slideshow Main Page
**/

$('.slideshow').find('.js-slider').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  rows: 0,
  speed: 1000,
  autoplay: true,
  autoplaySpeed: 4000,
  infinite: true,
  arrows: true,
  nextArrow: '.slider-arrow-next',
  prevArrow: '.slider-arrow-prev',
  responsive: [
    {
      breakpoint: 1199,
      settings: {
        arrows: false,
        dots: true
      }
    }
  ]
});


/***
  ** Similar Products Slider
  **/

$('.similar-products-slider').find('.js-similar-products').slick({
  slidesToShow: 4,
  slidesToScroll: 1,
  rows: 0,
  speed: 1000,
  infinite: true,
  autoplay: true,
  pauseOnHover: false,
  autoplaySpeed: 2000,
  arrows: false,
  dots: false,
  responsive: [
    {
      breakpoint: 1199,
      settings: {
        slidesToShow: 3
      }
    },
    {
      breakpoint: 991,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 767,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});


/**
** Smooth Scroll
**/

var smoothOffset = 0;

$('.selector').find("a[href*='#']:not([href='#'])").click(function() {
  if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
    || location.hostname == this.hostname) {

      // offset specified in data attribute 'data-smooth-offset'
      var scrollOn = $(this).data('smoothOffset') ? $(this).data('smoothOffset') : smoothOffset;

      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top - scrollOn
        }, 1000);
        return false;
      }
  }
});



/**
** Magnific Popup Custom Popup
**/

// $('.mfp-order-link').magnificPopup({
//   type: 'inline',
//   closeBtnInside: true,
//   fixedContentPos: true,
//   alignTop: true,
//   mainClass: 'mfp-specific-class',
//   callbacks: {

//     open: function() {

//       // Will fire when this exact popup is opened
//       // this - is Magnific Popup object
//       $('.mfp-order-form').find('.caviar-weight').text(this.st.el.parent().find('.caviar-weight').text());
//       $('.mfp-order-form').find('.caviar-price').text(this.st.el.parent().find('.caviar-price').text());

//     },

//     beforeOpen: function() {

//       if(matchMedia("(max-width: 767px)").matches) {

//         this.st.alignTop = false;
//         this.st.fixedContentPos = true;
//         // and just add some css styles in corresponding media query for mfp-content with specified class

//       } else {

//       }

//     },

//     close: function() {
//       // Will fire when popup is closed
//     }

//   }
// });


/**
** Magnific Popup Policy
**/

$('.policy-link').magnificPopup({
  type: 'inline',
  closeBtnInside: true,
  fixedContentPos: true
});



var slideShowImgs = $('.slideshow').find('.slider__item img');

/**
** Media Query Events via JavaScript
**/

//
// 1200px
//
// on document.ready
if(matchMedia("(max-width: 1199px)").matches) {



  } else {



}
//
// on window.resize
matchMedia("(max-width: 1199px)").addListener(function(mql) {

  if(mql.matches) {



  } else {



  }

});



//
// 992px
//
// on document.ready
if(matchMedia("(max-width: 991px)").matches) {



} else {

  $('html').removeClass('filters-open');

}
//
// on window.resize
matchMedia("(max-width: 991px)").addListener(function(mql) {

  if(mql.matches) {



  } else {

    $('html').removeClass('filters-open');

  }

});

//
// 768px
//
// on document.ready
if(matchMedia("(max-width: 767px)").matches) {

  slideShowImgs.each(function(){
    $(this).attr('src', $(this).data('tablet'));
  });

} else {

  slideShowImgs.each(function(){
    $(this).attr('src', $(this).data('pc'));
  });

  $('.main-nav').find('li.dropdown').each(function(){
    $(this).children('a').click(function(e){
      e.preventDefault();
    });
  });

}
//
// on window.resize
matchMedia("(max-width: 767px)").addListener(function(mql) {

  if(mql.matches) {

    slideShowImgs.each(function(){
      $(this).attr('src', $(this).data('tablet'));
    });

    $('.main-nav').find('li.dropdown').each(function(){
      $(this).children('a').unbind('click');
    });

  } else {

    slideShowImgs.each(function(){
      $(this).attr('src', $(this).data('pc'));
    });

    $('.main-nav').find('li.dropdown').each(function(){
      $(this).children('a').click(function(e){
        e.preventDefault();
      });
    });

  }

});

//
// 576px
//
// on document.ready
if(matchMedia("(max-width: 575px)").matches) {



} else {



}
//
// on window.resize
matchMedia("(max-width: 575px)").addListener(function(mql) {

  if(mql.matches) {



  } else {



  }

});


//
// 320px
//
// on document.ready
if(matchMedia("(max-width: 320px)").matches) {

  slideShowImgs.each(function(){
    $(this).attr('src', $(this).data('mobile'));
  });

} else {



}
//
// on window.resize
matchMedia("(max-width: 320px)").addListener(function(mql) {

  if(mql.matches) {

    slideShowImgs.each(function(){
      $(this).attr('src', $(this).data('mobile'));
    });

  } else {

    slideShowImgs.each(function(){
      $(this).attr('src', $(this).data('tablet'));
    });

  }

});


/**
** Mobile Device Detection via JavaScript
**/

// var isApple = navigator.platform.match(/(Mac|iPhone|iPod|iPad)/i) ? true : false;
// if (isApple) {

//   var appleButtons = document.querySelectorAll(".g-btn");
//   for (var i = 0; i < appleButtons.length; i++) {
//     appleButtons[i].classList.add('iShitButton');
//   }

// }

// if( /Android/i.test(navigator.userAgent) ) {

//   var androidButtons = document.querySelectorAll(".g-btn");
//   for (var i = 0; i < androidButtons.length; i++) {
//       androidButtons[i].classList.add('androidShitButton');
//   }

// }


});
