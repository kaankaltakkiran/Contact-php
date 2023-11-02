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
  </head>
  <body>
    <h1 class="text-center mt-2">Mobile Phone List</h1>
    
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Image</th>
      <th scope="col">Name</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Update</th>
      <th scope="col">Delete</th>
    
    </tr>
  </thead>
  <tbody>
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
      <td><a href='updatePerson.php?id={$user['userid']}' class='btn btn-success btn-sm'>Update</a></td>
      <td><a href='deletePerson.php?id={$user['userid']}' class='btn btn-danger btn-sm'>Delete </a></td>
    </tr>    
      ";
    }
    ?>
  </tbody>
</table>
<p class="text-center">
<a type="button" href="insertPerson.php" class="btn btn-primary">Add Person</a>
</p>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>