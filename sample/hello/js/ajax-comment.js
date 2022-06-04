jQuery(function($){
	$(document).on('submit','#commentform',function(e){
		e.preventDefault();
		// define some vars
		var respond = $('#respond'), // comment form container
		    commentsdiv = $('#comments'),
		    commentlist = $('.comments-list'), // comment list container
		    cancelreplylink = $('#cancel-comment-reply-link');
		// ajax request
		$.ajax({
			type : 'POST',
			url : hello_ajax_comment_params.ajaxurl, // admin-ajax.php URL
			data: $(this).serialize() + '&action=ajaxcomments', // send form data + action paramete
			success: function ( response ) {
                if (response.status_or_comment_html == 1) {
                    respond.append( response.alert_data );
                }
				else if (response.status_or_comment_html == 2) {
					respond.append( response.alert_data );
				}
				else {
					if ( commentlist.length > 0 ){
						$("#comments-number-text").text(response.comments_number_text);
						// if in reply to another comment
						if ( respond.parent().hasClass( 'comment' ) ){
							// if the other replies exist
							if ( respond.parent().children( '.children' ).length ){	
								respond.parent().children( '.children' ).append( response.status_or_comment_html );
							} 
							else {
								// if no replies, add <ul class="children">
								comment_html = '<ul class="children">' + response.status_or_comment_html + '</ul>';
								respond.parent().append( comment_html );
							}
							// close respond form
							cancelreplylink.trigger('click');
						} 
						else {
							// simple comment
							commentlist.append( response.status_or_comment_html );
						}
					}
					else {
						// if no comments yet
						comment_html = '<h5 id="comments-number-text">' + response.comments_number_text + '</h5><ul class="unstyled comments-list">' + response.status_or_comment_html + '</ul>';
						commentsdiv.append( comment_html );
					}
					respond.append( response.alert_data );
				}
			},
			complete: function(){
				$( 'input[name="author"]' ).val('');
				$( 'input[name="email"]' ).val('');
				$('textarea[name="comment"]').val('');
			}
		});
		return false;
	});
});