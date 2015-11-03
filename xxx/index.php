<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fresh Wraap</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/self.css" rel="stylesheet">
	<link href="chat/chat.css" rel="stylesheet">
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




<a href="chat/chat-div.php">Link for chat</a> <br>
<a href="chat/admin.php">admin chat link</a> <br>


<!--Footer Starts-->
<?php
	include "footer.php";
?>
<!--Footer Ends-->
	
	<script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/self.js"></script>
	
	
  </body>
</html>