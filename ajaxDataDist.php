<?php   
require_once 'include/conn48.php';
if(isset($_POST["DivId"]) && !empty($_POST["DivId"])){
    $query = $con48->query("SELECT * FROM district WHERE div_id = ".$_POST['DivId']."  ORDER BY id ASC");
    $rowCount = $query->num_rows;
	
    if($rowCount > 0){
        echo '<option value="">Select District </option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['id'].'">'.$row['dist_name'].'</option>';
        } 
    }else{
        echo '<option value=""> District Not Available</option>';
    }
}

?>