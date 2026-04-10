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
});
