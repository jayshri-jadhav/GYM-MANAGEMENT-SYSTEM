<?php
require 'vendor/autoload.php';
 
$client = new MongoDB\Client;
$GYM = $client->GYM;
$payment =$GYM->payment;

 
if (isset($_REQUEST['payment'])) {

  $pay_id =  $_REQUEST['id'];
  $amount =  $_REQUEST['amount'];


  $update_query = $payment->updateMany(
	  ["pay_id" => $_GET['id']],
	  ['$set' => ["pay_id"=>$pay_id,"amount"=>$amount]]
	);


  $err="<div class='alert alert-success'><b>Payment Area Details updated</b></div>";
}



$res = $payment->findOne([
	"pay_id" => $_GET["id"]
]);
?>
<div class="container">
	<form class="mt-3 form-group" method="post" action="">
		<h3>UPDATE PAYMENT AREA</h3>
		 <?php 
    echo @$err;
    ?>
		<label class="mt-3">PAYMENT AREA ID</label>
		<input type="text" name="id" value="<?php echo @$res->pay_id;?>" class="form-control">
		<label class="mt-3">AMOUNT</label>
		<input type="text" name="amount" value="<?php echo @$res->amount;?>" class="form-control">
		<button class="btn btn-dark mt-3" type="submit" name="payment">UPDATE</button>
	</form>
</div>