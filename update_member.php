<?php
require 'vendor/autoload.php';
 
$client = new MongoDB\Client;
$GYM = $client->GYM;
$member =$GYM->member;




if (isset($_REQUEST['member'])) {

  $mem_id =  $_REQUEST['id'];
  $name =  $_REQUEST['name'];
  $age =  $_REQUEST['age'];
  $dob =  $_REQUEST['dob'];
   $package =  $_REQUEST['package'];
  $mobileno =  $_REQUEST['mobileno'];
 

$update_query = $member->updateMany(
	["mem_id" => $_GET["id"]],
	['$set' => ["mem_id"=>$mem_id,"name"=>$name,"age"=>$age,"dob"=>$dob,"package"=>$package,"mobileno"=>$mobileno]]
);

 
  $err="<div class='alert alert-success'><b>Member Area Details updated</b></div>";
}
 

$res = $member->findOne([
	"mem_id" => $_GET["id"]
]);

?>

<div class="container">
	<form class="form-group mt-3" method="post" action="">
		<div><h3>UPDATE MEMBER</h3></div>
		 <?php  
    echo @$err;

    ?>
		<label class="mt-3">MEMBER ID</label>
		<input type="text" name="id" value="<?php echo @$res->mem_id;?>" class="form-control">
		<label class="mt-3">MEMBER NAME</label>
		<input type="text" name="name" value="<?php echo @$res->name;?>" class="form-control">
		<label class="mt-3">AGE</label>
		<input type="text" name="age" value="<?php echo @$res->age;?>" class="form-control">
		<label class="mt-3">DOB</label>
		<input type="text" name="dob" value="<?php echo @$res->dob;?>" class="form-control">
		<label class="mt-3">PACKAGE</label>
		<input type="text" name="package" value="<?php echo @$res->package;?>" class="form-control">
		<label class="mt-3">MOBILE NO</label>
		<input type="text" name="mobileno" value="<?php echo @$res->mobileno;?>" class="form-control">
		<button class="btn btn-dark mt-3" type="submit" name="member">UPDATE</button>
	</form>
</div>