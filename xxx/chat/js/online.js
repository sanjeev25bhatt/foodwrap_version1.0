window.onbeforeunload = function (event) {
    var message = 'Important: Please click on \'Save\' button to leave this page.';
    if (typeof event == 'undefined') {
        event = window.event;
    }
    if (event) {
		
		return data;
    }
    
};

$(function () {
    $("a").not('#lnkLogOut').click(function () {
        window.onbeforeunload = null;
    });
    $(".btn").click(function () {
        window.onbeforeunload = null;
});
});