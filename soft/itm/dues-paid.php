<?php require_once 'header.php'; ?>

<?php 
	if(isset($_POST['btnsave']))
	{
		$OrderId= $_POST['OrderId'];
		$UserId = $_POST['UserId'];
		$CustId = $_POST['CustId'];
		$Date = $_POST['Date'];
		
		$CustName = $_POST['CustName'];
		$Phone = $_POST['Phone'];
		
		$PreDues = $_POST['PreDues'];
		$Paid = $_POST['Paid'];
		$RecentDues = $_POST['RecentDues'];
		
		$CustomInv = $_POST['CustomInv'];
		$paymentType = $_POST['paymentType'];
		
		
		
		if(empty($CustName)){
			$errMSG = "Please Enter Customer Name.";
		}
		else if(empty($Phone)){
			$errMSG = "Please Enter Phone Name.";
		}
		
		 
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO orders_details (order_id,user_id,customer_id,order_date, client_name, client_contact,pre_due,today_total,grand_total,paid,recent_due,cuses,order_type,status,custom_invoice,paym_type ) 
			VALUES(:OrderId,:UserId,:CustId,:Date,:CustName,:Phone, :PreDues,0,0,:Paid,:RecentDues,"Dues Paid",4,1,:CustomInv,:paymentType )');
			
			
			$stmt->bindParam(':OrderId',$OrderId);
			$stmt->bindParam(':UserId',$UserId);
			$stmt->bindParam(':CustId',$CustId);
			$stmt->bindParam(':Date',$Date);
			$stmt->bindParam(':CustName',$CustName);
			$stmt->bindParam(':Phone',$Phone);
			
			$stmt->bindParam(':PreDues',$PreDues);
			$stmt->bindParam(':Paid',$Paid);
			$stmt->bindParam(':RecentDues',$RecentDues);
			
			$stmt->bindParam(':paymentType',$paymentType);
			$stmt->bindParam(':CustomInv',$CustomInv);
			
			
			
			if($stmt->execute())
			{
				$successMSG = "Dues Paid Successfully......";
				//header("refresh:2;admin/index.php"); // redirects image view page after 5 seconds.
			}
			else
			{
				$errMSG = "error while inserting....";
			}
		}
	}
?>

<?php
 

	if(isset($_POST['btnsave']))
	{
		
		$CustId = $_POST['CustId'];
		$Date = $_POST['Date'];
		
		$PreDues = $_POST['PreDues'];
		$Paid = $_POST['Paid'];
		$RecentDues = $_POST['RecentDues'];
		
		$paymentType = $_POST['paymentType'];
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('UPDATE orders_dues 
									     SET  last_update=:Date,
										 pre_due=:PreDues, 
										     today_total=0, 
										     grand_total=0, 
										     paid=:Paid, 
											 paym_type=:paymentType,
										     recent_due=:RecentDues,
										     dues_or_paid_status=5,
										     cuses="Dues Paid"
											 
								       WHERE customer_id=:CustId ');
			
			
			$stmt->bindParam(':CustId',$CustId);
			$stmt->bindParam(':Date',$Date);
			
			$stmt->bindParam(':PreDues',$PreDues);
			$stmt->bindParam(':Paid',$Paid);
			$stmt->bindParam(':RecentDues',$RecentDues);
			
			$stmt->bindParam(':paymentType',$paymentType);
				
			if($stmt->execute()){
				?>
                <script>
				alert('Dues Paid Successfully......');
				window.location.href='dues-paid';
				</script>
                <?php
			}
			else{
				$errMSG = "Sorry Data Could Not Updated !";
			}
		
		}
		
						
	}
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="css/buttons.css">
</head>
<body>
<center><h4><ol class="breadcrumb"> <li class="active"> Dues Collection</li></ol></h4></center>


<div class="col-md-2">
		<div class="buttons">
	
		<div class="col-md-12">
		<a class="btn btn-primary" style="width:100%" href="dues-paid"> <span class="glyphicon glyphicon-pencil"></span> Dues Pay</a> 
		</div>

		<div class="col-md-12">
		<a class="btn btn-info" style="width:100%" href="dues-details"> <span class="glyphicon glyphicon-eye-open"></span> Details View</a> 
		</div>
		
		<div class="col-md-12">
		<a class="btn btn-danger" style="width:100%" href="dues-recent"> <span class="glyphicon glyphicon-eye-open"></span> Only Dues </a> 
		</div>
		
		<div class="col-md-12">
		<a target="_blank" class="btn btn-success" style="width:100%" href="dues-report-all"> <span class="glyphicon glyphicon-file"></span> All Report </a> 
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

