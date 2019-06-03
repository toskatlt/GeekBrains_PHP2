<div class="futured_items">
	<div class="container">
		<div class="headline">
			<p class="headline-big-text">Корзина</p>
		</div>
	</div>
</div>			
<div class="cart__list container">
	<div class="cart__head">
		<div class="cart__head-left">Product Details</div>
		<div class="cart__head-rigth">
			<p class="cart__head-text">unite Price</p>
			<p class="cart__head-text">Quantity</p>
			<p class="cart__head-text">shipping</p>
			<p class="cart__head-text">Subtotal</p>
			<p class="cart__head-text">ACTION</p>
		</div>
	</div>


<?php

if ($products) { 
   foreach ($products as $product): 
	
?>
<div class="cart__pos" id="<?=$product['id_basket']?>">
	<div class="cart__pos-left">
		<div class="cart__pos-img"><img src='/img/small/img_<?=$product['id_prod']?>.jpg' alt="good1"></div>
		<div>
			<a href="single.html" class="cart__pos-title"><?=$product['name']?></a>
			<p class="cart__pos-desc"><span class="bold">Color: </span>Red</p>
			<p class="cart__pos-desc"><span class="bold">Size: </span>Xll</p>					
		</div>
	</div>
	<div class="cart__pos-right">
		<div class="cart__pos-col"><?=$product['price']?>$</div>
		<div class="cart__pos-col"><input type="number" class="cart__item-input" value="1"></div>
		<div class="cart__pos-col">FREE</div>
		<div class="cart__pos-col"><?=$product['price']?>$</div>
		<div class="cart__pos-col cart__del" data-id="<?=$product['id_basket']?>"><i class="fa fa-times-circle" aria-hidden="true"></i></div>
	</div>
</div>
<? endforeach; ?>

</div>

<? } else { ?>	
	<div>
		<b>Добавьте товар в корзину</b>
	</div>
	
<?php } ?>

<div class="futured_items">
	<div class="container">
		<div class="headline">
			<p class="headline-big-text"><a href="/product/catalog">Каталог</a></p>
		</div>
	</div>
</div>	


<script>

    $(document).ready(function () {
        $(".cart__del").on('click', function () {
            var id = $(this).attr('data-id');
            $.ajax({
                url: "/basket/delete/",
                type: "POST",
                dataType: "json",
                data: {
                    id: id
                },
                error: function () {
                    alert('error');
                },
                success: function (answer) {
                    {
                        $("#" + id).remove();
                        $("#count").html(answer.count);
                    }
                }

            })
        });

    });

</script>
