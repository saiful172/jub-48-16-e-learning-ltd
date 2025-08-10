<!DOCTYPE html>
<html lang="en"> 

<head>
<?php   require_once 'head_link.php'; ?>

</head>

<body>
 
<?php   require_once 'header1.php'; ?> 

<?php
	 
	
	if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
	{
		$id = $_GET['edit_id'];
		$stmt_edit = $DB_con->prepare('SELECT * FROM option_status WHERE id =:uid');
		$stmt_edit->execute(array(':uid'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: option-status");
	}
	
	
	
	if(isset($_POST['btn_save_updates']))
	{
		
		$Marketing = $_POST['Marketing']; 
		$Quotation = $_POST['Quotation']; 
		$SrvChrg = $_POST['SrvChrg']; 
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
		
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('UPDATE option_status 
									     SET  mar_type=:Marketing,  
									          sev_charg=:SrvChrg,  
									          quot_type=:Quotation,  
									          exp_type=:Expense,  
									          daily_task=:Task,  
									          daily_cash=:CashReport,
									          inv_color=:InvCol , 
									          hr_acc=:HrAcc , 
									          adv_salary=:AdvSal, 
									          courier_service=:CurServ, 
									          project=:Project, 
									          bank=:Bank ,
									          agent_b=:Agent ,
									          inv_detail=:InvDetails,
									          inv_qr_code=:Barcode 
										      
								       WHERE  id = :uid');
			
		
			
			
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
			
			$stmt->bindParam(':uid',$id);
			
			if($stmt->execute()){
				?>
                <script>
				alert(' Update Successful...');
				window.location.href='option-status';
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
      <h1>Access - Status Edit | <span> <a href="option-status"> <i class="bi bi-table"></i> </a> </span> </h1>
       <hr>
    </div> 

    <section class="section">
      <div class="row">
	  
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">

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
   
    
	<table class="table table-hover table-responsive">
	
	<tr>
    	<td><label class="control-label">Marketing Option</label></td>
       	<td>
		<select  class="form-control" name="Marketing" />
		<option value="<?php echo $mar_type; ?>"><?php echo $mar_type; ?></option> 
		<option value="Yes">Yes</option> 
		<option value="d-none">D-None</option>
		</select>
		</td>       
	</tr>
	
	<tr>
    	<td><label class="control-label">Service Charge</label></td>
       	<td>
		<select  class="form-control" name="SrvChrg" /> 
		<option value="<?php echo $sev_charg; ?>"><?php echo $sev_charg; ?></option>
		<option value="Yes">Yes</option> 
		<option value="d-none">D-None</option>
		</select>
		</td>       
	</tr>
	
	<tr>
    	<td><label class="control-label">Quotation Option</label></td>
       	<td>
		<select  class="form-control" name="Quotation" />
		<option value="<?php echo $quot_type; ?>"><?php echo $quot_type; ?></option> 
		<option value="Yes">Yes</option> 
		<option value="d-none">D-None</option>
		</select>
		</td>       
	</tr>
	
	<tr>
    	<td><label class="control-label">Expense Option</label></td>
       	<td>
		<select  class="form-control" name="Expense" /> 
		<option value="<?php echo $exp_type; ?>"><?php echo $exp_type; ?></option> 
		<option value="Yes">Yes</option> 
		<option value="d-none">D-None</option>
		</select>
		</td>       
	</tr>
	
	
	<tr>
    	<td><label class="control-label">Task Option</label></td>
       	<td>
		<select  class="form-control" name="Task" /> 
		<option value="<?php echo $daily_task; ?>"><?php echo $daily_task; ?></option> 
		<option value="Yes">Yes</option> 
		<option value="d-none">D-None</option>
		</select>
		</td>       
	</tr>
	
	<tr>
    	<td><label class="control-label">Daily Cash Report</label></td>
       	<td>
		<select  class="form-control" name="CashReport" /> 
		<option value="<?php echo $daily_cash; ?>"><?php echo $daily_cash; ?></option> 
		<option value="Yes">Yes</option> 
		<option value="d-none">D-None</option>
		</select>
		</td>       
	</tr>
	
	<tr>
    	<td><label class="control-label">Invoice Color</label></td>
       	<td>
		<select  class="form-control" name="InvCol" /> 
		<option value="<?php echo $inv_color; ?>"><?php echo $inv_color; ?></option> 
		<option value="Yes">Yes</option> 
		<option value="d-none">D-None</option>
		</select>
		</td>       
	</tr>
	
	<tr>
    	<td><label class="control-label">HR / ACC </label></td>
       	<td>
		<select  class="form-control" name="HrAcc" /> 
		<option value="<?php echo $hr_acc; ?>"><?php echo $hr_acc; ?></option> 
		<option value="Yes">Yes</option> 
		<option value="d-none">D-None</option>
		</select>
		</td>       
	</tr>
	
	<tr>
    	<td><label class="control-label">Adv Salary </label></td>
       	<td>
		<select  class="form-control" name="AdvSal" /> 
		<option value="<?php echo $adv_salary; ?>"><?php echo $adv_salary; ?></option> 
		<option value="Yes">Yes</option> 
		<option value="d-none">D-None</option>
		</select>
		</td>       
	</tr>
	
	<tr>
    	<td><label class="control-label">Courier service </label></td>
       	<td>
		<select  class="form-control" name="CurServ" /> 
		<option value="<?php echo $courier_service; ?>"><?php echo $courier_service; ?></option> 
		<option value="Yes">Yes</option> 
		<option value="d-none">D-None</option>
		</select>
		</td>       
	</tr>
	
	<tr>
    	<td><label class="control-label">Project </label></td>
       	<td>
		<select  class="form-control" name="Project" /> 
		<option value="<?php echo $project; ?>"><?php echo $project; ?></option> 
		<option value="Yes">Yes</option> 
		<option value="d-none">D-None</option>
		</select>
		</td>       
	</tr>
	
	<tr>
    	<td><label class="control-label">Banking </label></td>
       	<td>
		<select  class="form-control" name="Bank" /> 
		<option value="<?php echo $bank; ?>"><?php echo $bank; ?></option> 
		<option value="Yes">Yes</option> 
		<option value="d-none">D-None</option>
		</select>
		</td>       
	</tr>
	
	<tr>
    	<td><label class="control-label">Agent Banking </label></td>
       	<td>
		<select  class="form-control" name="Agent" /> 
		<option value="<?php echo $agent_b; ?>"><?php echo $agent_b; ?></option> 
		<option value="Yes">Yes</option> 
		<option value="d-none">D-None</option>
		</select>
		</td>       
	</tr>
	
	<tr>
    	<td><label class="control-label">Invoice Details </label></td>
       	<td>
		<select  class="form-control" name="InvDetails" /> 
		<option value="<?php echo $inv_detail; ?>"><?php echo $inv_detail; ?></option> 
		<option value="Yes">Yes</option> 
		<option value="d-none">D-None</option>
		</select>
		</td>       
	</tr>
	
	<tr>
    	<td><label class="control-label">Invoice Barcode </label></td>
       	<td>
		<select  class="form-control" name="Barcode" /> 
		<option value="<?php echo $inv_qr_code; ?>"><?php echo $inv_qr_code; ?></option> 
		<option value="Yes">Yes</option> 
		<option value="d-none">D-None</option>
		</select>
		</td>       
	</tr>
	 
    
    </table>
	
	<tr>
        <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-primary">
        <span class="glyphicon glyphicon-save"></span> Update
        </button>
        
        <a class="btn btn-danger" href="option-status"> <span class="glyphicon glyphicon-backward"></span> Cancel </a>
        
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