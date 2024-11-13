<?php
require 'connection.php';
include("nav.php");

$selectDetail = "SELECT 
students.name, courses.title 
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

                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>