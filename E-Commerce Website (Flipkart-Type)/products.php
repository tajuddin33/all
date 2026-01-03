<?php
session_start();
include 'db.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Products</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<header>Flipkart Clone - Products</header>

<div class="container">
<div class="products">

<?php
$res=mysqli_query($conn,"SELECT * FROM products");
while($row=mysqli_fetch_assoc($res)){
?>
<div class="product">
<img src="product.png">
<h3><?php echo $row['name']; ?></h3>
<p>₹<?php echo $row['price']; ?></p>
<a href="add_cart.php?id=<?php echo $row['id']; ?>">Add to Cart</a>
</div>
<?php } ?>

</div>
</div>

</body>
</html>
