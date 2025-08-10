
  <?php 
  require_once 'session.php';
  error_reporting( ~E_NOTICE );
  require_once '../includes/conn.php';
  require_once '../includes/dbconfig.php';
  include('../scripts.php');
  include('modal.php'); 
  ?> 
	
<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
<title><?php include('../title.php'); ?></title>
<script src="js/search.js"></script>
<style>
.navbar{box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.1), 0 3px 10px 0 rgba(0, 0, 0, 0.10); background-color:white;border-radius: 5px;}
 nav a{font-size:18px;font-weight:bold;} a{font-size:16px; font-weight:bold;} .breadcrumb{text-align:center;} 
   
   .btn-w100{width:100%;}
   .breadcrumb>.active{color:black;}
   .breadcrumb{background-color:#53a9f470;}
   
  .table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th 
  { padding: 6px;
  font-size:14px;
  vertical-align:0;
  line-height: 1.42857143;
  }
  .table .btn {padding:4px 7px;font-size:13px;}
  .col-md-10{padding-right:0px;padding-left:0px;}
  
 </style>
</head>
<body>
<div class="container" style="width:100%;">
	<nav class="navbar navbar-default navbar-static-top">
		
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header ">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
	  <a class="navbar-brand" href="index"><b>  <i class="fa fa-desktop"></i>  <?php include('../includes/header_title.php'); ?> </b></a> 
      <!-- <a class="navbar-brand" href="#">Brand</a> -->
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">      

      <ul class="nav navbar-nav navbar-right">        

      	<li id="navDashboard"><a href="index"><i class="glyphicon glyphicon-home"></i></a></li>        
        
		<li class="dropdown" id="NavUser">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-tv"></i> Courses <span class="caret"></span></a>
          <ul class="dropdown-menu">            
		    <li id="navProduct"> <a href="products"> <i class="glyphicon glyphicon-list"></i> Course List </a></li>
		    <li id="navProduct"> <a href="crse-topic"> <i class="glyphicon glyphicon-book"></i> Course Topic </a></li>
		</ul>
        </li> 
		
		
	


		<li class="dropdown" id="NavUser">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-user"></i> Students <span class="caret"></span></a>
          <ul class="dropdown-menu">            
		    <li id="navBrand"><a href="students"><i class="glyphicon glyphicon-list-alt"></i> Students Info </a></li>
            <li id="navBrand"><a href="batch-no"><i class="glyphicon glyphicon-tag"></i> Batch   </a></li>
           
            <li id="navBrand"><a href="degree"><i class="glyphicon glyphicon-education"></i> Degree   </a></li>
            <li id="navBrand"><a href="board"><i class="glyphicon glyphicon-bold"></i> Board   </a></li>
            <li id="navBrand"><a href="month"><i class="glyphicon glyphicon-bold"></i> Month   </a></li>
            <li id="navBrand"><a href="year"><i class="glyphicon glyphicon-yen"></i> Year   </a></li>
            <li id="navBrand"><a href="bld-grp"><i class="glyphicon glyphicon-tint"></i> Blood Group   </a></li>
            <li id="navBrand"><a href="district"><i class="glyphicon glyphicon-map-marker"></i> District   </a></li>
            <li id="navBrand"><a href="upazilla"><i class="glyphicon glyphicon-map-marker"></i> Upazilla   </a></li>
		</ul>
        </li> 
		
		<li class="dropdown" id="NavUser">
         <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-globe"></i> Website <span class="caret"></span></a>
         <ul class="dropdown-menu">            
        <li id="topNavUser"><a href="about-section"> <i class="glyphicon glyphicon-list"></i> About </a></li>     
        <li id="topNavUser"><a href="team-section"> <i class="glyphicon glyphicon-user"></i> Team </a></li>     
        <li id="topNavUser"><a href="slider-section"> <i class="glyphicon glyphicon-picture"></i> Slider </a></li>     
        <li id="topNavUser"><a href="gallery"> <i class="glyphicon glyphicon-picture"></i> Gallery</a></li>     
        <li id="topNavUser"><a href="news_section.php"> <i class="glyphicon glyphicon-picture"></i> News / Notice</a></li>     
        <li id="topNavUser"><a href="contact"> <i class="glyphicon glyphicon-phone"></i> Contact</a></li>     
        <li id="topNavUser"><a href="social"> <i class="fa fa-facebook"></i><i class="fa fa-youtube"></i> Social Media</a></li>     
       </ul>
       </li>



		
		 		
         <li class="dropdown" id="navOrder1">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-duplicate"></i> Invoice <span class="caret"></span></a>
        <ul class="dropdown-menu">            
		     
            <li id="topNavAddOrder1"><a href="orders?o=add"> <i class="glyphicon glyphicon-plus"></i> New Invoice</a></li>    
            <li id="topNavManageOrder1"><a href="orders?o=manord"> <i class="glyphicon glyphicon-eye-open"></i> View Invoice </a></li>            
           <!--   <li id="topNavAddOrder1"><a href="orders_paid.php?o=add"> <i class="glyphicon glyphicon-plus"></i> Add Orders (Paid) </a></li>       
            <li id="topNavAddOrder1"><a href="orders_retail.php?o=add"> <i class="glyphicon glyphicon-plus"></i> New Invoice ( One Time / Cash ) </a></li>   
			-->
        </ul></li>
        
  <li id="topNavAddOrder1"><a href="payment"> <i class="glyphicon glyphicon-pencil"></i> Payments </a></li>
  
     <li class="dropdown" id="NavUser">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-ruble"></i> Expenses <span class="caret"></span></a>
          <ul class="dropdown-menu">            
		    <li id="navBrand"><a href="expense"><i class="glyphicon glyphicon-ruble"></i> Office Expense </a></li>
            <li id="navBrand"><a href="other-expense"><i class="glyphicon glyphicon-ruble"></i> Other Expense  </a></li>
		</ul>
        </li> 
		
  <li id="navReport"><a href="sales-report"> <i class="glyphicon glyphicon-list-alt"></i> Reports </a></li> 		
   	
       <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <img src="../<?php if ($srow['photo']==""){echo "img/profile.jpg"; } else {echo $srow['photo'];} ?>" width="18px" height="18px"> <?php echo $user; ?>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
					    <li id="navReport"><a href="company-msg"> <i class="glyphicon glyphicon-comment"></i> Message </a></li>
					    <li id="navReport"><a href="stuff"> <i class="glyphicon glyphicon-cog"></i> Setting </a></li>
                        <li><a href="#logout" data-toggle="modal"><i class="fa fa-sign-out fa-fw"></i>Log Out</a></li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>    
               
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
	</nav>
	</div>

<div class="container" style="width:100%;">