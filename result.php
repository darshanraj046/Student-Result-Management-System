<!DOCTYPE html>
<html>

<head>
    <title>Student Result</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        * {
            box-sizing: padding-box;
        }

        form {
            width: 400px;
            border: 3px solid rgb(0, 0, 0);
            padding: 20px;
            border-radius: 20px;
            background: coral;
        }

        h2 {
            text-align: center;
            margin-bottom: 40px;
        }

        input {
            display: block;
            border: 2px solid #ccc;
            width: 95%;
            padding: 10px;
            margin: 10px auto;
            border-radius: 5px;
        }

        label {
            color: rgb(0, 0, 0);
            font-size: 18px;
            padding: 10px;
        }

        button {
            float: right;
            background: #CCFF66;
            padding: 10px 15px;
            color: black;
            border-radius: 5px;
            margin-right: 10px;
            border: none;
        }

        .error {
            background: #6358ff;
            color: #0c0101;
            padding: 10px;
            width: 95%;
            text-align: center;
            border-radius: 5px;
            margin: 20px auto;
        }

        h1 {
            text-align: center;
            color: rgb(134, 3, 3);
        }

        a {
            float: right;
            background: rgb(183, 225, 233);
            padding: 10px 15px;
            color: #fff;
            border-radius: 10px;
            margin-right: 10px;
            border: none;
            text-decoration: none;
        }

        #logo {
            width: 10%;
            float: left;
            border-radius: 50px;
        }

        #logo-text {
            font-size: 20px;
            color: aquamarine;
            padding-bottom: 10px;
        }

        .header {
            float: top;
        }
    </style>
</head>

<body>
    <form action="result_action.php" method="post">
        <div class="header">
            <img src="img/mit_logo.jpg" id="logo" alt="logo" />
            <h1 id="logo-text">
                &ensp;Maharaja Institue of Technology Mysore<br />
            </h1>
        </div>
        <h2>Result</h2>
        <?php if (isset($_GET['error'])) { ?><p class="error"><?php echo $_GET['error']; ?></p><?php } ?>
        <label>Student USN</label>
        <input type="text" name="student_usn" placeholder="Enter USN"><br>
        <label>Student DOB</label>
        <input type="date" name="student_dob"><br>
        <button type="submit" name="submit">Fetch</button>
        <a href="index.php" id="homepage">Back to Homepage</a>
    </form>
</body>

</html>