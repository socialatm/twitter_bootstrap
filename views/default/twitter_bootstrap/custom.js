//code found here http://stackoverflow.com/a/9262055/1543173
// Not sure of license.

$(document).scroll(function(){
    // If has not activated (has no attribute "data-top"
    if (!$('.subnav').attr('data-top')) {
        // If already fixed, then do nothing
        if ($('.subnav').hasClass('subnav-fixed')) return;
        // Remember top position
        var offset = $('.subnav').offset()
        $('.subnav').attr('data-top', offset.top);
    }

    if ($('.subnav').attr('data-top') - $('.subnav').outerHeight() <= $(this).scrollTop())
        $('.subnav').addClass('subnav-fixed');
    else
        $('.subnav').removeClass('subnav-fixed');
});

//used for the access level tooltip
$(function ()  
{ $(".access-tooltip").tooltip();  
});  

//this is required to stop the bootstrap dropdown closing when clicked in
$(function() { 
  // Fix input element click problem, without this it closes on click
  $('.dropdown input, .dropdown label').click(function(e) {
    e.stopPropagation();
  });
});