<?php
require 'connection.php';
include("nav.php");

$selectStudent = "SELECT * FROM students";
$selectStudentResult = mysqli_query($conn, $selectStudent);

$selectCourse = "SELECT * FROM courses";
$selectCourseResult = mysqli_query($conn, $selectCourse);


if (isset($_POST['enroll'])) {

    $student = $_POST['name'];
    $course = $_POST['title'];


    $selectStudentId = "SELECT s_id FROM students WHERE name = '$student'";
    $selectStudentIdResult = mysqli_query($conn, $selectStudentId);

    $studentId = mysqli_fetch_assoc($selectStudentIdResult);

    $selectCourseId = "SELECT c_id FROM courses WHERE title = '$course'";
    $selectCourseIdResult = mysqli_query($conn, $selectCourseId);

    $courseId = mysqli_fetch_assoc($selectCourseIdResult);

    $insertEnrollment = "INSERT INTO enrollments (s_id, c_id) VALUES (" . $studentId['s_id'] . ", " . $courseId['c_id'] . ")";
    $insertEnrollmentResult = mysqli_query($conn, $insertEnrollment);

}
?>

<link rel="stylesheet" href="bootstrap.min.css">
<script src="bootstrap.bundle.min.js"></script>

<form action="#" method="post" class="container ">

    <h2 class="text-center">Enrollment</h2>
    <div class="form-group">
        <label for="student" class="form-label">Select student</label>
        <select name="name" id="student" class="form-control">
            <option value="">Select</option>
            <?php
            while ($rowStudent = mysqli_fetch_assoc($selectStudentResult)) {
                ?>
                <option value="<?php echo $rowStudent['name'] ?>"><?php echo $rowStudent['name'] ?></option>
                <?php
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="course" class="form-label">Select course</label>
        <select name="title" id="course" class="form-control">
            <option value="">Select</option>
            <?php
            while ($rowCourse = mysqli_fetch_assoc($selectCourseResult)) {
                ?>
                <option value="<?php echo $rowCourse['title'] ?>"><?php echo $rowCourse['title'] ?></option>
                <?php
            }
            ?>
        </select>
    </div>
    <input type="submit" name="enroll" value="Enroll" class="border-0 px-3 py-1 rounded bg-success text-white mt-2">
</form>