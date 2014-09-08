$(document).ready(function () {

//used for the access level tooltip
	$(function () {
		$(".access-tooltip").tooltip();
	});
//this is required to stop the bootstrap dropdown closing when clicked in
	$(function () {
	// Fix input element click problem, without this it closes on click
		$('.dropdown input, .dropdown label').click(function (e) {
			e.stopPropagation();
		});
	});

/*	don't show the river comment form unless the user is logged in	*/
	if (!elgg.is_logged_in()) {
		$('div.elgg-river-responses form.form-horizontal').hide();
		$('.elgg-river-comments li:last-child').css('border-bottom', '1px solid #D4D4D4');
	}

/*	the fix for combining the search forms on the members page	*/
	$('form#elgg-form-members-search input:radio').change(function () {
		var action = elgg.config.wwwroot + 'members/search/';
		$('form#elgg-form-members-search').attr('action', action + $(this).val());
		$('.search-query').attr('name', $(this).val());
	});

});		//	end document ready
