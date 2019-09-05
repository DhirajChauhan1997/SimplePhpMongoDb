<?php
$manager     =   new MongoDB\Driver\Manager("mongodb://localhost:27017");
/* success, error messages to be displayed */

$cursor = $manager->executeQuery('shoppingcart.admin', $query);

 $cursor->findOne(array('username'=> $username, 'password'=> $password));



?>
