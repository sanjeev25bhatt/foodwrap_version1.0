$(function() {
	$.post('loggedin.php', function(data) {
		var hide = data;
		var user_name = hide.replace("You're logged in, ","");
		if(hide!='5'){
			$("#user-name").html(user_name);
		}
	});
});

$(document).ready(function(){
	$('#toggle-route').text('Check route');
	$('#toggle-route').toggle(function() {
		$('#toggle-route').text('Hide route');
	},function(){
		$('#toggle-route').text('Check route');
	});
	$("#toggle-route").click(function(){
		$("#dvPanel").slideToggle("slow");
	});
	
});