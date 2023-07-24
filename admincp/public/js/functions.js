		
function choose_plan( plan_link ) {
	$('.plan').removeClass('chosen');
	$(plan_link).parents('.plan').addClass('chosen').fadeTo('100',1);
	$('html, body').animate({scrollTop:500}, 'slow');
	$('#faqs').fadeOut(200);
	$('#wrapper').delay(200).animate({'min-height':500});
	$('#sign-up-content').delay(400).fadeIn();
	$('#sign-up-info').removeClass().addClass($(plan_link).parents('.plan').find('h3').html());
	$('#sign-up-info h2 span').replaceWith('<span>' + $(plan_link).parents('.plan').find('h3').html() + '</span>');
	plannumber = $(plan_link).parents('.plan').index() + 1;
	$('#plan option:nth-child(' + plannumber + ')').attr('selected', 'selected');
}

$(document).ready(function(){			

		$(".preview a").fancybox({
			'overlayColor': '#000',
			'overlayOpacity': .8,
			'titleShow': false
		});

		$(".plan").hoverIntent( function(){
			$(".plan").not(this).fadeTo('100',.75).removeClass('selected');
			$(this).fadeTo('100',1).addClass('selected');
		}, function() {			
			$(".plan").not('.chosen').fadeTo('100',.75).removeClass('selected');
			$(".chosen").fadeTo('100',1);
		});
		
		$('.plan a').click( function() {
			choose_plan(this);
			return false;
		});
		
		$('header .step').click( function (){
			$('.step').removeClass('active');
			$(this).addClass('active');
			
			thisclass = $(this).find('a').attr('class');
			thisheight = $('#wrapper .' + thisclass).height();
			
			if (!$('#wrapper').find('.' + thisclass).is(":visible")) {
				$('#wrapper article').fadeOut(200);
				$('#wrapper').delay(200).animate({'min-height': thisheight});
				$('#wrapper').find('.' + thisclass).delay(400).fadeIn();
				if ($(window).scrollTop() < 100) {
					$('html, body').animate({scrollTop:300}, 'slow');
				}
				return false;
			}
		});
		
		$('.prev-btn').click ( function() { 
			$('.step').removeClass('active');
			
			prevclass = $(this).parent().prev().attr('class');
			$('.step a.' + prevclass).parent().addClass('active');
			
			thisheight = $('#wrapper .' + prevclass).height();
			
			$('#wrapper article').fadeOut(200);
			$('#wrapper').delay(200).animate({'min-height': thisheight});
			$('#wrapper').find('.' + prevclass).delay(400).fadeIn();
			if ($(window).scrollTop() < 100) {
				$('html, body').animate({scrollTop:300}, 'slow');
			}
			return false;
			
		});
		
		$('.next-btn').click ( function() {
			$('.step').removeClass('active');
			
			nextclass = $(this).parent().next().attr('class');
			$('.step a.' + nextclass).parent().addClass('active');
			
			thisheight = $('#wrapper .' + nextclass).height();
			
			$('#wrapper article').fadeOut(200);
			$('#wrapper').delay(200).animate({'min-height': thisheight});
			$('#wrapper').find('.' + nextclass).delay(400).fadeIn();
			if ($(window).scrollTop() < 100) {
				$('html, body').animate({scrollTop:300}, 'slow');
			}
			return false;
			
		});
		
		$('#login-btn, #login #close').click ( function() {
			if (!$('#login-btn').hasClass('active')) {
				$('nav a.active').removeClass('active').addClass('disabled');
				$('#login-btn').addClass('active');
				$('body').animate({'margin-top':280});
				$('#login').show().animate({'top':0});
				$('#login input').focus();
			} else {
				$('nav a.disabled').addClass('active');
				$('#login-btn').removeClass('active');
				$('body').animate({'margin-top':0});
				$('#login').show().animate({'top':-280});
				$('#login input').blur();
			}
			return false;
		});
		
		if ($.browser.webkit) {
    		$('input').attr('autocomplete', 'off');
		}
		
		$.validator.addMethod("accept", function(value, element, param) {
			return value.match(new RegExp("^" + param + "$"));
		});

		
		$("#register").validate({
		  rules: {
		  	username: {
		  		accept: "[a-zA-Z0-9_]+"
	  		},
	  		account_name: {
		  		accept: "[a-zA-Z0-9_\-]+"
	  		},
		    email: {
		      required: true,
		      email: true
		    },
		    terms: "required",
		    password: "required",
		    retype_password: {
		      equalTo: "#password"
	    	}
		  }, 
		  messages: {
		  	username: 'Please provide a valid username<br />(Letters, numerals and underscores only)',
		  	account_name: ''
		  }
		});
		
		$(".contactForm").validate({
		  rules: {
		    email: {
		      required: true,
		      email: true
		    }
		    }
		});

		
});