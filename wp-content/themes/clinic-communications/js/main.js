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
  $(".menu-item.has-submenu > .nav-link").on("click", function (e) {
    if ($(window).width() < 992) {
      e.preventDefault();
      $(this).siblings(".submenu").slideToggle();
      $(this).parent().toggleClass("sub-menu-opened");
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


  // Reviews Slider (Slick)
  if ($('#reviewsSlider').length) {
    $('#reviewsSlider').slick({
      dots: false,
      infinite: true,
      autoplay: true,
      autoplaySpeed: 3000,
      speed: 1000,
      pauseOnHover: true,
      slidesToShow: 2,
      slidesToScroll: 1,
      prevArrow: $('#prevReview'),
      nextArrow: $('#nextReview'),
      responsive: [
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
          }
        }
      ]
    });
  }

  $('.reviews-slider .read-more').on('click', function (e) {
    e.preventDefault();
    const $this = $(this);
    const $text = $this.siblings('.review-text');
    const isExpanded = $text.hasClass('expanded');

    // Close all other expanded reviews
    $('.reviews-slider .review-text').not($text).removeClass('expanded');
    $('.reviews-slider .read-more').not($this).text('Read more');

    // Toggle current review
    $text.toggleClass('expanded');
    $this.text($text.hasClass('expanded') ? 'Read less' : 'Read more');

    // Refresh Slick to recalculate heights if necessary
    $('#reviewsSlider').slick('setPosition');
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
