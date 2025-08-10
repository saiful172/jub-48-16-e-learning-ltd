	 
	  <div class="col-lg-12">
	  <div class="card">  
      <div class="row">	  
              <div class="col-md-4 text-center p-4">
               <img src="../<?php if ($srow['photo']==""){echo "img/profile.jpg"; } else {echo $srow['photo'];} ?>" width="140px" height="67px" class="rounded">
              </div>
              <div class="col-md-8">
                <div class="card-body"><br>
				
				<?php
								$dq=mysqli_query($con,"select * from stuff 
								left join `user` on user.userid=stuff.userid  
								where stuff.status='1' and stuff.userid='".$_SESSION['id']."'
								order by stuff.userid asc ");
								while($dqrow=mysqli_fetch_array($dq)){
									$did=$dqrow['userid'];
								?>
			        
							
                  		<b><span style="font-size:22px;"> <?php echo $dqrow['business_name']; ?></span></b><br>		  
                  		<b><span style="font-size:15px;"> 
					    <?php echo $dqrow['business_address']; ?>
						</span></b>		  
			

			<?php
								}
							?>	   			  
                </div>
              </div>
            </div>
          </div> 
          </div> 
 
		  
		  <div class="col-lg-12">
		  		  <div class="card">
				  <div class="row">
              <div class="col-md-4 text-center p-3">
                <i style="font-size:65px;" class="bi bi-clock-history text-primary"></i>
              </div>
              <div class="col-md-8">
                <div class="card-body text-center"><br>
                  		<b><span style="font-size:28px;"> <?php include('time.php'); ?></span></b><br>		  
                  		<b><span style="font-size:18px;"> 
						<?php date_default_timezone_set("Asia/Dhaka");
         $date = new DateTime();
         echo $date->format('l - F j, Y');
         ?> </span></b>		  
				   			  
                </div>
              </div>
            </div>
          </div> 
          </div> 
      
		 