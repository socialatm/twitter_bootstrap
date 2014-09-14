<?php
/*****	Twitter Bootstrap js	*****/
?>
elgg.provide('elgg.tbs');

elgg.tbs.init = function() {

	$(".alert-success").delay(3000).slideUp("slow", function(){$(this).remove();});		//	delays a success message for 3 seconds then removes it
	
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
	
/*	bootstrap-select	*/	
	$('.elgg-input-access').selectpicker({					//	read access
    style: 'btn-success',
    size: 4
    });
	
	
};		//	end elgg.tbs.init

elgg.register_hook_handler('init', 'system', elgg.tbs.init);


	
	

