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
		$EmpId = $_POST['EmpId'];
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
		else if(empty($Year)){
			$errMSG = "Please Enter Year Name.";
		}
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
$stmt = $DB_con->prepare('INSERT INTO employees_salary_details (user_id,emp_id,year,month, salary,bonus,total_salary,adv_paid,full_paid,recent_due,entry_date,sal_type,comment) 
			                                     VALUES(:UserId,:EmpId,:Year,:Month,:Salary,:Bonus,:TotalSal,:Adv,:Full,:RecentDues,:Date,4,"Advance Paid" )');
			
			$stmt->bindParam(':UserId',$UserId);
			$stmt->bindParam(':EmpId',$EmpId);
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
                 
                <?php
			}
			else
			{
				$errMSG = "error while inserting....";
			}
		}
	}
?>

<?php 
		
	if(isset($_POST['btnsave']))
	{
		
		$EmpId = $_POST['EmpId'];
		$Year = $_POST['Year'];
		$Month = $_POST['Month'];
		$Salary = $_POST['Salary'];
		$Bonus = $_POST['Bonus'];
		$TotalSal = $_POST['TotalSal'];
		
		$TotalAdv = $_POST['TotalAdv'];
		$Full = $_POST['Full'];
		
		$RecentDues = $_POST['RecentDues'];
		
		$Status = $_POST['Status'];
		$Date = $_POST['Date'];
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('UPDATE employees_salary 
									     SET year=:Year, 
										     month=:Month, 
										     salary=:Salary,
										     bonus=:Bonus,
										     total_salary=:TotalSal,
										     adv_paid=:TotalAdv,
										     full_paid=:Full,
										     recent_due=:RecentDues,
										     status=:Status,
											 last_update=:Date
											 
								       WHERE emp_id=:EmpId ');
			
			
			$stmt->bindParam(':EmpId',$EmpId);
			$stmt->bindParam(':Year',$Year);
			$stmt->bindParam(':Month',$Month);
			
			$stmt->bindParam(':Salary',$Salary);
			$stmt->bindParam(':Bonus',$Bonus);
			$stmt->bindParam(':TotalSal',$TotalSal);
			
			$stmt->bindParam(':TotalAdv',$TotalAdv);
			$stmt->bindParam(':Full',$Full);
			$stmt->bindParam(':RecentDues',$RecentDues);
			$stmt->bindParam(':Status',$Status);
			$stmt->bindParam(':Date',$Date);
				
			if($stmt->execute()){
				?>
                <script>
				alert('Advance Paid Successfully...! ');
				window.location.href='salary-advance';
				</script>
                <?php
			}
			else{
				$errMSG = "Sorry Data Could Not Updated !";
			}
		
		}
		
						
	}
	
?>

<?php  require_once 'sidebar.php'; ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Pay Advance Salary</h1> <hr>
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
			  
  <form method="post" enctype="multipart/form-data" class="form-horizontal">
	    
	<table class="table table-responsive">
	
		<?php
				   $pq=mysqli_query($con,"select * from stuff left join `user` on user.userid=stuff.userid where stuff.userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
        <input class="form-control" type="hidden" name="UserId"  value="<?php echo $pqrow['userid']; ?>" />
		<?php }?>
    
	
	<tr>
    	<td><label class="control-label"> Employee  </label></td>
        <td>
		<select class="form-control chosen-select" Id="EmpId" name="EmpId" required="" >
		<option value="#">Select Employee Name</option>
				      	<?php 
				      	$sql = "SELECT distinct  employees_salary.emp_id,employees.emp_name FROM employees_salary 
                        left join employees on employees.id=employees_salary.emp_id 
                        where employees_salary.status=1				";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} 
				      	?>
		</select> 
		</td>
		
    </tr>
	
 <tr>
    	<td><label class="control-label"> Name |  Position</label></td>
        <td>
		<input style="width:49%;float:left;" class="form-control text-center" type="text" id="EmpName" name="EmpName" placeholder="Employee's Name " value="<?php echo $EmpName;  ?>" disabled="true" >
		<input style="width:49%;float:left;margin-left:5px;" class="form-control text-center" type="text" id="Position" name="Position" placeholder="Position" value="<?php echo $Position;  ?>" disabled="true" >
		</td>
   </tr>
     
	 <tr>
    	<td><label class="control-label">Year |  Month</label></td>
        <td> 
		<input style="width:49%;float:left;" class="form-control text-center" type="text" id="Year1" name="Year1" placeholder="Year" value="<?php echo $Year; ?>" disabled="true">
		<input class="form-control" type="hidden" id="Year" name="Year" placeholder="Year" value="<?php echo $Year; ?>" oninput="myFunction()">
		<input style="width:49%;float:left;margin-left:5px;" class="form-control text-center" type="text" id="Month1" name="Month1" placeholder="Month" value="<?php echo $Month; ?>" disabled="true">
		<input class="form-control" type="hidden" id="Month" name="Month" placeholder="Month" value="<?php echo $Month; ?>"  >
		</td>
    </tr>
	
    <tr>
    	<td><label class="control-label">Salary + Bonus = Total</label></td>
        <td>
		<input style="width:32.5%;float:left;" class="form-control text-center" type="text" id="Salary" name="Salary" placeholder="Salary" value="<?php echo $Salary; ?>" oninput="myFunction()" readonly="readonly">
		<input style="width:32.5%;float:left;margin-left:5px;;" class="form-control text-center" type="text" id="Bonus" name="Bonus" placeholder="Bonus" value="<?php echo $Bonus; ?>" oninput="myFunction()" readonly="readonly">
		<input style="width:32.5%;float:left;margin-left:5px;" class="form-control text-center" type="text" id="TotalSal" name="TotalSal" placeholder="Salary+Bonus" value="<?php echo $TotalSal; ?>" oninput="myFunction()" readonly="readonly">
		</td>
    </tr>
	 
    <tr>
    	<td><label class="control-label"> Pre Advance  </label></td>
        <td>
		<input class="form-control" type="text" id="PreAdv" name="PreAdv" placeholder="Pre Advance " value="0" oninput="myFunction()" disabled="true">
		</td>
    </tr>	
   
	<tr>
    	<td><label class="control-label"> Advance | Total Advance  </label></td>
        <td>
		<input style="width:49%;float:left;" class="form-control text-center" type="text" id="Adv" name="Adv" placeholder="Advance  " value="0" oninput="myFunction()">
		<input style="width:49%;float:left;margin-left:5px;" class="form-control text-center" type="text" id="TotalAdv1" name="TotalAdv1" placeholder="Total Advance  " value="0" oninput="myFunction()" disabled="true" >
		<input class="form-control" type="hidden" id="TotalAdv" name="TotalAdv" placeholder="Total Advance  " value="0" oninput="myFunction()"   >
		</td>
    </tr>
	 
	
	<tr style="display:none;" >
    	<td><label class="control-label"> Only Pay Salary </label></td>
        <td><input class="form-control" type="text" id="Full" name="Full" placeholder="Total Salary" value="0" oninput="myFunction()"></td>
    </tr>
	
