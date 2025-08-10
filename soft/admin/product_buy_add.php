
<?php require_once 'header.php'; ?>


<?php

	require_once 'dbconfig.php';
	
	
	if(isset($_POST['btnsave']))
	{
		
	$SuplierId = $_POST['SuplierId'];
	
		// it will delete an actual record from db
		$stmt_delete = $DB_con->prepare('DELETE FROM product_buy WHERE supplier_id =:SuplierId');
		$stmt_delete->bindParam(':SuplierId',$SuplierId);
		$stmt_delete->execute();
		
			}

			
?>

<?php

	error_reporting( ~E_NOTICE ); // avoid notice
	
	require_once 'dbconfig.php';
	
	if(isset($_POST['btnsave']))
	{
		
		$UserId = $_POST['UserId'];
		$SuplierId = $_POST['SuplierId'];
		
		$SupName = $_POST['SupName'];
		$Phone = $_POST['Phone'];
		$Invoice = $_POST['Invoice'];
		
		$TodayTotal = $_POST['TodayTotal'];
		$Comision = $_POST['Comision'];
		$TransCost = $_POST['TransCost'];
		$NetPrice = $_POST['NetPrice'];
		
		$PreDues = $_POST['PreDues'];
		$GrandTotalDues = $_POST['GrandTotalDues'];
		$Paid = $_POST['Paid'];
		$RecentDues = $_POST['RecentDues'];
		
		
		$Comments = $_POST['Comments'];
		$Date = $_POST['Date'];
		
		if(empty($SupName)){
			$errMSG = "Please Enter Customer Name.";
		}
		else if(empty($Phone)){
			$errMSG = "Please Enter Phone Name.";
		}
	
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			
			

			$stmt = $DB_con->prepare('INSERT INTO product_buy (user_id,supplier_id,supplier_name,phone,invoice_no, today_total,comision,trans_cost,net_price,pre_due,grand_total, paid, recent_due,comments,invoice_date, last_update,paid_type,cuses) 
			                                            VALUES(:UserId,:SuplierId,:SupName,:Phone,:Invoice,:TodayTotal,:Comision,:TransCost,:NetPrice,:PreDues, :GrandTotalDues,:Paid,:RecentDues, :Comments,:Date,:Date,2,"New Buy" )');
			
			
			$stmt->bindParam(':UserId',$UserId);
			$stmt->bindParam(':SuplierId',$SuplierId);
			$stmt->bindParam(':SupName',$SupName);
			$stmt->bindParam(':Phone',$Phone);
			$stmt->bindParam(':Invoice',$Invoice);
			
			$stmt->bindParam(':TodayTotal',$TodayTotal);
			$stmt->bindParam(':Comision',$Comision);
			$stmt->bindParam(':TransCost',$TransCost);
			$stmt->bindParam(':NetPrice',$NetPrice);
			
			$stmt->bindParam(':PreDues',$PreDues);
			$stmt->bindParam(':GrandTotalDues',$GrandTotalDues);
			$stmt->bindParam(':Paid',$Paid);
			$stmt->bindParam(':RecentDues',$RecentDues);
			
			$stmt->bindParam(':Comments',$Comments);
			$stmt->bindParam(':Date',$Date);
			
			
			
			
			if($stmt->execute())
			{
				$successMSG = "New Record Succesfully Add ...";
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
		
		$UserId = $_POST['UserId'];
		$SuplierId = $_POST['SuplierId'];
		
		$SupName = $_POST['SupName'];
		$Phone = $_POST['Phone'];
		$Invoice = $_POST['Invoice'];
		
		$TodayTotal = $_POST['TodayTotal'];
		$Comision = $_POST['Comision'];
		$TransCost = $_POST['TransCost'];
		$NetPrice = $_POST['NetPrice'];
		
		$PreDues = $_POST['PreDues'];
		$GrandTotalDues = $_POST['GrandTotalDues'];
		$Paid = $_POST['Paid'];
		$RecentDues = $_POST['RecentDues'];
		
		
		$Comments = $_POST['Comments'];
		$Date = $_POST['Date'];
		
		if(empty($SupName)){
			$errMSG = "Please Enter Customer Name.";
		}
		else if(empty($Phone)){
			$errMSG = "Please Enter Phone Name.";
		}
	
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
	$stmt = $DB_con->prepare('INSERT INTO product_buy_details (user_id,supplier_id,supplier_name,phone,invoice_no, today_total,comision,trans_cost,net_price,pre_due,grand_total, paid, recent_due,comments,invoice_date, last_update,paid_type,cuses) 
			                                             VALUES(:UserId,:SuplierId,:SupName,:Phone,:Invoice,:TodayTotal,:Comision,:TransCost,:NetPrice,:PreDues, :GrandTotalDues,:Paid,:RecentDues, :Comments,:Date,:Date,2,"New Buy" )');
						
			$stmt->bindParam(':UserId',$UserId);
			$stmt->bindParam(':SuplierId',$SuplierId);
			$stmt->bindParam(':SupName',$SupName);
			$stmt->bindParam(':Phone',$Phone);
			$stmt->bindParam(':Invoice',$Invoice);
			
			$stmt->bindParam(':TodayTotal',$TodayTotal);
			$stmt->bindParam(':Comision',$Comision);
			$stmt->bindParam(':TransCost',$TransCost);
			$stmt->bindParam(':NetPrice',$NetPrice);
			
			$stmt->bindParam(':PreDues',$PreDues);
			$stmt->bindParam(':GrandTotalDues',$GrandTotalDues);
			$stmt->bindParam(':Paid',$Paid);
			$stmt->bindParam(':RecentDues',$RecentDues);
			
			$stmt->bindParam(':Comments',$Comments);
			$stmt->bindParam(':Date',$Date);
			
			
			
			
			if($stmt->execute())
			{
				$successMSG = "Products Buy সম্পন্ন হয়েছে ...";
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
<title>Product Buy From Supplier</title>

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="css/buttons.css">


</head>
<body>

<center><h4><ol class="breadcrumb"> <li class="active"> New  Products Buy - From Supplier  </li></ol></h4></center>
<div class="buttons">
	
		<div class="col-md-2">
		<a class="btn btn-default" style="width:100%" href="product_buy_add.php"> <span class="glyphicon glyphicon-plus"></span> New Products Buy </a> 
		</div>
		
		<div class="col-md-2">
		<a class="btn btn-default" style="width:100%" href="product_buy_details.php"> <span class="glyphicon glyphicon-eye-open"></span> View </a> 
		</div>
		
</div>

	<div class="col-md-12" >
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
</div>

<form method="post" enctype="multipart/form-data" class="form-horizontal">
	    
	<table class="table table-bordered table-responsive">
	
    <tr>
    	
		<?php
				
				   include('conn.php');
				   $pq=mysqli_query($con,"select * from user where userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
        <input class="form-control" type="hidden" name="EmpId1"  value="<?php echo $pqrow['userid']; ?>" disabled="true" />
        <input class="form-control" type="hidden" name="UserId"  value="<?php echo $pqrow['userid']; ?>" />
		<?php }?>
    </tr>
	
	<tr>
    	<td><label class="control-label">Supplier Id</label> <div style="float:right;"> <button  type="button" class="btn btn-primary" id="loadCustomer" > <i class="glyphicon glyphicon-ok-sign"></i> OK</button></div></td>
        <td> <input  type="text" class="form-control" id="SuplierId" name="SuplierId" placeholder="এখানে  Supplier Id দিন এবং ওকে বাটনে ক্লিক করুন " value="<?php echo $SuplierId; ?>" autocomplete="off" />  </td>
		
    </tr>
	
	<tr>
    	<td><label class="control-label">Supplier Name</label></td>
        <td><input class="form-control" type="text" id="SupName1" name="SupName1" placeholder="Supplier Name" disabled="true" />
       <input class="form-control" type="hidden" id="SupName" name="SupName" placeholder="Supplier Name"  /></td>
		
    </tr>
		
	<tr>
    	<td><label class="control-label">Mobile</label></td>
        <td><input class="form-control" type="text" id="Phone1" name="Phone1" placeholder="Mobile"   disabled="true"/>
        <input class="form-control" type="hidden" id="Phone" name="Phone" placeholder="Phone Number"  /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Invoice No</label></td>
        <td><input class="form-control" type="text" id="Invoice" name="Invoice" placeholder="Invoice No"  />
       </td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Product Price ( Today ) </label></td>
        <td>
        <input class="form-control" type="text" id="TodayTotal" name="TodayTotal" placeholder="Product Price ( Today  ) " oninput="myFunction()" />
       </td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Discount</label></td>
        <td>
        <input class="form-control" type="text" id="Comision" name="Comision" placeholder="Discount" oninput="myFunction()" />
       </td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Transport Cost </label></td>
        <td>
        <input class="form-control" type="text" id="TransCost" name="TransCost" placeholder=" Transport Cost  " oninput="myFunction()" />
       </td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Net Price </label></td>
        <td>
        <input class="form-control" type="text" id="NetPrice" name="NetPrice" placeholder=" Net Price  " oninput="myFunction()" />
       </td>
    </tr>
	
		
	<tr>
    	<td><label class="control-label">Previous Dues</label></td>
        <td><input class="form-control" type="text" id="PreDues1" name="PreDues1" placeholder="Previous Dues"  disabled="true" oninput="myFunction()" />
        <input class="form-control" type="hidden" id="PreDues" name="PreDues" placeholder="Previous Dues"  oninput="myFunction()" /></td>
    </tr>
   
   <tr>
    	<td><label class="control-label">Total Dues</label></td>
        <td><input class="form-control" type="text" id="GrandTotalDues1" name="GrandTotalDues1" placeholder="Total Dues" disabled="true" oninput="myFunction()"/>
        <input class="form-control" type="hidden" id="GrandTotalDues" name="GrandTotalDues" placeholder="Total Dues" oninput="myFunction()"/>
       </td>
    </tr>
	

	<tr>
    	<td><label class="control-label">Paid</label></td>
        <td><input class="form-control" type="text" id="Paid" name="Paid" placeholder="Paid"  oninput="myFunction()" /></td>
    </tr>
<!-- Due Ammount	-->
	<script>
  function myFunction() {
    var tt = Number (document.getElementById("TodayTotal").value);
    var pd = Number (document.getElementById("PreDues").value);
    var paid = Number (document.getElementById("Paid").value);
	
    var Cost1 = Number (document.getElementById("Comision").value);
    var Cost2 = Number (document.getElementById("TransCost").value);
	
	
    var Cost = Number (Cost1 + Cost2);
    var NetP = Number (tt - Cost);
    var total_due = Number (NetP + pd);
    var rec_due = Number (total_due - paid);

    document.getElementById("NetPrice").value = NetP;
    document.getElementById("GrandTotalDues1").value = total_due;
    document.getElementById("GrandTotalDues").value = total_due;
    document.getElementById("RecentDues1").value = rec_due;
    document.getElementById("RecentDues").value = rec_due;
	                  }
  </script>

<!-- Due Ammount	-->
   
	

    
<!-- Recent Dues -->		

  
	<tr>
    	<td><label class="control-label">Recent Dues</label></td>

        <td><input class="form-control" type="text" id="RecentDues1" name="RecentDues1" placeholder="Recent Dues"   disabled="true" />
        <input class="form-control" type="hidden" id="RecentDues" name="RecentDues" placeholder="Recent Dues"   />
		</td>
    </tr>
	
	<tr>
    	<td><label class="control-label"> Comments </label></td>

        <td> <input class="form-control" type="text" id="Comments" name="Comments" placeholder="Comments"  value="নাই"/> </td>
    </tr>
	

    
	<tr>
    	<td><label class="control-label">Date</label></td>
        <td><input class="form-control" type="text" name="Date" placeholder="Date" value="<?php echo date("Y/m/d") ;?>" /></td>
    </tr>
	
     <tr>
        <td colspan="2" style="text-align:center;"><button type="submit" name="btnsave" class="btn btn-primary">
        <center> <span class="glyphicon glyphicon-save"></span> &nbsp; Save  </center>
        </button>
        </td>
    </tr>
    
    </table>
    
</form>




<!-- Latest compiled and minified JavaScript -->


<script>
	$("#loadCustomer").on("click", function(){
		
		var customerID = $("#SuplierId").val();
		if(customerID == "")
		{
			alert("Please enter a valid customer ID!");
		}
		else{
			$.ajax({url: "ajax_c_load_dues_paid.php?c=" + customerID, success: function(result){
				var customer = JSON.parse(result);
				$("#SupName1").val(customer.customerName);
				$("#SupName").val(customer.customerName);
				$("#Phone1").val(customer.customerContact);
				$("#Phone").val(customer.customerContact);
				
				$("#PreDues1").val(customer.RecentDue);
				$("#PreDues").val(customer.RecentDue);
				
				
				
			}});
		}
	});
</script>




