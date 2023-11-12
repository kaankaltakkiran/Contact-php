<?php
require_once('db.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Person List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <div class="row">
   
   
  <?php
$sql = "SELECT * FROM users   WHERE userid = :id";
$SORGU = $DB->prepare($sql);
$SORGU->bindParam(':id',$_GET['id']);
$SORGU->execute();
$users = $SORGU->fetchAll(PDO::FETCH_ASSOC);
/* 
 	echo "<pre>";
   print_r($users);
	echo "</pre>"; 
  die(); */

echo"
<div class='col-6'>
<h1 class='text-danger'>User</h1>
<h3>Name: {$users[0]['username']}</h3>
<p>Doctor Id: {$users[0]['userid']}</p>
<p>Doctor Phone: {$users[0]['phonenumber']}</p>
</div>
<div class='col-6'>
<img src='images/{$users[0]['userimg']}' class='img-fluid mt-3' alt='...'>
</div>
</div>
</div>
";

?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>


