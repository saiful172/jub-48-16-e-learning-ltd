<?php include('session.php'); ?>
<?php include('header_link.php'); ?>


<body>
    <div class="container-fluid">
		<br>
            <div class="container-fluid">
				<div class="row">
                <div class="col-lg-12">
                    
						<center><img src="../img/user.jpg" width="50px"><br>
						<span style="font-size:20px;">কর্মচারী  লিষ্ট ( একটিভ ) <br><?php include('name.php'); ?></span>
							</center>	
									
				</div>
				</div>
				
				<br>
				<div class="row">
                <div class="col-lg-12">
                    <table width="100%" class="table table-bordered" style="font-size:13px;">
						<thead>
							<th>ছবি</th>
							<th>কর্মচারী নাম</th>
							<th>ঠিকানা</th>
							<th>মোবাইল</th>
							<th>জন্ম তারিখ</th>
							<th>লিঙ্গ</th>
							<th>Position</th>
							<th>বেতন</th>
							<th>তারিখ হতে</th>
						</thead>
						<tbody>
							<?php
								$eq=mysqli_query($con,"select * from employee where status='1' order by id desc  ");
								while($eqrow=mysqli_fetch_array($eq)){
								
								?>
								<tr>
									<td><img src="../<?php echo ucwords($eqrow['photo']); ?>" width="50px" alt="" /></td>
									<td><?php echo ucwords($eqrow['emp_name']); ?></td>
									

									<td><?php echo $eqrow['address']; ?></td>
									<td><?php echo $eqrow['contact_info']; ?></td>
									<td><?php echo date("M d, Y", strtotime($eqrow['birthdate'])); ?></td>
									<td><?php echo $eqrow['gender']; ?></td>
									<td><?php echo $eqrow['position']; ?></td>
									<td><?php echo $eqrow['salary']; ?></td>
									
									<td><?php echo date("d,M,Y", strtotime($eqrow['hire_date'])); ?></td>
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
	<br>
	
	<?php include('scripts.php'); ?>
	<?php include ('modal.php'); ?>
	
</body>
</html>