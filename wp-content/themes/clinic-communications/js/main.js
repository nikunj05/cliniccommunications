$(document).ready(function () {
  // Sticky Header Shadow on Scroll
  // $(window).scroll(function () {
  //   if ($(window).scrollTop() > 50) {
  //     $(".header").addClass("sticky-scrolled");
  //   } else {
  //     $(".header").removeClass("sticky-scrolled");
  //   }
  // });

  // AOS Animation Initialize
  if (typeof AOS !== 'undefined') {
    AOS.init({
      duration: 1000,
      once: true,
      offset: 50
    });
  }

  // Mobile Submenu Logic
  $(".menu-item.has-submenu .submenu-arrow-down-icon-wrapper").on("click", function (e) {
    if ($(window).width() < 992) {
      e.preventDefault();
      e.stopPropagation();
      const $parentLi = $(this).closest(".menu-item");
      $parentLi.find(".submenu").first().slideToggle();
      $parentLi.toggleClass("sub-menu-opened");
    }
  });

  // Specifically for the "Services" link to allow navigation OR toggle
  $(".menu-item.has-submenu > .nav-link").on("click", function (e) {
    if ($(window).width() < 992) {
      // If they click the link itself (the text), it should navigate if it has a valid href.
      // If the href is javascript:void(0) or #, we can toggle the submenu as a fallback.
      const href = $(this).attr("href");
      if (href === "javascript:void(0)" || href === "#") {
        e.preventDefault();
        $(this).siblings(".submenu-arrow-down-icon-wrapper").trigger("click");
      }
      // Otherwise, let it navigate.
    }
  });

  // Auto-close mobile menu on link click
  $(".navbar-nav .nav-link:not(.dropdown-toggle)").on("click", function () {
    if ($(window).width() < 992) {
      $(".navbar-collapse").collapse("hide");
    }
  });

  // Google Review Widget Logic
  $("#openReviewPanel").on("click", function (e) {
    e.stopPropagation();
    $(this).addClass("hidden");
    $("#reviewDetailedPanel").addClass("active");
  });

  $("#closeReviewPanel").on("click", function (e) {
    e.stopPropagation();
    $("#reviewDetailedPanel").removeClass("active");
    $("#openReviewPanel").removeClass("hidden");
  });

  $(document).on("click", function (e) {
    if (!$(e.target).closest("#googleReviewWidget").length) {
      $("#reviewDetailedPanel").removeClass("active");
      $("#openReviewPanel").removeClass("hidden");
    }
  });

  // Show More / Less Toggle
  $(".comment-toggle").on("click", function (e) {
    e.preventDefault();
    const $this = $(this);
    const $commentBody = $this.siblings(".comment-text-trunc");

    $commentBody.toggleClass("expanded");

    if ($commentBody.hasClass("expanded")) {
      $this.text("Show Less");
    } else {
      $this.text("Show More");
    }
  });


  // Social Media Slider
  if ($('#socialSlider').length) {
    $('#socialSlider').slick({
      dots: false,
      infinite: true,
      speed: 800,
      slidesToShow: 5,
      slidesToScroll: 1,
      prevArrow: $('#prevSocial'),
      nextArrow: $('#nextSocial'),
      responsive: [
        {
          breakpoint: 1200,
          settings: {
            slidesToShow: 4,
          }
        },
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 3,
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
            centerMode: true,
            centerPadding: '40px',
          }
        }
      ]
    });
  }

  // Social Post Modal Logic
  const $socialModal = $('#socialPostModal');
  let currentSlideIndex = 0;

  function updateModalContent(index) {
    const $slides = $('.social-slide:not(.slick-cloned)');
    if (index < 0) index = $slides.length - 1;
    if (index >= $slides.length) index = 0;

    currentSlideIndex = index;
    const $currentSlide = $slides.eq(index);
    const imgSrc = $currentSlide.find('.social-bg img').attr('src');
    const captionHtml = $currentSlide.find('.social-hover-content').html();

    const $modalImg = $('#modalPostImage');
    const $modalCaption = $('#modalPostCaption');

    // Smooth fade transition
    $modalImg.addClass('changing');
    $modalCaption.addClass('changing');

    setTimeout(() => {
      $modalImg.attr('src', imgSrc);
      $modalCaption.html(captionHtml);
      $modalImg.removeClass('changing');
      $modalCaption.removeClass('changing');
    }, 400);
  }

  $(document).on('click', '.social-item', function () {
    const $slide = $(this).closest('.social-slide');
    const index = $slide.data('slick-index') || $slide.index();
    updateModalContent(index);
    $socialModal.modal('show');
  });

  $('#modalPrev').on('click', function () {
    updateModalContent(currentSlideIndex - 1);
  });

  $('#modalNext').on('click', function () {
    updateModalContent(currentSlideIndex + 1);
  });
});
