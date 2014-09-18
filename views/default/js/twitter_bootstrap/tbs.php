<?php
/*****	Twitter Bootstrap js	*****/
?>
elgg.provide('elgg.tbs');

elgg.tbs.init = function() {

	$(".alert-success").delay(3000).slideUp("slow", function(){$(this).remove();});		//	delays a success message for 3 seconds then removes it
	
/*	bootstrap-select	*/	
	$('.elgg-input-access').selectpicker({					//	read access
    style: 'btn-sm btn-success',
    size: 'auto',
	});
/*	
	$('#elgg-river-selector').selectpicker({				//	river selector
    style: 'btn-sm',
    });
*/	
	
};		//	end elgg.tbs.init

elgg.register_hook_handler('init', 'system', elgg.tbs.init);
