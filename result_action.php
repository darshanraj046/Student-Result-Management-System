<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <style>
        .box {
            width: 30%;
            height: 50%;
            margin-top: 6%;
            margin-left: 37%;
            padding-bottom: 10px;
            padding-left: 10px;
            padding-right: 10px;
            font-weight: bold;
            line-height: 2;
            background: linear-gradient(135deg, #a8edea 10%, #fed6e3 100%);
        }
    </style>
</head>

<body>
    <a href="result.php">Back</a>
    <div class="box">
        <h1>
            <center>Result</center>
        </h1>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "srms");

        $susn = $_POST["student_usn"];
        $sdob = $_POST["student_dob"];

        $sql = "SELECT * FROM student_srms S, marks_srms M, class_srms C where student_dob='$sdob' AND student_usn='$susn' AND S.student_id=M.student_id AND S.sem_id=M.sem_id AND S.class_id=C.class_id";

        $runQuery = mysqli_query($conn, $sql);

        $countRows = mysqli_num_rows($runQuery);

        if ($countRows > 0) {
            while ($row = mysqli_fetch_array($runQuery)) {
                echo "Name             : "  . $row['student_name'] . "<br>";
                echo "USN              : "  . $row['student_usn'] . "<br>";
                echo "Department Name  : "  . $row['class_code'] . "<br>";
                echo "Sem              : "  . $row['sem_id'] . "<br>";
                echo "Email-ID         : "  . $row['student_email_id'] . "<br>";
                echo "DOB              : "  . $row['student_dob'] . "<br>";
                echo "Subject-1 Marks  : "  . $row['marks1'] . "<br>";
                echo "Subject-2 Marks  : "  . $row['marks2'] . "<br>";
                echo "Subject-3 Marks  : "  . $row['marks3'] . "<br>";
                echo "Subject-4 Marks  : "  . $row['marks4'] . "<br>";
                echo "Subject-5 Marks  : "  . $row['marks5'] . "<br>";
                echo "Subject-6 Marks  : "  . $row['marks6'] . "<br>";
            }
        } else {
            header("Location: result.php?error=Incorrect USN or DOB or<br>Result not found");
            exit();
        }
        ?>
    </div>
</body>

</html>