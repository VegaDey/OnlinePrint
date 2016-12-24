<?php
header('Refresh: 5; URL=admin.php');

require_once 'config.php'; // подключаем скрипт

$tbl_name="shop"; // Имя таблицы

// Подключаемся к базе
mysql_connect("$host", "$user", "$password")or die("cannot connect"); 
mysql_select_db("$database")or die("cannot select DB");

// get value of id that sent from address bar 
$id=$_GET['id'];

// Delete data in mysql from row that has this id 
$sql="DELETE FROM $tbl_name WHERE id='$id'";
$result=mysql_query($sql);

// if successfully deleted
if($result){
echo "Заказ успешно удалён<br><br>";
echo "<BR>";
echo "<a href='admin.php'>Вернуться назад</a><br>";
echo 'Через 5 сек. вы автоматически отправитесь назад';

}

else {
echo "ERROR";
}
?> 

<?php
// close connection 
mysql_close();
?>