<?php require_once 'header.php'; ?> 

<style> a{font-size:17px; color:black;} .badge{font-size:17px;} h4{font-size:18px;font-weight:bold;} 
.panel{padding:0px;box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.1), 0 3px 10px 0 rgba(0, 0, 0, 0.10);}
.card,.panel-body,.cardHeader{border-radius:5px;,padding:0px;box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.1), 0 3px 10px 0 rgba(0, 0, 0, 0.10);}
.panel1{padding:0px;}
 </style>

<div class="row">  

	<div class="col-md-3">
		<div class="panel panel-danger">
			<div class="panel-heading">
				<a href="products" >
			  <i class="glyphicon glyphicon-list"></i>  Course 
				<span class="badge pull pull-right">
<?php 
$sql = $con->query("SELECT count(`product_id`) as `gtotal` FROM product ");
$row = $sql->fetch_assoc();
echo $row['gtotal'];
?>
				</span>						
				</a>
				
			</div>  
		</div> 
	</div>  

<div class="col-md-3">
		<div class="panel panel-success">
			<div class="panel-heading">
				
				<a  href="students.php" >
					 <i class="glyphicon glyphicon-user"></i> Students
					<span class="badge pull pull-right">
<?php 
$sql = $con->query("SELECT count(`student_id`) as `gtotal` FROM `students` WHERE user_id='".$_SESSION['id']."' and status=1 ");
$row = $sql->fetch_assoc();
echo $row['gtotal'];
?>
					</span>
				</a>
				
			</div> 
		</div> 
	</div> 	 
	 
	
	<div class="col-md-3">
			<div class="panel panel-info">
			<div class="panel-heading">
			<a  href="orders.php?o=manord" >
					<i class="glyphicon glyphicon-duplicate"></i> Invoice
					<span class="badge pull pull-right">
					<?php 
$sql = $con->query("SELECT count(`order_id`) as `gtotal` FROM `orders` WHERE user_id='".$_SESSION['id']."' ");
$row = $sql->fetch_assoc();
echo $row['gtotal'];
?>
					</span>	
				</a>
		</div>  
		</div>  
		</div>  
		 
	<div class="col-md-3">
		<div class="panel panel-danger">
			<div class="panel-heading">
				<a  href="#" >
				<i class="glyphicon glyphicon-list-alt"></i> Reports
				<span class="badge pull pull-right">
				Click
				</span>						
				</a>
				
			</div>  
		</div>  
	</div>  
  
 
	<!--		
	<div class="col-md-3">
		<div class="panel panel-danger">
			<div class="panel-heading">
				<a href="php_action/view_product_stock.php" >
					Customer Dues
					<span class="badge pull pull-right">
					<?php 
$sql = $con->query("SELECT count(`id`) as `gtotal` FROM `orders_dues` WHERE user_id='".$_SESSION['id']."' ");
$row = $sql->fetch_assoc();
echo $row['gtotal'];
?>
					</span>						
				</a>
				
			</div> 
		</div> 
	</div>  -->


	<div class="col-md-4">
	
	
	<div class="card">
			
		  <div class="cardHeader" style="background-color:white;color:black;font-size:20px;padding:5px;">
		  <p>Notice / Message </p>   
		  </div>

		  <div class="cardContainer">
		     <p style="color:red; font-size:18px;padding:4px;">  
  <?php 	
				 $pq=mysqli_query($con,"select * from customer_msg  where status=1 and user_id='".$_SESSION['id']."' order by id desc limit 0, 1 ");
				 while($pqrow=mysqli_fetch_array($pq)){
				?>
			    <?php echo $pqrow['msg_name']; ?>
			    <?php }?>  
  </p>
		  </div>
		</div> 
		<br/>
		
			  
			<div class="card">
			
		  <div class="cardHeader">
		    <h2> 
			<?php 
$sql = $con->query("SELECT distinct business_name,business_address FROM `stuff` WHERE userid='".$_SESSION['id']."' ");
$row = $sql->fetch_assoc();
echo $row['business_name'];
?> 
			</h2>
		  </div>

		  <div class="cardContainer">
		    <p><h3><?php 
echo $row['business_address'];
?></h3></p>
		    
		  </div>
		</div> 
		<br/>
		
		<div class="card">
		  <div class="cardHeader" style="background-color:black;">
		    <h2><i class="fa fa-clock-o fa-fw"></i> <?php include('time.php'); ?></h3></center></h2>
		  </div>

		  <div class="cardContainer">
		    <p><h3><?php date_default_timezone_set("Asia/Dhaka");
        $date = new DateTime();
        echo $date->format('l - F j, Y');
    ?></h3></p>
		    
		  </div>
		</div> 
		<br>
		
		

	</div>
	<br> 

	<div class="col-md-8">
		<div class="panel panel-default">
			
			<div class="panel-body">
				<div id="calendar"><img src="../includes/itmm.jpg" width="100%"/></div>
			</div>	
		</div> 
	</div>
</div> <!--/row-->


<?php include('modal.php'); ?>
