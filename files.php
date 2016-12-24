<!DOCTYPE html>
<html lang="ru"> 
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
<title>Файлы</title>

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
      <a href="setting.php" type="button" class="btn btn-default" role="button">Настройка</a>
      <a href="files.php" type="button" class="btn btn-success" role="button">Файлы</a>
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
  <li class="active">Файлы</li>
</ol>

<form action="upload.php" method="post" enctype='multipart/form-data'>
    <input type="file" 
            style="visibility:hidden; width: 1px;" 
            id='${multipartFilePath}' name="somename" 
            onchange="$(this).parent().find('span').html($(this).val().replace('C:\\fakepath\\', ''))"  />
    <input class="btn btn-primary" type="button" value="Выберите файл..." onclick="$(this).parent().find('input[type=file]').click();"/>
    <input class="btn btn-success" type="submit" value="Загрузить" />
    &nbsp;
    <span class="label label-success" ></span>
</form><p>



<?php
 
  $imgDir  = 'upload/';
  function getFiles(/*string*/$path)
  {
    clearstatcache();
     
    $files = scandir($path);
     
    for($i = 0, $length = count($files); $i < $length; $i++)
    {
      // Исключаем из списка директории:
      if( is_dir($path.$files[$i]) )
      {
        unset($files[$i]);
      }
    }
    return $files; //array
  }
?>

<p><span class="label label-default"><?php echo ( array_shift( getFiles($imgDir) ) ) ?></span>
<span class="label label-default"><?php echo " " . filesize($imgDir.( array_shift( getFiles($imgDir) ) )) . " байт" ?></span>
<span class="label label-default"><?php  $size = GetImageSize($imgDir.( array_shift( getFiles($imgDir) ) ));  echo "{$size[1]}x{$size[0]} пикс."; ?></span>

    <div >
      <p><a href="<?php echo  array_shift( getFiles($imgDir) ) ?>" download><img class="img-rounded" id="full_img" src="<?php echo $imgDir.( array_shift( getFiles($imgDir) ) ) ?>" width="600px" height="350px" /></a></p>
      <?php
        foreach( getFiles($imgDir) as $file )
        {
          echo '<img class="small img-circle" src="'.$imgDir.$file.'" width="50px" height="50px" onclick="document.getElementById(\'full_img\').src = \''.$imgDir.$file.'\'" />';
        }
      ?>
    </div>



</div>



</div></div>

<script type="text/javascript">
$(document).ready(function() {
	$('img').error(function() {
		$(this).attr({
			src: '/img/no_image.png'
		});
	});
});
</script>

</body>
</html>