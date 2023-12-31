<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
  <div class="container">
<div class='row text-center justify-content-center  mt-3'>
  <h1 class='alert alert-primary mt-3'>Record Update</h1>
<?php
require_once 'db.php';
$id = $_GET['idUser'];
//!Kullanıcı bilgilerini getir
$sql = "SELECT * FROM users WHERE userid = :idUser";
$SORGU = $DB->prepare($sql);
$SORGU->bindParam(':idUser', $id);
$SORGU->execute();
$users = $SORGU->fetchAll(PDO::FETCH_ASSOC);
/*    $user  = $users[0]; */
// echo "<pre>"; print_r($users);
if (isset($_POST['name'])) {

    $name = $_POST['name'];
    $number = $_POST['number'];
    $id = $_GET['idUser'];

    $img_name = $_FILES['image']['name'];
    $img_size = $_FILES['image']['size'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $error = $_FILES['image']['error'];

    // Hata kontrolü
    $errors = array();
    //!Eski fotoğraf adını al
    $old_img_name = $users[0]['userimg'];

    if ($error === 0) {
        if ($img_size > 5242880) {
            $errors[] = "Sorry, your file is too large.";
        } else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            //! Resim türü kontrolü
            $allowed_exs = array("jpg", "jpeg", "png");

            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = 'images/' . $new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);
                //? Eğer yeni fotoğraf yüklendiyse eski fotoğrafı sil
                //?unlink dosya silmek için kullanılır
                unlink('images/' . $old_img_name);
                //!Foto güncellediyse veritabanına yeni fotoğraf adını kaydet
                $sql = "UPDATE users SET username = :name, phonenumber = :number, userimg = '$new_img_name' WHERE userid = :idUser";
            } else {
                $errors[] = "You can't upload files of this type";
            }
        }
    } else {
        //!Foto güncellemediysen eski fotoğrafı kullan
        $sql = "UPDATE users SET username = :name, phonenumber = :number WHERE userid = :idUser";
    }
    //! Hata yoksa veritabanına kaydet
    if (empty($errors)) {
        $SORGU = $DB->prepare($sql);
        $SORGU->bindParam(':name', $name);
        $SORGU->bindParam(':number', $number);
        $SORGU->bindParam(':idUser', $id);
        $SORGU->execute();

        // Eğer yeni fotoğraf yüklendiyse eski fotoğrafı sil
        /*  if (isset($new_img_name)) {
        unlink('images/' . $old_img_name);
        } */

        echo '<script>';
        echo 'alert("User Update Successful!");';
        echo 'window.location.href = "updatePerson.php?idUser=' . $users[0]['userid'] . '";';
        echo '</script>';
    }
}

?>
  <?php
//! Hata mesajlarını göster
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo '
        <div class="container">
    <div class="auto-close alert mt-3 text-center alert-danger" role="alert">
    ' . $error . '
    </div>
    </div>
    ';
    }
}
?>
<form method='POST' enctype="multipart/form-data" class="text-center">
<div class="row text-center justify-content-center">
                    <div class="col-6">
                        <img src="images/<?php echo $users[0]['userimg']; ?>" alt="User Image" class="img-thumbnail" width="300">
                    </div>
                </div>
  <div class="row text-center justify-content-center">
  <div class="col-6">
    <div class="form-floating mb-3">
  <input  type='text' name='name'  class="form-control" value='<?php echo $users[0]['username']; ?>'>
  <label for="floatingInput">Name</label>
</div>
</div>
</div>
<div class="row text-center justify-content-center">
  <div class="col-6">
    <div class="form-floating mb-3">
  <input  type='text' name='number' value='<?php echo $users[0]['phonenumber']; ?>' class="form-control">
  <label for="floatingInput">Phone Number</label>
</div>
</div>
</div>
<div class="row text-center justify-content-center">
  <div class="col-6">
    <div class="form-floating mb-3">
    <input type='file' name='image'>
    <input type='hidden' name='old_image' value="<?php echo "images/{$users[0]['userimg']} " ?>">
    <button type='submit' class="btn btn-success">Update Person </button>
</div>
</div>
</div>
</form>

<p class='text-center'><a href='index.php' class='btn btn-warning' >Back To list</a></p>

</div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="autoCloseAlert.js"></script>
  </body>
</html>
