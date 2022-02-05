<?php
include "assets/header.html";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style.css">
    <title>account</title>
</head>
<body>
    <h2>Регистрация</h2>
    <div>   
    <form  method="post"> 
        <p>Имя</p>
        <!--placeholder отвечает за подсказывающие строки в поле ввода-->
        <input class="pole" type="text" name="name" placeholder="Your name">
        <p>Фамилия</p>
        <input class="pole" type="text" name="last" placeholder="Your last name">
        <p>Логин</p>
        <input class="pole" type="text" name="login" placeholder="Login">
        <p>Пароль</p>
        <input class="pole" type="password" name="password" placeholder="Password">        
        <li class="nav-item"><a href="auto.php">Уже есть аккаунт?</a></li>

            <p><button class="btn" type="sumbit">Подтвердить</button> 
            </form>
    </div>
</body>
<?php
$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$last = filter_var(trim($_POST['last']), FILTER_SANITIZE_STRING);
$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

$mysql = new mysqli('localhost', 'root', 'root', 'web-php', 3307);
$mysql->query("INSERT INTO `users` ( `name`,`last name`, `login`, `password`) VALUES ( '$name','$last', '$login', '$password')");
$mysql->close();
?>
</html>