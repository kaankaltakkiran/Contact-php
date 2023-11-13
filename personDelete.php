<!-- Kullanıcı gerçekten silenecekse aşağıdaki kodlar çalıştırılır. Asıl işlem merkezi -->
<?php
//?Silme işlemi
require_once('db.php');
$id=$_GET['idUser'];
$sql = "DELETE FROM users WHERE userid = :idUser";
$SORGU = $DB->prepare($sql);
$SORGU->bindParam(':idUser', $id);
 $SORGU->execute(); 
 echo '
                      <div class="container">  
                  <div class="auto-close alert mt-3 text-center alert-info alert-dismissible fade show" role="alert">
                  User Deleted Successfully!!!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  </div>
                  '; 
echo "<p class='text-center mt-3'><a href='index.php' class='btn btn-warning' >Listeye Dön</a></p>";
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Person</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="autoCloseAlert.js"></script>
  </body>
</html>