<?php
require 'connection.php';
include("nav.php");


$isValid = true;

$name = $d_o_b = $gender = $phone = $email = $address = "";

if (isset($_POST["submit"])) {
    if (isset($_POST["name"])) {
        $name = $_POST["name"];
    }
    if (isset($_POST["d_o_b"])) {
        $d_o_b = $_POST["d_o_b"];
    }
    if (isset($_POST["gender"])) {
        $gender = $_POST["gender"];
    }
    if (isset($_POST["phone"])) {
        $phone = $_POST["phone"];
    }
    if (isset($_POST["email"])) {
        $email = $_POST["email"];
    }
    if (isset($_POST["address"])) {
        $address = $_POST["address"];
    }


    $insertSql = "INSERT INTO students (name, date_of_birth, gender,phone,email,address) VALUES ('$name', '$d_o_b', '$gender','$phone','$email', '$address')";
    $insertResult = mysqli_query($conn, $insertSql);

    if ($insertResult) {
        ?>
        <div class="alert alert-success alert-dismissible fade show container" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

            <strong>Student added successfully!</strong>
        </div>

        <?php
    }
}
?>

<link rel="stylesheet" href="bootstrap.min.css">
<script src="bootstrap.bundle.min.js"></script>

<form action="#" method="post" class="container mt-2">
    <h2 class="text-center">Add Student</h2>

    <div class="form-group">
        <label for="" class="form-label">Name</label>
        <input type="text" name="name" class="form-control">
    </div>
    <div class="form-group">
        <label for="" class="form-label">Date of Birth</label>
        <input type="date" name="d_o_b" class="form-control">
    </div>
    <div class="form-group">
        <label for="" class="form-label">Gender</label>
        <br>
        <input type="radio" name="gender" value="m">Male
        <input type="radio" name="gender" value="f">Female
        <input type="radio" name="gender" value="o">Other
    </div>
    <div class="form-group">
        <label for="" class="form-label">Phone</label>
        <input type="number" name="phone" class="form-control">
    </div>
    <div class="form-group">
        <label for="" class="form-label">Email</label>
        <input type="text" name="email" class="form-control">
    </div>
    <div class="form-group">
        <label for="" class="form-label">Address</label>
        <input type="text" name="address" class="form-control">
    </div>
    <input type="submit" name="submit" value="Add" class="bg-success rounded border-0 text-white px-3 py-1 my-2">

</form>