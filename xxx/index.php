<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fresh Wraap changed</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/self.css" rel="stylesheet">
	<link href="chat/css/chatu.css" rel="stylesheet">
	<link rel="stylesheet" href="chat/css/new_chat.css">
	<link href="css/footer.css" rel="stylesheet">  
</head>
  
<body id="index">

<!--Navigation bar starts-->
<?php
include "nav-bar.php";
?>
<!--Navigation bar ends-->

<!--Carousal Starts-->
<?php
include "carousel.php";
?>
<!--Carousal Ends-->
<div>
<div class="container padded">
    <div class="row">
        <div class="col-lg-12"><h2>Trending Services</h2><hr></div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <a href="breakfast.php"><img class="img-circle img-responsive" src="images/breakfast.jpg"></a>
            <h3>Breakfast</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <p><a class="btn btn-primary" href="#">View details &raquo;</a></p>
        </div>
        <div class="col-sm-3">
            <a href="breakfast.php"><img class="img-circle img-responsive" src="images/beverages.jpg"></a>
            <h3>Beverages</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <p><a class="btn btn-primary" href="#">View details &raquo;</a></p>
        </div>
        <div class="col-sm-3">
            <a href="breakfast.php"><img class="img-circle img-responsive" src="images/newspaper.jpg"></a>
            <h3>Newspaper</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <p><a class="btn btn-primary" href="#">View details &raquo;</a></p>
        </div>
        <div class="col-sm-3">
            <a href="breakfast.php"><img class="img-circle img-responsive" src="images/fruits.png"></a>
            <h3>Fresh Fruits</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <p><a class="btn btn-primary" href="#">View details &raquo;</a></p>
        </div>
    </div>
</div>
</div>

<!--How It Works Block Starts-->

<div class="howItWorks">
	<div class="container padded">
		<div class="row text-center">
			<div class="col-sm-12"><h1>How It Works</h1></div>
		</div>
		<div class="row text-center">
			<div class="col-md-4">
				<span class="text-circle">1</span>
				<h3>PICK A SERVICE</h3>
			</div>
			<div class="col-md-4">
				<span class="text-circle">2</span>
				<h3>BOOK ONLINE</h3>
			</div>
			<div class="col-md-4">
				<span class="text-circle">3</span>
				<h3>PAY AFTER WORK IS DONE</h3>
			</div>
		</div>
	</div>
</div>


<!--How It Works Block Ends-->



<div class="info">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 tabbable">
                <!-- Tabs go here -->
                <ul id="myTab" class="nav nav-tabs">
                    <li class="active"><a href="#android" data-toggle="tab">Android</a></li>
                    <li><a href="#ios" data-toggle="tab">iOS</a></li>
                    <li><a href="#win" data-toggle="tab">Windows</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="android"><p><img src="images/gplay.jpg" alt="google" class="pull-right">Android... Donec eget sem lacus. Morbi vitae viverra metus. Duis gravida sapien in hendrerit ultricies. Maecenas in vestibulum lectus. Pellentesque eleifend feugiat tincidunt. <br><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star-empty"></span></p></div>
                    <div class="tab-pane fade in" id="ios"><p><img src="images/appstore.jpg" alt="google" class="pull-right">iOS... Donec eget sem lacus. Morbi vitae viverra metus. Duis gravida sapien in hendrerit ultricies. Maecenas in vestibulum lectus. Pellentesque eleifend feugiat tincidunt.<br><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star-empty"></span></p></div>
                    <div class="tab-pane fade in" id="win"><p><img src="images/winstore.jpg" alt="google" class="pull-right">Windows... Donec eget sem lacus. Morbi vitae viverra metus. Duis gravida sapien in hendrerit ultricies. Maecenas in vestibulum lectus. Pellentesque eleifend feugiat tincidunt.<br><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star-empty"></span></p></div>
                </div>
            </div>
            <div class="col-sm-5 col-sm-offset-1">
                <blockquote>
                    <p>&ldquo;This App has completely revolutionized the way we travel, we will never have to wait around in the rain for transport, we can time our day perfectly. I don't know how I ever lived without it.&rdquo;</p>
                    <small>James T. Kirk, <cite title="source title">Starship Enterprise</cite></small>
                </blockquote>
            </div>
        </div>
    </div>       
</div>
<div class="hidden"><h2 id="data_hidden"></h2></div>
	<script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/self.js"></script>
	
<!--Chat box-->
<?php
if ((isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) || (isset($_COOKIE['user_id']) && !empty($_COOKIE['user_id']))) {
	if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id'])){
		$userid = $_SESSION['user_id'];
	} else if(isset($_COOKIE['user_id'])&&!empty($_COOKIE['user_id'])){
		$userid = $_COOKIE['user_id'];
	}
?>
	<div class="cd-panel chat from-right">
		<div class="panel-heading">
			<header class="cd-panel-header">
				<h1 class="chat-with toggle">Title Goes Here</h1>
				<a href="#" class="cd-panel-close">Close</a>
			</header>
		</div>
		
		<div class="chatArea panel-body cd-panel-container">
			<ul id="user-chat" class="chat">
				<a id="find_admin" class="btn btn-primary" href="javascript:void(0);">Find admin</a>
			</ul>
		</div>
		<div class="panel-footer">
			<div class="cd-panel-footer input-group">
				<input class="form-control input-sm" id="btn-user-input" type="text" placeholder="Type your message here...">
				<span class="input-group-btn">
					<button class="btn btn-warning btn-sm" id="btn-chat-user">Send</button>
				</span>
			</div>
		</div>
	</div>
	
	<script type="text/javascript">
		$(document).ready(function() {
			var modal;
			function free_admin(user){
				$.ajax({type:'POST', url:'chat/free_admin.php',data: { user_id: user}, success: function(data){
					id_return = data;
				}, async: false
				});
				return id_return;
			}
			
			$('#find_admin').on('click', function(){
				var u_id = <?php echo(json_encode($userid));?>;
                localStorage.setItem("modal", free_admin(u_id));
				var $a = localStorage.getItem("modal");
				if($a>0){					
					setInterval(function(){
						$('#user-chat').load('chat/DisplayUserMessages.php');
					},2000);
				} else {
					$('#find_admin').after('<p>' + $a + '</p>')
					$("#find_admin").addClass('hidden');
				}
              });
			  
			$('#btn-chat-user').on('click',function(){
				var x = localStorage.getItem("modal");
				$('.panel-body').scrollTop($('.panel-body')[0].scrollHeight);
				var chattext = $('#btn-user-input').val();
				if(x>0){
					$.post('chat/chat-user.php', { chat: chattext, admin_id: x}, function(data){
						$('#btn-user-input').val("");
					});	
				} 
			});
			$('#btn-user-input').bind('keypress',function(e) {
				if(e.keyCode == '13'){
					var x = localStorage.getItem("modal");
					$('.panel-body').scrollTop($('.panel-body')[0].scrollHeight);
					var chattext = $('#btn-user-input').val();
					if(x>0){
						$.post('chat/chat-user.php', { chat: chattext, admin_id: x}, function(data){
							$('#btn-user-input').val("");
						});	
					}
				}
			});
			
		});
	</script>
<?php
}
?>
        

<!--Chat box-->

<!--Footer Starts-->
<?php
include "footer.php";
?>
<!--Footer Ends-->

	<script type="text/javascript" src="chat/js/chat.js"></script>
	</body>
</html>