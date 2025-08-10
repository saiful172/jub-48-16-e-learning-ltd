<?php require_once 'header.php'; ?>
<?php 
	
	if(isset($_POST['btnsave']))
	{
		
		$UserId = $_POST['UserId'];
		$NoteTitle = $_POST['NoteTitle'];
		$NoteDetail = $_POST['NoteDetail']; 
		$AlarmDate = $_POST['AlarmDate']; 
		$Date = $_POST['Date'];
		
		
		if(empty($NoteTitle)){
			$errMSG = "Please Enter Title Name.";
		}
		else if(empty($NoteDetail)){
			$errMSG = "Please Enter Details.";
		}
		
		
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO daily_notes (user_id,note_title,note_details,alarm_date,entry_date,status) VALUES(:UserId,:NoteTitle,:NoteDetail,:AlarmDate,:Date,1)');
			
			
			$stmt->bindParam(':UserId',$UserId);
			$stmt->bindParam(':NoteTitle',$NoteTitle);
			$stmt->bindParam(':NoteDetail',$NoteDetail); 
			$stmt->bindParam(':AlarmDate',$AlarmDate); 
			$stmt->bindParam(':Date',$Date);
			
			if($stmt->execute())
			{
				?>
                <script>
				alert('New Note Add Successfully...');
				window.location.href='notes';
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 

</head>
<body>


<center><h4><ol class="breadcrumb"> <li class="active"> Daily Notes  </li></ol></h4></center>	
<div class="container">

    	<h1 class="h2">
		<a class="btn btn-success" href="notes"> <span class="glyphicon glyphicon-eye-open"></span>  View</a>
		</h1>
  
    

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
    	<td><label class="control-label">Title Name</label></td>
		<td><input class="form-control" type="text" name="NoteTitle" placeholder="Title Name" value="<?php echo $NoteTitle; ?>"></td>
    </tr>
	
		
	<tr>
    	<td><label class="control-label">Note Details </label></td>
		<td> <textarea id="NoteDetail" name="NoteDetail" class="form-control" placeholder="Write Here"></textarea></td>
     </tr>
	 
	<tr>
    	<td><label class="control-label">Remind Date </label></td>
		<td><input class="form-control" type="date" name="AlarmDate"  value="<?php echo date("Y/m/d") ;?>" ></td>
    </tr>
	 
	
	<tr>
    	<td><label class="control-label">Entry Date </label></td>
		<td><input class="form-control" type="text" name="Date" placeholder="" value="<?php echo date("Y/m/d") ;?>" ></td>
    </tr>
	
    <tr> <td></td>  <td></td></tr>
	 
    </table>
	
	<button type="submit" name="btnsave" class="btn btn-primary">  <span class="glyphicon glyphicon-save"></span> &nbsp; Save </button>
    
</form>



</div>

<?php include('../includes/footer.php');?>





