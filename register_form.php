<?php
require 'functions.php';
session_start();
if (!empty($_SESSION['user'])) {
    header('Location: main.php');
}
$error = '';
if (!empty($_POST['username'])
    && !empty($_POST['password'])
    && !empty($_POST['repeat_password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $repeatPassword = $_POST['repeat_password'];
    if (register($username, $password, $repeatPassword)) {
        header('Location: auth_form.php');
    } else {
        $error = 'Ошибка при регистрации';
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

        <h2 class="active"> Регистрация </h2>



        <div class="fadeIn first">
            <img src="https://img.icons8.com/?size=512&id=Rqk11fzH1NQq&format=png"  id="icon" alt="User Icon"/>
        </div>

        <form method="post">
            <input type="text" name="username"  class="form-control" id="exampleFormControlInput1" placeholder="login">
            <input type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="password">
            <input type="password" name="repeat_password" class="form-control" id="exampleFormControlInput1" placeholder="repeat password">
            <input type="submit" class="fadeIn fourth" value="Войти">
            <br>
            <b style="color: crimson">
                <?=$error?>
            </b>
        </form>


        <div id="formFooter">
            <a class="underlineHover" href="auth_form.php">Авторизация</a>
        </div>

    </div>
</div>



</body>
</html>