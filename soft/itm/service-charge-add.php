<?php require_once 'header.php'; ?>
<?php 
	
	if(isset($_POST['btnsave']))
	{
		$user_id = $_POST['user_id'];
		$client_no = $_POST['client_no'];
		
		$client_id = $_POST['client_id'];
		$product_type = $_POST['product_type'];
		$ServType = $_POST['ServType'];
		$service_charge = $_POST['service_charge'];
		$Date = $_POST['Date'];
		
		
		if(empty($client_no)){
			$errMSG = "Please Enter client_no.";
		}
		else if(empty($client_id)){
			$errMSG = "Please Enter client_name.";
		}
		
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO service_charge (user_id,client_no,client_id,product_type,service_type,service_charge,join_date,status)
                                                			VALUES(:user_id,:client_no, :client_id,:product_type,:ServType,:service_charge,:Date,1)');
			$stmt->bindParam(':user_id',$user_id);
			$stmt->bindParam(':client_no',$client_no);
			$stmt->bindParam(':client_id',$client_id);
			$stmt->bindParam(':product_type',$product_type);
			$stmt->bindParam(':ServType',$ServType);
			
			$stmt->bindParam(':service_charge',$service_charge);
			$stmt->bindParam(':Date',$Date);
			
			
			if($stmt->execute())
			{
				 ?>
              <script>
				alert('Data Successfully Add ...');
				window.location.href='service-charge-add';
				</script>
          <?php	
			}
			else
			{
				$errMSG = "error while inserting....";
			}
		}
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head> 
<title>Add New Client </title> 
<link rel = "stylesheet" type = "text/css" href = "css/chosen.css" />
<link rel="stylesheet" href="css/buttons.css">
</head>
<body>
<center><h4><ol class="breadcrumb"> <li class="active"> Add New Client  </li></ol></h4></center>

<div class="col-md-2">	
<div class="buttons">

<div class="col-md-12">	
<a class="btn btn-primary btn-w100" href="service-charge-add"> <span class="glyphicon glyphicon-plus"></span> Add New</a> 
</div>	


<div class="col-md-12">	
<a class="btn btn-primary btn-w100" href="service-charge"> <span class="glyphicon glyphicon-list"></span> Client Service List</a>
</div>

<div class="col-md-12">	
<a class="btn btn-success btn-w100" href="lead-list-report"> <span class="glyphicon glyphicon-file"></span> Report</a> 
</div>
	

<div class="col-md-12">	 
<br>
</div>

<div class="col-md-12">	
<a class="btn btn-warning btn-w100" href="service-cat"> <span class="glyphicon glyphicon-list"></span> Service Category</a>
</div>

<div class="col-md-12">	
<a class="btn btn-info btn-w100" href="service-charge-paid"> <span class="glyphicon glyphicon-user"></span> Paid List</a>
</div>
       
	</div>
	</div>

	
<div class="col-md-10">
<div class="col-md-7">

	<?php
	if(isset($errMSG)){
			?>
            <div class="alert alert-danger">
            	<span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
            </div>
            <?php
	}
	else if(isset($successMSG)){
		?>
        <div class="alert alert-success">
              <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
        </div>
        <?php
	}
	?>   

<form method="post" enctype="multipart/form-data" class="form-horizontal" >
	<table class="table table-responsive">
   <tr>
		<?php  
				   $pq=mysqli_query($con,"select * from user where userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
        <input class="form-control" type="hidden" name="user_id"  value="<?php echo $pqrow['userid']; ?>" />
		<?php }?>
    </tr>
	
	<tr style="display:none;">
    	<td><label class="control-label">Client No </label></td>
		<?php	// Auto client No
				   include('includes/conn.php');
				   $pq=mysqli_query($con,"select MAX(client_no)+1 as max_id from service_charge ");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
        <td><input class="form-control" type="text" name="client_no"  value="<?php echo $pqrow['max_id']; ?>" /></td>
    <?php }?>
	</tr>
	
	<tr>
    	<td><label class="control-label">Select Client</label> </td>
        <td>
		<select style="width:100%;" class="form-control chosen-select " Id="CustId" name="CustId" required="" >
		<option value="#">Select Name</option>
				      	<?php 
				      	$sql = "SELECT  customer_id,customer_name FROM customer where member_id='".$_SESSION['id']."' ";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} 
				      	?>
		</select> 
		</td>
    </tr>
	  
	<tr style="display:none;">
    	<td><label class="control-label">Client ID </label></td>
        <td><input class="form-control" type="text" name="client_id" id="client_id" placeholder="Client Id" value="<?php echo $client_id; ?>" /></td>
    </tr>
	
	
	<tr>
    	<td><label class="control-label">Select Service</label></td>
        <td><select style="width:100%;" class="form-control chosen-select" Id="product_type" name="product_type" required="" >
		<option value="#">Select Name</option>
		
				      	<?php 
				      	$sql = "SELECT scat_id,name FROM service_category where  user_id='".$_SESSION['id']."'";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} 
				      	?>
	   </select>
		
		</td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Service Charge</label></td>
        <td><input class="form-control" type="text" name="service_charge" placeholder="service charge" value="<?php echo $service_charge; ?>" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label"> Monthly / Yearly</label></td>
        <td><select class="form-control" id="ServType" name="ServType" required>
		<option value="">Select Type</option>
		<option value="Monthly">Monthly</option>
		<option value="Yearly">Yearly</option>
		
	   </select>
		
		</td>
    </tr>
	
		<tr>
    	<td><label class="control-label">Entry Date </label></td>
		<td><input class="form-control" type="text" name="Date" placeholder="" value="<?php echo date("Y/m/d") ;?>" /></td>
    </tr>
    
    <tr>
        <td colspan="2"><button type="submit" name="btnsave" class="btn btn-primary">
        <span class="glyphicon glyphicon-save"></span> &nbsp; save
        </button>
        </td>
    </tr>
    
    </table>
    
</form>

</div>
 
<div class="col-md-12">
<?php require_once '../includes/footer.php'; ?> 
</div>

</div> 


<script>
	$("#CustId").on("change", function(){
		var customerID = $("#CustId").val();
		if(customerID == "")
		{
			alert("Please enter a valid customer ID!");
		}
						
		else{
			$.ajax({url: "ajax_c_load.php?c=" + customerID, success: function(result){
				var customer = JSON.parse(result);
				
				$("#client_id").val(customer.CustomerIdd);
				$("#clientName1").val(customer.customerName);
				$("#clientName").val(customer.customerName);
				
			}});
		}
	});
</script>


 
 <script src = "js/chosen.js"></script>
<script type = "text/javascript">
	$('.chosen-select').chosen({width: "100%"});
</script>

