<?php
require 'connection.php';
include("nav.php");

$select = "SELECT * FROM courses";
$selectResult = mysqli_query($conn, $select);

?>

<div class="table-responsive container mt-3">
    <table class="table table-striped table-hover table-dark align-middle">
        <thead class="table-light">
            <tr>
                <th>S.N</th>
                <th>Course</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php
            $i = 0;
            while ($row = mysqli_fetch_array($selectResult)) {
                ?>

                <tr class="table-light">
                    <td scope="row"><?php echo ++$i; ?></td>
                    <td scope="row"><?php echo $row['title']; ?></td>
                    <td scope="row">
                        <a href="edit-course.php?id=<?php echo $row['c_id']; ?>" class="btn btn-primary">Edit</a>
                        <a href="delete-course.php?id=<?php echo $row['c_id']; ?>"
                            onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger">Delete</a>
                    </td>

                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>