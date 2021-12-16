<?php
require 'vendor/autoload.php';
 
$client = new MongoDB\Client;
$GYM = $client->GYM;
$trainer = $GYM->trainer;



if (isset($_REQUEST['trainer'])) {

  $trainer_id =  $_REQUEST['id'];
  $name =  $_REQUEST['name'];
  $time =  $_REQUEST['time'];
  $mobileno =  $_REQUEST['mobileno'];

  $updateQuery = $trainer->updateMany(
	  ["trainer_id" => $_GET["id"]],
	  ['$set' => ["trainer_id" => $trainer_id,"name" => $name,"time" => $time, "mobileno" => $mobileno]]
  );

  $err="<div class='alert alert-success'><b>Trainer Details updated</b></div>";
}


$res = $trainer->findOne([
	"trainer_id" => $_GET["id"]
])

?>

<div class="container">
	<form class="mt-3 form-group" method="post" action="">
		<h3>UPDATE TRAINER</h3>
		 <?php 
    echo @$err;

    ?>
		<label class="mt-3">TRAINER ID</label>
		<input type="text" name="id" value="<?php echo @$res->trainer_id;?>" class="form-control">
		<label class="mt-3">TRAINER NAME</label>
		<input type="text" name="name" value="<?php echo @$res->name;?>" class="form-control">
		<label class="mt-3">TIME</label>
		<input type="text" name="time" value="<?php echo @$res->time;?>" class="form-control">
		<label class="mt-3">MOBILE NO</label>
		<input type="text" name="mobileno" value="<?php echo @$res->mobileno;?>" class="form-control">
		<button class="btn btn-dark mt-3" type="submit" name="trainer">UPDATE</button>
	</form>
</div>