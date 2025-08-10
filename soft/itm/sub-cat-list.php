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
		$stmt_delete = $DB_con->prepare('DELETE FROM categories_sub WHERE sub_cat_id =:uid');
		$stmt_delete->bindParam(':uid',$_GET['delete_id']);
		$stmt_delete->execute();
		
		//header("Location:group.php");
	}

?>

<?php  require_once 'sidebar.php'; ?>


  <main id="main" class="main">

    <div class="pagetitle">
     <h1>Sub Category List |  <span> <a href="sub-cat-add">   <i class="bi bi-plus-square-fill"></i> </a> </span> </h1>
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
							<th>SL </th>							
							<th>Sub Category </th>
							<th>Category </th>
							<th>Brand </th>
							<th>Edit</th>
							<th>Delete</th>
                        </tr>
                        </thead>
						
						
                  <tbody id="tbody">
							<?php
							$sl=0;
								$eq=mysqli_query($con,"select distinct * from categories_sub 
                                Left join categories1 on  categories1.cat_id=categories_sub.cat_id
                                Left join brand1 on  brand1.brand_id=categories1.brand_id
								WHERE categories_sub.user_id ='".$_SESSION['id']."'
								ORDER BY categories_sub.sub_cat_id DESC ");
								while($eqrow=mysqli_fetch_array($eq)){
									
									?>
										<tr>
										   <td><?php echo ++$sl; ?></td> 										   
											<td><?php echo $eqrow['sub_cat_name']; ?></td>
											<td><?php echo $eqrow['cat_name']; ?></td>
											<td><?php echo $eqrow['brand_name']; ?></td>
											
											
				<td><a  class="btn-sm btn-info" href="sub-cat-edit?edit_id=<?php echo $eqrow['sub_cat_id']; ?>" title="click for edit" 
                 onclick="return confirm('Do You Want To Edit ?')"><span class="glyphicon glyphicon-edit"></span> Edit</a> </td>
				
				<td><a class="btn-sm btn-danger" href="?delete_id=<?php echo $eqrow['sub_cat_id']; ?>" title="click for delete" onclick="return confirm('Do You Want To Delete ?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete </a> </td>
			
				
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