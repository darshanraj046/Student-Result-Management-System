<?php
include('adminpage.php');
$conn = mysqli_connect("localhost", "root", "", "srms");
if ($conn === false) {
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}
error_reporting(0);
$id = $_GET['id'];
$sid = $_GET['sid'];
$cid = $_GET['cid'];
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
        <h3>Update Sem</h3>
        <form action="" method="GET">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="class_id" value="<?php echo $cid; ?>">
            <label for="lname">Department Code</label>
            <select name="class_code" id="class_code">
                <option value="<?php echo $cd; ?>" selected disabled><?php echo $cd; ?></option>
            </select>
            <label for="lname">Sem</label>
            <input type="text" id="lname" name="sem_id" value="<?php echo $sid; ?>" required>
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
    $id = $_GET['id'];
    $clsid = $_GET['class_id'];
    $semid = $_GET['sem_id'];
    $query = "UPDATE sem_srms set class_id='$clsid', sem_id='$semid' WHERE id='$id'";
    $data = mysqli_query($conn, $query);
    if ($data) {
        echo "<script>alert('Record Updated')</script>";
?>
        <meta http-equiv="Refresh" content="0; URL=http://localhost/SRMS/admin/display_sem.php">
    <?php
    } else {
        echo "<script>alert('Failed to Update')</script>";
    ?>
        <meta http-equiv="Refresh" content="0; URL=http://localhost/SRMS/admin/display_sem.php">
<?php
    }
}
?>