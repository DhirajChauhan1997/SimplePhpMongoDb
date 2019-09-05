<?php
$bulk=new MongoDB\Driver\BulkWrite;

$manager     =   new MongoDB\Driver\Manager("mongodb://localhost:27017");

$email='';
$pass='';

if (isset($_POST['submit'])) {
$email=$_POST["email"];
$pass=$_POST["pass"];
$id=$_POST["uid"];

$bulk->update(['_id'=>new MongoDB\BSON\ObjectId($id)],
[
  'email'=>$email,
  'password'=>$pass
]
);
$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
$result = $manager -> executeBulkWrite("shoppingcart.admin",$bulk);
header("Location: ../index.php");
exit;
}
 ?>
