<?php
$conn = mysqli_connect("localhost", "root", "", "srms");
if ($conn === false) {
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}
$first_name = $_REQUEST['class_name'];
$last_name = $_REQUEST['class_code'];

$sql = "INSERT INTO class_srms(class_name, class_code) VALUES ('$first_name',
			'$last_name')";

if (mysqli_query($conn, $sql)) {
    header("Location: add_class.php?error=Sucessfully Inserted");
    exit();
} else {
    header("Location: add_class.php?error=Failed to insert");
    exit();
}
mysqli_close($conn);
