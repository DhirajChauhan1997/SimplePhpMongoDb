<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Add New User</title>
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
 $id=$_GET["uid"];

 $manager     =   new MongoDB\Driver\Manager("mongodb://localhost:27017");
/* success, error messages to be displayed */
 $messages = array(
  1=>'Record deleted successfully',
  2=>'Error occurred. Please try again',
  3=>'Record saved successfully',
  4=>'Record updated successfully',
  5=>'All fields are required' );

  $result = array();
if($id){
  $filter = ['_id' => new MongoDB\BSON\ObjectID($id)];
  $options = [];
  $query = new MongoDB\Driver\Query($filter,$options);
  $cursor = $manager->executeQuery('shoppingcart.admin', $query);

  foreach($cursor as $row){
    $result ['email'] = $row->email;
    $result ['password'] = $row->password;
    $result ['_id'] = $row->_id;
  }
}

 ?>
    <div class="container">
      <br/>
      <div class="col-6">

        <form class="form" action="php/UpdateAdmin.php" method="post" name="admindata">
          <div class="form-group">
            <input type="hidden" value="<?php echo $result['_id']; ?>" id="uid" name="uid"/>
          </div>
          <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input  type="email" value="<?php echo   $result ['email']; ?>" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" name="pass" placeholder="Password">
            </div>
            <!-- <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" name="cpassword" placeholder="Password">
            </div> -->

            <input id="submit" name="submit" type="submit" class="btn btn-primary" value="Update New"/>
      </form>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
