<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Найстройки</title>

    <link href="css/style.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />

</head>

<body>

    <!-- Начало Меню -->
    <div class="row">
        <div class="col-sm-4 col-md-2 col-lg-4"></div>
        <div class="col-sm-4 col-md-8 col-lg-4">
            <div class="btn-group" role="group" aria-label="Default button group">
<a href="index.php" type="button" class="btn btn-primary" role="button">На главную</a>
<a href="admin.php" type="button" class="btn btn-default" role="button">Админ панель</a>
<a href="price.php" type="button" class="btn btn-default" role="button">Прайс-листы</a>
<a href="#" type="button" class="btn btn-default" role="button">Счета</a>
<a href="setting.php" type="button" class="btn btn-success" role="button">Настройка</a>
<a href="files.php" type="button" class="btn btn-default" role="button">Файлы</a>
            </div>
        </div>
        <div class="col-sm-4 col-md-2 col-lg-4"></div>
    </div>
    <!-- Конец Меню -->

    <!-- Начало Таблицы -->
    <div class="row">
        <div class="col-sm-4 col-md-2 col-lg-4"></div>
        <div class="col-sm-4 col-md-8 col-lg-4">
            <p>
<ol class="breadcrumb">
<li><a href="index.php">Главная</a></li>
<li><a href="admin.php">Админ панель</a></li>
<li class="active">Настройка</li>
</ol>
            </p>

<!-- Скрипт добавление производителей -->
<?php
require_once 'config.php'; // подключаем скрипт
 
if(isset($_POST['shipper'])){
 
    // подключаемся к серверу
    $link = mysqli_connect($host, $user, $password, $database) 
        or die("Ошибка " . mysqli_error($link)); 

    // экранирование символов для mysql
    $name = htmlspecialchars(mysqli_real_escape_string($link, $_POST['shipper']));

    // создание строки запроса
    $query ="INSERT INTO shipper VALUES(NULL, '$name')";

    // выполняем запрос
    $result = mysqli_query($link, $query) or die ("Ошибка " . mysqli_error($link)); 
    if($result)
    {
        echo "<br><div id='alerts' class='alert alert-success alert-dismissible' role='alert'>
	<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
	Запись успешно добавлена!
	</div>";
    }

    // закрываем подключение
    mysqli_close($link);
}
?>
<!-- конец скрипта добавления производителей -->

<!-- Форма добавления производителей -->
<h3>Поставщики</h3>
<form class="form-inline" method="POST">
<input type="text" id="shipper" name="shipper" class="form-control" placeholder="Введите поставщика" />
<button type="submit" class="btn btn-info">Добавить</button>
</form>
</p>
<!-- Конец формы добавление производителей -->

<!-- Начало таблицы производителей -->
<?php 
require_once 'config.php'; // подключаем скрипт
 
$link = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($link)); 

$query ="SELECT * FROM shipper";
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
if($result)
{
    $rows = mysqli_num_rows($result); // количество полученных строк

    echo "<div class='panel panel-default'><table class='table table-bordered table-hover'><tr class='success'><th>ID</th><th>Поставщики производители</th><th>Управление</th></tr>";
    for ($i = 0 ; $i < $rows ; ++$i)
    
        echo "<tr>";
	    while ($row = mysqli_fetch_row($result)) {
            echo "<td>$row[0]</td><td>$row[1]</td><td><a href='edit_shipper.php?id=$row[0]'><span title='Редактировать' class='glyphicon glyphicon-cog'></a> <a href='delete_shipper.php?id=$row[0]'><span title='Удалить' class='glyphicon glyphicon-remove text-danger'></a></td>";
        echo "</tr>";
    }
    echo "</table></div>";

    // очищаем результат
    mysqli_free_result($result);
}
mysqli_close($link);
?>
<!-- Конец таблицы производителей -->

<!-- Скрипт добавление категорий -->
<?php
require_once 'config.php'; // подключаем скрипт
 
if(isset($_POST['category'])){
 
    // подключаемся к серверу
    $link = mysqli_connect($host, $user, $password, $database) 
        or die("Ошибка " . mysqli_error($link)); 

    // экранирование символов для mysql
    $namecat = htmlspecialchars(mysqli_real_escape_string($link, $_POST['category']));

    // создание строки запроса
    $query ="INSERT INTO category VALUES(NULL, '$namecat')";

    // выполняем запрос
    $result = mysqli_query($link, $query) or die ("Ошибка " . mysqli_error($link)); 
    if($result)
    {
        echo "<br><div id='alerts' class='alert alert-success alert-dismissible' role='alert'>
	<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
	Запись успешно добавлена!
	</div>";
    }

    // закрываем подключение
    mysqli_close($link);
}
?>
<!-- конец скрипта добавления категорий -->

<!-- Форма добавления категорий -->
<h3>Категории</h3>
<form class="form-inline" method="POST">
    <input type="text" id="category" name="category" class="form-control" placeholder="Введите категорию" />
    <button type="submit" class="btn btn-info">Добавить</button>
</form>
</p>
<!-- Конец формы добавления категорий -->

<!-- Начало таблицы категорий -->
<?php 
require_once 'config.php'; // подключаем скрипт
 
$link = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($link)); 

$query ="SELECT * FROM category";
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
if($result)
{
    $rows = mysqli_num_rows($result); // количество полученных строк
     
    echo "<div class='panel panel-default'><table class='table table-bordered table-hover'><tr class='success'><th>ID</th><th>Категория товара</th><th>Управление</th></tr>";
    for ($i = 0 ; $i < $rows ; ++$i)
    
        echo "<tr>";
	    while ($row = mysqli_fetch_row($result)) {
            echo "<td>$row[0]</td><td>$row[1]</td><td><a href='edit_cat.php?id=$row[0]'><span title='Редактировать' class='glyphicon glyphicon-cog'></a> <a href='delete_cat.php?id=$row[0]'><span title='Удалить' class='glyphicon glyphicon-remove text-danger'></a></td>";
        echo "</tr>";
    }
    echo "</table></div>";
     
    // очищаем результат
    mysqli_free_result($result);
}
 
mysqli_close($link);
?>
<!-- Конец таблицы категорий -->

        </div>
        <div class="col-sm-4 col-md-2 col-lg-4"></div>
    </div>

    </div>
    <div class="col-sm-4 col-md-2 col-lg-4"></div>
    </div>


</body>

</html>