<?php
require 'db.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
    <h1 class="text-center mt-2 text-danger">Mobile Phone List</h1>
    
    <table class="table table-striped mt-2 cell-border">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Image</th>
      <th scope="col">Name</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Update Person</th>
      <th scope="col">Delete Person</th>
    
    </tr>
  </thead>
  <tbody>
  </div>
    <?php
    $SORGU = $DB->prepare("SELECT * FROM users");
    $SORGU->execute();
    $users = $SORGU->fetchAll(PDO::FETCH_ASSOC);
    //echo '<pre>'; print_r($users);
  
    foreach($users as $user) {
      echo "
      <tr>
      <td>{$user['userid']}</td>
      <td><img src='images/{$user['userimg']}' class='rounded-circle' width='100' height='100'></td>
      <td>{$user['username']}</td>
      <td>{$user['phonenumber']}</td>
      <td><a href='updatePerson.php?idUser={$user['userid']}' class='btn btn-success btn-sm'>Update Person</a></td>
      <td><a href='deletePerson.php?idUser={$user['userid']}' class='btn btn-danger btn-sm'>Delete Person</a></td>
    </tr>    
      ";
    }
    ?>
  </tbody>
</table>
<p class="text-center">
<a type="button" href="insertPerson.php" class="btn btn-primary">Add Person</a>
</p>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" ></script>
  <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script>
  $(document).ready( function () {
		$('.table').DataTable();
  });
  </script>
  </body>
</html>