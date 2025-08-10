
<?php require_once 'header.php'; ?>

<?php 
	if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
	{
		$id = $_GET['edit_id'];
		$stmt_edit = $DB_con->prepare('SELECT * FROM prjct_expense 
		left join project_exp_cat on project_exp_cat.of_id=prjct_expense.exp_cat
		left join prjct_name on prjct_name.pj_id=prjct_expense.prj_name
		WHERE prjct_expense.prj_id =:uid');
		$stmt_edit->execute(array(':uid'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: Project-Expense");
	}
	
	
	
	if(isset($_POST['btn_save_updates']))
	{
		
		$PrjName = $_POST['PrjName'];
		$ExpCat = $_POST['ExpCat'];
		$PrjDetails = $_POST['PrjDetails'];
		$Qty = $_POST['Qty'];
		$KG = $_POST['KG'];
		$Litre = $_POST['Litre'];
		$Other = $_POST['Other'];
		$CostPrice = $_POST['CostPrice'];
		$PymTyp = $_POST['PymTyp'];
		$Refer = $_POST['Refer'];
		$Date = $_POST['Date'];
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('UPDATE prjct_expense 
									     SET prj_name=:PrjName, 
										     exp_cat=:ExpCat, 
										     prj_details=:PrjDetails, 
										     qty=:Qty, 
										     kg=:KG, 
										     litre=:Litre,
										     other=:Other,
										     cost_price=:CostPrice,
										     pym_type=:PymTyp,
										     reference=:Refer,
										     entry_date=:Date 
											 
								       WHERE  prj_id = :uid');
			
		
			
			
			$stmt->bindParam(':PrjName',$PrjName);
			$stmt->bindParam(':ExpCat',$ExpCat);
			$stmt->bindParam(':PrjDetails',$PrjDetails);
			$stmt->bindParam(':Qty',$Qty);
			$stmt->bindParam(':KG',$KG);
			$stmt->bindParam(':Litre',$Litre);
			$stmt->bindParam(':Other',$Other);
			$stmt->bindParam(':CostPrice',$CostPrice);
			$stmt->bindParam(':PymTyp',$PymTyp);
			$stmt->bindParam(':Refer',$Refer);
			$stmt->bindParam(':Date',$Date);
			
			$stmt->bindParam(':uid',$id);
			
			if($stmt->execute()){
				?>
                <script>
				alert('Update Successful...');
				window.location.href='Project-Expense';
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
<title>Expense </title>
<!-- custom stylesheet -->
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="css/buttons.css">
</head>
<body>

<center><h4><ol class="breadcrumb"> <li class="active">Project Expense Edit </li></ol></h4></center>
<?php require_once 'more-fals/project-link-btn.php'; ?> 

<div class="col-md-7"> 

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
    	<td><label class="control-label">Project Name </label>  </td>
        <td> 
		<select style="width:100%;" class="form-control chosen-select" Id="PrjName" name="PrjName" required="" >
		<option value="<?php echo $prj_name; ?>"><?php echo $pj_name; ?></option>
		
				      	<?php 
				      	$sql = "SELECT pj_id,pj_name FROM prjct_name where user_id='".$_SESSION['id']."'";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} 
				      	?>
	   </select> 
     </tr>
	
	 <tr>
    	<td><label class="control-label">Expense Category </label>  </td>
        <td> 
		<select style="width:100%;" class="form-control chosen-select" Id="ExpCat" name="ExpCat" required="" >
		<option value="<?php echo $exp_cat; ?>"><?php echo $name; ?></option>
		
				      	<?php 
				      	$sql = "SELECT of_id,name FROM project_exp_cat where  user_id='".$_SESSION['id']."'";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} 
				      	?>
	   </select> 
     </tr>	
	
	
	<tr>
    	<td><label class="control-label">Project Details</label></td>
		<td><input class="form-control" type="text" name="PrjDetails" placeholder="Project Details" value="<?php echo $prj_details; ?>"></td>
    </tr>
	
	
	<tr>
    	<td><label class="control-label">Quantity</label></td>
		<td><input class="form-control" type="text" name="Qty" placeholder="Quantity" value="<?php echo $qty; ?>"></td>
    </tr>
	
		
	<tr>
    	<td><label class="control-label">KG</label></td>
        <td><input class="form-control" type="text" name="KG" value="<?php echo $kg; ?>" ></td>
    </tr>
	
	
	<tr>
    	<td><label class="control-label">Litre</label></td>
        <td><input class="form-control" type="text" name="Litre" value="<?php echo $litre; ?>" ></td>
    </tr>
	
	
	<tr>
    	<td><label class="control-label">other</label></td>
        <td><input class="form-control" type="text" name="Other"  value="<?php echo $other; ?>" ></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Cost Price</label></td>
        <td><input class="form-control" type="text" name="CostPrice" value="<?php echo $cost_price; ?>" ></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Payment Type</label></td>
        <td><input class="form-control" type="text" name="PymTyp"  value="<?php echo $pym_type; ?>" ></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Reference </label></td>
		<td><input class="form-control" type="text" name="Refer"  value="<?php echo $reference; ?>" ></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Date </label></td>
		<td><input class="form-control" type="text" name="Date" placeholder="" value="<?php echo $entry_date ;?>" ></td>
    </tr>
    
	 <tr><td></td><td></td></tr>
    
    </table>
	
	<tr>
        <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-primary">
        <span class="glyphicon glyphicon-save"></span> Update
        </button>
        
        <a class="btn btn-danger" href="Project-Expense"> <span class="glyphicon glyphicon-backward"></span> Cancel </a>
        
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