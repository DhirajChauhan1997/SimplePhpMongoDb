<?php
$manager     =   new MongoDB\Driver\Manager("mongodb://localhost:27017");
/* success, error messages to be displayed */
$messages = array(
 1=>'Record deleted successfully',
 2=>'Error occurred. Please try again',
 3=>'Record saved successfully',
 4=>'Record updated successfully',
 5=>'All fields are required' );

 $id   = $_GET['uid'];
   $flag = 0;
   if($id){
     $delRec = new MongoDB\Driver\BulkWrite;
     $delRec->delete(['_id' =>new MongoDB\BSON\ObjectID($id)], ['limit' => 1]);
     $writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);
     $result       = $manager->executeBulkWrite('shoppingcart.admin', $delRec, $writeConcern);

     header("Location: ../index.php");
     exit;
   }


 ?>
