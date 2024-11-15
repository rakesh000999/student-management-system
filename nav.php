<?php

require 'connection.php';

session_start();

if (!isset($_SESSION['email'])) {
    echo header('location: login.php');
}
?>

<link rel="stylesheet" href="bootstrap.min.css">
<script src="bootstrap.bundle.min.js"></script>

<div class="container my-3">
    <a href="add-student.php" class="fw-bolder btn btn-primary">Add student</a>
    <a href="add-course.php" class="fw-bolder btn btn-primary">Add course</a>
    <a href="enrollment.php" class="fw-bolder btn btn-secondary">Enroll student</a>
    <a href="view-enrollment.php" class="fw-bolder btn btn-info">View enrollment</a>
    <a href="view-student.php" class="fw-bolder btn btn-info">View student</a>
    <a href="view-courses.php" class="fw-bolder btn btn-info">View course</a>
</div>