<?php
$conn = mysqli_connect("localhost", "root", "", "srms");
if ($conn === false) {
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}
$class_name = $_REQUEST['class_id'];
$sem = $_REQUEST['sem_id'];

$sql = "INSERT INTO sem_srms(class_id, sem_id) VALUES ('$class_name',
			'$sem')";

if (mysqli_query($conn, $sql)) {
    header("Location: add_sem.php?error=Sucessfully Inserted");
    exit();
} else {
    header("Location: add_sem.php?error=Failed to insert");
    exit();
}
mysqli_close($conn);
