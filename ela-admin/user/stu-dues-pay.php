<!DOCTYPE html>
<html lang="en">

<head>
<?php   require_once 'head_link.php'; ?>

</head>

<body>
 
<?php   require_once 'header1.php'; ?> 

<?php
if (isset($_POST['btnsave'])) {

	$OrderId = $_POST['OrderId'];
	$StudentId = $_POST['StudentId'];
	$PreDues = $_POST['PreDues'];
	$Paid = $_POST['Paid'];
	$RecentDues = $_POST['RecentDues'];

	$Date = $_POST['Date'];


	if (empty($StudentId)) {
		$errMSG = "Please Select Student Name.";
	} else if (empty($StudentId)) {
		$errMSG = "Please Select Student Name.";
	}

	if (!isset($errMSG)) {
		$stmt = $DB_con->prepare('UPDATE orders_dues 
									     SET  last_update=:Date,
										 order_id=:OrderId, 
										 pre_due=:PreDues, 
										     today_total=0, 
										     grand_total=0, 
										     paid=:Paid, 
										     recent_due=:RecentDues,
										     dues_or_paid_status=3,
										     causes="Dues Paid"
											 
								       WHERE student_id=:StudentId ');

		$stmt->bindParam(':OrderId', $OrderId);
		$stmt->bindParam(':StudentId', $StudentId);

		$stmt->bindParam(':PreDues', $PreDues);
		$stmt->bindParam(':Paid', $Paid);
		$stmt->bindParam(':RecentDues', $RecentDues);

		$stmt->bindParam(':Date', $Date);

		if ($stmt->execute()) {
?>
			<script>

			</script>
<?php
		} else {
			$errMSG = "error while inserting....";
		}
	}
}
?>


<?php
if (isset($_POST['btnsave'])) {
	$UserId = $_POST['UserId'];
	$OrderId = $_POST['OrderId'];
	$StudentId = $_POST['StudentId'];

	$PreDues = $_POST['PreDues'];
	$Paid = $_POST['Paid'];
	$RecentDues = $_POST['RecentDues'];

	$Date = $_POST['Date'];


	if (empty($StudentId)) {
		$errMSG = "Please Select Student Name.";
	} else if (empty($StudentId)) {
		$errMSG = "Please Select Student Name.";
	}


	// if no error occured, continue ....
	if (!isset($errMSG)) {
		$stmt = $DB_con->prepare('INSERT INTO orders_details (user_id,order_id,student_id,order_date,pre_due,today_total,grand_total,paid,recent_due,causes,order_type ) 
			VALUES(:UserId,:OrderId,:StudentId,:Date,:PreDues,"0","0",:Paid,:RecentDues,"Dues Paid",3 )');

		$stmt->bindParam(':UserId', $UserId);
		$stmt->bindParam(':OrderId', $OrderId);
		$stmt->bindParam(':StudentId', $StudentId);

		$stmt->bindParam(':PreDues', $PreDues);
		$stmt->bindParam(':Paid', $Paid);
		$stmt->bindParam(':RecentDues', $RecentDues);

		$stmt->bindParam(':Date', $Date);

		if ($stmt->execute()) {
?>
			<script>
				alert('Dues Payment Successful.');
				window.location.href = 'stu-payment';
			</script>
<?php
		} else {
			$errMSG = "error while inserting....";
		}
	}
}
?>

<?php  require_once 'sidebar.php'; ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Pay Student Dues |  <span> <a href="stu-payment">    <i class="bi bi-table"></i> </a> </span> </h1>
	  <hr>
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

		<table class="table table-hover table-responsive">

			<?php
			$pq = mysqli_query($con, "select * from stuff left join `user` on user.userid=stuff.userid where stuff.userid='" . $_SESSION['id'] . "' ");
			while ($pqrow = mysqli_fetch_array($pq)) {
			?>
				<input class="form-control" type="hidden" name="UserId" value="<?php echo $pqrow['userid']; ?>" />
			<?php } ?>


			<tr>
				<td><label class="control-label">Select Student</label> </td>
				<td>
					<select style="width:100%;" class="form-control chosen-select " Id="StuId" name="StuId" required="">
						<option value="#">Select Name</option>
						<?php
						$sql = "SELECT  student_id,student_name FROM students where user_id='" . $_SESSION['id'] . "' ";
						$result = $con->query($sql);

						while ($row = $result->fetch_array()) {
							echo "<option value='" . $row[0] . "'>" . $row[1] . "</option>";
						}
						?>
					</select>
				</td>
			</tr>

			<!--OrderId-->
			<input class="form-control" type="hidden" id="OrderId" name="OrderId" placeholder="Order Id" value="<?php echo $OrderId; ?>" />
			<!--OrderId-->

			<tr>
				<td><label class="control-label">Student Name</label></td>
				<td><input class="form-control" type="text" id="StudentName1" name="StudentName1" placeholder="Student Name" disabled="true" />
					<input class="form-control" type="hidden" id="StudentId" name="StudentId" />
			</tr>

			<tr>
				<td><label class="control-label"> Phone Number</label></td>
				<td><input class="form-control" type="text" id="StuPhone" name="StuPhone" placeholder="Student Phone" /></td>
			</tr>

			<tr>
				<td><label class="control-label"> BatchNo</label></td>
				<td><input class="form-control" type="text" id="BatchNo" name="BatchNo" placeholder="Batch No" /></td>
			</tr>



			<tr>
				<td><label class="control-label"> Course Name</label></td>
				<td><input class="form-control" type="text" id="CourseName" name="CourseName" placeholder="Course Name" /></td>
			</tr>

			<tr>
				<td><label class="control-label">Previous Dues</label></td>
				<td><input class="form-control" type="text" id="PreDues1" name="PreDues1" placeholder="Previous Dues" value="<?php echo $PreDues; ?>" disabled="true" oninput="myFunctionRD()" />
					<input class="form-control" type="hidden" id="PreDues" name="PreDues" placeholder="Previous Dues" value="<?php echo $PreDues; ?>" oninput="myFunctionRD()" />
				</td>
			</tr>


			<tr>
				<td><label class="control-label"> Paid Money</label></td>
				<td><input class="form-control" type="text" id="Paid" name="Paid" placeholder="Paid Money" value="<?php echo $Paid; ?>" oninput="myFunction()" /></td>
			</tr>
			<!-- Recent Kisti -->
			<script>
				function myFunction() {
					var x = Number(document.getElementById("PreDues").value);
					var y = Number(document.getElementById("Paid").value);


					var z = Number(x - y);

					document.getElementById("RecentDues1").value = z;
					document.getElementById("RecentDues").value = z;
				}
			</script>
			<!-- Recent Kisti -->




			<!-- Recent Dues -->


			<tr>
				<td><label class="control-label">Recent Dues</label></td>
				<td>
					<input class="form-control" type="text" id="RecentDues1" name="RecentDues1" placeholder="Recent Dues" value="<?php echo $RecentDues; ?>" disabled="true" />
					<input class="form-control" type="hidden" id="PreDue" name="PreDue" placeholder="Pre Due" value="<?php echo $PreDue; ?>" />
					<input class="form-control" type="hidden" id="TTotal" name="TTotal" placeholder="Today Total" value="<?php echo $TTotal; ?>" />
					<input class="form-control" type="hidden" id="GTotal" name="GTotal" placeholder="Grand Total" value="<?php echo $GTotal; ?>" />
					<input class="form-control" type="hidden" id="RecentDues" name="RecentDues" placeholder="Recent Dues" value="<?php echo $RecentDues; ?>" />
				</td>
			</tr>


			<tr>
				<td><label class="control-label">Date</label></td>
				<td><input class="form-control" type="text" name="Date1" placeholder="Date" value="<?php echo date("m/d/Y"); ?>" disabled="true" />
					<input class="form-control" type="hidden" name="Date" placeholder="Date" value="<?php echo date("Y/m/d"); ?>" />
				</td>
			</tr>

			
			</table>

		<button type="submit" name="btnsave" class="btn btn-primary"> <span class="glyphicon glyphicon-save"></span> &nbsp; Save </button>

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

	<script>
		$("#StuId").on("change", function() {

			var StudentID = $("#StuId").val();
			if (StudentID == "") {
				alert("Please enter a valid Student ID!");
			} else {
				$.ajax({
					url: "ajax_load_payment.php?c=" + StudentID,
					success: function(result) {
						var Student = JSON.parse(result);

						$("#StudentId").val(Student.StId);
						$("#StudentName1").val(Student.Name);
						$("#StudentName").val(Student.Name);
						$("#BatchNo").val(Student.Batch);
						$("#CourseName").val(Student.Course);
						$("#StuPhone").val(Student.StPhone);

						$("#OrderId").val(Student.customerOrderId);
						$("#PreDues1").val(Student.customerDues);
						$("#PreDues").val(Student.customerDues);
						$("#PreDue").val(Student.PreviousDue);
						$("#TTotal").val(Student.TodayTotal);
						$("#GTotal").val(Student.GrandTotal);
						$("#DueStatus").val(Student.Status);



					}
				});
			}
		});
	</script>