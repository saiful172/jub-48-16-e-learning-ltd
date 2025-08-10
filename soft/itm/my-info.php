
<?php include('header.php'); ?> 
<body>
<center><h4><ol class="breadcrumb"> <li class="active">Settings Panel </li></ol></h4></center>
    <div id="wrapper">
		<div id="page-wrapper">
            <div class="container">
                 
				<div class="row">
                <div class="col-lg-10">
                   <table width="100%" class="table" id="dataTables-example">
                        
                        <tbody>
							<?php
								$dq=mysqli_query($con,"select * from stuff 
								left join `user` on user.userid=stuff.userid  
								where stuff.status='1' and stuff.userid='".$_SESSION['id']."'
								order by stuff.userid asc ");
								while($dqrow=mysqli_fetch_array($dq)){
									$did=$dqrow['userid'];
								?>
								<tr> <td colspan="2"><center><b>My Information </b> <br> Last Expire Date :  <?php echo date("M d,Y", strtotime($dqrow['expire_date'])); ?></center></td></tr> 
								<tr>
								<td><b>User Id  </b></td>
								    <td> <b>:</b>   <?php echo $dqrow['userid']; ?></td> 
								</tr>	
								
								<tr>
								<td><b>Name  </b></td>
								   <td> <b>:</b>   <?php echo $dqrow['stuff_name']; ?></td> 
								</tr>	
									
								<tr>
								<td><b>Position  </b></td>
								   <td> <b>:</b>  <?php echo $dqrow['position']; ?></td>
									 
								</tr>	
								
                              <tr> <td colspan="2"><b><center>Business Information</center></b></td></tr>
								
								<tr>
								<td><b>Name </b></td>
								<td> <b>:</b>  <?php echo $dqrow['business_name']; ?> </td> 
								</tr>
								
								<tr>
								<td><b>Details </b></td>
								<td> <b>:</b>  <?php echo $dqrow['business_details']; ?> </td> 
								</tr>
									
								<tr>
								<td><b>Phone  </b></td>
								<td>  <b>:</b>  <?php echo $dqrow['business_phone']; ?></td> 
								</tr>	
								
								<tr>
								<td><b>Email  </b></td>
								<td> <b>:</b>  <?php echo $dqrow['business_email']; ?></td> 
								</tr>
								
								<tr>
								<td><b>Website </b></td>
								<td> <b>:</b>  <?php echo $dqrow['biz_web']; ?></td> 
								</tr>
								
									
								<tr>
								<td><b>Address  </b></td>
								<td> <b>:</b>  <?php echo $dqrow['business_address']; ?></td> 
								</tr>

                               <tr>
								<td><b>Invoice Name  </b></td>
								<td> <b>:</b>  <?php echo $dqrow['inv_name']; ?></td> 
								</tr>
								
									<tr>
								<td><b>Invoice Welcome  </b></td>
								<td> <b>:</b>  <?php echo $dqrow['invoice_welcome']; ?></td> 
								</tr>								
									
									 <tr> <td colspan="2"><b><center>User / Password</center></b></td></tr>
									 
								<tr>
								<td><b>User  </b></td>
								<td> <b>:</b>  <?php echo $dqrow['username']; ?></td> 
								</tr>	
									
								<tr> 
								<td><b>Password  </b></td>
									<td>  <b>:</b> 
										<?php
											$pass=mysqli_query($con,"select * from `password` where mdfive='".$dqrow['password']."'");
											$passrow=mysqli_fetch_array($pass);
												
											echo $passrow['original'];
										?>
									</td>
								</tr>	
									
								<tr> 
								<td><b>Logo  </b> </td>
									<td>  <img src="../<?php if($dqrow['photo']==""){echo "/img/profile.jpg";}else{echo $dqrow['photo'];} ?>" width="150px"></td>
								</tr>	
								
								<tr> 
								<td><b>Sign Image  </b> </td>
									<td>  <img src="../<?php if($dqrow['sign_img']==""){echo "/img/samiul.png";}else{echo $dqrow['sign_img'];} ?>" width="200px" height="80px"></td>
								</tr>	
								 
								
								<tr>
								<td>
		<!--	<a href="#details_<?php echo $did; ?>" data-toggle="modal" class="btn btn-primary btn-sm"><i class="fa fa-user"></i> Full Details</a> -->
										<a href="#Lock<?php echo $did; ?>" data-toggle="modal" class="btn btn-danger"><i class="fa fa-edit"></i> Password</a>
										<a href="#update<?php echo $did; ?>" data-toggle="modal" class="btn btn-info"><i class="fa fa-edit"></i> Information</a>
										<a href="#Logo<?php echo $did; ?>" data-toggle="modal" class="btn btn-primary"><i class="fa fa-edit"></i> Logo</a>
										<a href="#SignImg<?php echo $did; ?>" data-toggle="modal" class="btn btn-success"><i class="fa fa-edit"></i> Signature</a>
							<!--		<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delemp_<?php echo $did; ?>"><i class="fa fa-trash"></i> Delete </button> -->
										
										<?php include('stuff_edit_details_modal.php'); ?>
										
										</td>
										
								<td></td>
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
	</div>
	<?php include('../includes/footer.php'); ?>
	<?php include ('modal.php'); ?>
	<?php include ('stuff_modal.php'); ?>
	
