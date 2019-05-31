Каталог: <br>

<?php 

var_dump($products);

foreach ($products as $product): ?>

<h2><a href="product/card/?id=<?=$product['id']?>"> <?=$product['product_name']?></a></h2>
<p>Цена: <?=$product['price']?></p>

<button id="<?=$product['id']?>" class="action">Купить</button>

<?php endforeach; ?>

<br>
<a href="product/catalog/?page=<?=$page?>">Еще</a>


<script>
    $(document).ready(function(){
        $(".action").on('click', function(e){
            let id = e.target.id;
            console.log(id);
            $.ajax({
                url: "/basket/AddBasket/",
                type: "POST",
                dataType : "json",
                data:{
                    id: id
                },
                error: function() {alert('error');},
                success: function(answer){
                    {window.location.reload()}
                }
            })
        });

    });
</script>
