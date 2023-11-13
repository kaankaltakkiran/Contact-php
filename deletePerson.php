<!-- Kişisel sayfayı açıyor ve id ye göre kişiyi listeliyor -->
<!-- Kişi silinecekse frontend kısmında modal ile tekrar onay alma yeri. -->
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
    <link href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
  </head>
  <body>
<?php
//? id ye göre kişiyi listeleme
$sql = "SELECT * FROM users   WHERE userid = :idUser";
$SORGU = $DB->prepare($sql);
$SORGU->bindParam(':idUser',$_GET['idUser']);
$SORGU->execute();
$users = $SORGU->fetchAll(PDO::FETCH_ASSOC);
/* 
 	echo "<pre>";
   print_r($users);
	echo "</pre>"; 
  die(); */
//!Kullanıcı silmeden önce modal ile tekrar onay alma
  echo"
  <!-- Modal -->
  <div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
    <div class='modal-dialog'>
      <div class='modal-content'>
        <div class='modal-header'>
          <h1 class='modal-title fs-5' id='exampleModalLabel'>Delete {$users[0]['username']}? </h1>
          <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
        </div>
        <div class='modal-body'>
        Are you sure you want to delete the contact?
        </div>
        <div class='modal-footer'>
          <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
          <a href='personDelete.php?idUser={$users[0]['userid']}' class='btn btn-danger'>Delete </a>
        </div>
      </div>
    </div>
  </div>
  ";
  ?>
    <div class="container">
      <h1 class="text-center mt-2 text-danger">Person</h1>
      <table class="table table-striped mt-2 cell-border">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Image</th>
        <th scope="col">Name</th>
        <th scope="col">Phone Number</th>
        <th scope="col">Delete Person</th> 
      </tr>
    </thead>
    <tbody>
    </div>
    <?php
    //!Kişileri listeleme
  foreach($users as $user) {
    echo "
    <tr>
    <td>{$user['userid']}</td>
    <td><img src='images/{$user['userimg']}' class='rounded-circle' width='100' height='100'></td>
    <td>{$user['username']}</td>
    <td>{$user['phonenumber']}</td>
    <td><a href='personDelete.php?id={$user['userid']}'  data-bs-toggle='modal' data-bs-target='#exampleModal' class='btn btn-danger btn-sm'>Delete </a></td>
  </tr>    
    ";
  }
  ?>
   </tbody>
</table>
<p class='text-center'><a href='index.php' class='btn btn-warning' >Listeye Dön</a></p>
<!-- Bootstrap ve jQuery kütüphaneleri -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
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