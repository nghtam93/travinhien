$("body").addClass("modal-open");
$(document).ready(function () {
  $(".loading-page__logo").fadeOut();
  $(".loading-page").delay(350).fadeOut("slow");
  $("body").removeClass("modal-open");

  if ($("body").is(".home, .voting-page, .about-page")) {
    setTimeout(function () {
      new WOW().init();
    }, 400);
  }

  if ($("body").hasClass("home")) {
    $(".home-work .el__slider").slick({
      arrows: true,
      dots: false,
      infinite: false,
      slidesToScroll: 1,
      slidesToShow: 2.5,
      responsive: [
        {
          breakpoint: 1200,
          settings: {
            arrows: false,
            autoplay: true,
          },
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1.5,
            arrows: false,
            autoplay: true,
          },
        },
      ],
    });

    $(".slider-nav").slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      arrows: true,
      dots: false,
      vertical: true,
      asNavFor: ".slider-for",
      focusOnSelect: true,
      infinite: false,
      responsive: [
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 3,
            vertical: false,
            centerMode: true,
            centerPadding: "10%",
            arrows: false,
          },
        },
      ],
    });

    $(".slider-for").slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      dots: false,
      fade: true,
      cssEase: "linear",
      adaptiveHeight: true,
      asNavFor: ".slider-nav",
    });
  }

  /*----Get Header Stick ---*/
  var header_sticky = $("header.-fix");
  $(window).scroll(function () {
    $(this).scrollTop() > 5
      ? header_sticky.addClass("is-active")
      : header_sticky.removeClass("is-active");
  });

  $(window).on("load", function () {
    // header_sticky.offset().top > 5
    //   ? header_sticky.addClass("is-active")
    //   : header_sticky.removeClass("is-active");
  });

  /*----Languages---*/
  $(".languages__label").click(function () {
    $(this).closest(".languages").toggleClass("is-active");
    $(this).next().toggleClass("dropdown-languages");
  });
  $(".languages").mousedown(function (e) {
    e.stopPropagation();
  });
  $(document).mousedown(function (e) {
    $(".languages__content").removeClass("dropdown-languages");
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

  // check checkbox checked enable button
  function checkDisableButton() {
    $(".js-attr-disable").each(function () {
      let checkBox = $(this).find(".js-attr-checkbox");
      let btn = $(this).find(".js-attr-button");
      checkBox.on("click", function () {
        if ($(this).is(":checked")) {
          $(btn).removeAttr("disabled").removeClass("-disabled");
        } else {
          $(btn).attr("disabled", "disabled").addClass("-disabled");
        }
      });
    });
  }
  checkDisableButton();

  // js custom dropdown
  $(".js-dropdown .js-dropdown-selected").click(function (e) {
    e.preventDefault();
    $(this).toggleClass("is-show");
    $(this)
      .parents(".js-dropdown")
      .find(".js-dropdown-list")
      .toggleClass("is-show");
  });
  $(".js-dropdown .js-dropdown-list li a").click(function (e) {
    e.preventDefault();
    var text = $(this).html();
    $(this)
      .parents(".js-dropdown")
      .find(".js-dropdown-selected a span")
      .html(text);
    $(this).parents(".js-dropdown-list").removeClass("is-show");
  });
  $(document).bind("click", function (e) {
    var $clicked = $(e.target);
    if (!$clicked.parents().hasClass("js-dropdown"))
      $(
        ".js-dropdown .js-dropdown-selected, .js-dropdown .js-dropdown-list"
      ).removeClass("is-show");
  });

  // js custom toggle
  $(".js-toggle").each(function () {
    let jsBtn = $(this).find(".js-toggle-btn");
    let jsShow = $(this).find(".js-toggle-show");
    jsBtn.on("click", function (e) {
      e.preventDefault();
      $(this).toggleClass("is-active");
      jsShow.slideToggle().toggleClass("is-active");
    });
  });

  // js focus
  $(".js-focus").each(function () {
    $(this).on("click", function () {
      let dataFocus = $(this).attr("data-focus");
      let dataModal = $(this).attr("data-modal");
      if (dataModal != "undefined") {
        $(`#${dataModal}`).on("shown.bs.modal", function () {
          $(`#${dataFocus}`).focus();
        });
      } else {
        $(`#${dataFocus}`).trigger("focus");
      }
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

  // $(window).on("load resize", function () {
  //   var currentPath = window.location.hash;
  //   $('a[href^="#"]').each(function () {
  //     var attrHref = $(this).attr("href");
  //     if (attrHref === currentPath) {
  //       $(this).parent().addClass("active");
  //     } else {
  //       $(this).parent().removeClass("active");
  //     }
  //   });
  // });
});

function matchHeight($o, m) {
  $o.css("height", "auto");
  var foo_length = $o.length;

  for (var i = 0; i < Math.ceil(foo_length / m); i++) {
    var maxHeight = 0;
    for (var j = 0; j < m; j++) {
      if ($o.eq(i * m + j).height() > maxHeight) {
        maxHeight = $o.eq(i * m + j).height();
      }
    }
    for (var k = 0; k < m; k++) {
      $o.eq(i * m + k).height(maxHeight);
    }
  }
}

$(function () {
  var $match = $(".js-max-height");
  $(window).on("load resize", function () {
    matchHeight($match, 4);
  });
});
