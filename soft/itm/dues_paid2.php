
<?php require_once 'header.php'; ?>


<?php

	error_reporting( ~E_NOTICE );
	
	require_once 'dbconfig.php';
	
		
	if(isset($_POST['btnsave']))
	{
		
		$CustId = $_POST['CustId'];
		$Date = $_POST['Date'];
		$OrderId= $_POST['OrderId'];
		$PreDues = $_POST['PreDues'];
		$Paid = $_POST['Paid'];
		$RecentDues = $_POST['RecentDues'];
		
		
					
			
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('UPDATE orders_dues 
									     SET  last_update=:Date,
										 order_id=:OrderId, 
										 pre_due=:PreDues, 
										     paid=:Paid, 
										     recent_due=:RecentDues
										     
											 
								       WHERE customer_id=:CustId ');
			
			
			$stmt->bindParam(':CustId',$CustId);
			$stmt->bindParam(':Date',$Date);
			
			$stmt->bindParam(':OrderId',$OrderId);
			$stmt->bindParam(':PreDues',$PreDues);
			$stmt->bindParam(':Paid',$Paid);
			$stmt->bindParam(':RecentDues',$RecentDues);
				
			if($stmt->execute()){
				?>
                <script>
				alert(' UPDATE Done !');
				
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">


</head>
<body>

<center><h4><ol class="breadcrumb"> <li class="active"> Dues Paid </li></ol></h4></center>

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
    	<td><label class="control-label">Customer Id</label> <div style="float:right;"> <button  type="button" class="btn btn-primary" id="loadCustomer" > <i class="glyphicon glyphicon-ok-sign"></i> ওকে</button></div></td>
        <td> <input  type="text" class="form-control" id="CustId" name="CustId" placeholder="Customer Id" autocomplete="off" />  </td>
		
    </tr>
	
	<tr>
    	<td><label class="control-label">Customer Name</label></td>
        <td> <input class="form-control" type="text" id="CustName" name="CustName" placeholder="Customer Name" value="<?php echo $CustName; ?>" />
</td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Mobile No</label></td>
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
<!-- Recent Kisti 
	<script>
  function myFunction() {
    var x = Number (document.getElementById("PreDues").value);
    var y = Number (document.getElementById("Paid").value);
	
	
    var z = Number (x - y);
    document.getElementById("RecentDues").value = z;
	                  }
  </script>
 Recent Kisti -->	
   
	

    
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
    	<td><label class="control-label">Last Paid </label></td>
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
			$.ajax({url: "ajax_c_load_dues_paid2.php?c=" + customerID, success: function(result){
				var customer = JSON.parse(result);
				$("#CustName1").val(customer.customerName);
				$("#CustName").val(customer.customerName);
				$("#Phone").val(customer.customerContact);
				
				$("#OrderId").val(customer.customerOrderId);
				$("#PreDues1").val(customer.customerDues);
				$("#PreDues").val(customer.PreviousDue);
				
				$("#Paid").val(customer.PaidToday);
				$("#RecentDues").val(customer.customerDues);
				
				
				
			}});
		}
	});
</script>




