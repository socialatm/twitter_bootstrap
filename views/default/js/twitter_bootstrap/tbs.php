<?php
/**
 * @package Twitter Bootstrap
 */
?>
elgg.provide('elgg.tbs');

elgg.tbs.init = function() {

	$(".alert-success").delay(3000).slideUp("slow", function(){$(this).remove();});	//	delays a success message for 3 seconds then removes it
};

elgg.register_hook_handler('init', 'system', elgg.tbs.init);

//	@todo - move below info into elgg.tbs namespace

//	alert('tbs is loaded');
	
	

