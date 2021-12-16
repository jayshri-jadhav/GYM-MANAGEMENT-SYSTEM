<?php
require 'vendor/autoload.php';
 
$client = new MongoDB\Client;
$GYM = $client->GYM;
$member =$GYM->member;
$trainer =$GYM->trainer;
$payment =$GYM->payment;


$inf=$_GET['id'];
 
$deleteQuery = $payment->deleteMany([
	"pay_id" => $inf
 ]);

 header("location:home.php?info=manage_payment");

	
?>