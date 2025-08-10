
<?php require_once 'header.php'; ?>

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
		header("Location: daily_notes.php");
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
				window.location.href='notes';
				</script>
                <?php
			}
			else{
				$errMSG = "Sorry Data Could Not Updated !";
			}
		
		}
		
						
	}
	
?>

<!DOCTYPE html PUBLIC >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Daily Notes  </title>
<!-- custom stylesheet -->
<link rel="stylesheet" href="style.css">

</head>
<body>


<center><h4><ol class="breadcrumb"> <li class="active">Daily Notes  Edit </li></ol></h4></center>
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
    	<td><label class="control-label">Remind Date </label></td>
		<td><input class="form-control" type="date" name="AlarmDate"  value="<?php echo $alarm_date ;?>" ></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Entry Date </label></td>
		<td><input class="form-control" type="text" name="Date" placeholder="" value="<?php echo $entry_date ;?>" ></td>
    </tr>
	 
	 <tr> <td></td>  <td></td></tr>
	 
    </table>
	<button type="submit" name="btn_save_updates" class="btn btn-primary"> <span class="glyphicon glyphicon-save"></span> Update  </button> 
        <a class="btn btn-danger" href="notes"> <span class="glyphicon glyphicon-backward"></span> Cancel </a>
     
</form> 

</div>

<?php include('../includes/footer.php');?>
 