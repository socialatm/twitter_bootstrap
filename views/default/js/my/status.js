/**
 * My Status JavaScript
 * @elgg-release: 1.9.1
 */
define(function (require) {
    'use strict';
    var $ = require('jquery');
    require('jquery.form');

// post-submit callback status form 
    riverjax.showResponse = function (responseText, statusText, xhr, $form) {
        if ($form.attr("id").substring(0, 11) === 'status-edit') {
            $form.parent(".elgg-body").find("p").html(responseText);
            $form.hide();
        } else {
            $(".elgg-list-river").before(responseText);                                     //     adds the new activity to the top of the river
            $(".elgg-menu-item-comment").remove();                                          //     removes the comment bubble from the new activity
            $(".elgg-river").css("border-top", 0);                                          //     fixes the top border issue
            $(".elgg-river").first().css("border-top", "1px solid #ddd");
            $form.resetForm();
            $("[id*='status-edit']").hide();
        }
    };

// post-submit callback comment form
    riverjax.commentResponse = function (responseText, statusText, xhr, $form) {
        if ($form.find("a").hasClass("elgg-cancel")) {                                      //     means it's the comment edit form
            $form.closest("li").find("p").html(responseText);
            $form.addClass("hidden");
        } else {
            $($form).before(responseText);
            $($form).siblings("ul").last().addClass("elgg-river-comments");
            $form.resetForm();
        }
    }

$(".elgg-menu-item-comment").remove();                         //     removes the comment bubble from the river menu
var options = {
    success:     riverjax.showResponse,                         //     post-submit callback
    delegation: true
};
var commentOptions = {
    success: riverjax.commentResponse,       //     post-submit callback
    delegation: true
};

// submit a comment form
$("[id*='comment']").ajaxForm(commentOptions).submit(function () {
    'use strict';
});

// submit the status form
$("#riverjax").ajaxForm(options).submit(function () {
    'use strict';
});

/*     don't show the river comment form unless the user is logged in     */
if (!elgg.is_logged_in()) {
    $('.elgg-form-comments-add').hide();
    $('.elgg-river-comments li:last-child').css('border-bottom', '1px solid #D4D4D4');
}

$("[id*='status-edit']").hide();

// edit a status
$("[id*='status-edit']").ajaxForm(options).submit(function () {
    'use strict';
});

$("div.col-md-9").on("click", "a.status-edit", function (e) {
    'use strict';
    $(this).closest("ul").siblings("form").slideToggle("slow");
    e.preventDefault();
});

$("div.col-md-9").on("click", "#status-submit", function (e) {
    'use strict';
    riverjax.showResponse;
    e.preventDefault();
});

});
