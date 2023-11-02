<?php

require_once('db.php');


$id    = $_GET['id'];

$sql = "DELETE FROM users WHERE userid = :id";
$SORGU = $DB->prepare($sql);

$SORGU->bindParam(':id', $id);

$SORGU->execute();
echo "User deleted";
echo "<p><a href='index.php'>Listeye Dön</a></p>";