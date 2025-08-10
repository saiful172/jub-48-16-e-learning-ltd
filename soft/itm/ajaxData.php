<?php 
require_once '../includes/conn.php';
if(isset($_POST["brand_id"]) && !empty($_POST["brand_id"])){
    $query = $con->query("SELECT * FROM categories1 WHERE brand_id = ".$_POST['brand_id']."  ORDER BY cat_name ASC");
    $rowCount = $query->num_rows;
	
    if($rowCount > 0){
        echo '<option value="">Select Category </option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['cat_id'].'">'.$row['cat_name'].'</option>';
        }
    }else{
        echo '<option value="0"> Category Not Available</option>';
    }
}
if(isset($_POST["cat_id"]) && !empty($_POST["cat_id"])){
    $query = $con->query("SELECT * FROM categories_sub WHERE cat_id = ".$_POST['cat_id']." ORDER BY sub_cat_name ASC");
    $rowCount = $query->num_rows;

    if($rowCount > 0){
        echo '<option value="">Select Sub Category</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['sub_cat_id'].'">'.$row['sub_cat_name'].'</option>';
        }
    }else{
        echo '<option value="0">Sub Category Not Available</option>';
    }
}
?>