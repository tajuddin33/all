<?php
include 'db.php';
$result = mysqli_query($conn,"SELECT * FROM products");
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<title>Products</title>
</head>
<body>

<h2>Product List</h2>

<?php while($row = mysqli_fetch_assoc($result)){ ?>
<div class="product">
<h3><?php echo $row['name']; ?></h3>
<p>Price: ₹<?php echo $row['price']; ?></p>
<a href="#">Add to Cart</a>
</div>
<?php } ?>

</body>
</html>
