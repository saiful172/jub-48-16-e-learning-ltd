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
		$DistName = $_POST['DistName'];
		$DivName = $_POST['DivName'];
		
		
		
		if(empty($DistName)){
			$errMSG = "Please Enter District Name.";
		}
		 
		
		
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO district (user_id,dist_name,div_id) VALUES(:UserId,:DistName,:DivName)');
			
			
			$stmt->bindParam(':UserId',$UserId);
			$stmt->bindParam(':DistName',$DistName);
			$stmt->bindParam(':DivName',$DivName);
			
			
			if($stmt->execute())
			{
				$successMSG = "Data Add Successful...";
				//header("refresh:2; expense.php"); // redirects image view page after 5 seconds.
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
	  <h1>District Add  | <span> <a href="District-new">   <i class="bi bi-table"></i> </a> </span> </h1>
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
	    
<table class="table  table-responsive">
	
   <tr>
    	
		<?php    
				   $pq=mysqli_query($con,"select * from user where userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
        
        <input class="form-control" type="hidden" name="UserId"  value="<?php echo $pqrow['userid']; ?>" />
		<?php }?>
    </tr>
	
	<tr>
    	<td><label class="control-label">Select Division</label> </td>
        <td>
		<select style="width:100%;" class="form-control chosen-select " Id="DivName" name="DivName" >
		<option value="#">Select Name</option>
				      	<?php 
				      	$sql = "SELECT  div_id,div_name FROM division ";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} 
				      	?>
		</select> 
		</td>
    </tr>
	
	<tr>
    	<td><label class="control-label">District Name</label></td>
		<td><input class="form-control" type="text" name="DistName" placeholder="District Name" value="<?php echo $DistName; ?>"></td>
    </tr>
    
    
    </table>
	
	<button type="submit" name="btnsave" class="btn btn-primary">  <span class="glyphicon glyphicon-save"></span> &nbsp; Save </button>
    
</form>

            </div>
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