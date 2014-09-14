<?php
/*****	Twitter Bootstrap js	*****/
?>
elgg.provide('elgg.tbs');

elgg.tbs.init = function() {

	$(".alert-success").delay(3000).slideUp("slow", function(){$(this).remove();});		//	delays a success message for 3 seconds then removes it
	
/*	the fix for combining the search forms on the members page	*/
	$('form#elgg-form-members-search input:radio').change(function () {
		var action = elgg.config.wwwroot + 'members/search/';
		$('form#elgg-form-members-search').attr('action', action + $(this).val());
		$('.search-query').attr('name', $(this).val());
	});
	
/*	bootstrap-select	*/	
	$('.elgg-input-access').selectpicker({					//	read access
    style: 'btn-sm btn-success',
    size: 'auto',
	});
/*	
	$('#elgg-river-selector').selectpicker({				//	river selector
    style: 'btn-sm btn-success',
    size: 'auto',
	});
*/	
	
};		//	end elgg.tbs.init

elgg.register_hook_handler('init', 'system', elgg.tbs.init);
