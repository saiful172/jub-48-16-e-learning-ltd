<?php 
session_start();	
require_once '../../includes/conn.php'; 

$orderId = $_POST['orderId'];

$valid = array('sup_order' => array(), 'sup_order_item' => array());

$sql = "SELECT sup_orders.order_id, sup_orders.order_date, sup_orders.deliver_date, sup_orders.client_name, sup_orders.client_contact, sup_orders.sub_total, sup_orders.vat, sup_orders.total_amount, 
        sup_orders.discount,sup_orders.pre_due, sup_orders.today_total,sup_orders.grand_total, sup_orders.paid, sup_orders.deliver_date_paid, sup_orders.due, sup_orders.payment_type, sup_orders.payment_status
        FROM sup_orders  WHERE sup_orders.order_id = {$orderId} ";

$result = $con->query($sql);
$data = $result->fetch_row();
$valid['sup_order'] = $data;


$con->close();

echo json_encode($valid);

?>