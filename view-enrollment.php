<?php
require 'connection.php';
include("nav.php");

$selectDetail = "SELECT 
enrollments.e_id, students.name, courses.title 
FROM enrollments
JOIN students ON enrollments.s_id = students.s_id 
JOIN courses ON enrollments.c_id = courses.c_id";

$selectDetailResult = mysqli_query($conn, $selectDetail);

?>

<div class="table-responsive container mt-3">
    <table class="table table-striped table-hover table-dark align-middle">
        <thead class="table-light">
            <tr>
                <th>S.N</th>
                <th>Name</th>
                <th>Course</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php
            $i = 0;
            while ($row = mysqli_fetch_array($selectDetailResult)) {
                ?>

                <tr class="table-light">
                    <td scope="row"><?php echo ++$i; ?></td>
                    <td scope="row"><?php echo $row['name']; ?></td>
                    <td scope="row"><?php echo $row['title']; ?></td>
                    <td scope="row">
                        <a href="edit-enrollment.php?id=<?php echo $row['e_id']; ?>" class="btn btn-primary">Edit</a>
                        <a href="delete-enrollment.php?id=<?php echo $row['e_id']; ?>"
                            onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php
            }

            ?>
        </tbody>
    </table>
</div>