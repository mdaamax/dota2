<?php
require 'functions.php';
$errorMessage = '';
session_start();
if (!empty($_SESSION['user'])) {
    header('Location: main.php');
}
if (!empty($_POST['username'])
    && !empty($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $result = login($username, $password);
    if ($result['result']) {
        $_SESSION['user']['username'] = $username;
        $_SESSION['user']['id'] = $result['user']['id'];
        $_SESSION['user']['is_admin'] = $result['user']['is_admin'];
        header('Location: index.php');
    } else {
        $errorMessage = 'Неправильный логин или пароль';
    }
}
?>

<!doctype html>
<html lang="ru" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html"
      xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dota.Store</title>
    <link rel="stylesheet" href="auto_form.css">
</head>
<body>




<div class="wrapper fadeInDown">
    <div id="formContent">

        <h2 class="active"> Авторизация </h2>



        <div class="fadeIn first">
            <img src="https://img.icons8.com/?size=512&id=Rqk11fzH1NQq&format=png"  id="icon" alt="User Icon"/>
        </div>

        <form method="post">
            <input type="text" name="username"  class="form-control" id="exampleFormControlInput1" placeholder="login">
            <input type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="password">

            <input type="submit" class="fadeIn fourth" value="Войти">
            <br>
            <b style="color: crimson">
                <?=$errorMessage?>
            </b>
        </form>


        <div id="formFooter">
            <a class="underlineHover" href="register_form.php">Регистрация</a>
        </div>

    </div>
</div>



</body>
</html>