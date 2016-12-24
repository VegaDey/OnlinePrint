<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Магазин - онлайн заказы</title>
      <link href="css/style.css" rel="stylesheet">
      <!-- Bootstrap core CSS -->
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <script src="js/bootstrap.min.js"></script>
      <script src="js/jquery.min.js"></script>
      <link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
   </head>
   <body>
      <div class="row">
         <div class="col-md-4"></div>
         <div class="col-md-4">
            <div class="btn-group" role="group" aria-label="Default button group">
               <a href="index.php" type="button" class="btn btn-default" role="button">На главную</a>
               <a href="shop.php" type="button" class="btn btn-success" role="button"> Магазин</a>
               <a href="login.php" type="button" class="btn btn-default" role="button">Админ панель</a>
            </div>
         </div>
         <div class="col-md-4"></div>
      </div>
      <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4">
      <p>
      <ol class="breadcrumb">
         <li><a href="index.php">Главная</a></li>
         <li class="active">Магазин</li>
      </ol>
      <?php
         require_once 'config.php'; // подключаем скрипт

         if(isset($_POST['product']) && isset($_POST['price']) && isset($_POST['count']) && isset($_POST['user']) && isset($_POST['mobile']) && isset($_POST['email']) && isset($_POST['note'])){
          
             // подключаемся к серверу
             $link = mysqli_connect($host, $user, $password, $database) 
                 or die("Ошибка " . mysqli_error($link)); 
              
             // экранирование символов для mysql
             $product = htmlspecialchars(mysqli_real_escape_string($link, $_POST['product']));
             $price = htmlspecialchars(mysqli_real_escape_string($link, $_POST['price']));
             $count = htmlspecialchars(mysqli_real_escape_string($link, $_POST['count']));
             $user = htmlspecialchars(mysqli_real_escape_string($link, $_POST['user']));
             $mobile = htmlspecialchars(mysqli_real_escape_string($link, $_POST['mobile']));
             $email = htmlspecialchars(mysqli_real_escape_string($link, $_POST['email']));
             $note = htmlspecialchars(mysqli_real_escape_string($link, $_POST['note']));

             // Добавляем дату
             $date = date('Y-m-d H:i:s.u');

             // создание строки запроса
             $query ="INSERT INTO shop VALUES(NULL, '$product','$price','$count','$user','$mobile','$email','$note','$date')";
              
             // выполняем запрос
             $result = mysqli_query($link, $query) or die ("Ошибка " . mysqli_error($link)); 
             if($result)
             {
                 echo "<br><div id='alerts' class='alert alert-success alert-dismissible' role='alert'>
         	<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
         	$allertshop <a href='tel:$phoneshop'>$phoneshop</a><br> Или написать нам на E-mail: <a href='mailto:$emailshop'>$emailshop</a>
         	</div>";
             }

             // закрываем подключение
             mysqli_close($link);
         }
         ?>

      <h3>Выберите из списка продукт</h3>
      <form method="POST">

         <p align="center">
               <?  
               require_once 'config.php'; // подключаем скрипт

               $db = mysql_connect($host, $user, $password) or die (mysql_error());
               if (!$db) {
                   die ('Не удалось подключиться к $host ' . mysql_error());
               }
               mysql_select_db($database, $db);

               $sql = "SELECT `id`,`name`, `price`, `count`, `description` FROM `price`";
               $result = mysql_query($sql);
                
               echo ('<div class="col-xs-6"><select name="product" class="form-control" id="one" >'); 
               print_r($rez_array);
               while ($myrow = mysql_fetch_array($result,MYSQL_ASSOC)) {
               echo '<option data-toggle="tooltip" title="' . $myrow['description'] . '" value="' . $myrow['price'] . ' ">' . $myrow['name'] . '  | <i>' . $myrow['price'] . ' ₽ ' . $myrow['count'] . '  шт. </i></option>'; }
               echo ('</select></div>');
               echo ('<div class="col-xs-3"><input class="form-control" type="text" placeholder="Кол-во #" id="two" name="count" oninput="mult()"></div>');
               echo ('<div class="col-xs-3"><div class="input-group"><input class="form-control" maxlength="10" type="text" placeholder="Цена" id="result" name="price"><span class="input-group-addon">₽</span></p></div></p></div>');
               ?><div class="col-xs-12">
            <input name="user" type="text" placeholder="Имя" class="form-control"></p>
            <input name="mobile" type="text" placeholder="Телефон" class="form-control"></p>
            <input name="email" type="text" placeholder="E-mail" class="form-control"></p>
            <textarea class="form-control" name="note" rows="3" placeholder="Описание" id="textArea"></textarea></p>
            <button type="submit" class="btn btn-success btn-wide">Купить</button>
      </form></div>

      <script> 
         function mult() {
             var first = document.getElementById('one').value;
             var second = document.getElementById('two').value;
             document.getElementById('result').value = first * second;
         } 
      </script>
      <script>
         $(document).ready(function(){
             $('[data-toggle="tooltip"]').tooltip();   
         });
      </script>
   </body>
</html>