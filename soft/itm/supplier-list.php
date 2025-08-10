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
		// select image from db to delete
		$stmt_select = $DB_con->prepare('SELECT userPic FROM supplier WHERE sup_id =:uid');
		$stmt_select->execute(array(':uid'=>$_GET['delete_id']));
		$imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
		//unlink("user_images/".$imgRow['userPic']);
		
		// it will delete an actual record from db
		$stmt_delete = $DB_con->prepare('DELETE FROM supplier WHERE sup_id =:uid');
		$stmt_delete->bindParam(':uid',$_GET['delete_id']);
		$stmt_delete->execute();
		
		//header("Location:supplier.php");
	}

?>

<?php  require_once 'sidebar.php'; ?>


  <main id="main" class="main">

    <div class="pagetitle">
     <h1>Supplier List |  <span> <a href="add-supplier">   <i class="bi bi-plus-square-fill"></i> </a> </span> </h1>
       <hr>
    </div> 

    <section class="section">
      <div class="row">
	  
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
             
              <table class="table table-hover datatable">
                <thead>
                            
                            <tr>
								 
                                <th>SL</th> 
                                <th>Name</th>
                                <th>Position</th>
								<th>Address</th>
								<th>Phone</th>
                                <th>Email</th>
                                <th>Join Date</th>
								
								<th>Edit  / Delete</th>
                            </tr>
                        </thead>
						
						
                <tbody id="tbody">
							<?php
							$sl=0;
								$eq=mysqli_query($con,"select * from supplier  where status=1 and user_id='".$_SESSION['id']."' ORDER BY sup_id desc ");
								while($eqrow=mysqli_fetch_array($eq)){ 
									?>
										<tr>
											 
											<td><?php echo ++$sl; ?></td> 
											<td><?php echo $eqrow['supplier_name']; ?></td>
											<td><?php echo $eqrow['position']; ?></td>
											<td> <?php echo $eqrow['address']; ?> </td>
											<td><?php echo $eqrow['contact_info']; ?></td>
											<td><?php echo $eqrow['email']; ?></td>
											<td><?php echo date("d-M-Y", strtotime($eqrow['join_date'])); ?></td>
										<!--  <td> <img src="user_images/<?php echo $eqrow['userPic']; ?>" class="img-rounded" height="30px;" width="30px;" /></td> -->
			
				<td><a  class="btn-sm btn-info" href="edit-supplier?edit_id=<?php echo $eqrow['sup_id']; ?>" title="click for edit" onclick="return confirm('Are You Sure....?')"><span class="glyphicon glyphicon-edit"></span> Edit</a> || 
		 <a class="btn-sm btn-danger" href="?delete_id=<?php echo $eqrow['sup_id']; ?>" title="click for delete" onclick="return confirm('Are You Sure....?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a> </td>  
			
				
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