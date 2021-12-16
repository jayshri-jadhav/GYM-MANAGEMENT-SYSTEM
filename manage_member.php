<?php 
require 'vendor/autoload.php';

$client = new MongoDB\Client;
$GYM = $client->GYM;
$member = $GYM->member;	   
?>

<div class="container">
	<form class="form-group mt-3" method="post" action="home.php?info=member_search">
		<h3 class="lead">SEARCH MEMBER</h3>
		<input type="text" name="name" class="form-control" placeholder="ENTER MEMBER NAME OR MEMBER ID">
	</form>

	<div class="container">
		<table class="table table-bordered table-hover">
			<tr>
				<th>MEMBER ID</th>
				<th>MEMBER NAME</th>
				<th>AGE</th>
				<th>DOB</th>			
				<th>PACKAGE</th>
				<th>MOBILE NO</th>
				<th>PAYMENT AREA ID </th>
				<th>TRAINER ID</th>

			</tr>
			<?php
 
$all="SELECT * FROM member";

$all = $member->find([]);
forEach($all as $row){
	echo "<tr>";
	echo "<td>".$row->mem_id."</td>";
	echo "<td>".$row->name."</td>";
	echo "<td>".$row->age."</td>";
	echo "<td>".$row->dob."</td>";
	echo "<td>".$row->package."</td>";
	echo "<td>".$row->mobileno."</td>";
	echo "<td>".$row->pay_id."</td>";
	echo "<td>".$row->trainer_id."</td>";
   echo "</tr><br>";
}
 


?>
			
		</table>
	</div>
</div>
