<?php $randval = rand(); ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/style.css?ver=<?=$randval?>">
    	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <title>SHOP</title>
</head>
<body>

<a href="/">Главная</a>
<a href="/product/catalog">Каталог</a>
<a href="/basket">Корзина</a> [<span id="count"><?=$count?></span>]

<?php
	if ($auth): ?>
    Добро пожаловать <?=$username?> <a href="/user/logout/"> [Выход]</a>
<?php else: ?>
    <form action="/user/login/" method="post">
        <input type="text" name="login" placeholder="Логин">
        <input type="text" name="pass" placeholder="Пароль">
        <input type="submit" name="submit" value="Войти">
    </form>
<?php endif; ?>

<br>


<br>
<?=$content?>
</body>
</html>