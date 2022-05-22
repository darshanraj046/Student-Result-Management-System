<?php
$conn = mysqli_connect("localhost", "root", "", "srms");
if ($conn === false) {
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}
$c_id = $_REQUEST['class_id'];
$sem = $_REQUEST['sem_id'];
$s_name1 = $_REQUEST['subject_name1'];
$s_name2 = $_REQUEST['subject_name2'];
$s_name3 = $_REQUEST['subject_name3'];
$s_name4 = $_REQUEST['subject_name4'];
$s_name5 = $_REQUEST['subject_name5'];
$s_name6 = $_REQUEST['subject_name6'];

$sql = "INSERT INTO subject_srms(subject_name1, subject_name2, subject_name3, subject_name4, subject_name5, subject_name6, class_id, sem_id) VALUES ('$s_name1', '$s_name2', '$s_name3', '$s_name4','$s_name5', '$s_name6', '$c_id', '$sem')";

if (mysqli_query($conn, $sql)) {
    header("Location: add_subject.php?error=Sucessfully Inserted");
    exit();
} else {
    header("Location: add_subject.php?error=Failed to insert");
    exit();
}
mysqli_close($conn);
