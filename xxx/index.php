<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fresh Wraap changed</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/self.css" rel="stylesheet">
	<link href="chat/css/chat.css" rel="stylesheet">
	<link href="css/footer.css" rel="stylesheet">  
</head>
  
<body id="index">

<!--Navigation bar starts-->
<?php
include "nav-bar.php";
?>
<!--Navigation bar ends-->
<?php
class index
{
    function main()
    {
       // echo ("testing");
    }
}
?>

<!--Carousal Starts-->
<?php
include "carousel.php";
$m = new index();
$m->main();
?>
<!--Carousal Ends-->


<div id="services" class="container padded">
    <div class="row">
        <div class="col-lg-12"><h2 id="service" align="center">Trending Services</h2><hr></div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-md-3">
            <a href="breakfast.php"><img class="img-circle img-responsive" src="images/breakfast.jpg"></a>
            <h3>Breakfast</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <p><a class="btn btn-primary" href="#">View details &raquo;</a></p>
        </div>
        <div class="col-sm-6 col-md-3">
            <a href="breakfast.php"><img class="img-circle img-responsive" src="images/beverages.jpg"></a>
            <h3>Beverages</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <p><a class="btn btn-primary" href="#">View details &raquo;</a></p>
        </div>
        <div class="clearfix hidden-md hidden-lg"></div>
        <div class="col-sm-6 col-md-3">
            <a href="breakfast.php"><img class="img-circle img-responsive" src="images/newspaper.jpg"></a>
            <h3>Newspaper</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <p><a class="btn btn-primary" href="#">View details &raquo;</a></p>
        </div>
        <div class="col-sm-6 col-md-3">
            <a href="breakfast.php"><img class="img-circle img-responsive" src="images/fruits.png"></a>
            <h3>Fresh Fruits</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <p><a class="btn btn-primary" href="#">View details &raquo;</a></p>
        </div>
    </div>
</div>


<!--How It Works Block Starts-->

<div class="howItWorks">
	<div class="container padded">
		<div class="row text-center">
			<h1 style="margin:45px 0px;">How It Works</h1>
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
<!--Chat box-->
<?php
if ((isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) || (isset($_COOKIE['user_id']) &&
    !empty($_COOKIE['user_id']))) {

?>
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
						<ul id="user-chat" class="chat">
							<a id="find_admin" class="btn btn-primary" href="">Find admin</a>
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
<?php
}
?>
        

<!--Chat box-->

<!--Footer Starts-->
<?php
include "footer.php";
?>
<!--Footer Ends-->
	
	<script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/self.js"></script>
	
	<script type="text/javascript">
    var modal = "" ;
		$(document).ready(function() {
		 // alert (tt);
			var modal;
			function free_admin(){
				$.ajax({type:'POST', url:'chat/free_admin.php', success:function(data){
					id_return = data;
				}, async: false
				});
				return id_return;
			}
			$('#find_admin').on('click', function(){
			   
                 
                 
				//modal = free_admin();
                localStorage.setItem("modal", free_admin());
              });
			$('#btn-chat-user').on('click',function(){
			 
			 alert (localStorage.getItem("modal"));
				$('.panel-body').scrollTop($('.panel-body')[0].scrollHeight);
				var chattext = $('#btn-user-input').val();
				alert(window.modal);
                
				$.post('chat/chat-user.php', { chat: chattext}, function(data){
					$('#user-chat').load('chat/DisplayUserMessages.php');
					$('#btn-user-input').val("");
				});
				setInterval(function(){
					$('#user-chat').load('chat/DisplayUserMessages.php');
				},500);
			
			});
			$('#btn-user-input').bind('keypress',function(e) {
				if(e.keyCode == '13'){
					$('.panel-body').scrollTop($('.panel-body')[0].scrollHeight);
					var chattext = $('#btn-user-input').val();
					$.post('chat/chat-user.php', { chat: chattext}, function(data){
						$('#user-chat').load('chat/DisplayUserMessages.php');
						$('#btn-user-input').val("");
					});
					setInterval(function(){
						$('#user-chat').load('chat/DisplayUserMessages.php');
					},500);
			
				}
			});
			
		
			
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
		});
	</script>
	
	<script type="text/javascript" src="chat/js/chat.js"></script>
	
	
  </body>
</html>