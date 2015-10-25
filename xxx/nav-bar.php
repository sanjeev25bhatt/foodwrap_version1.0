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
            <li><a href="index.php">Home</a></li>
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
			<li class="hidden" id="hide-it"><form action=""><a href="" data-toggle="modal" class="btn btn-danger navbar-btn to-signup">Sign Up</a></form></li>
			<li class="hidden" id="hide-it-login"><a href="" data-toggle="modal" class="to-login">Log in</a></li>
			<li id="show-it"><a href="#"id="my-reg"></a></li>
			<li class="hidden" id="show-it-logout"><form action=""><a href="logout.php" class="btn btn-danger navbar-btn">Log out</a></form></li>
		</ul>
    </div>
</nav>

	
	<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        
			<div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 class="modal-title">Log In</h3>
                    </div>
                    <div class="modal-body">
                    <div class="row"><div class="container"><div class="col-lg-12"><input type="image" class="img-responsive fbl-img" src="images/facebook-login.jpg" /></div></div></div>
                        <hr /><p id="modal-or">or</p><hr />
						<form method="" action="" class="form-horizontal tpad" role="form">
							<div class="form-group">
								<label for="email" class="col-lg-5">Email: </label><br />
								<div class="col-lg-12">
									<input type="email" name="email" class="form-control" id="email-log" placeholder="Email..">
								</div>
							</div>
							<div class="form-group">
								<label for="password" class="col-lg-5">Password: </label><br />
								<div class="col-lg-12">
									<input type="password" name="password" class="form-control" id="pass-log" placeholder="Password.." />
								</div>
							</div>
							
							<a data-toggle="modal" class="btn btn-large btn-primary" id="old-reg">Log In</a>
						</form>
						<div class="row">
							<div class="container padded">
								<div class="col-md-5 col-md-offset-1"><strong>Not yet registered? Kindly proceed!</strong><a data-toggle="modal" class="btn btn-primary" id="to-signup-modal">Sign Up</a></div>
							</div>
						</div>
					
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
                        <div class="row"><div class="container"><div class="col-lg-12"><input type="image" class="img-responsive fbs-img" src="images/facebook-signup.jpg" /></div></div></div>
                        <hr /><p id="modal-or">or</p><hr />
						<div class="row">
						<form method="" action="" class="form-horizontal tpad" role="form">
							<div class="col-sm-6">
							<div class="form-group">
								<label for="firstname" class="col-lg-12">First Name: </label><br>
								<div class="col-lg-12">
									<input type="text" name="firstname" class="form-control" id="firstname" />
								</div>
							</div>
							
							<div class="form-group">
								<label for="email" class="col-lg-12">Email: </label><br />
								<div class="col-lg-12">
									<input type="email" name="email" class="form-control" id="email" placeholder="Email..">
								</div>
							</div>
							<div class="form-group">
								<label for="password" class="col-lg-12">Password: </label><br />
								<div class="col-lg-12">
									<input type="password" name="password" class="form-control" id="password" placeholder="Password.." />
								</div>
							</div>
							</div>
							<div class="col-sm-6">
							<div class="form-group">
								<label for="lastname" class="col-lg-12">Last Name: </label><br />
								<div class="col-lg-12">
									<input type="text" name="surname" class="form-control" id="surname" placeholder="Last Name.." />
								</div>
							</div>
							<div class="form-group">
								<label for="phone" class="col-lg-12">Phone Number: </label><br />
									<div class="col-sm-12">
										<input type="text" name="phone" class="form-control" id="phone" />
									</div>
							</div>
							<div class="form-group">
								<label for="password_again" class="col-lg-12">Repeat Password: </label><br />
								<div class="col-lg-12">
									<input type="password" name="password_again" class="form-control" id="password_again" placeholder="Repeat Password.." />
								</div>
							</div></div>
							<div class="form-group">
								<div class="row"><div class="col-lg-2">
									<input id="checkbox" type="checkbox" class="pull-right form-control" /></div>
									<div class="col-lg-10 pull-left"><h5>I have read and accepted the <a href="#">Terms and Condition</a>and <a href="#">Privacy Povlicy</a></h5></div>
								</div>
							</div>
							
							<a data-toggle="modal" class="btn btn-large btn-primary" id="new-reg">Sign Up</a>
						</form></div>
						<div class="row">
							<div class="container padded">
								<div class="col-md-6 col-md-offset-3"><strong>Already a user? Kindly proceed!</strong><a data-toggle="modal" class="btn btn-primary" id="to-login-modal">Log In</a></div>
							</div>
						</div>
					</div>
                    
                </div>
            </div>
    </div>
	
		<div class="modal fade" id="my_query_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 class="modal-title">Notice.</h3>
                    </div>
                    <div class="modal-body">
                        <p id="query_modal"></p>
                    </div>
					 <div class="modal-footer">
                        <a href="#" id="bhaagjaa" class="btn btn-default btn-lg">OK</a>
                    </div>
                
                </div>
            </div>
        
        </div>