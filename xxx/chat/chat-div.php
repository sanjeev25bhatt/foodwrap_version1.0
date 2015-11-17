<?php
	include "connect.php";
	require ('core.php');
	if((isset($_SESSION['user_id'])&&!empty($_SESSION['user_id']))||(isset($_COOKIE['user_id'])&&!empty($_COOKIE['user_id']))){
		
?>
<html>
<head>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/self.css" rel="stylesheet">
	<link href="css/chat.css" rel="stylesheet">
</head>
<body>
			
            <div class="chat_wrap panel panel-primary">
                <div class="toggle">
					<h2>Online Chat Support</h2>
				</div>
				<div class="chat">
					<div class="panel-heading">
					<header>
						<h3 class="toggle chat-with">Online Support</h3>
					</header>
					</div>
					<div class="chatArea panel-body">
						<ul id="user-chat" class="chat">
							
						</ul>
					</div>
					<div class="panel-footer">
						<div class="input-group">
							<input class="form-control input-sm" id="btn-user-input" type="text" placeholder="Type your message here...">
							<span class="input-group-btn">
								<button class="btn btn-warning btn-sm" id="btn-chat-user">Send</button>
							</span>
						</div>
					</div>
				</div>
			</div>
        

<div id="asdf"></div>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/chat.js"></script>

<script type="text/javascript">
		$(document).ready(function() {
			$('#btn-chat-user').on('click',function(){
				$('.panel-body').scrollTop($('.panel-body')[0].scrollHeight);
				var chattext = $('#btn-user-input').val();
				$.post('chat-user.php', { chat: chattext}, function(data){
					$('#user-chat').load('DisplayUserMessages.php');
					$('#btn-user-input').val("");
				});
			});
			$('#btn-user-input').bind('keypress',function(e) {
				if(e.keyCode == '13'){
					$('.panel-body').scrollTop($('.panel-body')[0].scrollHeight);
					var chattext = $('#btn-user-input').val();
					$.post('chat-user.php', { chat: chattext}, function(data){
						$('#user-chat').load('DisplayUserMessages.php');
						$('#btn-user-input').val("");
					});
				}
			});
			setInterval(function(){
				$('#user-chat').load('DisplayUserMessages.php');
			},500);
			
			$('#user-chat').load('DisplayUserMessages.php');
		
			
			$('.toggle').click(function(e){
				var toggleState = $('.chat').css('display');
				$('.chat').slideToggle(400);
				if(toggleState == 'block') {
					$('div.toggle').fadeIn(400);
				} else {
					$('div.toggle').css('display','none');
				}
			});
			
			$(".toggle").hover(function() {
				$(this).css('cursor','pointer');
			}, function() {
				$(this).css('cursor','auto');
			});

		});
</script>

</body>
</html>

<?php
	} else {
?>
<h1>Kindly log in and continue</h1>
<?php
	}
?>