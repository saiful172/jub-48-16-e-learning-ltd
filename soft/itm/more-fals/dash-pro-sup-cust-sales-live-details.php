 <div class="col-lg-12">
          <div class="row">		
			  <div class="col-xxl-3 col-md-6">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Product <span>| Stock</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <a href="product-list"><i class="bi bi-list"></i>  </a>
                    </div>
                    <div class="ps-3">
                      <h6>
					  <?php 
$sql = $con->query("SELECT count(`product_id`) as `gtotal` FROM product where user_id='".$_SESSION['id']."' ");
$row = $sql->fetch_assoc();
echo $row['gtotal'];
?>  / 

<?php 
$sql = $con->query("SELECT sum(`quantity`) as `gtotal` FROM product where user_id='".$_SESSION['id']."' ");
$row = $sql->fetch_assoc();
echo $row['gtotal'];
?>
					  </h6>
                      <span class="text-primary small pt-1 fw-bold">
					  
 <?php 
$sql = $con->query("select sum(buy_rate) as TotalBuy from product where user_id='".$_SESSION['id']."' ");
$row = $sql->fetch_assoc(); 
echo $row['TotalBuy'];
?>  / - Taka


					   
					  
					  

                    </div>
                  </div>
                </div>

              </div>
            </div>
			
	           <div class="col-xxl-3 col-md-6">

              <div class="card info-card customers-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title"><a href="supplier-list">Supplier</a> <span> | <a href="only-dues-supplier">Dues</a></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <a href="dues-paid-supplier"><i class="bi bi-people"></i></a>
                    </div>
                    <div class="ps-3">
                      <h6>
					  <?php 
$sql = $con->query("SELECT count(`sup_id`) as `TotalSup` FROM `supplier` WHERE user_id='".$_SESSION['id']."' ");
$row = $sql->fetch_assoc();
echo $row['TotalSup'];
?> / 

 <?php 
$sql = $con->query("SELECT count(`sup_id`) as `TotalSupDue` FROM `sup_orders_dues` WHERE  recent_due !=0 and  user_id='".$_SESSION['id']."' ");
$row = $sql->fetch_assoc();
echo $row['TotalSupDue'];
?>
					  </h6>
                      <span class="text-danger small pt-1 fw-bold">					  
					 <?php 
$sql = $con->query("SELECT sum(`recent_due`) as `TotalDue` FROM `sup_orders_dues` WHERE user_id='".$_SESSION['id']."' ");
$row = $sql->fetch_assoc();
echo $row['TotalDue'];
?>
					  </span> <span class="text-muted small pt-2 ps-1">Taka</span>

                    </div>
                  </div>

                </div>
              </div>
            </div> 	
			
            <div class="col-xxl-3 col-md-6">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title"><a href="customer-list">Customer</a>  <span>| <a href="customer-only-dues">Dues</a> </span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <a href="customer-dues-paid"> <i class="bi bi-person-check"></i></a> 
                    </div>
                    <div class="ps-3">
                      <h6>
<?php 
$sql = $con->query("SELECT count(`customer_id`) as `gtotal` FROM `customer` WHERE member_id='".$_SESSION['id']."' and status=1 ");
$row = $sql->fetch_assoc();
echo $row['gtotal'];
?> / 

<?php 
$sql = $con->query("SELECT count(`customer_id`) as `CustTotalDue` FROM `orders_dues` WHERE recent_due !=0 and user_id='".$_SESSION['id']."' ");
$row = $sql->fetch_assoc();
echo $row['CustTotalDue'];
?>

					  </h6>
                      <span class="text-success small pt-1 fw-bold"> 
					  <?php 
$sql = $con->query("SELECT sum(`recent_due`) as `TotalDue` FROM `orders_dues` WHERE user_id='".$_SESSION['id']."' ");
$row = $sql->fetch_assoc();
echo $row['TotalDue'];
?>
					  </span> <span class="text-muted small pt-2 ps-1">Taka</span>

                    </div>
                  </div>
                </div>

              </div>
            </div> 

           
            <div class="col-xxl-3 col-md-6">
              <div class="card info-card revenue-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title"><a href="orders-retail?o=add">Sales </a> <span> | <a href="orders-retail?o=manord">Invoice </a></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <a href="orders-retail?o=add"> <i class="bi bi-list-check"></i></a>
                    </div>
                    <div class="ps-3">
                      <h6>
<?php 
$sql = $con->query("SELECT count(`order_id`) as `gtotal` FROM `orders` WHERE user_id='".$_SESSION['id']."' ");
$row = $sql->fetch_assoc();
echo $row['gtotal'];
?>
					  </h6>
                      <span class="text-success small pt-1 fw-bold"> 
					   <?php 
$sql = $con->query("SELECT count(`order_id`) as `TodayInv` FROM `orders` WHERE order_date='$date' and  user_id='".$_SESSION['id']."' ");
$row = $sql->fetch_assoc();
echo $row['TodayInv'];
?>  / 

  <?php 
$sql = $con->query("SELECT sum(`today_total`) as `TotalSale` FROM `orders` WHERE order_date='$date' and  user_id='".$_SESSION['id']."' ");
$row = $sql->fetch_assoc();
echo $row['TotalSale'];
?>


					  </span> <span class="text-muted small pt-2 ps-1">Today</span>

                    </div>
                  </div>
                </div>

              </div>
            </div> 
</div>
</div> 
