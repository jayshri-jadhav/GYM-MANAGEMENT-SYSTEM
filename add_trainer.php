<?php

require 'vendor/autoload.php';
 
$client = new MongoDB\Client;
$GYM = $client->GYM;
$trainer = $GYM->trainer;

$errors = array(); 
if (isset($_REQUEST['trainer'])) {

  $trainer_id =  $_REQUEST['id'];
  $name =  $_REQUEST['name'];
  $time =  $_REQUEST['time'];
  $mobileno =  $_REQUEST['mobileno'];
  $pay_id =  $_REQUEST['pay_id'];
  
  $user = $trainer->findOne([
    "trainer_id" => $trainer_id
  ]);

  
  
  if ($user) { 
    if ($user->trainer_id === $trainer_id) {
      array_push($errors, "<div class='alert alert-warning'><b>ID already exists</b></div>");
    }
  }


  if (count($errors) == 0) {
  
    $trainer->insertOne([
      "trainer_id" => $trainer_id,
      "name" => $name,
      "time" => $time,
      "mobileno" => $mobileno,
      "pay_id" => $pay_id
    ]);

    
    $msg="<div class='alert alert-success'><b>Trainer added successfully</b></div>";
    }
  
}



?>

<div class="container">
	<form class="mt-3 form-group" method="post" action="">
		<h3>ADD TRAINER</h3>
		 <?php include('errors.php'); 
    echo @$msg;

    ?>
		<label class="mt-3">TRAINER ID</label>
		<input type="text" name="id" class="form-control">
		<label class="mt-3">TRAINER NAME</label>
		<input type="text" name="name" class="form-control">
		<label class="mt-3">TIME</label>
		<input type="text" name="time" class="form-control">
		<label class="mt-3">MOBILE NO</label>
		<input type="text" name="mobileno" class="form-control">
		<label class="mt-3">PAYMENT AREA ID</label>
		<input type="text" name="pay_id" class="form-control">
		<button class="btn btn-dark mt-3" type="submit" name="trainer">ADD</button>
	</form>
</div>