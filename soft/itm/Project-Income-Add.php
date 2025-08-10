<?php require_once 'header.php'; ?>
<?php
 
	if(isset($_POST['btnsave']))
	{
		
		$UserId = $_POST['UserId'];
		$PrjName = $_POST['PrjName'];
		$InCat = $_POST['InCat'];
		$PrjDetails = $_POST['PrjDetails'];
		$Qty = $_POST['Qty'];
		$KG = $_POST['KG'];
		$Litre = $_POST['Litre'];
		$Other = $_POST['Other'];
		$CostPrice = $_POST['CostPrice'];
		$PymTyp = $_POST['PymTyp'];
		$Refer = $_POST['Refer'];
		$Date = $_POST['Date'];
		
		
		if(empty($PrjName)){
			$errMSG = "Please Enter Project  Name.";
		}
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO prjct_income (user_id,prj_name,inc_cat,prj_details,qty,kg,litre,other,cost_price,pym_type,reference,entry_date,status)
			                                             VALUES(:UserId,:PrjName,:InCat,:PrjDetails,:Qty,:KG,:Litre,:Other,:CostPrice,:PymTyp,:Refer,:Date,1)');
			
			
			$stmt->bindParam(':UserId',$UserId);
			$stmt->bindParam(':PrjName',$PrjName);
			$stmt->bindParam(':InCat',$InCat);
			$stmt->bindParam(':PrjDetails',$PrjDetails);
			$stmt->bindParam(':Qty',$Qty);
			$stmt->bindParam(':KG',$KG);
			$stmt->bindParam(':Litre',$Litre);
			$stmt->bindParam(':Other',$Other);
			$stmt->bindParam(':CostPrice',$CostPrice);
			$stmt->bindParam(':PymTyp',$PymTyp);
			$stmt->bindParam(':Refer',$Refer);
			$stmt->bindParam(':Date',$Date);
			
			if($stmt->execute())
			{
				?>
              <script>
				alert('Data Successfully Add ...');
				window.location.href='Project-Income';
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

<center><h4><ol class="breadcrumb"> <li class="active">Project Income Add  </li></ol></h4></center>	
<?php require_once 'more-fals/project-link-btn.php'; ?> 
 
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
		 
    	<td><label class="control-label">Project Name </label>  </td>
        <td> 
		<select style="width:100%;" class="form-control chosen-select" Id="PrjName" name="PrjName" required="" >
		<option value="#">Select Name</option>
		
				      	<?php 
				      	$sql = "SELECT pj_id,pj_name FROM prjct_name where  user_id='".$_SESSION['id']."'";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} 
				      	?>
	   </select>  
     </tr>
	 
	 <tr>
    	<td><label class="control-label">Income Category </label>  </td>
        <td> 
		<select style="width:100%;" class="form-control chosen-select" Id="InCat" name="InCat" required="" >
		<option value="#">Select Name</option>
		
				      	<?php 
				      	$sql = "SELECT of_id,name FROM project_incom_cat where  user_id='".$_SESSION['id']."'";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} 
				      	?>
	   </select> 
     </tr>
	
	
	
	<tr>
    	<td><label class="control-label">Project Details</label></td>
		<td><input class="form-control" type="text" name="PrjDetails" placeholder="Expense Details" value="Na"></td>
    </tr>
	
	<tr>
    	<td><label class="control-label"> Quantity </label></td>
		<td><input class="form-control" type="text" name="Qty" placeholder="Quantity" value="<?php echo $Qty; ?>"></td>
    </tr>
	
		
	<tr>
    	<td><label class="control-label">KG </label></td>
        <td><input class="form-control" type="text" name="KG" placeholder="KG" value="<?php echo $KG; ?>" ></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Litre </label></td>
        <td><input class="form-control" type="text" name="Litre" placeholder="Litre" value="<?php echo $Litre; ?>" ></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Other </label></td>
        <td><input class="form-control" type="text" name="Other" placeholder="Other" value="<?php echo $Other; ?>" ></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Cost Price </label></td>
        <td><input class="form-control" type="text" name="CostPrice" placeholder="Cost Price" value="<?php echo $CostPrice; ?>" ></td>
    </tr>
	
	
	<tr>
    	<td><label class="control-label">Payment Type </label></td>
        <td><input class="form-control" type="text" name="PymTyp" placeholder="Payment Type" value="<?php echo $PymTyp; ?>" ></td>
    </tr>
	
		
	<tr>
    	<td><label class="control-label">Reference </label></td>
		<td><input class="form-control" type="text" name="Refer" placeholder="Reference" value="<?php echo $Refer; ?>" ></td>
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



