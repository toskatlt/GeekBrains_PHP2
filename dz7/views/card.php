<? ?>

<div class="futured_items">
	<div class="container">
		<div class="headline">
			<p class="headline-big-text"><?=$product->name?></p>
		</div>
		<div class="product container">
			<div class="item">
				<a class="product-link" href="/product/card/?id=<?=$product->id?>">
					<img class="item-img" src="/img/img_<?=$product->id?>.jpg">
					<div class="item-text-block">
						<p class="item-name"><?=$product->description?></p>
						<p class="item-price pink"><?=$product->price?>$</p>
					</div>
				</a>
				<div class="add_cart"><div class="add" id="<?=$product->id?>">Add to Cart</div></div>
			</div>
		</div>
	</div>
</div>

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