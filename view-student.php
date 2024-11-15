<?php
require 'connection.php';
include("nav.php");

$selectSql = "SELECT * FROM students";
$selectSqlResult = mysqli_query($conn, $selectSql);
?>

<div class="table-responsive container mt-3">
    <table class="table table-primary">
        <thead>
            <tr>
                <th scope="col">S.N.</th>
                <th scope="col">Student Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            while ($row = mysqli_fetch_array($selectSqlResult)) {
                ?>
                <tr class="">
                    <td scope="row"><?php echo ++$i; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td scope="row">
                        <a href="edit-student.php?id=<?php echo $row['s_id']; ?>" class="btn btn-primary">Edit</a>
                        <a href="delete-student.php?id=<?php echo $row['s_id']; ?>"
                            onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>
<?php


