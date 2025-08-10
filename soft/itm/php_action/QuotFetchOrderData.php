<?php 
session_start();	
require_once '../../includes/conn.php'; 

$orderId = $_POST['orderId'];

$valid = array('order' => array(), 'order_item' => array());

$sql = "SELECT quot_orders.order_id, quot_orders.order_date, quot_orders.deliver_date, quot_orders.client_name, quot_orders.client_contact, quot_orders.sub_total, quot_orders.vat, 
        quot_orders.discount,quot_orders.grand_total
        FROM quot_orders  WHERE  quot_orders.user_id ='".$_SESSION['id']."' and quot_orders.order_id = {$orderId} ";

$result = $con->query($sql);
$data = $result->fetch_row();
$valid['order'] = $data;


$con->close();

echo json_encode($valid);

?>