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
				window.location.href='bank-account';
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


<?php  require_once 'sidebar.php'; ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Bank Money |  <span> <a href="bank-account">    <i class="bi bi-table"></i> </a> </span> </h1>
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
        
        <input class="form-control" type="hidden" name="UserId"  value="130" />
		<?php }?>
    </tr>
	
	<tr>
    	<td><label class="control-label">Bank Name</label></td>
       	<td><select style="width:100%;" class="form-select" name="BankId" id="BankId" required=""/>
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