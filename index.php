<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Главная страница</title>

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

<?php
require_once 'config.php'; // подключаем скрипт
?>

<div class="row">
  <div class="col-md-4"></div>
 <div class="col-md-4">
<div class="btn-group" role="group" aria-label="Default button group">
<a href="index.php" type="button" class="btn btn-default" role="button">Главная</a>
<a href="shop.php" type="button" class="btn btn-primary" role="button">Магазин</a>
<a href="login.php" type="button" class="btn btn-default" role="button">Админ панель</a>
</div>

</div>

 <div class="col-md-4"></div>
</div>

<div class="row">
  <div class="col-md-4"></div>
  <div class="col-md-4"><br>

<p><ol class="breadcrumb">
  <li><a href="index.php">Главная</a></li>
  <li class="active"><?php echo ($ver); ?></li>
</ol>

<div class="panel panel-default">
  <div class="panel-heading">10.10.16 | Начат проект OnlinePrint CMS | Автор: Газиев Денис</div>
  <div class="panel-body">
	- Разработан скелет сайта<br>
	- Настроена работа с базой (запись, чтение, редактирование)<br>
	- Добавлено хеширование паролей в MD5<br>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">12.12.16</div>
  <div class="panel-body">
	- Добавлена возвожность добавления и редактирования прайс-листа (товаров)<br>
	- Теперь можно загружать файлы напрямую на сервер<br>
  </div>
</div>

Copyright © <?php echo ($year); ?>-<?php echo date('Y') ?> <?php echo ($ver); ?>

  </div>

  <div class="col-md-4"></div>
</div>

</body>
</html>