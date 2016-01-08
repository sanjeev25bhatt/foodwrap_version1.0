<?php
	include "connect.php";
	require ('core.php');
	
	if(isset($_SESSION['admin_id'])&&!empty($_SESSION['admin_id'])){
?>		
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fresh Wraap</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/chat.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Fresh Wraap</a>
    </div> 
    <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
            <li><a href="">Messages<span class="glyphicon glyphicon-comment"></span></a></li>
		</ul>
    </div>
</nav>

	<div class="chat_wrap panel panel-primary">
                <div class="toggle"><h3>Online Chat Support</h3></a>
				</div>
				<div class="chat">
					<div class="panel-heading">
					<header>
						<h3 class="toggle chat-with">Online Support</h3>
					</header>
					</div>
					<div class="chatArea panel-body">
						<ul id="admin-chat-material" class="chat">
							
						</ul>
					</div>
					<div class="panel-footer">
						<div class="input-group">
							<input class="form-control input-sm" id="btn-admin-input" type="text" placeholder="Type your message here...">
							<span class="input-group-btn">
								<button class="btn btn-warning btn-sm" id="btn-chat-admin">Send</button>
							</span>
						</div>
					</div>
				</div>
		</div>

	<script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/chat.js"></script>
	
	<script type="text/javascript">
		$(document).ready(function() {
			$('#btn-chat-admin').on('click',function(){
				$('.panel-body').scrollTop($('.panel-body')[0].scrollHeight);
				var chattext = $('#btn-admin-input').val();
				$.post('chat-admin.php', { chat: chattext}, function(data){
					$('#admin-chat-material').load('DisplayAdminMessages.php');
					$('#btn-admin-input').val("");
				});
			});
			$('#btn-admin-input').bind('keypress',function(e) {
				if(e.keyCode == '13'){
					$('.panel-body').scrollTop($('.panel-body')[0].scrollHeight);
					var chattext = $('#btn-admin-input').val();
					$.post('chat-admin.php', { chat: chattext}, function(data){
						$('#admin-chat-material').load('DisplayAdminMessages.php');
						$('#btn-admin-input').val("");
					});
				}
			});
			setInterval(function(){
				$('#admin-chat-material').load('DisplayAdminMessages.php');
			},500);
			
			$('#admin-chat-material').load('DisplayAdminMessages.php');
		
			
			$('.toggle').click(function(e){
				var toggleState = $('.chat').css('display');
				$('.chat').slideToggle(150);
				if(toggleState == 'none') {
					$('#toTop').css('display','none');
					$('div.toggle').css('display','none');
					$('.chat-with').css('display','block');
				} else {
					
					$('#toTop').css('display','block');
					$('div.toggle').fadeIn(150);
				}
			});
			$(".toggle").hover(function() {
				$(this).css('cursor','pointer');
			}, function() {
				$(this).css('cursor','auto');
			});
		
		window.onbeforeunload = function (event) {
			if (typeof event == 'undefined') {
				event = window.event;
			}
			if (event) {
				var admin_id = <?php echo(json_encode($_SESSION['admin_id']));?>;
				$.post('online.php', {admin_id: admin_id}, function(data) {
					return data;
				});
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
	</script>

	<script type="text/javascript" src="js/online.js"></script>
	
</body>
</html>

<?php		
	} else if(!isset($_SESSION['admin_id'])&&empty($_SESSION['admin_id'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fresh Wraap</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/chat.css" rel="stylesheet">
</head>
<body id="admin">
<div id="modal-container" class="container">
    <div id="vcr" class="vertical-center-row">
        <div align="center">
			<form method="" action="" class="form-horizontal tpad" role="form">
                <div class="form-group">
                    <label for="adminname" class="col-lg-2 control-label">Admin Name</label>
                    <div class="col-lg-5">
                        <input type="text" class="form-control" name="adminname" id="admin-name" placeholder="Admin Name..." />
                    </div>
                </div>
                <div class="form-group tpad">
                    <label for="password" class="col-lg-2 control-label">Password</label>
                    <div class="col-lg-5">
                        <input type="password" class="form-control" name="password" id="admin-pass" placeholder="Password...">
                    </div>
                </div>
                <div class="form-group tpad">
                    <div class="col-lg-offset-2 col-lg-5">
                        <a href="" type="button" data-toggle="modal" id="admin-modal" class="btn btn-primary btn-lg">Submit</a>
                    </div>
                </div>
            </form>
		</div>
    </div>
</div>

		<div class="modal fade" id="admin_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 class="modal-title">Notice.</h3>
                    </div>
                    <div class="modal-body">
                        <p id="admin_login"></p>
                    </div>
					 <div class="modal-footer">
                        <a href="admin.php" id="bhaagjaa" class="btn btn-default btn-lg">OK</a>
                    </div>
                
                </div>
            </div>
        
        </div>
		
	<script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/chat.js"></script>
	<script type="text/javascript" src="js/online.js"></script>
	
	
</body>
</html>
<?php
	}
?>