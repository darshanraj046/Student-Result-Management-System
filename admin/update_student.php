<?php
include('adminpage.php');
$conn = mysqli_connect("localhost", "root", "", "srms");
if ($conn === false) {
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}
error_reporting(0);
$sid = $_GET['id'];
$sname = $_GET['sname'];
$susn = $_GET['susn'];
$dc = $_GET['dc'];
$cid = $_GET['cid'];
$sem = $_GET['sem'];
$semail = $_GET['semail'];
$sgen = $_GET['sgen'];
$sdob = $_GET['sdob'];
?>
<!DOCTYPE html>
<html>

<head>
    <title>Update Student</title>
    <style>
        input[type=text],
        input[type=date],
        select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=submit] {
            width: 25%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border-radius: 20px;
            margin-left: 40%;
        }

        .add {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
            width: 50%;
            margin-top: 5%;
            margin-left: 25%;
        }

        h3 {
            text-align: center;
            background-color: skyblue;
            padding: 10px 10px;
            margin-top: -1px;
            border-radius: 15px;
        }

        .error {
            background: #ffcc00;
            color: #0c0101;
            padding: 10px;
            width: 95%;
            text-align: center;
            border-radius: 5px;
            margin: 20px auto;
        }
    </style>
</head>

<body>
    <div class="add">
        <h3>Update Student</h3>
        <form action="" method="GET">
            <input type="hidden" name="sid" value="<?php echo $sid; ?>">
            <label for="fname">Student Name</label>
            <input type="text" id="fname" name="student_name" value="<?php echo $sname; ?>">
            <br>
            <br>
            <label for=" lname">Student USN</label>
            <input type="text" id="lname" name="student_usn" value="<?php echo $susn; ?>">
            <br>
            <br>
            <label for=" lname">Department Code</label>
            <select name="class_id" id="class_id" class="form-control" required>
                <option value="<?php echo $cid; ?>" selected disabled><?php echo $dc; ?></option>
            </select>
            <br>
            <br>
            <label for="lname">Sem</label>
            <select name="sem_id" id="sem_id" class="form-control" required>
                <option value="<?php echo $sem; ?>" disabled selected><?php echo $sem; ?></option>
            </select>
            <br>
            <br>
            <label for="lname">Student Email ID</label>
            <input type="text" id="lname" name="student_email" value="<?php echo $semail; ?>">
            <br>
            <br>
            <label for=" lname">Student Gender</label>
            <input type="text" id="lname" name="student_gender" value="<?php echo $sgen; ?>">
            <br>
            <br>
            <label for=" lname">Student DOB</label>
            <input type="date" id="lname" name="student_dob" value="<?php echo $sdob; ?>">
            <br>
            <br>
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
</body>

</html>
<?php
$conn = mysqli_connect("localhost", "root", "", "srms");
if ($conn === false) {
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}
if ($_GET['submit']) {
    $id = $_GET['sid'];
    $sname = $_GET['student_name'];
    $susn = $_GET['student_usn'];
    $cid = $_GET['class_id'];
    $semail = $_GET['student_email'];
    $sgen = $_GET['student_gender'];
    $sdob = $_GET['student_dob'];
    $semid = $_GET['sem_id'];
    $query = "UPDATE student_srms set student_name='$sname', student_usn='$susn', student_email_id='$semail', student_gender='$sgen', student_dob='$sdob' WHERE student_id='$id'";
    $data = mysqli_query($conn, $query);
    if ($data) {
        echo "<script>alert('Record Updated')</script>";
?>
        <meta http-equiv="Refresh" content="0; URL=http://localhost/SRMS/admin/display_student.php">
    <?php
    } else {
        echo "<script>alert('Failed to Update')</script>";
    ?>
        <meta http-equiv="Refresh" content="0; URL=http://localhost/SRMS/admin/display_student.php">
<?php
    }
}
?>