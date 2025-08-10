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
<title>Customer Meassage</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="css/table_data_center.css">
<link rel="stylesheet" href="css/buttons.css">
<style> #msg{padding:10px;} </style>
</head>

<body>


<center><h3><ol class="breadcrumb"> <li class="active"> View Customer Meassage</li></ol></h3></center>

<div class="buttons">
		
		
		
		</div>
<?php
								$eq=mysqli_query($con,"select * from customer_msg 
								left join `customer` on customer.userid=customer_msg.msg_from_to
								ORDER BY id DESC ");
								while($eqrow=mysqli_fetch_array($eq)){ 
									?>
<div  id="msg" class="panel panel-success"> 
  <center><b>
  
  <?php echo  $eqrow['entry_date']; ?>
  <b></center>	
<h4><b><?php echo $eqrow['msg_from']; ?> >>  <?php echo $eqrow['msg_to']; ?>  </b><br>
 Cust Id : <?php echo $eqrow['user_id']; ?>
<hr>
<?php echo $eqrow['msg_name']; ?></h4>
</div>

<?php
		}  
		?>

</tbody>
</table>

<?php require_once '../includes/footer.php'; ?>


