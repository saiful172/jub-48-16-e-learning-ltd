
<?php require_once 'header.php'; ?>

<?php 
$sql = $con->query("select * from color_inv where user_id ='".$_SESSION['id']."' ");
$row = $sql->fetch_assoc();
$ColrId =$row['id'];
$Whole =$row['whole'];
$table_head =$row['table_head']; 
$table_body =$row['table_body']; 
?> 

<?php
	
	
	if(isset($_POST['btn_save_updates']))
	{
		
		$Id = $_POST['Id']; 
		$TblHead = $_POST['TblHead']; 
		$TblBody = $_POST['TblBody']; 
		$Others = $_POST['Others'];  
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('UPDATE color_inv 
									     SET  table_head=:TblHead,  
									          table_body=:TblBody,  
									          whole=:Others 
										      
								       WHERE  id = :Id');
			
		
			
			
			$stmt->bindParam(':Id',$Id); 
			$stmt->bindParam(':TblHead',$TblHead); 
			$stmt->bindParam(':TblBody',$TblBody); 
			$stmt->bindParam(':Others',$Others); 
			 
			
			if($stmt->execute()){
				?>
                <script>
				alert('Update Successful...');
				window.location.href='color-inv';
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
 
</head>
<body>


<center><h4><ol class="breadcrumb"> <li class="active">Payment Status Update </li></ol></h4></center>

<div class="container"> 
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
   
    
	<table class="table table-responsive">
	
   <tr style="display:none;">
    	<td><label class="control-label"> Id </label></td>
        <td><input class="form-control" type="text" name="Id" value="<?php echo $ColrId ; ?>" required></td>
    </tr>
	
	<tr>
    	<td><label class="control-label"> Invoice Head </label></td>
        <td><input class="form-control" type="color" name="TblHead" value="<?php echo $table_head ; ?>" required></td>
    </tr>
	
	<tr>
    	<td><label class="control-label"> Invoice Body </label></td>
        <td><input class="form-control" type="color" name="TblBody" value="<?php echo $table_body ; ?>" required></td>
    </tr>
	
	<tr>
    	<td><label class="control-label"> Others </label></td>
        <td><input class="form-control" type="color" name="Others" value="<?php echo $Whole ; ?>" required></td>
    </tr>

	   
     <tr><td></td><td></td></tr>
    
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


<?php include('../includes/footer.php');?>