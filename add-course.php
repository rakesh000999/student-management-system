<?php
require 'connection.php';
include("nav.php");


$title = $code = $duration = "";

if (isset($_POST["submit"])) {
    if (isset($_POST["title"])) {
        $title = $_POST["title"];
    }
    if (isset($_POST["code"])) {
        $code = $_POST["code"];
    }
    if (isset($_POST["duration"])) {
        $duration = $_POST["duration"];
    }

    $insertSql = "INSERT INTO courses (title, code, duration) VALUES ('$title', '$code', '$duration')";
    $insertResult = mysqli_query($conn, $insertSql);

    if ($insertResult) {
        ?>
        <div class="alert alert-success alert-dismissible fade show container" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

            <strong>Course added successfully!</strong>
        </div>

        <?php
    }
}
?>

<link rel="stylesheet" href="bootstrap.min.css">
<script src="bootstrap.bundle.min.js"></script>

<form action="#" method="post" class="container mt-2">
    <h2 class="text-center">Add Course</h2>

    <div class="form-group">
        <label for="" class="form-label">Title</label>
        <input type="text" name="title" class="form-control">
    </div>
    <div class="form-group">
        <label for="" class="form-label">Code</label>
        <input type="text" name="code" class="form-control">
    </div>
    <div class="form-group">
        <label for="" class="form-label">Duration</label>
        <input type="text" name="duratoin" class="form-control">
    </div>

    <input type="submit" name="submit" value="Add" class="bg-success rounded border-0 text-white px-3 py-1 my-2">

</form>