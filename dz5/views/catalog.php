Каталог: <br>

<?php foreach ($products as $product): ?>
<h3><a href='index.php?c=product&a=card&id=<?=$product[id]?>'><?=$product[product_name]?></a></h3>
<p>
    <strong>Цена: </strong><?=$product[price]?>
    <strong>Каталог: </strong><?=$product[id_categories]?><br>
</p>
<hr>
<?php endforeach; ?>

<a href="?c=product&a=catalog&page=<?=$page?>">Еще</a>