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
<?php
include_once 'data_controller.php';
$data               =           new DataController();
$deptcode          =           $data->getdeptcode();
?>
<!DOCTYPE html>
<html>

<head>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
    <div class="add">
        <h3>Insert Student</h3>
        <form action="add_std_action.php">
            <label for="fname">Student Name</label>
            <input type="text" id="fname" name="student_name" placeholder="Enter student name">
            <br>
            <br>
            <label for="lname">Student USN</label>
            <input type="text" id="lname" name="student_usn" placeholder="Enter student USN">
            <br>
            <br>
            <label for="lname">Department Code</label>
            <select name="class_id" id="class_id" class="form-control" required>
                <option selected disabled>Select Department Code</option>
                <?php foreach ($deptcode as $language) : ?>
                    <option value="<?php echo $language['class_id']; ?> "><?php echo $language['class_code']; ?> </option>
                <?php endforeach; ?>
            </select>
            <br>
            <br>
            <label for="lname">Sem</label>
            <select name="sem_id" id="sem_id" class="form-control" required>
                <option>Select Sem</option>
            </select>
            <br>
            <br>
            <label for="lname">Student Email ID</label>
            <input type="text" id="lname" name="student_email" placeholder="Enter student Email ID">
            <br>
            <br>
            <label for="lname">Student Gender</label>
            <input type="text" id="lname" name="student_gender" placeholder="Enter student gender">
            <br>
            <br>
            <label for="lname">Student DOB</label>
            <input type="date" id="lname" name="student_dob" placeholder="Enter student DOB YYYY-MM-DD">
            <br>
            <br>
            <input type="submit" value="Submit" name="submit">
            <?php if (isset($_GET['error'])) { ?><p class="error"><?php echo $_GET['error']; ?></p><?php } ?>
        </form>
    </div>
    <br>
    <br>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm35EyKfeXvoDw85UBDyE6EoM41kErfKy93WlJ" crossorigin="anonymous"></script>
</body>

</html>
<script>
    $(document).ready(function() {
        $("#class_id").change(function() {
            var SemesterId = $(this).val();
            $(this).fadeIn();

            $.ajax({
                url: 'process_controller.php',
                type: 'POST',
                data: {
                    semId: SemesterId
                },
                dataType: "JSON",

                success: function(result) {
                    var items = "";
                    $("#sem_id").empty();

                    $("#sem_id").append(
                        "<option selected disabled>Select Sem</option>");

                    $.each(result, function(i, item) {
                        $("#sem_id").append("<option value='" + item
                            .id + "'>" + item.sem_id +
                            "</option>");
                    });
                }
            });
        });
    });
</script>