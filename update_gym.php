<?php

require 'vendor/autoload.php';
 
$client = new MongoDB\Client;
$GYM = $client->GYM;
$gym = $GYM->gym;





if (isset($_REQUEST['gym'])) {
  $gym_id =  $_REQUEST['id'];
  $name =  $_REQUEST['name'];
  $address =  $_REQUEST['address'];
  $type =  $_REQUEST['type'];

  $updateQuery = $gym->updateMany(
	  ["gym_id" => $_GET["id"]],
	  ['$set' => ["gym_id" => $gym_id, "gym_name" => $name, "address" => $address, "type" => $type]]
  );

  
  $err="<div class='alert alert-success'><b>Gym Details updated</b></div>";
}


$res = $gym->findOne([
	"gym_id" => $_GET["id"]
])
?>



<div class="container">
	<form class="form-group mt-3" method="post" action="">
		<div><h3>UPDATE GYM</h3></div>
		 <?php  
    echo @$err;

    ?>
		<label class="mt-3">GYM ID</label>
		<input type="text" name="id" value="<?php echo @$res->gym_id;?>" class="form-control">
		<label class="mt-3">GYM NAME</label>
		<input type="text" name="name" value="<?php echo @$res->gym_name;?>" class="form-control">
		<label class="mt-3">GYM ADDRESS</label>
		<input type="text" name="address" value="<?php echo @$res->address;?>" class="form-control">
		<label class="mt-3">GYM TYPE</label>
		<input type="text" name="type" value="<?php echo @$res->type;?>" class="form-control">
		<button class="btn btn-dark mt-3" type="submit" name="gym">UPDATE</button>
	</form>
</div>