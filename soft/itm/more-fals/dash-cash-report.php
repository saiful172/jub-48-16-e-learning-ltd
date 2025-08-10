<div class="col-12"> 
              <div class="card recent-sales overflow-auto">

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
                  <h5 class="card-title">Daily Cash Report<span> | <span class="text-danger"> <strong> Live Today</strong> </span>  </span></h5>

                <ol class="list-group list-group-flush">
                
				<li class="list-group-item d-flex justify-content-between align-items-start">
                  <div class="ms-2 me-auto">
                    <div class="fw-bold"><i class="bi bi-check-circle me-1 text-success"></i> Quantity </div> 
                  </div> 
                  <span class="badge bg-primary rounded-pill">
				  <?php 
 date_default_timezone_set("Asia/Dhaka");
 $date=date("Y/m/d");
$sql = $con->query("SELECT sum(order_item.order_quantity) as total FROM order_item
left join orders on orders.order_id=order_item.order_id
WHERE order_item.entry_date='$date' and orders.user_id ='".$_SESSION['id']."' ");
$row = $sql->fetch_assoc();
$TSQ= $row['total'];
?><?php echo $TSQ ; ?>

				  </span>
                </li>
				
				<li class="list-group-item d-flex justify-content-between align-items-start">
                  <div class="ms-2 me-auto">
                    <div class="fw-bold"><i class="bi bi-check-circle me-1 text-success"></i> Price </div> 
                  </div>
                  <span class="badge bg-primary rounded-pill">
				  <?php 
$sql = $con->query("SELECT sum(`grand_total`) as `total` FROM `orders`
WHERE order_date='$date' and orders.user_id ='".$_SESSION['id']."' ");
$row = $sql->fetch_assoc();
$TSP= $row['total'];
?><?php echo $TSP ; ?>
				  </span>
                </li>	
				
 		
                <li class="list-group-item d-flex justify-content-between align-items-start d-none">
                  <div class="ms-2 me-auto">
                    <div class="fw-bold"><i class="bi bi-check-circle me-1 text-success"></i> Paid By Invoice</div> 
                  </div>
                  <span class="badge bg-primary rounded-pill">
				  <?php 
$sql = $con->query("SELECT sum(`paid`) as `total` FROM `orders`
 WHERE order_date='$date' and order_status='1' and orders.user_id ='".$_SESSION['id']."' ");
$row = $sql->fetch_assoc();
$PBI= $row['total'];
?><?php echo $PBI ; ?>
				  </span>
                </li>	

<li class="list-group-item d-flex justify-content-between align-items-start d-none">
                  <div class="ms-2 me-auto">
                    <div class="fw-bold"><i class="bi bi-check-circle me-1 text-success"></i> Total Paid</div> 
                  </div>
                  <span class="badge bg-primary rounded-pill">
				  <?php
$TP=$PBI+$PBD ;
 echo $TP ;
 ?> 
				  </span>
</li>

<li class="list-group-item d-flex justify-content-between align-items-start d-none">
                  <div class="ms-2 me-auto">
                    <div class="fw-bold"><i class="bi bi-check-circle me-1 text-success"></i> Total Due</div> 
                  </div>
                  <span class="badge bg-primary rounded-pill">
				 <?php
$TD=$TSP-$TP ;
 echo $TD ;
 ?>
				  </span>
</li>

<li class="list-group-item d-flex justify-content-between align-items-start d-none">
                  <div class="ms-2 me-auto">
                    <div class="fw-bold"><i class="bi bi-check-circle me-1 text-success"></i> Total Due Paid Without Sale</div> 
                  </div>
                  <span class="badge bg-primary rounded-pill">
				  <?php 
$sql = $con->query("SELECT sum(`paid`) as `total` FROM `orders_details` WHERE order_date='$date' and order_type=4 and orders_details.user_id ='".$_SESSION['id']."' ");
$row = $sql->fetch_assoc();
$TDPWS= $row['total'];
?> <?php echo $TDPWS ; ?>
 </span> </li>
 
<li class="list-group-item d-flex justify-content-between align-items-start">
                  <div class="ms-2 me-auto">
                    <div class="fw-bold"><i class="bi bi-check-circle me-1 text-success"></i> Collection</div> 
                  </div>
                  <span class="badge bg-primary rounded-pill">
				 <?php
$GTC=$TP+$TDPWS ;
 echo $GTC ;
 ?> 
 </span> </li>
 
 <li class="list-group-item d-flex justify-content-between align-items-start d-none">
                  <div class="ms-2 me-auto">
                    <div class="fw-bold"><i class="bi bi-check-circle me-1 text-success"></i> Office Expense</div> 
                  </div>
                  <span class="badge bg-primary rounded-pill">
				 <?php
$sql = $con->query("SELECT SUM(`expense_cost`) as `total2` FROM `expense` where entry_date='$date' and user_id='".$_SESSION['id']."'  ");
$row = $sql->fetch_assoc();
$OfExp=$row['total2'];
?> <?php echo $OfExp; ?>
 </span> </li>
 
<li class="list-group-item d-flex justify-content-between align-items-start d-none">
<div class="ms-2 me-auto"> <div class="fw-bold"><i class="bi bi-check-circle me-1 text-success"></i> Other Expense</div> </div>
<span class="badge bg-primary rounded-pill">
				  <?php
$sql = $con->query("SELECT SUM(`expense_cost`) as `total1` FROM `expense_other` where entry_date='$date' and user_id='".$_SESSION['id']."'  ");
$row = $sql->fetch_assoc();
$OthExp=$row['total1'];
?> <?php echo $OthExp; ?>
</span> </li>

<li class="list-group-item d-flex justify-content-between align-items-start">
<div class="ms-2 me-auto"> <div class="fw-bold"><i class="bi bi-check-circle me-1 text-success"></i> Expense</div> </div>
<span class="badge bg-primary rounded-pill">
				 <?php 
$TotalExp= $TPD+$OfExp+$OthExp;
echo $TotalExp ;
?>
</span> </li>

<li class="list-group-item d-flex justify-content-between align-items-start">
<div class="ms-2 me-auto"> <div class="fw-bold"><i class="bi bi-check-circle me-1 text-success"></i> Cash</div> </div>
<span class="badge bg-primary rounded-pill">
				<?php 
$Cash= $GTC-$TotalExp;
echo $Cash ;
?>
</span> </li>




					
				
              </ol> 
				 
                </div>

              </div>
            </div>			
