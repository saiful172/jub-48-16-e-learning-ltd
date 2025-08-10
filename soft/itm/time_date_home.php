<div class="card">
		  <div class="cardHeader" style="background-color:black;">
		     <h3> <b><i class="fa fa-clock-o fa-fw"></i> <?php include('time.php'); ?></b></h3></center> 
		  </div>

		  <div class="cardContainer">
		    <p><h4><?php date_default_timezone_set("Asia/Dhaka");
        $date = new DateTime();
        echo $date->format('l - F j, Y');
    ?></h4></p>
		    
		  </div>
		</div> 