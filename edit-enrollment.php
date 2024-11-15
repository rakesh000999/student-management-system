<?php
require 'connection.php';
include("nav.php");

$e_id = $_GET['id'];

$selectStudent = "SELECT * FROM students";
$selectStudentResult = mysqli_query($conn, $selectStudent);

$selectCourse = "SELECT * FROM courses";
$selectCourseResult = mysqli_query($conn, $selectCourse);

$selectDetail = "SELECT 
students.name, courses.title 
FROM enrollments
JOIN students ON enrollments.s_id = students.s_id 
JOIN courses ON enrollments.c_id = courses.c_id
WHERE enrollments.e_id = $e_id";

$selectDetailResult = mysqli_query($conn, $selectDetail);

$result = mysqli_fetch_assoc($selectDetailResult);

if (isset($_POST['update'])) {

    $student = $_POST['name'];
    $course = $_POST['title'];

    $selectStudentId = "SELECT s_id FROM students WHERE name = '$student'";
    $selectStudentIdResult = mysqli_query($conn, $selectStudentId);

    $studentId = mysqli_fetch_assoc($selectStudentIdResult);

    $selectCourseId = "SELECT c_id FROM courses WHERE title = '$course'";
    $selectCourseIdResult = mysqli_query($conn, $selectCourseId);

    $courseId = mysqli_fetch_assoc($selectCourseIdResult);

    // update
    $updateSql = "UPDATE enrollments SET s_id = " . $studentId['s_id'] . " , c_id=" . $courseId['c_id'] . " WHERE e_id = $e_id ";

    // die();
    $updateResult = mysqli_query($conn, $updateSql);

    if ($updateResult) {
        header("location:view-enrollment.php");
    }

}
?>

<link rel="stylesheet" href="bootstrap.min.css">
<script src="bootstrap.bundle.min.js"></script>

<form action="#" method="post" class="container">

    <h2 class="text-center">Enrollment</h2>
    <div class="form-group">
        <label for="student" class="form-label">Select student</label>
        <select name="name" id="student" class="form-control">
            <option value="<?php echo $result['name'] ?>"><?php echo $result['name'] ?></option>
            <?php
            while ($rowStudent = mysqli_fetch_assoc($selectStudentResult)) {
                ?>
                <option value="<?php echo $rowStudent['name'] ?>"><?php echo $rowStudent['name'] ?></option>
                <?php
            }
            ?>
        </select>
    </div>
    <div class="form-gwerroup">
        <label for="course" class="form-label">Select course</label>
        <select name="title" id="course" class="form-control">
            <option value="<?php echo $result['title'] ?>"><?php echo $result['title'] ?></option>
            <?php
            while ($rowCourse = mysqli_fetch_assoc($selectCourseResult)) {
                ?>
                <option value="<?php echo $rowCourse['title'] ?>"><?php echo $rowCourse['title'] ?></option>
                <?php
            }
            ?>
        </select>
    </div>
    <input type="submit" name="update" value="Update" class="border-0 px-3 py-1 rounded bg-success text-white mt-2">
</form>