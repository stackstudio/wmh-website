(function($) {
	// Global vars here :)

	var caseStudy = $('.case-study');
	var headerH = $('header').outerHeight()/4;
	//var data = '';
	var data = "http://" + top.location.host.toString() + '/wp-json/wp/v2/posts/';
	// all Javascript code goes here

	$(window).on( 'resize', function () {
		// $('.content-area').css('marginTop',$('header').outerHeight() );
	    $('.case-study').height( $(window).height() /2); /// 2 - headerH);
	}).resize();

	var scrollerHeader = function() {

		    var ost = 0;
		    $(window).scroll(function() {
		      var cOst = $(this).scrollTop();
		      var wind = $(window).width();

		      	if (wind <= 580) {
		  			$('body').addClass('mobile-active');
		  		} else {

			      if(cOst > 200 && cOst > ost) {
			      	$('header').addClass('bg-brown');
					$('header .container .nav-main ul li').addClass('header-small');
					$('.navbar-brand, header .container .nav-main').addClass('smaller');
					$('.navbar-brand img').attr("src","assets/img/logo.png");
			      }
			      else if(cOst < 200 && cOst < ost) {
			        $('header .container .nav-main ul li').removeClass('header-small');
			        $('header').removeClass('bg-brown');
			        $('.navbar-brand, header .container .nav-main').removeClass('smaller');
			        $('.navbar-brand img').attr("src","assets/img/logo.png");
			      }

			    }

		      ost = cOst;
		    });

	};

	var onCase = function() {

		// $.each( $(caseStudy) , function () {
		// 	var a = $(this).find('.module');
		// 	$(this).hover(function() {
		// 	    a.addClass('on');
		// 	}, function(){
		// 	    a.removeClass('on');
		// 	});
		// });

	    $.ajax({
	      url: '/wp-json/wp/v2/posts?filter[orderby]=rand&filter[posts_per_page]=5',
	      success: function ( dataS ) {
	      	console.log(dataS);
	        // var post = data.shift(); // The data is an array of posts. Grab the first one.
	        // $( '#quote-title' ).text( post.title );
	        // $( '#quote-content' ).html( post.content );

	        // // If the Source is available, use it. Otherwise hide it.
	        // if ( typeof post.custom_meta !== 'undefined' && typeof post.custom_meta.Source !== 'undefined' ) {
	        //   $( '#quote-source' ).html( 'Source:' + post.custom_meta.Source );
	        // } else {
	        //   $( '#quote-source' ).text( '' );
	        // }
	      },
	      cache: false
	    });

	};

	var getPosts = function() {

		// $.get( data, function( dataPosts ) {

		//     $.each(dataPosts, function(i, item) {
		//       console.log(item);
		//     });
		//   }, 'json').done(function() {

		//     console.log();

		// });
	
	};

// Some more dependent js goes here :)
scrollerHeader();
onCase();
getPosts();

})(jQuery);
