<?php
$randval = rand();

class Product {
    public $id;
    public $productName;
    public $price;

	public function setPrice() {
			return $this->price;
	}
	
	public function __construct($id, $productName, $price) {
        $this->id = $id;
        $this->productName = $productName;
        $this->price = $price;
    }
	
    public function render() {
		echo "<div class='item'>";
			echo "<a href='#' class='product-link'><img src='img/product/img_{$this->id}.jpg' alt='{$this->productName}' class='item-img'>";
				echo "<div class='item-text-block'>";
					echo "<p class='item-name'>{$this->productName}</p> <p class='item-price pink'>{$this->setPrice()}$</p>";
				echo "</div>";
			echo "</a>";
			echo "<div class='add_cart'><div class='add'>Add to Cart</div></div>";
		echo "</div>";
    }
}

class ProductDiscount extends Product {
    public $discount;

    public function __construct($id, $productName, $price, $discount) {
        parent::__construct($id, $productName, $price);
        $this->discount = $discount;
    }
	
	public function setPrice() {
		return "<del style='color:black;'>{$this->price}</del> {$this->discount}";
	}

    public function render() {
        parent::render();
		$this->setPrice();
    }
}

$product1 = new Product(1, "Mango футболка", 52);
$product2 = new Product(2, "D&G блузка", 48);
$product3 = new Product(3, "Mango куртка", 49);
$product4 = new Product(4, "Mango платье", 34);
$product5 = new Product(5, "ТВОЕ штаны", 24);
$product6 = new Product(6, "ADIDAS костюм", 40);
$product7 = new Product(7, "Reebok штаны", 33);
$product8 = new ProductDiscount(8, "ZARA толстовка", 38, 28);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>BRAND SHOP</title>
	<link rel="stylesheet" href="css/style.css?ver=<?=$randval?>'">
	<link href="https://fonts.googleapis.com/css?family=Lato:400,400i,700,700i,900,900i" rel="stylesheet">
</head>
<body>
<div class="futured_items">
	<div class="container">
		<div class='product'>
			<?php
				$product1->render();
				$product2->render();
				$product3->render();
				$product4->render();
				$product5->render();
				$product6->render();
				$product7->render();
				$product8->render();
			?>  	
		</div>
	</div>
</div>	
</body>
</html>