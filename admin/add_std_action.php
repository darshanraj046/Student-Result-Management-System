<?php
$conn = mysqli_connect("localhost", "root", "", "srms");
if ($conn === false) {
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}
$s_name = $_REQUEST['student_name'];
$s_usn = $_REQUEST['student_usn'];
$s_email = $_REQUEST['student_email'];
$s_dob = $_REQUEST['student_dob'];
$s_gender = $_REQUEST['student_gender'];
$c_id = $_REQUEST['class_id'];
$sem_id = $_REQUEST['sem_id'];

$sql = "INSERT INTO student_srms(student_name, student_usn, student_email_id, student_dob,student_gender, class_id, sem_id) VALUES ('$s_name', '$s_usn', '$s_email', '$s_dob', '$s_gender', '$c_id', '$sem_id')";

if (mysqli_query($conn, $sql)) {
    header("Location: add_student.php?error=Sucessfully Inserted");
    exit();
} else {
    header("Location: add_student.php?error=Failed to insert");
    exit();
}
mysqli_close($conn);
