<?php
include 'db.php';

if(isset($_POST['add'])){
    $name = $_POST['name'];
    $price = $_POST['price'];

    mysqli_query($conn,"INSERT INTO products VALUES(NULL,'$name','$price')");
    echo "Product Added Successfully";
}
?>

<form method="post">
<input type="text" name="name" placeholder="Product Name" required>
<input type="number" name="price" placeholder="Price" required>
<button name="add">Add Product</button>
</form>
