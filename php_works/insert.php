<?php
mb_internal_encoding("utf8");
$pdo = new PDO("mysql:dbname=php_site;host=localhost;","root", "mysql");
$pdo->exec("insert into trip_form(image,name,title,evaluation,comments) values('".$_POST['image']."','".$_POST['name']."','".$_POST['title']."','".$_POST['evaluation']."','".$_POST['comments']."');");
header("Location:http://localhost/php_works/index.php");
?>