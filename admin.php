<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Админ панель</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="Описание">
      <meta name="keywords" content="Ключевые слова">
      <link href="css/style.css" rel="stylesheet">
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
      <link rel="shortcut icon" href="favicon.ico">
      <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/apple-touch-icon-144-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/apple-touch-icon-72-precomposed.png">
      <link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-57-precomposed.png">
   </head>
	
   <body>
      <!-- Menu start -->
      <div class="row">
         <div class="col-sm-4 col-md-2 col-lg-4"></div>
         <div class="col-sm-4 col-md-8 col-lg-4">
            <div class="btn-group" role="group" aria-label="Default button group">
               <a href="index.php" type="button" class="btn btn-primary" role="button">На главную</a>
               <a href="admin.php" type="button" class="btn btn-success" role="button">Админ панель</a>
               <a href="price.php" type="button" class="btn btn-default" role="button">Прайс-листы</a>
               <a href="#" type="button" class="btn btn-default" role="button">Счета</a>
               <a href="setting.php" type="button" class="btn btn-default" role="button">Настройка</a>
               <a href="files.php" type="button" class="btn btn-default" role="button">Файлы</a>
            </div>
         </div>
         <div class="col-sm-4 col-md-2 col-lg-4"></div>
      </div>
      <!-- Menu end -->

      <div class="row">
         <div class="col-sm-4 col-md-2 col-lg-4"></div>
         <div class="col-sm-4 col-md-8 col-lg-4">

	<!-- breadcrumbs start -->
	<p><ol class="breadcrumb">
		<li><a href="index.php">Главная</a></li>
		<li class="active">Админ панель</li>
	</ol></p>
	<!-- breadcrumbs end -->

<?php
require_once 'config.php'; 	// Подключаем скрипт
$tbl_name="shop"; 		// Имя таблицы

// Соединяемся с базой данных
mysql_connect ("$host", "$user", "$password") or die ("cannot connect"); 
mysql_select_db ("$database") or die ("cannot select DB");

// Выбираем базу для запими
$sql="SELECT * FROM $tbl_name";
$result=mysql_query($sql);
?>

<div class='panel panel-default'>

<table class="table table-bordered table-hover">
  <tr class='success'>
    <td colspan="8" >Новые заказы</td>
  </tr>
  <tr>
    <td align="center" ><strong>Дата</strong></td>
    <td align="center" ><strong>Продукт</strong></td>
    <td align="center" ><strong>Цена</strong></td>
    <td align="center" ><strong>#</strong></td>
    <td align="center" ><strong>Телефон</strong></td>
    <td align="center" ><strong>E-mail</strong></td>
    <td align="center" ><strong>Сообщение</strong></td>
    <td align="center" >&nbsp;</td>
  </tr>

<?php while($rows=mysql_fetch_array($result)){ ?>

  <tr>
    <td ><? echo $rows['date']; ?></td>
    <td ><? echo $rows['product']; ?></td>
    <td ><? echo $rows['price']; ?></td>
    <td ><? echo $rows['count']; ?></td>
    <td ><a href='tel:<? echo $rows['mobile']; ?>'><? echo $rows['mobile']; ?></a></td>
    <td ><a href='mailto:<? echo $rows['email']; ?>'><? echo $rows['email']; ?></a></td>
    <td ><? echo $rows['note']; ?></td>
    <td >
    <a href="delete.php?id=<? echo $rows['id']; ?>"><span title="Удалить" class="glyphicon glyphicon-remove text-danger"></span></a>
    </td>
  </tr>

<?php } ?> 

</table>

</div>
         </div>
         <div class="col-sm-4 col-md-2 col-lg-4"></div>
      </div>
	
      <div class="row">
         <div class="col-sm-4 col-md-2 col-lg-4"></div>
         <div class="col-sm-4 col-md-8 col-lg-4">
         </div>
         <div class="col-sm-4 col-md-2 col-lg-4"></div>
      </div>
      <script src="js/jquery.js"></script>
      <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
      <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
   </body>
</html>
