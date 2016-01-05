$(document).ready(function() {
	//login system for admin 
	$('#admin-modal').on('click',function() {
		var adminname = $('#admin-name').val();
		var adminpass = $('#admin-pass').val();
		if(adminname=="" || adminpass==""){
			$('#admin_login').html('All the fields are required to be filled.');
			$('#admin_modal').modal({
				show: true,
			});
		} else {
			$.ajax({ type: 'POST', url: 'admin-login.php', data: { adminname: adminname, password: adminpass }}).success(function(data) {
				var invalid = data;
				if(invalid=='in'){
					$('#admin_login').html('Invalid username and password, try again later');
					$('#admin_modal').modal({
						show: true,
					});
				} else {
					$('#admin_login').html('You\'re are logged in as an admin. Click <strong>OK</strong> to continue.');
					$('#admin_modal').modal({
						show: true,
					});
				}
			});
		}
		
		$('#bhaagjaa').on('click',function() {
			$('#admin-modal').modal('hide');
			
		});
		
	});
		window.onbeforeunload = function (event) {
			if (typeof event == 'undefined') {
				event = window.event;
			}
			if (event) {
				
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
});