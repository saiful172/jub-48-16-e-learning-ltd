<!DOCTYPE html>
<html lang="en">

<head>
<?php   require_once 'head_link.php'; ?>

</head>

<body>
 
<?php   require_once 'header1.php'; ?> 

<?php	
	if(isset($_POST['btnsave']))
	{
		$UserId = $_POST['UserId'];
		$EmpId22 = $_POST['EmpId22'];
		$Year = $_POST['Year'];
		$Month = $_POST['Month'];
		$Salary = $_POST['Salary'];
		$Bonus = $_POST['Bonus'];
		$TotalSal = $_POST['TotalSal'];
		
		$Adv = $_POST['Adv'];
		$Full = $_POST['Full'];
		
		$RecentDues = $_POST['RecentDues'];
		
		$Date = $_POST['Date'];
		
		if(empty($UserId)){
			$errMSG = "Please Select Employee Name And Click Ok.";
		}
		else if(empty($EmpId22)){
			$errMSG = "Please Select Employee Name.";
		}
		
		else if(empty($Year)){
			$errMSG = "Please Enter Year Name.";
		}
		
		if (isset($_POST['EmpId22']) && $_POST['EmpId22'] != '') {
		// $contact_info = $_POST['contact_info'];
		$checkQuery = mysqli_query($con, "SELECT * FROM `employees_salary` WHERE user_id='".$_SESSION['id']."' and  `emp_id`='$EmpId22' and `year`='$Year'and `month`='$Month' ");
		if (mysqli_num_rows($checkQuery) > 0) {
		$errMSG = "This Employee Salary Already Created !";
		}
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
$stmt = $DB_con->prepare('INSERT INTO employees_salary (user_id,emp_id,year,month, salary,bonus,total_salary,adv_paid,full_paid,recent_due,entry_date,last_update,status) 
			                                     VALUES(:UserId,:EmpId22,:Year,:Month,:Salary,:Bonus,:TotalSal,:Adv,:Full,:RecentDues,:Date,:Date,1 )');
			
			$stmt->bindParam(':UserId',$UserId);
			$stmt->bindParam(':EmpId22',$EmpId22);
			$stmt->bindParam(':Year',$Year);
			$stmt->bindParam(':Month',$Month);
			
			$stmt->bindParam(':Salary',$Salary);
			$stmt->bindParam(':Bonus',$Bonus);
			$stmt->bindParam(':TotalSal',$TotalSal);
			
			$stmt->bindParam(':Adv',$Adv);
			$stmt->bindParam(':Full',$Full);
			$stmt->bindParam(':RecentDues',$RecentDues);
			
			$stmt->bindParam(':Date',$Date);
			
			if($stmt->execute())
			{
				?>
                <script>
				alert(' Salary Create Successful... ');
				window.location.href='emp-salary-list';
				</script>
                <?php
			}
			else
			{
				$errMSG = "error while inserting....";
			}
		}
		}
	}
?>

<?php  require_once 'sidebar.php'; ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Employee Salary Create |  <span> <a href="emp-salary-list">    <i class="bi bi-table"></i> </a> </span> </h1>
	  <hr>
    </div> 
	
    <section class="section">
      <div class="row">
        <div class="col-lg-8">

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
			  
