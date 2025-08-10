
  <?php require_once 'session.php'; ?>
  

	<?php include('../scripts.php'); ?>

<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
<title><?php include('../includes/title_bar.php'); ?></title>
	
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
	   <a class="navbar-brand" href="index.php">  <?php include('../includes/header_title.php'); ?> </a>
      <!-- <a class="navbar-brand" href="#">Brand</a> -->
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">      

      <ul class="nav navbar-nav navbar-right">        

      	<li id="navDashboard"><a href="index.php"><i class="glyphicon glyphicon-home"></i> Home</a></li> 
      	<li id="navDashboard"><a href="expense.php"><i class="glyphicon glyphicon-pencil"></i> Expense</a></li> 
		
				<li class="dropdown" id="NavUser">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-user"></i> Supplier <span class="caret"></span></a>
          <ul class="dropdown-menu">            
            <li id="topNavUser"><a href="supplier.php"> <i class="glyphicon glyphicon-user"></i> Supplier </a></li>      
            <li id="topNavUser"><a href="product_buy.php"> <i class="glyphicon glyphicon-ruble"></i> Product Buy </a></li>     
            
          </ul>
        </li>
		
		<li id="topNavUser"><a href="customer.php"> <i class="glyphicon glyphicon-user"></i> Customer</a></li>
		<li id="topNavUser"><a href="title_name.php"> <i class="glyphicon glyphicon-user"></i> Name</a></li>
        <li id="topNavAddOrder1"><a href="dues.php"> <i class="glyphicon glyphicon-pencil"></i> Dues </a></li>		
		

		
         <li class="dropdown" id="NavUser">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-user"></i> Users <span class="caret"></span></a>
          <ul class="dropdown-menu">            
            
            <li id="topNavUser"><a href="stuff.php"> <i class="glyphicon glyphicon-user"></i> Staff ( Active )</a></li>            
            <li id="topNavUser"><a href="stuff_inactive.php"> <i class="glyphicon glyphicon-user"></i>  Staff (  In-Active  ) </a></li>            
			     
          </ul>
        </li> 	

       <li class="dropdown" id="NavUser">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-user"></i> Employee <span class="caret"></span></a>
          <ul class="dropdown-menu">            
            <li id="topNavUser"><a href="employee.php"> <i class="glyphicon glyphicon-user"></i> Active </a></li>          
            <li id="topNavUser"><a href="employee_inactive.php"> <i class="glyphicon glyphicon-user"></i> In-Active</a></li>            
            <li id="topNavUser"><a href="employee _all.php"> <i class="glyphicon glyphicon-user"></i> All Employee</a></li> 
			     
          </ul>
        </li> 
		
		<li class="dropdown" id="NavUser">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-ruble"></i> Product / Stock <span class="caret"></span></a>
          <ul class="dropdown-menu">            
            <li id="navBrand"><a href="brand.php"><i class="glyphicon glyphicon-btc"></i>  Brand</a></li>
        <li id="navCategories"><a href="categories.php"> <i class="glyphicon glyphicon-th-list"></i> Categories</a></li> 
        <li id="navProduct"><a href="product.php"> <i class="glyphicon glyphicon-ruble"></i> Product / Stock </a></li> 
        <li id="navProduct"><a href="productN.php"> <i class="glyphicon glyphicon-ruble"></i> Product Code Edit </a></li> 
       
			     
          </ul>
        </li> 


  <li class="dropdown" id="navOrder1">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-shopping-cart"></i> Invoice <span class="caret"></span></a>
        <ul class="dropdown-menu">            
         <!--   <li id="topNavAddOrder1"><a href="orders_paid.php?o=add"> <i class="glyphicon glyphicon-plus"></i> Add Orders (Paid) </a></li> -->     
         <!--   <li id="topNavAddOrder1"><a href="orders.php?o=add"> <i class="glyphicon glyphicon-plus"></i> Add Orders </a></li>    -->       
            <li id="topNavManageOrder1"><a href="orders.php?o=manord"> <i class="glyphicon glyphicon-edit"></i> Manage Invoice</a></li>            
        </ul></li>
       
		 <li class="dropdown" id="navOrder1">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-file"></i>  Report <span class="caret"></span></a>
          <ul class="dropdown-menu">            
           <li id="navReport"><a href="sales_report.php"> <i class="glyphicon glyphicon-check"></i> Sales Report </a></li>
			     
          </ul>
        </li> 

		
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
<div class="container" style="width:100%;">