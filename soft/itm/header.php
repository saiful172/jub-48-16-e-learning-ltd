  <?php 
  require_once 'session.php';
  error_reporting( ~E_NOTICE );
  require_once '../includes/conn.php';
  require_once '../includes/dbconfig.php';
  include('../scripts.php');
  include('modal.php'); 
  include('more-fals/access_point.php'); 
  ?> 
 	
<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
<title><?php include('../title.php'); ?></title>
<link rel="icon" type="image/x-icon" href="../includes/itm.png">
<script src="js/search.js"></script>
<link rel = "stylesheet" type = "text/css" href = "css/chosen.css" />
<style>
.btn-w100{width:100%;}
.w100{width:100%;}
.breadcrumb>.active{color:black;}
.breadcrumb{background-color:#53a9f470;}

 .navbar-default :focus,
 .navbar:hover {box-shadow: 0 2px 15px 2px rgba(70, 117, 194), 0 3px 10px 0 rgba(70, 117, 194)!important;} 
 .navbar{box-shadow: 0px 2px 12px 2px rgba(70, 117, 194); border-radius: 5px; margin-top:5px;}
  nav a{font-size:16px;font-weight:bold;} a{font-size:14px; font-weight:bold;} .breadcrumb{text-align:center;} 
  
.table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th 
  {
  padding: 6px;
  font-size:14px;
 /* vertical-align:0; */
  line-height: 1.42857143;
  }
   
  .table .btn {padding:4px 7px;font-size:13px;}  
   
 
 </style>
</head>
<body>
<div class="container" style="width:100%;">
	<nav class="navbar navbar-default navbar-static-top">
		
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
	  <a class="navbar-brand" href="/itm"><b><i class="fa fa-desktop text-primary"></i>  <?php include('../includes/header_title.php'); ?> </b></a> 
      <!-- <a class="navbar-brand" href="#">Brand</a> -->
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">      

      <ul class="nav navbar-nav navbar-right">        
 
      <li id="navDashboard"><a href="/itm"><i class="glyphicon glyphicon-home"></i></a></li>        
      
	   <li class="dropdown" id="NavUser" style="display:<?php echo $Marketing; ?>;">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-signal"></i> Marketing <span class="caret"></span></a>
          <ul class="dropdown-menu">
		  <li id="navProduct"> <a href="leads"> <i class="glyphicon glyphicon-user"></i> Leads </a></li>
		  <li id="navProduct"> <a href="follow"> <i class="glyphicon glyphicon-share-alt"></i> <i class="glyphicon glyphicon-user"></i> Follow Up </a></li>
		  </ul>
        </li> 
			
	  <li class="dropdown" id="navOrder1">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-list"></i> Product <span class="caret"></span></a>
        <ul class="dropdown-menu">            
        
  <li id="navProduct"> <a href="brand"> <i class="glyphicon glyphicon-triangle-right"></i> Brands </a></li> 
  <li id="navCategories"><a href="category"> <i class="glyphicon glyphicon-triangle-right"></i> Categories</a></li> 
  <li id="navProduct"> <a href="sub-category"> <i class="glyphicon glyphicon-triangle-right"></i> Sub  Categories</a></li> 
         
  <li id="navProduct"> <a href="products-add"> <i class="glyphicon glyphicon-plus"></i> Add New Product </a></li> 
   <li id="navProduct"> <a href="productN"> <i class="glyphicon glyphicon-list"></i> Product List / Stock </a></li> 
  
  <!--
  <li id="topNavUser"><a href="product_return.php"> <i class="glyphicon glyphicon-share-alt"></i> Product Damage </a></li> 
  <li id="topNavUser"><a href="product_return.php"> <i class="glyphicon glyphicon-share-alt"></i> Product Return ( Store ) </a></li> 
  <li id="topNavUser"><a href="product-return-sup.php"> <i class="glyphicon glyphicon-share-alt"></i> Product Return ( Supplier ) </a></li> 
  <li id="topNavUser"><a href="sales_return.php"> <i class="glyphicon glyphicon-share-alt"></i> Sales Return </a></li>
  <li id="topNavUser"><a href="product_transfer.php"> <i class="glyphicon glyphicon-sort"></i> Transfer </a></li>      
  <li id="topNavUser"><a href="product_received.php"> <i class="glyphicon glyphicon-sort"></i> Received </a></li>   
  <li id="topNavAddOrder1"><a href="product_hstory.php"> <i class="glyphicon glyphicon-header"></i> History </a></li>     
  -->     
	
	</ul></li> 
	        
			
		<li class="dropdown" id="navOrder1">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-user"></i> Supplier <span class="caret"></span></a>
        <ul class="dropdown-menu"> 
             <li id="topNavUser"><a href="supplier"> <i class="glyphicon glyphicon-user"></i> Supplier List </a></li>      
		     <li id="topNavAddOrder1"><a href="supplier-dues"> <i class="glyphicon glyphicon-pencil"></i> Supplier Dues </a></li>
 				
            <li id="topNavAddOrder1"><a href="order-supplier?o=add"> <i class="glyphicon glyphicon-plus"></i> New Product Buy</a></li> 
            <li id="topNavManageOrder1"><a href="order-supplier?o=manord"> <i class="glyphicon glyphicon-file"></i> View Buying Product </a></li>   
            <li id="topNavAddOrder1"><a href="order-supplier-damage?o=add"> <i class="glyphicon glyphicon-plus"></i> Damage Product Listed</a></li>      
            <li id="topNavAddOrder1"><a href="buy-report-by-date-short"> <i class="glyphicon glyphicon-list-alt"></i> Report</a></li>      
		 
        </ul></li>
		
		<li class="dropdown" id="navOrder1">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-duplicate"></i> Quotation <span class="caret"></span></a>
        <ul class="dropdown-menu">            
		     
            <li id="topNavAddOrder1"><a href="orders-quot?o=add"> <i class="glyphicon glyphicon-plus"></i> New Quotation</a></li>    
            <li id="topNavManageOrder1"><a href="orders-quot?o=manord"> <i class="glyphicon glyphicon-eye-open"></i> View Quotation </a></li>            
       </ul></li>
		
	   
        <li class="dropdown" id="navOrder1">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-user"></i> Clients <span class="caret"></span></a>
        <ul class="dropdown-menu">  
        <li id="topNavUser"><a href="customer"> <i class="glyphicon glyphicon-user"></i> Clients List</a></li>      
		<li id="topNavAddOrder1"><a href="dues"> <i class="glyphicon glyphicon-pencil"></i> Clients Dues </a></li>
 		<li id="topNavAddOrder1"><a href="orders-retail?o=add"> <i class="glyphicon glyphicon-plus"></i> New Sales - Retail</a></li>    
 		<li id="topNavManageOrder1"><a href="orders-retail?o=manord"> <i class="glyphicon glyphicon-file"></i> View Sales - Retail</a></li>
		<li id="topNavAddOrder1"><a href="orders?o=add"> <i class="glyphicon glyphicon-plus"></i> New Sales - Wholesale</a></li>    
        <li id="topNavManageOrder1"><a href="orders?o=manord"> <i class="glyphicon glyphicon-file"></i> View Sales - Wholesale</a></li>            
		<li id="topNavAddOrder1"><a href="sales-report-by-date-short"> <i class="glyphicon glyphicon-list-alt"></i> Report</a></li> 
        </ul></li>
		
		 
  
    <li class="dropdown" id="NavUser">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-edit"></i> Expense<span class="caret"></span></a>
          <ul class="dropdown-menu">            
		    <li id="navBrand"><a href="Expense"><i class="glyphicon glyphicon-edit"></i> Office Expense </a></li>
            <li id="navBrand"><a href="Other-Expense"><i class="glyphicon glyphicon-edit"></i> Other Expense  </a></li>
		</ul>
        </li>
		
		<li class="dropdown" id="NavUser" style="display:<?php echo $Prjct; ?>;">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-th-list"></i> Project<span class="caret"></span></a>
          <ul class="dropdown-menu">            
		    <li id="navBrand"><a href="project-name"><i class="glyphicon glyphicon-th-list"></i> Project Name </a></li>
            <li id="navBrand"><a href="Project-Expense"><i class="glyphicon glyphicon-th-list"></i> <i class="glyphicon glyphicon-minus-sign"></i> Project Expense  </a></li>
            <li id="navBrand"><a href="Project-Income"><i class="glyphicon glyphicon-th-list"></i> <i class="glyphicon glyphicon-plus-sign"></i> Project Income  </a></li>
		</ul>
        </li>
		
		<li class="dropdown" id="NavUser" style="display:<?php echo $Bnk; ?>;">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-university"></i> Banking<span class="caret"></span></a>
          <ul class="dropdown-menu">     
            <li id="topNavUser"><a href="bank-name"> <i class="fa fa-university"></i> Bank Name</a></li>    	
            <li id="topNavUser"><a href="bank-money"> <i class="glyphicon glyphicon-user"></i> Bank Accounts  </a></li>    	
          </ul>
        </li>
		
		<li class="dropdown" id="NavUser" style="display:<?php echo $HrAcc; ?>;">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-th"></i> HR/ACC <span class="caret"></span></a>
          <ul class="dropdown-menu"> 
            <li id="topNavAddOrder1"><a href="employee"> <i class="glyphicon glyphicon-user"></i> Employees</a></li>
		    <li id="topNavUser"><a href="employee-salary"> <i class="glyphicon glyphicon-hdd"></i> Salary</a></li>      
		    <li id="topNavUser"style="display:<?php echo $AdvSal; ?>;"> <a href="adv-salary"> <i class="glyphicon glyphicon-share"> </i>  Advanced Salary</a></li>      
			</ul>
        </li> 
		
    <li class="dropdown" id="NavUser">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-th"></i> More<span class="caret"></span></a>
          <ul class="dropdown-menu">            
		   <li id="navReport"><a href="All-Reports"> <i class="glyphicon glyphicon-list-alt"></i> Reports </a></li> 		
   	       <li id="navProduct"> <a href="daily-cash-report"> <i class="glyphicon glyphicon-list-alt"></i> Daily Cash Report </a></li>
   	       <li id="navProduct"> <a href="notes"> <i class="glyphicon glyphicon-tags"></i> Daily Task / Notes </a></li> 
		   <li id="navReport"><a href="inv-comments"> <i class="glyphicon glyphicon-comment"></i> Invoice Comments </a></li>
		    <li id="navReport" style="display:<?php echo $InvCol; ?>;"> <a href="color-inv"> <i class="fa fa-file"></i> Invoice Colors </a></li>
		   <li id="navReport"><a href="payment-type"> <i class="glyphicon glyphicon-hand-right"></i> Payment Type </a></li>
		   <li id="navReport"><a href="payment-status"> <i class="glyphicon glyphicon-hand-right"></i> Payment Status </a></li>
		   <li id="navReport" style="display:<?php echo $Curier; ?>;"><a href="courier"> <i class="glyphicon glyphicon-send"></i> Courier Service</a></li>
		<!--
		<li id="navReport"><a href="company-msg"> <i class="glyphicon glyphicon-comment"></i> Message </a></li> 
		-->
        </ul>
        </li> 
		
		<li class="dropdown" id="NavUser">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-th-large"></i> Other <span class="caret"></span></a>
          <ul class="dropdown-menu">            
		 
		 <li id="navProduct"> <a href="leads"> <i class="glyphicon glyphicon-user"></i> Marketing </a></li>  
		 <li id="topNavAddOrder1"><a href="employee"> <i class="glyphicon glyphicon-user"></i> HR / ACC</a></li>   
		 <li id="topNavUser"> <a href="adv-salary"> <i class="glyphicon glyphicon-edit"> </i>  Advanced Salary</a></li>
         <li id="topNavUser"><a href="bank-name"> <i class="fa fa-university"></i> Banking</a></li> 		 
		   
        <li id="navBrand"><a href="project-name"><i class="glyphicon glyphicon-th-list"></i> Project </a></li>
		<li id="topNavUser" > <a href="service-charge"> <i class="glyphicon glyphicon-check"></i> Service Charge </a></li>      
 
          </ul>
        </li> 
  
  
       <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <img src="../<?php if ($srow['photo']==""){echo "img/profile.jpg"; } else {echo $srow['photo'];} ?>" width="18px" height="18px"> <?php echo $user; ?>  <i class="fa fa-caret-down text-primary"></i>
                    </a> 
                    <ul class="dropdown-menu dropdown-user">
					    <li id="navReport"><a href="my-info"> <i class="glyphicon glyphicon-cog text-primary"></i> Profile Setting </a></li>
		                <li><a href="#logout"   data-toggle="modal"><i class="fa fa-sign-out fa-fw text-danger"></i>Log Out</a></li>
                    </ul>
                    <!-- /.dropdown-user -->
       </li> &nbsp; &nbsp;

	 
               
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
	</nav>
	</div>

<div class="container" style="width:100%;">