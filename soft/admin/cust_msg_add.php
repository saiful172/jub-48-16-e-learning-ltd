<?php require_once 'includes/db_connect.php' ?>
<?php require_once 'header.php'; ?>
<?php

	error_reporting( ~E_NOTICE ); // avoid notice
	
	require_once 'includes/dbconfig.php';
	
	if(isset($_POST['btnsave']))
	{
		
		$Msg_From = $_POST['Msg_From'];
		$Msg_Name = $_POST['Msg_Name'];
		$Date = $_POST['Date'];
		
		
		if(empty($Msg_Name)){
			$errMSG = "Please Enter Msg_Name.";
		}
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO send_msg (msg_from,msg_name,status,entry_date) VALUES(:Msg_From,:Msg_Name,1,:Date)');
			
			
			$stmt->bindParam(':Msg_From',$Msg_From);
			$stmt->bindParam(':Msg_Name',$Msg_Name);
			$stmt->bindParam(':Date',$Date);
			
			if($stmt->execute())
			{
				$successMSG = "New Meassage Send Succesfully..";
				//header("refresh:2; customer.php"); // redirects image view page after 5 seconds.
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
<title>Add New Meassage </title>

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">

</head>
<body>

<h3><ol class="breadcrumb"> <li class="active">Send Meassage</li></ol>

    	<h1 class="h2">&nbsp;<a class="btn btn-default" href="send_msg_add.php"> <span class="glyphicon glyphicon-envelope"></span> Send New </a> 
		<a class="btn btn-default" href="send_msg.php"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; View  </a></h1>
</h3>
    

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
	
    
	 <div class="modal-body">
	 
	<div class="form-group input-group">
    
	 <?php
				
				   include('includes/conn.php');
				   $pq=mysqli_query($con,"select * from customer left join `user` on user.userid=customer.userid where customer.userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
	 ?>
        
        <input class="form-control" type="hidden" name="Msg_From"  value="<?php echo $pqrow['userid']; ?>" >
		<input class="form-control" type="hidden" name="Msg_From1"  value="<?php echo $pqrow['userid']; ?>" disabled="true" >
		
		<?php }?>
	</div>
	
	<div class="form-group input-group" style="display:none;">
     <span id="span" class="input-group-addon" ><div id= "label" >Message To </div></span>
	 <input class="form-control" type="text" name="MsgTo" id="MsgTo"  required >
	 </div>
	    
    <div class="form-group input-group">
     <span id="span" class="input-group-addon" ></span>
	 <textarea class="form-control" rows="3" width="100%" name="Msg_Name" > Write Meassage Name </textarea>
	</div>
	
	<div class="form-group input-group">
     
	<input class="form-control" type="hidden" name="Date" placeholder="" value="<?php echo date("Y/m/d") ;?>" >
	</div>
	
	<div class="form-group input-group">
   <button type="submit" name="btnsave"  class="btn btn-primary">
   <span class="glyphicon glyphicon-save"></span> &nbsp;<b> Send </b>
   </button>
   </div>
        
	</div>
	
    
</form>
    


<?php require_once 'includes/footer.php'; ?>