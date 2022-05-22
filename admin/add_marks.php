<?php
include('adminpage.php');
$con = mysqli_connect("localhost", "root", "", "srms");
if ($con === false) {
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}
$sql1 = "SELECT * FROM `result_srms`";
$result_categories = mysqli_query($con, $sql1);
$sql = "SELECT * FROM `subject_srms`";
$sub_categories = mysqli_query($con, $sql);
$sql = "SELECT * FROM `class_srms`";
$class_categories = mysqli_query($con, $sql);
?>
<?php
include_once 'data_controller.php';
$data               =           new DataController();
$deptcode           =           $data->getdeptcode();
?>
<!DOCTYPE html>
<html>

<head>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
    <div class="add">
        <h3>Insert Marks</h3>
        <form action="add_marks_action.php">
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
            <label for="lname">Student Name</label>
            <select name="student_id" id="student_id" class="form-control" required>
                <option>Select Student</option>
            </select>
            <br>
            <br>
            <label for="fname">Subject-1 Marks</label>
            <input type="number" id="fname" name="marks1" placeholder="Enter Marks">
            <br>
            <br>
            <label for="fname">Subject-2 Marks</label>
            <input type="number" id="fname" name="marks2" placeholder="Enter Marks">
            <br>
            <br>
            <label for="fname">Subject-3 Marks</label>
            <input type="number" id="fname" name="marks3" placeholder="Enter Marks">
            <br>
            <br>
            <label for="fname">Subject-4 Marks</label>
            <input type="number" id="fname" name="marks4" placeholder="Enter Marks">
            <br>
            <br>
            <label for="fname">Subject-5 Marks</label>
            <input type="number" id="fname" name="marks5" placeholder="Enter Marks">
            <br>
            <br>
            <label for="fname">Subject-6 Marks</label>
            <input type="number" id="fname" name="marks6" placeholder="Enter Marks">
            <br>
            <br>
            <input type="submit" value="Submit" name="submit">
            <?php if (isset($_GET['error'])) { ?><p class="error"><?php echo $_GET['error']; ?></p><?php } ?>
        </form>
    </div>
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
    $(document).ready(function() {
        $("#sem_id").change(function() {
            var StudentId = $(this).val();
            $(this).fadeIn();

            $.ajax({
                url: 'process_controller.php',
                type: 'POST',
                data: {
                    stuId: StudentId
                },
                dataType: "JSON",
                success: function(result) {
                    var items = "";
                    $("#student_id").empty();
                    $("#student_id").append(
                        "<option selected disabled>Select Student</option>");
                    $.each(result, function(i, item) {
                        $("#student_id").append("<option value='" + item
                            .student_id + "'>" + item.student_name +
                            "</option>");
                    });
                }
            });
        });
    });
</script>