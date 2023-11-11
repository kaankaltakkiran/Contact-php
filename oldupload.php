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
/* 	$error = $_FILES['image']['error']; */

	
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'images/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

    $sql = "INSERT INTO users (username, phonenumber,userimg) VALUES (:name, :number,'$new_img_name')";
    $SORGU = $DB->prepare($sql);

    $SORGU->bindParam(':name',  $name);
    $SORGU->bindParam(':number', $number);

    $SORGU->execute();
    echo "User created";
    echo "<p><a href='index.php'>Back To List</a></p>";
			}else {
				$em = "You can't upload files of this type";
		        header("Location: index.php?error=$em");
			}

}