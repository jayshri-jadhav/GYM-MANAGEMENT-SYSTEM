<?php
require 'vendor/autoload.php';
 
$client = new MongoDB\Client;
$GYM = $client->GYM;
$member =$GYM->member;
$trainer =$GYM->trainer;


$inf=$_GET['id'];

$deleteQuery = $trainer->deleteMany([
	"trainer_id" => $inf
]);

header("location:home.php?info=manage_trainer");


?>