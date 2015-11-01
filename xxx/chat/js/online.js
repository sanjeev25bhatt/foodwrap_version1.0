$(document).ready(function() {
	$(window).load(function() {
		$.post('online.php', {action: 'online'},function(data){
			$('#pea').html(data);
		});
		
	});
	$(window).unload(function() {	
		alert('aman');
		$.post('online.php', {action: 'offline'});
	});
});