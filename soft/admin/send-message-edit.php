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
		$stmt_edit = $DB_con->prepare('SELECT * FROM customer_msg left join `stuff` on stuff.userid=customer_msg.user_id  WHERE id =:uid');
		$stmt_edit->execute(array(':uid'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: index");
	}
	
	
	
	if(isset($_POST['btn_save_updates']))
	{  
		$Msg_Name = $_POST['Msg_Name'];
		$Link = $_POST['Link'];
		$Status = $_POST['Status'];
		$Date = $_POST['Date'];
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('UPDATE customer_msg 
									     SET  
									         msg_name=:Msg_Name, 
										         link=:Link,
										       status=:Status,
                                           entry_date=:Date 											 
											 
								       WHERE  id = :uid');
			
		 
			$stmt->bindParam(':Msg_Name',$Msg_Name);
			$stmt->bindParam(':Link',$Link);
			$stmt->bindParam(':Status',$Status);
			$stmt->bindParam(':Date',$Date);
			
			$stmt->bindParam(':uid',$id);
			
			if($stmt->execute()){
				?>
                <script>
				alert('Successfully Updated ...');
				window.location.href='send-message';
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

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Edit Messsage</h1> <hr>
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
   
    
	<table class="table  table-responsive">

	<tr>
    	<td><label class="control-label">Message To:</label></td>
        <td><input class="form-control" type="text" value="<?php echo $business_name; ?>" disabled="true" /></td>
    </tr>
	
    <tr>
    	<td><label class="control-label">Message Name:</label></td>
        <td><input class="form-control" type="text" name="Msg_Name" placeholder="Message Name" value="<?php echo $msg_name; ?>" /></td>
    </tr>
    
    <tr>
    	<td><label class="control-label">Link/Other</label></td>
        <td><input class="form-control" type="text" name="Link" placeholder="Link" value="<?php echo $link; ?>" /></td>
    </tr>
	
	
	
	<tr>
    	<td><label class="control-label">Active/In Active</label></td>
       	<td><select style="width:100%;" class="form-control" name="Status"  value="<?php echo $status; ?>" />
		<option value="1">Active</option> 
		<option value="0">In Active</option>
		</select> </td>       
	</tr>
	
	<tr>
    	<td><label class="control-label">Date</label></td>
		<td><input class="form-control" type="text" name="Date" placeholder="" value="<?php echo $entry_date ;?>" /></td>
    </tr>
			
	   
   
    
    </table>
	
	<tr>
        <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-primary">
        <span class="glyphicon glyphicon-save"></span> Update
        </button>
        
        <a class="btn btn-danger" href="send-message"> <span class="glyphicon glyphicon-backward"></span> Cancel </a>
        
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