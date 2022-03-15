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

  $(window).on("load", function () {
    header_sticky.offset().top > 5
      ? header_sticky.addClass("is-active")
      : header_sticky.removeClass("is-active");
  });

  /*----Get Header Height ---*/
  function get_header_height() {
    var header_sticky = $("header").outerHeight();
    $("body").css("--header-height", header_sticky + "px");
  }

  setTimeout(function () {
    get_header_height();
  }, 500);
  $(window).on("load resize scroll", function () {
    setTimeout(() => {
      get_header_height();
    }, 250);
  });

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

// function matchHeight($o, m) {
//   $o.css("height", "auto");
//   var foo_length = $o.length;

//   for (var i = 0; i < Math.ceil(foo_length / m); i++) {
//     var maxHeight = 0;
//     for (var j = 0; j < m; j++) {
//       if ($o.eq(i * m + j).height() > maxHeight) {
//         maxHeight = $o.eq(i * m + j).height();
//       }
//     }
//     for (var k = 0; k < m; k++) {
//       $o.eq(i * m + k).height(maxHeight);
//     }
//   }
// }

// $(function () {
//   var $match = $(".js-max-height");
//   $(window).on("load resize", function () {
//     matchHeight($match, 4);
//   });
// });
