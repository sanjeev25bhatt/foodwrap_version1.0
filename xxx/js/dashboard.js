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
	$('#toggle-track').click(function() {
		if(!$('#place').is(":hidden")){
			$("#place").slideToggle("fast");
		}
		$('#track').slideToggle("slow");
	});
	$('#toggle-place').click(function() {
		if(!$('#track').is(":hidden")){
			$("#track").slideToggle("fast");
		}
		$("#place").slideToggle("slow");
	});
	if($("#dvPanel").is(":hidden")){
		$('#toggle-route').text('Check route');
	} 
	$("#toggle-route").click(function(){
		if($("#dvPanel").is(":hidden")){
			$('#toggle-route').text('Hide route');
		} else if(!$("#dvPanel").is(":hidden")){
			$('#toggle-route').text('Check route');
		}
		$("#dvPanel").slideToggle("slow");
	});
});