<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<header>Flipkart Clone - Register</header>

<div class="form-box">
<form method="post">
<input type="text" name="name" placeholder="Enter Name" required>
<input type="email" name="email" placeholder="Enter Email" required>
<input type="password" name="password" placeholder="Enter Password" required>
<button name="register">Register</button>
</form>

<?php
if(isset($_POST['register'])){
$name=$_POST['name'];
$email=$_POST['email'];
$pass=$_POST['password'];
mysqli_query($conn,"INSERT INTO users VALUES(NULL,'$name','$email','$pass')");
echo "Registration Successful";
}
?>
</div>

</body>
</html>
