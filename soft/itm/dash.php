<?php require_once 'header.php'; ?> 

<style> a{font-size:14px; color:black;} .badge{font-size:14px;} h3{font-size:22px;} h4{font-size:14px;font-weight:bold;} 
.panel{padding:0px;box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.1), 0 3px 10px 0 rgba(0, 0, 0, 0.10);}
.card,.panel-body,.cardHeader{border-radius:5px;padding:0px;box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.1), 0 3px 10px 0 rgba(0, 0, 0, 0.10);}
.panel1{padding:0px;}
hr{padding:0px;margin:5px;}
 </style>

<div class="row">  	 
	 
	<div class="col-md-2">
		<div class="panel panel-info">
			<div class="panel-heading">
				<a href="productN" >
			  <i class="glyphicon glyphicon-list"></i>  Product / Stock   
			  </a>
			    
				<a href="productN" >  
				<span class="badge pull pull-right">
				<i class="glyphicon glyphicon-hand-right "></i>&nbsp;
<?php 
$sql = $con->query("SELECT count(`product_id`) as `gtotal` FROM product where user_id='".$_SESSION['id']."' ");
$row = $sql->fetch_assoc();
echo $row['gtotal'];
?>

/ 

<?php 
$sql = $con->query("SELECT sum(`quantity`) as `gtotal` FROM product where user_id='".$_SESSION['id']."' ");
$row = $sql->fetch_assoc();
echo $row['gtotal'];
?>
				</span>						
				</a>
				
			</div>  
		</div> 
	</div>  
	
	<div class="col-md-2">
		<div class="panel panel-danger">
			<div class="panel-heading">
				<a href="low-stock-product" >
			  <i class="glyphicon glyphicon-list"></i>  Low Stock   
			  </a>
			    
				<a href="low-stock-product" >  
				<span class="badge pull pull-right">
				<i class="glyphicon glyphicon-hand-right "></i>&nbsp;
<?php 

$sql = $con->query("select * from stock_low where user_id ='".$_SESSION['id']."' ");
$rows = $sql->fetch_assoc();
$LowQty =$rows['low_qty']; 

$sql2 = $con->query("SELECT count(`product_id`) as `gtotal` FROM product where user_id='".$_SESSION['id']."' and quantity < $LowQty ");
$row = $sql2->fetch_assoc();
echo $row['gtotal'];
?>
				</span>						
				</a>
				
			</div>  
		</div> 
	</div>  

<div class="col-md-2">
		<div class="panel panel-success">
			<div class="panel-heading">
				
				<a  href="customer" >
					 <i class="glyphicon glyphicon-user"></i> Clients
				</a>
				<a  href="customer" >	
					<span class="badge pull pull-right"> <i class="glyphicon glyphicon-hand-right "></i>&nbsp;
<?php 
$sql = $con->query("SELECT count(`customer_id`) as `gtotal` FROM `customer` WHERE member_id='".$_SESSION['id']."' and status=1 ");
$row = $sql->fetch_assoc();
echo $row['gtotal'];
?>
					</span>
				</a>
				
			</div> 
		</div> 
	</div> 	 
	 	
	<div class="col-md-2">
			<div class="panel panel-warning">
			<div class="panel-heading">
			<a  href="orders-retail?o=add" >
					<i class="glyphicon glyphicon-file"></i> Retail Invoice
			</a>		
					<a  href="orders-retail?o=manord" >
					<span class="badge pull pull-right">   <i class="glyphicon glyphicon-hand-right "></i>&nbsp;
					<?php 
$sql = $con->query("SELECT count(`order_id`) as `gtotal` FROM `orders` WHERE user_id='".$_SESSION['id']."' and order_type = 1 ");
$row = $sql->fetch_assoc();
echo $row['gtotal'];
?>
					</span>	
				</a>
				
		</div>  
		</div>  
		</div> 
		
		<div class="col-md-2">
			<div class="panel panel-warning">
			<div class="panel-heading">
			<a  href="orders?o=add" >
					<i class="glyphicon glyphicon-file"></i> Whole-Sale Invoice
			</a>		
					<a  href="orders?o=manord" >
					<span class="badge pull pull-right">   <i class="glyphicon glyphicon-hand-right "></i>&nbsp;
					<?php 
$sql = $con->query("SELECT count(`order_id`) as `gtotal` FROM `orders` WHERE user_id='".$_SESSION['id']."' and order_type = 2 ");
$row = $sql->fetch_assoc();
echo $row['gtotal'];
?>
					</span>	
				</a>
				
		</div>  
		</div>  
		</div>
		
				
 
	<div class="col-md-2">
		<div class="panel panel-success">
			<div class="panel-heading">
				<a  href="All-Reports" >
				<i class="glyphicon glyphicon-list-alt"></i> All Reports
				<span class="badge pull pull-right">
				Click
				</span>						
				</a>
				
			</div>  
		</div>  
	</div> 
 
 
<div class="col-md-8"> 
<div class="panel panel-danger" style="padding:5px;color:red;text-align:center;">
		<?php 	
				 $pq=mysqli_query($con,"select * from customer_msg  where  msg_status=1 and status=1 and user_id='".$_SESSION['id']."' order by id desc limit 0, 1 ");
				 while($pqrow=mysqli_fetch_array($pq)){
				?>
			    <?php echo $pqrow['msg_name']; ?>
			    <?php }?> 	
		</div> 
		
<?php require_once 'notes_home.php'; ?>   
<?php require_once 'daily_report_home.php'; ?>
 <?php require_once 'rec_sale_home.php'; ?>	
 <?php //require_once 'notice_home.php'; ?>	
		
	</div>
   
   <div class="col-md-4">     
		 
		<?php require_once 'biz_info.php'; ?> 
		<br/>
		<?php require_once 'time_date_home.php'; ?> 
		 
		<br>
		 
		<div class="card">
		  <div class="cardHeader" style="background-color:#245580;">
		    <img src="../includes/dim.png" style="border-radius:10px;" width="28%" />
		  </div>

		  <div class="cardContainer">
		    <p>Design & Developed By ITM-SOFTS</p>
			<p>Call : 01751-891037 | Email: info@itmsofts.com |  Website : <a class="text-primary" target="_blank" href="https://itmsofts.com/">www.itmsofts.com</a> </p>
		  </div>
		</div> 
		
<br>		
  
		
	</div>
   
 

	<div class="col-md-4" style="display:none;">
		<div class="panel panel-default"> 
			<div class="panel-body">
				<div id="calendar"><img src="../includes/itmm.jpg" width="100%"/></div>
			</div>	
		</div> 
	</div>
	
	
	
	
</div>  


<?php include('modal.php'); ?>
