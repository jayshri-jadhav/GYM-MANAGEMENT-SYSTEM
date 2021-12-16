<?php

require 'vendor/autoload.php';
 
$client = new MongoDB\Client;
$GYM = $client->GYM;
$member = $GYM->member;


$name="";



if (isset($_POST['name'])) {
	echo "<div class='container'>";
	echo "<table class='table table-bordered  table-hover mt-3'>";
	echo "<tr>";
	echo "<th>Mem_Id</th>";
	echo "<th>Name</th>";
	echo "<th>DOB</th>";
	echo "<th>Age</th>";
	echo "<th>Package</th>";
	echo "<th>Mobile No</th>";
	echo "<th>Update</th>";
	echo "<th>Delete</th>";
	echo "</tr>";
	echo "</div>";


	$name=$_POST['name'];

	
		$que = $member->find([
			"name" => $name
		]);

 
	forEach($que as $row)
	{
		echo "<tr>";
		echo "<td>".$row->mem_id."</td>";
		echo "<td>".$row->name."</td>";
		echo "<td>".$row->dob."</td>";
		echo "<td>".$row->age."</td>";
		echo "<td>".$row->package."</td>";
		echo "<td>".$row->mobileno."</td>";
		echo "<td><a href='home.php?id=$row->mem_id&info=update_member'><i class='fas fa-pencil-alt'></i></a></td>";
		echo  "<td><a href='home.php?id=$row->mem_id&info=delete_member'><i class='fas fa-trash-alt'></i></a></td>";

	}
 
}




	
?>
