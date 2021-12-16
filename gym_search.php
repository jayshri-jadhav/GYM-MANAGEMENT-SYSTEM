<?php
require 'vendor/autoload.php';
 
$client = new MongoDB\Client;
$GYM = $client->GYM;
$gym =$GYM->gym;

$name="";

if (isset($_POST['name'])) {
	echo "<div class='container'>";
	echo "<table class='table table-bordered  table-hover mt-3'>";
	echo "<tr>";
	echo "<th>Gym_Id</th>";
	echo "<th>Name</th>";
	echo "<th>Address</th>";
	echo "<th>Type</th>";
	echo "<th>Update</th>";
	echo "<th>Delete</th>";
	echo "</tr>";
	echo "</div>";


	$name=$_POST['name'];

			 
$all = $gym->find([
	"gym_name" => $name
]);

	forEach($all as $row)
	{
		echo "<tr>";
		echo "<td>".$row->gym_id."</td>";
		echo "<td>".$row->gym_name."</td>";
		echo "<td>".$row->address."</td>";
		echo "<td>".$row->type."</td>";
		echo "<td><a href='home.php?id=$row->gym_id&info=update_gym'><i class='fas fa-pencil-alt'></i></a></td>";
		echo  "<td><a href='home.php?id=$row->gym_id&info=delete_gym'><i class='fas fa-trash-alt'></i></a></td>";
		echo "</tr>";

	}
 
	
}




	
?>
