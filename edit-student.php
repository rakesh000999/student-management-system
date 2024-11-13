<?php
require 'connection.php';
include("nav.php");

$s_id = $_GET['id'];

$selectSql = "SELECT * FROM students WHERE s_id = $s_id";
$selectSqlResult = mysqli_query($conn, $selectSql);

$result = mysqli_fetch_array($selectSqlResult);


if (isset($_POST["update"])) {

    $name = $_POST['name'];

    $updateSql = "UPDATE students SET name = '$name' WHERE s_id = $s_id";
    $updateSqlResult = mysqli_query($conn, $updateSql);

    if ($updateSqlResult) {
        header('location: view-student.php');
    }
}
?>

<form action="#" method="post" class="container">
    <h2 class="text-center">Update Student</h2>
    <div class="form-group">
        <label class="form-label">Name</label>
        <input type="text" class="form-control" name="name" value="<?php echo $result['name'] ?>">
    </div>
    <input type="submit" name="update" value="Update" class="rounded border-0 bg-primary mt-2 px-3 py-1 text-light">
</form>