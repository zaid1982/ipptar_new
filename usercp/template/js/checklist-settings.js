$(document).ready(function() {
		
		// Select template
		
		$('#select-template li.selectable').click ( function() {
			$('#select-template li.selectable').removeClass('selected');								  
			$(this).addClass('selected');
			template_id = $(this).attr("title");
			$('#template_id').val(template_id);
		});
		
		//Template scrolling
		
		$('#prev-templates').addClass('disabled');
		
		if ($('#template-holder li').length < 5) {
			$('#next-templates').addClass('disabled');
	    }
		
	    if ( $("#template-holder ul li").length != 0 ) {
			$(function() {
				$("#template-holder").jCarouselLite({
					btnNext: "#next-templates",
					btnPrev: "#prev-templates",
					mouseWheel: true,
					circular: false,
					visible: 4,
					speed: 500,
					scroll: 4,
					easing: "easeinout"
				});
			});
		}
		
		$("#start-from-scratch").toggle(function() {
			
			$('#select-template').slideToggle('slow');
			$('#start-from-scratch').html('Select a template');
			$('#select-template-title').html('Starting from Scratch');
			$('#select-template-title').css('color', '#888888');
			$('#submit_new_checklist').attr('name', 'submit_brand_new_checklist');
			return false;
			
		}, function() {
			
			$('#select-template').slideToggle('slow');
			$('#start-from-scratch').html('Start from scratch');
			$('#select-template-title').html('Choose your template');
			$('#select-template-title').css('color', '#3F3F3F');
			if ( $("#template-holder ul li").length != 0 ) {
				$('#submit_new_checklist').attr('name', 'submit_new_checklist');
			}
			return false;
			
		});
		
		if ( $("#template-holder ul li").length == 0 ) {
			$('#submit_new_checklist').attr('name', 'submit_brand_new_checklist');
		}
		
		// Add & Remove collaborators
		
		function recipient_listeners() {
			
			$('.add-btn, .remove-btn, .project-collaborators span').unbind();
			
			// Custom checkbox
			$('.project-collaborators label').click(function() {
				$(this).parent().find('span').click();
			});
			
			$(".project-collaborators span").click(function() {
				
				if ($(this).hasClass('checked')) {
					$(this).removeClass('checked');
					$(this).parent().find('input').removeAttr("checked")
				} else {
					$(this).addClass('checked');
					$(this).parent().find('input').attr('checked', 'checked');
				}
			});
		
			// Add recipient to new checklist
			$('.add-btn').click ( function() {	
				$(this).parent().find('.user-selected').val('true');
				list_item_contents = $(this).parent().html();
				$(this).parent().remove();
				$('#selected-users').append('<li>' + list_item_contents + '</li>');
				$('#selected-users').find('.add-btn').replaceWith('<a href="#" title="Remove Collaborator" class="remove-btn">Remove Collaborator</a>');
				
				//Hide Modal and add users button if there are no more users to add
				if ($('#available-users ul li').length < 1) {
					$('#add-collaborators').fadeOut();
					setTimeout($.unblockUI);
				}
				
				recipient_listeners();
				return false;
			});
			
			// Remove recipient from new checklist
			$('.remove-btn').click ( function() {	
				$(this).parent().find('.user-selected').val('false');
				list_item_contents = $(this).parent().html();
				$(this).parent().remove();
				$('#selectable-users').append('<li>' + list_item_contents + '</li>');
				$('#selectable-users').find('.remove-btn').replaceWith('<a href="#" title="Add Collaborator" class="add-btn">Add Collaborator</a>');
				
				//Show add collaborators button if hidden
				if ($('#add-collaborators').css('display') == 'none') {
					$('#add-collaborators').fadeIn();
				}
				
				recipient_listeners();
				return false;
			});
			
		}
		
		//Add users modal
	   
		$('#add-collaborators').click(function() { 
	        $.blockUI({ message: $('#available-users'), css: {width: '50%', left: '25%'} });
	        $('.blockOverlay, .close').click($.unblockUI);
	        return false;
	    }); 
	    
		
		recipient_listeners();
		
		
	});