<!-- Recent Kisti -->	
	<script>
  function myFunction() {
    var s = Number (document.getElementById("Salary").value);
    var b = Number (document.getElementById("Bonus").value);
    var pa = Number (document.getElementById("PreAdv").value);
    var a = Number (document.getElementById("Adv").value);
    var f = Number (document.getElementById("Full").value);
	
	var GTA = Number (pa + a); // Total ADV
	
	var TS = Number (s + b); // Total Salary
	var TP = Number (GTA + f); // Total TotalSal 
	var z = Number (TS - TP);

    document.getElementById("TotalSal").value = TS;
    document.getElementById("TotalAdv").value = GTA;
    document.getElementById("TotalAdv1").value = GTA;
    document.getElementById("RecentDues1").value = z;
    document.getElementById("RecentDues").value = z;
	                  }
  </script>
<!-- Recent Kisti -->	
   
	

    
<!-- Recent Dues -->		

  
	<tr>
    	<td><label class="control-label">Current Dues</label></td>
        <td>
        <input class="form-control text-center" type="text" id="RecentDues1" name="RecentDues1" placeholder="Current Dues" value="<?php echo $RecentDues; ?>" disabled="true" />
        <input class="form-control" type="hidden" id="RecentDues" name="RecentDues" placeholder="Recent Dues" value="<?php echo $RecentDues; ?>" />
		</td>
    </tr>
	
	<tr >
    	<td><label class="control-label">Salary Status</label></td>
       	<td><select style="width:100%;" class="form-control" name="Status"  value="<?php echo $status; ?>" />
		<option value="1">Paying</option>  
		</select> </td>       
	</tr>
	
	
	    
		<tr>
    	<td><label class="control-label">Date </label></td>
        <td>
		<input class="form-control" type="Date" name="Date" placeholder="" value="<?php echo date('Y-m-d'); ?>" />
		</td>
    </tr>
	
   
    
    </table>
	
	
	 <tr>
        <td colspan="2"><button type="submit" name="btnsave" class="btn btn-primary">
        <span class="glyphicon glyphicon-save"></span> &nbsp; Save
        </button>
		 <a class="btn btn-danger" href="salary-advance"> <span class="glyphicon glyphicon-backward"></span> Cancel </a>
        
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
			$.ajax({url: "ajax_c_load_salary.php?c=" + customerID, success: function(result){
				var customer = JSON.parse(result);
				$("#EmpName").val(customer.empName);
				$("#Position").val(customer.empPosi);
				$("#Year1").val(customer.empYear);
				$("#Year").val(customer.empYear);
				$("#Month1").val(customer.empMonth);
				$("#Month").val(customer.empMonth);
				$("#Salary").val(customer.empSalary);
				$("#Bonus").val(customer.empBonus);
				$("#TotalSal").val(customer.empTotalSal);
				$("#PreAdv").val(customer.empAdvPaid);
				$("#Full").val(customer.empFullPaid);
				$("#RecentDues1").val(customer.empRecDue);
				$("#RecentDues").val(customer.empRecDue);
											
			}});
		}
	});
</script>

<script src = "js/chosen.js"></script>
<script type = "text/javascript">
	$('.chosen-select').chosen({width:"100%"});
</script>