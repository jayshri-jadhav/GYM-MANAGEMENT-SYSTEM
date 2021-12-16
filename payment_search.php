<?php

require 'vendor/autoload.php';
 
$client = new MongoDB\Client;
$GYM = $client->GYM;
$payment = $GYM->payment;
$gym = $GYM->gym;
 


if (isset($_POST['id'])) {
	echo "<div class='container'>";
	echo "<table class='table table-bordered  table-hover mt-3'>";
	echo "<tr>";
	echo "<th>Pay_id</th>";
	echo "<th>Amount</th>";
	echo "<th>Update</th>";
	echo "<th>Delete</th>";
	echo "</tr>";
	echo "</div>";


	$id=$_POST['id'];
 

							
		$query = $payment->find([
			"pay_id" => $id
		]);

		
		forEach($query as $row){
			echo "<tr>";
			echo "<td>".$row->pay_id."</td>";
			echo "<td>".$row->amount."</td>";
			echo "<td><a href='home.php?id=$row->pay_id&info=update_payment'><i class='fas fa-pencil-alt'></i></a></td>";
			echo  "<td><a href='home.php?id=$row->pay_id&info=delete_payment'><i class='fas fa-trash-alt'></i></a></td>";
		}
 
	
}
