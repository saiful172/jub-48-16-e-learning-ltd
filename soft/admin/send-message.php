<!DOCTYPE html>
<html lang="en"> 

<head>
<?php   require_once 'head_link.php'; ?>

</head>

<body>
 
<?php   require_once 'header1.php'; ?> 

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

<?php  require_once 'sidebar.php'; ?>


  <main id="main" class="main">

    <div class="pagetitle"> 
	  <h1>Messages | <span> <a href="send-message-add">  <i class="bi bi-plus-square-fill"></i> </a> </span>  </h1>
	  <hr>
    </div> 

    <section class="section">
      <div class="row">
	  
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
             
              <table width="100%" class="table table-hover datatable">
              <thead>
                <tr> 
					 <th>Date</th> 
					 <th>Message From</th> 
					 <th>Message To</th>  
					 <th>User Id</th>  
                     <th>Message Name</th>
					 <th>Link</th> 
					 <th>Edit</th>
					 <th>Delete</th>
                 </tr>
            </thead>
						
						
                     <tbody>
							<?php
								$eq=mysqli_query($con,"select * from customer_msg 
								where customer_msg.status=1 ORDER BY customer_msg.id DESC LIMIT 100 ");
								while($eqrow=mysqli_fetch_array($eq)){
									$eidm=$eqrow['id'];
									?>
										<tr>
										    <td><?php echo $eqrow['entry_date']; ?></td>
											<td><?php echo $eqrow['msg_from']; ?></td>  
											<td><?php echo $eqrow['msg_to']; ?></td>  
										    <td><?php echo $eqrow['user_id']; ?></td>
											<td><?php echo $eqrow['msg_name']; ?></td>
											<td><?php echo $eqrow['link']; ?></td>
											
											
				<td><a  class="btn btn-info" href="send-message-edit.php?edit_id=<?php echo $eqrow['id']; ?>" title="click for edit" onclick="return confirm('Are You Sure To Edit ?')"><span class="glyphicon glyphicon-edit"></span> Edit</a> </td>
				<td><a class="btn btn-danger" href="?delete_id=<?php echo $eqrow['id']; ?>" title="click for delete" onclick="return confirm('Are You Sure To Delete ?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a> </td>
			
				
			</tr>
		<?php
		}  
		?>

</tbody>
              </table>
            
            </div>
          </div>

        </div>
      </div>
    </section>

  </main>
  
  <?php  require_once 'footer1.php'; ?>