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
	<div class="container">
    <div class="row">
        <div class="col-md-5">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-comment"></span><strong class="chat-with">Vivek</strong>
                    <div class="btn-group pull-right">
                        <button class="btn btn-default btn-xs" type="button">
                            <span class="glyphicon glyphicon-chevron-down"></span>
                        </button>
                        
                    </div>
                </div>
                <div class="panel-body">
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
    </div>
</div>

<div id="asdf"></div>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/chat.js"></script>

<script type="text/javascript">
		$(document).ready(function() {
			$('#btn-chat-user').on('click',function(){
				var chattext = $('#btn-user-input').val();
				$.post('chat-user.php', { chat: chattext}, function(data){
					$('#user-chat').load('DisplayUserMessages.php');
					$('#btn-user-input').val("");
				});
			});
			$('#btn-user-input').bind('keypress',function(e) {
				if(e.keyCode == '13'){
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
		});
</script>

</body>
</html>

<?php
	} else {
		
	}
?>