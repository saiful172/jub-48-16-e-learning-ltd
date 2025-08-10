<!DOCTYPE html>
<html lang="en">

<head>
<?php   require_once 'head_link.php'; ?>

</head>

<body>
 
<?php   require_once 'header1.php'; ?> 

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
		
		
		
		if(empty($CustName)){
			$errMSG = "Please Enter Customer Name.";
		}
		else if(empty($Phone)){
			$errMSG = "Please Enter Phone Name.";
		}
		
		 
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO sup_orders_details (order_id,user_id,sup_id,order_date, client_name, client_contact,pre_due,today_total,grand_total,paid,recent_due,cuses,order_type,status ) 
			VALUES(:OrderId,:UserId,:CustId,:Date,:CustName,:Phone, :PreDues,0,0,:Paid,:RecentDues,"Dues Paid",4,1 )');
			
			
			$stmt->bindParam(':OrderId',$OrderId);
			$stmt->bindParam(':UserId',$UserId);
			$stmt->bindParam(':CustId',$CustId);
			$stmt->bindParam(':Date',$Date);
			$stmt->bindParam(':CustName',$CustName);
			$stmt->bindParam(':Phone',$Phone);
			
			$stmt->bindParam(':PreDues',$PreDues);
			$stmt->bindParam(':Paid',$Paid);
			$stmt->bindParam(':RecentDues',$RecentDues);
			
			
			
			
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
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('UPDATE sup_orders_dues 
									     SET  last_update=:Date,
										 pre_due=:PreDues, 
										     today_total=0, 
										     grand_total=0, 
										     paid=:Paid, 
										     recent_due=:RecentDues,
										     dues_or_paid_status=5,
										     cuses="Dues Paid"
											 
								       WHERE sup_id=:CustId ');
			
			
			$stmt->bindParam(':CustId',$CustId);
			$stmt->bindParam(':Date',$Date);
			
			$stmt->bindParam(':PreDues',$PreDues);
			$stmt->bindParam(':Paid',$Paid);
			$stmt->bindParam(':RecentDues',$RecentDues);
				
			if($stmt->execute()){
				?>
                <script>
				alert('Dues Paid Successfully......');
				window.location.href='dues-supplier';
				</script>
                <?php
			}
			else{
				$errMSG = "Sorry Data Could Not Updated !";
			}
		
		}
		
						
	}
	
?>

<?php  require_once 'sidebar.php'; ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Pay Supplier Dues |  <span> <a href="only-dues-supplier">    <i class="bi bi-table"></i> </a> </span> </h1>
	  <hr>
    </div> 
	
    <section class="section">
      <div class="row">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">
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
			  
</h5>
			  
<form method="post" enctype="multipart/form-data" class="form-horizontal">
	    
	<table class="table table-hover table-responsive">
	
		<?php
				   $pq=mysqli_query($con,"select * from stuff left join `user` on user.userid=stuff.userid where stuff.userid='".$_SESSION['id']."' ");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
        <input class="form-control" type="hidden" name="UserId"  value="<?php echo $pqrow['userid']; ?>" />
		<?php }?>
    
	
	<tr>
    	<td><label class="control-label">Select Supplier</label> </td>
        <td>
		<select style="width:100%;" class="form-control chosen-select " Id="CustId" name="CustId" required="" >
		<option value="#">Select Name</option>
				      	<?php 
				      	$sql = "SELECT  sup_id,supplier_name FROM supplier where user_id='".$_SESSION['id']."' ";
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
        <td><input class="form-control" type="hidden" id="PreDues1" name="PreDues1" placeholder="Previous Dues" value="<?php echo $PreDues; ?>" disabled="true" oninput="myFunctionRD()" />
        <input class="form-control" type="text" id="PreDues" name="PreDues" placeholder="Previous Dues" value="<?php echo $PreDues; ?>" oninput="myFunctionRD()" /></td>
    </tr>
   

	<tr>
    	<td><label class="control-label"> Pay Amount</label></td>
        <td><input class="form-control" type="text" id="Paid" name="Paid" placeholder="Pay Amount" value="<?php echo $Paid; ?>" oninput="myFunction()"/></td>
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
        <td>  <input class="form-control" type="date" name="Date"  value="<?php echo date("Y-m-d") ;?>" /></td>
    </tr>
	
	 
    </table>
	
	<button type="submit" name="btnsave" class="btn btn-primary">  <span class="glyphicon glyphicon-save"></span> &nbsp; Save </button>
       
</form>

            </div>
          </div>

          
        </div>

       
    </section>

  </main> 

    <?php  require_once 'footer1.php'; ?>
	
	
<script src = "js/chosen.js"></script>
<script type = "text/javascript">
	$('.chosen-select').chosen({width: "100%"});
</script>

<script>
	$("#CustId").on("change", function(){
		
		var customerID = $("#CustId").val();
		if(customerID == "")
		{
			alert("Please enter a valid customer ID!");
		}
		else{
			$.ajax({url: "ajax_c_load_dues_paid_sup.php?c=" + customerID, success: function(result){
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