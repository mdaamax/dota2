<?php
session_start();
require 'functions.php';
$productList = getProductList();
?>


<!doctype html>
<html lang="ru" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html"
      xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dota.Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="media.css">
</head>
<body>

<header class="brand">

    <div class="container-fluid">
        <nav class="navbar navbar-dark bg-dark fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="https://img.icons8.com/?size=512&id=Rqk11fzH1NQq&format=png" alt="Logo" width="50" height="55"
                         class="d-inline-block ">
                    </strong>Dota.Store</strong>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar"
                     aria-labelledby="offcanvasDarkNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel"></h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#"><strong>Dota.Store</strong></a>
                            </li>
                            <?php if (!empty($_SESSION['user'])): ?>

                                <li class="nav-item">
                                    <a class="nav-link" href="#">Пользователь: <?= $_SESSION['user']['username'] ?></a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="logout.php">Выйти</a>
                                </li>
                                <?php if (!empty($_SESSION['user']['is_admin'])): ?>
                                    <h5>Панель Администратора</h5>
                                    <li class="nav-item">
                                        <a class="nav-link" href="create_product_type.php">Добавить героя</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="create_product.php">Создание карточки товара</a>
                                    </li>
                                <?php endif; ?>
                            <?php else: ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="auth_form.php">Войти в профиль</a>
                                </li>
                            <?php endif; ?>
                            <li class="nav-item">
                                <a class="nav-link" href="#1">Контактная информация</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#2">Распродажа скинов</a>
                            </li>

                    </div>
                </div>
            </div>
        </nav>

        <div class="row align-items-center">
            <div class="text_logo">
                <h1><strong>Арканы</strong> По супер ценам!</h1>


            </div>
        </div>
    </div>
    <div class="menu">
        </p>
        <img class="kosmos d-none d-lg-xl-none d-xl-block"
             src="https://cdn-icons-png.flaticon.com/512/588/588308.png" alt="beer" width="600" height="600">
    </div>

</header>



<section class="colons">
    <a name="2"></a>
    <div class="container-fluid">
        <div class="our_works">
            <div class="heading-content text-center">
                <h1><strong>РАСПРОДАЖА СКИНОВ</strong></h1>
            </div>
        </div>
    </div>

</section>


<section class="back">
    <div class="container text-center">
        <div class="row align-items-start">
            <?php foreach ($productList as $product): ?>
                <div class="col gy-5">
                    <div class="card" style="width: 20rem;">
                        <img src="<?= getFileById($product['file_id']) ?>"
                             class="card-img-top" style="width: 20rem;margin: auto" height="270px" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $product['title'] ?></h5>
                            <p class="card-price"><?= $product['price'] ?> ₽</p>
                            <hr>
                            <a class="btn btn-primary" href="product.php?product_id=<?= $product['id']?>"
                               role="button">Открыть</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
</section>





<section class="contact_us">
    <a name="1"></a>
    <div class="container-xxl">
        <div class="row">
            <div class="contact_u">
                <h1><strong>Контактная информация</strong></h1>
                <img src="separator.png" alt="">
            </div>
        </div>
    </div>
    <div class="container text-center">
        <div class="row">
            <div class="col">
                <p>Если во время покупки или вывода предметов у вас возникли какие-то сложности - обратитесь в нашу техподдержку покупателей. Вам обязательно помогут!
                </p>
            </div>
        </div>
    </div>
    <div class="container text-center">
        <div class="row">
            <div class="col align-self-start">
                <h5>https://t.me/Fraanssssss</h5>
        </div>
    </div>
</section>

<footer>
    <h4>Dota.Store</h4>


</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>
</html>