<?php
session_start();
include 'db.php';
$user=$_SESSION['user_id'];
?>
<!DOCTYPE html>
<html>
<head>
<title>Cart</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<header>Your Cart</header>

<div class="form-box">
<?php
$q=mysqli_query($conn,"
SELECT products.name,products.price
FROM cart JOIN products
ON cart.product_id=products.id
WHERE cart.user_id='$user'
");
while($row=mysqli_fetch_assoc($q)){
echo $row['name']." - ₹".$row['price']."<br>";
}
?>
</div>

</body>
</html>
