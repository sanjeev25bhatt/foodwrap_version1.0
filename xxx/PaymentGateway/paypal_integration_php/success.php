<?php
session_start();
include 'db_config.php';

echo "test" ;


//Store transaction information from PayPal
$item_number = $_POST['item_number']; 

$txn_id = $_POST['tx'];
$payment_gross = $_POST['amt'];
$currency_code = $_POST['cc'];
$payment_status = $_POST['st'];

//Get product price
$productResult = $db->query("SELECT price FROM products WHERE id = ".$item_number);
$productRow = $productResult->fetch_assoc();
$productPrice = $productRow['price'];

if(!empty($txn_id) && $payment_gross == $productPrice){
    //Inser tansaction data into the database
    $insert = $db->query("INSERT INTO payments(item_number,txn_id,payment_gross,currency_code,payment_status) VALUES('".$item_number."','".$txn_id."','".$payment_gross."','".$currency_code."','".$payment_status."')");
    $last_insert_id = $db->insert_id;
?>
	<h1>Your payment has been successful.</h1>
    <h1>Your Payment ID - <?php echo $last_insert_id; ?>.</h1>
<?php
}else{
?>
	<h1>Your payment has failed.</h1>
<?php
}
?>