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
<div class="navbar navbar-default navbar-fixed-bottom">
	<div class="row">
		<div class="container padded">
			<div id="11" class="hidden col-sm-4">
				<div class="chat_wrap panel panel-primary">
					<div class="toggle"><h3>Online Chat Support</h3></a>
					</div>
					<div class="chat">
						<div class="panel-heading">
						<header>
							<h3 id="inner" class="toggle chat-with">Online Support</h3>
						</header>
						</div>
						<div class="chatArea panel-body">
							<ul class="admin-chat-material chat">

							</ul>
						</div>
						<div class="panel-footer">
							<div class="input-group">
								<input class="form-control input-sm btn-admin-input" type="text" placeholder="Type your message here...">
								<span class="input-group-btn">
									<button class="btn btn-warning btn-sm">Send</button>
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="12" class="hidden col-sm-4">
				<div class="chat_wrap panel panel-primary">
					<div class="toggle"><h3>Online Chat Support</h3></a>
					</div>
					<div class="chat">
						<div class="panel-heading">
						<header>
							<h3 id="inner" class="toggle chat-with">Online Support</h3>
						</header>
						</div>
						<div class="chatArea panel-body">
							<ul class="admin-chat-material chat">
								
							</ul>
						</div>
						<div class="panel-footer">
							<div class="input-group">
								<input class="form-control input-sm btn-admin-input" type="text" placeholder="Type your message here...">
								<span class="input-group-btn">
									<button class="btn btn-warning btn-sm">Send</button>
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="13" class="hidden col-sm-4">
				<div class="chat_wrap panel panel-primary">
					<div class="toggle"><h3>Online Chat Support</h3></a>
					</div>
					<div class="chat">
						<div class="panel-heading">
						<header>
							<h3 id="inner" class="toggle chat-with">Online Support</h3>
						</header>
						</div>
						<div class="chatArea panel-body">
							<ul class="admin-chat-material chat">
							
							</ul>
						</div>
						<div class="panel-footer">
							<div class="input-group">
								<input class="form-control input-sm btn-admin-input" type="text" placeholder="Type your message here...">
								<span class="input-group-btn">
									<button class="btn btn-warning btn-sm">Send</button>
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

	<script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/chat.js"></script>
	
	<script type="text/javascript">
		$(document).ready(function() {
			var temp = "";
			var temp_11 = "";
			var temp_12 = "";
			var temp_13 = "";
			var admin_id = <?php echo(json_encode($_SESSION['admin_id']));?>;
			
			function my_status() {
				$.ajax({type:'POST', url:'my_status.php', success: function(data){
					id_back = data;
				}, async: false
				});
				return id_back;
			}
			
			setInterval(function() {
                localStorage.setItem("temp", my_status());
				var $a = localStorage.getItem("temp");
								
				if($a!='0' && $a!='' &&$a!='10'){
					$.getJSON('box_id.php', function(data) {
						for(var i=0;data[i]['uid11']!='';i++){
							var user_11 = data[i]['uid11'];
							var user_12 = data[i]['uid12'];
							var user_13 = data[i]['uid13'];
							localStorage.setItem("temp_11", user_11);
							localStorage.setItem("temp_12", user_12);
							localStorage.setItem("temp_13", user_13);
						}
					});
					
						var uid11 = localStorage.getItem("temp_11");
						var uid12 = localStorage.getItem("temp_12");
						var uid13 = localStorage.getItem("temp_13");
						
					if($a == '11'){
						$('#11').removeClass('hidden');
						$('#11').find('div.chat').attr("id", uid11);
							
					} else if($a == '12'){
						var att = $('#11').attr('class');
						var cls = att.substring(0, 6);
						if(cls == 'hidden'){
							$('#11').removeClass('hidden');
							$('#11').find('div.chat').attr("id", uid11);
						}
						$('#12').removeClass('hidden');
						$('#12').find('div.chat').attr("id", uid12);
					} else if($a == '13'){
						var att = $('#11').attr('class');
						var cls = att.substring(0, 6);
						if(cls == 'hidden'){
							$('#11').removeClass('hidden');
							$('#11').find('div.chat').attr("id", uid11);	
						}
						var att2 = $('#12').attr('class');
						var cls2 = att2.substring(0, 6);
						if(cls2 == 'hidden'){
							$('#12').removeClass('hidden');
							$('#12').find('div.chat').attr("id", uid12);
						}
						$('#13').removeClass('hidden');
						$('#13').find('div.chat').attr("id", uid13);
					}
				}
			},4000);
			
			//	$('.toggle').on('click', function(e){
			//	var toggleState = $(this).next('.chat').css('display');
			//	if($(this).text()==$('#inner').text()){
			//		$(this).parent().parent().parent().slideToggle(150);
			//	} else {
			//		$(this).('.chat').slideToggle(150);
			//	}
			//	if(toggleState == 'none') {
			//		$(this).css('display','none');
			//		$('.chat-with').css('display','block');
			//	} else {
			//		$(this).parent().parent().parent().prev().fadeIn(150);
			//		}
			//	});
			
			$('.toggle').on('click', function(e){
				var toggleState = $('.chat').css('display');
				if(toggleState == 'none') {
					$('div.toggle').css('display','none');
					$('.chat').slideToggle(350);
					$('.chat-with').css('display','block');
				} else {					
					$('.chat').slideToggle(350).promise().done(function(){
						$('div.toggle').css('display','block');
					});
				}
			});
			
			$(".toggle").hover(function() {
				$(this).css('cursor','pointer');
			}, function() {
				$(this).css('cursor','auto');
			});

			$('.btn-warning').on('click',function(){
				$('.panel-body').scrollTop($('.panel-body')[0].scrollHeight);
				var send_to = $(this).parent().parent().parent().parent().attr("id");
				var chattext = $(this).parent().prev().val();
				$.post('chat-admin.php', { chat: chattext, userid: send_to}, function(data){
					$('.btn-admin-input').val("");
				});
				var check = $(this).parent().parent().parent().parent();
				setInterval(function(){
					$(check).find('ul').load('DisplayAdminMessages.php', {user_id: send_to});
				},3000);
			});
			
		window.onbeforeunload = function (event) {
			if (typeof event == 'undefined') {
				event = window.event;
			}
			if (event) {
				$.post('online.php', {admin_id: admin_id}, function(data) {
					return data;
				});
			}
		};
		$(function () {
			$("a").click(function () {
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