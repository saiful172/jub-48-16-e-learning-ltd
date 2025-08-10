<?php require_once 'header.php'; ?>
<?php
 
	if(isset($_POST['btnsave']))
	{
		
		$UserId = $_POST['UserId'];
		$ExpName = $_POST['ExpName'];
		$ExpDetails = $_POST['ExpDetails'];
		$Ammount = $_POST['Ammount'];
		$ExpCost = $_POST['ExpCost'];
		$Refer = $_POST['Refer'];
		$Date = $_POST['Date'];
		
		
		if(empty($ExpName)){
			$errMSG = "Please Enter Expense Name.";
		}
		else if(empty($ExpCost)){
			$errMSG = "Please Enter Expense Ammount.";
		}
		
		
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO expense (user_id,expense_name,exp_details,ammount,expense_cost,reference,entry_date) VALUES(:UserId,:ExpName,:ExpDetails,:Ammount,:ExpCost,:Refer,:Date)');
			
			
			$stmt->bindParam(':UserId',$UserId);
			$stmt->bindParam(':ExpName',$ExpName);
			$stmt->bindParam(':ExpDetails',$ExpDetails);
			$stmt->bindParam(':Ammount',$Ammount);
			$stmt->bindParam(':ExpCost',$ExpCost);
			$stmt->bindParam(':Refer',$Refer);
			$stmt->bindParam(':Date',$Date);
			
			if($stmt->execute())
			{
				?>
              <script>
				alert('Expense Data Successfully Add ...');
				window.location.href='Expense.php';
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
<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head> 
<link rel="stylesheet" href="css/buttons.css">
</head>
<body>

<center><h4><ol class="breadcrumb"> <li class="active">Office  Expense  </li></ol></h4></center>	
<div class="col-md-2">  
<div class="buttons"> 

		<div class="col-md-12">
		<a class="btn btn-primary btn-w100" href="Expense"  > <span class="glyphicon glyphicon-list"></span> Expense List  </a> 
		</div>
		
		<div class="col-md-12">
		<a class="btn btn-info btn-w100" href="exp-name-office"  > <span class="glyphicon glyphicon-list-alt"></span>  Category   </a> 
		 </div>
		
		<div class="col-md-12">
		<a class="btn btn-success btn-w100" href="exp-report-by-date"  > <span class="glyphicon glyphicon-file"></span> Report By Date </a>
	   </div>
		
		<div class="col-md-12">
		<a class="btn btn-success btn-w100" href="office-exp-report-by-heading"  > <span class="glyphicon glyphicon-file"></span> Report By Category </a> 
		 
		</div>
		
		<div class="col-md-12">
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
	    
	<table class="table table-hover table-responsive">
	
   <tr>
    	
		<?php   
				   $pq=mysqli_query($con,"select * from user where userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
        
        <input class="form-control" type="hidden" name="UserId"  value="<?php echo $pqrow['userid']; ?>" />
		<?php }?>
    </tr>
	
	
	
	<tr>
    	<td><label class="control-label">Name </label>  </td>
        <td> 
		<select style="width:100%;" class="form-control chosen-select" Id="ExpName" name="ExpName" required="" >
		<option value="#">Select Name</option>
		
				      	<?php 
				      	$sql = "SELECT of_id,name FROM office_exp_name where  user_id='".$_SESSION['id']."'";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} 
				      	?>
	   </select> 
     </tr>
	
	
	
	<tr>
    	<td><label class="control-label"> Details</label></td>
		<td><input class="form-control" type="text" name="ExpDetails" placeholder="Expense Details" value="<?php echo $ExpDetails; ?>"></td>
    </tr>
	
	<tr>
    	<td><label class="control-label"> Amount (Qty)</label></td>
		<td><input class="form-control" type="text" name="Ammount" placeholder="Amount (Qty)" value="<?php echo $Ammount; ?>"></td>
    </tr>
	
		
	<tr>
    	<td><label class="control-label">Taka </label></td>
        <td><input class="form-control" type="text" name="ExpCost" placeholder="Expense Ammount" value="<?php echo $ExpCost; ?>" ></td>
    </tr>
	
	
	
	
	<tr>
    	<td><label class="control-label">Reference </label></td>
		<td><input class="form-control" type="text" name="Refer" placeholder="Reference" value="Na" ></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Date </label></td>
		<td><input class="form-control" type="text" name="Date" placeholder="" value="<?php date_default_timezone_set("Asia/Dhaka"); echo date("Y/m/d") ;?>"> </td>
    </tr>
	
	
     <tr><td></td><td></td></tr>
    
    
    </table>
	
	<tr>
        <td colspan="2"><button type="submit" name="btnsave" class="btn btn-primary">
        <span class="glyphicon glyphicon-save"></span> &nbsp; Save
        </button>
        </td>
    </tr>
    
</form>

</div>
<div class="col-md-12">
<?php require_once '../includes/footer.php'; ?> 
</div>

</div>


<script src = "js/chosen.js"></script>
<script type = "text/javascript">
	$('.chosen-select').chosen({width: "100%"});
</script>



