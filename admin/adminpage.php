<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Homepage</title>
    <style>
        body {
            margin: 0;
            height: 100%;
        }

        .sidebar {
            margin: 0;
            padding: 0;
            width: 200px;
            background-color: #f1f1f1;
            position: absolute;
            height: auto;
            border: 5px solid red;
            border-radius: 20px;
            margin-left: 10px;
        }

        .sidebar a {
            display: block;
            color: black;
            padding: 16px;
            line-height: 0.75;
            text-decoration: none;
            text-align: center;
        }

        .sidebar a.active {
            background-color: #04AA6D;
            color: white;
        }

        .sidebar a:hover:not(.active) {
            background-color: #555;
            color: white;
        }

        div.content {
            margin-left: 180px;
            padding: 1px 16px;
            height: auto;
        }

        #logo {
            width: 5%;
            float: left;
            margin-left: 25%;
            border-radius: 50px;
        }

        #logo-text {
            padding-top: 10px;
            font-size: 30px;
        }

        .header {
            float: top;
        }

        #logout {
            float: right;
            margin-top: -4%;
            margin-right: 30px;
            color: black;
            padding: 10px 20px;
            border: 3px solid red;
            border-radius: 5px;
        }

        #logout:hover {
            color: white;
        }

        #alout {
            text-decoration: 0;
        }

        #alout:hover {
            text-decoration: 0;
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="../img/mit_logo.jpg" id="logo" alt="logo" />
        <h1 id="logo-text">
            &ensp;&ensp;Maharaja Institue of Technology Mysore<br />
        </h1>
        <button id="logout"><a href="logout.php" id="alout">Logout</a></button>
    </div>
    <br>
    <div class="sidebar">
        <a href="add_class.php">Add Class</a>
        <a href="display_class.php">Update Class</a>
        <a href="add_sem.php">Add Sem</a>
        <a href="display_sem.php">Update Sem</a>
        <a href="add_subject.php">Add Subject</a>
        <a href="display_subject.php">Update Subject</a>
        <a href="add_student.php">Add Student</a>
        <a href="display_student.php">Update Student</a>
        <a href="add_marks.php">Add Marks</a>
        <a href="display_marks.php">Update Marks</a>
    </div>