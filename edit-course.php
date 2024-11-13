<?php
require 'connection.php';
include("nav.php");

$c_id = $_GET['id'];

$selectSql = "SELECT * FROM courses WHERE c_id = $c_id";
$selectSqlResult = mysqli_query($conn, $selectSql);

$result = mysqli_fetch_array($selectSqlResult);


if (isset($_POST["update"])) {

    $title = $_POST['title'];

    $updateSql = "UPDATE courses SET title = '$title' WHERE c_id = $c_id";
    $updateSqlResult = mysqli_query($conn, $updateSql);

    if ($updateSqlResult) {
        header('location: view-courses.php');
    }
}
?>

<form action="#" method="post" class="container">
    <h2 class="text-center">Update Student</h2>
    <div class="form-group">
        <label class="form-label">Title</label>
        <input type="text" class="form-control" name="title" value="<?php echo $result['title'] ?>">
    </div>
    <input type="submit" name="update" value="Update" class="rounded border-0 bg-primary mt-2 px-3 py-1 text-light">
</form>