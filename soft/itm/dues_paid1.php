
<?php require_once 'header.php'; ?>



<?php

	error_reporting( ~E_NOTICE ); // avoid notice
	
	require_once 'dbconfig.php';
	
	if(isset($_POST['btnsave']))
	{
		$OrderId= $_POST['OrderId'];
		$UserId = $_POST['UserId'];
		$CustId = $_POST['CustId'];
		$Date1 = $_POST['Date1'];
		
		$CustName = $_POST['CustName'];
		$Phone = $_POST['Phone'];
		
		$PreDues = $_POST['PreDues'];
		$Paid = $_POST['Paid'];
		$RecentDues = $_POST['RecentDues'];
		
		
		
		if(empty($CustName)){
			$errMSG = "Please Enter Customer Name.";
		}
		else if(empty($Phone)){
			$errMSG = "Please Enter Phone Name.";
		}
		
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO orders_details (order_id,user_id,customer_id,order_date, client_name, client_contact,pre_due,today_total,grand_total, paid, recent_due,cuses ) 
			                  VALUES(:OrderId,:UserId,:CustId,:Date1,:CustName,:Phone, :PreDues,0,0, :Paid, :RecentDues,"বাকী পরিশোধ " )');
			
			
			$stmt->bindParam(':OrderId',$OrderId);
			$stmt->bindParam(':UserId',$UserId);
			$stmt->bindParam(':CustId',$CustId);
			$stmt->bindParam(':Date1',$Date1);
			$stmt->bindParam(':CustName',$CustName);
			$stmt->bindParam(':Phone',$Phone);
			
			$stmt->bindParam(':PreDues',$PreDues);
			$stmt->bindParam(':Paid',$Paid);
			$stmt->bindParam(':RecentDues',$RecentDues);
			
			
			
			
			if($stmt->execute())
			{
				$successMSG = "Dues Paid  ...";
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

	error_reporting( ~E_NOTICE ); // avoid notice
	
	require_once 'dbconfig.php';
	
	if(isset($_POST['btnsave']))
	{
		$OrderId= $_POST['OrderId'];
		$UserId = $_POST['UserId'];
		$CustId = $_POST['CustId'];
		$Date = $_POST['Date'];
		$Date1 = $_POST['Date1'];
		
		$CustName = $_POST['CustName'];
		$Phone = $_POST['Phone'];
		
		$PreDues = $_POST['PreDues'];
		
		$Paid = $_POST['Paid'];
		$RecentDues = $_POST['RecentDues'];
		
		
		
		if(empty($CustName)){
			$errMSG = "Please Enter Customer Name.";
		}
		else if(empty($Phone)){
			$errMSG = "Please Enter Phone Name.";
		}
		
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO orders_dues (order_id,user_id,customer_id,order_date,last_update, client_name, client_contact,pre_due,today_total,grand_total, paid, recent_due,dues_or_paid,dues_or_paid_status,cuses ) 
			                  VALUES(:OrderId,:UserId,:CustId,:Date,:Date1,:CustName,:Phone, :PreDues,0,0, :Paid, :RecentDues,"Dues", 4, "বাকী পরিশোধ " )');
					
			$stmt->bindParam(':OrderId',$OrderId);
			$stmt->bindParam(':UserId',$UserId);
			$stmt->bindParam(':CustId',$CustId);
			$stmt->bindParam(':Date',$Date);
			$stmt->bindParam(':Date1',$Date1);
			$stmt->bindParam(':CustName',$CustName);
			$stmt->bindParam(':Phone',$Phone);
			
			$stmt->bindParam(':PreDues',$PreDues);
			
			$stmt->bindParam(':Paid',$Paid);
			$stmt->bindParam(':RecentDues',$RecentDues);
			
			
			
			
			if($stmt->execute())
			{
				$successMSG = "Dues Paid ...";
				//header("refresh:2;admin/index.php"); // redirects image view page after 5 seconds.
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">


</head>
<body>

<center><h4><ol class="breadcrumb"> <li class="active">  Dues Paid</li></ol></h4></center>

    	<h1 class="h2"> <a class="btn btn-default" href="dues.php"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; View </a></h1>
  

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
	    
	<table class="table table-bordered table-responsive">
	
		<?php
				
				   include('conn.php');
				   $pq=mysqli_query($con,"select * from stuff left join `user` on user.userid=stuff.userid where stuff.userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
        <input class="form-control" type="hidden" name="UserId"  value="<?php echo $pqrow['userid']; ?>" />
		<?php }?>
    
	
   
	<tr>
    	<td><label class="control-label">Customer Id</label> <div style="float:right;"> <button  type="button" class="btn btn-primary" id="loadCustomer" > <i class="glyphicon glyphicon-ok-sign"></i> OK</button></div></td>
        <td> <input  type="text" class="form-control" id="CustId" name="CustId" placeholder="Customer Id" autocomplete="off" />  </td>
		
    </tr>
	
	<tr>
    	<td><label class="control-label">Customer Name</label></td>
        <td> <input class="form-control" type="text" id="CustName" name="CustName" placeholder="Customer Name" value="<?php echo $CustName; ?>" />
</td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Mobile No </label></td>
        <td><input class="form-control" type="text" id="Phone" name="Phone" placeholder="Mobile No" value="<?php echo $Phone; ?>" /> </td>
    </tr>
	
	<tr>
	 <td><label class="control-label">Invoice No</label></td>
    <td><input class="form-control" type="text" id="OrderId" name="OrderId" placeholder="Invoice No" value="<?php echo $OrderId; ?>"  />	</td>
   </tr>
		
	
	 
    	<td><label class="control-label">Previous Dues</label></td>
        <td><input class="form-control" type="text" id="PreDues" name="PreDues" placeholder="Previous Dues" value="<?php echo $PreDues; ?>" oninput="myFunction()" /></td>
    </tr>
   

	<tr>
    	<td><label class="control-label"> Paid Ammount</label></td>
        <td><input class="form-control" type="text" id="Paid" name="Paid" placeholder="Paid Ammount" value="<?php echo $Paid; ?>" oninput="myFunction()"/></td>
    </tr>
<!-- Recent Kisti -->	
	<script>
  function myFunction() {
    var x = Number (document.getElementById("PreDues").value);
    var y = Number (document.getElementById("Paid").value);
	
	
    var z = Number (x - y);
    document.getElementById("RecentDues").value = z;
	                  }
  </script>
<!-- Recent Kisti -->	
   
	

    
<!-- Recent Dues -->		

  
	
	<tr>
    	<td><label class="control-label">Recent Dues</label></td>
        <td>
       <input class="form-control" type="text" id="RecentDues" name="RecentDues" placeholder="Recent Dues" value="<?php echo $RecentDues; ?>" oninput="myFunction()" />
		</td>
    </tr>
	
	    
		<tr>
    	<td><label class="control-label">Invoice Date</label></td>
        <td> <input class="form-control" type="text" name="Date" placeholder="Date" value="<?php echo date("Y/m/d") ;?>" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Last Paid</label></td>
        <td> <input class="form-control" type="text" name="Date1" placeholder="Date" value="<?php echo date("Y/m/d") ;?>" /></td>
    </tr>
	
    <tr>
        <td colspan="2"><button type="submit" name="btnsave" class="btn btn-default">
        <span class="glyphicon glyphicon-save"></span> &nbsp; Save
        </button>
        </td>
    </tr>
    
    </table>
    
</form>


<?php require_once 'includes/footer.php'; ?>

<!-- Latest compiled and minified JavaScript -->


<script>
	$("#loadCustomer").on("click", function(){
		
		var customerID = $("#CustId").val();
		if(customerID == "")
		{
			alert("Please enter a valid customer ID!");
		}
		else{
			$.ajax({url: "ajax_c_load_dues_paid1.php?c=" + customerID, success: function(result){
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
				
				
				
			}});
		}
	});
</script>




