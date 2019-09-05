<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Welcome to MongoDB Crud Demo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">Shopping Cart</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="AddUser.php">Add User</a>
      </li>

    </ul>
  </div>
</nav>
    <?php
    try {
$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
$qry = new MongoDB\Driver\Query([]);
$rows=$manager->executeQuery("shoppingcart.admin",$qry);

     ?>
     <div class="row align-items-center">
       <div class="col-6">
    <table class="table table-bordered table">
      <tr>
        <td>UserId</td>
        <td>Email</td>
        <td>Password</td>
        <td></td>
        <td></td>

      </tr>
      <?php
      foreach ($rows  as $row)
      {
       ?>
       <tr>
         <td><?php echo $row->_id ; ?></td>
         <td><?php echo  $row->email ; ?></td>
         <td><?php echo $row->password ; ?></td>
         <td> <a href="UpdateAdmin.php?uid=<?php echo $row->_id; ?>" class="btn btn-primary">Edit</a>  </td>
         <td> <a href="php/DeleteAdmin.php?uid=<?php echo $row->_id; ?>" class="btn btn-danger" onClick ='return confirm("Do you want to remove this Record?");' >Delete</a>  </td>

       </tr>
       <?php

     }
   } catch (MongoDB\Driver\Exception  $e) {
die("Error Occured ".$e);
   }
      ?>
    </table>
  </div>
</div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  </body>
</html>
