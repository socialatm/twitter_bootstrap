/*****    Twitter Bootstrap js    *****/
$(document).ready(function () {

//    only allow one navbar to be open at a time on small viewports
    "use strict";
    $(".navbar-toggle").click(function (event) {
        $(this).parent().siblings(".navbar-collapse").toggleClass("in");
        if ($(this).parent().siblings(".navbar-collapse").hasClass("in")) {
            $(".navbar-toggle").not($(this)).parent().siblings(".navbar-collapse").removeClass("in");
        }
        event.stopPropagation();
    });

//    delays a success message for 3 seconds then removes it
    $(".alert-success").delay(3000).slideUp("slow", function () {$(this).remove(); });

//    likes tooltip
    $(".elgg-menu-item-likes-count a").tooltip({
        container: 'body'
    });

//    likes popover
    $(".elgg-menu-item-likes-count a").popover({
        container: 'body',
        placement: 'top',
        html: true,
        content: function () {
            return $(this).parent().children(".elgg-likes").html();
        }
    });

//    delegate and Toggle the collapse state of the widget
    $(".elgg-layout-widgets").on("click", "a.elgg-widget-collapse-button", function () {
        $(this).parent().find('span').first().toggleClass("glyphicon-chevron-down glyphicon-chevron-right");
        $(this).parent().parent().parent().find('.elgg-body').slideToggle('medium');
    });
});
