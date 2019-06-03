
<div class="futured_items">
	<div class="container">
		<div class="headline">
			<p class="headline-big-text">Каталог товаров</p>
		</div>
		<div class="product container">
		<?php foreach ($products as $product): ?>

			<div class="item">
				<a class="product-link" href="/product/card/?id=<?=$product['id']?>">
					<img class="item-img" src="/img/img_<?=$product['id']?>.jpg">
					<div class="item-text-block">
						<p class="item-name"><?=$product['name']?></p>
						<p class="item-price pink"><?=$product['price']?>$</p>
					</div>
				</a>
				<div class="add_cart"><div class="add" id="<?=$product['id']?>">Add to Cart</div></div>
			</div>

		<?php endforeach; ?>
		</div>
	</div>
	<div class="headline">
		<p class="headline-big-text"><a href="/product/catalog/?page=<?=$page?>">Еще</a></p>
	</div>
</div>
<br>

<script>
    $(document).ready(function(){
        $(".add").on('click', function(e){
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
                    {

                        $("#count").html(answer.count);
                    }
                }

            })
        });

    });
</script>
