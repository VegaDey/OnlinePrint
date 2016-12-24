<?php
header("Content-Type: text/html; charset=utf-8");
sleep(1);
header('Location:files.php');


$file_ext =  strtolower(strrchr($_FILES['somename']['name'],'.'));	// Получаем расширение файла
$file_name = uniqid(rand(10000,99999));					// Генерируем случайное число
$uploadfile  = "upload/".$file_name.$file_ext;				// Формируем путь на сервере

move_uploaded_file($_FILES['somename']['tmp_name'], $uploadfile); 
 
?>



