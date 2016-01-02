<!DOCTYPE HTML>
<html lang="en-US">
<head>
      <meta charset="UTF-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Admin Panel</title>
      <link rel="stylesheet" href="css/bootstrap.css" />
	  
	  
<!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/dashb.css">
    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	 
	 
	 </head>
<body>
 <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Fresh wrapp</a>
            </div>
           
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="index.php"><i class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></i> Home</a>
                    </li>
                    <li>
                        <a href="#"><i class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></i> Profile</a>
                    </li>
                    <li>
                        <a href="tables.html"><i class="pull-right hidden-xs showopacity glyphicon glyphicon-envelope"></i> Messages</a>
                    </li>
                    <li>
                        <a href="forms.html"><i class="pull-right hidden-xs showopacity glyphicon glyphicon-cog"></i> Settings</a>
                    </li>
                    <li>
                        <a href="bootstrap-elements.html"><i class="pull-right hidden-xs showopacity glyphicon glyphicon-align-left"></i> Charts</a>
                    </li>
                    <li>
                        <a href="bootstrap-grid.html"><i class="pull-right hidden-xs showopacity glyphicon glyphicon-camera"></i> Gallery</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Dropdown <i class="pull-right hidden-xs showopacity glyphicon glyphicon-collapse-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                        </ul>
                    </li>
                   
                    
                </ul>
            </div>
			 <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Admin Panel <small id="user-name"></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Sanjeev bhatt
                            </li>
                        </ol>
                    </div>
                </div>
				
				 <!-- /.row -->

                

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class=" hidden-xs showopacity glyphicon glyphicon-comment" style="font-size: 60px;"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">Product Name</div>
                                        
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left"></span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class=" hidden-xs showopacity glyphicon glyphicon-tasks" style="font-size: 60px;"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">Product ID</div>
                                        <div>Product ID!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left"></span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class=" hidden-xs showopacity glyphicon glyphicon-shopping-cart" style="font-size: 60px;"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">124</div>
                                        <div>New Orders!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class=" hidden-xs showopacity glyphicon glyphicon-thumbs-up" style="font-size: 60px;"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">13</div>
                                        <div>Best Deal!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
				
				    <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                            <!--create form-->
                        <form name="insert_form" method="post" action="insertprocess.php">


    <table>
    <tr>
    <th>
     Product ID: 
     </th>
      <th>
       Product Name:                    
    </th>
    </tr>
    
   
    <tr>
      <td><input name="product_ID" type="checkbox" ></td>
      <td><input name="product_Name" type="text"></td>
    </tr>
    <tr>
    <td>
      <button type="submit" class="btn btn-default">Add </button>
    </td>
    <td>
     <button type="button" class="btn btn-default">Delete </button>
    </td>
    <td>
     <button type="button" class="btn btn-default">Update    </button>
    </td>
    </tr>
    </table>
                        
                          
                              
                              
                                </form>
							
                            </div>
							</div></div>
                
<script type="text/javascript" src="js/jquery-1.11.1.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>









	  