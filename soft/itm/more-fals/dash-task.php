         
<div class="col-12"> 
              <div class="card recent-sales overflow-auto">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Daily Notes / Task<span> | Reminder</span></h5>

                <?php 	
				 date_default_timezone_set("Asia/Dhaka");
                 $Date=date("Y/m/d");
				 $pq=mysqli_query($con,"select * from daily_notes  where alarm_date='$Date' and user_id='".$_SESSION['id']."' order by id desc limit 5 ");
				 while($pqrow=mysqli_fetch_array($pq)){
				?>
						
			<div class="info" style="background-color: #e7f3fe; border-left:6px solid #2196F3;padding:8px;margin-bottom:8px;">
            <strong><?php echo $pqrow['note_title']; ?></strong><br>
			<?php echo $pqrow['note_details']; ?> 
			</div>  
			
			<?php }?>  
				 
                </div>

              </div>
            </div>
			
