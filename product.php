<?php
require 'functions.php';
$product_id = $_GET['product_id'];
$product= getProductById($product_id);
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
    <link rel="stylesheet" href="product_style.css">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <img src="https://img.icons8.com/?size=512&id=Rqk11fzH1NQq&format=png" alt="Logo" width="50" height="48"
         class="d-inline-block ">
    <a class="navbar-brand" href="index.php">Dota.Store</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01"
            aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Главная </a>
            </li>
        </ul>
    </div>
</nav>

<div class="wrapper mt-5 product-item mb-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1><?=$product['title']?> (Редкость скина: <?=$product['rare']?> | Название героя: <?=$product['type']?>)</h1>
            </div>

            <div class="col-sm-4">
                <div class="product-item-thumb d-flex justify-content-center">
                    <img src="<?= getFileById($product['file_id'])?>" >
                </div>

            </div>

            <div class="col-sm-8">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-price">
                            <?=$product['price']?> РУБЛЕЙ
                        </div>
                    </div>

                    <div class="col-md-6">
                        <form action="index.php">
                            <div class="input-group">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary">Купить</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <hr>


                <div class="card-desc">
                    <p> <?=$product['description']?></p>
                </div>

            </div>


        </div>
    </div>
</div>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>
</html>