	<div class="panel panel-info" style="padding:0px;"> 
		  <div class="cardHeader" style="background-color:white;color:black;font-size:20px;padding:3px;text-align:center;">
		  <a href="notes-remind">Daily Notes / Task </a>    
		  </div>

		  <div class="cardContainer">  
		  
				  
						 
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