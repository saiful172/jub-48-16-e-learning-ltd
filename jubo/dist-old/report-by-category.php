           
		   <form class="form-horizontal" target="_blank" action="open-dist.php" method="post" id="getOrderReportForm">
			 
			 <div class="form-row mt-3"> 
				<div class="col-md-3 form-group text-center">
				<h3> District Wise Reports </h3>
				</div>
				
				<div class="col-md-2 form-group">
	             <select Id="DistId" name="DistId" class="form-control" required>
                <option value="" >Select District</option>
                   <?php 
				       $sl=0;
				      	$sql = "SELECT distinct student_list.district,district.dist_name,district.id FROM student_list 
						left join district on district.id=student_list.district 
						order by student_list.student_id ASC ";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".++$sl."-".$row[1]."</option>";
								} // while
								
				      	?>
                 </select> 
                </div>
				
				<div class="col-md-2 form-group">
	             <select Id="Batch" name="Batch" class="form-control" required>
                <option value="" >Select Batch</option>
				<option value="1">Batch-1</option>
		        <option value="2">Batch-2</option>                     
		        <option value="3">Batch-3</option>                     
                 </select> 
                </div>
				
				<div class="col-md-2 form-group">
	             <select Id="Group" name="Group" class="form-control" required>
                <option value="" >Select Group</option>
				<option value="1">Group-A</option>
		        <option value="2">Group-B</option>                     
                 </select> 
                </div>
				
				 <div class="col-md-2 form-group">
                  <button target="_blank" type="submit" class="btn btn-success" id="generateReportBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Open  Report  </button>
                </div>
				 
				  
              </div>
			    
            
			</form>	
			
			 

<script src="custom/js/report.js"></script> 
