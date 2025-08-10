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
				window.location.href='task-list';
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

  <main id="main" class="main1">

    <div class="pagetitle"> 
	  <h1>Daily Notes Add  | <span> <a href="task-list">   <i class="bi bi-table"></i> </a> </span> </h1>
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
    	<td><label class="control-label">Title Name</label></td>
		<td><input class="form-control" type="text" name="NoteTitle" placeholder="Title Name" value="<?php echo $NoteTitle; ?>"></td>
    </tr>
	
		
	<tr>
    	<td><label class="control-label">Note Details </label></td>
		<td> <textarea id="NoteDetail" name="NoteDetail" class="form-control" placeholder="Write Here"></textarea></td>
     </tr>
	 
	<tr>
    	<td><label class="control-label">Reminder  Date </label></td>
		<td><input class="form-control" type="date" name="AlarmDate"  value="<?php echo date("Y-m-d") ;?>" ></td>
    </tr>
	 
	
	<tr>
    	<td><label class="control-label">Entry Date </label></td>
		<td><input class="form-control" type="date" name="Date"  value="<?php echo date("Y-m-d") ;?>" ></td>
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
	
	
<script src = "js/chosen.js"></script>
<script type = "text/javascript">
	$('.chosen-select').chosen({width: "100%"});
</script>