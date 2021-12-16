<?php
session_start();
require 'vendor/autoload.php';

$client = new MongoDB\Client;
$GYM = $client->GYM;
$member = $GYM->member;
$trainer = $GYM->trainer;
$payment = $GYM->payment;
$gym = $GYM->gym;

$inf = $_GET['id'];

 $pay_id = $payment->findOne([
	 "gym_id" => $inf
 ]);

 $trainer_id = $trainer->find([
	 "pay_id" => $pay_id
 ]);

 $deleteQuery = $member->deleteMany([
	"trainer_id" => $trainer_id
 ]);


	$deleteQuery2 = $trainer->deleteMany([
		"pay_id" => $pay_id
	 ]);

	 $deleteQuery3 = $payment->deleteMany([
		"gym_id" => $inf
	 ]);



$deleteQuery4=$gym->deleteMany([
	"gym_id" => $inf
]);


header("location:home.php?info=manage_gym");