<form method="post" enctype="multipart/form-data" class="form-horizontal">
	    
	<table class="table table-hover table-responsive">
	
		<?php
				   $pq=mysqli_query($con,"select * from stuff left join `user` on user.userid=stuff.userid where stuff.userid='".$_SESSION['id']."' ");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
        <input class="form-control" type="hidden" name="UserId"  value="<?php echo $pqrow['userid']; ?>" />
		<?php }?>
    
	
	<tr>
    	<td><label class="control-label">Select Customer</label> </td>
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
	
	<tr>
    	<td><label class="control-label">Customer Name</label></td>
        <td><input class="form-control" type="text" id="CustName1" name="CustName1" placeholder="Customer Name" value="<?php echo $CustName;  ?>" disabled="true" />
       <input class="form-control" type="hidden" id="CustName" name="CustName" placeholder="Customer Name" value="<?php echo $CustName; ?>" />
		<input class="form-control" type="hidden" id="Phone" name="Phone" placeholder="Phone Number" value="<?php echo $Phone; ?>" /> </td>
    </tr>
		
	<!--OrderId-->	
	<input class="form-control" type="hidden" id="OrderId" name="OrderId" placeholder="Order Id" value="<?php echo $OrderId; ?>"  />	
	<!--OrderId-->
	
    <tr>
    	<td><label class="control-label">Previous Dues</label></td>
        <td><input class="form-control" type="text" id="PreDues1" name="PreDues1" placeholder="Previous Dues" value="<?php echo $PreDues; ?>" disabled="true" oninput="myFunctionRD()" />
        <input class="form-control" type="hidden" id="PreDues" name="PreDues" placeholder="Previous Dues" value="<?php echo $PreDues; ?>" oninput="myFunctionRD()" /></td>
    </tr>
   
   <tr>
    	<td><label class="control-label">Payment Type</label> </td>
        <td>
		<select class="form-control" name="paymentType" id="paymentType">
		 
				      	<?php 
				      	$sql = "SELECT  pt_id,pt_name FROM payment_type where user_id=22 ";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[1]."'>".$row[1]."</option>";
								} 
				      	?>
						
						<?php 
				      	$sql = "SELECT  pt_id,pt_name FROM payment_type where user_id='".$_SESSION['id']."' ";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[1]."'>".$row[1]."</option>";
								} 
				      	?>
		      </select> 
		</td>
    </tr>

	<tr>
    	<td><label class="control-label"> Paid Money</label></td>
        <td><input class="form-control" type="text" id="Paid" name="Paid" placeholder="Paid Money" value="<?php echo $Paid; ?>" oninput="myFunction()"/></td>
    </tr>
<!-- Recent Kisti -->	
	<script>
  function myFunction() {
    var x = Number (document.getElementById("PreDues").value);
    var y = Number (document.getElementById("Paid").value);
	
	
    var z = Number (x - y);

    document.getElementById("RecentDues1").value = z;
    document.getElementById("RecentDues").value = z;
	                  }
  </script>
<!-- Recent Kisti -->	
   
	

    
<!-- Recent Dues -->		

  
	<tr>
    	<td><label class="control-label">Recent Dues</label></td>
        <td>
        <input class="form-control" type="text" id="RecentDues1" name="RecentDues1" placeholder="Recent Dues" value="<?php echo $RecentDues; ?>" disabled="true" />
        <input class="form-control" type="hidden" id="PreDue" name="PreDue" placeholder="Pre Due" value="<?php echo $PreDue; ?>" />
        <input class="form-control" type="hidden" id="TTotal" name="TTotal" placeholder="Today Total" value="<?php echo $TTotal; ?>" />
        <input class="form-control" type="hidden" id="GTotal" name="GTotal" placeholder="Grand Total" value="<?php echo $GTotal; ?>" />
        <input class="form-control" type="hidden" id="RecentDues" name="RecentDues" placeholder="Recent Dues" value="<?php echo $RecentDues; ?>" />
		</td>
    </tr>
	
	    
		<tr>
    	<td><label class="control-label">Date</label></td>
        <td><input class="form-control" type="text" name="Date1" placeholder="Date" value="<?php echo date("m/d/Y") ;?>" disabled="true"  />
         <input class="form-control" type="hidden" name="Date" placeholder="Date" value="<?php echo date("Y/m/d") ;?>" /></td>
    </tr>
	
	<tr style="display:none;">
    	<td><label class="control-label">Custom Invoice</label></td>
        <td> <input class="form-control" type="text" name="CustomInv" id="CustomInv" placeholder="Custom Invoice" /></td>
    </tr>
	
	<tr> <td></td>  <td></td></tr>
	 
    </table>
	
	<button type="submit" name="btnsave" class="btn btn-primary">  <span class="glyphicon glyphicon-save"></span> &nbsp; Save </button>
       
</form>

</div>
<div class="col-md-12">
<?php include('../includes/footer.php');?>
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
			$.ajax({url: "ajax_c_load_dues_paid.php?c=" + customerID, success: function(result){
				var customer = JSON.parse(result);
				$("#CustName1").val(customer.customerName);
				$("#CustName").val(customer.customerName);
				$("#Phone").val(customer.customerContact);
				
				$("#OrderId").val(customer.customerOrderId);
				$("#PreDues1").val(customer.customerDues);
				$("#PreDues").val(customer.customerDues);
				
				$("#PreDue").val(customer.PreviousDue);
				$("#TTotal").val(customer.TodayTotal);
				$("#GTotal").val(customer.GrandTotal);
				$("#DueStatus").val(customer.Status);
				
				$("#CustomInv").val(customer.CustomInvoice);
				
				
				
			}});
		}
	});
</script>

<script src = "js/chosen.js"></script>
<script type = "text/javascript">
	$('.chosen-select').chosen({width: "100%"});
</script>


