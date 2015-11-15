<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Find a route using Geolocation and Google Maps API</title>
	<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script src="js/script.js"></script>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/map.css" rel="stylesheet">
</head>

<body>
	<div class="container padded">
		<div class="row">
			<div class="col-sm-8">
				<h2>Track your order
				<span id="caption">(Calculate your route)</span></h2><hr>
				<form id="calculate-route" method="POST" action="#" class="form-horizontal tpad" name="calculate-route" role="form">
					<div class="form-group">
						<div class="row">
							<label for="from" class="col-sm-2 control-label">Address:</label>					
							<div class="col-sm-7">
								<input type="text" id="from" class="form-control" name="from" placeholder="An address"/>
							</div>
							<div class="col-sm-3">
								<a id="from-link" href="#">Get my position</a>
							</div>
						</div>
					</div>
					<div class="form-group tpad">
						<div class="row">
							<label for="to" class="col-sm-2 control-label">To:</label>
							<div class="col-sm-7">
								<input type="text" id="to" class="form-control" name="to" placeholder="Another address"/>
							</div>
							<div class="col-sm-3"></div>
						</div>
					</div>
					<div class="form-group tpad">
						<div class="col-lg-offset-2 col-lg-10">
							<input type="submit" class="btn btn-primary btn-md" />
							<input type="reset" class="btn btn-primary btn-md" />
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div id="map"></div>
	<p id="error"></p>
	<script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>