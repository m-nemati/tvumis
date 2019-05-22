$(document).ready(function() {
  // Fix Navbar
  $(document).scroll(function() {
    var st = $(this).scrollTop();
    if (st > 70) {
      $("#Navbar").addClass("stickyNavbar");
    } else {
      $("#Navbar").removeClass("stickyNavbar");
    }
  });
  // display and hide top top button
  $(document).scroll(function() {
    var scrollFromTop = $(this).scrollTop();
    if (scrollFromTop > 700) {
      $("#toTop").css("display", "inline");
    } else {
      $("#toTop").css("display", "none");
    }
  });

  // go to top when click on to top button
  $("#toTop").click(function() {
    $("html").animate({ scrollTop: 0 }, 1000);
  });

  // Show or Hide Sub Items
  $("#menuTitle0").mouseenter(function() {
    $(".subItem0").hide(500);
    $(".subItem1").hide(500);
    $(".subItem2").hide(500);
    $(".subItem3").hide(500);
  });

  $("#menuTitle1").mouseenter(function() {
    $(".subItem0").hide(500);
    $(".subItem1").show(1000);
    $(".subItem2").hide(500);
    $(".subItem3").hide(500);
  });

  $("#menuTitle2").mouseenter(function() {
    $(".subItem0").hide(500);
    $(".subItem1").hide(500);
    $(".subItem2").show(1000);
    $(".subItem3").hide(500);
  });
  $("#menuTitle3").mouseenter(function() {
    $(".subItem0").hide(500);
    $(".subItem1").hide(500);
    $(".subItem2").hide(500);
    $(".subItem3").show(1000);
  });
  $("#Navbar").mouseleave(function() {
    $(".subItem0").hide(500);
    $(".subItem1").hide(500);
    $(".subItem2").hide(500);
    $(".subItem3").hide(500);
  });
});
