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

/*	adjust placement of the river filter	*/
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
});		//	end document ready
