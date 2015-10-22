$(document).ready(function() {
	$.post('register.php',function(data) {
		if(data=='1'){
			$('#dialog').attr('title','Error').text('Please ahear to maximum length of fields').dialog();
		}
	});
});