$(document).ready(function() {
	
	
	
	//auto active
	$("#index a:contains('Home')").parent().addClass('active');
	$("#contact a:contains('Contact Us')").parent().addClass('active');
	$("#services a:contains('Services')").parent().addClass('active');
	
	//opening signup modal
	$('.to-signup').on('click',function() {
		$('#signup-modal').modal({
			show:true,
		});
	});
	
	//opening login modal
	$('.to-login').on('click',function() {
		$('#login-modal').modal({
			show:true,
		});
	});
	
	//login modal through signup modal
	$('#to-login-modal').on('click',function() {
		$('#signup-modal').modal('hide');
		$('#login-modal').modal({
			show:true,
		});
	});
	
	
	//signup modal through login modal
	$('#to-signup-modal').on('click',function() {
		$('#login-modal').modal('hide');
		$('#signup-modal').modal({
			show:true,
		});
	});
	
	//Opening query modal on sign up
	$('#new-reg').on('click',function() {
		var firstname = $('#firstname').val();
		var surname = $('#surname').val();
		var email = $('#email').val();
		var password = $('#password').val();
		var password_again = $('#password_again').val();
		var phone = $('#phone').val();
		
		$.post('register.php', { firstname: firstname, surname: surname, email: email, phone: phone, password: password, password_again: password_again }, function(data) {
			$('#signup-modal').modal('hide');
			$('#query_modal').html(data);
			$('#my_query_modal').modal({
				show: true,
			});
		});
		$('#bhaagjaa').on('click',function() {
			$('#my_query_modal').modal('hide');
		});
	});
	
	//Dealing with the changes when user login
	$('#old-reg').on('click',function() {
		var email = $('#email-log').val();
		var password = $('#pass-log').val();
		if(email==""||password==""){
			$('#login-modal').modal('hide');
			$('#query_modal').html('All the fields are required to be filled.');
			$('#my_query_modal').modal({
				show: true,
			});
		} else {		
			$.post('loginform.inc.php', { email: email, password: password }, function(data) {
				$('#login-modal').modal('hide');
				var invalid = data;
				if(invalid=='1'){
					$('#query_modal').html('Invalid username and password, try again later');
					$('#my_query_modal').modal({
						show: true,
					});
				}else {
					$('#hide-it').hide("fast");
					$('#hide-it-login').hide("fast");
					$("#my-reg").html(data);
					$('#show-it').show("fast");
					$('#show-it-logout').show("fast");
				}
			});
		}
		$('#bhaagjaa').on('click',function() {
			$('#my_query_modal').modal('hide');
		});
	});
	
	//Pop up when user submits the query from contact.php
	$('#my_modal').on('click',function() {
		var email = $('#email-contact').val();
		var message = $('#message').val();
		
		$.post('user-submit.php', { email: email, message: message }, function(data) {
			$('#user-submit').text(data);
			$('#myModal').modal({
				show:true,
			});
		});
		
		$('#chumantar').on('click',function() {
			$('#myModal').modal('hide');
		});
	});
	
	
	
	
	
});