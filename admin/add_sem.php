<?php
include('adminpage.php');
$con = mysqli_connect("localhost", "root", "", "srms");
if ($con === false) {
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}
$sql = "SELECT * FROM `class_srms`";
$all_categories = mysqli_query($con, $sql);
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
        <h3>Insert Sem</h3>
        <form action="add_sem_action.php">
            <label for="lname">Department Code</label>
            <select name="class_id" id="class_id" class="form-control" required>
                <?php
                while ($category = mysqli_fetch_array(
                    $all_categories,
                    MYSQLI_ASSOC
                )) :;
                ?>
                    <option value="<?php echo $category["class_id"];
                                    ?>">
                        <?php echo $category["class_code"];
                        ?>
                    </option>
                <?php
                endwhile;
                ?>
            </select>
            <label for="lname">Sem</label>
            <input type="text" id="lname" name="sem_id" placeholder="Enter sem" required>
            <input type="submit" value="Submit">
            <?php if (isset($_GET['error'])) { ?><p class="error"><?php echo $_GET['error']; ?></p><?php } ?>
        </form>
    </div>
</body>

</html>