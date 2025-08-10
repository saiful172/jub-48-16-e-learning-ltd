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
		$UserId = $_POST['UserId'];		
		$BankId = $_POST['BankId'];		
		$Account = $_POST['Account'];		
		$PreAmt = $_POST['PreAmt'];		
		$SavingAmt = $_POST['SavingAmt'];		
		$RecAmt = $_POST['RecAmt'];		
		$Refer = $_POST['Refer'];		
		$Date = $_POST['Date'];
				
		if(empty($SavingAmt)){
			$errMSG = "Please Enter Saving Amt.";
		}
				
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
								
			$stmt = $DB_con->prepare('INSERT INTO bank_money_history (user_id,bank_id,account_no,previous_amt,money_in,money_out,recent_amt,refer,cuses,type,entry_date)
                        			                  VALUES(:UserId,:BankId,:Account,:PreAmt,:SavingAmt,0,:RecAmt,:Refer, "Deposit", 3, :Date)');
													  
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
				alert('Saving Amount Add Successful ..!');
				window.location.href='bank-account';
				</script>
                <?php
				
				//$successMSG = "New Saving Amount Add Succesfull .....";
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
											 cuses="Deposit",
											 
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
				alert('Money Deposit Sucesssfull');
				window.location.href='bank-account';
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
      <h1> Money Deposit |  <span> <a href="bank-account">    <i class="bi bi-table"></i> </a> </span> </h1>
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
			  
<form method="post" enctype="multipart/form-data" class="form-horizontal" >
	    
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
    	<td><label class="control-label">Bank</label></td>
        <td>  <select class="control-select" style="width:100%;" name="BankId" id="BankId" required=""/>
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
    	<td><label class="control-label"> A/C No. </label></td>
        <td><input class="form-control" type="text" id="Account" name="Account" placeholder="Account No." value="<?php echo $Account; ?>"  /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Prev. Deposit</label></td>
        <td><input class="form-control" type="text" id="PreAmt1" name="PreAmt1" placeholder="Previous Deposit" value="<?php echo $PreAmt; ?>" oninput="myFunctionAmt()" disabled="true"  />
         <input class="form-control" type="hidden" id="PreAmt" name="PreAmt" placeholder="Previous Deposit " value="<?php echo $PreAmt; ?>" oninput="myFunctionAmt()"  /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Today Deposit </label></td>
        <td><input class="form-control" type="text" id="SavingAmt" name="SavingAmt" placeholder="Today Deposit" value="<?php echo $SavingAmt; ?>" oninput="myFunctionAmt()" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Present Deposit</label></td>
        <td><input class="form-control" type="text" id="RecAmt1" name="RecAmt1" placeholder="Present Deposit" value="<?php echo $RecAmt; ?>" oninput="myFunctionAmt()" disabled="true" > 
         <input class="form-control" type="hidden" id="RecAmt" name="RecAmt" placeholder="Present Deposit" value="<?php echo $RecAmt; ?>" oninput="myFunctionAmt()" /></td>
    </tr>
	
 <script>
  function myFunctionAmt() {
    var x = Number (document.getElementById("PreAmt").value);
    var y = Number (document.getElementById("SavingAmt").value);
    var z = Number (x + y);
   
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
        <td><input class="form-control" type="text" name="Date" placeholder="Date" value="<?php echo date("Y/m/d") ;?>" /></td>
    </tr>

	
		
	     
    </table>
	
	
    <tr>
        <td colspan="2"><button type="submit" name="btnsave" class="btn btn-primary">
        <span class="glyphicon glyphicon-save"></span> &nbsp; Save
        </button>
        </td>
    </tr>
    
    
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