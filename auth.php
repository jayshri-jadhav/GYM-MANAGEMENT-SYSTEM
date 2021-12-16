<?php
session_start();
require 'vendor/autoload.php';
 
$client = new MongoDB\Client;
$GYM = $client->GYM;

if(!isset($_SESSION["uname"])){
header("Location:index.php");
exit(); }
?>