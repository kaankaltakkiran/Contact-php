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
      <div class="row">
			<h1 class='alert alert-primary text-center mt-3'>Record Added</h1>
<?php
if (isset($_POST['name']) && isset($_FILES['image'])) {
	require_once('db.php');

	$name  = $_POST['name'];
  $number = $_POST['number'];

/* 	echo "<pre>";
	print_r($_FILES['image']);
	echo "</pre>"; */

	$img_name = $_FILES['image']['name'];
	$img_size = $_FILES['image']['size'];
	$tmp_name = $_FILES['image']['tmp_name'];
	$error = $_FILES['image']['error'];
  // Hata kontrolü
	$errors = array();

	if ($error === 0) {
		if ($img_size > 125000) {
			$errors[] = "Sorry, your file is too large.";
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);
      //! Resim türü kontrolü
			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'images/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);
         
				// Insert into Database
				$sql = "INSERT INTO users (username, phonenumber,userimg) VALUES (:name, :number,'$new_img_name')";
				$SORGU = $DB->prepare($sql);
		
				$SORGU->bindParam(':name',  $name);
				$SORGU->bindParam(':number', $number);
		
				$SORGU->execute();
				echo '
        <div class="container">
    <div class="auto-close alert mt-3 text-center alert-info " role="alert">
    User Added...
    </div>
    </div>
    ';
			}else {
				$errors[] = "You can't upload files of this type";
			}
		}
	}else {
	/* 	$errors[] = "unknown error occurred!"; */
		$errors[] = "Image Not Selected";
	}

}
?>
<?php
    $SORU = $DB->prepare("SELECT * FROM users");
    $SORU->execute();
    $users = $SORU->fetchAll(PDO::FETCH_ASSOC);
?>

  <?php
//! Hata mesajlarını göster
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo '
        <div class="container">   
    <div class="auto-close alert mt-3 text-center alert-danger" role="alert">
    '.$error.'
    </div>
    </div>
    '; 
    }
}
?>
	<form method='POST' class="needs-validation" novalidate action="upload.php" enctype="multipart/form-data" class="text-center">
  <div class="row text-center justify-content-center">
  <div class="col-6">
    <div class="form-floating mb-3">
  <input  type='text' name='name'  class="form-control" required>
  <label for="floatingInput">Name</label>
  <div class="invalid-feedback">
  Plase Write Name
    </div>
</div>
</div>
</div>
<div class="row text-center justify-content-center">
  <div class="col-6">
    <div class="form-floating mb-3">
  <input  type='text' name='number'  class="form-control" required>
  <label for="floatingInput">Phone Number</label>
  <div class="invalid-feedback">
  Plase Phone Number
    </div>
</div>
</div>
</div>
<div class="row text-center justify-content-center">
  <div class="col-6">
    <div class="form-floating mb-3">
    <input type='file' name='image'>
    <button type='submit' class="btn btn-info">Add Person </button>
</div>
</div>
</div>
</form>
<p class='text-center'><a href='index.php' class='btn btn-warning' >Listeye Dön</a></p>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
		<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()
  </script>
  <script src="autoCloseAlert.js"></script>
  </body>
</html>
