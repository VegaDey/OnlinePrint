<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Форма входа</title>

    <style type="text/css">
@-webkit-keyframes swing
{
    15%
    {
-webkit-transform: translateX(5px);
transform: translateX(5px);
    }
    
    30%
    {
-webkit-transform: translateX(-5px);
transform: translateX(-5px);
    }
    
    50%
    {
-webkit-transform: translateX(3px);
transform: translateX(3px);
    }
    
    65%
    {
-webkit-transform: translateX(-3px);
transform: translateX(-3px);
    }
    
    80%
    {
-webkit-transform: translateX(2px);
transform: translateX(2px);
    }
    
    100%
    {
-webkit-transform: translateX(0);
transform: translateX(0);
    }
}

@keyframes swing
{
    15%
    {
-webkit-transform: translateX(5px);
transform: translateX(5px);
    }
    
    30%
    {
-webkit-transform: translateX(-5px);
transform: translateX(-5px);
    }
    
    50%
    {
-webkit-transform: translateX(3px);
transform: translateX(3px);
    }
    
    65%
    {
-webkit-transform: translateX(-3px);
transform: translateX(-3px);
    }
    
    80%
    {
-webkit-transform: translateX(2px);
transform: translateX(2px);
    }
    
    100%
    {
-webkit-transform: translateX(0);
transform: translateX(0);
    }
}

.swing
{
    -webkit-animation: swing 1s ease;
    animation: swing 1s ease;
    -webkit-animation-iteration-count: 1;
    animation-iteration-count: 1;
}
.floating{
    animation-name: floating;
    -webkit-animation-name: floating;
 
    animation-duration: 1s;   
    -webkit-animation-duration: 1s;
 
    animation-iteration-count: infinite;
    -webkit-animation-iteration-count: infinite;
}
 
@keyframes floating {
    0% {
transform: translateY(0%);  
    }
    50% {
transform: translateY(10%);  
    }   
    100% {
transform: translateY(0%);
    }   
}
 
@-webkit-keyframes floating {
    0% {
-webkit-transform: translateY(0%);  
    }
    50% {
-webkit-transform: translateY(10%);  
    }   
    100% {
-webkit-transform: translateY(0%);
    }   
}

    </style>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />


</head>

<body></p>

    <div class="row">
<div class="col-md-4"></div>
<div class="col-md-4 ">

    <?php

	require_once 'config.php'; // подключаем скрипт

	$login = isset($_GET['login'])?$_GET['login']:'';
	$passwd = isset($_GET['passwd'])?$_GET['passwd']:'';

	if($login != '' || $passwd != '') 
	{
		if($login == "$adminuser" && $passwd == "$adminpass")
			echo ('<p class="floating text-success">Данные введены верно.. Через 3 секунды будете перенаправлены.</p> <script language="javascript" type="text/javascript">setTimeout(function () { window.location.href = "admin.php";}, 3000);</script>');
		else
			echo '<div class="swing text-danger">Доступ запрещен!</div>';
	}
	else
		echo '<p class="text-info">Введите логин и пароль</p>';
?>
</p>

<form class="forms" method="get">
    <input type="text" value="" name="login" placeholder="Логин" class="form-control" /></p>
    <input type="password" value="" name="passwd" placeholder="Пароль" class="form-control" /></p>
    <button type="submit" class="btn btn-success btn-wide">Войти</button></p><span>По умолчанию Логин: <?php echo ($adminuser); ?> и Пароль: <?php echo ($adminpass); ?></span>
</div>
<div class="col-md-4"></div>
    </div>



</body>

</html>