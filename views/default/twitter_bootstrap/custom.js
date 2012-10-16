$(document).ready(function () {
//code found here http://stackoverflow.com/a/9262055/1543173
// Not sure of license.

	'use strict';
	$(document).scroll(function () {
	// If has not activated (has no attribute "data-top"
		if (!$('.subnav').attr('data-top')) {
		// If already fixed, then do nothing
			if ($('.subnav').hasClass('subnav-fixed')) {
				return;
			}
			// Remember top position
			var offset = $('.subnav').offset();
			$('.subnav').attr('data-top', offset.top);
		}
		if ($('.subnav').attr('data-top') - $('.subnav').outerHeight() <= $(this).scrollTop()) {
			$('.subnav').addClass('subnav-fixed');
		} else {
			$('.subnav').removeClass('subnav-fixed');
		}
	});
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
// popup for likes
	$('[rel="clickover"]').clickover();
/* replace Elgg css classes with Twitter bootstrap css classes
 * Example: remove the Elgg class 'elgg-state-selected' from all <li> line items and replace it with the Twitter bootstrap class 'active'.
 * bootstrapMapCss('li', 'elgg-state-selected', 'active');
 */
	function bootstrapMapCss(node, replaced, added) {

		$(node).each(function () {
			if ($(this).hasClass(replaced)) {$(this).removeClass(replaced).addClass(added); }
		});
	}

	bootstrapMapCss('li', 'elgg-state-selected', 'active');

/* end replace Elgg css classes with Twitter bootstrap css classes	*/
/* set minimum height of content to force the footer to the bottom of the page	*/
	var tb_content = $('#tb-content').height();
	if (tb_content < 700) {$('#tb-content').height(700); }
	
/*	don't show the river comment form unless the user is logged in	*/
	if(!elgg.is_logged_in()) {
		$('div.elgg-river-responses form.form-horizontal').hide();
		$('.elgg-river-comments li:last-child').css('border-bottom', '1px solid #D4D4D4');
	};
	
});