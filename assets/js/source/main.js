(function($) {
	/// ==================== 
	/// Global vars and functions here here :)
	/// ====================
	//var projectLoader = $('.project-loader');
	var newwidth = $(window).width();
	var newheight = $(window).height();
	var caseStudy = $('.case-study');
	var headerH = $('header').outerHeight()/4;
	var projectContainer = $('article.case-studies #work-area');
	var similarPostsSection = $('#related-work .inner-wrap');
	var data = "http://" + top.location.host.toString() + '/wp-json/posts/';

	var _permId = $('#work-area').data('current-id');
	var _brandTypes = $('#work-area').data('taxonomy-type');
	var _awardsPart = $('#work-area').data('taxonomy-award');
	// all Javascript code goes here
	var newWidth = $(window).width();
	var newHeight = $(window).height();
	$(".generic-bg").css({"height": newHeight, "width": newWidth }); 


	// =============================================================== //
					/// start main functions here ///
	// =============================================================== //


	var widthCheck = function() {

	  var $window = $(window);
	  var w = $window.width();
	  var h = $window.height();

		  if (w <= 580) {

		  	$('body').addClass('mobile-active');
		  	$('#site-navigation').addClass('mobile');
		  	$('#socials').appendTo('.menu-the-menu-container');
		  	caseStudy.css('height', '375px');

		  } else {

		  	// $('.secondary-nav').addClass('non-mobile');
	        var windowsize = $window.height();
	        var footerHeight = $('footer').outerHeight();
	        var top = $('.site-header').outerHeight();
	        var remainHeight = parseInt('22');
	        $('#full-screen-video').css('width',$window.width() + 60);
	        $('#full-screen-video').css('height',h);

	        $('#socials').appendTo('.site-header');
	        $('#site-navigation').removeClass('mobile');

		    // Execute on load
		    // Bind event listener

		  }

	};

	$(window).on( 'resize', function () {
		// $('.content-area').css('marginTop',$('header').outerHeight() );
	    $('.case-study').height( $(window).height() /2); /// 2 - headerH);
		widthCheck();
	}).resize();

	var addLoaders = function() {

		$(function() {

		  var addDivs = function(n) {
		    var arr = [];
		    for (i = 1; i <= n; i++) {
		      arr.push('<div></div>');
		    }
		    return arr;
		  };

		  $('.loader-inner.ball-pulse').html(addDivs(3));
		  $('.loader-inner.ball-grid-pulse').html(addDivs(9));
		  $('.loader-inner.ball-clip-rotate').html(addDivs(1));
		  $('.loader-inner.ball-clip-rotate-pulse').html(addDivs(2));
		  $('.loader-inner.square-spin').html(addDivs(1));
		  $('.loader-inner.ball-clip-rotate-multiple').html(addDivs(2));
		  $('.loader-inner.ball-pulse-rise').html(addDivs(5));
		  $('.loader-inner.ball-rotate').html(addDivs(1));
		  $('.loader-inner.cube-transition').html(addDivs(2));
		  $('.loader-inner.ball-zig-zag').html(addDivs(2));
		  $('.loader-inner.ball-zig-zag-deflect').html(addDivs(2));
		  $('.loader-inner.ball-triangle-path').html(addDivs(3));
		  $('.loader-inner.ball-scale').html(addDivs(1));
		  $('.loader-inner.line-scale').html(addDivs(5));
		  $('.loader-inner.line-scale-party').html(addDivs(4));
		  $('.loader-inner.ball-scale-multiple').html(addDivs(3));
		  $('.loader-inner.ball-pulse-sync').html(addDivs(3));
		  $('.loader-inner.ball-beat').html(addDivs(3));
		  $('.loader-inner.line-scale-pulse-out').html(addDivs(5));
		  $('.loader-inner.line-scale-pulse-out-rapid').html(addDivs(5));
		  $('.loader-inner.ball-scale-ripple').html(addDivs(1));
		  $('.loader-inner.ball-scale-ripple-multiple').html(addDivs(3));
		  $('.loader-inner.ball-spin-fade-loader').html(addDivs(8));
		  $('.loader-inner.line-spin-fade-loader').html(addDivs(8));
		  $('.loader-inner.triangle-skew-spin').html(addDivs(1));
		  $('.loader-inner.pacman').html(addDivs(5));
		  $('.loader-inner.ball-grid-beat').html(addDivs(9));
		  $('.loader-inner.semi-circle-spin').html(addDivs(1));

		});

	};
	var fakeLoad = function() {

		  function redirectTo(url) {
		    window.location = url;
		  }

		  var pageShown = false;
		  function showPage() {
		    if (!pageShown) {
		      pageShown = true;
		      $('body').fadeIn(500);
		    }
		  }
		  var siteURL = "http://" + top.location.host.toString();
		  $('.menu-item a').on('click', function(e) {
		    e.preventDefault();
		    var loc = $(this).attr('href');
		    $('.loader').fadeIn(100);
		    $('.content-area').fadeOut(500, function() {
		      $('.loader').fadeOut(100);
		      redirectTo(loc);
		    });
		  });

	};
	var url1 = window.location.href;
	var target = url1.replace(/\/$/, '');
 	var lastPart = target.substr(target.lastIndexOf('/'));
	var _last = lastPart.replace('/','');

	if(_last === 'services-offered'){
		window.setTimeout(function(){
	  		$('.work-block .entry-content').removeClass('up').addClass('down');
	  	},500);
	} else if(_last === 'who-we-are') {
		window.setTimeout(function(){
	  		$('.work-block .entry-content').removeClass('up').addClass('down');
	  	},500);
	} else if(_last === 'us') {
		window.setTimeout(function(){
	  		$('.work-block .entry-content').removeClass('up').addClass('down');
	  	},500);
	}

	var scrollerHeader = function() {

		    var ost = 0;
		    $(window).scroll(function() {
		      var cOst = $(this).scrollTop();
		      var wind = $(window).width();

		      	if (wind <= 580) {
		  			$('body').addClass('mobile-active');
		  		} else {

			      if(cOst > 500 && cOst > ost) {
			      	$('.case-studies .entry-content').removeClass('down').addClass('up');
			      }
			      else if(cOst < 500 && cOst < ost) {
			        $('.case-studies .entry-content').removeClass('up').addClass('down');
			      } 

			    //   if($(window).scrollTop() + $(window).height() == $(document).height()) {
				   //    getRelatedPosts(); 
				   // }

			    }

		      ost = cOst;
		    });

	};

	var onCase = function() {

		$.each( $(caseStudy) , function () {
			var a = $(this).find('.module');
			$(this).hover(function() {
			    a.addClass('on');
			}, function(){
			    a.removeClass('on');
			});
		});

	};
	projectContainer.html('<div class="load"><div class="loader-inner ball-pulse"></div></div>');
	$('.load').css( 'height', $(window).height() );
	//console.log(_awardsPart);
	var getRelatedPosts = function() {

		$.ajax({
	      url: '/wp-json/posts?type=case-studies&filter[taxonomy]=awards&filter[term]='+_awardsPart+'',
	      success: function ( query ) {

	      	//List some global variables here to fetch post data
	      	// We use base as our global object to find resources we need
	      	var posts = query;
	      	var postFull = [];
	      	$.each(posts, function(i, post){
	      		//terms.push(term);
	      		var postObject = post;
	      		postFull.push(post);
	      		console.log(post);
	      		$('#main-work').show();
	      		if (post.ID === _permId) {
      				
      			} else {
      				setTimeout(function(){
				  		similarPostsSection.append('<article class="similar-project"><a href="'+post.link+'"><img src="'+post.meta.main_image.url+'" alt="'+post.meta.main_image.title+' image"></a><h3><a href="'+post.link+'">'+post.title+'</a></h3></article>').find('.similar-project').addClass('newClass');
				  	}, 1000*(i+1));
      			}
      		});
	      },
	      cache: false
	    });

	};
	var getPostContent = function() {

		if( $('body.single-case-studies').length ){

		$.ajax({
	      url: '/wp-json/posts?type=case-studies',
	      data: {
	        filter: {
	        	'name': _last
	        }
		  },
	      success: function ( dataS ) {
	      	$('.load').remove();

	      	window.setTimeout(function(){
		  		$('.case-studies .entry-content').removeClass('up').addClass('down');
		  	},100);

	      	var layoutHTML = "", oneColImg = "";

	      	//List some global variables here to fetch post data
	      	// We use base as our global object to find resources we need
	      	var base = dataS[0];

	      	//console.log(base);

	      	var postContent = base.content;

	      	var postTitle = base.title;
	      	// Main Image ACF object
	      	var featuredImage = base.meta.main_image;
	      	var mainImg = "<section class='col null work-block'><img src='"+ featuredImage['url'] +"' alt='"+featuredImage['title']+" image'></section>";
	      	// Gallery ACF object
	      	var nodes = base.meta.work_content;
	      	// Simple ACF object
	      	//var textArea = base.meta.work_content[1];
	      	var items = [];
	      	var layoutNames = [];
	      	var term = base.terms;
	      	var termParent = [];
	      	//console.log(term);
	      	for(var i = 0; i < term.length; i++) {
	      		//terms.push(term);
	      		var termItem = term[i];
	      		//console.log(term[i]);
	      		termParent.push(term[i]);
	      	};

	      	for(var i = 0; i < nodes.length; i++) {

			    var layout = nodes[i];
                layoutNames.push(layout.acf_fc_layout);
			    //console.log(layout);

			    for (var key in layout) {
					if (layout.hasOwnProperty(key)) {
						if(layout[key] === 'gallery') {

							var galleryImages = layout.images;
							layoutHTML += "<section class='gallery work-block'>";
							$.each(galleryImages, function(index, url) {								
								layoutHTML += "<article id='"+index+"-image' class='col half-col-images'><img src='"+ $(this)[0]['url'] +"' alt='"+$(this)[0]['title']+"'></article>";								
							});
							layoutHTML += "</section>";

						} else if(layout[key] === 'content_area') {

						  layoutHTML += "<section class='the-content work-block'>";
						    layoutHTML += "<td>" + layout.text + "</td>";
						  layoutHTML += "</section>";

						} else if(layout[key] === 'full_screen_video') {

							var videoEmbed = layout.video_url;
							layoutHTML += "<section id='full-screen' class='col col-video work-block'>";
						    	layoutHTML += "<iframe type='text/html' src='" + videoEmbed + "' frameborder='0' webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>";
							layoutHTML += "</section>";

						} else if(layout[key] === '2_column_images') {

							var image1 = layout.image_1;
							var image2 = layout.image_2;
							layoutHTML += "<section class='col col-image work-block'><img src='"+image1['url']+"' alt='"+image1['title']+" image' /><img src='"+image1['url']+"' alt='"+image2['title']+"' /></section>";
						
						} else if(layout[key] === 'single_full_image') {
							var image_full = layout.image;
							layoutHTML += "<section class='col col-full-image work-block'><img src='"+image_full['url']+"' alt='"+image_full['title']+" image'></section>";
						}
					}
				}

			}
		    $('#work-area').prepend($(mainImg).addClass('fade-in'));
		    projectContainer.append($(layoutHTML).addClass('fade-in'));

			// Set div to window height

		    var newwidth = $(window).width();
		    var newheight = $(window).height();      
		    // $(".work-block:first-child").css({"height": newheight, "width": newwidth });

		    var galleries = $('.gallery');

		    $("#full-screen").fitVids();
		    $.each(galleries, function(index) {
			    $(this).slick({
				  dots: false,
				  arrows: true,
				  speed: 500
				});
			});
	      },
	      cache: false
	    });

	}
	
	};
	var getAllPosts = function() {

		if(_last === 'our-work'){

			$("#our-work").html('<div class="load"><div class="loader-inner ball-pulse"></div></div>');
			$('.load').css( 'height', $(window).height() );

			// $().html('<div class="load"><div class="loader-inner ball-pulse"></div></div>');
			
			$.ajax({
		      url: '/wp-json/posts?type=case-studies',
		      success: function ( work ) {
		      	$('.load').remove();
		      	//List some global variables here to fetch post data
		      	// We use base as our global object to find resources we need
		      		var projects = work;
		      		$.each(projects, function(i, item){
		      			//item.meta.main_image.url
		      			console.log(item);
		      			var siteMain = $("#our-work");
		      			var tester = $('<?php _basetheme_post_thumbnail_helper(); ?>');
		      			var content = $("<article id='post-"+item.ID+"' style='background-image: url("+ item.meta.main_image.url +");' class='col-1-4 project "+item.type+"'><a href='"+item.link+"' title='Link to "+item.title+"'><div class='block'><div class='wrap'><h1 class=''>"+item.title+"</h1></div></div></a></article>");
				  		setTimeout(function(){
				  			siteMain.append(content);
				  			content.hide();
				  			content.fadeIn();
				  		}, 500*(i+1));
					});
		      },
		      cache: false
		    });

		}

	};

	var initMap = function() {

		if(_last === 'us'){
			L.mapbox.accessToken = 'pk.eyJ1IjoibWR1bmJhdmFuIiwiYSI6ImJkODFlZDZjMzU5N2Y0OTI5ZjcyYWMzMTdiNjY0NzhjIn0.2KGkXkLyyxtuxqj4hh_N1Q';
			var map = L.mapbox.map('map', 'mapbox.streets', { zoomControl: false })
			    .setView([51.52418674357502,-0.10686993598937988], 16);
			    //new L.Control.Zoom({ position: 'topright' }).addTo(map);

				L.mapbox.featureLayer({
				    // this feature is in the GeoJSON format: see geojson.org
				    // for the full specification
				    type: 'Feature',
				    geometry: {
				        type: 'Point',
				        // coordinates here are in longitude, latitude order because
				        // x, y is the standard for GeoJSON and many formats
				        coordinates: [
				          -0.10686993598937988, 51.52418674357502
				        ]
				    },
				    properties: {
				        title: 'WMH HQ',
				        description: 'The place where dreams come true!!',
				        // one can customize markers by adding simplestyle properties
				        // https://www.mapbox.com/guides/an-open-platform/#simplestyle
				        'marker-size': 'large',
				        'marker-color': '#ff0000',
				        'marker-symbol': 'commercial'
				    }
				}).addTo(map);
			}


	};
	var mobileMenuTouch = function() {

		var flag = false;
	  $('#mobile-menu-button').bind('touchstart click', function(e){

	    // var open = $(this).parent().find('.open');
	    // var close = $(this).parent().find('.closed');
	    // var mobileSub = $('.mobile-nav ul.site-nav--dropdown'),
	    // mobileSubHeight = mobileSub.height();

	    if (!flag) {
	      flag = true;

	      setTimeout(function(){
			flag = false;
			},100);

	      if ( $('body').hasClass('mobile-active') ){
	        
	        $('#site-navigation').addClass('mobile');
	        $('body').removeClass('mobile-active');
	        $(this).attr('src',mobileMenuActive);
	        $('#site-navigation .menu-the-menu-container').transition({
	            'height': '220px'
	          });

	        window.setTimeout(function(){
	  			$('#socials').addClass('open');
	  		},750);

	      } else {

	        $(this).attr('src',mobileMenu);
	        $('body').addClass('mobile-active');
	        $('#site-navigation .menu-the-menu-container').transition({
	          'height': '0px'
	        });
	  		
	  		$('#socials').removeClass('open');

	      }
	    }
	    return false;
	  });

	};

	// Some more dependent js goes here :)
	widthCheck();
	scrollerHeader();
	onCase();
	getAllPosts();
	getPostContent();
	getRelatedPosts();
	fakeLoad();
	addLoaders();
	mobileMenuTouch();
	initMap();


})(jQuery);
