<?php
include('adminpage.php');
$conn = mysqli_connect("localhost", "root", "", "srms");
if ($conn === false) {
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}
error_reporting(0);
$cid = $_GET['cid'];
$id = $_GET['id'];
$dc = $_GET['dc'];
$sid = $_GET['sid'];
$s1 = $_GET['s1'];
$s2 = $_GET['s2'];
$s3 = $_GET['s3'];
$s4 = $_GET['s4'];
$s5 = $_GET['s5'];
$s6 = $_GET['s6'];
?>
<!DOCTYPE html>
<html>

<head>
    <title>Update Subject</title>
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
        <h3>Update Subject</h3>
        <form action="" method="GET">
            <input type="hidden" name="subject_id" value="<?php echo $id; ?>">
            <label for="lname">Department Code</label>
            <select name="class_id" id="class_id">
                <option value="<?php echo $cid; ?>" selected disabled><?php echo $dc; ?></option>
            </select>
            <br>
            <br>
            <label for="lname">Sem</label>
            <select name="sem_id" id="sem_id">
                <option value="<?php echo $sid; ?>" selected disabled><?php echo $sid; ?></option>
            </select>
            <br>
            <br>
            <label for="fname">Subject-1 Name</label>
            <input type="text" id="fname" name="subject_name1" value="<?php echo $s1; ?>">
            <br>
            <br>
            <label for="fname">Subject-2 Name</label>
            <input type="text" id="fname" name="subject_name2" value="<?php echo $s2; ?>">
            <br>
            <br>
            <label for="fname">Subject-3 Name</label>
            <input type="text" id="fname" name="subject_name3" value="<?php echo $s3; ?>">
            <br>
            <br>
            <label for="fname">Subject-4 Name</label>
            <input type="text" id="fname" name="subject_name4" value="<?php echo $s4; ?>">
            <br>
            <br>
            <label for="fname">Subject-5 Name</label>
            <input type="text" id="fname" name="subject_name5" value="<?php echo $s5; ?>">
            <br>
            <br>
            <label for="fname">Subject-6 Name</label>
            <input type="text" id="fname" name="subject_name6" value="<?php echo $s6; ?>">
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
    $subid = $_GET['subject_id'];
    $s1 = $_GET['subject_name1'];
    $s2 = $_GET['subject_name2'];
    $s3 = $_GET['subject_name3'];
    $s4 = $_GET['subject_name4'];
    $s5 = $_GET['subject_name5'];
    $s6 = $_GET['subject_name6'];
    $query = "UPDATE subject_srms set subject_name1='$s1', subject_name2='$s2', subject_name3='$s3', subject_name4='$s4', subject_name5='$s5', subject_name6='$s6' WHERE subject_id='$subid'";
    $data = mysqli_query($conn, $query);
    if ($data) {
        echo "<script>alert('Record Updated')</script>";
?>
        <meta http-equiv="Refresh" content="0; URL=http://localhost/SRMS/admin/display_subject.php">
    <?php
    } else {
        echo "<script>alert('Failed to Update')</script>";
    ?>
        <meta http-equiv="Refresh" content="0; URL=http://localhost/SRMS/admin/display_subject.php">
<?php
    }
}
?>