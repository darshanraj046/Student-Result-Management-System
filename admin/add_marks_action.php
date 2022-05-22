<?php
$conn = mysqli_connect("localhost", "root", "", "srms");
if ($conn === false) {
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}
$sem = $_REQUEST['sem_id'];
$stu = $_REQUEST['student_id'];
$mark1 = $_REQUEST['marks1'];
$mark2 = $_REQUEST['marks2'];
$mark3 = $_REQUEST['marks3'];
$mark4 = $_REQUEST['marks4'];
$mark5 = $_REQUEST['marks5'];
$mark6 = $_REQUEST['marks6'];

$sql = "INSERT INTO marks_srms(marks1, marks2, marks3, marks4, marks5, marks6, student_id, sem_id) VALUES ('$mark1', '$mark2', '$mark3', '$mark4','$mark5', '$mark6', '$stu', '$sem')";

if (mysqli_query($conn, $sql)) {
    header("Location: add_marks.php?error=Sucessfully Inserted");
    exit();
} else {
    header("Location: add_marks.php?error=Failed to insert");
    exit();
}
mysqli_close($conn);
