jQuery(document).ready(function ($) {

  $('.popup--close').click(function(){
    $('.popup').removeClass('active');
  });
  $('.popup--button').click(function(){
    $('.popup').addClass('active');
  });

  

  $('.navigation-desktop h5').click(function(){
    $(this).toggleClass('active').siblings().removeClass('active');
    $(this).next().toggleClass('show').siblings().removeClass('show');
    if ($(".dropdown-menu").hasClass("show")) {
      $("#PureChatWidget").hide();
    } else {
      $("#PureChatWidget").show();
    }

    

    
    
    
    

  $(".nav_line ul, .mobile-nav").hide();
  
  $(".hamburger").click(function () {
    $(".mobile-nav").slideToggle(600);
    $(this).toggleClass('open');
    $("body, html").toggleClass('mobile-nav-open');
    if ($("body, htmlu").hasClass("mobile-nav-open")) {
      $("#PureChatWidget").hide();
    } else {
      $("#PureChatWidget").show();
    }
  });


  $(".nav_line").click(function () {
    $(this).toggleClass("expand");
    $(this).find("ul").slideToggle(600);
  });


  if($('#BambooHR-ATS').length) {
    var interval = setInterval(function() {
      if($('.BambooHR-ATS-Jobs-Item').length) {
        clearInterval(interval)
        $('.BambooHR-ATS-Jobs-Item')
      }
    }, 100)
  };


  $("<p id='test'>").appendTo("body").css({
    padding: "5px 7px",
    background: "#e9e9e9",
    position: "fixed",
    bottom: "15px",
    left: "35px",
  });

  var headerHeight = $('header').outerHeight();
  $('.panel--page').css('margin-top', headerHeight);
  $('.panel--no-header').css('margin-top', headerHeight);

  $( window ).resize(function() {
    var headerHeight = $('header').outerHeight();
    $('.panel--page').css('margin-top', headerHeight);
    $('.panel--no-header').css('margin-top', headerHeight);
  });



  $(window).scroll(function (e) {
    var target = e.currentTarget,
      self = $(target),
      scrollTop = window.pageYOffset || target.scrollTop,
      lastScrollTop = self.data("lastScrollTop") || 0,
      scrollHeight = target.scrollHeight || document.body.scrollHeight,
      scrollText = "";
      /*$(".dropdown-menu").fadeOut();*/

    if (scrollTop > lastScrollTop) {
      scrollText = "<b>scroll down</b>";
      $("body").addClass("scroll-down");
      $("body").removeClass("scroll-up");
    } else {
      scrollText = "<b>scroll up</b>";
      $("body").addClass("scroll-up");
    }

    if (scrollTop >= 100) {
      $(".dropdown-menu").addClass("scroll");
    } else {
      $(".dropdown-menu").removeClass("scroll");
    }
    
// interesting -- this was here 
    if (scrollTop >= 100) {
      $(".navigation-desktop").addClass("scroll");
    } else {
      $(".navigation-desktop").removeClass("scroll");
    }

    // animate truck on scroll 
    if (scrollTop >= 400) {
      $(".truck").css("visibility", "visible");
      $(".truck").addClass("animate-truck");
    }
    //saves the current scrollTop
    self.data("lastScrollTop", scrollTop);
  });  //what's up with this? lol

    self.data("lastScrollTop", scrollTop);

    /*if (scroll) {
      $(".dropdown-content")
    }*/


  let width = $(window).width();
  if (width <= 768) {
    $(".truck").css("visibility", "visible");
    $(".truck").addClass("animate-truck");
  }
  $(".truck--page").css("visibility", "visible");
  $(".truck--page").addClass("animate-truck");


  // collapsable page form
  $(".gform_heading").on("click", function () {
    $(this).toggleClass("activate");
    $(".gform_description").slideToggle(700);
    $(".gform_body").slideToggle(800);
    $(".gform_footer").slideToggle(900);
    $(".gform_title").toggleClass("rotate");
  });


  $('.sign-up').click(function(e){
    e.preventDefault();
    $('.sign-up-modal').show(200);
    $("body").css("overflow","hidden");
    
  });
$('.sign-up-modal form').prepend('<h3 class="u-padding6gu">Join Our Email List</h3>');
  $('.sign-up-modal form h3').click(function(){
    $('.sign-up-modal').hide(200);
    $("body").css("overflow","scroll");
  })
  
   
   // Close the dropdown if the user clicks outside of it
   $(document).on("click", function (e) {
    if ($('.navigation-desktop h5').hasClass('active')) {
      $(this).removeClass('active');
    }
    if ($('dropdown-menu').hasClass('show')) {
      $(this).removeClass('show');
      
    }
  });
  
  
  // collapsable page menu
  $(".page-menu div > h4").on("click", function () {
    $(this).toggleClass("activate");
    $(".page-menu__list").slideToggle(800);
    $(".page-menu div > h4").toggleClass("rotate");
  });

  $(".search-icon").click(function (){
    $(this).hide();
    $(".close-icon").show();
    $("header .searchandfilter").show();
  });
  $(".close-icon").click(function (){
    $(this).hide();
    $(".search-icon").show();
    $("header .searchandfilter").hide();
  });

  $(window).on("scroll", function () {
    let reviews_section = $(".reviews");

    if (reviews_section.length) {
      if (
        $(window).scrollTop() >= reviews_section.offset().top - 500 &&
        !reviews_section.hasClass("animate")
      ) {
        // Animate reviews section
        reviews_section.addClass("animate");
        $(".client-ratings").addClass("bounceInUp");

        // Animate technician
        $(".tech").addClass("bounceInRightTech");

        // animate stars and stuff
        animateReviewStars(reviews_section);
        animateReviewNumbers(reviews_section);
      }
    }

    // ANIMATE STARS - bounceInUp
    function animateReviewStars(el) {
      $(el)
        .find(".stargroup li")
        .each(function (i) {
          let stars = $(this);
          setTimeout(function () {
            stars.addClass("bounceInUp", !stars.hasClass("bounceInUp"));
          }, 400 * i);
        });
    }

    $("#btn-left").addClass("bounceInRight");
    $("#btn-rt").addClass("bounceInLeft");

    // ANIMATE PERCENTAGES

    function animateReviewNumbers(el) {
      let counters = $(el).find(".percentage-count");
      console.log(counters);

      counters.each(() => {
        const updateCount = () => {
          const target = counter.getAttribute("data-target");
          console.log(target);
          updateCount();
        };
      });

      counters.each(function () {
        let $this = $(this),
          countTo = $this.data("count"),
          ratingNum = $this.parent().parent().attr("id");
        console.log("this =", this);
        console.log("countTo =", countTo);
        console.log("ratingNum =", ratingNum);

        switch (ratingNum) {
          case "rating-1":
            var speed = 3000;
            break;
          case "rating-2":
            var speed = 5000;
            break;
          default:
            var speed = 2000;
        }

        $({ countNum: $this.text() }).animate(
          {
            countNum: countTo,
          },
          {
            duration: speed,
            easing: "linear",
            step: function () {
              $this.text(commaSeparateNumber(Math.floor(this.countNum)));
            },
            complete: function () {
              $this.text(commaSeparateNumber(this.countNum));
            },
          }
        );
      });

      function commaSeparateNumber(val) {
        while (/(\d+)(\d{3})/.test(val.toString())) {
          val = val.toString().replace(/(\d+)(\d{3})/, "$1" + "," + "$2");
        }
        return val;
      }
    }
  });
});})