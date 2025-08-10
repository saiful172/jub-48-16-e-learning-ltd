<?php require_once 'header.php'; ?>
<?php 
	
	if(isset($_GET['delete_id']))
	{ 
		// it will delete an actual record from db
		$stmt_delete = $DB_con->prepare('DELETE FROM customer_msg WHERE id =:uid');
		$stmt_delete->bindParam(':uid',$_GET['delete_id']);
		$stmt_delete->execute();
		
		//header("Location:group.php");
	}

?>
<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
<title>Notice</title>  
<style> #msg{padding:5px;} </style>


</head>

<body> 

<h3><ol class="breadcrumb"> <li class="active"> Company Message </li></ol>
<a class="btn btn-primary" href="company_msg_send.php"> <span class="glyphicon glyphicon-comment"></span> New Message  </a>
</h3>
 
<hr>
<!--Notice / Messages -->
<?php
								$eq=mysqli_query($con,"select * from customer_msg  
								where customer_msg.status=1 and customer_msg.user_id='".$_SESSION['id']."' ORDER BY customer_msg.id DESC LIMIT 100 ");
								while($eqrow=mysqli_fetch_array($eq)){ 
									 $date=$eqrow['entry_date'];
                                     $date= date("d-M-Y");
									?>
									
<div  id="msg" class="panel panel-success"> 
  <center><b>
  <?php  echo  $date ;  ?><br><p style="color:red;"><?php echo $eqrow['msg_from_to']; ?></p>
  <b></center>	
<h4><?php echo $eqrow['msg_name']; ?></h4>
</div>

<?php
		}  
		?>
 


	
</div>
</div>


<div class="container" style="width:100%;">
<?php require_once '../includes/footer.php'; ?>


