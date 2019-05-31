<h2>Корзина</h2><hr>

<?php foreach ($products as $product): ?>

    <h2><?=$product['name']?></h2>
    <p>Цена:<?=$product['price']?></p>

    <button id="<?=$product['id_basket']?>" class="delete">Удалить</button>

<?php endforeach; ?>