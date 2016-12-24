<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

<link href="css/style.css" rel="stylesheet">

<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.js"></script>

<link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />

</head>
<body>

<div class="row">
  <div class="col-md-4 col-sm-4 "></div>
  <div class="col-md-4 col-sm-4">
<?php
require_once 'config.php'; // подключаем скрипт

// подключаемся к серверу
$link = mysqli_connect($host, $user, $password, $database) 
        or die("Ошибка " . mysqli_error($link)); 
     
// если запрос POST 
if(isset($_POST['name']) && isset($_POST['category']) && isset($_POST['price']) && isset($_POST['price']) && isset($_POST['count']) && isset($_POST['description']) && isset($_POST['shipper']) && isset($_POST['id'])){
 
    $id = htmlspecialchars(mysqli_real_escape_string($link, $_POST['id']));
    $name = htmlspecialchars(mysqli_real_escape_string($link, $_POST['name']));
    $category = htmlspecialchars(mysqli_real_escape_string($link, $_POST['category']));
    $price = htmlspecialchars(mysqli_real_escape_string($link, $_POST['price']));
    $count = htmlspecialchars(mysqli_real_escape_string($link, $_POST['count']));
    $description = htmlspecialchars(mysqli_real_escape_string($link, $_POST['description']));
    $shipper = htmlspecialchars(mysqli_real_escape_string($link, $_POST['shipper']));

    $query ="UPDATE price SET name='$name', category='$category', price='$price', count='$count', description='$description', shipper='$shipper'  WHERE id='$id'";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
 
    if($result)
	echo "<div class='alert alert-success alert-dismissible' role='alert'>
	<button type='button' class='close' data-dismiss='success' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
	Данные обновлены.
	</div>";
    }


// если запрос GET
if(isset($_GET['id']))
{   
    $id = htmlentities(mysqli_real_escape_string($link, $_GET['id']));
     
    // создание строки запроса
    $query ="SELECT * FROM price WHERE id = '$id'";

    // выполняем запрос
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 

    //если в запросе более нуля строк
    if($result && mysqli_num_rows($result)>0) 
    {
        $row = mysqli_fetch_row($result); // получаем первую строку
        $name = $row[1];
        $category = $row[2];
        $price = $row[3];
	$count = $row[4];
	$description = $row[5];
	$shipper = $row[6];
         
        echo "<h2>Редактирование</h2>
            <form method='POST'>
            <input class='form-control' type='hidden' name='id'		value='$id' />
            <input class='form-control' type='text' name='name'		value='$name' /></p>
            <input class='form-control' type='text' name='category'	value='$category' /></p>
            <input class='form-control' type='text' name='price'	value='$price' /></p>
            <input class='form-control' type='text' name='count'	value='$count' /></p>
            <input class='form-control' type='text' name='description'	value='$description' /></p>
            <input class='form-control' type='text' name='shipper'	value='$shipper' /></p>

            <input class='btn btn-success' type='submit' value='Сохранить'>
	    <a href='price.php' class='btn btn-info' role='button'>Отмена | Назад</a>
            </form>";
         
        mysqli_free_result($result);
    }
}
// закрываем подключение
mysqli_close($link);
?>
  </div>
  <div class="col-md-4 col-sm-4"></div>
</div>

</body>
</html>