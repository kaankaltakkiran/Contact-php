<?php

    require_once('db.php');

    if(isset($_POST['name'])){
        ///////////////////////////////////////
        /////////////////////////////////////// GÜNCELLEME İŞLEMİ 
        ///////////////////////////////////////
        // echo "<pre>"; print_r($_POST);
        // echo "<pre>"; print_r($_GET);

        $name  = $_POST['name'];
        $number = $_POST['number'];
        $id    = $_GET['id'];

        $sql = "UPDATE users SET username = :name, phonenumber = :number WHERE userid = :id";
        $SORGU = $DB->prepare($sql);

        $SORGU->bindParam(':name',  $name);
        $SORGU->bindParam(':number', $number);
        $SORGU->bindParam(':id',    $id);

        // die(date("H:i:s"));
        $SORGU->execute();
        echo "User updated";
    }

    $id    = $_GET['id'];

    $sql = "SELECT * FROM users WHERE userid = :id";
    $SORGU = $DB->prepare($sql);
    
    $SORGU->bindParam(':id', $id);
    
    $SORGU->execute();

    $users = $SORGU->fetchAll(PDO::FETCH_ASSOC);
 /*    $user  = $users[0]; */

    // echo "<pre>"; print_r($users);
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
  <h1>Record Update</h1>

<form method='POST'>
    <p>Name:  <input type='text' name='name'  value='<?php echo $users[0]['username'];  ?>'></p>
    <p>Phone Number: <input type='text' name='number' value='<?php echo$users[0]['phonenumber']; ?>'></p>
    <p><input type='submit' value='Update'></p>
</form>

<p><a href='index.php'>Back To list</a></p>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
