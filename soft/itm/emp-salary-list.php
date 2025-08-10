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
		$stmt_select = $DB_con->prepare('SELECT userPic FROM employees WHERE  id =:uid');
		$stmt_select->execute(array(':uid'=>$_GET['delete_id']));
		$imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
		//unlink("user_images/".$imgRow['userPic']);
		
		// it will delete an actual record from db
		$stmt_delete = $DB_con->prepare('DELETE FROM employees WHERE  id =:uid');
		$stmt_delete->bindParam(':uid',$_GET['delete_id']);
		$stmt_delete->execute();
		
		//header("Location:customer.php");
	}

?>

<?php  require_once 'sidebar.php'; ?>


  <main id="main" class="main">

    <div class="pagetitle">
     <h1>Employees Salary List |  <span> <a href="emp-salary-create" data-bs-toggle="tooltip" data-bs-placement="top" title="Create">   <i class="bi bi-plus-circle"></i> </a> </span> |  <span> <a href="pay-emp-salary" data-bs-toggle="tooltip" data-bs-placement="top" title="Pay">   <i class="bi bi-check-circle"></i> </a> </span> </h1>
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
                                <th>EMP Id</th>
                                <th>Name</th> 								
								<th>Position</th>
								<th>Salary</th> 
								<th>Join Date</th>
								 
                            </tr>
							
                            
                        </thead>
						
						
                 <tbody id="tbody">
							<?php
								$eq=mysqli_query($con,"select * from employees  where user_id='".$_SESSION['id']."' and  status=1 ORDER BY id DESC  ");
								while($eqrow=mysqli_fetch_array($eq)){
									$eidm=$eqrow['id'];
									?>
										<tr>
											 
											
										    <td><?php echo ++$sl; ?></td> 
										    <td><?php echo $eqrow['id']; ?></td>
											<td><?php echo $eqrow['emp_name']; ?></td> 											
											<td><?php echo $eqrow['position']; ?></td>
											<td><?php echo $eqrow['salary']; ?></td>
											<td><?php echo $eqrow['join_date']; ?></td>
										 
			<!--
				<td><a  class="btn btn-info" href="emp-edit?edit_id=<?php echo $eqrow['id']; ?>" title="click for edit" onclick="return confirm('Do You Want To Edit......?')"><span class="glyphicon glyphicon-edit"></span> Edit</a> </td>
				<td><a class="btn btn-danger" href="?delete_id=<?php echo $eqrow['id']; ?>" title="click for delete" onclick="return confirm('Do You Want To Delete...?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a> </td>
			-->
				
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