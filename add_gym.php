<?php

require 'vendor/autoload.php';
 
$client = new MongoDB\Client;
$GYM = $client->GYM;
$gym =$GYM->gym;

$errors = array(); 
if (isset($_REQUEST['gym'])) {

  $gym_id = $_REQUEST['id'];
  $name = $_REQUEST['name'];
  $address =  $_REQUEST['address'];
  $type = $_REQUEST['type'];
  
  $user = $gym->findOne([
    "gym_id" => $gym_id
  ]);

  
  if ($user) { 
    if ($user->gym_id === $gym_id) {
      array_push($errors, "<div class='alert alert-warning'><b>ID already exists</b></div>");
    }
  }

  if (count($errors) == 0) {
    $gym->insertOne([
      "gym_id" => $gym_id,
      "gym_name" => $name,
      "address" => $address,
      "type" => $type
    ]);

    $msg="<div class='alert alert-success'><b>Gym added successfully</b></div>";
    
  }
}

?>

<div class="w3-container">
	<form class="form-group mt-3" method="post" action="">
		<div><h3>ADD GYM</h3></div>
		 <?php include('errors.php'); 
    echo @$msg;

    ?>
		<label class="mt-3">GYM ID</label>
		<input type="text" name="id" class="form-control">
		<label class="mt-3">GYM NAME</label>
		<input type="text" name="name" class="form-control">
		<label class="mt-3">GYM ADDRESS</label>
		<input type="text" name="address" class="form-control">
		<label class="mt-3">GYM TYPE</label>
		<select name="type" class="form-control mt-3">
    <option value="unisex">UNISEX</option>
    <option value="women">WOMEN</option>
    <option value="men">MEN</option>  
    </select>
		<button class="btn btn-dark mt-3" type="submit" name="gym">ADD</button>
	</form>
</div>