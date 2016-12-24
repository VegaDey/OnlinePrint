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
  <div class="col-md-4"></div>
  <div class="col-md-4">
<?php
require_once 'config.php'; // подключаем скрипт
     
if(isset($_POST['id'])){
 
$link = mysqli_connect($host, $user, $password, $database) 
            or die("Ошибка " . mysqli_error($link)); 
    $id = mysqli_real_escape_string($link, $_GET['id']);
     
    $query ="DELETE FROM price WHERE id = '$id'";


    // выполняем запрос
    $result = mysqli_query($link, $query) or die ("Ошибка " . mysqli_error($link)); 
    if($result)
    {
        echo "<div class='alert alert-success alert-dismissible' role='alert'>
	<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
	Данные успешно удалены.</div>";
    }
    else
    { 
    	echo "<div class='alert alert-danger alert-dismissible' role='alert'>
	<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
	Данные не удалось удалить.</div>";
    }
        echo '<script type="text/javascript">'; 
        echo 'window.location.href="'.$url.'price.php";'; 
        echo '</script>';
   }
 
if(isset($_GET['id']))
{   
    $id = htmlentities($_GET['id']);
    echo "<h2 class='alert alert-danger'>Удалить запись?</h2>
        <form method='POST'>
        <input type='hidden' name='id' value='$id' />
        <input class='btn btn-danger' type='submit' value='Удалить'>
	<a href='price.php' class='btn btn-info' role='button'>Отмена | Назад</a>
        </form>";}

?>
  </div>
  <div class="col-md-4"></div>
</div>


</body>
</html>