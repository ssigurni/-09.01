<?php
include "assets/header.html";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>account</title>
</head>
<body>
    <h2>Регистрация</h2>
    <div>   
    <form  method="post"> 
        <p>Логин</p>
        <input class="pole" type="text" name="login" placeholder="Login">
        <p>Пароль</p>
        <input class="pole" type="password" name="password" placeholder="Password">        
        <li class="nav-item"><a href="registr.php">Ещё нет аккаунта?</a></li>

            <p><button class="btn" type="sumbit">Подтвердить</button> 
            </form>
    </div>
</body>
<?php 

$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

$pass = md5($pass."forhktkntuhpi"); // Создаем хэш из пароля

$mysql = new mysqli('localhost', 'root', 'root', 'web-php');


$result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
$user = $result->fetch_assoc(); // Конвертируем в массив
if(count($user) == 0){
    echo "Такой пользователь не найден.";
    exit();
}
else if(count($user) == 1){
    echo "Логин или праоль введены неверно";
    exit();
}



$mysql->close();


 ?>

</html>