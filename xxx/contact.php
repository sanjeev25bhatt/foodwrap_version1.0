<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fresh Wraap</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/self.css" rel="stylesheet">
	<link href="css/footer.css" rel="stylesheet">
	<style>
		.map{
			padding-bottom: 20px;
		}
		small > a{
			align: left;
		}
	</style> 
</head>
  
<body id="contact">

<!--Navigation bar-->
<?php
	include "nav-bar.php";
?>
<!--Navbar ends-->

<div class="map">
	<iframe width="100%" height="400px" frameborder="0" scrolling="no" marginheight="no" marginwidth="no" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3501.7602366648107!2d77.3707827798427!3d28.6369471999864!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce5535873a947%3A0xebbf22864f7d31c9!2s21%2C+Cassia+Rd%2C+Shipra+Suncity%2C+Indirapuram%2C+Ghaziabad%2C+Uttar+Pradesh+201014%2C+India!5e0!3m2!1sen!2s!4v1445271690373"></iframe><br />
</div>

<div class="container">
	<div class="row">
	<div class="col-lg-12">
	<small><a href="https://www.google.com/maps/place/21,+Cassia+Rd,+Shipra+Suncity,+Indirapuram,+Ghaziabad,+Uttar+Pradesh+201014,+India/@28.6369472,77.3707828,17z/data=!4m2!3m1!1s0x390ce5535873a947:0xebbf22864f7d31c9" target="_blank">View Larger map</a></small>
	</div>
	</div>
</div>

<div class="container padded">
    <div class="row">
        <div class="col-sm-8">
            <h2>Get in touch</h2>
            <hr>
            <p>Need a quote, enquiry about our team or have a suggestion for <strong>Fresh Wraap</strong>, we need to hear from you:</p>
            <form method="" action="" class="form-horizontal tpad" role="form">
                <div class="form-group">
                    <label for="email" class="col-lg-2 control-label">Email</label>
                    <div class="col-lg-10">
                        <input type="email" id="email-contact" class="form-control" name="email" placeholder="Email" />
                    </div>
                </div>
                <div class="form-group tpad">
                    <label for="message" class="col-lg-2 control-label">Message</label>
                    <div class="col-lg-10">
                        <textarea class="form-control" id="message" rows="6" name="message" placeholder="Message..."></textarea>
                    </div>
                </div>
                <div class="form-group tpad">
                    <div class="col-lg-offset-2 col-lg-10">
                        <a type="button" data-toggle="modal" id="my_modal" class="btn btn-default btn-lg">Send</a>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 class="modal-title">Thank you for submitting</h3>
                    </div>
                    <div class="modal-body">
                        <p id="user-submit">We appreciate you getting in touch. Please be patient, we will contact you shortly with a reply.<br />The Fresh Wraap Team</p>
                    </div>
                    <div class="modal-footer">
                        <a href="#" id="chumantar" class="btn btn-default btn-lg">OK</a>
                    </div>
                </div>
            </div>
        
        </div>
        <div class="col-sm-4">
        
        </div>
    </div>    
</div>

<!--Footer-->
<?php
	include "footer.php";
?>
<!--Footer ends-->


	<script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/self.js"></script>
	
</body>
</html>