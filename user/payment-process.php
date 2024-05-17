<?php

include ('connection.php');
session_start();
// date_default_timezone_set("Asia/Calcutta");
$paymentfor = $_POST['payment_for'];



if ($paymentfor == "E-Vehicle") {
	$paymentid = $_POST['payment_id'];
	$productid = $_POST['product_id'];
	$l_id = $_POST['l_id'];
	$amount = $_POST['amount'];
	// $dt = date('Y-m-d h:i:s');
	$vdate = $_POST['vdate'];
	$vpaytype = $_POST['vpaytype'];
	$vcolor = $_POST['color'];
	$sql = "insert into payment_table (pay_id,l_id,payment_amount,payment_for,product_id) values ('$paymentid','$l_id','$amount','$paymentfor','$productid')";
	$result = mysqli_query($con, $sql);
	$q1 = "INSERT INTO booking_table(vehicle_id, l_id, date_for_booking, payment_type,online_payment_id,color,amount) VALUES ('$productid', '$l_id', '$vdate', '$vpaytype','$paymentid','$vcolor',$amount)";
	$res1 = mysqli_query($con, $q1);
	if ($result && $res1) {
		echo 'done';
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($con);
	}
}




if ($paymentfor == "Services") {
	$sadd = $_POST['sadd'];
	$sdate = $_POST['sdate'];
	$spaytype = $_POST['spaytype'];
	$stname = $_POST['sname'];
	$sid = $_POST['sid'];
	$l_id = $_POST['l_id'];
	$paymentid = $_POST['payment_id'];
	$amount = $_POST['amount'];
	$dt = date('Y-m-d h:i:s');
	$sql = "insert into payment_table (pay_id,l_id,payment_amount,payment_for,product_id) values ('$paymentid','$l_id','$amount','$paymentfor','$sid')";
	$result = mysqli_query($con, $sql);
	$q1 = "INSERT INTO service_booking(service_id, l_id, address, date_for_book_service,payment_type,online_payment_id,store_name,amount) VALUES ('$sid', '$l_id', '$sadd', '$sdate', '$spaytype','$paymentid','$stname','$amount')";
	$res1 = mysqli_query($con, $q1);
	if ($result && $res1) {
		echo 'done';
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($con);
	}
}