<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Прайс-листы (товары)</title>

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
      <a href="price.php" type="button" class="btn btn-success" role="button">Прайс-листы</a>
      <a href="#" type="button" class="btn btn-default" role="button">Счета</a>
      <a href="setting.php" type="button" class="btn btn-default" role="button">Настройка</a>
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

<p><ol class="breadcrumb">
  <li><a href="index.php">Главная</a></li>
  <li><a href="admin.php">Админ панель</a></li>
  <li class="active">Прайс-лист</li>
</ol></p>

<!-- Добавление прайса -->
<?php
require_once 'config.php'; // подключаем скрипт
 
if(isset($_POST['name']) && isset($_POST['category']) && isset($_POST['price']) && isset($_POST['count']) && isset($_POST['description']) && isset($_POST['shipper']) && isset($_POST['date'])){
 
    // подключаемся к серверу
    $link = mysqli_connect($host, $user, $password, $database) 
        or die("Ошибка " . mysqli_error($link));
    // экранирование символов для mysql
    $name = htmlspecialchars(mysqli_real_escape_string($link, $_POST['name']));
    $category = htmlspecialchars(mysqli_real_escape_string($link, $_POST['category']));
    $price = htmlspecialchars(mysqli_real_escape_string($link, $_POST['price']));
    $count = htmlspecialchars(mysqli_real_escape_string($link, $_POST['count']));
    $description = htmlspecialchars(mysqli_real_escape_string($link, $_POST['description']));
    $shipper = htmlspecialchars(mysqli_real_escape_string($link, $_POST['shipper']));

    $date = date('Y-m-d H:i:s.u'); // Добавляем дату добавления товара

   // создание строки запроса
    $query ="INSERT INTO price VALUES(NULL, '$name','$category','$price','$count','$description','$shipper','$date')";

    // выполняем запрос
    $result = mysqli_query($link, $query) or die ("Ошибка " . mysqli_error($link)); 
    if($result)
    {
        echo "<br><div id='alerts' class='alert alert-success alert-dismissible' role='alert'>
	<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
	Товар успешно добавлен!
	</div>";
    }
    // закрываем подключение
    mysqli_close($link);
}
?>


<!-- Конец Добавление прайса -->

<div class="form-container">
	
	<form class="forms" method="post">
	<div class="row">
		<div class="col-sm-6">
			<div class="form-group">
				<input type="text" name="name" placeholder="Название товара" class="form-control">
			</div>
		</div>

		<div class="col-sm-3">
			<div class="form-group">
				<div class="input-group">
					<input name="price" type="text" class="form-control">
					<span class="input-group-addon">₽</span>
				</div>
			</div>
		</div>

		<div class="col-sm-3">
			<div class="form-group">
				<input type="text" name="count" placeholder="Кол-во #" class="form-control">
			</div>
		</div>

		<div class="col-sm-6">
			<div class="form-group">
<?php
require_once 'config.php'; // подключаем скрипт

$link = mysql_connect($host, $user, $password, $database);
if (!$link) {
    die('Ошибка соединения: ' . mysql_error());
}
if (!mysql_select_db("$database")) {
    echo "Ошибка выбора базы данных $database: " . mysql_error();
    exit;
}

$sql = "SELECT * FROM category";
$result = mysql_query($sql);
if (!$result) {
    echo "Ошибка выполнения запроса: " . mysql_error();
    exit;
}
if (mysql_num_rows($result) == 0) {
    echo "Извините, в базе нет данных.";
    exit;
}
echo '<select name="category" class="form-control">';
echo '<option value="" selected disabled>Выберите категорию</option>';
while ($row = mysql_fetch_assoc($result)) {
    echo '<option name="category" value="' . $row["namecat"] . '">' . $row["namecat"] . '</option>';
}
echo '</select>';
mysql_free_result($result);
mysql_close($link);
?>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group">
<?php
require_once 'config.php'; // подключаем скрипт

$link = mysql_connect($host, $user, $password, $database);
if (!$link) {
    die('Ошибка соединения: ' . mysql_error());
}
if (!mysql_select_db("$database")) {
    echo "Ошибка выбора базы данных $database: " . mysql_error();
    exit;
}

$sql = "SELECT * FROM shipper";
$result = mysql_query($sql);
if (!$result) {
    echo "Ошибка выполнения запроса: " . mysql_error();
    exit;
}
if (mysql_num_rows($result) == 0) {
    echo "Извините, в базе нет данных.";
    exit;
}
echo '<select name="shipper" class="form-control">';
echo '<option value="" selected disabled>Выберите производителя</option>';
while ($row = mysql_fetch_assoc($result)) {
    echo '<option name="shipper" value="' . $row["name"] . '">' . $row["name"] . '</option>';
}
echo '</select>';
mysql_free_result($result);
mysql_close($link);
?>
			</div>
		</div>
	</div><!-- /.row -->
	
	<div class="form-group">
		<textarea class="form-control" name="description" rows="3" placeholder="Описание товара" id="textArea"></textarea>
		<div class="editContent">
		</div>
	</div>


	<div class="form-group">
		<button type="submit" class="btn btn-success btn-wide"><span class="fui-mail"></span> Добавить</button>
	</div>

<input type='hidden' name='date' value='$date' />


	</form>
	</div>



<?php 
require_once 'config.php'; // подключаем скрипт
 
$link = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($link)); 
     
$query ="SELECT * FROM price";
 
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
if($result)
{
    $rows = mysqli_num_rows($result); // количество полученных строк
     
    echo "<div class='panel panel-default'><table class='table table-bordered table-hover'><tr class='success'>
	  <th>Название</th>
	  <th>Поставщик</th>
	  <th>Категория</th>
	  <th>Цена</th>
	  <th>#</th>
	  <th>Описание</th>
	  <th></th>
	  </tr>";
    for ($i = 0 ; $i < $rows ; ++$i)
    
        echo "<tr>";
	    while ($row = mysqli_fetch_row($result)) {
            echo "<td>$row[1]</td>
	  <td>$row[6]</td>
	  <td>$row[2]</td>
	  <td>$row[3]&nbsp;₽</td>
	  <td>$row[4]</td>
	  <td>$row[5]</td>
	  <td><a href='edit_price.php?id=$row[0]'><span title='Редактировать' class='glyphicon glyphicon-cog'></a> <a href='delete_price.php?id=$row[0]'><span title='Удалить' class='glyphicon glyphicon-remove text-danger'></a></td>";
        echo "</tr>";
    }
    echo "</table></div>";
     
    // очищаем результат
    mysqli_free_result($result);
}
 
mysqli_close($link);
?>
  </div>
  <div class="col-sm-4 col-md-2 col-lg-4"></div>
</div>
<!-- Конец Таблицы -->

<div class="row">
  <div class="col-sm-4 col-md-2 col-lg-4"></div>
    <div class="col-sm-4 col-md-8 col-lg-4">
       <blockquote>
          <footer>Необходимо еще доабвить возможность добавления файла</footer>
          <footer>Добавление прайса в базу</footer>
          <footer>Добавить размеры файла</footer>
          <footer>Автоподсчет цены</footer>
       </blockquote>
    </div>
  <div class="col-sm-4 col-md-2 col-lg-4"></div>
</div>




</body>
</html>