<?php require_once 'header.php'; ?>
<?php 
	
	if(isset($_POST['btnsave']))
	{
		
		$UserId = $_POST['UserId'];
		$Others = $_POST['Others'];
		$TblHead = $_POST['TblHead']; 
		$TblBody = $_POST['TblBody'];
		
		
		
		if(empty($Others)){
			$errMSG = "Please Enter Others.";
		}
		  
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO color_inv (user_id,whole,table_head,table_body,status)
                                                			VALUES(:UserId,:Others,:TblHead,:TblBody,1)');
			
			
			$stmt->bindParam(':UserId',$UserId);
			$stmt->bindParam(':Others',$Others);
			$stmt->bindParam(':TblHead',$TblHead); 
			$stmt->bindParam(':TblBody',$TblBody);
			
			
			if($stmt->execute())
			{
				?>
              <script>
				alert('Color Add Successfully Done ! ');
				window.location.href='color-inv';
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
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


</head>
<body>


<center><h4><ol class="breadcrumb"> <li class="active">  Access Status Add  </li></ol></h4></center>	

<div class="container">
    	<h1 class="h2"> 
		<a class="btn btn-success" href="color-inv"> <span class="glyphicon glyphicon-eye-open"></span>  View</a></h1>
  
    

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
        
        <input class="form-control" type="hidden" name="UserId11"  value="<?php echo $pqrow['userid']; ?>" />
		<?php }?>
    </tr>
	
  <tr>
    	<td><label class="control-label">Select Client</label></td>
       	<td><select style="width:100%;" class="form-control chosen-select" name="UserId" id="UserId"/>
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
    	<td><label class="control-label"> Invoice Head </label></td>
        <td><input class="form-control" type="text" name="TblHead" value="#0087C38A" required></td>
    </tr>
	
	<tr>
    	<td><label class="control-label"> Invoice Body </label></td>
        <td><input class="form-control" type="text" name="TblBody" value="#0087C30D" required></td>
    </tr>
	
	<tr>
    	<td><label class="control-label"> Others </label></td>
        <td><input class="form-control" type="text" name="Others" value="#0087C3" required></td>
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


<?php include('../includes/footer.php');?>