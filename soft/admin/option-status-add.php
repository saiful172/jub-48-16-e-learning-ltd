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
		$Marketing = $_POST['Marketing'];
		$SrvChrg = $_POST['SrvChrg'];
		$Quotation = $_POST['Quotation'];
		$Expense = $_POST['Expense'];
		$Task = $_POST['Task'];
		$CashReport = $_POST['CashReport'];
		
		$InvCol = $_POST['InvCol'];
		$HrAcc = $_POST['HrAcc'];
		$AdvSal = $_POST['AdvSal'];
		$CurServ = $_POST['CurServ'];
		$Project = $_POST['Project'];
		$Bank = $_POST['Bank'];
		$Agent = $_POST['Agent'];
		$InvDetails = $_POST['InvDetails'];
		$Barcode = $_POST['Barcode'];
		
		
		
		if(empty($Marketing)){
			$errMSG = "Please Enter Marketing.";
		}
		  
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO option_status (user_id,mar_type,sev_charg,quot_type,exp_type,daily_task,daily_cash,inv_color,hr_acc,adv_salary,courier_service,project,bank,agent_b,inv_detail,inv_qr_code,status)
                                                			VALUES(:UserId,:Marketing,:SrvChrg,:Quotation,:Expense,:Task,:CashReport,:InvCol,:HrAcc,:AdvSal,:CurServ,:Project,:Bank,:Agent,:InvDetails,:Barcode,1)');
			
			
			$stmt->bindParam(':UserId',$UserId);
			$stmt->bindParam(':Marketing',$Marketing);
			$stmt->bindParam(':SrvChrg',$SrvChrg);
			$stmt->bindParam(':Quotation',$Quotation);
			$stmt->bindParam(':Expense',$Expense);
			$stmt->bindParam(':Task',$Task);
			$stmt->bindParam(':CashReport',$CashReport);
			
			$stmt->bindParam(':InvCol',$InvCol);
			$stmt->bindParam(':HrAcc',$HrAcc);
			$stmt->bindParam(':AdvSal',$AdvSal);
			$stmt->bindParam(':CurServ',$CurServ);
			$stmt->bindParam(':Project',$Project);
			$stmt->bindParam(':Bank',$Bank);
			$stmt->bindParam(':Agent',$Agent);
			$stmt->bindParam(':InvDetails',$InvDetails);
			$stmt->bindParam(':Barcode',$Barcode);
			
			
			if($stmt->execute())
			{
				?>
              <script>
				alert('Data Successfully Add ...');
				window.location.href='option-status';
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

<?php  require_once 'sidebar.php'; ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Access - Status Add | <span> <a href="option-status"> <i class="bi bi-table"></i> </a> </span> </h1>
       <hr>
    </div> 

    <section class="section">
      <div class="row">
	  
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">

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
        
        <input class="form-select" type="hidden" name="UserId11"  value="<?php echo $pqrow['userid']; ?>" />
		<?php }?>
    </tr>
	
  <tr>
    	<td><label class="control-label">Select Client</label></td>
       	<td><select  class="form-select chosen-select" name="UserId" id="UserId"/>
		<option value="#">Select User</option>
				      	<?php 
				      	$sql = "SELECT  userid,business_name FROM stuff where status=1 order by userid desc ";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} // while
								
				      	?>
		</select> </td>       
	</tr>	
	
	<tr>
    	<td><label class="control-label">Marketing Option</label></td>
       	<td>
		<select  class="form-select" name="Marketing" /> 
		<option value="Yes">Yes</option> 
		<option value="d-none">D-None</option>
		</select>
		</td>       
	</tr>
	
	<tr>
    	<td><label class="control-label">Service Charge</label></td>
       	<td>
		<select  class="form-select" name="SrvChrg" /> 
		<option value="Yes">Yes</option> 
		<option value="d-none">D-None</option>
		</select>
		</td>       
	</tr>
	
	<tr>
    	<td><label class="control-label">Quotation Option</label></td>
       	<td>
		<select  class="form-select" name="Quotation" /> 
		<option value="Yes">Yes</option> 
		<option value="d-none">D-None</option>
		</select>
		</td>       
	</tr>
	
	
	<tr>
    	<td><label class="control-label">Expense Option</label></td>
       	<td>
		<select  class="form-select" name="Expense" /> 
		<option value="Yes">Yes</option> 
		<option value="d-none">D-None</option>
		</select>
		</td>       
	</tr>
	
	
	<tr>
    	<td><label class="control-label">Task Option</label></td>
       	<td>
		<select  class="form-select" name="Task" /> 
		<option value="Yes">Yes</option> 
		<option value="d-none">D-None</option>
		</select>
		</td>       
	</tr>
	
	<tr>
    	<td><label class="control-label">Daily Cash Report</label></td>
       	<td>
		<select  class="form-select" name="CashReport" /> 
		<option value="Yes">Yes</option> 
		<option value="d-none">D-None</option>
		</select>
		</td>       
	</tr>
	
	<tr>
    	<td><label class="control-label">Invoice Color</label></td>
       	<td>
		<select  class="form-select" name="InvCol" /> 
		<option value="Yes">Yes</option> 
		<option value="d-none">D-None</option>
		</select>
		</td>       
	</tr>
	
	<tr>
    	<td><label class="control-label">HR / ACC </label></td>
       	<td>
		<select  class="form-select" name="HrAcc" /> 
		<option value="Yes">Yes</option> 
		<option value="d-none">D-None</option>
		</select>
		</td>       
	</tr>
	
	<tr>
    	<td><label class="control-label">Adv Salary </label></td>
       	<td>
		<select  class="form-select" name="AdvSal" /> 
		<option value="Yes">Yes</option> 
		<option value="d-none">D-None</option>
		</select>
		</td>       
	</tr>
	
	<tr>
    	<td><label class="control-label">Courier service </label></td>
       	<td>
		<select  class="form-select" name="CurServ" /> 
		<option value="Yes">Yes</option> 
		<option value="d-none">D-None</option>
		</select>
		</td>       
	</tr>
	
	
	<tr>
    	<td><label class="control-label">Project </label></td>
       	<td>
		<select  class="form-select" name="Project" /> 
		<option value="Yes">Yes</option> 
		<option value="d-none">D-None</option>
		</select>
		</td>       
	</tr>
	
	<tr>
    	<td><label class="control-label">Banking </label></td>
       	<td>
		<select  class="form-select" name="Bank" /> 
		<option value="Yes">Yes</option> 
		<option value="d-none">D-None</option>
		</select>
		</td>       
	</tr>
	
	<tr>
    	<td><label class="control-label">Agent Banking </label></td>
       	<td>
		<select  class="form-select" name="Agent" /> 
		<option value="Yes">Yes</option> 
		<option value="d-none">D-None</option>
		</select>
		</td>       
	</tr>
	
	<tr>
    	<td><label class="control-label">Invoice Details </label></td>
       	<td>
		<select  class="form-select" name="InvDetails" /> 
		<option value="Yes">Yes</option> 
		<option value="d-none">D-None</option>
		</select>
		</td>       
	</tr>
	
	<tr>
    	<td><label class="control-label">Invoice Barcode </label></td>
       	<td>
		<select  class="form-select" name="Barcode" /> 
		<option value="Yes">Yes</option> 
		<option value="d-none">D-None</option>
		</select>
		</td>       
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
      </div>
	  
	  <?php include('../includes/footer.php');?>
	  
    </section>

  </main>
  




  <?php  require_once 'footer1.php'; ?>