<?php
include('adminpage.php');

$con = mysqli_connect("localhost", "root", "", "srms");
if ($con === false) {
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}

$sql = "SELECT * FROM subject_srms S, class_srms C, sem_srms SS where S.class_id=C.class_id AND SS.id=S.sem_id";
$result = mysqli_query($con, $sql);

?>

<?php
if (isset($_GET['del'])) {
    $id = $_GET['del'];
    mysqli_query($con, "DELETE FROM subject_srms WHERE subject_id=$id");
    $_SESSION['message'] = "Subject deleted!";
    header('location: display_subject.php');
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
        <h1 class="tablehead">Subject Details</h1>
        <table>
            <tr>
                <th>Course Name</th>
                <th>Course Code</th>
                <th>Sem</th>
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
                    <td><?php echo $rows['class_name']; ?></td>
                    <td><?php echo $rows['class_code']; ?></td>
                    <td><?php echo $rows['sem_id']; ?></td>
                    <td><?php echo $rows['subject_name1']; ?></td>
                    <td><?php echo $rows['subject_name2']; ?></td>
                    <td><?php echo $rows['subject_name3']; ?></td>
                    <td><?php echo $rows['subject_name4']; ?></td>
                    <td><?php echo $rows['subject_name5']; ?></td>
                    <td><?php echo $rows['subject_name6']; ?></td>
                    <td><a href="update_subject.php?id=<?php echo $rows['subject_id']; ?>&cid=<?php echo $rows['class_id']; ?>&dc=<?php echo $rows['class_code']; ?>&s1=<?php echo $rows['subject_name1']; ?>&s2=<?php echo $rows['subject_name2']; ?>&s3=<?php echo $rows['subject_name3']; ?>&s4=<?php echo $rows['subject_name4']; ?>&s5=<?php echo $rows['subject_name5']; ?>&s6=<?php echo $rows['subject_name6']; ?>&sid=<?php echo $rows['sem_id']; ?>">Edit</a></td>
                    <td><a href="display_subject.php?del=<?php echo $rows['subject_id']; ?>">Delete</a></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </section>
</body>

</html>