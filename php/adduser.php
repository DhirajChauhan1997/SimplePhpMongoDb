<?php

$bulk = new MongoDB\Driver\BulkWrite;

$email=$_POST["email"];
$pass=$_POST["pass"];

$admin=[
  '_id' => new MongoDB\BSON\ObjectId,
  'email' => $email,
  'password' => $pass
];

try {
  $bulk -> insert($admin);
  $manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
  $result = $manager -> executeBulkWrite("shoppingcart.admin",$bulk);
  header("Location: ../index.php");
  exit;

} catch (MongoDB\Driver\Exception  $e) {
die("Error Occured ".$e);
}

 ?>
