<?php require_once 'header.php'; ?> 

<style> a{font-size:17px; color:black;} .badge{font-size:17px;} h4{font-size:18px;font-weight:bold;} 
.panel{padding:0px;box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.1), 0 3px 10px 0 rgba(0, 0, 0, 0.10);}
.card,.panel-body,.cardHeader{border-radius:5px;,padding:0px;box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.1), 0 3px 10px 0 rgba(0, 0, 0, 0.10);}
.panel1{padding:0px;}
 </style>

<div class="row">
	<div class="col-md-3">
		<div class="panel panel-success">
			<div class="panel-heading">
				
				<a  href="client.php" >
					Total Clients
					<span class="badge pull pull-right">
<?php 
$sql = $con->query("SELECT count(`userid`) as `gtotal` FROM `stuff` where status=1 ");
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
					Invoice List
					<span class="badge pull pull-right">
					<?php 
$sql = $con->query("SELECT count(`order_id`) as `gtotal` FROM `orders` ");
$row = $sql->fetch_assoc();
echo $row['gtotal'];
?>
					</span>	
				</a>
		</div> <!--/panel-hdeaing-->
		</div> <!--/panel-->
		</div> <!--/col-md-4-->
	
	<div class="col-md-3">
		<div class="panel panel-danger">
			<div class="panel-heading">
				<a href="productN.php" >
			   Product List
				<span class="badge pull pull-right">
				<?php 
$sql = $con->query("SELECT count(`product_id`) as `gtotal` FROM `product` ");
$row = $sql->fetch_assoc();
echo $row['gtotal'];
?>
				</span>						
				</a>
				
			</div> <!--/panel-hdeaing-->
		</div> <!--/panel-->
	</div> <!--/col-md-4-->
	
	<div class="col-md-3">
		<div class="panel panel-danger">
			<div class="panel-heading">
				<a  href="Report.php" >
					All Report
					<span class="badge pull pull-right">
					Click
					</span>						
				</a>
				
			</div> <!--/panel-hdeaing-->
		</div> <!--/panel-->
	</div> <!--/col-md-4-->
	

	<div class="col-md-4">
	<div class="card">
			
		  <div class="cardHeader" style="background-color:white;color:black;font-size:20px;padding:5px;">
		  <p><a href="company_msg.php">Notice / Message</a>  </p>  
		  </div>

		  <div class="cardContainer">
		       
  <?php 	
				 $pq=mysqli_query($con,"select * from customer_msg  where  msg_status=2 and status=1  order by id desc limit 0, 3");
				 while($pqrow=mysqli_fetch_array($pq)){
				 $date=$pqrow['entry_date'];
                 $date= date("d-M-Y");
				?>
			<?php echo $pqrow['msg_from']; ?> - ( <?php  echo  $date ;  ?>  ) <br>
			   <p style="color:red; font-size:16px;padding:2px;border-bottom:1px solid gray; text-align:left;">
			   <?php echo $pqrow['msg_name']; ?> 
			   </p>
			    <?php }?>  
  
		  </div>
		</div> 
		<br/>
		
			  
			<div class="card">
			
		  <div class="cardHeader">
		    <h1>
			<?php include('../includes/header_title.php'); ?>
			</h1>
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

	<div class="col-md-8">
		<div class="panel panel-default">
			
			<div class="panel-body">
				<div id="calendar"><center><img src="../includes/itmm.jpg" width="100%"  /></div>
			</div>	
		</div>
		
	</div>
</div> <!--/row-->

<script src="custom/js/order.js"></script>
<?php include('modal.php'); ?>
<?php include('../includes/footer.php'); ?>
