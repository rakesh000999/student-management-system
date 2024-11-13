<?php
require 'connection.php';

$isValid = true;

$email = $password = "";

if (isset($_POST["submit"])) {
    if (isset($_POST["email"])) {
        $email = $_POST["email"];
    }
    if (isset($_POST["password"])) {
        $password = $_POST["password"];
    }

    if ($isValid === true) {

        $insertSql = "INSERT INTO users (email, password) VALUES ('$email','$password')";
        $insertResult = mysqli_query($conn, $insertSql);

        if ($insertResult) {
            echo header('location:login.php');
        }
    }
}
?>

<link rel="stylesheet" href="bootstrap.min.css">
<script src="bootstrap.bundle.min.js"></script>

<form action="#" method="post" class="container mt-2">
    <h2 class="text-center">Admin Register</h2>
    <div class="form-group">
        <label for="" class="form-label">Email</label>
        <input type="text" name="email" class="form-control">
    </div>
    <div class="form-group">
        <label for="" class="form-label">Password</label>
        <input type="password" name="password" class="form-control">
    </div>
    <input type="submit" name="submit" value="Register" class="bg-success rounded border-0 text-white px-3 py-1 my-2">
    <a href="login.php">Already have account? Login...</a>
</form>