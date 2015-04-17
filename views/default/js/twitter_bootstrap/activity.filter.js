//     the activity filter for the river
var $ = require('jquery');

$('#elgg-river-selector-wrapper').on('changed.fu.selectlist', function () {
    "use strict";
    var url = window.location.href;
    if (window.location.search.length) {
        url = url.substring(0, url.indexOf('?'));
    }
    url += '?' + $(this).find('.hidden-field').val();
    elgg.forward(url);
});
