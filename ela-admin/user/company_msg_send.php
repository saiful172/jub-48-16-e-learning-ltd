<?php require_once 'header.php'; ?>
<?php 
	if(isset($_POST['btnsave']))
	{
		 
		$User_Id = $_POST['User_Id'];
		$Msg_Name = $_POST['Msg_Name'];
		$MsgFrom = $_POST['MsgFrom'];
		$MsgTo = $_POST['MsgTo'];
		$Date = $_POST['Date'];
		
		
		if(empty($Msg_Name)){
			$errMSG = "Please Enter Msg_Name.";
		}
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO customer_msg (admin_id,user_id,msg_name,link,msg_from_to,msg_from,msg_to,msg_status,status,entry_date) VALUES(22,:User_Id,:Msg_Name,"None",:MsgFrom,:MsgFrom,:MsgTo,2,1,:Date)');
			 
			$stmt->bindParam(':User_Id',$User_Id); 
			$stmt->bindParam(':Msg_Name',$Msg_Name);
			$stmt->bindParam(':MsgFrom',$MsgFrom);
			$stmt->bindParam(':MsgTo',$MsgTo);
			$stmt->bindParam(':Date',$Date);
			
			if($stmt->execute())
			{
				//$successMSG = "New Message Send Successfully..";
				?>
              <script>
				alert('New Message Send Successfully.');
				window.location.href='company_msg.php';
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
<title>Add New Massage </title>

<link rel="stylesheet" href="css/form_style_mbl2.css">

</head>
<body> 
<h3><ol class="breadcrumb"> <li class="active">Send Company Message</li></ol>

    	<h1 class="h2"> <a class="btn btn-default" href="company_msg.php"> <span class="glyphicon glyphicon-eye-open"></span> View  </a></h1>
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
	 <div class="row">	 
<div class="col-lg-6">

<div class="form-group input-group" style="display:none;">  
	 <?php 
				   $pq=mysqli_query($con,"select * from stuff where userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
        
       <input class="form-control" type="text" name="User_Id"  value="<?php echo $pqrow['userid']; ?>" >  
       <input class="form-control" type="text" name="MsgFrom"  value="<?php echo $pqrow['business_name']; ?>" >  
		
		<?php }?>
	</div>

<div class="form-group input-group" style="display:none;"> 
	 <?php 
				   $pq=mysqli_query($con,"select * from stuff where userid=22  ");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
         
    <input class="form-control" type="text" name="MsgTo"  value="<?php echo $pqrow['stuff_name']; ?>" >  
		
		<?php }?>
	</div>	
	
      
    <div class="form-group input-group">
     <span id="span" class="input-group-addon" ><div id="label">Message</div></span>
	 <textarea class="form-control" rows="3" width="100%" name="Msg_Name" > Write Message Name </textarea>
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
	</div>
	</div>
	
    
</form>
    
<?php require_once '../includes/footer.php'; ?>