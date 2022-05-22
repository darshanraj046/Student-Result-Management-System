<?php
include('adminpage.php');

$con = mysqli_connect("localhost", "root", "", "srms");
if ($con === false) {
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}

$sql = "SELECT * FROM class_srms C, sem_srms S where C.class_id=S.class_id";
$result = mysqli_query($con, $sql);
?>

<?php
if (isset($_GET['del'])) {
    $id = $_GET['del'];
    mysqli_query($con, "DELETE FROM sem_srms WHERE sem_id=$id");
    $_SESSION['message'] = "Sem Name deleted!";
    header('location: display_sem.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Class Details</title>
    <style>
        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid #FF0000;
            background-color: #ffff66;
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
        <h1 class="tablehead">Sem Details</h1>
        <table>
            <tr>
                <th>Class Name</th>
                <th>Class Code</th>
                <th>Sem</th>
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
                    <td><a href="update_sem.php?sid=<?php echo $rows['sem_id']; ?>&cd=<?php echo $rows['class_code']; ?>&cid=<?php echo $rows['class_id']; ?>&id=<?php echo $rows['id']; ?>">Edit</a></td>
                    <td><a href="display_sem.php?del=<?php echo $rows['sem_id']; ?>">Delete</a></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </section>
</body>

</html>