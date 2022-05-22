<?php
include('adminpage.php');

$con = mysqli_connect("localhost", "root", "", "srms");
if ($con === false) {
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}

$sql = "SELECT * FROM student_srms S, class_srms C, sem_srms SEM where S.class_id=C.class_id AND SEM.id=S.sem_id AND SEM.class_id=C.class_id";
$result = mysqli_query($con, $sql);

?>

<?php
if (isset($_GET['del'])) {
    $id = $_GET['del'];
    mysqli_query($con, "DELETE FROM student_srms WHERE student_id=$id");
    $_SESSION['message'] = "Student deleted!";
    header('location: display_student.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student Details</title>
    <style>
        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid #FF0000;
            background-color: #ffff66;
            margin-left: 20%;
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
        <h1 class="tablehead">Student Details</h1>
        <table>
            <tr>
                <th>Name</th>
                <th>Dept Code</th>
                <th>Sem</th>
                <th>USN</th>
                <th>Email</th>
                <th>Gender</th>
                <th>DOB</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php
            while ($rows = $result->fetch_assoc()) {
            ?>
                <tr>
                    <td><?php echo $rows['student_name']; ?></td>
                    <td><?php echo $rows['class_code']; ?></td>
                    <td><?php echo $rows['sem_id']; ?></td>
                    <td><?php echo $rows['student_usn']; ?></td>
                    <td><?php echo $rows['student_email_id']; ?></td>
                    <td><?php echo $rows['student_gender']; ?></td>
                    <td><?php echo $rows['student_dob']; ?></td>
                    <td><a href="update_student.php?id=<?php echo $rows['student_id']; ?>&sname=<?php echo $rows['student_name']; ?>&susn=<?php echo $rows['student_usn']; ?>&dc=<?php echo $rows['class_code']; ?>&cid=<?php echo $rows['class_id']; ?>&sem=<?php echo $rows['sem_id']; ?>&semail=<?php echo $rows['student_email_id']; ?>&sgen=<?php echo $rows['student_gender']; ?>&sdob=<?php echo $rows['student_dob']; ?>">Edit</a></td>
                    <td><a href="display_student.php?del=<?php echo $rows['student_id']; ?>">Delete</a></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </section>
</body>

</html>