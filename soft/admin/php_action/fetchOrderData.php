<?php 	

require_once 'core.php';

$orderId = $_POST['orderId'];

$valid = array('order' => array(), 'order_item' => array());

$sql = "SELECT orders.order_id, orders.order_date, orders.deliver_date, orders.client_name, orders.client_contact, orders.sub_total, orders.vat, orders.total_amount, 
        orders.discount,orders.pre_due, orders.today_total,orders.grand_total, orders.paid, orders.deliver_date_paid, orders.due, orders.payment_type, orders.payment_status
        FROM orders  WHERE orders.order_id = {$orderId} ";

$result = $connect->query($sql);
$data = $result->fetch_row();
$valid['order'] = $data;


$connect->close();

echo json_encode($valid);

?>