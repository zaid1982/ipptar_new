$(document).ready(function() {
	
		// TODO: Improve this
		/*$('form').submit( function() {
			$(this).hide();
		});*/
		$(':submit').click( function(){
			if ($('#template_title').attr('value') == '' || $('#template_title').attr('value') == 'New Template') {
				$.growlUI('Error','Please provide a valid template name',4000);
				return false;
			} else {
				$(this).after($(this).clone().removeAttr('name'));
				$(this).hide();
			}
		});
		
		
		
		$('.checklist').hover ( function(){
			if(!$(this).hasClass('complete')) {
				$(this).find('.progress').css({opacity:.4});
				$(this).find('.status').css({'z-index':3});
			}
		}, function(){
			if(!$(this).hasClass('complete')) {
				$(this).find('.progress').css({opacity:1});
				$(this).find('.status').css({'z-index':1});
			}
		});
		
		// Show options box on checklists
		
		//$('.options-box span').click( function(event) { 
		//	window.location = $(this).attr('href'); 
		//	event.preventDefault(); 
		//});
				
		$('.options').each(function () {
			var $span = $('> span.hover', this).css('opacity', 0);
			$(this).hover(function () {
				$(this).find('span.options-box').fadeTo(200,1);
		    	$span.stop().fadeTo(200, 1);
		  	}, function () {
				$(this).find('span.options-box').fadeOut();
		    	$span.stop().fadeTo(200, 0);
		  	});
		});
		
		// Show delete button on templates
		
		//$('.delete-template').click( function(event) { 
		//	window.location = $(this).attr('href'); 
		//	event.preventDefault(); 
		//});
		
		$('.template').hover(function () {
				$(this).find('.delete-template').fadeTo(200,1);
		  	}, function () {
				$(this).find('.delete-template').fadeOut();
		});
		
		//Modal window and notifications 

		
	    
	   // if ($('#error-container').length) {
	    //	notification = $('#error-container').html();
	    //	$.growlUI('Error',notification,8000);
	    //}
	    
	 //   if ($('#notification-container').length) {
	   // 	notification = $('#notification-container').html();
	    //	$.growlUI('Notice',notification,8000);
	    //}
	   
	   
	    
	    //Custom select boxes
	    
	    
	    $('body').click(function() {
	        $('span.drop-select').parent().find('.active').slideUp(100).removeClass();
 		});
	   
		$('span.drop-select').click(function(event) { 
			if ($(this).parent().find('ul').hasClass('active')) {
	        	$(this).parent().find('ul').slideUp(100).removeClass();
			} else {
				$(this).parent().find('.active').slideUp(100).removeClass();
	        	$(this).parent().find('ul').slideDown(100).addClass('active');
	    	}
	        event.stopPropagation();
	    }); 
	    
	    
	    //Readymades selection function
	    
	    $('#select-readymade ul a').click ( function(){
	    	$('#readymades div').hide();
	    	$('#select-readymade span').text(this.text);
	        $(this).parents('ul').slideUp(100).removeClass();
	        var sequence = $('#select-readymade a').index(this);
	        $('#readymades div').eq(sequence).fadeIn();
	        $('#readymades a').fadeIn();
	    	return false;
	    });
	    
	    //Edit button in account settings
	    
	    $('.user-settings .edit').click ( function(){
	    	if(!$(this).parents('.user-settings').hasClass('active')) {
	    		$(this).parents('.user-settings').addClass('active').find('form').fadeIn();
	    		$(this).html('hide');
	    	} else {
	    		$(this).parents('.user-settings').removeClass('active').find('form').fadeOut();
	    		$(this).html('edit');
	    	}
	    	return false;
	    });

		//Delete user function 
		
		$('.user-settings .delete').click ( function() {
			$(this).parents('.user-settings').addClass('to-delete');
			$('body').prepend('<div class="modal"><h2>Delete user?</h2><div><p>This user will be permanently deleted and this process cannot be undone. Are you sure?</p></div><a href="#" class="close">Close</a><span class="modal-options"><a href="" onclick="$(\'.to-delete\').removeClass(\'to-delete\'); $.unblockUI({ onUnblock: function(){ $(\'.modal\').remove(); } }); return false;">Cancel</a><a href="" onclick="$(\'.to-delete\').find(\'input:checkbox\').attr(\'checked\',true); $(\'.to-delete\').find(\'button\').click(); return false;" class="focus">Delete user</a></span></div>');
			$.blockUI({ message: $('.modal') });
	        $('.blockOverlay, .close').click( function() {
	        	$('.to-delete').removeClass('to-delete');
		        $.unblockUI({ onUnblock: function(){ 
		        	$('.modal').remove(); 
		        	} 
		        }); 
		        return false;
			});        
	        $('.modal-options').find('.focus').focus();
	        return false;
	    });
	    
	    //Delete checklist function
	    
	    $('.delete-btn, #delete-btn').click ( function() {
	    	link = $(this).attr('href');
			$('body').prepend('<div class="modal"><h2>Delete checklist?</h2><div><p>This checklist will be permanently deleted. This process cannot be undone. Are you sure?</p></div><a href="#" class="close">Close</a><span class="modal-options"><a href="" onclick="$.unblockUI({ onUnblock: function(){ $(\'.modal\').remove(); } }); return false;">Cancel</a><a href="" class="focus">Delete checklist</a></span></div>');
			$('.focus').attr('href', link);
			$.blockUI({ message: $('.modal') });
	        $('.blockOverlay, .close').click( function() {
		        $.unblockUI({ onUnblock: function(){ 
		        	$('.modal').remove(); 
		        	} 
		        }); 
		        return false;
			});        
	        $('.modal-options').find('.focus').focus();
	        return false;
	    });
	    
	    //Archive checklist function
	    
	     $('.archive-btn, #archive-btn').click ( function() {
	    	link = $(this).attr('href');
			$('body').prepend('<div class="modal"><h2>Archive checklist?</h2><div><p>This checklist will be archived. Are you sure?</p></div><a href="#" class="close">Close</a><span class="modal-options"><a href="" onclick="$.unblockUI({ onUnblock: function(){ $(\'.modal\').remove(); } }); return false;">Cancel</a><a href="" class="focus">Archive checklist</a></span></div>');
			$('.focus').attr('href', link);
			$.blockUI({ message: $('.modal') });
	        $('.blockOverlay, .close').click( function() {
		        $.unblockUI({ onUnblock: function(){ 
		        	$('.modal').remove(); 
		        	} 
		        }); 
		        return false;
			});        
	        $('.modal-options').find('.focus').focus();
	        return false;
	    });
	    
	    
	    //Activate checklist function
	    
	     $('.activate-btn, #activate-btn').click ( function() {
	    	link = $(this).attr('href');
			$('body').prepend('<div class="modal"><h2>Activate checklist?</h2><div><p>This checklist will be made active. Are you sure?</p></div><a href="#" class="close">Close</a><span class="modal-options"><a href="" onclick="$.unblockUI({ onUnblock: function(){ $(\'.modal\').remove(); } }); return false;">Cancel</a><a href="" class="focus">Activate checklist</a></span></div>');
			$('.focus').attr('href', link);
			$.blockUI({ message: $('.modal') });
	        $('.blockOverlay, .close').click( function() {
		        $.unblockUI({ onUnblock: function(){ 
		        	$('.modal').remove(); 
		        	} 
		        }); 
		        return false;
			});        
	        $('.modal-options').find('.focus').focus();
	        return false;
	    });
	    
	    //Delete template function
	    
	    $('.delete-template, #delete-template').click ( function() {
	    	var link = $(this).attr('href');
			$('body').prepend('<div class="modal"><h2>Delete template?</h2><div><p>This template will be permanently deleted. This process cannot be undone. Are you sure?</p></div><a href="#" class="close">Close</a><span class="modal-options"><a href="" onclick="$.unblockUI({ onUnblock: function(){ $(\'.modal\').remove(); } }); return false;">Cancel</a><a href="" class="focus">Delete template</a></span></div>');
			$('.focus').attr('href', link);
			$.blockUI({ message: $('.modal') });
	        $('.blockOverlay, .close').click( function() {
		        $.unblockUI({ onUnblock: function(){ 
		        	$('.modal').remove(); 
		        	} 
		        }); 
		        return false;
			});        
	        $('.modal-options').find('.focus').focus();
	        return false;
	    });
	    
	      //Checklist complete, do you want to archive?
	    
	    $('#confirmation-container').each ( function() {
	    	var link = $(this).find('a').attr('href');
	    	var title = $(this).find('span').html();
			$('body').prepend('<div class="modal"><h2>Congratulations, Checklist complete!</h2><div><p>According to the report, <strong>' + title + '</strong> is now ready to launch.  <br />Do you want to archive this checklist now?</p></div><a href="#" class="close">Close</a><span class="modal-options"><a href="" onclick="$.unblockUI({ onUnblock: function(){ $(\'.modal\').remove(); } }); return false;">No thanks</a><a href="" class="focus">Yes, archive this checklist</a></span></div>');
			$('.focus').attr('href', link);
			$.blockUI({ message: $('.modal') });
	        $('.blockOverlay, .close').click( function() {
		        $.unblockUI({ onUnblock: function(){ 
		        	$('.modal').remove(); 
		        	} 
		        }); 
		        return false;
			});        
	        $('.modal-options').find('.focus').focus();
	        return false;
	    });
	    
	      
	      //Import Template Buttom
	    
	    $('#import-template').click ( function() {
			$('body').prepend('<div class="modal"><h2>Import Template</h2><form action="" method="post" enctype="multipart/form-data" ><div><p>Import a template from a .csv or .txt file. </p><p class="small">Each row represents a field and contains three columns - field name, comments, and group name. Grouped fields should contain the same group name. Do NOT use commas within columns. Fields will be sorted by group name and then by order. <a href="http://launchlist.net/blog/?p=25" target="_blank" title="More Information">Click here for more information</a></p><input type="file" name="uploaded_template" /></div><a href="#" class="close">Close</a><span class="modal-options"><a href="" onclick="$(\'.to-delete\').removeClass(\'to-delete\'); $.unblockUI({ onUnblock: function(){ $(\'.modal\').remove(); } }); return false;">Cancel</a><input type="hidden" name="import_template" value="1" /><button type="submit">Upload</button></span></form></div>');
			$.blockUI({ message: $('.modal') });
	        $('.blockOverlay, .close').click( function() {
		        $.unblockUI({ onUnblock: function(){ 
		        	$('.modal').remove(); 
		        	} 
		        }); 
		        return false;
			});        
	        return false;
	    });
	    
	    
	  
		$('#welcome-message').each ( function() {
			$.blockUI({ message: $('#welcome-message') });
		        $('.close').click( function() {
		        	 $.unblockUI({ onUnblock: function(){ 
			        	$('.modal').remove(); 
			        	} 
			        }); 
			        return false;
				});        
		        $('.modal-options').find('.focus').focus();
		        return false;
		});
	    
});

