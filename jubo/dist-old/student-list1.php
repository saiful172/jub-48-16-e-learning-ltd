<?php require_once 'header.php'; ?>
<?php 
	
	if(isset($_GET['delete_id']))
	{
		// select image from db to delete
		$stmt_select = $DB_con->prepare('SELECT userPic FROM student_list WHERE student_id =:uid');
		$stmt_select->execute(array(':uid'=>$_GET['delete_id']));
		$imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
		//unlink("user_images/".$imgRow['userPic']);
		
		// it will delete an actual record from db
		$stmt_delete = $DB_con->prepare('DELETE FROM student_list WHERE student_id =:uid');
		$stmt_delete->bindParam(':uid',$_GET['delete_id']);
		$stmt_delete->execute();
		
	}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="css/buttons.css">
<link rel="stylesheet" href="css/table_data_center.css">
<script src="js/search.js"></script>

<style>
    .table tr>th,
    .table tr>td{
        text-align: left !important;
        vertical-align: middle !important;
    }
</style>
</head>

<body>
<div class="container-fluid"> 
<center><h4><ol class="breadcrumb"> <li class="active">Student List </li></ol></h4></center>

	
	<div style="width:100%" class="form-group input-group">
                 <span style="width:120px;" class="input-group-addon">Search </span>
				 <input id="myInput" style="width:100%;" type="text"  class="form-control" placeholder="Search..">
			  </div>


	<div class="buttons">
	
		<div class="col-md-2">
		<a class="btn btn-primary" style="width:100%" href="student-list-add1.php"> <span class="glyphicon glyphicon-plus"></span> Add New Student </a> 
		</div>
		
		
		</div>
    
<table class="table table-striped table-hover" student_id="dataTables-example">
      <thead class="bg-dark text-white">
        <tr>
          <th>SL</th>
          <th width="15%">Name</th>
          <th width="12%">Father Name</th>
          <th>Batch</th>
          <th>Group</th>
          <th>Upwork</th>
          <th>Fiverr</th>
          <th>Freelancer.com</th>
          <th>Photo</th>
          <th>Action</th>
        </tr>
      </thead>

      <tbody id="tbody">
        <?php
        //last id dynamic with batch
        $result = mysqli_query($con, "SELECT batch_id FROM batch_list ORDER BY batch_id DESC LIMIT 1");
        $row = mysqli_fetch_assoc($result);
        //last id dynamic with batch

        $sl = 0;
        $eq = mysqli_query($con, "SELECT * FROM student_list
        LEFT JOIN batch_list ON batch_list.batch_id = student_list.batch_id
        LEFT JOIN group_list ON group_list.group_id = student_list.group_id 
        WHERE student_list.user_id = " . $_SESSION['id'] . " ORDER BY student_list.student_id DESC");

        // Check if any records were fetched
        if (mysqli_num_rows($eq) > 0) {
          while ($eqrow = mysqli_fetch_array($eq)) {
            $eidm = $eqrow['user_id'];
        ?>
            <tr>
              <td><?= ++$sl; ?></td>
              <td><?= $eqrow['stu_name']; ?></td>
              <td><?= $eqrow['father_name']; ?></td>
              <td><?= $eqrow['batch_name']; ?></td>
              <td><?= $eqrow['group_name']; ?></td>
              <td>
              <?php 
                if($eqrow['upwork'] && $eqrow['upwork'] !== 'none'){
                    echo "<a traget='_blank' href='". $eqrow['upwork'] ."'>Upwork Linked<a>";
                }else{
                    echo '-';
                }
              ?>
              </td>
              
              <td>
              <?php 
                if($eqrow['fiver'] && $eqrow['fiver'] !== 'none'){
                    echo "<a traget='_blank' href='". $eqrow['fiver'] ."'>Fiverr Linked<a>";
                }else{
                    echo '-';
                }
              ?>
              </td>
              
              <td>
              <?php 
                if($eqrow['link_three'] && $eqrow['link_three'] !== 'none'){
                    echo "<a traget='_blank' href='". $eqrow['link_three'] ."'>Freelancer.com Linked<a>";
                }else{
                    echo '-';
                }
              ?>
              </td>
              
    
              <td><img src="user_images/<?= $eqrow['userPic']; ?>" class="img-rounded" height="30px;" width="30px;" /></td>
              <td>
                <a class="btn btn-primary" href="student-list-edit1.php?edit_id=<?= $eqrow['student_id']; ?>" title="click for edit"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                <a class="btn btn-info" href="student-list-view1.php?edit_id=<?= $eqrow['student_id']; ?>" title="Click To View"><span class="glyphicon glyphicon-eye-open"></span> View</a>
                <a class="btn btn-danger" href="?delete_id=<?= $eqrow['student_id']; ?>" title="click for delete" onclick="return confirm('Are You Sure....?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a>
              </td>
            </tr>
          <?php
          }
        } else {
          // If no records found, display a message
          ?>
          <tr>
            <td colspan="6">No records found.</td>
          </tr>
        <?php
        }
        ?>
      </tbody>

    </table>
</div>



</body>
</html>