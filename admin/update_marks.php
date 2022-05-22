<?php
include('adminpage.php');
$conn = mysqli_connect("localhost", "root", "", "srms");
if ($conn === false) {
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}
error_reporting(0);
$sid = $_GET['sid'];
$id = $_GET['id'];
$cid = $_GET['cid'];
$dc = $_GET['dc'];
$sname = $_GET['sname'];
$semid = $_GET['semid'];
$m1 = $_GET['m1'];
$m2 = $_GET['m2'];
$m3 = $_GET['m3'];
$m4 = $_GET['m4'];
$m5 = $_GET['m5'];
$m6 = $_GET['m6'];
?>
<!DOCTYPE html>
<html>

<head>
    <title>Update Subject</title>
    <style>
        input[type=text],
        input[type=date],
        input[type=number],
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
        <h3>Update Subject</h3>
        <form action="" method="GET">
            <input type="hidden" name="marks_id" value="<?php echo $id; ?>">
            <label for="lname">Department Code</label>
            <select name="class_id" id="class_id">
                <option value="<?php echo $cid; ?>" selected disabled><?php echo $dc; ?></option>
            </select>
            <br>
            <br>
            <label for="lname">Sem</label>
            <select name="sem_id" id="sem_id">
                <option value="<?php echo $semid; ?>" selected disabled><?php echo $semid; ?></option>
            </select>
            <br>
            <br>
            <label for="lname">Student Name</label>
            <select name="student_id" id="student_id">
                <option value="<?php echo $sid; ?>" selected disabled><?php echo $sname; ?></option>
            </select>
            <br>
            <br>
            <label for="fname">Subject-1 Marks</label>
            <input type="number" id="fname" name="marks1" value="<?php echo $m1; ?>">
            <br>
            <br>
            <label for="fname">Subject-2 Marks</label>
            <input type="number" id="fname" name="marks2" value="<?php echo $m2; ?>">
            <br>
            <br>
            <label for="fname">Subject-3 Marks</label>
            <input type="number" id="fname" name="marks3" value="<?php echo $m3; ?>">
            <br>
            <br>
            <label for="fname">Subject-4 Marks</label>
            <input type="number" id="fname" name="marks4" value="<?php echo $m4; ?>">
            <br>
            <br>
            <label for="fname">Subject-5 Marks</label>
            <input type="number" id="fname" name="marks5" value="<?php echo $m5; ?>">
            <br>
            <br>
            <label for="fname">Subject-6 Marks</label>
            <input type="number" id="fname" name="marks6" value="<?php echo $m6; ?>">
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
    $clsid = $_GET['class_id'];
    $sid = $_GET['sem_id'];
    $mid = $_GET['marks_id'];
    $stuid = $_GET['student_id'];
    $m1 = $_GET['marks1'];
    $m2 = $_GET['marks2'];
    $m3 = $_GET['marks3'];
    $m4 = $_GET['marks4'];
    $m5 = $_GET['marks5'];
    $m6 = $_GET['marks6'];
    $query = "UPDATE marks_srms set marks1='$m1', marks2='$m2', marks3='$m3', marks4='$m4', marks5='$m5', marks6='$m6' WHERE marks_id='$mid'";
    $data = mysqli_query($conn, $query);
    if ($data) {
        echo "<script>alert('Record Updated')</script>";
?>
        <meta http-equiv="Refresh" content="0; URL=http://localhost/SRMS/admin/display_marks.php">
    <?php
    } else {
        echo "<script>alert('Failed to Update')</script>";
    ?>
        <meta http-equiv="Refresh" content="0; URL=http://localhost/SRMS/admin/display_marks.php">
<?php
    }
}
?>