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
	bootstrapMapCss('form#elgg-form-members-search .elgg-input-radios li', '', 'radio inline');	// inline radio buttons on the members page form... twitter bootstrap css

/* end replace Elgg css classes with Twitter bootstrap css classes	*/

	
/*	don't show the river comment form unless the user is logged in	*/
	if (!elgg.is_logged_in()) {
		$('div.elgg-river-responses form.form-horizontal').hide();
		$('.elgg-river-comments li:last-child').css('border-bottom', '1px solid #D4D4D4');
	}
/*	adjust label width on forms when user is not logged in	*/

	if (!elgg.is_logged_in()) {
		$('.control-label').css('width', '75');
	}
	$('#elgg-river-selector').addClass('pull-right');
	
	/*	removes the placeholder on focus, adds it back on blur	*/
	$("div.elgg-river-responses input.controls-text").focus(function () {
		$(this).attr('placeholder', '');
	});
	$("div.elgg-river-responses input.controls-text").blur(function () {
		$(this).attr('placeholder', elgg.echo("twitter_bootstrap:addcomments"));
	});

/*	the fix for combining the search forms on the members page	*/
	$('form#elgg-form-members-search input:radio').change(function () {
		var action = elgg.config.wwwroot + 'members/search/';
		$('form#elgg-form-members-search').attr('action', action + $(this).val());
		$('.search-query').attr('name', $(this).val());
	});

/*	show the system messages in a modal	*/
	if ($('.elgg-page-messages	p').text() != '') {
		$('#myModal').modal('show');
	}
/*	the you decide button	*/
	$(".elgg-input-access:checked").parent().addClass('btn-success');
	$('div.dropdown-menu label input.elgg-input-access:checked').parent().parent().siblings('.dropdown-toggle').addClass('btn-success');

	$(".elgg-input-access").parent().click(function () {
		$(this).siblings('#read-access-caret').removeClass('btn-success');
		$(this).siblings().children(".elgg-input-access:checked").parent().removeClass('btn-success');
		$(this).siblings().children(".elgg-input-access:checked").removeAttr('checked');
		$(this).siblings('.dropdown-menu').children('.btn-success').removeClass('btn-success');
		$(this).siblings('.dropdown-menu').children().children(".elgg-input-access:checked").removeAttr('checked');
		$(this).parent().siblings('.btn-success').children().removeAttr('checked');
		$(this).parent().siblings('.btn-success').removeClass('btn-success');
		$(this).parent().siblings('#read-access-caret').addClass('btn-success');
		var value = $(this).children().attr('checked', 'checked');
		$(this).addClass('btn-success');
	});

/*****	bootstrap-wysihtml5	*****/

	$('textarea').wysihtml5();
	editor.composer.iframe.scrolling = "no";
	editor.composer.iframe.style.maxHeight = "260px";
	var larger = "260px";

	editor.observe("load", function () {
		$(editor.composer.element).focus(function () {
			$(editor.composer.iframe).height(larger);
			editor.composer.iframe.height = larger;
		});

		$(editor.composer.element).blur(function () {
			if (editor.composer.iframe.height === larger) {$(editor.composer.iframe).height(larger); }
		});	// end blur

		$("#access_id_btn").click(function () {
			$(this).focus();
		});
	});	// end observe
});