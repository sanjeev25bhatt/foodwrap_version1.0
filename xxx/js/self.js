$(document).ready(function() {
	$.post('register.php',function(data) {
			$('#dialog').attr('title','Error').text('data').dialog();
	});
});