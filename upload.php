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
    <div class="alert mt-3 text-center alert-info " role="alert">
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
  <h1 class="text-center mt-2">Record Added</h1>
  <?php
//! Hata mesajlarını göster
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo '
        <div class="container">   
    <div class="alert mt-3 text-center alert-danger" role="alert">
    '.$error.'
    </div>
    </div>
    '; 
    }
		//!Kullanıcı ekleme işleminde hata varsa textboxtaki değerleri yazdır.
		echo"
		<form method='POST'  enctype='multipart/form-data' class='text-center'>
    <p>Name:  <input type='text'  name='name'  value='{$users[0]['username']}'></p>
    <p>Phone Number: <input type='text' name='number' value='{$users[0]['phonenumber']}'></p>
    <p>Image: <input type='file' name='image'></p> 
    <p><input type='submit' value='Add'></p>
</form>
		";
}
else{
	//!Kullanıcı ekleme işleminde hata yoksa textboxtaki değerleri yazdırma.
	echo"
	<form method='POST'  enctype='multipart/form-data' class='text-center'>
	<p>Name:  <input type='text'  name='name'</p>
	<p>Phone Number: <input type='text' name='number'</p>
	<p>Image: <input type='file' name='image'></p> 
	<p><input type='submit' value='Add'></p>
</form>
	";
}
?>
<p class='text-center'><a href='index.php' class='btn btn-warning' >Listeye Dön</a></p>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
