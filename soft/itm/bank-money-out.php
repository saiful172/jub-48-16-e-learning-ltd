 
<?php require_once 'header.php'; ?> 

<?php 
		
	if(isset($_POST['btnsave']))
	{
		$UserId = $_POST['UserId'];		
		$BankId = $_POST['BankId'];		
		$Account = $_POST['Account'];		
		$PreAmt = $_POST['PreAmt'];		
		$SavingAmt = $_POST['SavingAmt'];		
		$RecAmt = $_POST['RecAmt'];		
		$Refer = $_POST['Refer'];		
		$Date = $_POST['Date'];
				
		if(empty($SavingAmt)){
			$errMSG = "Please Enter Savings Ammount.";
		}
				
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
								
			$stmt = $DB_con->prepare('INSERT INTO bank_money_history (user_id,bank_id,account_no,previous_amt,money_in,money_out,recent_amt,refer,cuses,type,entry_date)
                        			                  VALUES(:UserId,:BankId,:Account,:PreAmt,0,:SavingAmt,:RecAmt,:Refer, "Withdraw", 4, :Date)');
													  
			$stmt->bindParam(':UserId',$UserId);
			$stmt->bindParam(':BankId',$BankId);
			$stmt->bindParam(':Account',$Account);
			$stmt->bindParam(':PreAmt',$PreAmt);
			$stmt->bindParam(':SavingAmt',$SavingAmt);
			$stmt->bindParam(':RecAmt',$RecAmt);
			$stmt->bindParam(':Refer',$Refer);
			$stmt->bindParam(':Date',$Date);
			
			if($stmt->execute())
			{
				?>
                <script>
				alert(' Amount Withdraw Successful ..!');
				window.location.href='bank_money.php';
				</script>
                <?php
				
				// $successMSG = "New Saving Amount Add Successful ";
				
				//header("refresh:5;index.php"); // redirects image view page after 5 seconds.
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
		$BankId = $_POST['BankId'];		
		$PreAmt = $_POST['PreAmt'];		
		$SavingAmt = $_POST['SavingAmt'];		
		$RecAmt = $_POST['RecAmt'];		
		$Refer = $_POST['Refer'];		
		$Date = $_POST['Date'];
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('UPDATE bank_money
									    SET  previous_amt=:PreAmt,
										     today_amt=:SavingAmt, 
										     recent_amt=:RecAmt,
											 refer=:Refer,
											 cuses="Withdraw",
											 
											  last_update=:Date    
											 
								       WHERE bank_id=:BankId ');
			
			$stmt->bindParam(':BankId',$BankId);
			$stmt->bindParam(':PreAmt',$PreAmt);
			$stmt->bindParam(':SavingAmt',$SavingAmt);
			$stmt->bindParam(':RecAmt',$RecAmt);
			$stmt->bindParam(':Refer',$Refer);
			$stmt->bindParam(':Date',$Date);
				
			if($stmt->execute()){
				?>
                <script>
				alert(' Money Withdraw Sucessfull');
				window.location.href='bank_money.php';
				</script>
                <?php
			}
			else{
				$errMSG = "Sorry Data Could Not Updated !";
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
<center><h4><ol class="breadcrumb"> <li class="active">Money Withdraw </li></ol></h4></center>
<?php require_once 'more-fals/bank-option-link.php'; ?>

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
	
    <tr>
    	
		<?php 
				   $pq=mysqli_query($con,"select * from stuff left join `user` on user.userid=stuff.userid where stuff.userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
        
        <input class="form-control" type="hidden" name="UserId"  value="<?php echo $pqrow['userid']; ?>" />
		<?php }?>
    </tr>
	
	<tr>
    	<td><label class="control-label">Bank</label> 
        <td>  <select style="width:100%;" class="form-control" name="BankId" id="BankId" required=""/>
		<option value="#">Select Bank</option>
				      	<?php 
				      	$sql = "SELECT distinct id,name FROM bank_name order by id asc  ";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} // while
				      	?>
		</select> 

		</td>
		
    </tr>
	
	<tr>
    	<td><label class="control-label">Bank Name</label></td>
        <td><input class="form-control" type="text" id="BankName" name="BankName" placeholder="Bank Name"  disabled="true" />
     
    </tr>
	
	<tr>
    	<td><label class="control-label"> Account No.</label></td>
        <td><input class="form-control" type="text" id="Account" name="Account" placeholder=" Account No." value="<?php echo $Account; ?>"  /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Previous Deposit</label></td>
        <td><input class="form-control" type="text" id="PreAmt1" name="PreAmt1" placeholder="Previous Deposit" value="<?php echo $PreAmt; ?>" oninput="myFunctionAmt()" disabled="true"  />
            <input class="form-control" type="hidden" id="PreAmt" name="PreAmt" placeholder="Previous Deposit" value="<?php echo $PreAmt; ?>" oninput="myFunctionAmt()"  /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Today Withdraw</label></td>
        <td><input class="form-control" type="text" id="SavingAmt" name="SavingAmt" placeholder="Today Withdraw" value="<?php echo $SavingAmt; ?>" oninput="myFunctionAmt()" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Current Deposit</label></td>
        <td><input class="form-control" type="text" id="RecAmt1" name="RecAmt1" placeholder="Current Deposit" value="<?php echo $RecAmt; ?>" oninput="myFunctionAmt()" disabled="true" > 
         <input class="form-control" type="hidden" id="RecAmt" name="RecAmt" placeholder="Current Deposit" value="<?php echo $RecAmt; ?>" oninput="myFunctionAmt()" /></td>
    </tr>
	
		<script>
  function myFunctionAmt() {
    var x = Number (document.getElementById("PreAmt").value);
    var y = Number (document.getElementById("SavingAmt").value);
    var z = Number (x - y);
   
    document.getElementById("RecAmt1").value = z;
    document.getElementById("RecAmt").value = z;
  
	                  }
  </script>
	
  <tr>
    	<td><label class="control-label">Reference</label></td>
        <td><input class="form-control" type="text" id="Refer" name="Refer" placeholder="Reference" value="Own"  /></td>
    </tr>
	
   <tr>
    	<td><label class="control-label"> Date </label></td>
        <td><input class="form-control" type="text" name="Date" placeholder="Date" value="<?php date_default_timezone_set("Asia/Dhaka"); echo date("Y/m/d") ;?>" /></td>
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


<script>
	$("#BankId").on("change", function(){
		
		var BankId = $("#BankId").val();
		if(BankId == "")
		{
			alert("Please enter a valid customer ID!");
		}
		else{
			$.ajax({url: "ajax_c_load_bank_money.php?c=" + BankId, success: function(result){
				var customer = JSON.parse(result);
				$("#BankName").val(customer.customerName);
				$("#Account").val(customer.AccNo);
				$("#PreAmt1").val(customer.RecentAmt);
				$("#PreAmt").val(customer.RecentAmt);
				
				
			}});
		}
	});
</script>




