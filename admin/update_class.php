<?php
include('adminpage.php');
$conn = mysqli_connect("localhost", "root", "", "srms");
if ($conn === false) {
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}
error_reporting(0);
$cid = $_GET['cid'];
$cn = $_GET['cn'];
$cd = $_GET['cd'];
?>
<!DOCTYPE html>
<html>
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

<body>
    <div class="add">
        <h3>Update Class</h3>
        <form action="" method="GET">
            <input type="hidden" name="class_id" value="<?php echo $cid; ?>">
            <label for="fname">Course Name</label>
            <input type="text" id="fname" name="class_name" value="<?php echo $cn; ?>" required>
            <br>
            <br>
            <label for="lname">Department Code</label>
            <input type="text" id="lname" name="class_code" value="<?php echo $cd; ?>" required>
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
    $clsname = $_GET['class_name'];
    $clscode = $_GET['class_code'];
    $query = "UPDATE class_srms set class_id='$clsid', class_name='$clsname', class_code='$clscode' WHERE class_id='$clsid'";
    $data = mysqli_query($conn, $query);
    if ($data) {
        echo "<script>alert('Record Updated')</script>";
?>
        <meta http-equiv="Refresh" content="0; URL=http://localhost/SRMS/admin/display_class.php">
    <?php
    } else {
        echo "<script>alert('Failed to Update')</script>";
    ?>
        <meta http-equiv="Refresh" content="0; URL=http://localhost/SRMS/admin/display_class.php">
<?php
    }
}
?>