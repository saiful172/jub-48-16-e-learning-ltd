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
		$ExpName = $_POST['ExpName'];
		$ExpCost = $_POST['ExpCost'];
		$Refer = $_POST['Refer'];
		$Date = $_POST['Date'];
		
		
		if(empty($ExpName)){
			$errMSG = "Please Enter Expense Name.";
		}
		else if(empty($ExpCost)){
			$errMSG = "Please Enter Expense Cost.";
		}
		
		
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO expense_other (user_id,expense_name,expense_cost,reference,entry_date) VALUES(:UserId,:ExpName,:ExpCost,:Refer,:Date)');
			
			
			$stmt->bindParam(':UserId',$UserId);
			$stmt->bindParam(':ExpName',$ExpName);
			$stmt->bindParam(':ExpCost',$ExpCost);
			$stmt->bindParam(':Refer',$Refer);
			$stmt->bindParam(':Date',$Date);
			
			if($stmt->execute())
			{
				?>
                <script>
				alert('New Expense Add Successfully...');
				window.location.href='other-exp-list';
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
	  <h1>Other Expenses  | <span> <a href="other-exp-list">   <i class="bi bi-table"></i> </a> </span> </h1>
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
				   $pq=mysqli_query($con,"select * from user where userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
        
        <input class="form-control" type="hidden" name="UserId"  value="<?php echo $pqrow['userid']; ?>" />
		<?php }?>
    </tr>
	
	
	
	<tr>
    	<td><label class="control-label">Expense Name</label></td>
		<td><input class="form-control" type="text" name="ExpName" placeholder="Expense Name" value="<?php echo $ExpName; ?>"></td>
    </tr>
	
		
	<tr>
    	<td><label class="control-label">Expense Cost </label></td>
        <td><input class="form-control" type="text" name="ExpCost" placeholder="Expense Cost" value="<?php echo $ExpCost; ?>" ></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Reference </label></td>
		<td><input class="form-control" type="text" name="Refer" placeholder="Reference" value="Na" ></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Date </label></td>
		<td><input class="form-control" type="date" name="Date" placeholder="" value="<?php date_default_timezone_set("Asia/Dhaka"); echo date("Y-m-d") ;?>"> </td>
    </tr>
	
	 
    </table>
	
	<button type="submit" name="btnsave" class="btn btn-primary">  <span class="glyphicon glyphicon-save"></span> &nbsp; Save </button>
    
</form>

            </div>
          </div>

          
        </div>

       
    </section>

  </main> 

    <?php  require_once 'footer1.php'; ?>