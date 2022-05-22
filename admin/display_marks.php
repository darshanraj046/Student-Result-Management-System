<?php
include('adminpage.php');

$con = mysqli_connect("localhost", "root", "", "srms");
if ($con === false) {
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}

$sql = "SELECT * FROM marks_srms M, student_srms S, sem_srms SEM, class_srms C where M.student_id=S.student_id AND M.sem_id=S.sem_id AND SEM.id=S.sem_id AND C.class_id=SEM.class_id AND SEM.class_id=S.class_id";
$result = mysqli_query($con, $sql);

?>

<?php
if (isset($_GET['del'])) {
    $id = $_GET['del'];
    mysqli_query($con, "DELETE FROM marks_srms WHERE marks_id=$id");
    $_SESSION['message'] = "Marks deleted!";
    header('location: display_marks.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Marks Details</title>
    <style>
        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid #FF0000;
            background-color: #ffff66;
            margin-left: 25%;
        }

        .tablehead {
            text-align: center;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT',
                ' Calibri', 'Trebuchet MS', 'sans-serif';
        }

        td {
            background-color: #E4F5D4;
            border: 1px solid #FF0000;
        }

        th,
        td {
            font-weight: bold;
            border: 1px solid #FF0000;
            padding: 10px;
            text-align: center;
        }

        td {
            font-weight: lighter;
        }
    </style>
</head>

<body>
    <section>
        <h1 class="tablehead">Marks Details</h1>
        <table>
            <tr>
                <th>Course Code</th>
                <th>Sem</th>
                <th>Student Name</th>
                <th>Sub1</th>
                <th>Sub2</th>
                <th>Sub3</th>
                <th>Sub4</th>
                <th>Sub5</th>
                <th>Sub6</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php
            while ($rows = $result->fetch_assoc()) {
            ?>
                <tr>
                    <td><?php echo $rows['class_code']; ?></td>
                    <td><?php echo $rows['sem_id']; ?></td>
                    <td><?php echo $rows['student_name']; ?></td>
                    <td><?php echo $rows['marks1']; ?></td>
                    <td><?php echo $rows['marks2']; ?></td>
                    <td><?php echo $rows['marks3']; ?></td>
                    <td><?php echo $rows['marks4']; ?></td>
                    <td><?php echo $rows['marks5']; ?></td>
                    <td><?php echo $rows['marks6']; ?></td>
                    <td><a href="update_marks.php?id=<?php echo $rows['marks_id']; ?>&sid=<?php echo $rows['student_id']; ?>&sname=<?php echo $rows['student_name']; ?>&semid=<?php echo $rows['sem_id']; ?>&m1=<?php echo $rows['marks1']; ?>&m2=<?php echo $rows['marks2']; ?>&m3=<?php echo $rows['marks3']; ?>&m4=<?php echo $rows['marks4']; ?>&m5=<?php echo $rows['marks5']; ?>&m6=<?php echo $rows['marks6']; ?>&cid=<?php echo $rows['class_id']; ?>&dc=<?php echo $rows['class_code']; ?>">Edit</a></td>
                    <td><a href="display_subject.php?del=<?php echo $rows['marks_id']; ?>">Delete</a></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </section>
</body>

</html>