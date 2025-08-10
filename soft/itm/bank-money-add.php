<?php require_once 'header.php'; ?> 

<?php 
	
	if(isset($_POST['btnsave']))
	{
		$UserId = $_POST['UserId'];	
		$BankId = $_POST['BankId'];		
		$Account = $_POST['Account'];		
		$Amount = $_POST['Amount'];		
		$Refer = $_POST['Refer'];		
		$Date = $_POST['Date'];
				
		if(empty($Amount)){
			$errMSG = "Please Enter Amount.";
		}

		if (isset($_POST['BankId']) && $_POST['BankId'] != '') {
		$BankId = $_POST['BankId'];
		$checkQuery = mysqli_query($con, "SELECT bank_id FROM `bank_money` WHERE  `bank_id`='$BankId' ");
		if (mysqli_num_rows($checkQuery) > 0) {
		$errMSG = "This Bank Already Exist !";
		}else{
			
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO bank_money (user_id,bank_id,account_no,previous_amt,today_amt,recent_amt,refer,cuses,entry_date,last_update)
                        			                  VALUES(:UserId,:BankId,:Account,0,:Amount,:Amount,:Refer,"New Saving", :Date,:Date)');
				
			$stmt->bindParam(':UserId',$UserId);
			$stmt->bindParam(':BankId',$BankId);
			$stmt->bindParam(':Account',$Account);
			$stmt->bindParam(':Amount',$Amount);
			$stmt->bindParam(':Refer',$Refer);
			$stmt->bindParam(':Date',$Date);
			
			if($stmt->execute())
			{
			
			?>
                <script>
				alert('New Money Add Successful..!');
				window.location.href='bank_money.php';
				</script>
                <?php
				
			//	$successMSG = " New Money Add Successful";
				//header("refresh:5;index.php"); // redirects image view page after 5 seconds.
			}
			else
			{
				$errMSG = "error while inserting....";
			}
		}
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
 
<center><h4><ol class="breadcrumb"> <li class="active">Bank Money</li></ol></h4></center>
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
	    
	<table class="table      table-hover table-responsive">
	
    <tr>
    	
		<?php 
				   $pq=mysqli_query($con,"select * from stuff left join `user` on user.userid=stuff.userid where stuff.userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
        
        <input class="form-control" type="hidden" name="UserId"  value="130" />
		<?php }?>
    </tr>
	
	<tr>
    	<td><label class="control-label">Bank Name</label></td>
       	<td><select style="width:100%;" class="form-control" name="BankId" id="BankId" required=""/>
		<option value="#">Select Bank</option>
				      	<?php 
				      	$sql = "SELECT distinct id,name  FROM bank_name  ";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} // while
				      	?>
		</select> </td>       
	</tr>
	
	<tr>
    	<td><label class="control-label"> A/C No. </label></td>
        <td><input class="form-control" type="text" id="Account" name="Account" placeholder=" Account No." value="<?php echo $Account; ?>"  /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label"> Amount </label></td>
        <td><input class="form-control" type="text" id="Amount" name="Amount" placeholder="Amount " value="<?php echo $Amount; ?>"  /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Reference</label></td>
        <td><input class="form-control" type="text" id="Refer" name="Refer" placeholder="Reference" value="<?php echo $Refer; ?>"  /></td>
    </tr>
	
   <tr>
    	<td><label class="control-label">Date</label></td>
        <td><input class="form-control" type="text" name="Date" placeholder="Date" value="<?php date_default_timezone_set("Asia/Dhaka"); echo date("Y/m/d") ;?>" /></td>
    </tr>
   
    </table>
	<tr>
        <td colspan="2"><button type="submit" name="btnsave" class="btn btn-primary">
        <span class="glyphicon glyphicon-save"></span> &nbsp;Save
        </td>
    </tr>
    
</form>

</div>

<div class="col-md-12">
<?php require_once '../includes/footer.php'; ?> 
</div>

</div>


<script>
	$("#loadMember").on("click", function(){
		
		var CustId = $("#CustId").val();
		if(CustId == "")
		{
			alert("Please enter a valid customer ID!");
		}
		else{
			$.ajax({url: "ajax_c_load.php?c=" + CustId, success: function(result){
				var customer = JSON.parse(result);
				$("#MemName1").val(customer.customerName);
				$("#Address1").val(customer.customerAddress);
				$("#Address").val(customer.customerAddress);
				
				
			}});
		}
	});
</script>




