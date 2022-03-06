$(function() {
    "use strict";

    var o = function() {
        var o = 390,
            n = (window.innerHeight > 0 ? window.innerHeight : this.screen.height) - 1;
        n -= o, 1 > n && (n = 1), n > o && $(".page-wrapper").css("min-height", n + "px")
    };
	
    $(window).ready(o), $(window).on("resize", o), $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    }), $(function() {
        $('[data-toggle="popover"]').popover()
    }), jQuery(document).on("click", ".nav-dropdown", function(o) {
        o.stopPropagation()
    }), jQuery(document).on("click", ".navbar-nav > .dropdown", function(o) {
        o.stopPropagation()
    }), $(".dropdown-submenu").click(function() {
        $(".dropdown-submenu > .dropdown-menu").toggleClass("show")
    }), $("body").trigger("resize");
    var n = $(window);
    n.on("load", function() {
        var o = n.scrollTop(),
            e = $(".topbar");
        o > 100 ? e.addClass("fixed-header animated slideInDown") : e.removeClass("fixed-header animated slideInDown")
    }), $(window).scroll(function() {
        $(window).scrollTop() >= 200 ? ($(".topbar").addClass("fixed-header animated slideInDown"), $(".bt-top").addClass("visible")) : ($(".topbar").removeClass("fixed-header animated slideInDown"), $(".bt-top").removeClass("visible"))
    }), AOS.init(), $(".bt-top").on("click", function(o) {
        o.preventDefault(), $("html,body").animate({
            scrollTop: 0
        }, 700)
    })
	
	// Testimonials
	$("#testimonials").owlCarousel({
		nav: !0,
		dots: !0,
		items: 1,
		center: !0,
		loop: !0,
		navText: ['<i class="fa fa-arrow-left"></i>', '<i class="fa fa-arrow-right"></i>'],
		responsive: {
			1700: {
				stagePadding: 620,
				margin:120
			},
			1430: {
				stagePadding: 320,
				margin:100
			},
			1025: {
				stagePadding: 300,
				margin:80
			},
			768: {
				stagePadding: 150,
				margin:50
			},
			0: {
				stagePadding: 0,
				margin: 0
			}
		}
	})
	
	// Testimonials 2
	$("#testimonials-2").owlCarousel({
		nav: !0,
		dots: !0,
		items: 1,
		center: !0,
		loop: !0,
		navText: ['<i class="fa fa-arrow-left"></i>', '<i class="fa fa-arrow-right"></i>'],
		responsive: {
			1700: {
				stagePadding: 620,
				margin:120
			},
			1430: {
				stagePadding: 320,
				margin:100
			},
			1025: {
				stagePadding:280,
				margin:10
			},
			768: {
				stagePadding: 150,
				margin:50
			},
			0: {
				stagePadding: 0,
				margin: 0
			}
		}
	})
	
	// Company Brand
	$("#company-brand").owlCarousel({
		loop:true,
		autoplay:true,
		nav:false,
		dots:false,
		margin:60,
		responsiveClass:true,
		responsive:{
			0:{
				items:1,
				nav:false
			},
			600:{
				items:3,
				nav:false
			},
			1000:{
				items:6,
				nav:false,
				loop:false
			}
		}
	})
	
	// Wishes
	$('#wishes').owlCarousel({
		loop:true,
		margin:10,
		responsiveClass:true,
		responsive:{
			0:{
				items:1,
				nav:true
			},
			600:{
				items:1,
				nav:false
			},
			1000:{
				items:1,
				nav:true,
				loop:false
			}
		}
	})
	
	// Doctor List
	$('#doctor-slide').owlCarousel({
		loop:true,
		margin:1,
		responsiveClass:true,
		responsive:{
			0:{
				items:1,
				autoplay:true,
				nav:true
			},
			600:{
				items:2,
				autoplay:true,
				nav:false
			},
			1000:{
				items:3,
				nav:false,
				autoplay:true,
				loop:false
			},
			1280:{
				items:4,
				nav:false,
				autoplay:true,
				loop:false
			}
		}
	})
	
	// Ratting
	 $('.rating-opt').start(function(cur){
		console.log(cur);
		 $('#info').text(cur);
	});
	
		    /****---- Portfolio Start ----****/

		$('#portfolio').imagesLoaded(function () {
			$('.portfolio-gallary').isotope({
				itemSelector: '.port-item',
				percentPosition: true,
				masonry: {
					columnWidth: '.port-item'
				}
			});

			$('.portfolio-sort ul li').on("click", function () {
				$('.portfolio-sort ul li').removeClass('active');
				$(this).addClass('active');

				var selector = $(this).attr('data-filter');
				$('.portfolio-gallary').isotope({
					filter: selector
				});
				return false;
			});


			 $('.blog-isotope').imagesLoaded(function () {
				var $blogisotope = $('.blog-isotope').isotope({
					itemSelector: '.blog-iso-item',
					percentPosition: true,
					masonry: {
						columnWidth: '.blog-iso-item'
					}
				});
			});


		});


    /****---- Portfolio End ----****/
	
});