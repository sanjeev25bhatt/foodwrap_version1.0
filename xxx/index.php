<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fresh Wraap</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/self.css" rel="stylesheet">
	<script type="text/javascript" src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script type="text/javascript" src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	  
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
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="contact.php">Contact Us</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Services<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="#">Newspaper subscription</a></li>
                    <li><a href="#">Breakfast</a></li>
                    <li><a href="#">Beverages</a></li>
                    <li><a href="#">Fresh Fruits</a></li>
					<li><a href="#">Delievery</a></li>
                </ul>
            </li>
			<li><form action="#"><a href="#signup-modal" data-toggle="modal" class="btn btn-danger navbar-btn">Sign Up</a></form></li>
			<li><a href="#login-modal" data-toggle="modal">Log in</a></li>
		</ul>
    </div>
</nav>

	
	<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 class="modal-title">Sign Up</h3>
                    </div>
                    <div class="modal-body">
                        <p>Sign Up with Facebook</p>
                        <p id="modal-or">or</p><hr />
						<form method="POST" action="loginform.inc.php" class="form-horizontal tpad" role="form">
							<div class="form-group">
								<label for="email" class="col-lg-5">Email: </label><br />
								<div class="col-lg-12">
									<input type="email" name="email" class="form-control" placeholder="Email..">
								</div>
							</div>
							<div class="form-group">
								<label for="password" class="col-lg-5">Password: </label><br />
								<div class="col-lg-12">
									<input type="password" name="password" class="form-control" placeholder="Password.." />
								</div>
							</div>
							<input type="submit" value="Log In" />
						</form>
                    </div>
                    <div class="modal-footer">
                        <a href="index.php" class="btn btn-default btn-lg">OK</a>
                    </div>
                </div>
            </div>
    </div>
							
	
	
	<div class="modal fade" id="signup-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 class="modal-title">Sign Up</h3>
                    </div>
                    <div class="modal-body">
                        <p>Sign Up with Facebook</p>
                        <p id="modal-or">or</p><hr />
						<form method="POST" action="register.php" class="form-horizontal tpad" role="form">
							<div class="form-group">
								<label for="firstname" class="col-lg-5">First Name: </label><br>
								<div class="col-lg-12">
									<input type="text" name="firstname" class="form-control" placeholder="First Name.." />
								</div>
							</div>
							<div class="form-group">
								<label for="lastname" class="col-lg-5">Last Name: </label><br />
								<div class="col-lg-12">
									<input type="text" name="surname" class="form-control" placeholder="Last Name.." />
								</div>
							</div>
							<div class="form-group">
								<label for="email" class="col-lg-5">Email: </label><br />
								<div class="col-lg-12">
									<input type="email" name="email" class="form-control" placeholder="Email..">
								</div>
							</div>
							<div class="form-group">
								<label for="phone" class="col-lg-5">Phone Number: </label><br />
									<div class="col-sm-12">
										<input type="text" name="phone" class="form-control" />
									</div>
							</div>
							<div class="form-group">
								<label for="password" class="col-lg-5">Password: </label><br />
								<div class="col-lg-12">
									<input type="password" name="password" class="form-control" placeholder="Password.." />
								</div>
							</div>
							<div class="form-group">
								<label for="password_again" class="col-lg-5">Repeat Password: </label><br />
								<div class="col-lg-12">
									<input type="password" name="password_again" class="form-control" placeholder="Repeat Password.." />
								</div>
							</div>
							<div class="form-group">
								<div class="col-lg-2">
									<input type="checkbox" class="form-control" />
								</div>
								<label for="checkbox" class="col-lg-11 control-label">I have read and accepted the <a href="#">Terms and Condition</a>and <a href="#">Privacy Povlicy</label>
							</div>
							<input type="submit" value="Sign Up" />
						</form>
                    </div>
                    <div class="modal-footer">
                        <a href="index.php" class="btn btn-default btn-lg">OK</a>
                    </div>
                </div>
            </div>
    </div>

<!-- End Navigation -->

<div id="myCarousel" class="carousel slide" data-interval="2500"> 
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
	
    <div class="carousel-inner">
        <div class="item active" id="item">
            <img src="images/slide1.jpg">
            <div class="container active">
                <div class="carousel-caption">
                    <h1>MOVE ME</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <p><a href="#" class="btn btn-primary btn-large">Sign up today</a></p>
                </div>
            </div>
        </div>
        <div class="item" id="item">
            <img src="images/slide2.jpg">
            <div class="container active">
                <div class="carousel-caption">
                    <h1>ALL TRANSPORT COVERED</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <p><a href="#" class="btn btn-primary btn-large">Sign up today</a></p>
                </div>
            </div>
        </div>
        <div class="item" id="item">
            <img src="images/slide3.jpg">
            <div class="container active">
                <div class="carousel-caption">
                    <h1>NEW - SAFETY MODE</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <p><a href="#" class="btn btn-primary btn-large">Sign up today</a></p>
                </div>
            </div>
        </div>
    </div>    
    <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
</div>    

<!--Carousel End -->

<div id="services" class="container padded">
    <div class="row">
        <div class="col-lg-12"><h2 id="services" align="center">Trending Services</h2><hr></div>
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

<div class="container padded">
	<img src=>
</div>





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



<!--Footer-->


<link rel="stylesheet" href="css/fotter/footer.css">
<link rel="stylesheet" href="css/fotter/new_bootstrap.min.css">
<link rel="stylesheet" href="css/fotter/new_bootstrap-theme.min.css">


 <div class="row footer-row1"> 

 <div class="col-md-2 col-md-offset-1">
	<h2>Fresh Wraap</h2><hr>
	<p>Fresh Wraap is an online Home Improvement aggregator, connecting homeowners with the best home repair professionals in their neighbourhood.</p>
    <ul class="social-network social-circle"></br>
		<p>Be our friends on</p>
		<li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
		<li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
		<li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
    </ul>
 </div>
 
 <div class="col-md-1 col-md-offset-1">
	<h4>About</h4>
	<ul class="ab">
	  <li><a href="#">About</a></li>
	  <li><a href="#">Services</a></li>
	  <li><a href="#">Help Center</a></li>
	  <li><a href="#">Feedback</a></li>
	</ul> 
 </div>
 
 <div class="col-md-2 col-md-offset-1">
		<h4>Contact</h4>
		<ul class="ab">
			<li><a href="#">Be A Professional</a></li>
			<li><a href="#">san@24.com</a></li>
			<li><a href="#">Care@mrright.in</a></li>
		</ul>
 </div>
 
 
 <div class="col-md-3">
	<h4>Ideas by Mr Right</h4>
		<ul class="ab ">
			<li><a href="#">Types of watr heater or geyser available <br>in market</a></li></br>
			<p>Oct 08 2015.</p><hr><li><a href="#">How to choose the right geyser or water heater for your home?</a></li></br><p>Oct 07 2015.</p><hr> <li><a href="#">visit our blog ! </a></li>
		</ul>
 </div>
    
<div class="col-md-1">
 
</div>
</div><!--End row-->

 
 <div class="ftr">
	<div class="row">
		<footer>
			<div class="pull-left ft_space text">
				<p> copy: 2015 Copyright.</p>
			</div>
			<div class="pull-right ft_space text">
				<p>All Rights Reserved
				Customer Support 18002003818</p>
			</div>
		</footer>
	</div>
 </div>

<!--Fotter ends-->


	<script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/self.js"></script>
	
	
  </body>
</html>