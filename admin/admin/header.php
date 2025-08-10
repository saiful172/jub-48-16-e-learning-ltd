
    <?php require_once 'session.php'; ?>
    <?php 
	
	require_once 'session.php';
	require_once 'includes/conn.php';
	require_once 'includes/dbconfig.php'; 

	?>

	<?php include('../scripts.php'); ?>
	<?php include('modal.php'); ?>
	
<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
<title>E-Learning</title>

<style type="text/css"> nav a{font-size:16px;font-weight:bold;} a{font-size:14px;font-weight:bold;} </style>	

</head>
<body>
<div class="container">
	<nav class="navbar navbar-default navbar-static-top">
		
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
	  <a class="navbar-brand" href="index.php">E-Learning </a> 
      <!-- <a class="navbar-brand" href="#">Brand</a> -->
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">      

      <ul class="nav navbar-nav navbar-right">        

      <li id="navDashboard"><a href="index.php"><i class="glyphicon glyphicon-home"></i>  </a></li>      
	    
        
      <li id="topNavUser"><a href="file.php"> <i class="glyphicon glyphicon-file"></i> Applications</a></li>  
      
      <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<span class="glyphicon glyphicon-lock"></span> <?php echo $user; ?>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
						<li><a href="#account" data-toggle="modal"><span class="glyphicon glyphicon-lock"></span>  My Account</a></li>
						<li class="divider"></li>  
                        <li><a href="#logout" data-toggle="modal"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
                    </ul>
                    <!-- /.dropdown-user -->
       </li> 
               
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
	</nav>
	</div>

 