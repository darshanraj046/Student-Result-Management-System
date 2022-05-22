<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Result Management System</title>
    <style>
        .header {
            float: top;
            padding-top: 5%;
        }

        #logo {
            width: 5%;
            float: left;
            margin-left: 28%;
            border-radius: 50px;
        }

        #logo-text {
            padding-top: -3px;
            font-size: 30px;
        }

        .profile-card * {
            box-sizing: border-box;
        }

        .card1 {
            border-radius: 3px;
            height: 300px;
            margin: 20px auto;
            width: 320px;
            overflow: hidden;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
            position: relative;
            margin-left: 65%;
            margin-top: 20%;

        }

        .card1 header {
            background: #ff7043;
            padding: 2px;
            height: 8px;
        }

        .card1 header img {
            border: 5px solid #fff;
            border-radius: 50%;
            display: block;
            margin: 10px auto;
            width: 120px;
            padding-top: 10%;
        }

        .card1 header h1 {
            color: #ff7043;
            font-family: "Open Sans";
            font-weight: 500;
            letter-spacing: 1px;
            margin: 0;
            text-align: center;
            line-height: 1;
        }

        .card2 {
            border-radius: 3px;
            height: 300px;
            margin: 20px auto;
            width: 320px;
            overflow: hidden;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
            position: relative;
            margin-left: 250%;
            margin-top: -100%;

        }

        .card2 header {
            background: #ff7043;
            padding: 2px;
            height: 8px;
        }

        .card2 header img {
            border: 5px solid #fff;
            border-radius: 50%;
            display: block;
            margin: 10px auto;
            width: 120px;
            padding-top: 10%;
        }

        .card2 header h1 {
            color: #ff7043;
            font-family: "Open Sans";
            font-weight: 500;
            letter-spacing: 1px;
            margin: 0;
            text-align: center;
            line-height: 1;
        }

        .card {
            float: left;
            padding-top: 20px;
        }

        .square_btn {
            display: inline-block;
            padding: 0.5em 1em;
            text-decoration: none;
            background: #f7f7f7;
            border-left: solid 6px #ff7c5c;
            margin-left: 30%;
            margin-top: 5%;
            color: #ff7c5c;
            font-weight: bold;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.29);
        }

        .square_btn:hover {
            background: #ff7c5c;
            color: black;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="img/mit_logo.jpg" id="logo" alt="logo" />
        <h1 id="logo-text">
            &ensp;&ensp;Maharaja Institue of Technology Mysore<br />
        </h1>
    </div>
    <div class="card">
        <aside class="card1">
            <header>
                <a href="#">
                    <img src="img/admin_img.jpg">
                </a>
                <a href="admin/index.php" class="square_btn">Admin Login</a>
            </header>
        </aside>
        <aside class="card2">
            <header>
                <a href="#">
                    <img src="img/admin_img.jpg">
                </a>
                <a href="result.php" class="square_btn">Student Result</a>
            </header>
        </aside>
    </div>
</body>
</html>