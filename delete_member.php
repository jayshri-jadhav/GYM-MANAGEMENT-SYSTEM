<?php
require 'vendor/autoload.php';
 
$client = new MongoDB\Client;
$GYM = $client->GYM;
$member =$GYM->member;


$inf=$_GET['id'];

	 $query = $member->deleteMany([
		 "mem_id" => $inf 
	 ]);
	
 
      header("location:home.php?info=manage_member");
 
	
?>