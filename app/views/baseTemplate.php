<?php

require_once('app/config.php');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $data['title'] ?></title>
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $config['baseUrl'] ?>css/style.css">
</head>
<body>
<header class="navbar navbar-default">
    <ul class="nav navbar-nav pull-right">
        <li><a href="<?= $config['baseUrl'] ?>signup">Регистрация</a></li>
        <li><a href="<?= $config['baseUrl'] ?>signin">Авторизация</a></li>
        <li><a href="">Обратная связь</a></li>
    </ul>
</header>
<main>
    <div class="center-block form-container">
        <?php
        require_once($view);
        ?>
    </div>
</main>
</body>
</html>
