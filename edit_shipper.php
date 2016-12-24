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
if(isset($_POST['name']) && isset($_POST['id'])){
 
    $id = htmlspecialchars(mysqli_real_escape_string($link, $_POST['id']));
    $name = htmlspecialchars(mysqli_real_escape_string($link, $_POST['name']));


    $query ="UPDATE shipper SET name='$name' WHERE id='$id'";
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
    $query ="SELECT * FROM shipper WHERE id = '$id'";

    // выполняем запрос
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 

    //если в запросе более нуля строк
    if($result && mysqli_num_rows($result)>0) 
    {
        $row = mysqli_fetch_row($result); // получаем первую строку
        $name = $row[1];
         
        echo "<h2>Редактирование</h2>
            <form method='POST'>
            <input type='hidden' name='id' value='$id' />
            <p>Имя:<br> 
            <input class='form-control' type='text' name='name' value='$name' /></p>
            <input class='btn btn-success' type='submit' value='Сохранить'>
	    <a href='setting.php' class='btn btn-info' role='button'>Отмена | Назад</a>
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