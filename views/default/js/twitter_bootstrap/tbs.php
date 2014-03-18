<?php
/**
 * @package Twitter Bootstrap
 */
?>
elgg.provide('elgg.tbs');


elgg.tbs.init = function() {
	
};

elgg.register_hook_handler('init', 'system', elgg.tbs.init);

//	@todo - move below info into elgg.tbs namespace

	alert('tbs is loaded');
