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
		$stmt_edit = $DB_con->prepare('SELECT * FROM daily_notes WHERE id =:uid');
		$stmt_edit->execute(array(':uid'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: task-list");
	}
	 
	if(isset($_POST['btn_save_updates']))
	{
		
		$NoteTitle = $_POST['NoteTitle'];
		$NoteDetail = $_POST['NoteDetail']; 
		$AlarmDate = $_POST['AlarmDate']; 
		$Date = $_POST['Date'];
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('UPDATE daily_notes 
									     SET note_title=:NoteTitle, 
										     note_details=:NoteDetail,  
										     alarm_date=:AlarmDate,  
										     entry_date=:Date 
											 
								       WHERE  id = :uid');
						
			$stmt->bindParam(':NoteTitle',$NoteTitle);
			$stmt->bindParam(':NoteDetail',$NoteDetail); 
			$stmt->bindParam(':AlarmDate',$AlarmDate); 
			$stmt->bindParam(':Date',$Date);
			
			$stmt->bindParam(':uid',$id);
			
			if($stmt->execute()){
				?>
                <script>
				alert(' Update Successfull... ');
				window.location.href='task-list';
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

  <main id="main" class="main1">

    <div class="pagetitle">
      <h1>Edit Task</h1> <hr>
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
    	<td><label class="control-label">Title Name</label></td>
		<td><input class="form-control" type="text" name="NoteTitle" placeholder="Title Name" value="<?php echo $note_title; ?>"></td>
    </tr>
	
		
	<tr>
    	<td><label class="control-label">Note Details</label></td>
        <td> <textarea id="NoteDetail" name="NoteDetail" class="form-control"><?php echo $note_details; ?></textarea><td>
    </tr>
	 
	
	<tr>
    	<td><label class="control-label">Reminder Date </label></td>
		<td><input class="form-control" type="date" name="AlarmDate"  value="<?php echo $alarm_date ;?>" ></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Entry Date </label></td>
		<td><input class="form-control" type="date" name="Date"   value="<?php echo $entry_date ;?>" ></td>
    </tr>
	
	 
    </table>
	
	<tr>
        <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-primary">
        <span class="glyphicon glyphicon-save"></span> Update
        </button>
        
        <a class="btn btn-danger" href="task-list"> <span class="glyphicon glyphicon-backward"></span> Cancel </a>
        
        </td>
    </tr>
    
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