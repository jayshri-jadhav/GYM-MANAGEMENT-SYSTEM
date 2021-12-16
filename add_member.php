<?php

require 'vendor/autoload.php';
 
$client = new MongoDB\Client;
$GYM = $client->GYM;
$member = $GYM->member;

$errors = array(); 
if (isset($_REQUEST['member'])) {

  $mem_id =  $_REQUEST['id'];
  $name =  $_REQUEST['name'];
  $age =  $_REQUEST['age'];
  $dob =  $_REQUEST['dob'];
  $package =  $_REQUEST['package'];
  $mobileno =  $_REQUEST['mobileno'];
  $pay_id =  $_REQUEST['pay_id'];
  $trainer_id =  $_REQUEST['trainer_id'];
  
  $user = $member->findOne([
    "mem_id" => $mem_id
  ]);
  
 
  
  if ($user) { 
    if ($user->mem_id === $mem_id) {
      array_push($errors, "<div class='alert alert-warning'><b>ID already exists</b></div>");
    }
  }


  if (count($errors) == 0) {
  
    $member->insertOne([
      "mem_id"=>$mem_id,
      "name"=>$name,
      "age"=>$age,
      "dob"=>$dob,
      "package"=>$package,
      "mobileno"=>$mobileno,
      "pay_id"=>$pay_id,
      "trainer_id"=>$trainer_id
    ]);

    
    $msg="<div class='alert alert-success'><b>Member added successfully</b></div>";
    
    }
  
}



?>

<div class="container">
	<form class="form-group mt-3" method="post" action="">
		<div><h3>ADD MEMBER</h3></div>
		 <?php include('errors.php'); 
    echo @$msg;

    ?>
		<label class="mt-3">MEMBER ID</label>
		<input type="text" name="id" class="form-control">
		<label class="mt-3">MEMBER NAME</label>
		<input type="text" name="name" class="form-control">
		<label class="mt-3">AGE</label>
		<input type="text" name="age" class="form-control">
		<label class="mt-3">DOB</label>
		<input type="text" name="dob" class="form-control">
		<label class="mt-3">PACKAGE</label>
		<input type="text" name="package" class="form-control">
		<label class="mt-3">MOBILE NO</label>
		<input type="text" name="mobileno" class="form-control">
		<label class="mt-3">PAYMENT AREA ID</label>
		<input type="text" name="pay_id" class="form-control">
		<label class="mt-3">TRAINER ID</label>
		<input type="text" name="trainer_id" class="form-control">
		<button class="btn btn-dark mt-3" type="submit" name="member">ADD</button>
	</form>
</div>