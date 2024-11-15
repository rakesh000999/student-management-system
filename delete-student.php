<?php
require 'connection.php';
include("nav.php");

$s_id = $_GET['id'];

$deleteSql = "DELETE FROM students WHERE s_id = $s_id";
$deleteSqlResult = mysqli_query($conn, $deleteSql);

if ($deleteSqlResult) {
    header("location:view-student.php");
}