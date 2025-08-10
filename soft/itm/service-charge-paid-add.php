<?php require_once 'header.php'; ?>
<?php
	if(isset($_POST['btnsave']))
	{
		$user_id = $_POST['user_id'];
		$year = $_POST['year'];
		$month = $_POST['month'];
		
		$client_id = $_POST['client_id'];
		$product_type = $_POST['product_type'];
		$ServType = $_POST['ServType'];
		$service_charge = $_POST['service_charge'];
		
		$paid = $_POST['paid'];
		$due = $_POST['due'];
		$comments = $_POST['comments'];
		$Date = $_POST['Date'];
		
		
		if(empty($product_type)){
			$errMSG = "Please Enter product_type.";
		}
		else if(empty($paid)){
			$errMSG = "Please Enter paid.";
		}
		
			if (isset($_POST['client_id']) && $_POST['client_id'] != '') {
		// $contact_info = $_POST['contact_info'];
		$checkQuery = mysqli_query($con, "SELECT * FROM `service_charge_paid` WHERE user_id='".$_SESSION['id']."' and  `client_id`='$client_id' and `year`='$year'and `month`='$month' ");
		if (mysqli_num_rows($checkQuery) > 0) {
		$errMSG = "This Client Already Paid This Month !";
		}
		
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO service_charge_paid (user_id,year,month,client_id,product_type,service_type,service_charge,paid,due,comments,status,entry_date)
                      			VALUES(:user_id,:year, :month, :client_id,:product_type,:ServType,:service_charge,:paid,:due,:comments,1,:Date)');
			
			$stmt->bindParam(':user_id',$user_id);
			$stmt->bindParam(':year',$year);
			$stmt->bindParam(':month',$month);
			$stmt->bindParam(':client_id',$client_id);
			$stmt->bindParam(':product_type',$product_type);
			$stmt->bindParam(':ServType',$ServType);
			
			$stmt->bindParam(':service_charge',$service_charge);
			$stmt->bindParam(':paid',$paid);
			$stmt->bindParam(':due',$due);
			$stmt->bindParam(':comments',$comments);
			
			$stmt->bindParam(':Date',$Date);
			
			
			if($stmt->execute())
			{
				 ?>
              <script>
				alert('Data Successfully Add ...');
				window.location.href='service-charge-paid-add';
				</script>
          <?php	
			}
			else
			{
				$errMSG = "error while inserting....";
			}
		}
		}
	}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<link rel="stylesheet" href="css/buttons.css">
</head>
<body>


<center><h4><ol class="breadcrumb"> <li class="active"> Add New Service Charge Paid  </li></ol></h4></center>

<div class="col-md-2">	
<div class="buttons">

<div class="col-md-12">	
<a class="btn btn-primary  btn-w100" href="service-charge-paid-add"> <span class="glyphicon glyphicon-plus"></span> Add New</a> 
</div>	

<div class="col-md-12">	
<a class="btn btn-primary btn-w100" href="service-charge-paid"> <span class="glyphicon glyphicon-ok"></span> Paid List</a>
</div>

<div class="col-md-12">	
<a class="btn btn-success btn-w100" href="service-charge-report-date"> <span class="glyphicon glyphicon-file"></span> Report</a> 
</div>
	

<div class="col-md-12">	 
<br>
</div>

<div class="col-md-12">	
<a class="btn btn-warning btn-w100" href="service-charge"> <span class="glyphicon glyphicon-list"></span> Client List</a>
</div>

<div class="col-md-12">	
<a class="btn btn-info btn-w100" href="service-cat"> <span class="glyphicon glyphicon-list"></span> Service Category</a>
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
    
		
	<tr>
    	<td><label class="control-label">Select Year</label></td>
       	<td><select style="width:100%;" class="form-control" name="year"  value="<?php echo $year; ?>" />
	 
		<option value="2023">2023</option>
		<option value="2022">2022</option>
		<option value="2021">2021</option>
		</select> </td>       
	</tr>
	 
	
	 <tr>
    	<td><label class="control-label">Select Month</label></td>
	 <td><select style="width:100%;" class="form-control"  name="month" value="<?php echo $month; ?>" />
		<option value="January">January</option> 
		<option value="February">February</option>
		<option value="March">March</option>
		<option value="April">April</option>
		<option value="May">May</option>
		<option value="June">June</option>
		<option value="July">July</option>
		<option value="August">August</option>
		<option value="September">September</option>
		<option value="October">October</option>
		<option value="November">November</option>
		<option value="December">December</option>
		</select></td>
	</tr>
		
	<tr>
    	<td><label class="control-label">Client ID</label></td>
       <td> 
	   <select style="width:100%;" class="form-control chosen-select " Id="CustId" name="client_id" required="" >
		<option value="#">Select Name</option>
				      	<?php 
				      	$sql = "SELECT  client_id, customer_name FROM service_charge 
						left join customer on customer.customer_id=service_charge.client_id  
						where member_id='".$_SESSION['id']."' ";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} 
				      	?>
		</select> 
	   </td>
    </tr>
	
	
	<tr>
    	<td><label class="control-label">Service Name / Type</label></td>
        <td>
		 <input style="width:65%;float:left;" class="form-control text-center" type="text" id="TypeName" name="TypeName" placeholder="Service Name"  />
		 <input style="width:35%;" class="form-control text-center" type="text" name="ServType" id="ServType" placeholder="Service Type" />
		</td>
    </tr>
	 
	
	<tr style="display:none;">
    	<td><label class="control-label">Product Type</label></td>
        <td><input class="form-control" type="text" id="product_type" name="product_type" placeholder="Product Type"  /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Service Charge</label></td>
        <td><input class="form-control" type="text" id="service_charge" name="service_charge" placeholder="Service Charge"  oninput="myFunctionDue()" /></td>
    </tr>
		
	<tr>
    	<td><label class="control-label">Paid</label></td>
        <td><input class="form-control" type="text" id="paid" name="paid" placeholder="paid"  oninput="myFunctionDue()"/></td>
    </tr>		
	<tr>
    	<td><label class="control-label">Due</label></td>
        <td><input class="form-control" type="text" id="due" name="due" placeholder="Due" oninput="myFunctionDue()" /></td>
    </tr>
	
	<script>
  function myFunctionDue() {
    var x = Number (document.getElementById("service_charge").value);
    var y = Number (document.getElementById("paid").value);
	
    var z = Number (x - y); 
    
    document.getElementById("due").value = z;
	                  }
  </script>
  
	<tr>
    	<td><label class="control-label">Comments</label></td>
        <td><input class="form-control" type="text" name="comments" placeholder="comments" value="Paid" /></td>
    </tr>

		<tr>
    	<td><label class="control-label">Entry Date </label></td>
		<td><input class="form-control" type="text" name="Date" placeholder="" value="<?php echo date("Y/m/d") ;?>" /></td>
    </tr>
     
    
    </table>
	
	<tr>
        <td colspan="2"><button type="submit" name="btnsave" class="btn btn-primary">
        <span class="glyphicon glyphicon-save"></span> &nbsp; save
        </button>
        </td>
    </tr>
    
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
			$.ajax({url: "ajax_c_load_dues_service_charge.php?c=" + customerID, success: function(result){
				var customer = JSON.parse(result);
				$("#product_type").val(customer.Product);
				$("#ServType").val(customer.ServiceType);
				$("#TypeName").val(customer.ProTypeName);
				$("#service_charge").val(customer.Charge);
				
				
				
			}});
		}
	});
</script>