<form method="post" enctype="multipart/form-data" class="form-horizontal" >
	    
	<table  class="table table-hover table-responsive">
	
		<?php
				   $pq=mysqli_query($con,"select * from stuff left join `user` on user.userid=stuff.userid where stuff.userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
        <input class="form-control" type="hidden" name="UserId"  value="<?php echo $pqrow['userid']; ?>" />
		<?php }?>
    
	
	<tr>
    	<td><label class="control-label"> Employee  Name</label></td>
        <td>
		<select class="form-control chosen-select" Id="EmpId" name="EmpId" required>
		<option value="" >Select Employee  Name</option>
				      	<?php 
				      	$sql = "SELECT  id,emp_name FROM employees where user_id='".$_SESSION['id']."' and  status=1 ";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} 
				      	?>
		</select> 
		<input class="form-control text-center" type="hidden" id="EmpId22" name="EmpId22"   >
		</td>
		
    </tr>
	
	<tr>
    	<td><label class="control-label"> Name |  Position</label></td>
        <td>
		<input style="width:49%;float:left;" class="form-control text-center" type="text" id="EmpName" name="EmpName" placeholder="Employee's Name " value="<?php echo $EmpName;  ?>" readonly>
		<input style="width:49%;float:left;margin-left:5px;" class="form-control text-center" type="text" id="Position" name="Position" placeholder="Position" value="<?php echo $Position;  ?>" disabled="true" >
		</td>
   </tr>
	 
	
	<tr>
    	<td><label class="control-label">  Year  | Month </label></td>
        <td>
		
		<select style="width:49%;float:left;" class="form-select "  name="Year" required> 
		<option value="2023">2023</option>
	    </select>
		
		<select style="width:49%;float:left;margin-left:5px;" class="form-select"  name="Month" required>
		<option value="" > Select Month</option> 
		<option value="January">January</option> 
		<option value="February">February</option>
		<option value="March">March</option>
		<option value="April">April</option>
		<option value="May">May</option>
		<option value="June">June</option>
		<option value="July">July</option>
		<option value="August">August</option>
		<option value="September">September</option>
		<option value="October">October</option>
		<option value="November">November</option>
		<option value="December">December</option>
		</select>
		 
		</td>
    </tr>
	
	 <tr>
    	<td><label class="control-label">Salary | Bonus </label></td>
        <td>
		<input style="width:49%;float:left;" class="form-control text-center" type="text" id="Salary" name="Salary" placeholder="Salary" value="0" oninput="myFunction()">
		<input style="width:49%;float:left;margin-left:5px;" class="form-control text-center" type="text" id="Bonus" name="Bonus" placeholder="Bonus" value="0" oninput="myFunction()">
		</td>
     </tr>
	 
	 <tr>
    	<td><label class="control-label">Salary +  Bonus </label></td>
        <td>
		 <input style="width:99%;" class="form-control text-center" type="text" id="TotalSal" name="TotalSal" placeholder="Salary+Bonus" value="<?php echo $TotalSal; ?>" oninput="myFunction()" readonly="readonly">
		</td>
     </tr>
	  
   
	<tr style="display:none;" >
    	<td><label class="control-label"> Advance Salary </label></td>
        <td><input class="form-control" type="text" id="Adv" name="Adv" placeholder="Advance Salary " value="0" oninput="myFunction()"></td>
    </tr>
	
	<tr style="display:none;" >
    	<td><label class="control-label">Total Salary</label></td>
        <td><input class="form-control" type="text" id="Full" name="Full" placeholder="Total Salary" value="0" oninput="myFunction()"></td>
    </tr>
<!-- Recent Kisti -->	
	<script>
  function myFunction() {
    var s = Number (document.getElementById("Salary").value);
    var b = Number (document.getElementById("Bonus").value);
    var a = Number (document.getElementById("Adv").value);
    var f = Number (document.getElementById("Full").value);
	
	var TS = Number (s + b); // Total Salary
	var TP = Number (a + f); // Total TotalSal 
	var z = Number (TS - TP);

    document.getElementById("TotalSal").value = TS;
    document.getElementById("RecentDues1").value = z;
    document.getElementById("RecentDues").value = z;
	                  }
  </script> 

  
	<tr style="display:none;" >
    	<td><label class="control-label">Current Dues</label></td>
        <td>
        <input class="form-control" type="text" id="RecentDues1" name="RecentDues1" placeholder="Current Dues" value="<?php echo $RecentDues; ?>" disabled="true" />
        <input class="form-control" type="hidden" id="RecentDues" name="RecentDues" placeholder="Recent Dues" value="<?php echo $RecentDues; ?>" />
		</td>
    </tr>
	
	    
		<tr>
    	<td><label class="control-label">Date </label></td>
        <td><input style="width:99%;" class="form-control" type="Date" name="Date" placeholder="" value="<?php echo date('Y-m-d'); ?>" />
		</td>
    </tr>
	    
    </table>
	
    <tr>
        <td colspan="2"><button type="submit" name="btnsave" class="btn btn-primary">
        <span class="glyphicon glyphicon-save"></span> &nbsp; Save
        </button>
        </td>
    </tr>
    
    
</form> 

            </div>
          </div>

          
        </div>

       
    </section>

  </main> 

    <?php  require_once 'footer1.php'; ?>
	
	<script>
	$("#EmpId").on("change", function(){
		
		var customerID = $("#EmpId").val();
		if(customerID == "")
		{
			alert("Please enter a valid customer ID!");
		}
		else{
			$.ajax({url: "ajax_c_load_salary_create.php?c=" + customerID, success: function(result){
				var customer = JSON.parse(result);
				$("#EmpId22").val(customer.empId);
				$("#EmpName").val(customer.empName);
				$("#Position").val(customer.empPosi);
				$("#Salary").val(customer.empSalary);
				
				$("#TotalSal").val(customer.empSalary);
				$("#RecentDues").val(customer.empSalary);
				$("#RecentDues1").val(customer.empSalary);
				
											
			}});
		}
	});
</script>
	
	
<script src = "js/chosen.js"></script>
<script type = "text/javascript">
	$('.chosen-select').chosen({width: "100%"});
</script>