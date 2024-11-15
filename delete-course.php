<?php
require 'connection.php';
include("nav.php");

$c_id = $_GET['id'];

$deleteSql = "DELETE FROM courses WHERE c_id = $c_id";
$deleteSqlResult = mysqli_query($conn, $deleteSql);

if ($deleteSqlResult) {
    header("location:view-courses.php");
}