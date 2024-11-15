<?php
require 'connection.php';
include("nav.php");

$e_id = $_GET['id'];

$deleteSql = "DELETE FROM enrollments WHERE e_id = $e_id";
$deleteSqlResult = mysqli_query($conn, $deleteSql);

if ($deleteSqlResult) {
    header("location:view-enrollment.php");
}