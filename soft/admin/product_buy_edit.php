<?php require_once 'header.php'; ?>
<?php
	error_reporting( ~E_NOTICE );
	
	require_once 'dbconfig.php';
	
	if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
	{
		$id = $_GET['edit_id'];
		$stmt_edit = $DB_con->prepare('SELECT * FROM product_buy WHERE id =:uid');
		$stmt_edit->execute(array(':uid'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: product_buy.php");
	}
	
	
	
	if(isset($_POST['btn_save_updates']))
	{
		
$UserId = $_POST['UserId'];
		$SuplierId = $_POST['SuplierId'];
		
		$SupName = $_POST['SupName'];
		$Phone = $_POST['Phone'];
		$Invoice = $_POST['Invoice'];
		
		$TodayTotal = $_POST['TodayTotal'];
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
			
			

			$stmt = $DB_con->prepare('INSERT INTO product_buy_details (user_id,supplier_id,supplier_name,phone,invoice_no, today_total,pre_due,grand_total, paid, recent_due,comments,invoice_date, last_update) VALUES(:UserId,:SuplierId,:SupName,:Phone,:Invoice,:TodayTotal,:PreDues, :GrandTotalDues,:Paid,:RecentDues, :Comments,:Date,:Date )');
			//$stmt = $DB_con->prepare('INSERT INTO kisti (pname,PID,Catid,pgroup,brand,engine,details,Date) VALUES(:SupName,:Phone, :Nid, :Address, :PreDues, :Paid, :RecentDues, :Date  )');

			
			
			$stmt->bindParam(':UserId',$UserId);
			$stmt->bindParam(':SuplierId',$SuplierId);
			$stmt->bindParam(':SupName',$SupName);
			$stmt->bindParam(':Phone',$Phone);
			$stmt->bindParam(':Invoice',$Invoice);
			
			$stmt->bindParam(':TodayTotal',$TodayTotal);
			$stmt->bindParam(':PreDues',$PreDues);
			$stmt->bindParam(':GrandTotalDues',$GrandTotalDues);
			$stmt->bindParam(':Paid',$Paid);
			$stmt->bindParam(':RecentDues',$RecentDues);
			
			$stmt->bindParam(':Comments',$Comments);
			$stmt->bindParam(':Date',$Date);
			
			
			
			
			if($stmt->execute())
			{
				$successMSG = "আপডেট সম্পন্ন হয়েছে......";
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
	error_reporting( ~E_NOTICE );
	
	require_once 'dbconfig.php';
	
	if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
	{
		$id = $_GET['edit_id'];
		$stmt_edit = $DB_con->prepare('SELECT * FROM product_buy WHERE id =:uid');
		$stmt_edit->execute(array(':uid'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: product_buy.php");
	}
	
	
	
	if(isset($_POST['btn_save_updates']))
	{
		
		
		$TodayTotal = $_POST['TodayTotal'];
		$PreDues = $_POST['PreDues'];
		$GrandTotalDues = $_POST['GrandTotalDues'];
		$Paid = $_POST['Paid'];
		$RecentDues = $_POST['RecentDues'];
		
		$Date = $_POST['Date'];
		$Comments = $_POST['Comments'];
			
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('UPDATE product_buy 
									     SET  
										 today_total=:TodayTotal, 
										 pre_due=:PreDues, 
										 grand_total=:GrandTotalDues, 
										     paid=:Paid, 
										     recent_due=:RecentDues,
										     comments=:Comments,
											 last_update=:Date
											 
								       WHERE id=:uid ');
			
			
			
			$stmt->bindParam(':TodayTotal',$TodayTotal);
			$stmt->bindParam(':PreDues',$PreDues);
			$stmt->bindParam(':GrandTotalDues',$GrandTotalDues);
			$stmt->bindParam(':Paid',$Paid);
			$stmt->bindParam(':RecentDues',$RecentDues);
			
			$stmt->bindParam(':Date',$Date);
			$stmt->bindParam(':Comments',$Comments);
			$stmt->bindParam(':uid',$id);
				
			if($stmt->execute()){
				?>
                <script>
				alert('আপডেট সম্পন্ন হয়েছে...');
				
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

<!-- custom stylesheet -->
<link rel="stylesheet" href="style.css">

</head>
<body>


<center><h3><ol class="breadcrumb"> <li class="active">Supplier  আপডেট </li></ol></h3></center>


<form method="post" enctype="multipart/form-data" class="form-horizontal">
	
    
    <?php
	if(isset($errMSG)){
		?>
        <div class="alert alert-danger">
          <span class="glyphicon glyphicon-info-sign"></span> &nbsp; <?php echo $errMSG; ?>
        </div>
        <?php
	}
	?>
   
    
	<table class="table table-bordered table-responsive">
	
    <tr>
	<input class="form-control" type="hidden" name="UserId"  value="<?php echo $user_id; ?>" />
	</tr>
	
	<tr>
    	<td><label class="control-label">Supplier Id</label> </td>
        <td> <input  type="text" class="form-control" id="SuplierId" name="SuplierId" placeholder="Supplier Id" value="<?php echo $supplier_id; ?>" autocomplete="off" />  </td>
		
    </tr>
	
	<tr>
    	<td><label class="control-label">Supplier Name</label></td>
        <td><input class="form-control" type="text" id="SupName1" name="SupName1" placeholder="Supplier Name" value="<?php echo $supplier_name; ?>" disabled="true" />
       <input class="form-control" type="hidden" id="SupName" name="SupName" placeholder="Supplier Name" value="<?php echo $supplier_name; ?>"  /></td>
		
    </tr>
		
	<tr>
    	<td><label class="control-label">Mobile</label></td>
        <td><input class="form-control" type="text" id="Phone1" name="Phone1" placeholder="Phone Number"  value="<?php echo $phone; ?>" disabled="true"/>
        <input class="form-control" type="hidden" id="Phone" name="Phone" placeholder="Phone Number" value="<?php echo $phone; ?>" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Invoice No</label></td>
        <td><input class="form-control" type="text" id="Invoice" name="Invoice" placeholder="Invoice No" value="<?php echo $invoice_no; ?>" />
       </td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Product Price ( Today ) </label></td>
        <td>
        <input class="form-control" type="text" id="TodayTotal" name="TodayTotal" placeholder="Product Price" oninput="myFunction()" value="<?php echo $today_total; ?>" />
       </td>
    </tr>
	
		
	<tr>
    	<td><label class="control-label">Previous Dues</label></td>
        <td><input class="form-control" type="text" id="PreDues1" name="PreDues1" placeholder="Previous Dues"  disabled="true" oninput="myFunction()" value="<?php echo $pre_due; ?>" />
        <input class="form-control" type="hidden" id="PreDues" name="PreDues" placeholder="Previous Dues"  oninput="myFunction()" value="<?php echo $pre_due; ?>" /></td>
    </tr>
   
   <tr>
    	<td><label class="control-label">Total Dues</label></td>
        <td><input class="form-control" type="text" id="GrandTotalDues1" name="GrandTotalDues1" placeholder="Total Dues" disabled="true" oninput="myFunction()" value="<?php echo $grand_total; ?>" />
        <input class="form-control" type="hidden" id="GrandTotalDues" name="GrandTotalDues" placeholder="Total Dues" oninput="myFunction()" value="<?php echo $grand_total; ?>" />
       </td>
    </tr>
	

	<tr>
    	<td><label class="control-label"> Paid </label></td>
        <td><input class="form-control" type="text" id="Paid" name="Paid" placeholder="Money Paid"  oninput="myFunction()" value="<?php echo $paid; ?>" /></td>
    </tr>
<!-- Due Ammount	-->
	<script>
  function myFunction() {
    var tt = Number (document.getElementById("TodayTotal").value);
    var pd = Number (document.getElementById("PreDues").value);
    var paid = Number (document.getElementById("Paid").value);
	
	
    var total_due = Number (tt + pd);
    var rec_due = Number (total_due - paid);

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

        <td><input class="form-control" type="text" id="RecentDues1" name="RecentDues1" placeholder="Recent Dues"   disabled="true" value="<?php echo $recent_due; ?>" />
        <input class="form-control" type="hidden" id="RecentDues" name="RecentDues" placeholder="Recent Dues"  value="<?php echo $recent_due; ?>"  />
		</td>
    </tr>
	
	<tr>
    	<input class="form-control" type="hidden" id="Comments" name="Comments" placeholder="Comments"  value="Edited"  /> 
    </tr>
	
	
	<tr>
    	<td><label class="control-label">Date</label></td>
        <td><input class="form-control" type="text" name="Date" placeholder="Date" value="<?php echo $last_update; ?>"  /></td>
    </tr>
    
    <tr>
        <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-default">
        <span class="glyphicon glyphicon-save"></span> আপডেট করুন
        </button>
        
        <a class="btn btn-default" href="product_buy.php"> <span class="glyphicon glyphicon-backward"></span> cancel </a>
        
        </td>
    </tr>
    
    </table>
    
</form>


</div>
</body>
</html>