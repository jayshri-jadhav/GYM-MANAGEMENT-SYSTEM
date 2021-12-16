<?php

require 'vendor/autoload.php';
 
$client = new MongoDB\Client;
$GYM = $client->GYM;
$payment = $GYM->payment;

$errors = array(); 
if (isset($_REQUEST['payment'])) {

  $pay_id =  $_REQUEST['id'];
  $amount =  $_REQUEST['amount'];
  $gym_id =  $_REQUEST['gym_id'];
  
  $user = $payment->findOne([
    "pay_id" => $pay_id
  ]);
  
  
  if ($user) { 
    if ($user->pay_id === $pay_id) {
      array_push($errors, "<div class='alert alert-warning'><b>ID already exists</b></div>");
    }
  }


  if (count($errors) == 0) {
    $payment->insertOne([
      "pay_id" => $pay_id,
      "amount" => $amount,
      "gym_id" => $gym_id
    ]);

    
    $msg="<div class='alert alert-success'><b>Payment area added successfully</b></div>";
    }
  
}



?>




<div class="container">
	<form class="mt-3 form-group" method="post" action="">
		<h3>ADD PAYMENT AREA</h3>
		 <?php include('errors.php'); 
    echo @$msg;

    ?>
		<label class="mt-3">PAYMENT AREA ID</label>
		<input type="text" name="id" class="form-control">
		<label class="mt-3">AMOUNT</label>
		<input type="text" name="amount" class="form-control">
		<label class="mt-3">GYM ID</label>
		<input type="text" name="gym_id" class="form-control">
		<button class="btn btn-dark mt-3" type="submit" name="payment">ADD</button>
	</form>
</div>