$("body").addClass("modal-open");
$(window).on("load", function () {
  $(".loading-page__logo").fadeOut();
  $(".loading-page").delay(350).fadeOut("slow");
  $("body").removeClass("modal-open");
  // if ($("body").is(".home")) {
    setTimeout(function () {
      new WOW().init();
    }, 500);
  // }
});

$(document).ready(function () {
  /*----Get Header Stick ---*/
  var header_sticky = $("header.-fix");
  $(window).scroll(function () {
    $(this).scrollTop() > 5
      ? header_sticky.addClass("is-active")
      : header_sticky.removeClass("is-active");
  });

  $(window).scrollTop() > 5
      ? header_sticky.addClass("is-active")
      : header_sticky.removeClass("is-active");


  /*----Menu---*/
  $(".nav__mobile--close").click(function (e) {
    $(".nav__mobile").removeClass("active");
    $("body").removeClass("modal-open");
  });
  $(".menu-mb__btn").click(function (e) {
    e.preventDefault();
    if ($("body").hasClass("modal-open")) {
      $(".menu-mb__btn").removeClass("active");
      $(".nav__mobile").removeClass("active");
      $("body").removeClass("modal-open");
    } else {
      $(".menu-mb__btn").addClass("active");
      $("body").addClass("modal-open");
      $(".nav__mobile").addClass("active");
    }
  });
  $(document).on("click", "body", function (e) {
    if (
      !$(e.target).parents().hasClass("menu-mb__btn") &&
      !$(e.target).closest(".nav__mobile__content").length
    ) {
      $(".menu-mb__btn, .nav__mobile").removeClass("active");
      $("body").removeClass("modal-open");
    }
  });

  // back top top
  $(".back-to-top").click(function (e) {
    $("html, body").animate({ scrollTop: 0 }, 1000);
  });

  $(window).scroll(function () {
    var scrollTop = $(window).scrollTop();
    if (scrollTop > 150) {
      $(".back-to-top").fadeIn();
    } else {
      $(".back-to-top").fadeOut();
    }
  });

  // js custom toggle
  $(".js-toggle").each(function () {
    let jsBtn = $(this).find(".js-toggle-btn");
    let jsShow = $(this).find(".js-toggle-show");
    jsBtn.on("click", function (e) {
      e.preventDefault();
      $(this).toggleClass("is-active");
      jsShow.toggleClass("is-active");
    });
  });

  // anchor link
  var jump = function (e) {
    $(document).off("scroll");
    if (e) {
      var url = $(this).attr("href");
      var id = url.substring(url.lastIndexOf("/") + 1);
      target = id;
    } else {
      var target = location.hash;
    }

    if ($(target).offset() != undefined) {
      $("html, body")
        .stop()
        .animate({
          scrollTop: $(target).offset().top,
        });
      location.hash = target;
    }
  };

  jump();

  $(document).on("click", 'a[href^="#"]', function (event) {
    $('a[href^="#"]').parent().removeClass("active");
    $(this).parent().addClass("active");
    $(".menu-mb__btn").removeClass("active");
    $(".nav__mobile").removeClass("active");
    $("body").removeClass("modal-open");
  });
});

/*************************/
function isInt(n) {
   return parseInt(n) === n
}
function number__toFixed(value) {
    return isInt(value) ? value : value.toFixed(1);
}

$(document).on('click', '.quantity.s1 input[type="button"]' ,quantity_input);

function quantity_input(argument) {
  var input = $(this);
  var input_type = 'plus'
  if($(this).hasClass('minus')) input_type = 'minus'

  var input_number =  $(this).parent('.quantity').find('input[type="number"]');
  var input_number_val = (input_number.val()) ? parseFloat(input_number.val()) : 0
  // Get Setting
  var step = (input_number.attr('step')) ? parseFloat(input_number.attr('step')) : 1
  var min = (input_number.attr('min')) ? parseFloat(input_number.attr('min')) : 0
  var max = (input_number.attr('max')) ? parseFloat(input_number.attr('max')) : 999

  if(input_type == 'plus') result = number__toFixed( input_number_val + step )
  else result = number__toFixed(input_number_val - step)
  if (result >= min && result <= max) input_number.val( result ).change();
}



$('body').on( 'added_to_cart', function(){
    // Testing output on browser JS console
    $('body').addClass('cart-show')
    $('.widget__cart').addClass('active')
    // Your code goes here
});
$('.widget__cart__close').click(function(event) {
  $('.widget__cart').removeClass('active')
  $('body').removeClass('cart-show')
})
$('.widget__cart').mousedown(function(e){ e.stopPropagation(); });
$(document).mousedown(function(e){ $('.widget__cart').removeClass('active'); $('body').removeClass('cart-show') });